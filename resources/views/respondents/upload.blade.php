@extends('app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            Add Respondents to <b>{{$project->name}}</b> project
        </div>
        <div class="panel-body">
           <form class="form-horizontal" action="/upload/respondents" method="post" enctype="multipart/form-data">
               <input type="hidden" name="_token" value="{{csrf_token()}}">
               <input type="hidden" name="project_id" value="{{$project->id}}">

               <div class="form-group">
                   <div class="col-sm-offset-4 col-sm-8">
                        <div class="alert alert-info">
                            <b>CSV Upload Instructions</b>
                            <p>To upload respondents to N-Able, your CSV file must have the following headers, though each field does not need to have a value.</p>
                            <p><i>first_name, last_name, gender [M/F/N], dob [yyyy-dd-mm], email, email_type, phone, phone_type, street_number, street_name, apt, city, state, zip, address_type</i></p>
                        </div>

                       <input type="file"  id="file" name="file"/>
                   </div>
               </div>
               <input type="submit" value="Upload File" class=" col-sm-offset-4 btn btn-primary">
           </form>
        </div>
    </div>


    @stop