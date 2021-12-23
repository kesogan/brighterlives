@inject('request', 'Illuminate\Http\Request')
@extends('layouts.admin.master')

@section('title')
<title>{{__('Dashboard Activity Log Management Page')}}</title>
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
                    <li class="breadcrumb-item active">{{__('Activity Management')}}</li>
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
                <h3 class="card-title float-sm-left">{{__('Activity Logs Table')}}</h3>
                <div class="float-sm-right">
                    <!-- <button class="btn btn-secondary" data-toggle="modal" data-target="#createAdvertModal" ><i class="fas fa-plus"></i> @lang('Create Advert')</button> -->
                    <!-- <button class="btn btn-warning" data-toggle="modal" data-target="#importAdvertModal" ><i class="fa fa-file-import"></i> @lang('Import Advert')</button> -->
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="card-body">
                <div class="search float-right">
                    <form class="form-inline " method="POST" id="search-form" role="form">
                         @csrf
                        <div class=" row">
                            <div class="form-group ">
                                <!-- <label for="request_date">Start Date</label> -->
                                <div class="col-md-10 col-lg-10 col-sm-12">
                                    <input type="text" class="form-control" id="request_date_range" name="daterange" placeholder="Date Range Select" value=" ">
                                </div>
                            </div>
                            <div class="form-group col-md-2 ">
                                <button type="submit" class="btn btn-secondary "><i class="fa fa-search"></i> @lang('Filter')</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="clearfix"></div>
                <hr>
                @include('flash::message')
                <table class="table table-bordered table-striped dataTable">
                  <thead class="thead-light">
                        <tr>
                            <!-- <th>Action</th> -->
                            <th>Log Author</th>
                            @hasrole('admin')
                            <th>Log Assoc</th>
                            @else
                            @endhasrole
                            <th>Log tag</th>
                            <th>Log Message</th>
                            <th>Log Date</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                        <tr>
                            <!-- <th>Action</th> -->
                            <th>Log Author</th>
                             @hasrole('admin')
                            <th>Log Assoc</th>
                            @else
                            @endhasrole
                            <th>Log tag</th>
                            <th>Log Message</th>
                            <th>Log Date</th>
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
        var oTable  =   $('.dataTable').DataTable({
            processing: true,
            serverSide: true,
            "bDestroy": true,
            scrollY:  "1000px",
            // scrollX: true,
            scrollCollapse: true,
            paging:         true,
            ajax: {
                url: '{!! route('datatables.activitylog') !!}',
                data: function (d) {
                    d.REQUEST_DATE = $('#request_date_range').val();
                   // console.log(d.REQUEST_DATE);
                }

            },
            columns: [
                // { data: 'action', name: 'action', orderable: false, searchable: false},
                { data: 'logger', name:'logger'},
                @hasrole('admin')
                { data: 'model_id', name: 'model_id' },
                @else
                @endhasrole
                { data: 'log_action', name: 'log_action' },
                { data: 'log_message', name: 'log_message' },
                { data: 'created_at', name: 'created_at' },
            ],
            // order: [[8, 'desc'],[2,'asc']],
            "language": {
                "search": "@lang('Search'):",
                "lengthMenu":     "@lang('Show') _MENU_ @lang('entries')",
                "emptyTable":     "@lang('No data available in table')",
                "info":           "@lang('Showing') _START_ @lang('to') _END_ @lang('of') _TOTAL_ @lang('entries')",
                "infoEmpty":      "Showing 0 to 0 of 0 entries",
                "infoFiltered":   "(@lang('filtered') @lang('from') _MAX_ @lang('total entries'))",
                "loadingRecords": "@lang('Loading...')",
                "processing":     "@lang('Processing...')",
                "paginate": {
                    "first":      "@lang('First')",
                    "last":       "@lang('Last')",
                    "next":       "@lang('Next')",
                    "previous":   "@lang('Previous')"
                },
              },
        });
    });
</script>
@endpush
