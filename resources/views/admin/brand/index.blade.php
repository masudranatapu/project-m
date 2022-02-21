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
                    <h1>Brands</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Brand</li>
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
                                        <strong>Brands</strong>
                                        <span class="badge bg-blue">{{ $brands->count() }}</span>
                                    </h3>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="text-right cutom_search" >
                                        <button type="button" title="Add Brands" class="btn btn-primary" data-toggle="modal" data-target="#create">
                                            <i class="fa fa-plus-circle mr-2"></i>
                                            <span>Add Brands</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="create">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Create Brands</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" action="{{route('admin.brands.store')}}" enctype="multipart/form-data" method="post">
                                            @csrf
                                            <div class="form-group row">
                                                <label class="col-md-3 text-right col-form-label">Brands Name</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" name="name" placeholder="Brands Name">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3 text-right col-form-label">Brand Website Link</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" name="link" placeholder="Brand website link">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3 text-right col-form-label">brands Image</label>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" onChange="brandImage(this)" name="image" class="custom-file-input" required>
                                                            <label class="custom-file-label">Choose file</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3 text-right col-form-label"></label>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <img src="{{ asset('demomedia/demo.jpg') }}" id="showbrandImage" style="width: 100px; height: 100px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-sm-3 col-sm-9">
                                                    <button type="submit" class="btn btn-success">Create Brand</button>
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
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Image</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($brands as $key => $brand)
                                        <tr>
                                            <td class="text-center">{{ $key + 1 }}</td>
                                            <td class="text-center">{{ $brand->name }}</td>
                                            <td class="text-center">
                                                <img width="60" height="60" src="{{ asset($brand->image) }}">
                                            </td>
                                            <td class="text-center">
                                                @if($brand->status == 1)
                                                    <a title="Inactive Now" href="{{ route('admin.brands.inactive', $brand->id) }}" class="btn btn-success">
                                                        Active
                                                    </a>
                                                @else
                                                    <a title="Active Now" href="{{ route('admin.brands.active', $brand->id) }}" class="btn btn-danger">
                                                        Inactive
                                                    </a>
                                                @endif
                                            </td class="text-center">
                                            <td class="text-center">
                                                <button title="Edit Brand" type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit_{{$key}}">
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
                                                            <form class="form-horizontal" action="{{ route('admin.brands.update', $brand->id)}}" enctype="multipart/form-data" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 text-right col-form-label">Brand Name</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="name" value="{{$brand->name}}">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 text-right col-form-label">Brand Website Link</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" name="link" value="{{$brand->link}}">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 text-right col-form-label">Brand Image</label>
                                                                    <div class="col-md-9">
                                                                        <div class="input-group">
                                                                            <div class="custom-file">
                                                                                <input type="file" onChange="brandImageUpdate(this)" name="image" class="custom-file-input">
                                                                                <label class="custom-file-label">Choose file</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-md-3 text-right col-form-label"></label>
                                                                    <div class="col-md-9">
                                                                        <div class="input-group">
                                                                            <img src="{{asset($brand->image)}}" class="brandImageUpdateshow" style="width: 100px; height: 100px;">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <div class="offset-sm-3 col-sm-9">
                                                                        <button type="submit" class="btn btn-success">Update Brand</button>
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
        function brandImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showbrandImage').attr('src', e.target.result)
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script>
        function brandImageUpdate(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.brandImageUpdateshow').attr('src', e.target.result)
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush