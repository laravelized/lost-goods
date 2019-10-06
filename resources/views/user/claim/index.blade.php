@extends('user.layouts.app')

@section('content')
    @if(!is_null($claim) && $claim->status !== \App\Modules\LostGoods\Enum\LostGoodClaimStatusEnum::CREATED)
        <div class="row mt-3 justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Laporan klaim</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row justify-content-center align-items-center">
                                    <div class="col-md-6">
                                        <img src="{{ $lostGood->lostGoodImages[0]->url }}" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 text-center mt-3">
                                <h5>{{ $lostGood->name }}</h5>
                            </div>
                            <div class="col-md-12">
                                <table class="table table-bordered table-sm">
                                    <thead>
                                    <tr>
                                        <th>Username</th>
                                        <td>{{ $lostGood->user->username }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal temuan</th>
                                        <td>{{ $lostGood->date->format('d-m-Y') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tempat temuan</th>
                                        <td>{{ $lostGood->place_details }}</td>
                                    </tr>
                                    <tr>
                                        <th>Kategori</th>
                                        <td>{{ $lostGood->categories[0]->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>
                                            @if($claim->status === \App\Modules\LostGoods\Enum\LostGoodClaimStatusEnum::ACCEPTED)
                                                <button class="btn btn-success btn-sm">Diterima</button>
                                            @endif

                                            @if($claim->status === \App\Modules\LostGoods\Enum\LostGoodClaimStatusEnum::DENIED)
                                                <button class="btn btn-danger btn-sm">Ditolak</button>
                                            @endif
                                        </td>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                            @if($claim->status === \App\Modules\LostGoods\Enum\LostGoodClaimStatusEnum::ACCEPTED)
                            <div class="col-md-12 text-center">
                                <button class="btn btn-success btn-block">Silahkan hubungi {{ $lostGood->user->mobile_number }}</button>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row mt-3 justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Pengakuan barang</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p>Jawablah pertanyaan sesuai yang anda ketahui tentang barang tersebut</p>
                            </div>
                            <div class="col-md-12">
                                <form action="{{ route('user.founds.others.claim', ['lostGoodId' => $lostGood->id]) }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="">Pertanyaan</label>
                                                <input readonly type="text" class="form-control" value="{{ $questions[0]->question_text }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="">Jawaban</label>
                                                <textarea name="answer" cols="30" rows="5" class="form-control @error('answer') is-invalid @enderror">{{ is_null($answer) ? '' : $answer->answer_text  }}</textarea>
                                                @error('answer')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <button class="btn btn-success btn-block">Klaim</button>
                                                <a href="{{ route('user.founds.others.list') }}" class="btn btn-warning btn-block">Kembali</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
        });
    </script>
@endpush