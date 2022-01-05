@extends('layouts.frontend.app')

@section('title')
    {{ $title }}
@endsection

@section('meta')

@endsection
    @php
        $website = App\Models\Website::latest()->first();
    @endphp
@push('css')

@endpush

@section('content')
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area commun_bread py-3 grey-section">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul class="text-capitalize">
                            <li><a href="{{ route('home') }}">home</a></li>
                            <li><i class="fa fa-angle-right"></i></li>
                            <li>{{ $title }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->
    <div class="category_section  py-4 ">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="list-group">
                        <a href="{{ route('all.category') }}" class="list-group-item list-group-item-action bg-success text-white">
                            All Category
                        </a>
                        @foreach($categories as $category)
                        <a href="{{ route('category', $category->slug) }}" class="list-group-item list-group-item-action">{{$category->name}}</a>
                        @endforeach
                    </div>
                    <div id="accordion">
                        <div class="list-group">
                            <a href="javascript:;" class="list-group-item list-group-item-action bg-warning" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Sub Category
                            </a>
                        </div>
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="list-group">
                                @foreach($subcategories as $subcategory)
                                    <a href="{{ route('category', $subcategory->slug) }}" class="list-group-item list-group-item-action">{{$subcategory->name}}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div id="accordion">
                        <div class="list-group">
                            <a href="javascript:;" class="list-group-item list-group-item-action bg-info" id="headingThree" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Sub Category
                            </a>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                            <div class="list-group">
                                @foreach($subsubcategories as $subsubcategory)
                                    <a href="{{ route('category', $subsubcategory->slug) }}" class="list-group-item list-group-item-action">{{$subsubcategory->name}}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="list-group">
                        <a href="javascript:;" class="list-group-item list-group-item-action  active text-white">
                            Brand
                        </a>
                        @foreach($brands as $brand)
                            <a href="" class="list-group-item list-group-item-action">{{$brand->name}}</a>
                        @endforeach
                    </div>

                    <div class="list-group">
                        <a href="javascript:;" class="list-group-item list-group-item-action  active text-white">
                            Price 
                        </a>
                        @foreach($brands as $brand)
                            <a href="" class="list-group-item list-group-item-action">{{$brand->name}}</a>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-9 bg-info">

                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')

@endpush