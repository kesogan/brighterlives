@csrf
<input type="hidden" name="association_id" value="">
<div class="form-group row">
    <div class="col-md-6 col-xs-12">
        <label for="association_name">{{__('Association Name')}}</label>
        <input class="form-control" type="text" name="association_name" required="required"
            placeholder="{{__('Association Name')}}" autofocus>
    </div>
    <div class="col-md-6 col-xs-12">
        <label for="association_email">{{__('Association Email')}}</label>
        <input class="form-control" type="email" name="association_email" required="required"
            placeholder="{{__('Association Email')}}">
    </div>
</div>
<div class="form-group row">
    <div class="col-md-6 col-xs-12">
        <label for="association_address">{{__('Association Address')}}</label>
        <input class="form-control" type="text" name="association_address" required="required"
            placeholder="{{__('Association Address ')}}">
    </div>
    <div class="col-md-6 col-xs-12">
        <label for="association_contact">{{__('Association Contact')}}</label>
        <input class="form-control" type="text" name="association_contact" required="required"
            placeholder="{{__('Association Contact')}}">
    </div>
</div>
<div class="form-group row">
    <div class="col-md-6 col-xs-12">
        <label for="owner">{{__('Association Owner')}}</label>
        <select class="form-control" name="owner_id" required="required">
            <option value="">Select Association Owner</option>
            @foreach($owners as $owner)
            <option value="{{$owner->id}}">{{$owner->first_name ." ".$owner->last_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6 col-xs-12">
        <label for="assoc_status">{{__('Association Status')}}</label>
        <select name="is_active" class="form-control{{ $errors->has('is_active') ? ' is-invalid' : '' }} ">
            <option value="">Select Status</option>
            <option value="1" selected>Active</option>
            <option value="0">Not Active</option>
        </select>
    </div>
</div>
<div class="form-group row">
    <div class="col-md-6 col-xs-12">
        <label for="association_banner_color">{{__('Association Banner Color')}}</label>
        <input class="form-control" type="color" name="association_banner_color" required="required" value="ff00be">
    </div>
    <div class="col-md-6 col-xs-12">
        <label for="association_momo_master">{{__('Association Mobile Money Email')}}</label>
        <input class="form-control" type="text" name="association_momo_master" required="required"
            placeholder="{{__('Association Mobile Money Email ')}}">
    </div>
</div>
<div class="form-group">
    <label>{{ __('Association Description') }}</label>
    <textarea class="form-control {{ $editor_option == 'create' ? 'html-editor' : 'html-editor-edit'}}" type="text"
        name="association_description" value="" placeholder="Body">
    </textarea>
</div>
<div class="form-group row">
    <div class="col-md-12 col-xs-12">
        <label>Association Logo </label>
        <input class="form-control-file" type="file" onchange="readURL(this);" name="association_logo" />
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12" id="cate_image">
        <img id="img_loc" class="img-fluid img-thumbnail" src="https://via.placeholder.com/150x150"
            alt="Image Preview" />
    </div>
</div>