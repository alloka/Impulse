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
                <input type="checkbox" name="option" value="Selected"> 
            </td>
            <!-- Title -->
            <td>
                <div class="text-left">
                    <a href="{{ action('TicketController@show', $item->id ) }}"> {{ $item->title }}</a> 
                </div>
            </td>
            <!-- Create -->
            <td>
                {{ $item->created_at->diffForHumans() }}
            </td>
            <!-- Owner -->
            <td>
                @if ($item->assignedTo == null )
                <h5>unassigned</h5>
                @else
                <h5>{{ $item->assignedTo->name }}</h5>
                @endif
            </td>
            <!-- Client -->
            <td>
                @if ( $item->isFrom == null )
                <h5>unassigned</h5>
                @else
                <h5>{{ $item->isFrom->name }}</h5>
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