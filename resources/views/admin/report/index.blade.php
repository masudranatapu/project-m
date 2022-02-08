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
                                <div class="col-md-8">
                                    <h3 class="mt-4">
                                        <strong>Products</strong>
                                        <span class="badge bg-blue">{{ $products->count() }}</span>
                                    </h3>
                                </div>
                                <div class="col-md-4">
                                    <form action="{{ route('admin.sold-product-report.search') }}" method="GET">
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-7">
                                                <label for="">Product Code</label>
                                                <select name="product_code" id="" class="form-control">
                                                    <option value="" >Select Product Code</option>
                                                    @foreach($myproducts as $myproduct)
                                                        <option value="{{ $myproduct->product_code }}">{{ $myproduct->name }} - {{ $myproduct->product_code }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-2">
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
                                        <th>Product code</th>
                                        <th>Title</th>
                                        <th>In Stock</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $key => $product)
                                        @php
                                            $purchases = App\Models\Purchases::where('product_id', $product->id)->sum('quantity');
                                            $sold = App\Models\Sold::where('product_id', $product->id)->sum('quantity');
                                            $stock =  $purchases - $sold;
                                        @endphp
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $product->product_code }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>
                                                @if($stock <= 0)
                                                    <span class="bg-success text-white">No Product In Stock</span>
                                                @else
                                                    {{ $stock }} Pices
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>SL No</th>
                                        <th>Product code</th>
                                        <th>Title</th>
                                        <th>In Stock</th>
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