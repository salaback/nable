@extends('app')

@section('content')
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Message</h4>
            </div>
            <div class="panel-body" id="message-panel">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label for="name" class="control-label col-sm-4">Name</label>

                        <div class="col-sm-8">
                            @if(isset($message))
                                <b>{{$message->name}}</b>
                            @else
                                <input type="text" class="form-control" id="name" name="name"/>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message" class="control-label col-sm-4">Message</label>

                        <div class="col-sm-8">
                            @if(isset($message))
                                <b>{{$message->message}}</b>
                            @else
                                <input type="text" class="form-control" id="message" name="message"/>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="final_message" class="control-label col-sm-4">Final Message?</label>

                        <div class="col-sm-8">
                            <input type="checkbox" id="final_message" name="final_message" value="true"/>
                        </div>
                    </div>
                    @if(!isset($message)) <button id="create-message" class="btn btn-primary col-sm-offset-4" onclick="createMessage()">Create Message</button> @endif
                </div>
            </div>

        </div>
        <div class="panel panel-default @if(!isset($message))hidden @endif" id="reply-wrapper">
            <div class="panel-heading">
                <b>Replies</b>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">

                            </div>
                            <div class="panel-body">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#addReply"><i class="glyphicon glyphicon-plus"></i> Create Reply</button>
                            </div>
                        </div>
                    </div>
                    <div id="replies-wrapper">
                    @forelse(DB::table($_GET['ti_id'] .  '_replies')->where('message_id', $message->id)->get() as $reply)

                        @include('modules.smsquery._reply_tile')

                    @empty


                    @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addReply" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add Reply</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="message_id" value=" @if(isset($message)) {{$message->id}} @endif ">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label for="reply" class="control-label col-sm-4">Expected Reply</label>

                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="reply" name="reply"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="keywords" class="control-label col-sm-4">Keywords</label>

                            <div class="col-sm-8">
                                <textarea class="form-control" id="keywords" name="keywords"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="final_message" class="control-label col-sm-4">Don't Reply?</label>

                            <div class="col-sm-8">
                                <input type="checkbox" id="final_reply" name="final_reply" value="true"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="createReply()">Create Reply</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="addNextMessage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add Next Message</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="reply_id" value="">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label for="messages" class="control-label col-sm-4">Message</label>

                            <div class="col-sm-8">
                                <select class='form-control' style="width: 100%" name="message_id" id="reply_message_id">
                                    <option value="null">Select One</option>
                                    @forelse(DB::table($_GET['ti_id'] . '_messages')->get() as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @empty
                                        <option value="null">None</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="newMessageName" class="control-label col-sm-4">New Message Name</label>

                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="replyMessageName" name="newMessageName"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="newMessage" class="control-label col-sm-4">New Message</label>

                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="replyMessage" name="newMessage"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="FinalMessage" class="control-label col-sm-4">Final Message?</label>

                            <div class="col-sm-8">
                                <input type="checkbox" class="form-control" id="replyFinalMessage" name="FinalMessage"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="linkNextMessage()">Link Next Message</button>
                </div>
            </div>
        </div>
    </div>
@stop

@push('style')

<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />

@stop

@push('javascript')

    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
    <script type="text/javascript">
        $('.select').select2({

        });
    </script>

    <script>
        function createMessage()
        {
            var name = $('#name').val();
            var message = $('#message').val();
            var final = $('#final-message').val();

            $.ajax({
               url: "/toot/smsquery/message-create",
                type: "Post",
                data: {
                    _token: "{{csrf_token()}}",
                    toot_id: "{{$toot['id']}}",
                    message: {
                        name: name,
                        message: message,
                        end: final
                    }
                }
            }).done(function(data){
                $('#create-message').addClass('hidden');
                $('#reply-wrapper').removeClass('hidden');
                $('#message_id').val(data);
            })
        }

        function createReply()
        {
            var reply = $('#reply').val();
            var keywords = $('#keywords').val();
            var message_id = $('#message_id').val();
            var final = $('#reply-final').val();

            $.ajax({
                url: "/toot/smsquery/reply-create",
                type: "Post",
                data: {
                    _token: "{{csrf_token()}}",
                    toot_id: "{{$toot['id']}}",
                    reply: {
                        message_id: message_id,
                        reply: reply,
                        keywords: keywords,
                        end: final
                    }
                }
            }).success(function( data ){
                $('#replies-wrapper').append( data );
                $('#reply').val( null );
                $('#keywords').val( null );
                $('#final').val( null );
            });
        }

        $('#addNextMessage').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var reply_id = button.data('reply') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('#reply_id').val(reply_id)
        })

        function linkNextMessage()
        {
            var reply_id = $('#reply_id').val();
            var message_id = $('#reply_message_id').val();
            var m_name = $('#replyMessageName').val();
            var message = $('#replyMessage').val();
            var final = $('#replyFinalMessage').val();

            $.ajax({
                url: '/toot/smsquery/link-message',
                type: 'Post',
                data: {
                    _token: "{{csrf_token()}}",
                    reply_id: reply_id,
                    ti_id: "{{$_GET['ti_id']}}",
                    message_id: message_id,
                    message: {
                        name: m_name,
                        message: message,
                        end: final
                    }
                }
            }).success(function( data ){
                $("#next-message-btn-" + reply_id).replaceAll( data );
            });

        }
    </script>

    @stop