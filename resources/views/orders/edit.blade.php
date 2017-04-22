
@extends('common.site')

@section('title')
    Edit Order
@endsection

@section('main')
{{ csrf_field() }}


<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">    
            <div class="col-sm-12">
            	<h2>Order details</h2>
                <table class="myTable" border='1' cellpadding="10">
                  <tbody>
                    <tr>
                      <th>ID</th>
                      <th>Sum</th>
                      <th>Date</th>
                      <th>Client</th>
                    </tr>
                    <tr>
                      <td>{{ $order->id }}</td>
                      <td>{{ $order->order_sum }}</td>
                      <td>{{ $order->order_date }}</td>
                      <td>{{ $client->first_name }} {{ $client->last_name }}</td>
                    </tr>
                  </tbody>
                </table>
            </div>
        </div>   
         
        <div class="row">    
            <div class="col-sm-12">
            	<h2>Products in order</h2>
                <table class="myTable" border='1' cellpadding="10">
                  <tbody>
                    <tr>
                      <th>Product ID</th>
                      <th>Product Name</th>
                      <th>Qty</th>
                      <th>Price</th>
                      <th>Sum</th>    
                     <th class="snoborder"></th> 
                    </tr>
                    @foreach ($order_ids as $item) 
                    <tr>
                      <td>	{{ $item->product_id }}</td>
                      <td>
                       @foreach ($products as $product)
                          @if ($product->id == $item->product_id)
                          	{{ $product->product_name }}
                          @endif
					   @endforeach
                      </td>
                      <td>{{ $item->quantity }}</td>
                      <td>{{ $item->price }}</td>
                      <td>{{ $item->product_sum }}</td>
                      <td><a class="btn btn-primary btn-xs" href="/order_details/{{$item->id}}/delete">delete</a></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
        </div>   
         
        <div class="row">    
            <div class="col-sm-3">         
                <input class="btn btn-primary" type="submit" value="Update">
            </div>
        </div>    
    </div>
</div>

@endsection

