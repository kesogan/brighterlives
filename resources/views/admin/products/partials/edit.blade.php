@inject('request', 'Illuminate\Http\Request')
@extends('layouts.admin.master')

@section('title')
<title>{{__('Dashboard Products Edit  Page')}}</title>
@endsection

@section('content_header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{__('Edit Proudct')}}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">{{__('Home')}}</a></li>
                    <li class="breadcrumb-item"><a href="/admin/products">{{__('All Products')}}</a></li>
                    <li class="breadcrumb-item active">{{__('Edit Product')}}</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title float-sm-left">{{__('Edit Product')}}</h3>
                <div class="float-sm-right">
                    <a href="/admin/products" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> @lang('Back to
                        Product Table')</a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="card-body">
                @include('flash::message')
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="POST" action="{{route('admin.product.update',['product_id', $product->id])}}"
                    enctype="multipart/form-data">
                    @csrf
                    <button type="submit" class="btn btn-secondary float-right"><i class="fas fa-pencil-alt"></i>
                        @lang('Update') </button>
                    <div class="clearfix"></div>
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Product Details</h3>
                            <hr class="featurette-divider">
                            <div class="form-group row ">
                                <div class="col-md-6">
                                    <label for="Product Name">Product Name</label>
                                    <input class="form-control" type="text" name="product_name" required="required"
                                        placeholder="Product Name" value="{{$product->product_name}}">
                                </div>
                                <div class="col-md-3 col-xs-12">
                                    <label for="">Product Price </label>
                                    <input class="form-control" type="text" name="price" required="required"
                                        placeholder="Price" value="{{$product->price}}">
                                </div>
                                <div class="col-md-3 col-xs-12">
                                    <label for="">Product Quantity In stock </label>
                                    <input class="form-control" type="text" name="quantity" required="required"
                                        placeholder="Quantity" value="{{$product->quantity}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 col-xs-12">
                                    <label for="">Product Type</label>
                                    <select name="type"
                                        class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }} ">
                                        <option value="">Select Product Type</option>
                                        <option value="showcase"
                                            {{$product->type == 'showcase' ? 'selected="selected"': '' }}>For showcase
                                        </option>
                                        <option value="purchasable"
                                            {{$product->type == 'purchasable' ? 'selected="selected"': '' }}>For
                                            sale</option>
                                    </select>
                                </div>
                                <div class="col-md-3 col-xs-12">
                                    <label for="">Is featured product</label>
                                    <select name="is_featured"
                                        class="form-control{{ $errors->has('is_featured') ? ' is-invalid' : '' }} ">
                                        <option value="">Select Featured status</option>
                                        <option value="1"
                                            {{$product->is_featured == true ? 'selected="selected"': '' }}>Featured
                                        </option>
                                        <option value="0"
                                            {{$product->is_featured == false ? 'selected="selected"': '' }}>Not Featured
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-3 col-xs-12">
                                    <label for="">Is Product active</label>
                                    <select name="is_active"
                                        class="form-control{{ $errors->has('is_active') ? ' is-invalid' : '' }} ">
                                        <option value="0">Select Active Status</option>
                                        <option value="1" {{$product->is_active == true ? 'selected="selected"': '' }}>
                                            Active</option>
                                        <option value="0" {{$product->is_active == false ? 'selected="selected"': '' }}>
                                            Not Active</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Creator Name</label>
                                <input class="form-control" type="text" name="creator" required="required"
                                    placeholder="Creator Name" value="{{$product->creator}}">
                            </div>
                            <div class="form-group ">
                                <label for="Creator Brief Description">Creator Brief Description</label>
                                <textarea name="creator_brief_description" id="" cols="3" rows="3" class="form-control "
                                    placeholder="{{ __('Creator Brief Description')}}"> {{$product->creator_brief_description }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h3>Product Description, association, description</h3>
                            <hr class="featurette-divider">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="Product association">Product association</label>
                                    <select name="association_id"
                                        class="form-control{{ $errors->has('association_id') ? ' is-invalid' : '' }} "
                                        required="required">
                                        <option value="" selected>Select association </option>
                                        @foreach($associations as $association)
                                        <option value="{{$association->id}}"
                                            {{$product->association->id == $association->id ? 'selected="selected"': '' }}>
                                            {{$association->association_name }}
                                        </option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="Product Category">Product Category</label>
                                    <select name="category_id"
                                        class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }} "
                                        required="required">
                                        <option value="" selected>Select Category</option>
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}"
                                            {{$product->category->id == $category->id ? 'selected="selected"': '' }}>
                                            {{$category->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="Product description">Product description</label>
                                <textarea name="product_description" id="" cols="5" rows="5"
                                    class="form-control html-editor" placeholder="{{ __('association Description')}}">
                                     {{$product->product_description }}
                                    </textarea>
                            </div>

                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <div class="col-md-12 col-xs-12">
                            <h3>Product Images </h3>
                            <hr class="featurette-divider">
                            <input type="file" name="pictures[]" class="form-control-file" multiple />
                            <div id="target" class="grid mt-3">
                                @foreach($product->pictures()->get() as $image)
                                <img src="{{$image->url}}" alt="{{$product->product_name}}"
                                    class="img-thumbnail image-fluid w-25 h-25">
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-secondary float-right"><i class="fas fa-pencil-alt"></i>
                        @lang('Update') </button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->
@stop

@section('js')
<script src="/vendor/masonry.pkgd.min.  "></script>
<script>
$(function() {
    $("input[name='pictures[]'").on('change', function(event) {
        var files = event.target.files;
        for (i = 0; i < files.length; i++) {
            var image = files[i]
            var reader = new FileReader();
            reader.onload = function(file) {
                var img = new Image();
                img.src = file.target.result;
                console.log(img)
                $('#target').append(img);
                $('#target img').addClass(['grid-item img-fluid img-thumbnail w-25 h-25'])

            }
            reader.readAsDataURL(image);



        };
    });
});
</script>
@stop