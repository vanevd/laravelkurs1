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

        $client = new Client;
        $client->first_name = $first_name;
        $client->last_name = $last_name;
        $client->email = $email;
        $client->phone = $phone;
        $client->save();

        $data = [];
        $data['status'] = 'ok';
        return response()->json($data);
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

        $client = Client::find($client_id);
        $client->first_name = $first_name;
        $client->last_name = $last_name;
        $client->email = $email;
        $client->phone = $phone;
        $client->save();

        $data = [];
        $data['status'] = 'ok';
        return response()->json($data);
    }
    

}
