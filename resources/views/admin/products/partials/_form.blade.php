@csrf
<div class="row">
    <div class="col-md-6">
        <h3>Product Details</h3>
        <hr class="featurette-divider">

        <div class="form-group row ">
            <div class="col-md-6">
                <label for="Product Name">Product Name</label>
                <input class="form-control" type="text" name="product_name" required="required"
                    placeholder="Product Name">
            </div>
            <div class="col-md-3 col-xs-12">
                <label for="">Product Price </label>
                <input class="form-control" type="text" name="price" required="required" placeholder="Price">
            </div>
            <div class="col-md-3 col-xs-12">
                <label for="">Quantity In stock </label>
                <input class="form-control" type="text" name="quantity" required="required" placeholder="Quantity">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6 col-xs-12">
                <label for="">Product Type</label>
                <select name="type" class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }} ">
                    <option value="">Select Product Type</option>
                    <option value="showcase" selected>For showcase</option>
                    <option value="purchasable">For sale</option>
                </select>
            </div>
            <div class="col-md-3 col-xs-12">
                <label for="">Is featured product</label>
                <select name="is_featured" class="form-control{{ $errors->has('is_featured') ? ' is-invalid' : '' }} ">
                    <option value="">Select Featured status</option>
                    <option value="1" selected>Featured</option>
                    <option value="0">Not Featured</option>
                </select>
            </div>
            <div class="col-md-3 col-xs-12">
                <label for="">Is Product active</label>
                <select name="is_active" class="form-control{{ $errors->has('is_active') ? ' is-invalid' : '' }} ">
                    <option value="0">Select Active Status</option>
                    <option value="1" selected>Active</option>
                    <option value="0">Not Active</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="">Creator Name</label>
            <input class="form-control" type="text" name="creator" required="required" placeholder="Creator Name">
        </div>
        <div class="form-group ">
            <label for="Creator Brief Description">Creator Brief Description</label>
            <textarea name="creator_brief_description" id="" cols="3" rows="3" class="form-control "
                placeholder="{{ __('Creator Brief Description')}}"></textarea>
        </div>
    </div>
    <div class="col-md-6">
        <h3>Product Description, Category and association </h3>
        <hr class="featurette-divider">
        <div class="form-group row">
            <div class="col-md-6">
                <label for="Product association">Product association</label>
                <select name="association_id"
                    class="form-control{{ $errors->has('association_id') ? ' is-invalid' : '' }} " required="required">
                    <option value="" selected>Select association </option>
                    @foreach($associations as $association)
                    <option value="{{$association->id}}">{{$association->association_name }}</option>
                    @endforeach

                </select>
            </div>
            <div class="col-md-6">
                <label for="Product Category">Product Category</label>
                <select name="category_id" class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }} "
                    required="required">
                    <option value="" selected>Select Category</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->category_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group ">
            <label for="Product description">Product description</label>
            <textarea name="product_description" id="" cols="5" rows="5" class="form-control html-editor"
                placeholder="{{ __('association Description')}}"></textarea>
        </div>
    </div>
</div>
<div class="form-group row mt-3">
    <div class="col-md-12 col-xs-12">
        <h3>Product Images Details</h3>
        <hr class="featurette-divider">
        <input type="file" multiple name="pictures[]" class="form-control-file" />
        <div id="target" class="grid mt-3"></div>
    </div>
</div>
