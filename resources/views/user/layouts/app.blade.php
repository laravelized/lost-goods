<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    @stack('before-style')

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link href="{{ asset('css/user.all.css') }}" rel="stylesheet">

    <style>
        html, body {
            min-height: 100vh;
        }
    </style>

    @stack('after-style')

</head>

<body>

@include('user.components.navbar')

<div class="container" style="min-height: 100vh; margin-top: 100px;">
    <div class="row">
        <div class="col-md-12">
            @include('user.components.alerts')
        </div>
    </div>
    @yield('content')
</div>

@include('user.components.footer')

@stack('view-at-the-end')

@stack('before-script')

<script src="{{ asset('js/user.all.js') }}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
@stack('after-script')

</body>

</html>
