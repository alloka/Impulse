@extends('app')

@section('content')



    {!! Form::open(['url' => 'customers']) !!}

    @include ('customers._form', [ 'submitButtonText' => 'Create'] )

    {!! Form::close() !!}

    @include ('errors.list')

@stop