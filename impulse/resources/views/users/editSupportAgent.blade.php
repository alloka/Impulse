@extends('app')

@section('content')
	<h1> Edit Support Agent</h1>
	
	</hr>
	{!! Form::open(['url' => 'users/editUser/'.$user->id]) !!}
	<div class = "form-group">
		{!! Form::label('username', 'UserName:') !!}
		{!! Form::text('username', $user->username, ['class' => 'form-control']) !!}
	</div>
	<div class = "form-group">
		{!! Form::label('email', 'Email:') !!}
		{!! Form::text('email', $user->email, ['class' => 'form-control']) !!}
	</div>

		<div class = "form-group">
		{{ Form::select('type', [
		   'Admin' => 'Admin',
   			'Supervisor' => 'Support Supervisor',
   			'Agent' => 'Support Agent'], $user->type) 
   		}}
		</div>
		<div class = "form-group">
		{!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
	</div>
	{!! Form::close() !!}
@stop