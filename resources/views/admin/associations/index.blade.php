@inject('request', 'Illuminate\Http\Request')
@extends('layouts.admin.master')

@section('title')
<title>{{__('Dashboard Associations Management Page')}}</title>
@endsection

@section('content_header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{__('Associations Management')}}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">{{__('Home')}}</a></li>
                    <li class="breadcrumb-item active">{{__('Associations Management')}}</li>
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
                <h3 class="card-title float-sm-left">{{__('Associations Table')}}</h3>
                <div class="float-sm-right">
                    <button class="btn btn-secondary" data-toggle="modal" data-target="#createAssociationModal"><i
                            class="fas fa-plus"></i> @lang('Create association')</button>
                    <!-- <button class="btn btn-warning" data-toggle="modal" data-target="#importAssociationModal" ><i class="fa fa-file-import"></i> @lang('Import Categorie')</button> -->
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="card-body">
                <div class="btn-group mb-3 mx-3">
                    <a href="{{ route('admin.associations.index') }}"
                        class="btn btn-sm btn-outline-secondary {{ request('show_deleted') == 1 ? '' : 'active' }}">All</a>
                    <a href="{{ route('admin.associations.index') }}?show_deleted=1"
                        class="btn btn-sm btn-outline-secondary {{ request('show_deleted') == 1 ? 'active' : '' }}">trash</a>
                </div>
                @include('flash::message')
                <table class="table table-bordered table-striped dataTable">
                    <thead class="thead-light">
                        <tr>
                            <th>{{ __('Association Name') }}</th>
                            <th>{{ __('Association Email') }}</th>
                            <th>{{ __('Association Logo') }}</th>
                            <th>{{ __('Association Address') }}</th>
                            <th>{{ __('Association Contact') }}</th>
                            <th>{{ __('Association Description') }}</th>
                            <th>{{ __('Association MoMo Master') }}</th>
                            <th>{{ __('Date Created') }}</th>
                            <th>{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($associations as $association)
                        <tr>
                            <td>{{$association->association_name}}</td>
                            <td>{{$association->association_email}}</td>
                            <td><img src="{{asset($association->association_logo)}}" alt="" class="img-thumbnail "></td>
                            <td>{{$association->association_address}}</td>
                            <td>{{$association->association_contact}}</td>
                            <td>{!! str_limit($association->association_description, 600) !!}</td>
                            <td>{{$association->association_momo_master}}</td>
                            <td>
                                {{$association->created_at->diffForHumans()}}
                            </td>
                            @if( request('show_deleted') == 1 )
                            <td>
                                {!! Form::open(array(
                                'style' => 'display: inline-block;',
                                'method' => 'POST',
                                'onsubmit' => "return confirm('Are your sure you want to restore?');",
                                'route' => ['admin.association.restore', $association->id])) !!}
                                {!! Form::button('<i class="fa fa-undo-alt"></i>', array('type'=>'submit','class' =>
                                'btn btn-icon mx-0 p-0 btn-link text-success')) !!}
                                {!! Form::close() !!}
                                {!! Form::open(array(
                                'style' => 'display: inline-block;',
                                'method' => 'DELETE',
                                'onsubmit' => "return confirm('Are your sure you want to delete?');",
                                'route' => ['admin.association.perma_del', $association->id])) !!}
                                {!! Form::button('<i class="fa fa-trash-alt"></i>', array('type'=>'submit','class' =>
                                'btn btn-icon mx-0 p-0 btn-link text-danger')) !!}
                                {!! Form::close() !!}
                            </td>
                            @else
                            <td>
                                <div class="btn-group mx-1">
                                    <a href="#" data-id="{{$association->id}}"
                                        data-url="/admin/association/edit/{{$association->id}}" data-toggle="modal"
                                        data-target="#editAssociationModal" class="mx-1"><i
                                            class="fas fa-edit text-secondary  "></i></a>
                                    <a data-url="/admin/association/delete/{{$association->id}}"
                                        class="text-danger mr-1 deleteBtn"><i class="fas fa-trash-alt "></i></a>
                                </div>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="tfoot-light">
                        <tr>
                            <th>{{ __('Association Name') }}</th>
                            <th>{{ __('Association Email') }}</th>
                            <th>{{ __('Association Logo') }}</th>
                            <th>{{ __('Association Address') }}</th>
                            <th>{{ __('Association Contact') }}</th>
                            <th>{{ __('Association Description') }}</th>
                            <th>{{ __('Association MoMo Master') }}</th>
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
@include('admin.associations.partials.create',['editor_option'=>'create'])
@include('admin.associations.partials.edit',['editor_option'=>'edit'])
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
    $('#editAssociationModal').on('show.bs.modal', function(event) {

        var editCategorieBtn = $(event.relatedTarget) // Button that triggered the modal
        var url = editCategorieBtn.data('url')
        var editAssociationModal = $(this)

        console.log(url);

        $.ajax({
            dataType: 'JSON',
            type: 'GET',
            url: url,
            success: function(response) {
                console.log(response)
                if (response.status == 'success') {
                    editAssociationModal.find('input[name="association_id"]').val(response
                        .data.id)
                    editAssociationModal.find('input[name="association_name"]').val(response
                        .data.association_name)
                    editAssociationModal.find('input[name="association_email"]').val(
                        response.data.association_email)
                    editAssociationModal.find('input[name="association_contact"]').val(
                        response.data.association_contact)
                    editAssociationModal.find('input[name="association_address"]').val(
                        response.data.association_address)
                    editAssociationModal.find('input[name="association_momo_master"]').val(
                        response.data.association_momo_master)
                    editAssociationModal.find('textarea[name="association_description"]')
                        .val(response.data.association_description)
                    editAssociationModal.find('select[name="owner_id"]').val(response.data
                        .owner_id).trigger('change')
                    if (response.data.is_active) {
                        editAssociationModal.find('select[name="is_active"]').val(1)
                            .trigger('change')
                    } else {
                        editAssociationModal.find('select[name="is_active"]').val(0)
                            .trigger('change')
                    }
                    if (response.data.association_logo != null) {
                        editAssociationModal.find('#img_loc').attr('src', response.data
                            .association_logo)
                    }
                    var content = response.data.association_description;

                    console.log(content)

                    $('.html-editor-edit').summernote({
                        pasteHTML: content,
                        toolbar: [
                            // [groupName, [list of button]]
                            ['style', ['bold', 'italic', 'underline', 'clear']],
                            ['font', ['strikethrough', 'superscript',
                                'subscript'
                            ]],
                            ['fontsize', ['fontsize']],
                            ['color', ['color']],
                            ['para', ['ul', 'ol', 'paragraph', 'header']],
                            ['height', ['height']]
                        ]
                    });


                }
                if (response.status == 'error') {
                    toastr.warning(response.data, "@lang('Oops Something is not alright')");
                }
            }
        });
    });


});
</script>
<script>
@include('admin.partials.delete-scripts')
</script>
@endpush