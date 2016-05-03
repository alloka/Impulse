@extends('app')

@section('content')

<div class="row">
    <div class="col-md-8">
        <ul class="timeline">
            
            @foreach ( $ticket->comments as $comment )
            <li>
                <div class="timeline-item">
                    <div  class="timeline-header">
                        <span class="time"><i class="glyphicon glyphicon-time"></i> {{ $comment->created_at->diffForHumans() }} </span>
                        @if( $comment->creator_name )
                        <p>Added by {{ $comment->creator_name }}</p>
                        @else
                        <p>Added by unknowend </p>
                        @endif                  
                    </div>
                    <div class="timeline-body">
                        {{ $comment->description }}
                    </div>
                    <div class="timeline-footer">
                        <a class="btn btn-primary btn-xs">Edit</a>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>

        <hr />

        <!-- Editor -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Comment Ticket</h3>
            </div><!-- /.box-header -->
            <div class="box-body pad">

                {!! Form::model( $ticket, ['method' => 'POST', 'action' => ['TicketController@addComment'] ] ) !!}
                <div class="form-group">
                    {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Enter text ...' ] ) !!}
                </div>
                <div class="form-group">
                    {!! Form::hidden('ticket_id', $ticket->id) !!}
                    {!! Form::hidden('creator_name',  Auth::user()->name ) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Comment', ['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}

            </div>
        </div>

    </div>

    <!-- Client info & ticket status -->
    <div class="col-md-4">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <a href="{{ action('ClientController@show', $ticket->isFrom->id ) }}">{{ $ticket->isFrom->name }}</a>
                </h3>
            </div>
            <div class="box-body">
                <h5>phone : {{ $ticket->isFrom->phone }}</h5>
                <h5>email : {{ $ticket->isFrom->email }}</h5>
                <hr />
                <h4>Ticket</h4>
                {!! Form::model( $ticket, ['method' => 'PATCH', 'action' => ['TicketController@update', $ticket->id]] ) !!}
                <div class="form-group">
                    {!!  Form::label('status','Status',array('id'=>'','class'=>'')) !!}
                    {!! Form::select('status', array(
                    '0' => 'Open',
                    '1' => 'Close',
                    '2' => 'Pending',
                    '3' => 'Solved'
                    )) !!}
                </div>
                <div class="form-group">
                    {!!  Form::label('priority','Priority',array('id'=>'','class'=>'')) !!}
                    {!! Form::select('priority', array(
                    '1' => 'Low',
                    '2' => 'Middle',
                    '3' => 'High',
                    '4' => 'Critical'
                    )) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('assignedTo','Assigned to',array('id'=>'','class'=>'')) !!}
                    @if( $ticket->assignedTo == NULL )
                    {!! Form::select('user_id', $users, 0 ) !!}
                    @else
                    {!! Form::select('user_id', $users ) !!}
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}

                @include ('errors.list')
            </div>
        </div>
    </div>
</div>

@stop
