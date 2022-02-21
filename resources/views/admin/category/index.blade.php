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
                    <h1>Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Categories</li>
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
                                        <span class="badge bg-blue">{{ $allcategory->count() }}</span>
                                    </h3>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="text-right cutom_search" >
                                        <button type="button" title="Add Category" class="btn btn-primary" data-toggle="modal" data-target="#create">
                                            <i class="fa fa-plus-circle mr-2"></i>
                                            <span>Add Category</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="create">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Create Category</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" action="{{route('admin.category.store')}}" enctype="multipart/form-data" method="post">
                                            @csrf
                                            <div class="form-group row @if($categories->count() > 0 )  @else d-none @endif"> 
                                                <label class="col-sm-3 col-form-label">Parent Category</label>
                                                <div class="col-sm-9">
                                                    <select name="parent_id" id="parent" class="form-control">
                                                        <option value="" selected>None</option>
                                                        @foreach($categories as $categorie)
                                                            <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            @if($categories->count() > 0)
                                                <div class="form-group row" id="showchildcategory" style="display: none;">
                                                    <label class="col-sm-3 col-form-label">Parent Category</label>
                                                    <div class="col-sm-9">
                                                        <select name="child_id" id="child" class="form-control">

                                                        </select>
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Category Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="name" placeholder="Category Name" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Category Image</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" onChange="categoryImageCreate(this)" name="image" class="custom-file-input">
                                                            <label class="custom-file-label">Choose file</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label"></label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <img src="" id="categoryimagecreate" style="width: 100px; height: 100px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Icon</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="icon" placeholder="Free Font Awesome icon">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-sm-3 col-sm-9">
                                                    <button type="submit" class="btn btn-success">Create Category</button>
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
                                        <th class="text-center">Category</th>
                                        <th class="text-center">Sub Category</th>
                                        <th class="text-center">Sub Sub Category</th>
                                        <th class="text-center">Image</th>
                                        <th class="text-center">Icon</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($allcategory as $key => $category)
                                        <tr>
                                            <td class="text-center">{{ $key + 1 }}</td>
                                            <td class="text-center">
                                                @if($category->parent_id == NULL && $categorie->child_id == NULL)
                                                    {{ $category->name }}
                                                @else

                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($category->parent_id != NULL)
                                                    @if($category->child_id == NULL)
                                                        {{ $category->name }}
                                                    @else

                                                    @endif
                                                @else

                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($category->parent_id != NULL)
                                                    @if($category->child_id == NULL)
                                                    
                                                    @else
                                                        {{ $category->name }}
                                                    @endif
                                                @else

                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <img width="60" height="60" src="@if($category->image) {{ asset($category->image) }} @else {{ asset('demomedia/category.png') }} @endif">
                                            </td>
                                            <td class="text-center">
                                                <i class="{{$category->icon}}" style="font-size: 45px;"></i>
                                            </td>
                                            <td class="text-center">
                                                <button type="button" title="Edit Category" class="btn btn-warning" data-toggle="modal" data-target="#edit_{{$key}}">
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
                                                            <form class="form-horizontal" action="{{ route('admin.category.update', $category->id)}}" enctype="multipart/form-data" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="form-group row @if($categories->count() > 0 )  @else d-none @endif"> 
                                                                    <label class="col-sm-3 col-form-label">Parent Category</label>
                                                                    <div class="col-sm-9">
                                                                        <select name="parent_id" class="form-control">
                                                                            <option value="" selected>None</option>
                                                                            @foreach($categories as $categorie)
                                                                                <option @if($category->parent_id == $categorie->id) selected @endif value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                @if($categories->count() > 0)
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label">Child Category</label>
                                                                        <div class="col-sm-9">
                                                                            <select name="child_id" class="form-control">
                                                                                <option value="" selected disabled> Select One</option>
                                                                                @foreach($child_categories as $child_category)
                                                                                    <option @if($child_category->child_id == $categorie->id) selected @endif value="{{$child_category->id}}">{{$child_category->name}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                                <div class="form-group row">
                                                                    <label class="col-sm-3 col-form-label">Category Name</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" name="name" value="{{$category->name}}">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-3 col-form-label">Category Image</label>
                                                                    <div class="col-sm-9">
                                                                        <div class="input-group">
                                                                            <div class="custom-file">
                                                                                <input type="file" onChange="categoryImage(this)" name="image" class="custom-file-input">
                                                                                <label class="custom-file-label">Choose file</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-3 col-form-label"></label>
                                                                    <div class="col-sm-9">
                                                                        <div class="input-group">
                                                                            <img src="{{asset($category->image)}}" class="editcategoryImage" style="width: 100px; height: 100px;">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-3 col-form-label">Category Icon</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" name="icon" value="{{$category->icon}}" placeholder="Free Font Awesome icon">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <div class="offset-sm-3 col-sm-9">
                                                                        <button type="submit" class="btn btn-success">Update Category</button>
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
                                        <th>Name</th>
                                        <th>Sub Category Name</th>
                                        <th>Sub Sub Category Name</th>
                                        <th>Image</th>
                                        <th>Icon</th>
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
    <script>
        function categoryImageCreate(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#categoryimagecreate').attr('src', e.target.result)
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function categoryImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.editcategoryImage').attr('src', e.target.result)
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#parent').on('change', function(event){
                var cate_id = $(this).val();
                // alert(cate_id);
                if(cate_id) {
                    $.ajax({
                        url         : "{{  url('admin/category/parent-chlid/ajax/') }}/"+cate_id,
                        type        : "GET",
                        dataType    : "json",
                        success     : function(data) {
                            var d =$('#child').empty();
                            $('#showchildcategory').show();
                            $('#child').append('<option value="" selected disabled >Select One</option>'); 
                            $.each(data, function(key, value){
                                $('#child').append('<option value="'+ value.id +'">' + value.name + '</option>');
                            });
                        },
                    });
                }else {
                    alert('Select your parent category');
                }
            });
        });
    </script>
@endpush