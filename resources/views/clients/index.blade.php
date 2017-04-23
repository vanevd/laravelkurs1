
@extends('common.site')

@section('title', 'Clients')

@section('main')
<div class="panel panel-default">
    <div class="panel-body">
               
        <table class="myTable" border='1' cellpadding="10" id="table_client">
            
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name </th>
                <th>Phone</th>
                <th>Email</th> 
                <th>Delete</th>
                <th>Edit</th>
            </tr>
            @foreach ($clients as $client) 
            <tr id="tr_{{ $client->id }}" data="{{ $client->id }}">
                <td>{{ $client->id }}</td>
                <td class="first_name">{{ $client->first_name }}</td>
                <td class="last_name">{{ $client->last_name }}</td>
                <td class="phone">{{ $client->phone }}</td>
                <td class="email">{{ $client->email }}</td>
                <td><a class="btn btn-primary btn-xs delete" href="#">delete</a></td>
                <td><a class="btn btn-primary btn-xs edit" href="#">edit</a></td>
            </tr>
            <tr id="tr_edit_{{ $client->id }}" data="{{ $client->id }}" style="display:none">
                <td>{{ $client->id }}</td>
                <td><input class="form-control first_name" type="text" value="{{$client->first_name}}"></td>
                <td><input class="form-control last_name" type="text" value="{{$client->last_name}}"></td>
                <td><input class="form-control phone" type="text" value="{{$client->phone}}"></td>
                <td><input class="form-control email" type="text" value="{{$client->email}}"></td>
                <td><a class="btn btn-primary btn-xs delete" href="#">delete</a></td>
                <td><a class="btn btn-primary btn-xs update" href="#">update</a></td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-body">
            <div class="row">    
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="first_name">First Name:</label>
                        <input class="form-control" id="first_name" type="text" name="first_name" value="">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="last_name">Last Name:</label>
                        <input class="form-control" id="last_name" type="text" name="last_name" value="">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="phone">Phone:</label>
                        <input class="form-control" id="phone" type="text" name="phone" value="">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input class="form-control" id="email" type="text" name="email" value="">
                    </div>
                </div>
            </div>                        
            <div class="row">    
                <div class="col-sm-3">         
                    <input class="btn btn-primary" id="add_client" type="button" value="Save">
                </div>
            </div>    
    </div>
</div>

@endsection
