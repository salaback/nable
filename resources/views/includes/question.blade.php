<div  class="list-group-item">
    <div class="question">
        {{$question->name}} <small>[{{$question->type}}]</small>
        @if($question->defined == true)<button class="btn btn-xs btn-default pull-right"  data-toggle="modal" data-target="#addResponse" data-question="{{$question->id}}"><i class="glyphicon glyphicon-plus"></i> Add Response</button> @endif
    </div>
    <div id="q-response-{{$question->id}}">
        @if($question->responses()->count() > 0)
            @foreach($question->responses as $response)
                @include('includes.response')
            @endforeach
        @endif
    </div>
</div>