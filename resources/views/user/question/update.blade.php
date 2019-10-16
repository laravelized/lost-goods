@extends('user.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5>{{ __('label.update_question_for_the_goods') }}</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('user.question.update', ['questionId' => $question->id]) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="">{{ __('label.question') }}</label>
                                    <textarea name="question"  cols="30" rows="5" class="form-control @error('question') is-invalid @enderror">{{ $question->question_text }}</textarea>
                                    @error('question')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-success btn-block">{{ __('label.update') }}</button>
                                    <a href="{{ route('user.founds.my.list') }}" class="btn btn-warning btn-block">{{ __('label.back') }}</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection