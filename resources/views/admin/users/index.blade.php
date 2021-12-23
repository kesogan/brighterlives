@inject('request', 'Illuminate\Http\Request')
@extends('layouts.admin.master')

@section('title')
<title>Dashboard Users Management Page</title>
@endsection

@section('content_header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Users Page</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item active">Users Page</li>
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
                <h3 class="card-title float-sm-left">{{__('Users Table')}}</h3>
                <div class="float-sm-right">
                    <button class="btn btn-secondary" data-toggle="modal" data-target="#createUserModal"><i
                            class="fas fa-plus"></i> @lang('Create User')</button>
                    <!-- <button class="btn btn-warning" data-toggle="modal" data-target="#importUserModal" ><i class="fa fa-file-import"></i> @lang('Import Categorie')</button> -->
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="card-body">
                <div class="btn-group mb-3 mx-3">
                    <a href="{{ route('admin.users.index') }}"
                        class="btn btn-sm btn-outline-secondary {{ request('show_deleted') == 1 ? '' : 'active' }}">All</a>
                    <a href="{{ route('admin.users.index') }}?show_deleted=1"
                        class="btn btn-sm btn-outline-secondary {{ request('show_deleted') == 1 ? 'active' : '' }}">trash</a>
                </div>
                @include('flash::message')
                <table class="table table-bordered table-striped dataTable">
                    <thead class="thead-light">
                        <tr>
                            <th>{{ __('User Last Name') }}</th>
                            <th>{{ __('User First Name') }}</th>
                            <th>{{ __('User Email') }}</th>
                            <th>{{ __('User Phone') }}</th>
                            <th>{{ __('User Role') }}</th>
                            <th>{{ __('User status') }}</th>
                            <th>{{ __('Date Created') }}</th>
                            <th>{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$user->last_name}}</td>
                            <td>{{$user->first_name}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                @if($user->hasRole(['admin']))
                                <span class="badge badge-info p-1">Admin</span>
                                @elseif($user->hasRole(['customer']))
                                <span class="badge badge-secondary p-1">Customer</span>
                                @else
                                <span class="badge badge-warning p-1">Association Owner</span>
                                @endif
                            </td>
                            <td>
                                @if($user->is_active)
                                <span class="badge badge-success p-1">Active</span>
                                @else
                                <span class="badge badge-danger p-1">Banned</span>
                                @endif
                            </td>
                            <td>
                                {{$user->created_at->diffForHumans()}}
                            </td>
                            @if( request('show_deleted') == 1 )
                            <td>
                                {!! Form::open(array(
                                'style' => 'display: inline-block;',
                                'method' => 'POST',
                                'onsubmit' => "return confirm('Are your sure you want to restore?');",
                                'route' => ['admin.user.restore', $user->id])) !!}
                                {!! Form::button('<i class="fa fa-undo-alt"></i>', array('type'=>'submit','class' =>
                                'btn btn-icon mx-0 p-0 btn-link text-success')) !!}
                                {!! Form::close() !!}
                                {!! Form::open(array(
                                'style' => 'display: inline-block;',
                                'method' => 'DELETE',
                                'onsubmit' => "return confirm('Are your sure you want to delete?');",
                                'route' => ['admin.user.perma_del', $user->id])) !!}
                                {!! Form::button('<i class="fa fa-trash-alt"></i>', array('type'=>'submit','class' =>
                                'btn btn-icon mx-0 p-0 btn-link text-danger')) !!}
                                {!! Form::close() !!}
                            </td>
                            @else
                            <td>
                                <div class="btn-group mx-1">
                                    <a href="#" data-id="{{$user->id}}" data-url="/admin/user/edit/{{$user->id}}"
                                        data-toggle="modal" data-target="#editUserModal" class="mx-1"><i
                                            class="fas fa-edit text-secondary "></i></a>
                                    <a data-url="/admin/user/delete/{{$user->id}}" class="text-danger mr-1 deleteBtn"><i
                                            class="fas fa-trash-alt "></i></a>
                                </div>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="tfoot-light">
                        <tr>
                            <th>{{ __('User Last Name') }}</th>
                            <th>{{ __('User First Name') }}</th>
                            <th>{{ __('User Email') }}</th>
                            <th>{{ __('User phone') }}</th>
                            <th>{{ __('User Role') }}</th>
                            <th>{{ __('User status') }}</th>
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
@include('admin.users.partials.create')
@include('admin.users.partials.edit')
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
    $('#editUserModal').on('show.bs.modal', function(event) {

        var editCategorieBtn = $(event.relatedTarget) // Button that triggered the modal
        var url = editCategorieBtn.data('url')
        var editUserModal = $(this)

        console.log(url);

        $.ajax({
            dataType: 'JSON',
            type: 'GET',
            url: url,
            success: function(response) {
                console.log(response)
                if (response.status == 'success') {
                    editUserModal.find('input[name="user_id"]').val(response.data.id)
                    editUserModal.find('input[name="first_name"]').val(response.data
                        .first_name)
                    editUserModal.find('input[name="last_name"]').val(response.data
                        .last_name)
                    editUserModal.find('input[name="phone"]').val(response.data.phone)
                    editUserModal.find('input[name="email"]').val(response.data.email)
                    editUserModal.find('select[name="role"]').val(response.role)
                    editUserModal.find('select[name="is_active"]').val(response.data
                            .is_active).trigger('change')
                        .trigger('change')
                    if (response.data.is_active) {
                        editUserModal.find('select[name="is_active"]').val(1).trigger(
                            'change')
                    } else {
                        editUserModal.find('select[name="is_active"]').val(0).trigger(
                            'change')
                    }

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
