
@extends('common.site')

@section('title')
    New client
@endsection

@section('main')
<form method="POST" action='/clients/{{$client->id}}'>
{{ csrf_field() }}

<div class="panel panel-default">
    <div class="panel-body">
            <div class="row">    
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="first_name">First Name:</label>
                        <input class="form-control" id="first_name" type="text" name="first_name" value="{{$client->first_name}}">
                    </div>
                </div>
            </div>    
            <div class="row">    
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="last_name">Last Name:</label>
                        <input class="form-control" id="last_name" type="text" name="last_name" value="{{$client->last_name}}">
                    </div>
                </div>
            </div>    
             <div class="row">    
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="phone">Phone:</label>
                        <input class="form-control" id="phone" type="text" name="phone" value="{{$client->phone}}">
                    </div>
                </div>
            </div>          
            <div class="row">    
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input class="form-control" id="email" type="text" name="email" value="{{$client->email}}">
                    </div>
                </div>
            </div>                        
            <div class="row">    
                <div class="col-sm-3">         
                    <input class="btn btn-primary" type="submit" value="Update">
                </div>
            </div>    
    </div>
</div>
</form>
@endsection

