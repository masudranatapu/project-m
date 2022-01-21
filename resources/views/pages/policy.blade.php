@extends('layouts.frontend.app')

@section('title')
    {{ $title }}
@endsection

@section('meta')

@endsection

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
                <div class="col-12">
                    <h3>{{ $policy->name }}</h3>
                    <p class="text-justify" >{{ $policy->details }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')

@endpush