
@extends('errors::error-layout')
@section('title')
Server Error
@endsection
@section('content')
    <div class="code">
        500
    </div>
    <div class="message" style="padding: 10px;">
    Server Error, back <a href="/">click here.</a>
    </div>
@endsection