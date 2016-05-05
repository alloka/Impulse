@extends('app')

@section('content')
	<h1> Add Support Agent</h1>
	
	</hr>
	{!! Form::open(['url' => 'users/assign/'.$ticket_id]) !!}
	<div class="form-group">
    {!! Form::label('user_id', 'Assign To:') !!}
    {!! Form::select('user_id', $users ,null, ['class' => 'form-control']) !!}
	</div>
	<div class = "form-group">
		{!! Form::submit('Assign', ['class' => 'btn btn-primary form-control']) !!}
	</div>
	{!! Form::close() !!}
@stop