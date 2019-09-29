@extends('user.layouts.app-with-side-menu')

@section('content')
    <div class="row">
        <div class="col-md-12" style="margin-top: 20px;">
            <a href="{{ route('user.founds.questions.create.form', ['lostGoodId' => $lostGood->id]) }}" class="btn btn-success">Create question</a>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Question</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($questions as $question)
                    <tr>
                        <td>{{ $question->question_text }}</td>
                        <td>
                            <a href="{{ route('user.question.update.form', ['questionId' => $question->id]) }}" class="btn btn-success btn-sm">Update</a>
                            <button data-action-url="{{ route('user.question.delete', ['questionId' => $question->id]) }}" class="btn btn-danger btn-sm show-delete-question-modal">Delete</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="delete-question-confirmation-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete question confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Delete this question ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="delete-question-button" type="button" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <form id="delete-question-form" method="POST">
        @csrf
    </form>
@endsection

@push('after-script')
    <script>
        $(document).ready(function () {
             $('.show-delete-question-modal').on('click', function () {
                 var url = $(this).data('action-url');
                 $('#delete-question-form').attr('action', url);
                 $('#delete-question-confirmation-modal').modal();
             });

             $('#delete-question-button').on('click', function () {
                 $('#delete-question-form').submit();
             });
        });
    </script>
@endpush