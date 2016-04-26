@extends('app')

@section('content')
	<h1> Edit Support Agent</h1>
	
	</hr>
	{!! Form::open(['url' => 'users/edit/{id}']) !!}
	<div class = "form-group">
		{!! Form::label('username', 'UserName:') !!}
		{!! Form::text('username', null, ['class' => 'form-control']) !!}
	</div>
	<div class = "form-group">
		{!! Form::label('email', 'Email:') !!}
		{!! Form::text('email', null, ['class' => 'form-control']) !!}
	</div>

		<div class = "form-group">
		{{ Form::select('type', [
		   'Admin' => 'Admin',
   			'Supervisor' => 'Support Supervisor',
   			'Agent' => 'Support Agent']) 
   		}}
		</div>
		<div class = "form-group">
		{!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
	</div>
	{!! Form::close() !!}
@stop