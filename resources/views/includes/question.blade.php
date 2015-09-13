<div  class="list-group-item" id="question-{{$question->id}}">
    <div class="question">
        {{$question->name}} <small>[{{$question->type}}]</small>
        <span class="pull-right"> @if($question->defined == true)<button class="btn btn-xs btn-default"  data-toggle="modal" data-target="#addResponse" data-question="{{$question->id}}"><i class="glyphicon glyphicon-plus"></i> Add Response</button> @endif <i class="btn btn-xs btn-danger glyphicon glyphicon-trash" id="delete-{{$question->id}}" onClick="deleteQuestion({{$question->id}})"></i> </span>
    </div>
    <div id="q-response-{{$question->id}}">
        @if($question->responses()->count() > 0)
            @foreach($question->responses as $response)
                @include('includes.response')
            @endforeach
        @endif
    </div>
</div>