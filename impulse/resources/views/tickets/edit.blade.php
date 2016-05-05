@extends('app')

@section('content')

<h1>Edit: {!! $ticket->title !!}</h1>

<hr/>

{!! Form::model( $ticket, ['method' => 'PATCH', 'action' => ['TicketController@update', $ticket->id]] ) !!}

@include ('tickets._form', [ 'submitButtonText' => 'Edit'])

{!! Form::close() !!}

@include ('errors.list')

@stop