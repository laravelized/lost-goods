<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Heroic Features - Start Bootstrap Template</title>

    @stack('before-style')

    <link href="{{ asset('css/user.all.css') }}" rel="stylesheet">

    @stack('after-style')

</head>

<body>

    @include('user.components.navbar')

    <div class="container h-100" style="min-height: 100vh; margin-top: 100px;">
        <div class="row h-100">
            <div class="col-md-12">
                @include('user.components.alerts')
            </div>
            <div class="col-md-3">
                @include('user.components.sidemenu')
            </div>
            <div class="col-md-9">
                @yield('content')
            </div>
        </div>
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
