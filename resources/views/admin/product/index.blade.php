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
                    <h1>Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Product</li>
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
                                        <strong>Category</strong>
                                        <span class="badge bg-blue"></span>
                                    </h3>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="text-right cutom_search" >
                                        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
                                            <i class="fa fa-plus-circle"></i>
                                            <span>Add Product</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.modal -->
                        <div class="card-body">
                            <table id="dataTable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">SL</th>
                                        <th class="text-center">Product code</th>
                                        <th class="text-center">Thambnail</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Sell price</th>
                                        <th class="text-center">Regular price</th>
                                        <th class="text-center">Discount</th>
                                        <th class="text-center">Category Name</th>
                                        <th class="text-center">Availability</th>
                                        <th class="text-center">Product Type</th>
                                        <th class="text-center">Upload By</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $key => $product)
                                        <tr>
                                            <td class="text-center">{{$key + 1}}</td>
                                            <td class="text-center">{{$product->product_code}}</td>
                                            <td class="text-center">
                                                <img width="50" height="50" src="{{ asset($product->thambnail) }}">
                                            </td>
                                            <td class="text-center">{{$product->name}}</td>
                                            <td class="text-center">{{$product->sell_price}} TK</td>
                                            <td class="text-center">
                                                @if($product->regular_price)
                                                    {{ $product->regular_price }} TK
                                                @else
                                                    {{$product->sell_price}} TK
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($product->discount)
                                                    {{ $product->discount }} % 
                                                @else 
                                                    <span class="badge bg-warning">No Discount</span>
                                                @endif
                                            </td>
                                            <td class="text-center">{{$product['category']['name']}}</td>
                                            <td class="text-center">
                                                @if($product->availability == 1)
                                                    <span class="badge bg-success">Availability</span>
                                                @else 
                                                    <span class="badge bg-warning">Unavailability</span>
                                                @endif
                                            </td class="text-center">
                                            <td class="text-center">{{$product->product_type}}</td>
                                            <td class="text-center">{{$product['user']['name']}}</td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-info waves-effect btn-xs">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <button class="btn btn-danger waves-effect btn-xs" type="button" onclick="deleteData({{ $product->id }})">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                                <form id="delete-form-{{ $product->id }}" action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
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
    <script>
        if ($("body").hasClass('sidebar-collapse')) {
            $("body").removeClass('sidebar-collapse').trigger('expanded.pushMenu');
        } else {
            $("body").addClass('sidebar-collapse').trigger('collapsed.pushMenu');
        }
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
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>
@endpush