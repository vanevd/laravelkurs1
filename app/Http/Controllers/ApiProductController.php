<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ApiProductController extends Controller
{

    public $data;

    public function index()
    {
        $data = [];
        $data['status'] = 'ok';
        $data['products'] = Product::orderBy('id')->get();
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $product_name = $request->get('product_name');
        $product_code = $request->get('product_code');
        $price = $request->get('price');
        $data = [];
        $status = 'ok';
        $error_message = '';
        if (strlen($product_name) == 0) {
            $status = 'error';
            $error_message .= 'Product Name Missing;';
        }  
        if (strlen($product_code) == 0) {
            $status = 'error';
            $error_message .= 'Product Code Missing;';
        } 
        if (strlen($price) == 0) {
            $status = 'error';
            $error_message .= 'Price Missing;';
        } else {
            if (!is_numeric($price)) {
                $status = 'error';
                $error_message .= 'Price is not numeric;';
            }
        }    
        if ($status == 'ok')  {
            $product = new Product;
            $product->product_name = $request->get('product_name');
            $product->product_code = $request->get('product_code');
            $product->price = $request->get('price');
            $product->save();
            $data['html'] = view('products.product_row', ['product' => $product])->render();

            $data['status'] = 'ok';
            $http_status = 200;
        } else {
            $data['status'] = 'error';
            $data['error_message'] = $error_message;
            $http_status = 400;
        }
        return response()->json($data, $http_status);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        $data = [];
        if ($product) {
          $data['status'] = 'ok';
          $data['error'] = null;
        } else {
          $data['status'] = 'error';
          $data['error'] = 'Product not found!';
        }  
        $data['product'] = $product;
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request, $id)
    {       
        $product_name = $request->get('product_name');
        $product_code = $request->get('product_code');
        $price = $request->get('price');
        $data = [];
        $status = 'ok';
        $error_message = '';
        $product = Product::find($id);
        if (!$product) {
            $status = 'error';
            $error_message .= 'Invalid Product Id;';
        }
        if (strlen($product_name) == 0) {
            $status = 'error';
            $error_message .= 'Product Name Missing;';
        }  
        if (strlen($product_code) == 0) {
            $status = 'error';
            $error_message .= 'Product Code Missing;';
        } 
        if (strlen($price) == 0) {
            $status = 'error';
            $error_message .= 'Price Missing;';
        } else {
            if (!is_numeric($price)) {
                $status = 'error';
                $error_message .= 'Price is not numeric;';
            }
        }    
        if ($status == 'ok')  {
            $product->product_name = $request->get('product_name');
            $product->product_code = $request->get('product_code');
            $product->price = $request->get('price');
            $product->save();

            $data['status'] = 'ok';
            $http_status = 200;
        } else {
            $data['status'] = 'error';
            $data['error_message'] = $error_message;
            $http_status = 400;
        }
        return response()->json($data, $http_status);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $data = [];
        $status = 'ok';
        $error_message = '';
        $product = Product::find($id);
        if (!$product) {
            $status = 'error';
            $error_message .= 'Invalid Product Id;';
        }
        if ($status == 'ok')  {
            $product->delete();

            $data['status'] = 'ok';
        } else {
            $data['status'] = 'error';
            $data['error_message'] = $error_message;
        }
        return response()->json($data);
       
    }
}
