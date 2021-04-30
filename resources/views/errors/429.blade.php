@extends('errors::error-layout')
@section('title')
Too Many Requests
@endsection
@section('content')
    <div class="code">
        404
    </div>
    <div class="message" style="padding: 10px;">
    Too Many Requests, back <a href="/">click here.</a>
    </div>
@endsection