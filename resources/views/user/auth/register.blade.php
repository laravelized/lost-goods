@extends('user.layouts.app')

@section('content')
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('label.register') }}</div>
                <div class="card-body">
                    <form action="{{ route('user.register') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">{{ __('label.username') }}</label>
                            <input value="{{ old('username') }}" name="username" type="text" class="form-control @error('username') is-invalid @enderror">
                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">{{ __('label.password') }}</label>
                            <input name="password" type="password" class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">{{ __('label.password_confirmation') }}</label>
                            <input name="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror">
                            @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">{{ __('label.full_name') }}</label>
                            <input value="{{ old('full_name') }}" name="full_name" type="text" class="form-control @error('full_name') is-invalid @enderror">
                            @error('full_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">{{ __('label.gender') }}</label>
                            <select name="gender" class="form-control @error('gender') is-invalid @enderror">
                                <option value="">{{ __('label.choose_your_gender') }}</option>
                                <option value="0">{{ __('genders.male') }}</option>
                                <option value="1">{{ __('genders.female') }}</option>
                            </select>
                            @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">{{ __('label.address') }}</label>
                            <input value="{{ old('address') }}" name="address" type="text" class="form-control @error('address') is-invalid @enderror">
                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">{{ __('label.mobile_number') }}</label>
                            <input value="{{ old('mobile_number') }}" name="mobile_number" type="text" class="form-control @error('mobile_number') is-invalid @enderror">
                            @error('mobile_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button class="btn btn-block btn-success">{{ __('label.register') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
