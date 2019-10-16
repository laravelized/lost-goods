@extends('user.layouts.app')

@section('content')
    <div class="row mt-5 justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>{{ __('label.claims_list') }}</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>{{ __('label.name') }}</th>
                            <th>{{ __('label.username') }}</th>
                            <th>{{ __('label.address') }}</th>
                            <th>{{ __('label.buttons') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($claims->count())
                        @foreach($claims as $claim)
                            <tr>
                                <td>{{ $claim->user->full_name }}</td>
                                <td>{{ $claim->user->username }}</td>
                                <td>{{ $claim->user->address }}</td>
                                <td>
                                    <a href="{{ route('user.claims.detail', ['claimId' => $claim->id]) }}" class="btn btn-sm btn-info">{{ __('label.see_the_answer') }}</a>
                                </td>
                            </tr>
                        @endforeach
                        @else
                            <tr>
                                <td colspan="4" class="text-center">{{ __('label.no_claims') }}</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
