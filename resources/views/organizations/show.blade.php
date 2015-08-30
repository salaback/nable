@extends('app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            <b>{{$org->name}}</b>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-9">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Organization Projects
                        </div>

                        <div class="panel-body">
                            <div class="col-sm-4">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <a href="#" class="btn btn-default center center-block">Create New</br>Project</a>
                                    </div>
                                </div>
                            </div>
                            @forelse($org->projects as $project)
                                @include('includes.project_tile')
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="member-panel">
                        <h4>Organization Members</h4>
                        @foreach($org->members as $member)
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
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add New Member</h4>
                </div>
                <div class="modal-body">
                    <form action="" class="form-horizontal" method="post">
                        <div class="form-group">
                            <label for="first_name" class="control-label col-sm-4">First Name</label>

                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="first_name" name="first_name"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="last_name" class="control-label col-sm-4">Last Name</label>

                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="last_name" name="last_name"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="control-label col-sm-4">Email Address</label>

                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="email" name="email"/>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Invite Member">
                </div>
            </div>
        </div>
    </div>

        @stop