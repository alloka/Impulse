@extends('app')

@section('content')

<div class="col-md-8 col-md-offset-2">
    <h4>
        <ol class="breadcrumb">
            <li><a href="{{ action('TicketsController@index') }}">Tickets</a></li>
            <li>Create</li>
        </ol>
    </h4>

    {!! Form::open(['url' => 'tickets']) !!}

    @include ('tickets._form', [ 'submitButtonText' => 'Create'] )

    {!! Form::close() !!}

    @include ('errors.list')

</div>

@stop