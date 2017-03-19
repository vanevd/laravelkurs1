
@extends('common.site')

@section('title', 'Tests')

@section('main')
<div class="panel panel-default">
    <div class="panel-body">
               
            @foreach ($tests as $test) 
            <div class="row">    
                <a  href='/tests/{{ $test->id }}'>{{ $test->name }}</a>
            </div>    
            @endforeach
    </div>
</div>
@endsection
