<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Client;
use App\Models\Product;

class OrderController extends Controller
{
    public function index()
    {
        $data = [];
        //$data['orders'] = Order::all();
        $data['orders'] = Order::orderBy('order_date','desc')->get();

        return view('orders.index', $data);
    }

    public function create()
    {
        $data = [];
        $data['clients'] = Client::select('id', 'first_name', 'last_name')->orderBy('first_name')->orderBy('last_name')->get();
        return view('orders.create', $data);
    }

    public function store(Request $request)
    {
        $order_number = $request->get('order_number');
        $order_date = $request->get('order_date');
        $order_sum = $request->get('order_sum');
        $client_id = $request->get('client_id');

        $order = new Order;
        $order->order_number = $order_number;
        $order->order_date = $order_date;
        $order->order_sum = $order_sum;
        $order->client_id = $client_id;
        $order->save();

        return redirect()->action('OrderController@index');
    }

    public function destroy($order_id)
    {
        $order = Order::find($order_id);
        $order->delete();

        return redirect()->action('OrderController@index');
    }

    public function edit($order_id)
    {
        $data = [];
		$data['order_id'] = $order_id;
		$data['order'] = Order::find($order_id); 
        $data['order_ids'] = OrderDetail::where('order_id', $order_id)->get();
        $data['client'] = Client::find($data['order']->client_id);
        $data['products'] = Product::select('id', 'product_name')->orderBy('product_name')->get();
//		var_dump($data); 		die();
        return view('orders.edit', $data);
    }

    public function destroyProduct($order_detail_id)
    {
		$orderDetail = OrderDetail::find($order_detail_id);
		if ($orderDetail) {
			$order_id = $orderDetail->order_id;
			$orderDetail->delete();	
		}
		return $this->edit($order_id);
    }

    public function update(Request $request, $client_id)
    {
        $first_name = $request->get('first_name');
        $last_name = $request->get('last_name');
        $email = $request->get('email');
        $phone = $request->get('phone');

        $client = Client::find($client_id);
        $client->first_name = $first_name;
        $client->last_name = $last_name;
        $client->email = $email;
        $client->phone = $phone;
        $client->save();

        return redirect()->action('ClientController@index');
    }
    

}
