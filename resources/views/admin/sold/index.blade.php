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
                    <h1>{{$title}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">{{$title}}</li>
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
                                <div class="col-md-5">
                                    <h3 class="mt-4">
                                        <strong>Sold Products</strong>
                                        <span class="badge bg-blue">{{ $solds->count() }}</span>
                                    </h3>
                                </div>
                                <div class="col-md-7">
                                    <form action="{{ route('admin.sold.search') }}" method="GET">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="">Product Code</label>
                                                <select name="product_code" id="" class="form-control">
                                                    <option value="" >Select Product Code</option>
                                                    @foreach($products as $product)
                                                        <option value="{{ $product->product_code }}">{{ $product->name }} - {{ $product->product_code }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">Form Date</label>
                                                <input type="date" name="formDate" placeholder="Form Date" class="form-control" value="{{$form}}">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="">To Date</label>
                                                <input type="date" name="toDate" placeholder="To Date" class="form-control" value="{{$to}}">
                                            </div>
                                            <div class="col-md-1 text-right">
                                                <br>
                                                <button type="submit" class="btn btn-success mt-2">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="dataTable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>SL No</th>
                                        <th>Order Id</th>
                                        <th>Order Code</th>
                                        <th>Product Id</th>
                                        <th>Product Code</th>
                                        <th>Product Name</th>
                                        <th>quantity</th>
                                        <th>Create</th>
                                        <th>View</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($solds as $key => $sold)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $sold->order_id }}</td>
                                            <td>{{ $sold->order_code }}</td>
                                            <td>{{ $sold->product_id }}</td>
                                            <td>{{ $sold->product_code }}</td>
                                            <td>{{ $sold->name }}</td>
                                            <td>{{ $sold->quantity }}</td>
                                            <td>{{ $sold->created_at->format('d M Y h:i A') }}</td>
                                            <td class="text-center">
                                                <button title="Edit Brand" type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit_{{$key}}">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                            </td>
                                            <div class="modal fade" id="edit_{{$key}}">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Order Information</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>SL No</th>
                                        <th>Order Id</th>
                                        <th>Order Code</th>
                                        <th>Product Id</th>
                                        <th>Product Code</th>
                                        <th>Product Name</th>
                                        <th>quantity</th>
                                        <th>Create</th>
                                        <th>View</th>
                                    </tr>
                                </tfoot>
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
@endpush