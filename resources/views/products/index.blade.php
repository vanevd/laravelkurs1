
@extends('common.site')

@section('title', 'Products')

@section('main')
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
            @foreach ($products as $product) 
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->product_code }}</td>
                <td>{{ $product->price }}</td>
                <td><a  class="btn btn-primary btn-xs" href='products/{{ $product->id }}/delete'>delete</a></td>
                <td><a class="btn btn-primary btn-xs" href='products/{{ $product->id }}/edit'>edit</a></td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
