@extends('admin.dashboard.layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ __('label.categories') }}</h1>
        <a href="{{ route('admin.dashboard.category.create.form') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> {{ __('label.create_category') }}</a>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ __('label.categories_list') }}</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>{{ __('label.category_name') }}</th>
                                <th>{{ __('label.category_icon') }}</th>
                                <th>{{ __('label.actions') }}</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>{{ __('label.category_name') }}</th>
                                <th>{{ __('label.category_icon') }}</th>
                                <th>{{ __('label.actions') }}</th>
                            </tr>
                            </tfoot>
                            <tbody>
                                @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->font_awesome_icon_class_name }}</td>
                                    <td>
                                        <div class="form-group">
                                            <button data-form-action="{{ route('admin.dashboard.category.delete', ['categoryId' => $category->id]) }}" class="btn btn-sm btn-danger open-delete-confirmation-button">Delete</button>
                                            <a href="{{ route('admin.dashboard.category.update.form', ['categoryId' => $category->id]) }}" class="btn btn-info btn-sm">Update</a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
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
                    {{ __('messages.confirmation.delete_category') }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('label.close') }}</button>
                    <button id="delete-category-button" type="button" class="btn btn-danger">{{ __('label.delete') }}</button>
                </div>
            </div>
        </div>
    </div>

    <form id="delete-category-form" method="POST">
        @csrf
    </form>
@endsection

@push('after-script')
    <script>
        $(document).ready(function () {
            $(".open-delete-confirmation-button").on('click', function () {
                var deleteUrl = $(this).data('form-action');
                $('#delete-category-form').attr('action', deleteUrl);

                $("#delete-confirmation-modal").modal();
            });

            $('#delete-category-button').on('click', function () {
                $('#delete-category-form').submit();
            });
        });
    </script>
@endpush