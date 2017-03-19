
@extends('common.site')

@section('title')
@if ($test)
    Test: {{$test->name}}
    @else
    Test not found
@endif
@endsection

@section('main')

@if ($test)
<form method="POST" action='/tests/{{$test->id}}'>
{{ csrf_field() }}
<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">   
            {{ $test->name }}
        </div>
    </div>
</div>
@foreach ($test->questions as $question) 
<div class="panel panel-default">
    <div class="panel-body">
    <div class="row">    
        <b>{{ $question->question }}</b>
    </div>    
        @foreach ($question->options as $option) 
        <div class="row">    
            <input type="radio" name="question_{{$question->id}}" value="{{$option->num}}"> {{ $option->option }}
        </div>    
        @endforeach        
    </div>        
</div>        
@endforeach        
<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">    
            <input class="btn btn-primary" type="submit" value="submit">
        </div>    
    </div>
</div>            
</form>
@else
    Test not found
@endif

@endsection

