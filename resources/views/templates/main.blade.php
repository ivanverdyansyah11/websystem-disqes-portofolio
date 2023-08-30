<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cloning Application Tuskr | {{ $title }} Page</title>

    {{-- STYLE CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    {{-- END STYLE CSS --}}
</head>

<body>

    @if (Request::is('login') || Request::is('register') || Request::is('forgot-password') || Request::is('reset-password*'))
        <div class="container-fluid">
            <div class="row">
                <div class="col-8 p-0">
                    <div class="auth-banner"></div>
                </div>
                @yield('container')
            </div>
        </div>
    @endif

    {{-- SCRIPT JS --}}
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    {{-- END SCRIPT JS --}}
</body>

</html>
