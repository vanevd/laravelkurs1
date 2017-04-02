
@extends('common.site')

@section('title')
    Error
@endsection

@section('main')

<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">   
            {{ $error }}
        </div>
    </div>
</div>

@endsection

