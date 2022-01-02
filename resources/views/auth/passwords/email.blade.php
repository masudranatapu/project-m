<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reset Passowrd</title>
        @php 
            $website = App\Models\Website::latest()->first();
        @endphp
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset($website->favicon) }}">
        <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
        <!-- Custom styles for this template -->
        <link href="{{asset('massage/css/signin.css')}}" rel="stylesheet">
    </head>
    <body>
        <div class="card" style="width: 25rem;">
            <div class="card-body">
                <a href="{{ route('home') }}"> <img class="mb-4" src="{{asset($website->image)}}" alt="" width="100%" height="150"> </a>
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <h1 class="h3 mb-3 font-weight-normal">Reset Password</h1>
                    <label for="inputEmail" class="sr-only">Email address</label>
                    <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                    <br>
                    <button class="btn btn-primary btn-block" type="submit">Send Password Reset Link</button>
                    <p class="mt-5 mb-3 text-muted">
                        &copy; <a href="{{ route('home') }}">{{ $website->name }}</a>
                    </p>
                </form>
            </div>
        </div>
    </body>
</html>