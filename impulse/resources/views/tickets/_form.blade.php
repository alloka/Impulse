<h1> Create ticket </h1>
    <!-- left nav -->
  
        <div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('text', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Client name', 'Client name:') !!}
    {!! Form::select('customer_id', $clients,null, ['class' => 'form-control']) !!}
</div>
                  <div class="ticket-form">
                  
  {!! Form::label('priority', 'priority Level') !!}
        {!! Form::select('priority', array('0' => 'Select a Level', '1' => 'high', '2' => 'medium', '3' => 'low'), Input::old('priority'), array('class' => 'form-control')) !!}
</div>
<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
</div>

