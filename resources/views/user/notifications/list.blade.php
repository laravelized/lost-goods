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
                            <tr>
                                <td>{{ $otification->message }}</td>
                                <td>
                                    <a href="{{ $notification->link }}" class="btn btn-success btn-sm">Tampilkan</a>
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