<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        $data = [];
        $data['clients'] = Client::all();

        return view('clients.index', $data);
    }

    public function create()
    {
        return view('clients.create');
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

        return redirect()->action('ClientController@index');
    }

    public function destroy($client_id)
    {
        $client = Client::find($client_id);
        $client->delete();

        return redirect()->action('ClientController@index');
    }

    public function show($client_id)
    {
        $client = Client::find($client_id);
        
        $data = [];
        $data['client'] = $client;
        
        return view('clients.show', $data);
    }

    public function edit($client_id)
    {
        $client = Client::find($client_id);
        
        $data = [];
        $data['client'] = $client;

        return view('clients.edit', $data);
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
