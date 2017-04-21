
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
                <table class="myTable" border='1' cellpadding="10">
                  <tbody>
                    <tr>
                      <th>ID</th>
                      <th>Sum</th>
                      <th>Client</th>
                    </tr>
                    @foreach ($order as $item) 
                    <tr>
                      <td>{{ $item->id }}</td>
                      <td>{{ $item->order_sum }}</td>
                      <td>{{ $item->client_id }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
        </div>   
         
        <div class="row">    
            <div class="col-sm-12">
                <table class="myTable" border='1' cellpadding="10">
                  <tbody>
                    <tr>
                      <th>Product</th>
                      <th>Qty</th>
                      <th>Price</th>
                      <th>Sum</th>    
                     <th class="snoborder"></th> 
                    </tr>
                    @foreach ($order_ids as $item) 
                    <tr>
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
                      <td><a class="btn btn-primary btn-xs">delete</a></td>
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

