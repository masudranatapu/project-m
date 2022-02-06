<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>
        @php
            $website = App\Models\Website::latest()->first();
        @endphp
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{$website->favicon}}">
        <!-- all css here -->
        @yield('meta')
        <!-- for header link -->
        @include('layouts.frontend.partial.head')
        <link rel="stylesheet" href="{{asset('massage/toastr/toastr.css')}}">
        <!-- for css input -->
        @stack('css')
    </head>
    <body>
        <header class="header_area">
            @include('layouts.frontend.partial.header')
        </header>
        @yield('content')
        <div class="footer_area footer_three pt-4 grey-section">
            @include('layouts.frontend.partial.footer')
        </div>
        @include('layouts.frontend.partial.foot')
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