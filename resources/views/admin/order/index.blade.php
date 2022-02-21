@extends('layouts.backend.app')

@section('title')
    {{$title}}
@stop

@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
@endpush

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $title }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">{{ $title }}</li>
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
                                        <strong>{{ $title }}</strong>
                                        <span class="badge bg-blue">{{ $orders->count() }}</span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="dataTable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">SL No</th>
                                        <th class="text-center">Order Code</th>
                                        <th class="text-center">Order Date</th>
                                        <th class="text-center">Total</th>
                                        <th class="text-center">Payment Method</th>
                                        <th class="text-center">Payment Status</th>
                                        <th class="text-center">Order Status</th>
                                        <th class="text-center" width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $key => $order)
                                        <tr class="@if($order->order_status == 'Canceled') text-danger @endif">
                                            <td class="text-center">{{ $key + 1 }}</td>
                                            <td class="text-center">{{ $order->order_code }}</td>
                                            <td class="text-center">{{ $order->created_at->format('d M Y h:i A') }}</td>
                                            <td class="text-center">{{ $order->total }} TK</td>
                                            <td class="text-center">{{ $order->payment_method }}</td>
                                            <td class="text-center">{{ $order->status }}</td>
                                            <td class="text-center">
                                                @if($order->order_status == 'Canceled')
                                                    <span class="badge bg-danger text-white">Canceled</span>
                                                @else
                                                    @if($order->order_status == 'Successed')
                                                    <span class="badge bg-success text-white">Successed</span>
                                                    @else
                                                        <form action="{{ route('admin.orders.status') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="order_id" value="{{ $order->id }}">
                                                            <select name="order_status" id="" class="form-control" onchange="this.form.submit()">
                                                                <option value="">Select One</option>
                                                                <option @if($order->order_status == 'Pending') selected @endif value="Pending">Pending</option>
                                                                <option @if($order->order_status == 'Confirmed') selected @endif value="Confirmed">Confirmed</option>
                                                                <option @if($order->order_status == 'Processing') selected @endif value="Processing">Processing</option>
                                                                <option @if($order->order_status == 'Delivered') selected @endif value="Delivered">Delivered</option>
                                                                <option @if($order->order_status == 'Successed') selected @endif value="Successed">Successed</option>
                                                                <option @if($order->order_status == 'Canceled') selected @endif value="Canceled">Canceled</option>
                                                            </select>
                                                        </form>
                                                    @endif
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($order->order_status == 'Canceled')
                                                    <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-danger" title="View Order Details">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                @else
                                                    <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-success" title="View Order Details">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                @endif
                                            </td>
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
@endpush