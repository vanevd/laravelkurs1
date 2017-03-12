<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        return view('clients.index');
    }

    public function show($client_id)
    {
        $client = Client::find($client_id);
        
        $data = [];
        $data['client'] = $client;
        
        return view('clients.show', $data);
    }
}
