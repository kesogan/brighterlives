@inject('request', 'Illuminate\Http\Request')
@extends('layouts.admin.master')

@section('title')
<title>{{__('Dashboard Activities Management Page')}}</title>
@endsection

@section('content_header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{__('Activity Page')}}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">{{__('Home')}}</a></li>
                    <li class="breadcrumb-item active">{{__('Activities Page')}}</li>
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
                <h3 class="card-title float-sm-left">{{__('Activities Table')}}</h3>
                <div class="float-sm-right">
                    <a href="{{ route('admin.activities.create')}}" class="btn btn-secondary"><i
                            class="fas fa-plus"></i>
                        {{ __('Create Activity') }}</a>
                    <!-- <button class="btn btn-warning" data-toggle="modal" data-target="#importActivityModal" ><i class="fa fa-file-import"></i> @lang('Import Activity')</button> -->
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="card-body">
                <div class="btn-group mb-3 mx-3">
                    <a href="{{ route('admin.activities.index') }}"
                        class="btn btn-sm btn-outline-secondary {{ request('show_deleted') == 1 ? '' : 'active' }}">All</a>
                    <a href="{{ route('admin.activities.index') }}?show_deleted=1"
                        class="btn btn-sm btn-outline-secondary {{ request('show_deleted') == 1 ? 'active' : '' }}">trash</a>
                </div>
                @include('flash::message')
                <table class="table table-bordered table-hover dataTable">
                    <thead class="thead-light">
                        <tr>
                            <th>Activity Name</th>
                            <th>Images</th>
                            <th>Activity Association</th>
                            <th>Activity Category</th>
                            <th>Creator</th>
                            <th>Creator Brief Description</th>
                            <th>Activity Status</th>
                            <th>Created Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($activities as $activity)
                        <tr>
                            <td>{{$activity->activity_name}}</td>
                            <td>
                                <div class="row p-2">
                                    @foreach($activity->pictures()->where('is_active',1)->get() as $image)

                                    <div class="col p-1">
                                        <a href="{{$image->url}}" data-url="/admin/activity/edit/{{$activity->id}}"
                                            data-toggle="modal" data-target="#viewActivityImageModal">
                                            <img class="img-thumbnail display-img " src="{{asset($image->url)}}" />
                                        </a>
                                    </div>

                                    @endforeach
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('admin.associations.index',['association_id'=>$activity->association->id])}}"
                                    class="btn btn-link btn-sm mx-1"><i class="fas fa-project-diagram"></i>
                                    {{ $activity->association->association_name }}</a>
                            </td>
                            <td>
                                @if($activity->category)
                                <a href="{{ route('admin.categories.index',['category_id'=> $activity->category->id])}}"
                                    class="btn btn-link btn-sm mx-1"><i class="fas fa-th"></i>
                                    {{ $activity->category->slug }}</a>
                                @else
                                No category
                                @endif
                            </td>
                            <td>{{$activity->creator}}</td>
                            <td>{{$activity->creator_brief_description}}</td>
                            <td>
                                @if($activity->is_active)
                                <span class="badge badge-success p-2">{{ __('Active') }}</span>
                                @else
                                <span class="badge badge-danger p-2">{{ __('Not Active') }}</span>
                                @endif
                            </td>

                            <td>
                                {{$activity->created_at->diffForHumans()}}
                            </td>
                            @if( request('show_deleted') == 1 )
                            <td>
                                {!! Form::open(array(
                                'style' => 'display: inline-block;',
                                'method' => 'POST',
                                'onsubmit' => "return ConfirmRestore()",
                                'route' => ['admin.activity.restore', $activity->id])) !!}
                                {!! Form::button('<i class="fa fa-undo-alt"></i>', array('type'=>'submit','class' =>
                                'btn btn-sm btn-icon mx-0 p-0 btn-link text-success')) !!}
                                {!! Form::close() !!}
                                {!! Form::open(array(
                                'style' => 'display: inline-block;',
                                'method' => 'DELETE',
                                'onsubmit' => "return ConfirmDelete()",
                                'route' => ['admin.activity.perma_del', $activity->id])) !!}
                                {!! Form::button('<i class="fa fa-trash-alt"></i>', array('type'=>'submit','class' =>
                                'btn btn-icon mx-0 p-0 btn-link text-danger')) !!}
                                {!! Form::close() !!}
                            </td>
                            @else
                            <td>
                                <div class="btn-group mx-1">
                                    <a href="/admin/activity/edit/{{$activity->id}}" class="mx-1"><i
                                            class="fas fa-edit text-secondary "></i></a>
                                    <a href="#" class="deleteBtn  mr-1" data-id="{{$activity->id}}"
                                        data-url="/admin/activity/delete/{{$activity->id}}"><i
                                            class="fas fa-trash-alt text-danger "></i></a>
                                </div>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="tfoot-light">
                        <tr>
                            <th>Activity Name</th>
                            <th>Images</th>
                            <th>Activity Association</th>
                            <th>Activity Category</th>
                            <th>Creator</th>
                            <th>Creator Brief Description</th>
                            <th>Activity Status</th>
                            <th>Created Date</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->
{{-- End of container-fluid --}}
@stop

@push('footer-scripts')
<script>
$(document).ready(function() {
    $('.dataTable').DataTable({
        processing: true,
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
});
</script>
<script>
@include('admin.partials.delete-scripts')
</script>
@endpush
