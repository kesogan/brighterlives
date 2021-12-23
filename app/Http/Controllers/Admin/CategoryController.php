<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!Gate::allows('category_access')) {
            return abort(401);
        }

        if (request('show_deleted') == 1) {
            if (!Gate::allows('category_delete')) {
                return abort(401);
            }
            $categories = Category::onlyTrashed()->get();
        } else {
            $categories = Category::orderBy('category_name', 'DESC')->get();
        }

        if ($request->input('category_id')) {
            $categories = Category::where('id', $request->input('category_id'))->orderBy('category_name', 'DESC')->get();
        }

        return view('admin.categories.index', compact('categories'));
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
        if (!Gate::allows('category_create')) {
            return abort(401);
        }

        // TODO validation
        try {
            $category = Category::create([
                'category_name' => $request->input('category_name'),
                'slug' => str_slug($request->input('category_name')),
                'category_description' => $request->input('category_description'),
                'is_active' => $request->input('is_active'),
            ]);

            flash('New  Category successfully created!')->success();

            return redirect()->route('admin.categories.index');
        } catch (\Exception $th) {
            flash('Something went wrong!')->error()->important();

            return redirect()->route('admin.categories.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Category $category
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Category $category
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Gate::allows('category_edit')) {
            return abort(401);
        }

        try {
            $category = Category::findOrFail($id);

            return response()->json(['status' => 'success', 'data' => $category]);
        } catch (\Exception $th) {
            return response()->json(['status' => 'error', 'message' => 'Cannot retrieve Resource']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Category $category
     *
     * @return \Illuminate\Http\Response
     */
    public function showDelete($id)
    {
        if (!Gate::allows('category_edit')) {
            return abort(401);
        }

        try {
            $category = Category::findOrFail($id);

            return response()->json(['status' => 'success', 'data' => $category->get(['id'])]);
        } catch (\Exception $th) {
            return response()->json(['status' => 'error', 'message' => 'Cannot retrieve Resource']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Category            $category
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (!Gate::allows('category_edit')) {
            return abort(401);
        }

        //TODO validation

        $category = Category::findOrFail($request->input('category_id'));
        $category->update([
            'category_name' => $request->input('category_name'),
            'slug' => str_slug($request->input('category_name')),
            'category_description' => $request->input('category_description'),
            'is_active' => $request->input('is_active'),
        ]);

        if ($request->hasFile('category_image')) {
            //Save Image

            $image_data = $request->file('category_image');
            $image_name = str_slug($category->category_name).'-'.time().'.'.$image_data->getClientOriginalExtension();
            $path = public_path().'/img/category-images/';

            $image_data->move($path, $image_name);

            $category->update([
                'category_image' => '/img/category-images/'.$image_name,
            ]);
        }
        flash('Category successfully updated!')->success();

        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove category from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Gate::allows('category_delete')) {
            return abort(401);
        }
        $category = Category::findOrFail($id);
        $category->delete();

        // flash('Category successfully deleted!')->success();

        return response()->json(['status'=>'success','message'=>'Category successfully deleted']);
    }

    /**
     * Restore category from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (!Gate::allows('category_delete')) {
            return abort(401);
        }
        $category = Category::onlyTrashed()->findOrFail($id);
        $category->restore();
        flash('Category successfully restored!')->success();

        return redirect()->route('admin.categories.index');
    }

    /**
     * Permanently delete category from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (!Gate::allows('category_delete')) {
            return abort(401);
        }
        $category = Category::onlyTrashed()->findOrFail($id);
       
        $category->forceDelete();
        flash('Category permanently deleted!')->success();

        return redirect()->route('admin.categories.index');
    }
}
