<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Heroic Features - Start Bootstrap Template</title>

    @stack('before-style')

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

@include('user.components.alerts')

<div class="container" style="min-height: 100vh;">
    @yield('content')
</div>

@include('user.components.footer')

@stack('view-at-the-end')

@stack('before-script')

<script src="{{ asset('js/user.all.js') }}"></script>

@stack('after-script')

</body>

</html>
