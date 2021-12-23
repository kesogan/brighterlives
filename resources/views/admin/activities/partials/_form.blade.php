@csrf
<div class="row">
    <div class="col-md-6">
        <h3>Activity Details</h3>
        <hr class="featurette-divider">
        <div class="form-group row">
            <div class="col-md-6">
                <label for="Activity association">Activity association</label>
                <select name="association_id"
                    class="form-control{{ $errors->has('association_id') ? ' is-invalid' : '' }} " required="required">
                    <option value="" selected>Select association </option>
                    @foreach($associations as $association)
                    <option value="{{$association->id}}">{{$association->association_name }}</option>
                    @endforeach

                </select>
            </div>
            <div class="col-md-6">
                <label for="Activity Category">Activity Category</label>
                <select name="category_id" class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }} "
                    required="required">
                    <option value="" selected>Select Category</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->category_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row ">
            <div class="col-md-6">
                <label for="Activity Name">Activity Name</label>
                <input class="form-control" type="text" name="activity_name" required="required"
                    placeholder="Activity Name" value="{{old('activity_name')}}">
            </div>
            <div class="col-md-6">
                <label for="">Creators Names</label>
                <input class="form-control" type="text" name="creator" required="required" placeholder="Creator Name"
                    value="{{old('creator')}}">
            </div>
        </div>
        <div class="form-group ">
            <label for="Creator Brief Description">Creators Brief Description</label>
            <textarea name="creator_brief_description" id="" cols="3" rows="3" class="form-control "
                placeholder="{{ __('Creator Brief Description')}}"></textarea>
        </div>
    </div>
    <div class="col-md-6">
        <h3>Activity Description and classification</h3>
        <hr class="featurette-divider">
        <div class="form-group row">
            <div class="col-md-6 col-xs-12">
                <label for="">Is featured Activity</label>
                <select name="is_featured" class="form-control{{ $errors->has('is_featured') ? ' is-invalid' : '' }} ">
                    <option value="">Select Featured status</option>
                    <option value="1" selected>Featured</option>
                    <option value="0">Not Featured</option>
                </select>
            </div>
            <div class="col-md-6 col-xs-12">
                <label for="">Is Activity active</label>
                <select name="is_active" class="form-control{{ $errors->has('is_active') ? ' is-invalid' : '' }} ">
                    <option value="0">Select Active Status</option>
                    <option value="1" selected>Active</option>
                    <option value="0">Not Active</option>
                </select>
            </div>
        </div>
        <div class="form-group ">
            <label for="Activity description">Activity description</label>
            <textarea name="activity_description" id="" cols="5" rows="5" class="form-control html-editor"
                placeholder="{{ __('association Description')}}">{{old('activity_description')}}</textarea>
        </div>
    </div>
</div>
<div class="form-group row mt-3">
    <div class="col-md-12 col-xs-12">
        <h3>Activity Images Details</h3>
        <hr class="featurette-divider">
        <input type="file" multiple name="pictures[]" class="form-control-file" />
        <div id="target" class="grid mt-3"></div>
    </div>
</div>