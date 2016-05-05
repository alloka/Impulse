@extends('app')
@section('content')

<form method="POST" action="/auth/login">
    {!! csrf_field() !!}

    <div>
        Username
        <input type="username" name="username" value="{{ old('email') }}">
    </div>

    <div>
        Password
        <input type="password" name="password" id="password">
    </div>

    <div>
        <button type="submit">Login</button>
    </div>
</form>
@stop