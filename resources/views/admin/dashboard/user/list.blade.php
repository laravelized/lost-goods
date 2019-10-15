@extends('admin.dashboard.layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ __('label.users') }}</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ __('label.users_list') }}</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>{{ __('label.username') }}</th>
                                <th>{{ __('label.full_name') }}</th>
                                <th>{{ __('label.gender') }}</th>
                                <th>{{ __('label.address') }}</th>
                                <th>{{ __('label.phone_number') }}</th>
                                <th>{{ __('label.status') }}</th>
                                <th>{{ __('label.actions') }}</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>{{ __('label.username') }}</th>
                                <th>{{ __('label.full_name') }}</th>
                                <th>{{ __('label.gender') }}</th>
                                <th>{{ __('label.address') }}</th>
                                <th>{{ __('label.phone_number') }}</th>
                                <th>{{ __('label.status') }}</th>
                                <th>{{ __('label.actions') }}</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @forelse($users as $user)
                                <tr>
                                    <td>
                                        {{ $user->username }}
                                    </td>
                                    <td>
                                        {{ $user->full_name }}
                                    </td>
                                    <td>
                                        @if($user->gender)
                                            {{ __('genders.male') }}
                                        @else
                                            {{ __('genders.female') }}
                                        @endif
                                    </td>
                                    <td>
                                        {{ $user->address }}
                                    </td>
                                    <td>
                                        {{ $user->mobile_number }}
                                    </td>
                                    <td>
                                        {{ __('statuses.user.active') }}
                                    </td>
                                    <td>
                                        <button data-delete-url="{{ route('admin.dashboard.user.delete', ['userId' => $user->id]) }}" class="open-delete-confirmation btn btn-danger btn-sm">{{ __('label.delete') }}</button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center"><strong>{{ __('label.no_users') }}</strong></td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
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
                    {{ __('messages.confirmation.delete_user') }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('label.close') }}</button>
                    <button id="delete-user-button" type="button" class="btn btn-danger">{{ __('label.delete') }}</button>
                </div>
            </div>
        </div>
    </div>

    <form id="delete-user-form" method="POST">
        @csrf
    </form>
@endsection

@push('after-script')
    <script>
        $(document).ready(function () {
            var $deleteConfirmationModal = $('#delete-confirmation-modal');
            var $deleteUserForm = $('#delete-user-form');
            var $deleteUserButton = $('#delete-user-button');

            $('.open-delete-confirmation').on('click', function () {
                 $deleteUserForm.attr('action', $(this).data('delete-url'));
                 $deleteConfirmationModal.modal({
                     backdrop: 'static'
                 });
            });

            $deleteUserButton.on('click', function () {
                $deleteUserForm.submit();
            });
        });
    </script>
@endpush