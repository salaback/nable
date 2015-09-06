<b><a href="/organization/{{$topic->project->organization_id}}">
        {{$topic->project->organization->name}}</a> >
    <a href="/project/{{$topic->project_id}}"> {{$topic->project->name}}</a> >
    {{$topic->name}}</b>
<input type="hidden" id="topic_id" value="{{$topic->id}}">
