
@extends('common.site')

@section('title', 'Orders')

@section('main')
<div class="panel panel-default">
    <div class="panel-body">
               
        <table class="myTable" border='1' cellpadding="10">
            
            <tr>
                <th>ID</th>
                <th>Order Number</th>
                <th>Order Date</th>
                <th>Order Sum</th>
                <th>Client ID</th> 
                <th class="snoborder"></th> 
                <th class="snoborder"></th> 
            </tr>
            @foreach ($orders as $order) 
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->order_number }}</td>
                <td>{{ $order->order_date }}</td>
                <td>{{ $order->order_sum }}</td>
                <td>{{ $order->client_id }}</td>
                <td><a class="btn btn-primary btn-xs" href='orders/{{ $order->id }}/delete'>delete</a></td>
                <td><a class="btn btn-primary btn-xs" href='orders/{{ $order->id }}/edit'>edit</a></td>
            </tr>
            @endforeach
        </table>
        <a class="btn btn-primary btn-xs" href='orders/new'>Create order</a>
    </div>
</div>
@endsection
