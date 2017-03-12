
@extends('common.site')

@section('title', 'Clients')

@section('main')
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
            @foreach ($clients as $client) 
            <tr>
                <td>{{ $client->id }}</td>
                <td>{{ $client->first_name }}</td>
                <td>{{ $client->last_name }}</td>
                <td>{{ $client->phone }}</td>
                <td>{{ $client->email }}</td>
                <td><a  class="btn btn-primary btn-xs" href='/clients/{{ $client->id }}/delete'>delete</a></td>
                <td><a class="btn btn-primary btn-xs" href='/clients/{{ $client->id }}/edit'>edit</a></td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
