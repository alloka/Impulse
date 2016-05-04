@if ( count($collection) )

<table id="tickets" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Select</th>
            <th>Title</th>
            <th>Create</th>
            <th>Owner</th>
            <th>Client</th>
            <th>Priority</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ( $collection as $item )
        <tr>
            <!-- Select -->
            <td>
                {{ Form::radio('ticket', $item->id) }} 
            </td>
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
        </tr>

        @endforeach

    </tbody>
</table>

@else

<h3>There are no tickets.</h3>

@endif 