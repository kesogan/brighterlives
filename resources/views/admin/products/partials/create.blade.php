@inject('request', 'Illuminate\Http\Request')
@extends('layouts.admin.master')

@section('title')
<title>{{__('Dashboard Products Creation  Page')}}</title>
@endsection

@section('content_header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{__('Create Proudcts')}}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">{{__('Home')}}</a></li>
                    <li class="breadcrumb-item"><a href="/admin/products">{{__('All Products')}}</a></li>
                    <li class="breadcrumb-item active">{{__('Create Product')}}</li>
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
                <h3 class="card-title float-sm-left">{{__('Create Product')}}</h3>
                <div class="float-sm-right">
                    <a href="{{route('admin.products.index')}}" class="btn btn-secondary"><i
                            class="fas fa-arrow-left"></i> @lang('Back to Product Table')</a>
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
                <form class="" method="POST" action="{{route('admin.product.store')}}" enctype="multipart/form-data">
                    <button type="submit" class="btn btn-secondary float-right"><i class="fas fa-pencil-alt"></i>
                        @lang('Create') </button>
                    <div class="clearfix"></div>
                    @include('admin.products.partials._form')

                    <button type="submit" class="btn btn-secondary float-right"><i class="fas fa-pencil-alt"></i>
                        @lang('Create') </button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->
@stop

@push('footer-scripts')
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
                $('#target img').addClass(['grid-item img-fluid img-thumbnail mx-1 my-1 w-25 h-25'])
            }
            reader.readAsDataURL(image);
        };
    });
});
</script>
@endpush
