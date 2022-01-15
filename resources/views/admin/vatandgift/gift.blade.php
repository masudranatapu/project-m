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
                    <h1>Gift Amount</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">About </li>
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
                                        <strong>About Us</strong>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <!-- /.modal -->
                        <div class="card-body">
                            <table id="dataTable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>SL No</th>
                                        <th>Gift Amount</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($giftamounts as $key => $giftamount)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $giftamount->gift_amount }} Tk</td>
                                            <td>
                                                @if($giftamount->status == 1)
                                                    <span class="badge bg-success text-white">Active</span>
                                                @else 
                                                    <span class="badge bg-info text-white">Inctive</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($giftamount->status == 1)
                                                    <a title="Inactive gift Amount" href="{{ route('admin.gift.inactive', $giftamount->id) }}" class="btn btn-danger"><i class="fa fa-angle-down"></i></a>
                                                @else
                                                    <a title="Active gift Amount" href="{{ route('admin.gift.active', $giftamount->id) }}" class="btn btn-success"><i class="fa fa-angle-up"></i></a>
                                                @endif
                                                <button type="button" title="Edit gift Amount" class="btn btn-warning" data-toggle="modal" data-target="#edit_{{$key}}">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                            </td>
                                            <div class="modal fade" id="edit_{{$key}}">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit Notice</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class="form-horizontal" action="{{ route('admin.gift-amount.update', $giftamount->id)}}"  method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="form-group row">
                                                                    <label class="col-sm-3 col-form-label">Gift Amount</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" name="gift_amount" value="{{$giftamount->gift_amount}}">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-3 col-form-label">Gift Amount</label>
                                                                    <div class="col-sm-9">
                                                                        <select name="status" class="form-control">
                                                                            <option value="" disabled >Select One</option>
                                                                            <option @if($giftamount->status == 1) selected @endif value="1">Active</option>
                                                                            <option @if($giftamount->status == 0) selected @endif value="0">Inactive</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <div class="offset-sm-3 col-sm-9">
                                                                        <button type="submit" class="btn btn-success">Update Gift Amount</button>
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
                                <tfoot>
                                    <tr>
                                        <th>SL No</th>
                                        <th>Gift Amount</th>
                                        <th>Status</th>
                                        <th>Action</th>
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