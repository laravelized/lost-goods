@extends('user.layouts.app')

@section('content')
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('label.login') }}</div>
                <div class="card-body">
                    <form action="{{ route('user.login') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">{{ __('label.username') }}</label>
                            <input name="username" type="text" class="form-control @error('username') is-invalid @enderror">
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
                            <button class="btn btn-block btn-success">{{ __('label.login') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection