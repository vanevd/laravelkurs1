
@extends('common.site')

@section('title')
    New Order
@endsection

@section('main')

<form method="POST" action='../orders'>
{{ csrf_field() }}

<div class="panel panel-default">
    <div class="panel-body">
            <div class="row">    
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="order_number">Order Number:</label>
                        <input class="form-control" type="text" name="order_number" value="">
                    </div>
                </div>
            </div>    
            <div class="row">    
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="order_date">Order Date:</label>
                        <input class="form-control" type="text" name="order_date" value="">
                    </div>
                </div>
            </div>    
             <div class="row">    
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="order_sum">Order Sum</label>
                        <input class="form-control" type="text" name="order_sum" value="">
                    </div>
                </div>
            </div>          
            <div class="row">    
                <div class="col-sm-3">
                    <div class="form-group">
                        <select name="client_id" class="form-control">
                        @foreach ($clients as $client)
                          <option class="form-control" value="{{ $client->id }}">{{ $client->first_name . ' ' . $client->last_name }}</option>
                        @endforeach
                        </select>

                    </div>
                </div>
            </div>                        
            <div class="row">    
                <div class="col-sm-3">         
                    <input class="btn btn-primary" type="submit" value="Save">
                </div>
            </div>    
    </div>
</div>
</form>
@endsection

