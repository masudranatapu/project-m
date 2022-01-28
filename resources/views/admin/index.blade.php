@extends('layouts.backend.app')

@section('title')
    {{$title}}
@stop

@push('css')

@endpush

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Admin Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Admin Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1">
                            <i class="fas fa-cog"></i>
                        </span>
                        <div class="info-box-content">
                            <a href="{{route('admin.products.index')}}">
                                <span class="info-box-text">Product</span>
                                    <span class="info-box-number">
                                        {{ $product->count() }}
                                    </span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1">
                            <i class="fas fa-thumbs-up"></i>
                        </span>
                        <div class="info-box-content">
                            <a href="{{route('admin.category.index')}}">
                                <span class="info-box-text">Category</span>
                                    <span class="info-box-number">
                                        {{ $category->count() }}
                                    </span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="clearfix hidden-md-up"></div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1">
                            <i class="fas fa-shopping-cart"></i>
                        </span>
                        <div class="info-box-content">
                            <a href="{{ route('admin.orders.index') }}">
                                <span class="info-box-text">Order</span>
                                    <span class="info-box-number">
                                        {{ $order->count() }}
                                    </span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1">
                            <i class="fas fa-users"></i>
                        </span>
                        <div class="info-box-content">
                            <a href="{{ route('admin.all.user') }}">
                                <span class="info-box-text">User</span>
                                    <span class="info-box-number">
                                        {{ $user->count() }}
                                    </span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')

@endpush