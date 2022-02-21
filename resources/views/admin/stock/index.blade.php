@extends('layouts.backend.app')

@section('title')
    {{$title}}
@stop

@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <style>
        .purchases_image_size {
            height: 60px;
            width: 60px;
            border-radius: 50%;
        }
    </style>
@endpush

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Purchases</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Purchases</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8">
                                    <h3>
                                        <strong>Purchase Product</strong>
                                        <span class="badge bg-blue">{{ $purchases->count() }}</span>
                                    </h3>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="text-right cutom_search" >
                                        <button type="button" title="Add Purchases Product" class="btn btn-primary" data-toggle="modal" data-target="#create">
                                            <i class="fa fa-plus-circle"></i>
                                            <span>Add Purchases</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="create">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Add Purchases Product</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin.purchase.store') }}" method="POST">
                                            @csrf
                                            <div class="row form-group">
                                                <div class="col-md-4 text-right">
                                                    <label >Product Name <span class="text-danger">*</span></label>
                                                </div>
                                                <div class="col-md-8">
                                                    <select name="product_id" id="product_id_code" class="form-control">
                                                        <option value="">Select One</option>
                                                        @foreach($products as $product)
                                                            <option value="{{ $product->id }}">{{$product->name}} - {{ $product->product_code }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group" id="product_code_show" style="display: none;">
                                                <div class="col-md-4 text-right">
                                                    <label >Product Code</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" readonly name="product_code" class="form-control" id="product_code_val">
                                                </div>
                                            </div>
                                            <div class="row form-group" id="name_show" style="display: none;">
                                                <div class="col-md-4 text-right">
                                                    <label >Product Name</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" readonly name="name" class="form-control" id="name_val">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-md-4 text-right">
                                                    <label >Product Quantity</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="number" name="quantity" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-md-4">
                                                    <label ></label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="submit" value="PUrchase Product" class="btn btn-success">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.modal -->
                        <div class="card-body">
                            <table id="dataTable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">SL No</th>
                                        <th class="text-center">Product Code</th>
                                        <th class="text-center">Product Image</th>
                                        <th class="text-center">Product Name</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-center">Stock Status</th>
                                        <th class="text-center">date in Stock</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($purchases as $key => $purchase)
                                        <tr>
                                            <td class="text-center">{{ $key + 1 }}</td>
                                            <td class="text-center">{{$purchase->product_code}}</td>
                                            <td class="text-center">
                                                <img class="purchases_image_size" src="{{ asset($purchase['product']['thambnail']) }}" alt="">
                                            </td>
                                            <td class="text-center">{{$purchase->name}}</td>
                                            <td class="text-center">{{$purchase->quantity}}</td>
                                            <td class="text-center">
                                                @if($purchase->quantity > 0 )
                                                    <span class="badge bg-success text-white">Stock Available</span>
                                                @else
                                                    <span class="badge bg-danger text-white">Out of Stock</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($purchase->updated_at)
                                                    {{ $purchase->updated_at->format('d M Y h:i A') }}
                                                @else
                                                    {{ $purchase->created_at->format('d M Y h:i A') }}
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <button title="Edit Brand" type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit_{{$key}}">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                            </td>
                                            <div class="modal fade" id="edit_{{$key}}">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit Purchase Product</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('admin.purchase.update', $purchase->id) }}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" value="{{ $purchase->id }}" name="for_edit_id">
                                                                <div class="row form-group">
                                                                    <div class="col-md-4 text-right">
                                                                        <label >Product Name <span class="text-danger">*</span></label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <select name="product_id" id="edit_product_id_code_{{ $purchase->id }}" onChange="editProductIdCode('{{ $purchase->id }}')" class="form-control">
                                                                            <option value="">Select One</option>
                                                                            @foreach($editproducts as $product)
                                                                                <option @if($purchase->product_id == $product->id) selected @endif value="{{ $product->id }}">{{$product->name}} - {{ $product->product_code }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col-md-4 text-right">
                                                                        <label >Product Code</label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="text" readonly name="product_code" id="product_code_val_{{ $purchase->id }}" value="{{$purchase->product_code}}" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col-md-4 text-right">
                                                                        <label >Product Name</label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="text" readonly name="name" id="name_val_{{ $purchase->id }}" value="{{$purchase->name}}" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col-md-4 text-right">
                                                                        <label >Product Quantity</label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="number" name="quantity" value="{{$purchase->quantity}}" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col-md-4">
                                                                        <label ></label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="submit" value="PUrchase Product" class="btn btn-success">
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script src="{{asset('backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('backend/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script>
        $(function () {
            $('#dataTable').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
    <script>
        $("#product_id_code").on('change', function(event) {
            // alert('id');
            var product_id = $("#product_id_code").val();
            // alert(product_id);
            if(product_id){
                $.ajax({
                    type    : "POST",
                    url     : "{{ route('admin.stock.purchase') }}",
                    data    : {
                            product_id: product_id,
                            _token: '{{csrf_token()}}',
                        },
                    success : function(data) {
                        console.log(data);
                        // show all hide row 
                        $("#product_code_show").show();
                        $("#name_show").show();
                        // show val on input field
                        $("#product_code_val").val(data[0]);
                        $("#name_val").val(data[1]);
                    },
                });
            }else {
                alert('Select your product');
            }
        });
        function editProductIdCode(id) {
            var product_id = $("#edit_product_id_code_"+id).val();
            // alert(product_id);
            if(product_id){
                $.ajax({
                    type    : "POST",
                    url     : "{{ route('admin.stock.purchase') }}",
                    data    : {
                            product_id: product_id,
                            _token: '{{csrf_token()}}',
                        },
                    success : function(data) {
                        console.log(data);
                        // show val on input field
                        $("#product_code_val_" + id).val(data[0]);
                        $("#name_val_" + id).val(data[1]);
                    },
                });
            }else {
                alert('Select your product');
            }
        };
    </script>
@endpush