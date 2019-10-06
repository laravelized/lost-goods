@extends('user.layouts.app')

@section('content')
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Register</div>
                <div class="card-body">
                    <form action="{{ route('user.register') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Username</label>
                            <input value="{{ old('username') }}" name="username" type="text" class="form-control @error('username') is-invalid @enderror">
                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input name="password" type="password" class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Konfirmasi password</label>
                            <input name="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror">
                            @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Nama lengkap</label>
                            <input value="{{ old('full_name') }}" name="full_name" type="text" class="form-control @error('full_name') is-invalid @enderror">
                            @error('full_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Jenis kelamin</label>
                            <select name="gender" id="" class="form-control @error('gender') is-invalid @enderror">
                                <option value="">Pilih jenis kelamin</option>
                                <option value="0">Pria</option>
                                <option value="1">Wanita</option>
                            </select>
                            @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <input value="{{ old('address') }}" name="address" type="text" class="form-control @error('address') is-invalid @enderror">
                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Nomor HP</label>
                            <input value="{{ old('mobile_number') }}" name="mobile_number" type="text" class="form-control @error('mobile_number') is-invalid @enderror">
                            @error('mobile_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button class="btn btn-block btn-success">Daftar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
