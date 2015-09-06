@extends('app')

@section('content')

    <div class="panel panel-default">
        <div id="topic-create-heading" class="panel-heading">
            @if(isset($topic))
                @include('includes.topic_heading')
            @else
            Create Topic
                @endif
        </div>

        <div class="panel-body">
            <div class="form-horizontal">
                <div class="form-group">
                    <label for="name" class="control-label col-sm-4">Topic Name</label>
                    <div class="col-sm-8">
                        @if(isset($topic))
                            <b>{{$topic->name}}</b>
                        @else
                        <input type="text" class="form-control" id="name" name="name"/>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="tags" class="control-label col-sm-4">Tags</label>

                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="tags" name="tags"/>
                    </div>
                </div>
                @if(!isset($topic))<div class="form-group" id="create-topic-btn">
                    <div class="col-sm-offset-4 col-sm-8">
                        <button class="btn btn-primary"  onclick="createTopic({{$project_id}})">Create Topic</button>
                    </div>
                </div>
                @endif
            </div>
            <div class="col-sm-offset-4 col-sm-8">
                <div class="panel panel-default @if(!isset($topic))hidden @endif" id="questions-wrapper">
                    <div class="panel-heading">
                        <b>Questions</b>
                    </div>
                    <div class="panel-body">
                        <div class="list-group" id="questions">
                            @if(isset($topic))
                                @forelse($topic->questions as $question)
                                    @include('includes.question')
                                @empty
                                    <div class="list-group-item alert-info">
                                        Please add a question!
                                    </div>
                                @endforelse
                            @endif

                        </div>
                    </div>
                </div>
                <div class="panel panel-default @if(!isset($topic))hidden @endif" id="question-form">
                    <div class="panel-body">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label for="q-name" class="control-label col-sm-4">Question Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="q-name" name="q-name"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="q-text" class="control-label col-sm-4">Question</label>

                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control" id="q-text" name="q-text"></textarea>
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-sm-offset-4 col-sm-8">
                                    <button class="btn btn-primary" onclick="createQuestion()">Add Question</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="addResponse" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add Response</h4>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label for="name" class="control-label col-sm-4">Name</label>

                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="r-name" name="name"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="r-type" class="control-label col-sm-4">Field Type</label>

                            <div class="col-sm-8">
                                <select type="text" class="form-control" id="r-type" name="r-type">
                                    <option value="null">Select One</option>
                                    <option value="varchar">String</option>
                                    <option value="text">Long Text</option>
                                    <option value="boolean">True/False</option>
                                    <option value="integer">Integer</option>
                                    <option value="decimal">Decimal</option>
                                    <option value="datetime">Date & Time</option>
                                    </select>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" id="question_id" value="null">
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="createResponse()">Add Response</button>
                </div>
            </div>
        </div>
    </div>



    @stop

@section('javascript')

    <script>

        $('#addResponse').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('question') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('#question_id').val(recipient)
        })

        function createTopic(id)
        {
            var name = $("#name").val();
            $.ajax({
                url: '/topic/',
                type: "POST",
                data: {
                    _token: "{{csrf_token()}}",
                    topic: {
                        name: name,
                        project_id: id
                    }
                }
            }).done(function( data ) {
                $("#create-topic-btn").addClass('hidden');
                $("#topic-create-heading").html(data);
                $("#question-form").removeClass('hidden');
                $('#name').replaceWith( '<B>' + name + '</b>' );
            });
        }

        function createQuestion()
        {
            var topic_id    = $('#topic_id').val();
            var qname       = $('#q-name').val();
            var question    = $('#q-text').val();
            $.ajax({
                url: '/question/',
                type: 'POST',
                data: {
                    _token: "{{csrf_token()}}",
                    question: {
                        topic_id: topic_id,
                        name: qname,
                        question: question
                    }
                }
            }).done(function(data){
                $('#questions-wrapper').removeClass('hidden');
                $('#questions').append( data );
                $('#q-name').val(null);
                $('#q-text').val(null);
            });
        }

        function createResponse()
        {
            var type = $('#r-type').val();
            var name = $('#r-name').val();
            var qid = $('#question_id').val();
            $.ajax({
                url: "/response",
                type: 'Post',
                data: {
                    _token: "{{csrf_token()}}",
                    response: {
                        name: name,
                        type: type,
                        question_id: qid
                    }
                }
            }).done(function(data){
                $('#q-response-'+ qid).append( data );
                $('#r-type').val( null );
                $('#r-name').val( null );
            });
        }
    </script>

    @stop