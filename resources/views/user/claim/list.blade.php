@extends('user.layouts.app')

@section('content')
    <div class="row mt-5 justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>Daftar klaim</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Alamat</th>
                            <th>Tombol</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($claims->count())
                        @foreach($claims as $claim)
                            <tr>
                                <td>{{ $claim->user->full_name }}</td>
                                <td>{{ $claim->user->username }}</td>
                                <td>{{ $claim->user->address }}</td>
                                <td>
                                    <a href="{{ route('user.claims.detail', ['claimId' => $claim->id]) }}" class="btn btn-sm btn-info">Lihat jawaban</a>
                                </td>
                            </tr>
                        @endforeach
                        @else
                            <tr>
                                <td colspan="4" class="text-center">Tidak ada klaim</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
