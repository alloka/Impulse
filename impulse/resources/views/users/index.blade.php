@extends('app')

@section('content')

<div class="col-md-8 col-md-offset-2">
    <h4>
        <ol class="breadcrumb">
            <li>Users</li>
        </ol>
    </h4>
    {!! Form::open(['method' => 'GET','action' => ['UserController@create']]) !!}
    {!! Form::submit("New User",['class' => "btn btn-primary", 'role' => 'button']) !!}
    {!! Form::close()!!}
    <hr/>
     @include('users._user_list', [ 'collection' => $users ] )

</div>
@stop  
