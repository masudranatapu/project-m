@extends('layouts.backend.app')

@section('title')
    {{$title}}
@stop

@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <style>
        .user-image-size {
            height: 50px;
            width: 50px;
            border-radius: 50%;
        }
        .view-user-image-size {
            height: 300px;
            height: 300px;
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
                    <h1>User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Users</li>
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
                                        <strong>All User</strong>
                                        <span class="badge bg-blue">{{ $users->count() }}</span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="dataTable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>SL No</th>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Profile Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $key => $user)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>
                                                <a href="mailto:{{ $user->name }}">{{ $user->name }}</a>
                                            </td>
                                            <td>
                                                <a href="tel:{{ $user->phone }}">{{ $user->phone }}</a>
                                            </td>
                                            <td>
                                                <img class="user-image-size" src="@if($user->image) {{ asset($user->image) }} @else {{ asset('demomedia/demoprofile.png') }} @endif" alt="">
                                            </td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit_{{$key}}">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </td>
                                            <div class="modal fade" id="edit_{{$key}}">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">View User Details</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12 text-center">
                                                                    <img class="view-user-image-size" src="@if($user->image) {{ asset($user->image) }} @else {{ asset('demomedia/demoprofile.png') }} @endif" alt="">
                                                                </div>
                                                                <div class="col-md-12 mt-3">
                                                                    <ul class="list-group">
                                                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                            User name
                                                                            <span class="text-right">{{$user->name}}</span>
                                                                        </li>
                                                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                            Email Address
                                                                            <span class="text-right"><a href="mailto:{{$user->email}}">{{$user->email}}</a></span>
                                                                        </li>
                                                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                            Phone Number
                                                                            <span class="text-right"><a href="tel:{{$user->phone}}">{{$user->phone}}</a></span>
                                                                        </li>
                                                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                            Address
                                                                            <span class="text-right">{{$user->address}}</span>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
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
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Profile Image</th>
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