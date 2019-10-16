@extends('user.layouts.app-with-side-menu')

@section('content')
    <div class="row">
        <div class="col-md-12" style="margin-top: 20px;">
            <a href=""></a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>{{ __('label.question') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($questions as $question)
                        <tr>
                            <td>{{ $questiion->question_text }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection