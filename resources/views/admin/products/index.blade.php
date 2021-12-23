@inject('request', 'Illuminate\Http\Request')
@extends('layouts.admin.master')

@section('title')
<title>{{__('Dashboard Products Management Page')}}</title>
@endsection

@section('content_header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{__('Proudcts Page')}}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">{{__('Home')}}</a></li>
                    <li class="breadcrumb-item active">{{__('Products Page')}}</li>
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
                <h3 class="card-title float-sm-left">{{__('Products Table')}}</h3>
                <div class="float-sm-right">
                    <a href="{{ route('admin.products.create')}}" class="btn btn-secondary"><i class="fas fa-plus"></i>
                        {{ __('Create Product') }}</a>
                    <!-- <button class="btn btn-warning" data-toggle="modal" data-target="#importProductModal" ><i class="fa fa-file-import"></i> @lang('Import Product')</button> -->
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="card-body">
                <div class="btn-group mb-3 mx-3">
                    <a href="{{ route('admin.products.index') }}"
                        class="btn btn-sm btn-outline-secondary {{ request('show_deleted') == 1 ? '' : 'active' }}">All</a>
                    <a href="{{ route('admin.products.index') }}?show_deleted=1"
                        class="btn btn-sm btn-outline-secondary {{ request('show_deleted') == 1 ? 'active' : '' }}">trash</a>
                </div>
                @include('flash::message')
                <table class="table table-bordered table-hover dataTable">
                    <thead class="thead-light">
                        <tr>
                            <th>Product Name</th>
                            <th>Images</th>
                            <th>Product Association</th>
                            <th>Product Category</th>
                            <th>Product creator</th>
                            <th>Product Status</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{$product->product_name}}</td>
                            <td>
                                <div class="row p-2">
                                    @foreach($product->pictures()->where('is_active',1)->get() as $image)

                                    <div class="col p-1">
                                        <a href="{{$image->url}}" data-url="/admin/product/edit/{{$product->id}}"
                                            data-toggle="modal" data-target="#viewProductImageModal">
                                            <img class="img-thumbnail display-img " src="{{asset($image->url)}}" />
                                        </a>
                                    </div>

                                    @endforeach
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('admin.associations.index',['association_id'=>$product->association->id])}}"
                                    class="btn btn-link btn-sm mx-1"><i class="fas fa-project-diagram"></i>
                                    {{ $product->association->association_name }}</a>
                            </td>
                            <td>
                                @if($product->category)
                                <a href="{{ route('admin.categories.index',['category_id'=> $product->category->id])}}"
                                    class="btn btn-link btn-sm mx-1"><i class="fas fa-th"></i>
                                    {{ $product->category->slug }}</a>
                                @else
                                No category
                                @endif
                            </td>
                            <td>{{ $product->creator }}</td>
                            <td>
                                @if($product->is_active)
                                <span class="badge badge-success p-2">{{ __('Active') }}</span>
                                @else
                                <span class="badge badge-danger p-2">{{ __('Not Active') }}</span>
                                @endif
                            </td>
                            <td>{{$product->price}}</td>
                            <!-- <td>{{$product->sold_price}}</td> -->
                            <td>{{$product->quantity}}</td>
                            <!-- <td>
                            {{$product->created_at->diffForHumans()}}
                        </td> -->
                            @if( request('show_deleted') == 1 )
                            <td>
                                {!! Form::open(array(
                                'style' => 'display: inline-block;',
                                'method' => 'POST',
                                'onsubmit' => "return ConfirmRestore()",
                                'route' => ['admin.product.restore', $product->id])) !!}
                                {!! Form::button('<i class="fa fa-undo-alt"></i>', array('type'=>'submit','class' =>
                                'btn btn-sm btn-icon mx-0 p-0 btn-link text-success')) !!}
                                {!! Form::close() !!}
                                {!! Form::open(array(
                                'style' => 'display: inline-block;',
                                'method' => 'DELETE',
                                'onsubmit' => "return ConfirmDelete()",
                                'route' => ['admin.product.perma_del', $product->id])) !!}
                                {!! Form::button('<i class="fa fa-trash-alt"></i>', array('type'=>'submit','class' =>
                                'btn btn-icon mx-0 p-0 btn-link btn-sm btn-danger')) !!}
                                {!! Form::close() !!}
                            </td>
                            @else
                            <td>
                                <div class="btn-group mx-1">
                                    <a href="/admin/product/edit/{{$product->id}}" class="mx-1"><i
                                            class="fas fa-edit text-secondary "></i></a>
                                    <a href="#" class="deleteBtn  mr-1" data-id="{{$product->id}}"
                                        data-url="/admin/product/delete/{{$product->id}}"><i
                                            class="fas fa-trash-alt text-danger "></i></a>
                                </div>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="tfoot-light">
                        <tr>
                            <th>Product Name</th>
                            <th>Images</th>
                            <th>Product Association</th>
                            <th>Product Category</th>
                            <th>Product Creator</th>
                            <th>Product Status</th>
                            <th>Price</th>
                            <th>Quantity</th>
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

    $('#deleteProductModal').on('show.bs.modal', function(event) {

        var rejectBtn = $(event.relatedTarget) // Button that triggered the modal
        var url = rejectBtn.data('url')
        var rejectionReasonModal = $(this)

        console.log(url);

        $.ajax({
            dataType: 'JSON',
            type: 'GET',
            url: url,
            success: function(response) {
                console.log(response)
                if (response.status == 'success') {
                    rejectionReasonModal.find('input[name="product_id"]').val(response.data[
                        0].id)
                }
                if (response.status == 'error') {
                    toastr.warning(response.data, '@lang("Oops Something is not alright")');
                }
            }
        });
    });

    $('#viewaFrmImageModal').on('show.bs.modal', function(event) {

        var viewProductImageBtn = $(event.relatedTarget) // Button that triggered the modal
        var url = viewProductImageBtn.data('url')
        var viewProductImageModal = $(this)
        console.log(url);
        $.ajax({
            dataType: 'JSON',
            type: 'GET',
            url: url,
            success: function(response) {
                console.log(response)
                if (response.status == 'success') {
                    viewProductImageModal.find('div.image').html(
                        '<div class="text-center"> <img id="imageSrc" src="' + ((
                                response.data.Product_image_path == null) ? '' :
                            response.data.Product_image_path) +
                        '"   class="img-fluid" alt="..." ></div>')
                    viewProductImageModal.find('span.Product_name').text(response.data
                        .Product_name + ' - ' + response.data.Product_brand)
                }
                if (response.status == 'error') {
                    toastr.warning(response.data, 'Oops Something is not alright');
                }
            }
        });
        $(this).on('hidden.bs.modal', function(e) {
            viewProductImageModal.find('div.image').empty()
        });
    });
});
</script>
<script>
@include('admin.partials.delete-scripts')
</script>
@endpush