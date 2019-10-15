@extends('admin.dashboard.layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ __('label.my_profile') }}</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-6 text-center">
                            @if(is_null(request()->user()->profile_picture_url))
                            <img style="width: 50%;" class="img-fluid" src="https://upload.wikimedia.org/wikipedia/commons/8/89/Portrait_Placeholder.png" alt="">
                            @else
                            <img style="width: 50%;" class="img-fluid" src="{{ request()->user()->profile_picture_url }}" alt="">
                            @endif
                        </div>
                        <div class="col-12">
                            <form enctype="multipart/form-data" action="{{ route('admin.profile.index.change-profile') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="">{{ __('label.profile_picture') }}</label>
                                    <input type="file" class="form-control-file" name="profile_picture">
                                </div>
                                <div class="form-group">
                                    <label for="">{{ __('label.username') }}</label>
                                    <input value="{{ request()->user()->username }}" type="text" class="form-control @error('username') is-invalid @enderror" name="username">
                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">{{ __('label.full_name') }}</label>
                                    <input value="{{ request()->user()->full_name }}" type="text" class="form-control @error('full_name') is-invalid @enderror" name="full_name">
                                    @error('full_name')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">{{ __('label.email') }}</label>
                                    <input value="{{ request()->user()->email }}" type="text" class="form-control @error('email') is-invalid @enderror" name="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">{{ __('label.password') }}</label>
                                    <input type="password" class="form-control @error('email') is-invalid @enderror" name="password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">{{ __('label.password_confirmation') }}</label>
                                    <input type="password" class="form-control @error('email') is-invalid @enderror" name="password_confirmation">
                                    @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">{{ __('label.mobile_number') }}</label>
                                    <input value="{{ request()->user()->mobile_number }}" type="text" class="form-control @error('email') is-invalid @enderror" name="mobile_number">
                                    @error('mobile_number')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">{{ __('label.address') }}</label>
                                    <input value="{{ request()->user()->address }}" type="text" class="form-control @error('email') is-invalid @enderror" name="address">
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-success btn-sm">{{ __('label.save') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
