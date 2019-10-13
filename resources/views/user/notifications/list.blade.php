@php
    use \App\Modules\Notification\Enums\NotificationStatuses;
@endphp

@extends('user.layouts.app')

@section('content')
    <div class="row mt-3 justify-content-center align-items-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h5>Notifikasi</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Pesan</th>
                                <th>Link</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($notifications->count())
                            @foreach($notifications as $notification)
                            <tr class="@if($notification->status === NotificationStatuses::CREATED || $notification->status === NotificationStatuses::VIEWED_GROUPLY) table-primary @endif">
                                <td>{{ $notification->message }}</td>
                                <td>
                                    <a data-url="{{ route('user.notifications.mark-as-visited', ['notificationId' => $notification->id]) }}" href="{{ $notification->url }}" class="@if($notification->status === NotificationStatuses::CREATED || $notification->status === NotificationStatuses::VIEWED_GROUPLY) unclicked-notification-link @endif btn btn-success btn-sm">Tampilkan</a>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="2" class="text-center"><strong>{{ __('label.no_notifications') }}</strong></td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-script')
    <script>
        $(document).ready(function () {
            $('.unclicked-notification-link').on('click', function (event) {
                var link = this;

                event.preventDefault();
                var url = $(link).data('url');
                $.post(url);

                setTimeout(function () {
                    document.location = $(link).attr('href');
                }, 500);
            });
        });
    </script>
@endpush