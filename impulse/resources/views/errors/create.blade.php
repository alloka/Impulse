<h1> Create ticket </h1>
    <!-- left nav -->
  
        <div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Client ID', 'Client ID:') !!}
    {!! Form::text('client_id', null, ['class' => 'form-control']) !!}
</div>
                  <div class="ticket-form">
                  
  {!! Form::label('priority', 'priority Level') !!}
        {!! Form::select('priority', array('0' => 'Select a Level', '1' => 'high', '2' => 'medium', '3' => 'low'), Input::old('priority'), array('class' => 'form-control')) !!}
</div>
<div class="ticket-form">
    {!! Form::submit('add ticket')!!}
            {!! Form::close() !!}
            
        
  
