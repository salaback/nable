@extends('app')

@section('content')
<div class="panel panel-default">
    <form action="/project" method="post" class="form-horizontal">
    <div class="panel-heading">
        <b>Create New Project</b>
    </div>
    <div class="panel-body">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group">
                <label for="name" class="control-label col-sm-4">Name</label>

                <div class="col-sm-8">
                    <input type="text" class="form-control" id="name" name="project[name]" required/>
                </div>
            </div>
            <div class="form-group">
                <label for="tags" class="control-label col-sm-4">Tags</label>

                <div class="col-sm-8">
                    <input type="text" class="form-control" id="tags" name="tags" />
                </div>
            </div>
            <div class="form-group">
                <label for="team" class="control-label col-sm-4">Team</label>

                <div class="col-sm-8">
                    <select name="project[team][]" class="form-control" id="" multiple required>
                        @foreach($org->members as $member)
                        <option value="{{$member->id}}"> {{$member->fullName()}} </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="description" class="control-label col-sm-4">Description</label>

                <div class="col-sm-8">
                    <textarea type="text" class="form-control" id="description" name="project[description]" required></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="privacy" class="control-label col-sm-4">Visibility</label>

                <div class="col-sm-8">
                    <div class="radio">
                        <label>
                            <input type="radio" id="privacy" name="project[privacy]" value="team" checked>
                            Team
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio"  id="privacy" name="project[privacy]" value="project">
                            Project
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" id="privacy" name="project[privacy]" value="public">
                            Public
                        </label>
                    </div>
                </div>
            </div>
            <input type="hidden" name="project[organization_id]" value="{{$org->id}}">

    </div>
    <div class="panel-footer">
        <input type="submit" value="Create Project" class="btn btn-primary">
    </div>
    </form>
</div>

@stop