
@extends('common.site')

@section('title')
@if ($product)
    Product: {{$product->product_name}} {{$product->product_code}}
@else
    Client not found
@endif
@endsection

@section('main')

@if ($product)
<div class="panel panel-default">
    <div class="panel-body">
               
        <table class="myTable" border='1' cellpadding="10">
            
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Product Code </th>
                <th>Price</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
            @foreac ()) product in products %} 
            <tr>
                <td>{{ $product['id'] }}</td>
                <td>{{ $product['product_name'] }}</td>
                <td>{{ $product['product_code'] }}</td>
                <td>{{ $product['price'] }}</td>
                <td><a  class="btn btn-primary btn-xs" href='products.php?operation=delete&id={{ $product['id'] }}'>delete</a></td>
                <td><a class="btn btn-primary btn-xs" href='products.php?operation=edit&id={{ $product['id'] }}'>edit</a></td>
            </tr>
            {% endfor %}
        </table>
    </div>
</div>

@else
    Client not found
@endif

@endsection

