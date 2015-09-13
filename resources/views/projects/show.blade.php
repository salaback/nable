@extends('app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            <b><a href="/organization/{{$project->organization_id}}"> {{$project->organization->name}} </a> > {{$project->name}}</b>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    Project Topics
                                </div>

                                <div class="panel-body">
                                    <div class="col-sm-6">
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                <a href="/topic/create?project_id={{$project->id}}" class="btn btn-default center center-block">Create New</br>Topic</a>
                                            </div>
                                        </div>
                                    </div>
                                    @forelse($project->topics as $topic)
                                        @include('includes.topic_tile')
                                    @empty
                                    @endforelse
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    Project Respondents
                                </div>
                                <div class="panel-body text-center">
                                        <b>Respondent Count: {{$project->respondents()->count()}}</b>
                                </div>
                                <div class="panel-footer text-center">
                                    <a href="/respondent/create?type=create&project_id={{$project->id}}" class="btn btn-primary">Create One <br>Respondent</a>
                                    <a href="/respondent/create?type=upload&project_id={{$project->id}}" class="btn btn-primary">Upload <br>Respondents CSV</a>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    Project Toots
                                </div>
                                <div class="panel-body text-center">
                                </div>
                                <div class="panel-footer text-center">
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#addToot" ><i class="glyphicon glyphicon-plus"></i> Add Toot</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="member-panel">
                        <h4>Organization Members</h4>
                        @foreach($project->members as $member)
                            <div class="list-group-item">{{$member->first_name}} {{$member->last_name}}</div>
                        @endforeach
                        <br>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addMember">
                            Add New Member
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @stop

    @section('javascript')


    <!-- Modal -->
    <div class="modal fade" id="addMember" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="" class="form-horizontal" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add New Member</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="project_id" value="{{$project->id}}">

                    <div class="col-sm-8">
                        <select name="project[team][]" class="form-control" id="" multiple required>
                            @foreach($project->organization->members as $member)
                                <option value="{{$member->id}}"> {{$member->fullName()}} </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Invite Member">
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addToot" tabindex="-1" role="dialog" aria-labelledby="addTootLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="addTootLabel">Add Toot To Project</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="project_id" value="{{$project->id}}">
                        <div class="list-group">
                            @foreach(nable\Toot::all() as $toot)
                            <div class="list-group-item">
                                <a class="btn btn-primary btn-sm pull-right" href="/toot/{{$toot->namespace}}/add-toot?project_id={{$project->id}}"><i class="glyphicon glyphicon-plus"></i> Add</a>
                                <b>{{$toot->name}}:</b> <p>{{$toot->description}}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
            </div>
        </div>
    </div>

        @stop