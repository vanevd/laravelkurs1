<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $data = [];
        $data['products'] = Product::all();

        return view('products.index', $data);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $product_name = $request->get('product_name');
        $product_code = $request->get('product_code');
        $price = $request->get('price');

        $product = new Product;
        $product->product_name = $product_name;
        $product->product_code = $product_code;
        $product->price = $price;
        $product->save();

        return redirect()->action('ProductController@index');
    }

    public function destroy($product_id)
    {
        $product = Product::find($product_id);
        $product->delete();

        return redirect()->action('ProductController@index');
    }

    public function show($product_id)
    {
        $product = Product::find($product_id);
        
        $data = [];
        $data['product'] = $product;
        
        return view('products.show', $data);
    }

    public function edit($product_id)
    {
        $product = product::find($product_id);
        
        $data = [];
        $data['product'] = $product;

        return view('products.edit', $data);
    }

    public function update(Request $request, $product_id)
    {
        $product_name = $request->get('product_name');
        $product_code = $request->get('product_code');
        $price = $request->get('price');

        $product = Product::find($product_id);
        $product->product_name = $product_name;
        $product->product_code = $product_code;
        $product->price = $price;
        $product->save();

        return redirect()->action('ProductController@index');
    }
    

}
