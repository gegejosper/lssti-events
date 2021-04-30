@extends('errors::error-layout')
@section('title')
Forbidden
@endsection
@section('content')
    <div class="code">
        403
    </div>
    <div class="message" style="padding: 10px;">
    Forbidden, back <a href="/">click here.</a>
    </div>
@endsection