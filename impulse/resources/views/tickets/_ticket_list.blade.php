@if ( count($collection) )

<table id="tickets" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Title</th>
            <th>Create</th>
            <th>Owner</th>
            <th>Client</th>
            <th>Priority</th>
            <th>Status</th>
            <th>Delete</th>
            <th>Close</th>
            <th>Assigned</th>
        </tr>
    </thead>
    <tbody>
        @foreach ( $collection as $item )
        <tr>
            <!-- Select -->
            <!-- Title -->
            <td>
                <div class="text-left">
                    <a href="{{ action('TicketsController@show', $item->id ) }}"> {{ $item->title }}</a> 
                </div>
            </td>
            <!-- Create -->
            <td>
                {{ $item->created_at->diffForHumans() }}
            </td>
            <!-- Owner -->
            <td>
                @if ($item->support_agent()->get()->first() == null )
                <h5>unassigned</h5>
                @else
                <h5>{{ $item->support_agent()->get()->first()->username }}</h5>
                @endif
            </td>
            <!-- Client -->
            <td>
                @if ( $item->customer() == null )
                <h5>unassigned</h5>
                @else
                <h5>{{ $item->customer()->get()->first()->username }}</h5>
                @endif
            </td>
            <td>
                <h5>{{ $item->getPriority() }}</h5>
            </td>
            <!-- Status -->
            <td>
                <h5>{{ $item->getTicketStatus() }}</h5>
            </td>
            <td>
                {!! Form::open(['method' => 'DELETE','action' => ['TicketsController@destroy',$item->id]]) !!}
                 {!! Form::submit("Delete",['class' => "btn btn-primary", 'role' => 'button']) !!}
                 {!! Form::close() !!}
            </td>
            <td>
                @if($item->status != App\TicketStatus::close)
                {!! Form::open(['method' => 'POST','action' => ['TicketsController@close']]) !!}
                 {!! Form::submit("Close",['class' => "btn btn-primary", 'role' => 'button']) !!}
                 {!! Form::hidden('ticket',$item->id) !!}
                 {!! Form::close() !!}
                 @endif
            </td>
            <td>
                @if($item->support_agent()->get())
                {{$item->support_agent()->get()->first()->support_agent()->get()->first()->username}}
                @else
                {!! Form::open(['method' => 'POST','action' => ['UserController@claimTicket']]) !!}
                 {!! Form::submit("Claim Ticket",['class' => "btn btn-primary", 'role' => 'button']) !!}
                 {!! Form::hidden('ticketId',$item->id) !!}
                 {!! Form::close() !!}
                @endif
            </td>
        </tr>

        @endforeach

    </tbody>
</table>

@else

<h3>There are no tickets.</h3>

@endif 