@inject('request', 'Illuminate\Http\Request')
@extends('layouts.admin.master')

@section('title')
<title>{{__('ashboard Categorie Management Page')}}</title>
@endsection

@section('content_header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{__('Categories Page')}}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">{{__('Home')}}</a></li>
                    <li class="breadcrumb-item active">{{__('Categories Page')}}</li>
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
                <h3 class="card-title float-sm-left">{{__('Categories Table')}}</h3>
                <div class="float-sm-right">
                    <button class="btn btn-secondary" data-toggle="modal" data-target="#createCategoryModal"><i
                            class="fas fa-plus"></i> @lang('Create Category')</button>
                    <!-- <button class="btn btn-warning" data-toggle="modal" data-target="#importCategoryModal" ><i class="fa fa-file-import"></i> @lang('Import Categorie')</button> -->
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="card-body">
                <div class="btn-group mb-3 mx-3">
                    <a href="{{ route('admin.categories.index') }}"
                        class="btn btn-sm btn-outline-secondary {{ request('show_deleted') == 1 ? '' : 'active' }}">All</a>
                    <a href="{{ route('admin.categories.index') }}?show_deleted=1"
                        class="btn btn-sm btn-outline-secondary {{ request('show_deleted') == 1 ? 'active' : '' }}">trash</a>
                </div>
                @include('flash::message')
                <table class="table table-bordered table-striped dataTable">
                    <thead class="thead-light">
                        <tr>
                            <th>{{ __('Category Name') }}</th>
                            <th>{{ __('Category Description') }}</th>
                            <th>{{ __('Category Status') }}</th>
                            <th>{{ __('Date Created') }}</th>
                            <th>{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{$category->category_name}}</td>
                            <td>{{str_limit($category->category_description, 200)}}</td>
                            <td>
                                @if($category->is_active)
                                <span class="badge badge-success p-2">{{ __('Active') }}</span>
                                @else
                                <span class="badge badge-danger p-2">{{ __('Not Active') }}</span>
                                @endif
                            </td>
                            <td>
                                {{$category->created_at->diffForHumans()}}
                            </td>
                            @if( request('show_deleted') == 1 )
                            <td>
                                {!! Form::open(array(
                                'style' => 'display: inline-block;',
                                'method' => 'POST',
                                'onsubmit' => "return confirm('Are your sure you want to restore?');",
                                'route' => ['admin.category.restore', $category->id])) !!}
                                {!! Form::button('<i class="fa fa-undo-alt"></i>', array('type'=>'submit','class' =>
                                'btn btn-icon mx-0 p-0 btn-link text-success')) !!}
                                {!! Form::close() !!}
                                {!! Form::open(array(
                                'style' => 'display: inline-block;',
                                'method' => 'DELETE',
                                'onsubmit' => "return confirm('Are your sure you want to delete?');",
                                'route' => ['admin.category.perma_del', $category->id])) !!}
                                {!! Form::button('<i class="fa fa-trash-alt"></i>', array('type'=>'submit','class' =>
                                'btn btn-icon mx-0 p-0 btn-link text-danger')) !!}
                                {!! Form::close() !!}
                            </td>
                            @else
                            <td>
                                <div class="btn-group mx-1">
                                    <a href="#" data-id="{{$category->id}}"
                                        data-url="/admin/category/edit/{{$category->id}}" data-toggle="modal"
                                        data-target="#editCategoryModal" class="mx-1"><i
                                            class="fas fa-edit text-secondary  "></i></a>
                                    <a data-url="/admin/category/delete/{{$category->id}}"
                                        class="text-danger mr-1 deleteBtn"><i class="fas fa-trash-alt "></i></a>
                                </div>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="tfoot-light">
                        <tr>
                            <th>{{ __('Category Name') }}</th>
                            <th>{{ __('Category Description') }}</th>
                            <th>{{ __('Category Status') }}</th>
                            <th>{{ __('Date Created') }}</th>
                            <th>{{ __('Action') }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->
@include('admin.categories.partials.create')
@include('admin.categories.partials.edit')
{{-- End of container-fluid --}}
@stop

@push('footer-scripts')
<script>
$(document).ready(function() {
    $('.dataTable').DataTable({
        processing: false,
        responsive: true,
        serverSide: false,
        "bDestroy": true,
        scrollCollapse: true,
        paging: true,
        // order: [[8, 'desc'],[2,'asc']],
        "language": {
            "search": "@lang('Search'):",
            "lengthMenu": "@lang('Show') _MENU_ @lang('entries')",
            "emptyTable": "@lang('No data available in table')",
            "info": "@lang('Showing') _START_ @lang('to') _END_ @lang('of') _TOTAL_ @lang('entries')",
            "infoEmpty": "Showing 0 to 0 of 0 entries",
            "infoFiltered": "(@lang('filtered') @lang('from') _MAX_ @lang('total entries'))",
            "loadingRecords": "@lang('Loading...')",
            "processing": "@lang('Processing...')",
            "paginate": {
                "first": "@lang('First')",
                "last": "@lang('Last')",
                "next": "@lang('Next')",
                "previous": "@lang('Previous')"
            },
        },
    });
    $('#editCategoryModal').on('show.bs.modal', function(event) {

        var editCategorieBtn = $(event.relatedTarget) // Button that triggered the modal
        var url = editCategorieBtn.data('url')
        var editCategoryModal = $(this)

        console.log(url);

        $.ajax({
            dataType: 'JSON',
            type: 'GET',
            url: url,
            success: function(response) {
                console.log(response)
                if (response.status == 'success') {
                    editCategoryModal.find('input[name="category_id"]').val(response.data
                        .id)
                    editCategoryModal.find('input[name="category_name"]').val(response.data
                        .category_name)
                    editCategoryModal.find('textarea[name="category_description"]').val(
                        response.data.category_description)
                    if (response.data.is_active) {
                        editCategoryModal.find('select[name="is_active"]').val(1).trigger(
                            'change')
                    } else {
                        editCategoryModal.find('select[name="is_active"]').val(0).trigger(
                            'change')
                    }

                }
                if (response.status == 'error') {
                    toastr.warning(response.data, "@lang('Oops Something is not alright')");
                }
            }
        });
    });

    $('#deleteCategoryModal').on('show.bs.modal', function(event) {

        var rejectBtn = $(event.relatedTarget) // Button that triggered the modal
        var url = rejectBtn.data('url')
        var rejectionReasonModal = $(this)

        rejectionReasonModal.find('button[type="submit"]').attr('disabled', true);

        console.log(url);

        $.ajax({
            dataType: 'JSON',
            type: 'GET',
            url: url,
            success: function(response) {
                console.log(response)
                if (response.status == 'success') {
                    rejectionReasonModal.find('input[name="category_id"]').val(response
                        .data[0].id)

                    rejectionReasonModal.find('button[type="submit"]').attr('disabled',
                        false);
                }
                if (response.status == 'error') {
                    toastr.warning(response.data, '@lang("Oops Something is not alright")');
                }
            }
        });
    });

    $('#viewaCategoryImageModal').on('show.bs.modal', function(event) {

        var viewCategorieImageBtn = $(event.relatedTarget) // Button that triggered the modal
        var url = viewCategorieImageBtn.data('url')
        var viewCategorieImageModal = $(this)
        console.log(url);
        $.ajax({
            dataType: 'JSON',
            type: 'GET',
            url: url,
            success: function(response) {
                console.log(response)
                if (response.status == 'success') {
                    viewCategorieImageModal.find('div.image').html(
                        '<div class="text-center"> <img id="imageSrc" src="' + ((
                                response.data.category_image == null) ? '' : response
                            .data.category_image) +
                        '"   class="img-fluid" alt="..." ></div>')
                    viewCategorieImageModal.find('span.category_name').text(response.data
                        .category_name + ' - ' + response.category.id)
                }
                if (response.status == 'error') {
                    toastr.warning(response.data, 'Oops Something is not alright');
                }
            }
        });
        $(this).on('hidden.bs.modal', function(e) {
            viewCategorieImageModal.find('div.image').empty()
        });
    });
});
</script>
<script>
@include('admin.partials.delete-scripts')
</script>
@endpush