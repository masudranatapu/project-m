@extends('layouts.backend.app')

@section('title')
    {{$title}}
@stop

@push('css')

@endpush

@section('content')
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="card card-info">
                        <form class="form-horizontal" action="{{route('admin.website.update', $website->id)}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-header bg-success">
                                <h3 class="card-title">Website Setting</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Website Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="name" value="{{$website->name}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Email Address</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control" name="email" value="{{$website->email}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Logo</label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" onChange="mainTham(this)" name="logo" class="custom-file-input">
                                                <label class="custom-file-label">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Current Logo</label>
                                    <div class="col-sm-8">
                                        <img src="{{asset($website->logo)}}" id="showTham" style="height: 100px; width: 100px;">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Favicon</label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" onChange="mainFavion(this)" name="favicon" class="custom-file-input">
                                                <label class="custom-file-label">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Current Favicon</label>
                                    <div class="col-sm-8">
                                        <img src="{{asset($website->favicon)}}" id="favion" style="height: 50px; width: 50px;">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Phone Number</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="phone" value="{{$website->phone}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Telyphone Number</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="tel" value="{{$website->tel}}" placeholder="Telyphone Number">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Fax Number</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="fax" value="{{$website->fax}}" placeholder="Fax Number">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Address</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" rows="3" name="address">{!! $website->address !!}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="card-header bg-primary">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h3>Additional Information</h3>
                                    </div>
                                    <div class="col-md-6 text-right">
                                            <input type="hidden" id="website_row_number" value="{{ rand(111, 999) }}">
                                        <button type="button" class="btn btn-sm btn-success" onclick="addNewAdditionalInfo()">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Website Icon</th>
                                            <th>Website Link</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="show_row">
                                        @php
                                            $icon = explode("|",$website->icon);
                                            $link = explode("|",$website->link);
                                        @endphp
                                        @foreach($icon as $key=>$icon)
                                            <tr id="website_remove_row_{{$key}}">
                                                <td>
                                                    <input type="text" name="icon[]" value="{{$icon}}" class="form-control" placeholder="Icon form frontawsome">
                                                </td>
                                                <td>
                                                    <input type="text" name="link[]" value="@if(isset($link[$key])){{$link[$key]}}@endif" class="form-control" placeholder="Website link like https://">
                                                </td>
                                                <td class="text-center">
                                                    <button type="button" onclick="websiteRemovieRow(this)" id="{{$key}}" class="btn btn-sm btn-danger">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer">
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-4 col-form-label"></label>
                                    <div class="col-sm-8">
                                        <button type="submit" class="btn btn-info btn-lg">Update Website</button>
                                    </div>
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
    <script src="{{ asset('backend/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            //add row
            $('body').on('click','.DiaAddBtn' ,function() {
                var itemData = $(this).parent().parent().parent();
                $('#diagnosis').append("<tr>"+itemData.html()+"</tr>");
                $('#diagnosis tr:last-child').find(':input').val('');
            });
            //remove row
            $('body').on('click','.DiaRemoveBtn' ,function() {
                $(this).parent().parent().parent().remove();
            });

        });
        
        function mainTham(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showTham').attr('src', e.target.result)
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function mainFavion(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#favion').attr('src', e.target.result)
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script>
        function addNewAdditionalInfo() {
            // alert('helo');
            var website_row_number = $("#website_row_number").val();
            // alert(amount_id);

            var new_row_number = Math.floor(Math.random()*(999-100+1)+100);
            if($("#website_remove_row_" + website_row_number).new_row_number == 0) {
                var new_id = Math.floor(Math.random()*(999-100+1)+100);
            }
            $.ajax({
                type    : "POST",
                url     : "{{ route('admin.row.addremove') }}",
                data    : {
                    id      : website_row_number,
                    _token  : '{{csrf_token()}}',
                },
                success:function(data) {
                    console.log(data);
                    $('#show_row').append(data);
                    $('#website_row_number').val(new_row_number);
                },
            });
        };
        function websiteRemovieRow(obj) {
            // alert('Hell');
            var website_row_number = obj.id;
            // alert(website_row_number);
            $("#website_remove_row_" + website_row_number).remove();
        };
    </script>
@endpush