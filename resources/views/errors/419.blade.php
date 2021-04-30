@extends('errors::error-layout')
@section('title')
Page Expired
@endsection
@section('content')
    <div class="code">
        419
    </div>
    <div class="message" style="padding: 10px;">
        Page expired, please <a href="/login">re-login.</a>
    </div>
@endsection