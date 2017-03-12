
@extends('common.site')

@section('title')
@if ($client)
    Client: {{$client->first_name}} {{$client->last_name}}
@else
    Client not found
@endif
@endsection

@section('main')

@if ($client)
<div class="panel panel-default">
    <div class="panel-body">
               
        <table class="myTable" border='1' cellpadding="10">
            
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name </th>
                <th>Phone</th>
                <th>Email</th> 
                <th>Delete</th>
                <th>Edit</th>
            </tr>
            @foreac ()) client in clients %} 
            <tr>
                <td>{{ $client['id'] }}</td>
                <td>{{ $client['first_name'] }}</td>
                <td>{{ $client['last_name'] }}</td>
                <td>{{ $client['phone'] }}</td>
                <td>{{ $client['email'] }}</td>
                <td><a  class="btn btn-primary btn-xs" href='clients.php?operation=delete&id={{ $client['id'] }}'>delete</a></td>
                <td><a class="btn btn-primary btn-xs" href='clients.php?operation=edit&id={{ $client['id'] }}'>edit</a></td>
            </tr>
            {% endfor %}
        </table>
    </div>
</div>

@else
    Client not found
@endif

@endsection

