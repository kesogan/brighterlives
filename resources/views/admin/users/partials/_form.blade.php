@csrf
<input type="hidden" name="user_id" value="">
<div class="form-group row">
    <div class="col-md-6 col-xs-12">
        <label for="first_name">{{__('First Name')}}</label>
        <input class="form-control" type="text" name="first_name" required="required" placeholder="{{__('First Name')}}"
            autofocus>
    </div>
    <div class="col-md-6 col-xs-12">
        <label for="last_name">{{__('Last Name')}}</label>
        <input class="form-control" type="text" name="last_name" required="required" placeholder="{{__('Last Name')}}">
    </div>
</div>
<div class="form-group row">
    <div class="col-md-6 col-xs-12">
        <label for="email">{{__('Email')}}</label>
        <input class="form-control" type="email" name="email" required="required" placeholder="{{__('Email ')}}">
    </div>
    <div class="col-md-6 col-xs-12">
        <label for="phone">{{__('Phone')}}</label>
        <input class="form-control" type="text" name="phone" required="required" placeholder="{{__('Phone Number')}}">
    </div>
</div>
<div class="form-group row">
    <div class="col-md-6 col-xs-12">
        <label for="role">{{__('Role')}}</label>
        <select class="form-control" type="role" name="role" required="required">
            <option value="">Select User Role</option>
            @foreach($roles as $role)
            <option value="{{$role->name}}">{{$role->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6 col-xs-12">
        <label for="cat_name">{{__('User Status')}}</label>
        <select name="is_active" class="form-control{{ $errors->has('is_active') ? ' is-invalid' : '' }} ">
            <option value="">Select Status</option>
            <option value="1" selected>Active</option>
            <option value="0">Ban</option>
        </select>
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12 col-xs-12">
        <label for="role">{{__('Role')}}</label>
        <select name="role" class="form-control{{ $errors->has('role') ? ' is-invalid' : '' }} ">
            <option value="" >Select Role</option>
            <option value="1" selected>Admin</option>
            <option value="0" >customer</option>
        </select>
    <div class="col-md-6 col-xs-12">
        <label for="password">{{__('Password')}}</label>
        <input class="form-control" type="password" name="password" required="required"
            placeholder="{{__('Password ')}}">
    </div>
    <div class="col-md-6 col-xs-12">
        <label for="conf_password">{{__('Confirm Password')}}</label>
        <input class="form-control" type="password" name="conf_password" required="required"
            placeholder="{{__('Confirm Password')}}">
    </div>
</div>
