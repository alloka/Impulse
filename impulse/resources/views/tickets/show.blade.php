@extends('app')

@section('content')
<?php $comments = $ticket->comment()->get() ?>

<div class="row">
    <div class="col-md-8">
        <div class="timeline">
            <div>
                Title: {{$ticket->title}}
            </div>

            <div>
                Body : {{$ticket->text}}
            </div>

            <div>
                Status: {{$ticket->getTicketStatus()}}
            </div>

            <div>
                Priority: {{$ticket->getPriority()}}
            </div>
            <h3>
                Ticket Assigned to :
            </h3>
            <div>
                @forelse($ticket->support_agent()->get() as $agent)
                {{$agent->support_agent->get()->first()->username}}
                <br/>
                @empty
                <h4>This ticket is not assigned to any agent.</h4>
                @endforelse
            </div>
            <h3> Comments </h3>
            @forelse ($comments as $comment)
            <div>
                {{$comment->support_agent()->get()->first()->username}} : {{$comment->text}}
            </div>
            <br/>
            <hr/>
            @empty
            <h2>No comments for this ticket</h2>
            @endforelse
        </div>
        <h1> Add Comment </h1>
    <!-- left nav -->
  
        <div class="form-group">
    {!! Form::open(['method' => 'POST','action' => ['TicketsController@addComment']]) !!}    
    {!! Form::label('body', 'Title:') !!}
    {!! Form::textarea('text', null, ['class' => 'form-control']) !!}
    {!! Form::hidden('ticket', $ticket->id) !!}
</div>
<div class="form-group">
    {!! Form::submit("Add Comment", ['class' => 'btn btn-primary']) !!}
</div>
    </div>
</div>

@stop
