@php
    use \App\Modules\Permissions\Permissions;
@endphp

@extends('user.layouts.app-with-side-menu')

@section('content')
    <div class="row">
        @if($showCreateFoundButton)
        <div class="col-md-12" style="margin-top: 50px;">
            <a href="{{ route('user.founds.my.post.form') }}" class="btn btn-success">Post your found</a>
        </div>
        @endif

        <div class="col-md-12" style="margin-top: 50px;">
            <div class="row">
                @foreach($lostGoods as $lostGood)
                <div class="col-md-12">
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
                                    <table class="table table-bordered">
                                        <tr>
                                            <th colspan="2">{{ $lostGood->name }}</th>
                                        </tr>
                                        <tr>
                                            <th>Category</th>
                                            <td>Accessory</td>
                                        </tr>
                                        <tr>
                                            <th>Lost date</th>
                                            <td>{{ $lostGood->date }}</td>
                                        </tr>
                                        <tr>
                                            <th>Lost place</th>
                                            <td>{{ $lostGood->place_details }}</td>
                                        </tr>
                                        <tr>
                                            <th>Information details</th>
                                            <td>{{ $lostGood->information }}</td>
                                        </tr>
                                        <tr>
                                            <th>Contact number</th>
                                            <td>
                                                <button class="btn btn-success btn-sm"><strong>{{ $lostGood->mobile_number }}</strong></button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-2">
                                    @can(\App\Modules\Permissions\Permissions::DELETE_FOUND, $lostGood)
                                    <button data-action-url="{{ route('user.founds.my.delete', ['lostGoodId' => $lostGood->id]) }}" class="btn btn-danger btn-block btn-sm show-delete-found-confirm-modal-button">Delete</button>
                                    @endcan
                                    @can(\App\Modules\Permissions\Permissions::UPDATE_FOUND, $lostGood)
                                    <a href="{{ route('user.founds.my.update.form', ['lostGoodId' => $lostGood->id]) }}" class="btn btn-primary btn-block btn-sm">Update</a>
                                    @endcan
                                    @can(\App\Modules\Permissions\Permissions::VIEW_FOUND_QUESTIONS_LIST, $lostGood)
                                    <a href="{{ route('user.founds.questions.list', ['lostGoodId' => $lostGood->id]) }}" class="btn btn-success btn-block btn-sm">Questions list</a>
                                    @endcan
                                    @can(\App\Modules\Permissions\Permissions::CLAIM_FOUND, $lostGood)
                                    <a href="" class="btn btn-warning btn-block btn-sm">Claim</a>
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
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete found confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Delete this found ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="delete-found-button" type="button" class="btn btn-danger">Delete</button>
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