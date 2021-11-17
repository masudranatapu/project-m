@extends('layouts.backend.app')

@section('title')
    {{$title}}
@stop

@push('css')

@endpush

@section('content')
    <a href="javascript:;">
        {{ Auth::user()->name }}
    </a>
    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        Logout
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    <br>
    <br>
    <a href="{{ route('home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
@endsection

@push('js')

@endpush