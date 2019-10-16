@php
    use \App\Modules\Permissions\Permissions;
@endphp

@extends('user.layouts.app-with-side-menu')

@section('content')
    <div class="row">
        @if($showCreateButton)
            <div class="col-md-12">
                <a href="{{ route('user.lost.my.post.form') }}" class="btn btn-success">{{ __('label.create_lost_post') }}</a>
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
                                                <th>{{ __('label.good_name') }}</th>
                                                <td>{{ $lostGood->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>{{ __('label.good_category') }}</th>
                                                <td>
                                                    {{ __('categories.' . $lostGood->categories[0]->name)  }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>{{ __('label.lost_date') }}</th>
                                                <td>{{ $lostGood->date->format('d-m-Y') }}</td>
                                            </tr>
                                            <tr>
                                                <th>{{ __('label.lost_place') }}</th>
                                                <td>{{ $lostGood->place_details }}</td>
                                            </tr>
                                            <tr>
                                                <th>{{ __('label.information') }}</th>
                                                <td>{{ $lostGood->information }}</td>
                                            </tr>
                                            <tr>
                                                <th>{{ __('label.mobile_number') }}</th>
                                                <td>
                                                    <button class="btn btn-success btn-sm"><strong>{{ $lostGood->mobile_number }}</strong></button>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-md-2">
                                        @can(\App\Modules\Permissions\Permissions::UPDATE_LOST, $lostGood)
                                        <button data-action-url="{{ route('user.lost.my.delete', ['lostGoodId' => $lostGood->id]) }}" class="btn btn-danger btn-block btn-sm show-delete-lost-confirm-modal-button">{{ __('label.delete') }}</button>
                                        @endcan
                                        @can(\App\Modules\Permissions\Permissions::DELETE_LOST, $lostGood)
                                        <a href="{{ route('user.lost.my.update.form', ['lostGoodId' => $lostGood->id]) }}" class="btn btn-success btn-block btn-sm">{{ __('label.update') }}</a>
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
                    <h5 class="modal-title" id="exampleModalLongTitle">{{ __('label.delete_confirmation') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ __('messages.confirmation.delete_lost') }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('label.close') }}</button>
                    <button id="delete-lost-button" type="button" class="btn btn-danger">{{ __('label.delete') }}</button>
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