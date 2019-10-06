@php
    use \App\Modules\Permissions\Permissions;
@endphp

@extends('user.layouts.app-with-side-menu')

@section('content')
    <div class="row">
        @if($showCreateFoundButton)
        <div class="col-md-12">
            <a href="{{ route('user.founds.my.post.form') }}" class="btn btn-success">
                Buat pengumuman penemuan barang
            </a>
        </div>
        @endif

        <div class="col-md-12 mt-2">
            <div class="row">
                @foreach($lostGoods as $lostGood)
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    @if($lostGood->lostGoodImages->count())
                                        <img class="img-thumbnail" src="{{ $lostGood->lostGoodImages[0]->url }}" alt="">
                                    @else
                                    @endif
                                </div>
                                <div class="col-md-7">
                                    <table class="table table-bordered table-sm">
                                        <tr>
                                            <th>Nama barang</th>
                                            <td>
                                                {{ $lostGood->name }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Kategori</th>
                                            <td>{{  $lostGood->categories[0]->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal penemuan</th>
                                            <td>{{ $lostGood->date->format('d-m-Y') }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tempat penemuan</th>
                                            <td>{{ $lostGood->place_details }}</td>
                                        </tr>
                                        <tr>
                                            <th>Detail informasi</th>
                                            <td>{{ $lostGood->information }}</td>
                                        </tr>
                                        <tr>
                                            <th>Nomor HP</th>
                                            <td>
                                                <button class="btn btn-success btn-sm"><strong>{{ $lostGood->mobile_number }}</strong></button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-2">
                                    @if(!$lostGood->is_resolved)
                                        @can(\App\Modules\Permissions\Permissions::DELETE_FOUND, $lostGood)
                                        <button data-action-url="{{ route('user.founds.my.delete', ['lostGoodId' => $lostGood->id]) }}" class="btn btn-danger btn-block btn-sm show-delete-found-confirm-modal-button">Hapus</button>
                                        @endcan
                                        @can(\App\Modules\Permissions\Permissions::UPDATE_FOUND, $lostGood)
                                        <a href="{{ route('user.founds.my.update.form', ['lostGoodId' => $lostGood->id]) }}" class="btn btn-primary btn-block btn-sm">Ubah</a>
                                        @endcan
                                        @can(\App\Modules\Permissions\Permissions::VIEW_FOUND_QUESTIONS_LIST, $lostGood)
                                        @if(!$lostGood->questions->count())
                                            <a href="{{ route('user.founds.questions.create.form', ['lostGoodId' => $lostGood->id]) }}" class="btn btn-success btn-block btn-sm">Buat pertanyaan</a>
                                        @else
                                            <a href="{{ route('user.question.update.form', ['questionId' => $lostGood->questions[0]->id]) }}" class="btn btn-success btn-block btn-sm">Ubah pertanyaan</a>
                                        @endif
                                        @endcan
                                    @endif

                                    @can(\App\Modules\Permissions\Permissions::CLAIM_FOUND, $lostGood)
                                    <a href="{{ route('user.founds.others.claim.form', ['lostGoodId' => $lostGood->id]) }}" class="btn btn-warning btn-block btn-sm">Klaim</a>
                                    @endcan

                                    @can(\App\Modules\Permissions\Permissions::VIEW_FOUND_CLAIMS_LIST, $lostGood)
                                    <a href="{{ route('user.founds.my.claims.list', ['lostGoodId' => $lostGood->id]) }}" class="btn btn-warning btn-block btn-sm">Laporan</a>
                                    @endcan
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="modal fade" id="delete-found-confirmation-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Konfirmasi hapus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Hapus pengumuman penemuan barang ini ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button id="delete-found-button" type="button" class="btn btn-danger">Hapus</button>
                </div>
            </div>
        </div>
    </div>

    <form id="delete-found-form" method="POST">
        @csrf
    </form>
@endsection

@push('after-script')
    <script>
        $(document).ready(function () {
            $('.show-delete-found-confirm-modal-button').on('click', function () {
                var url = $(this).data('action-url');
                $('#delete-found-form').attr('action', url);
                $('#delete-found-confirmation-modal').modal();
            });

            $('#delete-found-button').on('click', function () {
                $('#delete-found-form').submit();
            });
        });
    </script>
@endpush