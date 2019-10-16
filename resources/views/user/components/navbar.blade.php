<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('user.index') }}">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            @if(!auth()->check())
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.login.form') }}">{{ __('label.login') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.register.form') }}">{{ __('label.register') }}</a>
                </li>
            </ul>
            @else
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a id="notification-link" class="nav-link" href="{{ route('user.notifications.list') }}">{{ __('label.notifications') }} @if($unreadNotificationsCount)<span class="badge badge-danger">{{ $unreadNotificationsCount }}</span>@endif
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false">{{ __('label.other_users_content') }}</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="{{ route('user.lost.others.list') }}">{{ __('label.losts') }}</a>
                        <a class="dropdown-item" href="{{ route('user.founds.others.list') }}">{{ __('label.founds') }}</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false">{{ __('label.create_notifications') }}</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="{{ route('user.lost.my.list') }}">{{ __('label.losts') }}</a>
                        <a class="dropdown-item" href="{{ route('user.founds.my.list') }}">{{ __('label.founds') }}</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false">{{ auth()->user()->username }}</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a id="logout-link-confirmation" class="dropdown-item" href="#">{{ __('label.logout') }}</a>
                    </div>
                </li>
            </ul>
            @endif
        </div>
    </div>
</nav>

@push('view-at-the-end')
    <div class="modal fade" id="logout-confirmation-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{ __('label.logout_confirmation') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ __('messages.confirmation.logout') }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('label.close') }}</button>
                    <button id="logout-button" type="button" class="btn btn-danger">{{ __('label.logout') }}</button>
                </div>
            </div>
        </div>
    </div>

    <form id="logout-form" action="{{ route('user.logout') }}" method="POST">
        @csrf
    </form>
@endpush

@push('after-script')
    <script>
        $(document).ready(function () {
            $('#logout-link-confirmation').on('click', function () {
                $('#logout-confirmation-modal').modal();
            });

            $('#logout-button').on('click', function () {
                $('#logout-form').submit();
            });

            @if($unreadNotificationsCount)
            $('#notification-link').on('click', function (event) {
                var link = this;
                event.preventDefault();
                var url = "{{ route('user.notifications.mark-group-notifications') }}";
                $.post(url);
                setTimeout(function () {
                    document.location = $(link).attr('href');
                }, 100);
            });
            @endif
        });
    </script>
@endpush