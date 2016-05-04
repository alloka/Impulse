@extends('app')

@section('content')

<div class="col-md-8 col-md-offset-2">
    <h4>
        <ol class="breadcrumb">
            <li>Tickets</li>
        </ol>
    </h4>
    {!! Form::open(['method' => 'GET','action' => ['TicketsController@create']]) !!}
    {!! Form::submit("New",['class' => "btn btn-primary", 'role' => 'button']) !!}
    {!! Form::close()!!}
    {!! Form::open(['method' => 'DELETE','action' => ['TicketsController@destroy',0]]) !!}
    {!! Form::submit("Delete",['class' => "btn btn-primary", 'role' => 'button']) !!}
    <hr/>
    @include('tickets._ticket_list', [ 'collection' => $tickets ] )
    {!! Form::close() !!}
</div>
@stop  
