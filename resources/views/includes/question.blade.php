<div  class="list-group-item">
    <div class="question">
        {{$question->name}}
        <button class="btn btn-xs btn-default pull-right"  data-toggle="modal" data-target="#addResponse" data-question="{{$question->id}}"><i class="glyphicon glyphicon-plus"></i> Add Response</button>
    </div>
    <div id="q-response-{{$question->id}}">
        @if($question->response > 0)
            @foreach($question->response as $response)
                @include('includes.response')
            @endforeach
        @endif
    </div>
</div>