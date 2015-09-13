<div class="col-sm-4">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <b>{{$reply->reply}}</b>
        </div>
        <div class="panel-body">
            <p>{{$reply->keywords}}</p>
            <p><b>Next Message:</b> @if(isset($reply->next_message) && $reply->next_message != null) <a href="/toot/smsquery/message/{{$reply->next_message}}?ti_id={{$_GET['ti_id']}}">{{DB::table($_GET['ti_id'] . '_messages')->where('id', $reply->next_message)->pluck('name')}}</a> @else <button id="next-message-btn-{{$reply->id}}" data-toggle="modal" data-target="#addNextMessage" data-reply="{{$reply->id | null}}" class="btn btn-xs btn-default" >Link Next Message</button></button> @endif</p>
        </div>
    </div>
</div>