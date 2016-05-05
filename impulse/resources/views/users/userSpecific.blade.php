@extends('app')

@section('content')

<div class="col-md-8 col-md-offset-2">
    <h4>
        <ol class="breadcrumb">
            <li>User Info</li>
        </ol>
    </h4>
    {!! Form::open(['method' => 'GET','action' => ['UserController@edit', $user->id]]) !!}
    {!! Form::submit("Edit",['class' => "btn btn-primary", 'role' => 'button']) !!}
    {!! Form::close()!!}
    <hr/>
    @include('users._user_specific', [ 'user' => $user, 'close' => $close,'numberOfOpen' => $numberOfOpen, ] )
</div>
@stop  
