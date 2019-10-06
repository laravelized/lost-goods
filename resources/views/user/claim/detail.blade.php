@extends('user.layouts.app')

@section('content')
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
                                <div class="col-md-6 text-center">
                                    <img src="{{ $image->url }}" alt="" class="img-fluid">
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
                                        <td>{{ $user->username }}</td>
                                    </tr>
                                    <tr>
                                        <th>Pertanyaan</th>
                                        <td>{{ $question->question_text }}</td>
                                    </tr>
                                    <tr>
                                        <th>Jawaban</th>
                                        <td>{{ $answer->answer_text }}</td>
                                    </tr>
                                    @if($claim->status !== \App\Modules\LostGoods\Enum\LostGoodClaimStatusEnum::CREATED)
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
                                    @endif
                                </thead>
                            </table>
                        </div>
                        @if($claim->status === \App\Modules\LostGoods\Enum\LostGoodClaimStatusEnum::CREATED)
                        <div class="col-md-12 text-center">
                            <button id="show-accept-confirmation-button" class="btn btn-success btn-sm">Terima</button>
                            <button id="show-reject-confirmation-button" class="btn btn-danger btn-sm">Tolak</button>
                            <form id="accept-claim-form" action="{{ route('user.claims.detail.accept', ['claimId' => $claim->id]) }}" method="POST">
                                @csrf
                            </form>
                            <form id="deny-claim-form" action="{{ route('user.claims.detail.deny', ['claimId' => $claim->id]) }}" method="POST">
                                @csrf
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="accept-confirmation-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Konfirmasi terima klaim</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah anda akan menerima klaim ini ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button id="accept-claim-button" type="button" class="btn btn-success">Terima</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="reject-confirmation-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Konfirmasi tolak klaim</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah anda akan menolak klaim ini ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button id="reject-claim-button" type="button" class="btn btn-danger">Tolak</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-script')
    <script>
        $(document).ready(function () {
            $('#accept-claim-button').on('click', function () {
                $('#accept-claim-form').submit();
            });

            $('#reject-claim-button').on('click', function () {
                $('#deny-claim-form').submit();
            });

            $('#show-accept-confirmation-button').on('click', function () {
                $('#accept-confirmation-modal').modal();
            });

            $('#show-reject-confirmation-button').on('click', function () {
                $('#reject-confirmation-modal').modal();
            });
        });
    </script>
@endpush