@extends('user.layouts.app-with-side-menu')

@section('content')
    <div class="row">
        <div class="col-md-12" style="margin-top: 20px;">
            <form action="{{ route('user.question.update', ['questionId' => $question->id]) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Question</label>
                    <textarea name="question"  cols="30" rows="10" class="form-control">{{ $question->question_text }}</textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection