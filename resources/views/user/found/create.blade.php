@extends('user.layouts.app')

@section('content')
    <div class="row mt-3 justify-content-center align-items-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h5>{{ __('label.create_founds') }}</h5>
                </div>
                <div class="card-body">
                    <form autocomplete="off" enctype="multipart/form-data" action="{{ route('user.founds.my.post') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">{{ __('label.good_name') }}</label>
                                    <input value="{{ old('good_name') }}" name="good_name" type="text" class="form-control @error('good_name') is-invalid @enderror">
                                    @error('good_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">{{ __('label.goods_category') }}</label>
                                    <select name="category" class="form-control @error('category') is-invalid @enderror">
                                        @foreach($categories    as $category)
                                            <option @if(old('category') === $category->name) selected @endif value="{{ $category->name }}">{{ __('categories.' . $category->name) }}</option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">{{ __('label.found_place') }}</label>
                                    <input value="{{ old('place_of_found') }}" name="place_of_found" type="text" class="form-control @error('place_of_found') is-invalid @enderror">
                                    @error('place_of_found')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">{{ __('label.found_date') }}</label>
                                    <input value="{{ old('date_of_found') }}" id="date_of_found_input" name="date_of_found" type="text" class="form-control @error('date_of_found') is-invalid @enderror">
                                    @error('date_of_found')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">{{ __('label.image') }}</label>
                                    <input name="image" type="file" class="form-control-file">
                                </div>
                                <div class="form-group">
                                    <label for="">{{ __('label.mobile_number') }}</label>
                                    <input value="{{ old('mobile_number') }}" type="text" class="form-control @error('mobile_number') is-invalid @enderror" name="mobile_number">
                                    @error('mobile_number')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <button class="btn btn-success btn-block">{{ __('label.post') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if(session(\App\Services\Session\NotificationKeys::SUCCESS))
    <div class="modal fade" id="next-step-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <span class="fa fa-question fa-6x"></span>
                        </div>
                        <div class="col-md-12 text-center">
                            <h3>{{ __('messages.notifications.data_has_been_posted') }}</h3>
                            <p>{{ __('label.choose_your_next_step') }}</p>
                        </div>
                        <div class="col-md-12">
                            <a href="{{ route('user.founds.questions.create.form', ['lostGoodId' => session('just_created_lost_good_id')]) }}" class="btn btn-success btn-block">{{ __('label.add_question') }}</a>
                            <a href="{{ route('user.founds.my.list') }}" class="btn btn-primary btn-block">{{ __('label.go_back_to_found') }}</a>
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

            @if(session(\App\Services\Session\NotificationKeys::SUCCESS))
            $('#next-step-modal').modal({
                backdrop: 'static'
            })
            @endif
        });
    </script>
@endpush