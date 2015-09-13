@extends('app')

@section('content')


    <div class="panel panel-default">
        <form action="/organization/" class="form-horizontal" method="post">
        <div class="panel-heading">
            <b>Create Organization</b>
        </div>
        <div class="panel-body">
            
                <input type="hidden" name="_token" value="{{csrf_token()}}">

            <div class="form-group">
                <label for="name" class="control-label col-sm-4">Name</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="name" name="organization[name]"/>
                </div>
            </div>

            <div class="form-group">
                <label for="type" class="control-label col-sm-4">Organization Type</label>

                <div class="col-sm-8">
                    <select name="organization[type]" class="form-control" id="">
                        <option value="null"> Select One </option>
                        <option value="ed">Educational</option>
                        <option value="ed">Government</option>
                        <option value="ed">NGO/Non-profit</option>
                        <option value="corp">Corporate</option>
                    </select>
                </div>
            </div>

        </div>
        <div class="panel-footer">
            <input type="submit" value="Create Organization" class="btn btn-primary">
        </div>
        </form>
    </div>
    @stop