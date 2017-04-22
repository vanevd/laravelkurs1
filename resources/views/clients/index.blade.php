
@extends('common.site')

@section('title', 'Clients')

@section('header')
<script>
  function delete_client(client_id) {
    $.ajax({
      url: "/api/clients/" + client_id,
      type: "DELETE",
      success: function(result){
        $('#tr_'+client_id).remove();
        //alert('Client deleted!');
      }
    });
  }

  function add_client() {
    $.ajax({
      url: "/api/clients",
      type: "POST",
      data: {
        first_name:"Peter",
        last_name:"Petrov",
        phone:"0878111555",
        email:"peter@abv.bg"
      },
      success: function(result){
        //$('#tr_'+client_id).remove();
        //alert('Client deleted!');
      }
    });
  }
</script>  
@endsection

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
            <tr id="tr_{{ $client->id }}">
                <td>{{ $client->id }}</td>
                <td>{{ $client->first_name }}</td>
                <td>{{ $client->last_name }}</td>
                <td>{{ $client->phone }}</td>
                <td>{{ $client->email }}</td>
                <td><a  class="btn btn-primary btn-xs" href='/clients/{{ $client->id }}/delete'>delete</a></td>
                <td><a  class="btn btn-primary btn-xs" href='#' onclick="delete_client({{ $client->id }})">ajax delete</a></td>
                <td><a class="btn btn-primary btn-xs" href='/clients/{{ $client->id }}/edit'>edit</a></td>
            </tr>
            @endforeach
        </table>
        <td><a  class="btn btn-primary btn-xs" href='#' onclick="add_client()">add test client</a></td>
    </div>
</div>
@endsection
