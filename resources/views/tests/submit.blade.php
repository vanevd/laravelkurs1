
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

Test submitted successfuly.

Scores: {{ $scores }} from {{ $max_scores }}<br>
<a href="/tests">Start new test</a>

@else
    Test not found
@endif

@endsection

