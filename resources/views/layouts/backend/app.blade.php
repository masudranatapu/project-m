<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>
        <!-- for header link -->
        @include('layouts.backend.partial.head')
        <link rel="stylesheet" href="{{asset('massage/toastr/toastr.css')}}">
        <!-- for css input -->
        @stack('css')
    </head>
    <body>

        @include('layouts.backend.partial.header')
        @include('layouts.backend.partial.sidebar')
        @yield('content')
        @include('layouts.backend.partial.footer')
        @include('layouts.backend.partial.foot')
        
        <script src="{{asset('massage/toastr/toastr.js')}}"></script>
        {!! Toastr::message() !!}
        <script>
            @if($errors->any())
                @foreach($errors->all() as $error)
                    toastr.error('{{ $error }}','Error',{
                        closeButton:true,
                        progressBar:true,
                    });
                @endforeach
            @endif
        </script>
        @stack('js')
    </body>
</html>