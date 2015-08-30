@extends('app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            <b>{{$project->name}}</b>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-9">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Project Topics
                        </div>

                        <div class="panel-body">
                            <div class="col-sm-4">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <a href="/topic/create?project_id={{$project->id}}" class="btn btn-default center center-block">Create New</br>Topic</a>
                                    </div>
                                </div>
                            </div>
                            {{--@forelse($project->topics as $topic)--}}
                                {{--@include('includes.topic_tile')--}}
                            {{--@empty--}}
                            {{--@endforelse--}}
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
                            {{--@foreach($project->organization->members as $member)--}}
                                {{--<option value="{{$member->id}}"> {{$member->fullName()}} </option>--}}
                            {{--@endforeach--}}
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

        @stop