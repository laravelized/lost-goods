@extends('user.layouts.app')

@section('content')
    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center" style="margin-top: 30px;">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Login</div>
                    <div class="card-body">
                        <form action="{{ route('user.login') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Username</label>
                                <input name="username" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input name="password" type="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-block btn-success">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-style')
    <style>
        html, body {
            height: 100%;
        }
    </style>
@endpush