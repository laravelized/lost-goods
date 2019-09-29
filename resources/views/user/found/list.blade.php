@extends('user.layouts.app-with-side-menu')

@section('content')
    <div class="row">
        <div class="col-md-12" style="margin-top: 50px;">
            <a href="{{ route('user.founds.my.post.form') }}" class="btn btn-success">Post your found</a>
        </div>

        <div class="col-md-12" style="margin-top: 20px;">
            <div class="row">
                @foreach($lostGoods as $lostGood)
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    @if($lostGood->lostGoodImages->count())
                                        <img class="img-thumbnail" src="{{ $lostGood->lostGoodImages[0]->url }}" alt="">
                                    @else
                                    @endif
                                </div>
                                <div class="col-md-7">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th colspan="2">{{ $lostGood->name }}</th>
                                        </tr>
                                        <tr>
                                            <th>Category</th>
                                            <td>Accessory</td>
                                        </tr>
                                        <tr>
                                            <th>Lost date</th>
                                            <td>{{ $lostGood->date }}</td>
                                        </tr>
                                        <tr>
                                            <th>Lost place</th>
                                            <td>{{ $lostGood->place_details }}</td>
                                        </tr>
                                        <tr>
                                            <th>Information details</th>
                                            <td>{{ $lostGood->information }}</td>
                                        </tr>
                                        <tr>
                                            <th>Contact number</th>
                                            <td>
                                                <button class="btn btn-success btn-sm"><strong>{{ $lostGood->mobile_number }}</strong></button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-2">
                                    <button data-action-url="{{  }}" class="btn btn-danger btn-block btn-sm">Delete</button>
                                    <a class="btn btn-primary btn-block btn-sm">Update</a>
                                    <a href="{{ route('user.founds.questions.list', ['lostGoodId' => $lostGood->id]) }}" class="btn btn-success btn-block btn-sm">Questions list</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="modal fade" id="delete-found-confirmation-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Delete found confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Delete this found ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="delete-found-button" type="button" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
    </div>

    <form id="delete-question-form" method="POST">
        @csrf
    </form>
@endsection