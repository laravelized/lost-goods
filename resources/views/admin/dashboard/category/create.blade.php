@extends('admin.dashboard.layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ __('label.create_category') }}</h1>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ __('label.create_category_form') }}</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.dashboard.category.create') }}">
                        @csrf
                        <div class="form-group">
                            <label for="">{{ __('label.category_name') }}</label>
                            <input name="category_name" type="text" class="form-control @error('category_name') is-invalid @enderror">
                            @error('category_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">{{ __('label.category_icon') }}</label>
                            <input name="category_icon" type="text" class="form-control @error('category_icon') is-invalid @enderror">
                            @error('category_icon')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">{{ __('label.save') }}</button>
                            <a href="{{ route('admin.dashboard.category.index') }}" class="btn btn-secondary">{{ __('label.back') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection