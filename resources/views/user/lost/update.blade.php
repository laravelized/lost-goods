@extends('user.layouts.app')

@section('content')
    <div class="container h-100 mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Update barang hilang</h3>
                    </div>
                    <div class="card-body">
                        <form enctype="multipart/form-data" action="{{ route('user.lost.my.update', ['lostGoodId' => $lostGood->id]) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Judul barang</label>
                                        <input value="{{ $lostGood->name }}" name="good_name" type="text" class="form-control @error('good_name') is-invalid @enderror">
                                        @error('good_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Detail informasi</label>
                                        <textarea name="information_details" id="" cols="30" rows="10" class="form-control @error('information_details') is-invalid @enderror">{{ $lostGood->information }}</textarea>
                                        @error('information_details')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Kategori</label>
                                        <select name="category" class="form-control @error('category') is-invalid @enderror">
                                            @foreach($categories as $category)
                                                <option @if($lostGood->categories[0]->id === $category->id) selected @endif value="{{ $category->name }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Tempat hilang</label>
                                        <input value="{{ $lostGood->place_details }}" name="place_of_lost" type="text" class="form-control @error('place_of_lost') is-invalid @enderror">
                                        @error('place_of_lost')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tanggal hilang</label>
                                        <input value="{{ $lostGood->date->format('Y-m-d') }}" id="date-input" name="date_of_lost" type="text" class="form-control @error('date_of_lost') is-invalid @enderror">
                                        @error('date_of_lost')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Image</label>
                                        <input name="image" type="file" class="form-control-file">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nomor HP</label>
                                        <input value="{{ $lostGood->mobile_number }}" type="text" class="form-control" name="mobile_number">
                                        @error('mobile_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <button class="btn btn-success">Ubah</button>
                                        <a class="btn btn-warning" href="{{ route('user.lost.my.list') }}">Kembali</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
@endpush

@push('after-script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#date-input').datepicker({
                orientation: "bottom",
                format: 'yyyy-mm-dd',
                autoclose: true
            });
        });
    </script>
@endpush