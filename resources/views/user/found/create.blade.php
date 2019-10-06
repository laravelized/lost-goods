@extends('user.layouts.app')

@section('content')
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Pasang barang temuan</h3>
                </div>
                <div class="card-body">
                    <form enctype="multipart/form-data" action="{{ route('user.founds.my.post') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Judul barang</label>
                                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Kategori barang</label>
                                    <select name="category" class="form-control @error('category') is-invalid @enderror">
                                        @foreach($categories    as $category)
                                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Tempat penemuan</label>
                                    <input name="place_of_found" type="text" class="form-control @error('place_of_found') is-invalid @enderror">
                                    @error('place_of_found')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Tanggal penemuan</label>
                                    <input id="date_of_found_input" name="date_of_found" type="text" class="form-control @error('date_of_found') is-invalid @enderror">
                                    @error('date_of_found')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Gambar</label>
                                    <input name="image" type="file" class="form-control-file">
                                </div>
                                <div class="form-group">
                                    <label for="">Nomor HP</label>
                                    <input type="text" class="form-control @error('mobile_number') is-invalid @enderror" name="mobile_number ">
                                    @error('mobile_number')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <button class="btn btn-success">Pasang</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if(session(\App\Services\Session\NotificationKeys::SUCCESS))
    <div class="modal fade" id="next-step-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h3>Data berhasil ditambahkan</h3>
                            <p>Tentukan langkah selanjutnya</p>
                        </div>
                        <div class="col-md-12">
                            <a href="{{ route('user.founds.questions.create.form', ['lostGoodId' => session('just_created_lost_good_id')]) }}" class="btn btn-success btn-block">Tambah pertanyaan</a>
                            <a href="{{ route('user.founds.my.list') }}" class="btn btn-primary btn-block">Kembali ke barang temuan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection

@push('after-style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
@endpush

@push('after-script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#date_of_found_input').datepicker({
                orientation: "bottom",
                format: 'yyyy-mm-dd',
                autoclose: true
            });

            @if(session(\App\Services\Session\NotificationKeys::SUCCESS))
            $('#next-step-modal').modal({
                backdrop: 'static'
            })
            @endif
        });
    </script>
@endpush