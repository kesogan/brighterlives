@csrf
<input type="hidden" name="category_id" value="">
<div class="form-group row">
    <div class="col-md-12 col-xs-12">
        <label for="cat_name">{{__('Category Name')}}</label>
         <input class="form-control" type="text"  name="category_name" required="required" placeholder="{{__('Category Name')}}" autofocus>
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12 col-xs-12">
        <label for="cat_name">{{__('Category Description')}}</label>
        <textarea name="category_description" id="" cols="10" rows="4" class="form-control" placeholder="{{ __('Category Description')}}"></textarea>
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12 col-xs-12">
        <label for="cat_name">{{__('Category Status')}}</label>
        <select name="is_active" class="form-control{{ $errors->has('is_active') ? ' is-invalid' : '' }} ">
            <option value="" >Select Status</option>
            <option value="1" selected>Active</option>
            <option value="0" >Not Active</option>
        </select>
    </div>
</div>

