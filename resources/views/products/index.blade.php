
@extends('common.site')

@section('title', 'Products')

@section('main')
  <script src="/js/products.js"></script>
  <div class="panel panel-default">
    <div class="panel-body">
               
        <table class="myTable" border='1' cellpadding="10" id="table_product">
            
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Product Code</th>
                <th>Price</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
            @foreach ($products as $product) 
            <tr id="tr_{{ $product->id }}" data="{{ $product->id }}">
                <td>{{ $product->id }}</td>
                <td class="product_name">{{ $product->product_name }}</td>
                <td class="product_code">{{ $product->product_code }}</td>
                <td class="price">{{ $product->price }}</td>
                <td><a class="btn btn-primary btn-xs delete" href="#">delete</a></td>
                <td><a class="btn btn-primary btn-xs edit" href="#">edit</a></td>
            </tr>
            <tr id="tr_edit_{{ $product->id }}" data="{{ $product->id }}" style="display:none">
                <td>{{ $product->id }}</td>
                <td><input class="form-control product_name" type="text" value="{{$product->product_name}}"></td>
                <td><input class="form-control product_code" type="text" value="{{$product->product_code}}"></td>
                <td><input class="form-control price" type="text" value="{{$product->price}}"></td>
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
                        <label for="product_name">Product Name:</label>
                        <input class="form-control" id="product_name" type="text" name="product_name" value="">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="product_code">Product Code:</label>
                        <input class="form-control" id="product_code" type="text" name="product_code" value="">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input class="form-control" id="price" type="text" name="price" value="">
                    </div>
                </div> 
            </div>                           
            <div class="row">    
                <div class="col-sm-3">         
                    <input class="btn btn-primary" id="add_product" type="button" value="Save">
                </div>
            </div>    
    </div>
</div>

@endsection
