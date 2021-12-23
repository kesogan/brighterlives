<?php

namespace App\Http\Controllers\Admin;

use App\Picture;
use App\Product;
use App\Category;
use App\Association;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!Gate::allows('product_access')) {
            return abort(401);
        }

        if (request('show_deleted') == 1) {
            if (!Gate::allows('product_delete')) {
                return abort(401);
            }
            if (auth()->user()->hasRole('admin')) {
                $products = Product::admin()->onlyTrashed()->get();
            } else {
                $products = Product::associationOwner()->onlyTrashed()->get();
            }
        } else {
            if (auth()->user()->hasRole('admin')) {
                $products = Product::admin()->get();
            } else {
                $products = Product::associationOwner()->get();
            }
        }

        if ($request->input('association_id')) {
            if (auth()->user()->hasRole('admin')) {
                $products = Product::admin()->where('association_id', $request->input('association_id'))->orderBy('product_name', 'DESC')->get();
            } else {
                $products = Product::associationOwner()->where('association_id', $request->input('association_id'))->orderBy('product_name', 'DESC')->get();
            }
        }

        if ($request->input('category_id')) {
            if (auth()->user()->hasRole('admin')) {
                $products = Product::admin()->where('category_id', $request->input('category_id'))->orderBy('product_name', 'DESC')->get();
            } else {
                $products = Product::associationOwner()->where('category_id', $request->input('category_id'))->orderBy('product_name', 'DESC')->get();
            }
        }
        if ($request->input('product_id')) {
            if (auth()->user()->hasRole('admin')) {
                $products = Product::admin()->where('id', $request->input('product_id'))->orderBy('product_name', 'DESC')->get();
            } else {
                $products = Product::associationOwner()->where('id', $request->input('product_id'))->orderBy('product_name', 'DESC')->get();
            }
        }

        $associations = Association::orderBy('association_name', 'DESC')->get();

        return view('admin.products.index', compact('products', 'associations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Gate::allows('product_create')) {
            return abort(401);
        }

        $associations = Association::select('id', 'association_name')->orderBy('association_name', 'DESC')->get();
        $categories = Category::select('id', 'category_name')->orderBy('category_name', 'DESC')->get();

        return view('admin.products.partials.create', compact('categories', 'associations'));
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
                        'product_name' => 'required',
                        'product_description' => 'required',
                    ]);

        $product = Product::create([
            'product_name' => $request->input('product_name'),
            'slug' => str_slug($request->input('product_name')),
            'product_description' => $request->input('product_description'),
            'association_id' => $request->input('association_id'),
            'category_id' => $request->input('category_id'),
            'creator' => $request->input('creator'),
            'creator_brief_description' => $request->input('creator_brief_description'),
            'price' => $request->input('price'),
            'type' => $request->input('type'),
            'quantity' => $request->input('quantity'),
            'is_featured' => $request->input('is_featured'),
            'is_active' => $request->input('is_active'),
        ]);

        if ($request->pictures != null) {
            $path = public_path().'/img/product-images/';
            $i = 0;
            foreach ($request->pictures as $photo) {
                $image_name = $product->slug.'-'.rand(10, 99999999).'.'.$photo->getClientOriginalExtension();

                $photo->move($path, $image_name);

                if ($i === 0) {
                    Picture::create([
                        'url' => '/img/product-images/'.$image_name,
                        'pictureable_id' => $product->id,
                        'pictureable_type' => get_class($product),
                        'is_featured'=>1,
                        'is_active'=>1,
                    ]);
                } else {
                    Picture::create([
                        'url' => '/img/product-images/'.$image_name,
                        'pictureable_id' => $product->id,
                        'pictureable_type' => get_class($product),
                        'is_active' => 1,
                    ]);
                }

                ++$i;
            }
        }

        flash('product created successfully!')->success();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\product $product
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!Gate::allows('product_view')) {
            return abort(401);
        }

        try {
            if (auth()->user()->hasRole('admin')) {
                $product = Product::admin()->where('id', $id)->orderBy('product_name', 'DESC')->get();
            } else {
                $product = Product::associationOwner()->findOrFail($id);
            }

            return response()->json(['status' => 'success', 'data' => $product->get(['id'])]);
        } catch (\Exception $th) {
            return response()->json(['status' => 'error', 'message' => 'Cannot retrieve Resource']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\product $product
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Gate::allows('product_edit')) {
            return abort(401);
        }

        $associations = Association::select('id', 'association_name')->orderBy('association_name', 'DESC')->get();
        $categories = Category::select('id', 'category_name')->orderBy('category_name', 'DESC')->get();

         if (auth()->user()->hasRole('admin')) {
                $product = Product::admin()->where('id', $id)->orderBy('product_name', 'DESC')->first();
            } else {
                $product = Product::associationOwner()->findOrFail($id);
            }

        return view('admin.products.partials.edit', compact('categories', 'associations', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\product             $product
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'product_name' => 'required',
            'product_description' => 'required',
        ]);
        // dd($request->all());
        $product = Product::findOrFail($request->input('product_id'));
        $product->update([
            'product_name' => $request->input('product_name'),
            'slug' => str_slug($request->input('product_name')),
            'product_description' => $request->input('product_description'),
            'association_id' => $request->input('association_id'),
            'category_id' => $request->input('category_id'),
            'creator' => $request->input('creator'),
            'creator_brief_description' => $request->input('creator_brief_description'),
            'price' => $request->input('price'),
            'type' => $request->input('type'),
            'quantity' => $request->input('quantity'),
            'is_featured' => $request->input('is_featured'),
            'is_active' => $request->input('is_active'),
        ]);

        if ($request->pictures != null) {
            // if($request->input('remove_prev')){
            //     $product->pictures()->delete();
            // }

            $this->deleteproductImages($product);

            $product->pictures()->delete();
            $path = public_path().'/img/product-images/';
            $i = 0;
            foreach ($request->pictures as $photo) {
                $image_name = $product->slug.'-'.rand(10, 99999999).'.'.$photo->getClientOriginalExtension();

                $photo->move($path, $image_name);

                if ($i === 0) {
                    Picture::create([
                        'url' => '/img/product-images/'.$image_name,
                        'pictureable_id' => $product->id,
                        'pictureable_type' => get_class($product),
                        'is_featured'=>1,
                        'is_active'=>1,
                    ]);
                } else {
                    Picture::create([
                        'url' => '/img/product-images/'.$image_name,
                        'pictureable_id' => $product->id,
                        'pictureable_type' => get_class($product),
                        'is_active' => 1,
                    ]);
                }

                ++$i;
            }
        }

        flash('product updated successfully!')->success();

         ActivityLogHelper::log(
            auth()->user()->getFullName(),
            'production_update',
            $product->association->id,
            'User <a href="/admin/users?user_id='.auth()->user()->id.'">'.auth()->user()->getFullName().'</a> updated the product <a href="/admin/product?product_id='.$product->id.'">'.$product->product_name.'</a>'
        );

        return redirect()->back();
    }

    /**
     * Remove product from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Gate::allows('product_delete')) {
            return abort(401);
        }
        if (auth()->user()->hasRole('admin')) {
            $product = Product::admin()->findOrFail($id);
        } else {
            $product = Product::associationOwner()->findOrFail($id);
        }

        $product->delete();

        ActivityLogHelper::log(
            auth()->user()->getFullName(),
            'production_delete',
            $product->association->id,
            'User <a href="/admin/users?user_id='.auth()->user()->id.'">'.auth()->user()->getFullName().'</a> deleted the product <a href="/admin/product?product_id='.$product->id.'">'.$product->product_name.'</a>'
        );

        return response()->json(['status' => 'success', 'message' => 'Product successfully deleted!']);
    }

    /**
     * Restore product from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (!Gate::allows('product_delete')) {
            return abort(401);
        }
        if (auth()->user()->hasRole('admin')) {
            $product = Product::admin()->onlyTrashed()->findOrFail($id);
        } else {
            $product = Product::associationOwner()->onlyTrashed()->findOrFail($id);
        }

        $product->restore();
        flash('Product successfully restored!')->success();

        ActivityLogHelper::log(
            auth()->user()->getFullName(),
            'production_restore',
            $product->association->id,
            'User <a href="/admin/users?user_id='.auth()->user()->id.'">'.auth()->user()->getFullName().'</a> restored the product <a href="/admin/product?product_id='.$product->id.'">'.$product->product_name.'</a>'
        );

        return redirect()->route('admin.products.index');
    }

    /**
     * Permanently delete product from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (!Gate::allows('product_delete')) {
            return abort(401);
        }
         if (auth()->user()->hasRole('admin')) {
            $product = Product::admin()->onlyTrashed()->findOrFail($id);
        } else {
            $product = Product::associationOwner()->onlyTrashed()->findOrFail($id);
        }

        $this->deleteproductImages($product);

        $product->pictures()->delete();
        $product->forceDelete();
        flash('product permanently deleted!')->success();

        ActivityLogHelper::log(
            auth()->user()->getFullName(),
            'production_permenant_deletion',
            $product->association->id,
            'User <a href="/admin/users?user_id='.auth()->user()->id.'">'.auth()->user()->getFullName().'</a> permenantly deleted the product <a href="/admin/product?product_id='.$product->id.'">'.$product->product_name.'</a>'
        );

        return redirect()->route('admin.products.index');
    }

    public function deleteproductImages(product $product)
    {
        foreach ($product->pictures as $picture) {
            if (File::exists(public_path($picture->url))) {
                File::delete(public_path($picture->url));
            }
        }
    }
}
