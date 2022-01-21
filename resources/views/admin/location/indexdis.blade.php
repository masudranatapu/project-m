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
                    <h1>District</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Districts</li>
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
                                        <strong>District</strong>
                                        <span class="badge bg-blue">{{ $districts->count() }}</span>
                                    </h3>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="text-right cutom_search" >
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
                                            <i class="fa fa-plus-circle"></i>
                                            <span>Add Districts</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="create">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Create District</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" action="{{route('admin.district.store')}}" method="post">
                                            @csrf
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Division Name</label>
                                                <div class="col-sm-8">
                                                    <select name="division_id" class="form-control">
                                                        <option value="" disabled selected>Select One</option>
                                                        @foreach($divisions as $division)
                                                            <option value="{{$division->id}}">{{$division->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">District Name</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="name" placeholder="District Name">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Charge</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="charge" placeholder="Charge">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-sm-4 col-sm-8">
                                                    <button type="submit" class="btn btn-success">Create District</button>
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
                                        <th>SL No</th>
                                        <th>Division</th>
                                        <th>Name</th>
                                        <th>Charge</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($districts as $key => $district)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $district['division']['name'] }}</td>
                                            <td>{{ $district->name }}</td>
                                            <td>{{ $district->charge }} TK</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit_{{$key}}">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn btn-danger waves-effect" type="button" onclick="deleteData({{ $district->id }})">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                                <form id="delete-form-{{ $district->id }}" action="{{ route('admin.district.destroy', $district->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
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
                                                            <form class="form-horizontal" action="{{ route('admin.district.update', $district->id)}}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="form-group row">
                                                                    <label class="col-sm-4 col-form-label">Division Name</label>
                                                                    <div class="col-sm-8">
                                                                        <select name="division_id" class="form-control">
                                                                            <option value="" disabled selected >Select One</option>
                                                                            @foreach($divisions as $division)
                                                                                <option @if( $division->id == $district->division_id ) selected @endif  value="{{$division->id}}">{{$division->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-4 col-form-label">District Name</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" class="form-control" name="name" value="{{$district->name}}">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-4 col-form-label">Charge</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" class="form-control" name="charge" value="{{$district->charge}}">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <div class="offset-sm-4 col-sm-8">
                                                                        <button type="submit" class="btn btn-success">Update District</button>
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
                                        <th>Division</th>
                                        <th>Name</th>
                                        <th>Charge</th>
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
    <script src="{{asset('massage/sweetalert/sweetalert.all.js')}}"></script>
    <script type="text/javascript">
        function deleteData(id) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    // event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your data is safe :-)',
                        'error'
                    )
                }
            })
        }
    </script>
@endpush