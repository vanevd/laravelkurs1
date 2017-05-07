<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ApiClientController extends Controller
{
    public function index()
    {
        $data = [];
        $data['status'] = 'ok';
        $data['clients'] = Client::orderBy('id')->get();
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $first_name = $request->get('first_name');
        $last_name = $request->get('last_name');
        $email = $request->get('email');
        $phone = $request->get('phone');

        $data = [];
        $status = 'ok';
        $error_message = '';
        if (strlen($first_name) == 0) {
            $status = 'error';
            $error_message .= 'First Name Missing;';
        }   
        if (strlen($last_name) == 0) {
            $status = 'error';
            $error_message .= 'Last Name Missing;';
        } 
        if (strlen($email) == 0) {
            $status = 'error';
            $error_message .= 'Email Missing;';
        }  
        if (strlen($phone) == 0) {
            $status = 'error';
            $error_message .= 'Phone Missing;';
        } 

        if ($status == 'ok') {          
            $client = new Client;
            $client->first_name = $first_name;
            $client->last_name = $last_name;
            $client->email = $email;
            $client->phone = $phone;
            $client->save();

            $data['status'] = 'ok';
            $data['html'] = view('clients.client_row', ['client' => $client])->render();
            $data['client'] = $client;
            $http_status = 200;
        } else {
            $data['status'] = 'error';
            $data['error_message'] = $error_message;
            $http_status = 400;
        }    
        return response()->json($data, $http_status);
    }

    public function destroy($client_id)
    {
        $client = Client::find($client_id);
        $client->delete();

        $data = [];
        $data['status'] = 'ok';
        return response()->json($data);
    }

    public function show($client_id)
    {
        $client = Client::find($client_id);
        $data = [];
        if ($client) {
          $data['status'] = 'ok';
          $data['error'] = null;
        } else {
          $data['status'] = 'error';
          $data['error'] = 'Client not found!';
        }  
        $data['client'] = $client;
        return response()->json($data);
    }

    public function update(Request $request, $client_id)
    {
        $first_name = $request->get('first_name');
        $last_name = $request->get('last_name');
        $email = $request->get('email');
        $phone = $request->get('phone');

        $data = [];
        $status = 'ok';
        $error_message = '';
        $client = Client::find($client_id);
        if (!$client) {
            $status = 'error';
            $error_message .= 'Invalid Client Id;';
        }
        if (strlen($first_name) == 0) {
            $status = 'error';
            $error_message .= 'First Name Missing;';
        }   
        if (strlen($last_name) == 0) {
            $status = 'error';
            $error_message .= 'Last Name Missing;';
        } 
        if (strlen($email) == 0) {
            $status = 'error';
            $error_message .= 'Email Missing;';
        }  
        if (strlen($phone) == 0) {
            $status = 'error';
            $error_message .= 'Phone Missing;';
        } 

        if ($status == 'ok') {          
            $client->first_name = $first_name;
            $client->last_name = $last_name;
            $client->email = $email;
            $client->phone = $phone;
            $client->save();

            $data = [];
            $data['status'] = 'ok';
            $http_status = 200;
        } else {
            $data['status'] = 'error';
            $data['error_message'] = $error_message;
            $http_status = 400;
        }
        return response()->json($data, $http_status);
    }
    

}
