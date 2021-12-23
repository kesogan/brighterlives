@inject('request', 'Illuminate\Http\Request')
@extends('layouts.admin.master')

@section('title')
<title>{{__('Dashboard Activities Edit  Page')}}</title>
@endsection

@section('content_header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{__('Edit Activity')}}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">{{__('Home')}}</a></li>
                    <li class="breadcrumb-item"><a href="/admin/activities">{{__('All Activities')}}</a></li>
                    <li class="breadcrumb-item active">{{__('Edit Activity')}}</li>
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
                <h3 class="card-title float-sm-left">{{__('Edit Activity')}}</h3>
                <div class="float-sm-right">
                    <a href="/admin/activities" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> {{ __('Back
                        to Activities Table') }}</a>
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
                <form method="POST" action="{{route('admin.activity.update',['activity_id', $activity->id])}}"
                    enctype="multipart/form-data">
                    @csrf
                    <button type="submit" class="btn btn-secondary float-right"><i class="fas fa-pencil-alt"></i>
                        {{ __('Update') }} </button>
                    <div class="clearfix"></div>
                    <input type="hidden" name="activity_id" value="{{$activity->id}}">
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Activity Details</h3>
                            <hr class="featurette-divider">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="activity association">activity association</label>
                                    <select name="association_id"
                                        class="form-control{{ $errors->has('association_id') ? ' is-invalid' : '' }} "
                                        required="required">
                                        <option value="" selected>Select association </option>
                                        @foreach($associations as $association)
                                        <option value="{{$association->id}}"
                                            {{$activity->association->id == $association->id ? 'selected="selected"': '' }}>
                                            {{$association->association_name }}
                                        </option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="activity Category">activity Category</label>
                                    <select name="category_id"
                                        class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }} "
                                        required="required">
                                        <option value="" selected>Select Category</option>
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}"
                                            {{$activity->category->id == $category->id ? 'selected="selected"': '' }}>
                                            {{$category->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <div class="col-md-6">
                                    <label for="activity Name">activity Name</label>
                                    <input class="form-control" type="text" name="activity_name" required="required"
                                        placeholder="activity Name" value="{{$activity->activity_name}}">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Creators Names</label>
                                    <input class="form-control" type="text" name="creator" required="required"
                                        placeholder="Creator Name" value="{{$activity->creator}}">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="Creator Brief Description">Creator Brief Description</label>
                                <textarea name="creator_brief_description" id="" cols="3" rows="3" class="form-control "
                                    placeholder="{{ __('Creator Brief Description')}}"> {{$activity->creator_brief_description }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h3>activity Description, association, description</h3>
                            <hr class="featurette-divider">
                            <div class="form-group row">
                                <div class="col-md-6 col-xs-12">
                                    <label for="">Is featured activity</label>
                                    <select name="is_featured"
                                        class="form-control{{ $errors->has('is_featured') ? ' is-invalid' : '' }} ">
                                        <option value="">Select Featured status</option>
                                        <option value="1"
                                            {{$activity->is_featured == true ? 'selected="selected"': '' }}>Featured
                                        </option>
                                        <option value="0"
                                            {{$activity->is_featured == false ? 'selected="selected"': '' }}>Not
                                            Featured
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <label for="">Is activity active</label>
                                    <select name="is_active"
                                        class="form-control{{ $errors->has('is_active') ? ' is-invalid' : '' }} ">
                                        <option value="0">Select Active Status</option>
                                        <option value="1" {{$activity->is_active == true ? 'selected="selected"': '' }}>
                                            Active</option>
                                        <option value="0"
                                            {{$activity->is_active == false ? 'selected="selected"': '' }}>
                                            Not Active</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="activity description">activity description</label>
                                <textarea name="activity_description" id="" cols="5" rows="5"
                                    class="form-control html-editor" placeholder="{{ __('association Description')}}">
                                     {{$activity->activity_description }}
                                    </textarea>
                            </div>

                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <div class="col-md-12 col-xs-12">
                            <h3>activity Images </h3>
                            <hr class="featurette-divider">
                            <input type="file" name="pictures[]" class="form-control-file" multiple />
                            <div id="target" class="grid mt-3">
                                @foreach($activity->pictures()->get() as $image)
                                <img src="{{$image->url}}" alt="{{$activity->activity_name}}"
                                    class="img-thumbnail image-fluid w-25 h-25">
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-secondary float-right"><i class="fas fa-pencil-alt"></i>
                        {{ __('Update') }} </button>
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
