
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

Scores: {{ $scores }} from {{ $max_scores }}

@else
    Test not found
@endif

@endsection

