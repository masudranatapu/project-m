@extends('layouts.backend.app')

@section('title')
    {{$title}}
@stop

@push('css')

@endpush

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="card card-info">
                        <form class="form-horizontal" action="{{route('admin.website.update', $website->id)}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-header bg-success">
                                <h3 class="card-title">Website Setting</h3>
                            </div>
                            <div class="card-body mx-5">
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
                            <div class="card card-info">
                                <div class="card-header bg-success">
                                    <h3 class="card-title">Additional Information</h3>
                                </div>
                                <table class="card-body mx-5 table table-striped">
                                    <tbody id="diagnosis">
                                        @php
                                            $icon = explode("|",$website->icon);
                                            $link = explode("|",$website->link);
                                        @endphp
                                        @foreach($icon as $key=>$icon)
                                            <tr>
                                                <td>
                                                    <input type="text" name="icon[]" autocomplete="off" class="form-control" value="{{$icon}}" placeholder="Sofil Icon from front awsome">
                                                </td>

                                                <td>
                                                    <input type="text" name="link[]" class="form-control" value="@if(isset($link[$key])){{$link[$key]}}@endif" placeholder="Link">
                                                </td>
                                                <td class="text-center">
                                                <div class="btn btn-group">
                                                    <button type="button" class="btn btn-primary DiaAddBtn">+</button>
                                                    <button type="button" class="btn btn-danger DiaRemoveBtn">-</button>
                                                    </div>
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
                                        <button type="submit" class="btn btn-info btn-lg">Update Setting</button>
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
@endpush