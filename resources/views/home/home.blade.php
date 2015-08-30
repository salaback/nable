@extends('app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <b>Your Organizations</b>
    </div>
    <div class="panel-body">
        <div class="col-sm-4">
            <div class="panel panel-primary">
                <div class="panel-body">
                    <a href="/organization/create" class="btn btn-primary center center-block">Create New</br>Organization</a>
                </div>
            </div>
        </div>
        @forelse($user->organizations as $org)
            @include('includes.org_tile')
        @empty
        @endforelse


    </div>
</div>

@stop