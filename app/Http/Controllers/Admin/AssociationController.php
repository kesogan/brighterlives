<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Association;
use Illuminate\Http\Request;
use App\Helpers\ActivityLogHelper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class AssociationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!Gate::allows('association_access')) {
            return abort(401);
        }

        if (request('show_deleted') == 1) {
            if (!Gate::allows('association_delete')) {
                return abort(401);
            }
            $associations = Association::onlyTrashed()->get();
        } else {
            $associations = Association::orderBy('association_name', 'DESC')->get();
        }

        if ($request->input('association_id')) {
            $associations = Association::where('id', $request->input('association_id'))->orderBy('association_name', 'DESC')->get();
        }

        $owners = User::orderBy('first_name','desc')->role('association_owner')->get();
        return view('admin.associations.index', compact('associations','owners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        if (!Gate::allows('association_create')) {
            return abort(401);
        }

        // TODO validation
        try {
            $association = Association::create([
                'association_name' => $request->input('association_name'),
                'association_email' => $request->input('association_email'),
                'association_address' => $request->input('association_address'),
                'association_contact' => $request->input('association_contact'),
                'association_description' => $request->input('association_description'),
                'association_banner_color' => $request->input('association_banner_color'),
                'association_momo_master' => $request->input('association_momo_master'),
                'owner_id' => $request->input('owner_id'),
                'is_active' => $request->input('is_active')
            ]);

            if ($request->hasFile('association_logo')) {
                //Save logo

                $logo_data = $request->file('association_logo');
                $logo_name = str_slug($association->association_name).'-'.time().'.'.$logo_data->getClientOriginalExtension();
                $path = public_path().'/img/association-logos/';

                $logo_data->move($path, $logo_name);

                $association->update([
                    'association_logo' => '/img/association-logos/'.$logo_name,
                ]);
            }

            flash('New  Association successfully created!')->success();

            ActivityLogHelper::log(
                   auth()->user()->getFullName(),
                'association_create',
                $association->id,
                'User <a href="/admin/users?user_id='.auth()->user()->id.'">'.auth()->user()->getFullName().'</a> created a new association <a href="/admin/associations?association_id='.$association->id.'">'.$association->association_name.'</a>'
            );

            return redirect()->route('admin.associations.index');
        } catch (\Exception $th) {
            flash('Something went wrong!'.$th)->error()->important();

            return redirect()->route('admin.associations.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Association $association
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Association $association)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Association $association
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Gate::allows('association_edit')) {
            return abort(401);
        }

        try {
            $association = Association::findOrFail($id);

            return response()->json(['status' => 'success', 'data' => $association]);
        } catch (\Exception $th) {
            return response()->json(['status' => 'error', 'message' => 'Cannot retrieve Resource']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Association $association
     *
     * @return \Illuminate\Http\Response
     */
    public function showDelete($id)
    {
        if (!Gate::allows('association_edit')) {
            return abort(401);
        }

        try {
            $association = Association::findOrFail($id);

            return response()->json(['status' => 'success', 'data' => $association->get(['id'])]);
        } catch (\Exception $th) {
            return response()->json(['status' => 'error', 'message' => 'Cannot retrieve Resource']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Association            $association
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (!Gate::allows('association_edit')) {
            return abort(401);
        }
        //TODO validation
       $association = Association::findOrFail($request->input('association_id'));
       $association->update([
                'association_name' => $request->input('association_name'),
                'association_email' => $request->input('association_email'),
                'association_address' => $request->input('association_address'),
                'association_contact' => $request->input('association_contact'),
                'association_description' => $request->input('association_description'),
                'association_banner_color' => $request->input('association_banner_color'),
                'association_momo_master' => $request->input('association_momo_master'),
                'owner_id' => $request->input('owner_id'),
                'is_active' => $request->input('is_active')
            ]);

            if ($request->hasFile('association_logo')) {
                //Save logo

                $logo_data = $request->file('association_logo');
                $logo_name = str_slug($association->association_name).'-'.time().'.'.$logo_data->getClientOriginalExtension();
                $path = public_path().'/img/association-logos/';

                $logo_data->move($path, $logo_name);

                $association->update([
                    'association_logo' => '/img/association-logos/'.$logo_name,
                ]);
            }
        flash('Association successfully updated!')->success();

           ActivityLogHelper::log(
                   auth()->user()->getFullName(),
                'association_update',
                $association->id,
                'User <a href="/admin/users?user_id='.auth()->user()->id.'">'.auth()->user()->getFullName().'</a> updated the association <a href="/admin/associations?association_id='.$association->id.'">'.$association->association_name.'</a>'
            );

        return redirect()->route('admin.associations.index');
    }

    /**
     * Remove Association from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Gate::allows('association_delete')) {
            return abort(401);
        }
        $association = Association::findOrFail($id);
        $association->delete();

        // flash('Association successfully deleted!')->success();

         ActivityLogHelper::log(
                   auth()->user()->getFullName(),
                'association_delete',
                $association->id,
                'User <a href="/admin/users?user_id='.auth()->user()->id.'">'.auth()->user()->getFullName().'</a> deleted the association <a href="/admin/associations?association_id='.$association->id.'">'.$association->association_name.'</a>'
            );
        return response()->json(['status'=>'success','message'=>'Association successfully deleted!']);
    }

    /**
     * Restore Association from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (!Gate::allows('association_delete')) {
            return abort(401);
        }
        $association = Association::onlyTrashed()->findOrFail($id);
        $association->restore();
        flash('Association successfully restored!')->success();

        ActivityLogHelper::log(
            auth()->user()->getFullName(),
            'association_restore',
            $association->id,
            'User <a href="/admin/users?user_id='.auth()->user()->id.'">'.auth()->user()->getFullName().'</a> restored the association <a href="/admin/associations?association_id='.$association->id.'">'.$association->association_name.'</a>'
        );
        return redirect()->route('admin.associations.index');
    }

    /**
     * Permanently delete Association from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (!Gate::allows('association_delete')) {
            return abort(401);
        }
        $association = Association::onlyTrashed()->findOrFail($id);
        if (File::exists(public_path($association->association_logo))) {
            File::delete(public_path($association->association_logo));
            // unlink(public_path($association->association_image));
        }
        $association->forceDelete();
        flash('Association permanently deleted!')->success();

         ActivityLogHelper::log(
                   auth()->user()->getFullName(),
                'association_permanent_deletion',
                $association->id,
                'User <a href="/admin/users?user_id='.auth()->user()->id.'">'.auth()->user()->getFullName().'</a> permenantly deleted the association <a href="/admin/associations?association_id='.$association->id.'">'.$association->association_name.'</a>'
            );
        return redirect()->route('admin.associations.index');
    }
}
