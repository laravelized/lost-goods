@extends('user.layouts.app')

@section('content')
    @if(!is_null($claim) && $claim->status !== \App\Modules\LostGoods\Enum\LostGoodClaimStatusEnum::CREATED)
        <div class="row mt-3 justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ __('label.claim_report') }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row justify-content-center align-items-center">
                                    <div class="col-md-6">
                                        <img src="{{ $lostGood->lostGoodImages[0]->url }}" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 text-center mt-3">
                                <h5>{{ $lostGood->name }}</h5>
                            </div>
                            <div class="col-md-12">
                                <table class="table table-bordered table-sm">
                                    <thead>
                                    <tr>
                                        <th>{{ __('label.username') }}</th>
                                        <td>{{ $lostGood->user->username }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('label.found_date') }}</th>
                                        <td>{{ $lostGood->date->format('d-m-Y') }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('label.found_place') }}</th>
                                        <td>{{ $lostGood->place_details }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('label.category') }}</th>
                                        <td>{{ __('categories.' . $lostGood->categories[0]->name)  }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('label.status') }}</th>
                                        <td>
                                            @if($claim->status === \App\Modules\LostGoods\Enum\LostGoodClaimStatusEnum::ACCEPTED)
                                                <button class="btn btn-success btn-sm">{{ __('label.accepted') }}</button>
                                            @endif

                                            @if($claim->status === \App\Modules\LostGoods\Enum\LostGoodClaimStatusEnum::DENIED)
                                                <button class="btn btn-danger btn-sm">{{ __('label.rejected') }}</button>
                                            @endif
                                        </td>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                            @if($claim->status === \App\Modules\LostGoods\Enum\LostGoodClaimStatusEnum::ACCEPTED)
                            <div class="col-md-12 text-center">
                                <button class="btn btn-primary btn-block">{{ __('label.please_contact') }}{{ $lostGood->user->mobile_number }}</button>
                            </div>
                            <div class="col-md-12 text-center mt-3">
                                <button id="open-chat-modal-button" class="btn btn-warning btn-block">{{ __('label.chat') }}</button>
                                <a target="_blank" class="btn btn-success btn-block" href="https://wa.me/{{ str_replace("0", "62", $lostGood->user->mobile_number) }}"><i class="fab fa-whatsapp"></i> {{ __('label.chat_whatsapp') }}</a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row mt-3 justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ __('label.claim_goods') }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p>{{ __('label.answer_question_about_the_goods') }}</p>
                            </div>
                            <div class="col-md-12">
                                <form action="{{ route('user.founds.others.claim', ['lostGoodId' => $lostGood->id]) }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="">{{ __('label.question') }}</label>
                                                <input readonly type="text" class="form-control" value="{{ $questions[0]->question_text }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="">{{ __('label.answer') }}</label>
                                                <textarea name="answer" cols="30" rows="5" class="form-control @error('answer') is-invalid @enderror">{{ is_null($answer) ? '' : $answer->answer_text  }}</textarea>
                                                @error('answer')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <button class="btn btn-success btn-block">{{ __('label.claim') }}</button>
                                                <a href="{{ route('user.founds.others.list') }}" class="btn btn-warning btn-block">{{ __('label.back') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="modal fade" id="chat-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{ __('label.chat') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row" id="chats-container" style="max-height: 500px; overflow: scroll;">
                                @forelse($chats as $chat)
                                    @if(request()->user()->id === $chat->user_id)
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-6"></div>
                                                <div class="col-6 float-left">
                                                    <div class="alert alert-success">
                                                        {{ $chat->content }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-6 float-left">
                                                    <div class="alert alert-secondary">
                                                        {{ $chat->content }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @empty
                                    <div class="col-md-12">
                                        <div class="alert alert-secondary text-center">
                                            <strong>{{ __('label.no_chats') }}</strong>.
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-12">
                                    <textarea id="chat-input" class="form-control"></textarea>
                                </div>
                                <div class="col-12 mt-2">
                                    <button id="send-chat-button" class="btn btn-success btn-block">{{ __('label.send') }}</button>
                                </div>
                            </div>
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
    @if(!is_null($claim))
    <script src="https://js.pusher.com/5.0/pusher.min.js"></script>
    @endif

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(document).ready(function () {
            var currentUserId = "{{ request()->user()->id }}";

            function getCurrentUserChannelBubble(content) {
                return '<div class="col-md-12"><div class="row"><div class="col-6"></div><div class="col-6 float-left"> <div class="alert alert-success">' + content +'</div> </div> </div> </div>';
            }

            function getAnotherUserChannelBubble(content) {
                return '<div class="col-md-12"><div class="row"><div class="col-6 float-left"> <div class="alert alert-secondary">' + content +'</div> </div> </div> </div>';
            }

            $('#open-chat-modal-button').on('click', function () {
                $('#chat-modal').modal({
                    backdrop: 'static'
                });
            });

            $('#date_of_found_input').datepicker({
                orientation: "bottom",
                format: 'yyyy-mm-dd',
                autoclose: true
            });

            @if(!is_null($claim))

            var claimId = "{{ $claim->id }}";
            var channelName = "claim@" + claimId;
            var pusher = new Pusher('{{ config('broadcasting.connections.pusher.key') }}', {
                cluster: '{{ config('broadcasting.connections.pusher.options.cluster') }}',
                forceTLS: true
            });

            var channel = pusher.subscribe(channelName);
            channel.bind('message-incoming', function(data) {
                if (parseInt(data.user_id) === parseInt(currentUserId)) {
                    $('#chats-container').append(getCurrentUserChannelBubble(data.message));
                } else {
                    $('#chats-container').append(getAnotherUserChannelBubble(data.message));
                }
                setTimeout(function () {
                    var chatsContainer = document.getElementById("chats-container");
                    chatsContainer.scrollTop = chatsContainer.scrollHeight;
                }, 100);
            });



            $('#send-chat-button').on('click', function () {
                var url = "{{ route('user.claim.chat', ['claimId' => $claim->id]) }}";
                var request = $.post(url, {
                    message: $('#chat-input').val()
                });
                request
                    .then(function (response) {
                        console.log(error);
                        $('#chat-input').val("");
                    })
                    .catch(function (error) {
                        $('#chat-input').val("");
                    })
            });
            @endif
        });
    </script>
@endpush