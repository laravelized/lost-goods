@php
    use \App\Modules\Permissions\Permissions;
@endphp

@extends('user.layouts.app-with-side-menu')

@section('content')
    <div class="row">
        @if($showCreateButton)
            <div class="col-md-12">
                <a href="{{ route('user.lost.my.post.form') }}" class="btn btn-success">Buat pengumuman kehilangan</a>
            </div>
        @endif

        <div class="col-md-12 mt-3">
            <div class="row">
                @foreach($lostGoods as $lostGood)
                    <div class="col-md-12 mt-1 mb-2">
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
                                                <td>{{ $lostGood->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Kategori</th>
                                                <td>
                                                    {{ $lostGood->categories[0]->name }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Tanggal hilang</th>
                                                <td>{{ $lostGood->date->format('d-m-Y') }}</td>
                                            </tr>
                                            <tr>
                                                <th>Tempat hilang</th>
                                                <td>{{ $lostGood->place_details }}</td>
                                            </tr>
                                            <tr>
                                                <th>Informasi</th>
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
                                        @can(\App\Modules\Permissions\Permissions::UPDATE_LOST, $lostGood)
                                        <button data-action-url="{{ route('user.lost.my.delete', ['lostGoodId' => $lostGood->id]) }}" class="btn btn-danger btn-block btn-sm show-delete-lost-confirm-modal-button">Hapus</button>
                                        @endcan
                                        @can(\App\Modules\Permissions\Permissions::DELETE_LOST, $lostGood)
                                        <a href="{{ route('user.lost.my.update.form', ['lostGoodId' => $lostGood->id]) }}" class="btn btn-success btn-block btn-sm">Ubah</a>
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
    <div class="modal fade" id="delete-lost-confirmation-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Konfirmasi hapus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Hapus pengumuman kehilangan ini ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button id="delete-lost-button" type="button" class="btn btn-danger">Hapus</button>
                </div>
            </div>
        </div>
    </div>

    <form id="delete-lost-form" method="POST">
        @csrf
    </form>
@endsection

@push('after-script')
    <script>
        $(document).ready(function () {
            $('.show-delete-lost-confirm-modal-button').on('click', function () {
                var url = $(this).data('action-url');
                $('#delete-lost-form').attr('action', url);

                $('#delete-lost-confirmation-modal').modal();
            });

            $('#delete-lost-button').on('click', function () {
                $('#delete-lost-form').submit();
            });
        });
    </script>
@endpush