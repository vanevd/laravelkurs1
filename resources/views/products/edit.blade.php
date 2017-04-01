
@extends('common.site')

@section('title')
    New product
@endsection

@section('main')
<form method="POST" action='/products/{{$product->id}}'>
{{ csrf_field() }}

<div class="panel panel-default">
    <div class="panel-body">
            <div class="row">    
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="product_name">Product Name:</label>
                        <input class="form-control" id="product_name" type="text" name="product_name" value="{{$product->product_name}}">
                    </div>
                </div>
            </div>    
            <div class="row">    
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="product_code">Product Code:</label>
                        <input class="form-control" id="product_code" type="text" name="product_code" value="{{$product->product_code}}">
                    </div>
                </div>
            </div>    
             <div class="row">    
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input class="form-control" id="price" type="text" name="price" value="{{$product->price}}">
                    </div>
                </div>
            </div>                               
            <div class="row">    
                <div class="col-sm-3">         
                    <input class="btn btn-primary" type="submit" value="Update">
                </div>
            </div>    
    </div>
</div>
</form>
@endsection

