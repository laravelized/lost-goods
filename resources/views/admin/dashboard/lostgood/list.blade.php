@extends('admin.dashboard.layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        @if(request()->route()->getName() === 'admin.dashboard.losts.index')
        <h1 class="h3 mb-0 text-gray-800">{{ __('label.losts_list') }}</h1>
        @else
        <h1 class="h3 mb-0 text-gray-800">{{ __('label.founds_list') }}</h1>
        @endif
    </div>
    <div class="row">
        <div class="col-12">
            <div class="row">
                @forelse($lostGoods as $lostGood)
                    <div class="col-md-6 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <img style="width: 100%;" class="img-fluid" src="{{ $lostGood->lostGoodImages[0]->url }}" alt="">
                                    </div>
                                    <div class="col-md-6">
                                        <table class="table table-bordered table-sm">
                                            <tbody>
                                                <tr>
                                                    <th>{{ __('label.username') }}</th>
                                                    <td>{{ $lostGood->user->username }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('label.good_name') }}</th>
                                                    <td>{{ $lostGood->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('label.category') }}</th>
                                                    <td>{{ __('categories.' . $lostGood->categories[0]->name) }}</td>
                                                </tr>
                                                <tr>
                                                    @if($lostGood->type === \App\Modules\LostGoods\Enum\LostGoodTypeEnum::LOST)
                                                    <th>{{ __('label.lost_place') }}</th>
                                                    @else
                                                    <th>{{ __('label.found_place') }}</th>
                                                    @endif
                                                    <td>{{ $lostGood->place_details }}</td>
                                                </tr>
                                                <tr>
                                                    @if($lostGood->type === \App\Modules\LostGoods\Enum\LostGoodTypeEnum::LOST)
                                                    <th>{{ __('label.lost_date') }}</th>
                                                    @else
                                                    <th>{{ __('label.found_date') }}</th>
                                                    @endif
                                                    <td>{{ $lostGood->date->format('d-m-Y') }}</td>
                                                </tr>
                                                @if($lostGood->type === \App\Modules\LostGoods\Enum\LostGoodTypeEnum::LOST)
                                                <tr>
                                                    <th>{{ __('label.detail_informations') }}</th>
                                                    <td>{{ $lostGood->information }}</td>
                                                </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-3">
                                        <button class="btn btn-primary btn-block btn-sm">{{ $lostGood->mobile_number }}</button>
                                        <a href="{{ route('admin.dashboard.lostgood.update.form', ['lostGoodId' => $lostGood->id]) }}" class="btn btn-success btn-block btn-sm">{{ __('label.update') }}</a>
                                        <button data-delete-url="{{ route('admin.dashboard.lostgood.delete', ['lostGoodId' => $lostGood->id]) }}" class="open-delete-confirmation btn btn-danger btn-block btn-sm">{{ __('label.delete') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12 text-center">
                        <div class="card">
                            <div class="card-body">
                                <h5><strong>{{ __('label.no_data') }}</strong></h5>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <div class="modal fade" id="delete-confirmation-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{ __('label.delete_confirmation') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ __('messages.confirmation.delete_data') }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('label.close') }}</button>
                    <button id="delete-button" type="button" class="btn btn-danger">{{ __('label.delete') }}</button>
                </div>
            </div>
        </div>
    </div>

    <form id="delete-form" method="POST">
        @csrf
    </form>
@endsection

@push('after-script')
    <script>
        var $deleteConfirmationModal = $('#delete-confirmation-modal');
        var $deleteForm = $('#delete-form');
        var $deleteButton = $('#delete-button');

        $('.open-delete-confirmation').on('click', function () {
            $deleteForm.attr('action', $(this).data('delete-url'));
            $deleteConfirmationModal.modal({
                backdrop: 'static'
            });
        });

        $deleteButton.on('click', function () {
            $deleteForm.submit();
        });
    </script>
@endpush