@extends('app')


@section('content')

<div class="container">
    <div class="content">
        <a href="{{url('user/login')}}">Login</a>
        <a href="{{url('user/register')}}">Register</a>
    </div>
</div>

@stop