
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
<input type="hidden" name="page" value="{{ $page }}">
<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">   
            {{ $test->name }}
        </div>
    </div>
</div>
@foreach ($questions as $question) 
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
            @if ($page > 1)
            <input class="btn btn-primary" name="previous" type="submit" value="previous">
            @endif
            @if ($page < $count_pages)
            <input class="btn btn-primary" name="next" type="submit" value="next">
            @endif
            @if ($page == $count_pages)
            <input class="btn btn-primary" name="submit" type="submit" value="submit">
            @endif
        </div>    
    </div>
</div>            
</form>
@foreach ($answers as $key => $answer) 
    [{{$key}}] => {{$answer}}<br>
@endforeach
@else
    Test not found
@endif

@endsection

