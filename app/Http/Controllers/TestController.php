<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\TestQuestion;

class TestController extends Controller
{
    public function index()
    {
        $data = [];
        $data['tests'] = Test::all();

        return view('tests.index', $data);
    }


    public function show($test_id)
    {
        $test = Test::with('questions','questions.options')->find($test_id);

        $data = [];
        $data['test'] = $test;
        
        return view('tests.show', $data);
    }

    public function submit($test_id, Request $request)
    {
        $test = Test::with('questions','questions.options')->find($test_id);

        $data = [];
        $data['test'] = $test;
        
        return view('tests.submit', $data);
    }


}
