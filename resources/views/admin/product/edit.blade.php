@extends('layouts.backend.app')

@section('title')
    {{$title}}
@stop

@push('css')
    <link rel="stylesheet" href="{{asset('backend/plugins/select2/css/select2.css')}}">
    <link rel="stylesheet" href="{{asset('backend/plugins/summernote/summernote-bs4.min.css')}}">
@endpush

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <label for=""></label>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Edit Product</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5>Create Product</h5>
                        </div>
                        <form class="form-horizontal" action="{{ route('admin.products.update', $products->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card card-success card-outline">
                                            <div class="card-header">
                                                <h5>Product Info</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <label for="" class="col-md-3">Product Name <span class="text-danger"> *</span></label>
                                                    <div class="col-md-9">
                                                        <input type="text"  class="form-control" name="name" value="{{ $products->name }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="" class="col-md-3">Regular price</label>
                                                    <div class="col-md-9">
                                                        <input type="text"  class="form-control" name="regular_price" value="{{ $products->regular_price }}" id="regular_price">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="" class="col-md-3">Discount</label>
                                                    <div class="col-md-9">
                                                        <input type="text"  class="form-control" name="discount" value="{{ $products->discount }}" id="discount" pattern="[0-9]*\.?[0-9]*">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="" class="col-md-3">Sell Price <span class="text-danger"> *</span></label>
                                                    <div class="col-md-9">
                                                        <input type="text"  class="form-control" name="sell_price" value="{{ $products->sell_price }}" id="sell_price">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="" class="col-md-3">Color</label>
                                                    <div class="col-md-9">
                                                        <select name="color_id[]" class="select2" multiple="multiple" data-placeholder="Select Color" style="width: 100%;">
                                                            @foreach($colorses as $colour)
                                                                <option 
                                                                    @if ($products->color_id)
                                                                        @php
                                                                            $colorsa = explode(',', $products->color_id);
                                                                        @endphp
                                                                        @foreach($colorsa as $colors)
                                                                            @if($colour->id == $colors) selected @endif
                                                                        @endforeach
                                                                    @endif
                                                                    value="{{ $colour->id }}">
                                                                    {{ $colour->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="" class="col-md-3">Size</label>
                                                    <div class="col-md-9">
                                                        <select name="size_id[]" class="select2" multiple="multiple" data-placeholder="Select Sizes" style="width: 100%;">
                                                            @foreach($sizes as $size)
                                                                <option
                                                                    @if($products->size_id)
                                                                        @php
                                                                            $sizes = explode(',', $products->size_id);
                                                                        @endphp
                                                                        @foreach($sizes as $sizes)
                                                                            @if($size->id == $sizes) selected @endif
                                                                        @endforeach
                                                                    @endif
                                                                    value="{{$size->id}}">
                                                                    {{$size->name}}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="" class="col-md-3">Thambnail<span class="text-danger"> *</span></label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" onChange="mainTham(this)" name="thambnail" class="custom-file-input">
                                                                <label class="custom-file-label">Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="" class="col-md-3"></label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                            <img src="{{ asset($products->thambnail) }}" id="showTham" style="height: 80px; width: 100px;">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="" class="col-md-3">Short Description </label>
                                                    <div class="col-md-9">
                                                        <textarea class="form-control" name="short_description">{{ $products->short_description }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="" class="col-md-3">Long Description </label>
                                                    <div class="col-md-9">
                                                        <textarea class="form-control summernote" name="long_description">
                                                            {{ $products->long_description }}
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card card-success card-outline">
                                                    <div class="card-header">
                                                        <h5>More Info</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group row">
                                                            <label for="" class="col-md-3">Brand <span class="text-danger"> *</span></label>
                                                            <div class="col-md-9">
                                                                <select name="brand_id" id="" class="form-control">
                                                                    <option value="" disabled selected>Select One</option>
                                                                    @foreach($brands as $brand)
                                                                        <option @if($brand->id == $products->brand_id) selected @endif value="{{$brand->id}}">{{$brand->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3">Category <span class="text-danger"> *</span></label>
                                                            <div class="col-md-9">
                                                                <select name="category_id" id="category" class="form-control">
                                                                    <option value="">Select One</option>
                                                                    @foreach($category as $cate)
                                                                        <option @if($cate->id == $products->category_id) selected @endif value="{{$cate->id}}">{{$cate->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3">Sub Category</label>
                                                            <div class="col-md-9">
                                                                <select name="subcategory_id" id="subcategory" class="form-control">
                                                                    <option value="">Select One</option>
                                                                    @foreach($subcategory as $subcate)
                                                                        <option @if($subcate->id == $products->subcategory_id) selected @endif value="{{ $subcate->name }}">{{ $subcate->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3">Sub Sub Category </label>
                                                            <div class="col-md-9">
                                                                <select name="subsubcategory_id" id="subsubcategory" class="form-control">
                                                                    <option value="" selected >Select One</option>
                                                                    @foreach($subsubcategory as $subsubcate)
                                                                        <option @if($subsubcate->id == $products->subsubcategory_id) selected @endif value="{{ $subsubcate->id }}">{{ $subsubcate->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3">Multiple Thambnail</label>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <div class="custom-file">
                                                                        <input type="file" name="multi_thambnail[]" multiple="" id="multi_tham" class="custom-file-input">
                                                                        <label class="custom-file-label">Choose Multiple Thambnail</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row" id="newmultiproduct_display" style="display: none;">
                                                            <label class="col-md-3"></label>
                                                            <div class="col-md-9">
                                                                <div class="row" id="preview_image">
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row" id="oldmultiproduct_display">
                                                            <label class="col-md-3"></label>
                                                            <div class="col-md-9">
                                                                <div class="row">
                                                                    @if($products->multi_thambnail)
                                                                        @php
                                                                            $multiproduct = explode('|', $products->multi_thambnail)
                                                                        @endphp
                                                                        @foreach($multiproduct as $key => $mulipro)
                                                                            <img src="{{ asset($mulipro) }}" alt="" style="width: 100px; height: 100px;">
                                                                        @endforeach
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3">Product Type <span class="text-danger"> *</span></label>
                                                            <div class="col-md-9">
                                                                <select name="product_type" class="form-control">
                                                                    <option value="" disabled>Select One</option>
                                                                    <option @if($products->product_type == 'Hot Deals') selected @endif value="Hot Deals">Hot Deals</option>
                                                                    <option @if($products->product_type == 'Features') selected @endif value="Features">Features</option>
                                                                    <option @if($products->product_type == 'Best Deals') selected @endif value="Best Deals">Best Deals</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3">Availability <span class="text-danger"> *</span></label>
                                                            <div class="col-md-9">
                                                                <select name="availability" id="" class="form-control">
                                                                    <option disabled >Select One</option>
                                                                    <option @if($products->availability == 1) selected @endif value="1" selected> Instock</option>
                                                                    <option @if($products->availability == 0) selected @endif value="0"> Out of stock</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3">Status<span class="text-danger"> *</span></label>
                                                            <div class="col-md-9">
                                                                <select name="status" id="" class="form-control">
                                                                    <option value="" disabled >Select One</option>
                                                                    <option @if($products->status == 1) selected @endif  value="1">Active</option>
                                                                    <option @if($products->status == 0) selected @endif value="0">Inactive</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="col-md-12">
                                                <div class="card card-success card-outline">
                                                    <div class="card-header">
                                                        <h5>Product S.E.O </h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group row">
                                                            <label for="" class="col-md-3">Meta Keyword</label>
                                                            <div class="col-md-9">
                                                                <textarea class="form-control" name="meta_keyword" placeholder="Meta Keyword}"> {{ $products->meta_keyword }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="" class="col-md-3">Meta Description </label>
                                                            <div class="col-md-9">
                                                                <textarea class="form-control" name="meta_description" placeholder="Neta Description"> {{ $products->meta_description }} </textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-right">
                                    <input type="submit" class="btn btn-success" value="Update Product">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script src="{{asset('backend/plugins/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('backend/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <script>
        if ($("body").hasClass('sidebar-collapse')) {
            $("body").removeClass('sidebar-collapse').trigger('expanded.pushMenu');
        } else {
            $("body").addClass('sidebar-collapse').trigger('collapsed.pushMenu');
        }
        $('.select2').select2()
        // show thambnill
        function mainTham(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showTham').attr('src', e.target.result).width(100).height(80);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        // Summernote
        $('.summernote').summernote()
    </script>
    <script>
        $('#regular_price').on('wheel keyup change', function(event) {
            var regular_price = $("#regular_price").val();
            var discount = $("#discount").val();
            var sell_price = regular_price - (regular_price*(discount/100));
            $("#sell_price").val(sell_price);
        });
        $('#discount').on('wheel keyup change', function(event) {
            var regular_price = $("#regular_price").val();
            var discount = $("#discount").val();

            var sell_price = regular_price - (regular_price*(discount/100));

            $("#sell_price").val(sell_price);
        });
        $('#sell_price').on('wheel keyup change', function(event) {
            var regular_price = $("#regular_price").val();
            var sell_price = $("#sell_price").val();

            var diff = regular_price - sell_price;
            var discount = (diff/regular_price)*100;
            if (regular_price=='') {
                discount = 0;
            }
            $("#discount").val(discount);
        });
    </script>
    <script>
        $(document).ready(function(){
            $('#multi_tham').on('change', function(){ //on file input change
                if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data
                    $.each(data, function(index, file){ //loop though each file
                        if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file){ //trigger function on successful read
                            return function(e) {

                                $('#newmultiproduct_display').show(); // only show whene the multiproduct will be change then 
                                $('#oldmultiproduct_display').hide(); //if product selected then old multi product willbe hide

                                var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(100) .height(100); //create image element 
                                $('#preview_image').append(img); //append image to output element
                            };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });
                }else{
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#category').on('change', function(){
                var category_id = $(this).val();
                // alert(category_id);
                if(category_id) {
                    $.ajax({
                        url: "{{  url('/admin/product-category/ajax') }}/"+category_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                            $('#subsubcategory').html('');
                            var d =$('#subcategory').empty();
                                $('#subcategory').append('<option value="" disabled selected> Select One </option>');
                                $.each(data, function(key, value){
                                    $('#subcategory').append('<option value="'+ value.id +'">' + value.name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });

            $('#subcategory').on('change', function(){
                var subcategory_id = $(this).val();
                // alert(subcategory_id);
                if(subcategory_id) {
                    $.ajax({
                        url: "{{  url('/admin/product-subcategory/ajax') }}/"+subcategory_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                        var d =$('#subsubcategory').empty();
                            $('#subsubcategory').append('<option value="" disabled selected> Select One </option>');
                            $.each(data, function(key, value){
                                $('#subsubcategory').append('<option value="'+ value.id +'">' + value.name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });

        });
    </script>
@endpush