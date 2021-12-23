<?php

namespace App\Http\Controllers\Admin;

use App\Picture;
use App\Activity;
use App\Category;
use App\Association;
use Illuminate\Http\Request;
use App\Helpers\ActivityLogHelper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;

class ActivityController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!Gate::allows('activity_access')) {
            return abort(401);
        }

        if (request('show_deleted') == 1) {
            if (!Gate::allows('activity_delete')) {
                return abort(401);
            }
            if (auth()->user()->hasRole('admin')) {
                $activities = Activity::admin()->onlyTrashed()->get();
            } else {
                $activities = Activity::associationOwner()->onlyTrashed()->get();
            }
        } else {
            if (auth()->user()->hasRole('admin')) {
                $activities = Activity::admin()->get();
            } else {
                $activities = Activity::associationOwner()->get();
            }
        }

        if ($request->input('association_id')) {
            if (auth()->user()->hasRole('admin')) {
                $activities = Activity::admin()->where('association_id', $request->input('association_id'))->orderBy('activity_name', 'DESC')->get();
            } else {
                $activities = Activity::associationOwner()->where('association_id', $request->input('association_id'))->orderBy('activity_name', 'DESC')->get();
            }
        }

        if ($request->input('activity_id')) {
            if (auth()->user()->hasRole('admin')) {
                $activities = Activity::admin()->where('id', $request->input('activity_id'))->orderBy('activity_name', 'DESC')->get();
            } else {
                $activities = Activity::associationOwner()->where('id', $request->input('activity_id'))->orderBy('activity_name', 'DESC')->get();
            }
        }

        $associations = Association::orderBy('association_name', 'DESC')->get();
        $categories = Category::orderBy('category_name', 'DESC')->get();

        return view('admin.activities.index', compact('activities', 'associations','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Gate::allows('activity_create')) {
            return abort(401);
        }

        $associations = Association::select('id', 'association_name')->orderBy('association_name', 'DESC')->get();
        $categories = Category::select('id', 'category_name')->orderBy('category_name', 'DESC')->get();

        return view('admin.activities.partials.create', compact('associations','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
                        'activity_name' => 'required',
                        'activity_description' => 'required',
                    ]);

        $activity = Activity::create([
            'activity_name' => $request->input('activity_name'),
            'slug' => str_slug($request->input('activity_name')),
            'activity_description' => $request->input('activity_description'),
            'association_id' => $request->input('association_id'),
            'category_id' => $request->input('category_id'),
            'creator' => $request->input('creator'),
            'creator_brief_description' => $request->input('creator_brief_description'),
            'is_featured' => $request->input('is_featured'),
            'is_active' => $request->input('is_active'),
        ]);

        if ($request->pictures != null) {
            $path = public_path().'/img/activity-images/';
            $i = 0;
            foreach ($request->pictures as $photo) {
                $image_name = $activity->slug.'-'.rand(10, 99999999).'.'.$photo->getClientOriginalExtension();

                $photo->move($path, $image_name);

                if ($i === 0) {
                    Picture::create([
                        'url' => '/img/activity-images/'.$image_name,
                        'pictureable_id' => $activity->id,
                        'pictureable_type' => get_class($activity),
                        'is_featured'=>1,
                        'is_active'=>1,
                    ]);
                } else {
                    Picture::create([
                        'url' => '/img/activity-images/'.$image_name,
                        'pictureable_id' => $activity->id,
                        'pictureable_type' => get_class($activity),
                        'is_active' => 1,
                    ]);
                }

                ++$i;
            }
        }

        ActivityLogHelper::log(
              auth()->user()->getFullName(),
            'activity_creation',
            $request->input('association_id'),
            'User <a href="/admin/users?user_id='.auth()->user()->id.'">'.auth()->user()->getFullName().'</a> created a new Activity <a href="/admin/activities?activity_id='.$activity->id.'">'.$activity->activity_name.'</a>'
        );

        
        flash('activity created successfully!')->success();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\activity $activity
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!Gate::allows('activity_view')) {
            return abort(401);
        }

        try {
            if (auth()->user()->hasRole('admin')) {
                $activity = Activity::admin()->findOrFail($id);
            } else {
                $activity = Activity::associationOwner()->findOrFail($id);
            }

            return response()->json(['status' => 'success', 'data' => $activity->get(['id'])]);
        } catch (\Exception $th) {
            return response()->json(['status' => 'error', 'message' => 'Cannot retrieve Resource']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\activity $activity
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Gate::allows('activity_edit')) {
            return abort(401);
        }

        $associations = Association::select('id', 'association_name')->orderBy('association_name', 'DESC')->get();
        $categories = Category::select('id', 'category_name')->orderBy('category_name', 'DESC')->get();


        if (auth()->user()->hasRole('admin')) {
                $activity = Activity::admin()->findOrFail($id);
            } else {
                $activity = Activity::associationOwner()->findOrFail($id);
            }


        return view('admin.activities.partials.edit', compact('categories', 'associations', 'activity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\activity             $activity
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'activity_name' => 'required',
            'activity_description' => 'required',
        ]);
        // dd($request->all());
         if (auth()->user()->hasRole('admin')) {
                $activity = Activity::admin()->findOrFail($request->input('activity_id'));
            } else {
                $activity = Activity::associationOwner()->findOrFail($request->input('activity_id'));
            }

        $activity->update([
            'activity_name' => $request->input('activity_name'),
            'slug' => str_slug($request->input('activity_name')),
            'activity_description' => $request->input('activity_description'),
            'association_id' => $request->input('association_id'),
            'category_id' => $request->input('category_id'),
            'creator' => $request->input('creator'),
            'creator_brief_description' => $request->input('creator_brief_description'),
            'is_featured' => $request->input('is_featured'),
            'is_active' => $request->input('is_active'),
        ]);

        if ($request->pictures != null) {
            // if($request->input('remove_prev')){
            //     $activity->pictures()->delete();
            // }

            $this->deleteActivityImages($activity);

            $activity->pictures()->delete();
            $path = public_path().'/img/activity-images/';
            $i = 0;
            foreach ($request->pictures as $photo) {
                $image_name = $activity->slug.'-'.rand(10, 99999999).'.'.$photo->getClientOriginalExtension();

                $photo->move($path, $image_name);

                if ($i === 0) {
                    Picture::create([
                        'url' => '/img/activity-images/'.$image_name,
                        'pictureable_id' => $activity->id,
                        'pictureable_type' => get_class($activity),
                        'is_featured'=>1,
                        'is_active'=>1,
                    ]);
                } else {
                    Picture::create([
                        'url' => '/img/activity-images/'.$image_name,
                        'pictureable_id' => $activity->id,
                        'pictureable_type' => get_class($activity),
                        'is_active' => 1,
                    ]);
                }

                ++$i;
            }
        }

        ActivityLogHelper::log(
            auth()->user()->getFullName(),
            'activity_update',
            $request->input('association_id'),
            'User <a href="/admin/users?user_id='.auth()->user()->id.'">'.auth()->user()->getFullName().'</a> updated the activity <a href="/admin/activities?activity_id='.$activity->id.'">'.$activity->activity_name.'</a>'
        );

        flash('Activity updated successfully!')->success();

        return redirect()->back();
    }

    /**
     * Remove activity from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Gate::allows('activity_delete')) {
            return abort(401);
        }
        if (auth()->user()->hasRole('admin')) {
                $activity = Activity::admin()->findOrFail($id);
            } else {
                $activity = Activity::associationOwner()->findOrFail($id);
            }

        $activity->delete();

        ActivityLogHelper::log(
              auth()->user()->getFullName(),
            'activity_deletion',
             $activity->id,
            'User <a href="/admin/users?user_id='.auth()->user()->id.'">'.auth()->user()->getFullName().'</a> deleted the activity <a href="/admin/activities?activity_id='.$activity->id.'">'.$activity->activity_name.'</a>'
        );

        return response()->json(['status'=>'success','message'=>'Activity successfully deleted!']);
    }

    /**
     * Restore activity from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (!Gate::allows('activity_delete')) {
            return abort(401);
        }
         if (auth()->user()->hasRole('admin')) {
                $activity = Activity::admin()->onlyTrashed()->findOrFail($id);
            } else {
                $activity = Activity::associationOwner()->onlyTrashed()->findOrFail($id);
            }
        $activity->restore();
        flash('Activity successfully restored!')->success();

          ActivityLogHelper::log(
              auth()->user()->getFullName(),
            'activity_restore',
             $activity->id,
            'User <a href="/admin/users?user_id='.auth()->user()->id.'">'.auth()->user()->getFullName().'</a> restored the activity <a href="/admin/activities?activity_id='.$activity->id.'">'.$activity->activity_name.'</a>'
        );

        return redirect()->route('admin.activities.index');
    }

    /**
     * Permanently delete activity from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (!Gate::allows('activity_delete')) {
            return abort(401);
        }

        if (auth()->user()->hasRole('admin')) {
                $activity = Activity::admin()->onlyTrashed()->findOrFail($id);
            } else {
                $activity = Activity::associationOwner()->onlyTrashed()->findOrFail($id);
            }

        $this->deleteActivityImages($activity);

        $activity->pictures()->delete();
        $activity->forceDelete();
        flash('Activity permanently deleted!')->success();

        ActivityLogHelper::log(
              auth()->user()->getFullName(),
            'activity_permenantly_deleted',
            $activity->id,
            'User <a href="/admin/users?user_id='.auth()->user()->id.'">'.auth()->user()->getFullName().'</a> permenantly deleted the activity <a href="/admin/activities?activity_id='.$activity->id.'">'.$activity->activity_name.'</a>'
        );

        return redirect()->route('admin.activities.index');
    }

    public function deleteActivityImages(activity $activity)
    {
        foreach ($activity->pictures as $picture) {
            if (File::exists(public_path($picture->url))) {
                File::delete(public_path($picture->url));
            }
        }
    }
}
