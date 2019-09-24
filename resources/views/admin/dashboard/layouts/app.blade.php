<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    @stack('before-style')

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link href="{{ asset('css/admin.all.css') }}" rel="stylesheet">

    @stack('after-style')
</head>

<body id="page-top">

<div id="wrapper">

    @include('admin.components.sidebar')

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            @include('admin.components.navbar')
            <div class="container-fluid">
                @include('admin.components.alerts')
                @yield('content')
            </div>
        </div>
        @include('admin.components.footer')
    </div>
</div>

<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

@stack('view-at-the-end')

@stack('before-script')

<script src="{{ asset('js/admin.all.js') }}"></script>

@stack('after-script')

</body>

</html>
