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
                            <input type="text" class="form-control" id="name" name="name"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message" class="control-label col-sm-4">Message</label>

                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="message" name="message"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="final_message" class="control-label col-sm-4">Final Message?</label>

                        <div class="col-sm-8">
                            <input type="checkbox" id="final_message" name="final_message" value="true"/>
                        </div>
                    </div>
                    <button id="create-message" class="btn btn-primary col-sm-offset-4" onclick="createMessage()">Create Message</button>
                </div>
            </div>

        </div>
        <div class="panel panel-default hidden" id="reply-wrapper">
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
                    <input type="hidden" id="message_id" value="">
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
@stop

@section('javascript')

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
            })
        }
    </script>

    @stop