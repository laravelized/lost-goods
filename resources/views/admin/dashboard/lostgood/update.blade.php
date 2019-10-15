@extends('admin.dashboard.layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        @if($lostGood->type === \App\Modules\LostGoods\Enum\LostGoodTypeEnum::LOST)
        <h1 class="h3 mb-0 text-gray-800">{{ __('label.update_losts') }}</h1>
        @else
        <h1 class="h3 mb-0 text-gray-800">{{ __('label.update_founds') }}</h1>
        @endif
    </div>
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-6 text-center">
                            @if($lostGood->lostGoodImages->count())
                                <img style="width: 50%;" class="img-fluid" src="{{ $lostGood->lostGoodImages[0]->url }}" alt="">
                            @else
                                <img style="width: 50%;" class="img-fluid" src="" alt="">
                            @endif
                        </div>
                        <div class="col-12">
                            <form
                                    enctype="multipart/form-data"
                                    @if($lostGood->type === \App\Modules\LostGoods\Enum\LostGoodTypeEnum::LOST)
                                    action="{{ route('admin.dashboard.losts.update', ['lostGoodId' => $lostGood->id]) }}"
                                    @else
                                    action="{{ route('admin.dashboard.founds.update', ['lostGoodId' => $lostGood->id]) }}"
                                    @endif
                                    method="POST" >
                                @csrf
                                <div class="form-group">
                                    <label for="">{{ __('label.image') }}</label>
                                    <input type="file" class="form-control-file" name="image">
                                </div>

                                <div class="form-group">
                                    <label for="">{{ __('label.good_name') }}</label>
                                    <input value="{{ $lostGood->name }}" type="text" class="form-control @error('good_name') is-invalid @enderror" name="good_name">
                                    @error('good_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">{{ __('label.category') }}</label>
                                    <select name="category" class="form-control">
                                        @foreach($categories as $category)
                                            <option @if($lostGood->categories[0]->id === $category->id) selected @endif value="{{ $category->name }}">{{ __('categories.' . $category->name) }}</option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                @if($lostGood->type === \App\Modules\LostGoods\Enum\LostGoodTypeEnum::LOST)
                                <div class="form-group">
                                    <label for="">{{ __('label.lost_place') }}</label>
                                    <input value="{{ $lostGood->place_details }}" type="text" class="form-control @error('lost_place') is-invalid @enderror" name="lost_place">
                                    @error('lost_place')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                @else
                                <div class="form-group">
                                    <label for="">{{ __('label.found_place') }}</label>
                                    <input value="{{ $lostGood->place_details }}" type="text" class="form-control @error('found_place') is-invalid @enderror" name="found_place">
                                    @error('found_place')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                @endif

                                @if($lostGood->type === \App\Modules\LostGoods\Enum\LostGoodTypeEnum::LOST)
                                <div class="form-group">
                                    <label for="">{{ __('label.lost_date') }}</label>
                                    <input id="date-input" value="{{ $lostGood->date->format('Y-m-d') }}" type="text" class="form-control @error('lost_date') is-invalid @enderror" name="lost_date">
                                    @error('lost_date')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                                @else
                                <div class="form-group">
                                    <label for="">{{ __('label.found_date') }}</label>
                                    <input id="date-input" value="{{ $lostGood->date->format('Y-m-d') }}" type="text" class="form-control @error('found_date') is-invalid @enderror" name="found_date">
                                    @error('found_date')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                                @endif

                                <div class="form-group">
                                    <label for="">{{ __('label.mobile_number') }}</label>
                                    <input value="{{ $lostGood->mobile_number }}" type="text" class="form-control @error('mobile_number') is-invalid @enderror" name="mobile_number">
                                    @error('mobile_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                @if($lostGood->type === \App\Modules\LostGoods\Enum\LostGoodTypeEnum::LOST)
                                <div class="form-group">
                                    <label for="">{{ __('label.information_details') }}</label>
                                    <textarea name="information_details" class="form-control @error('information_details') is-invalid @enderror">{{ $lostGood->information }}</textarea>
                                    @error('information_details')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                @endif

                                <div class="form-group">
                                    <button class="btn btn-success">{{ __('label.update') }}</button>
                                    <a href="{{ url()->previous() }}" class="btn btn-secondary">{{ __('label.back') }}</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
@endpush

@push('after-script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#date-input').datepicker({
                orientation: "bottom",
                format: 'yyyy-mm-dd',
                autoclose: true
            });
        });
    </script>
@endpush
