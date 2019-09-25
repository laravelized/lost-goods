@extends('user.layouts.app')

@section('content')
    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Register</div>
                    <div class="card-body">
                        <form action="{{ route('user.register') }}" method="POST">
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
                                <label for="">Password confirmation</label>
                                <input name="password_confirmation" type="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Full name</label>
                                <input name="full_name" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Gender</label>
                                <select name="gender" id="" class="form-control">
                                    <option value="">Select your gender</option>
                                    <option value="0">Male</option>
                                    <option value="1">Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Address</label>
                                <input name="address" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Mobile number</label>
                                <input name="mobile_number" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-block btn-success">Register</button>
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