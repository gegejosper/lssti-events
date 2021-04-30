
@extends('errors::error-layout')
@section('title')
Unauthorized
@endsection
@section('content')
    <div class="code">
        401
    </div>
    <div class="message" style="padding: 10px;">
    Unauthorized, back <a href="/">click here.</a>
    </div>
@endsection