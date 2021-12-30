<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
        <!-- for header link -->
        @include('layouts.frontend.partial.head')
        <link rel="stylesheet" href="{{asset('massage/toastr/toastr.css')}}">
        <!-- for css input -->
        @stack('css')
    </head>
    <body>
        
        @include('layouts.frontend.partial.header')
        @yield('content')
        @include('layouts.frontend.partial.footer')

        <a href="#" class="product-cart">
            <span class="icon-area">
                <span>
                <i class="flaticon-shopping-bag-1 d-flex mr-2"></i>
                </span>
                2 Items
            </span>
            <span class="total-area">&#2547; 507</span>
        </a>

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