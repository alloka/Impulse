@if ( count($collection) )

<table id="users" class="table table-bordered table-striped">
    <thead>
        <tr>

            <th>Username</th>
            <th>Id</th>
            <th>Email</th>
            <th>Type</th>
            <th>Supervisor</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach ( $collection as $item )
        <tr>
            <!-- Select -->
            <!-- Title -->
            <td>
                <div class="text-left">
                    <a href="{{ action('UserController@show', $item->id ) }}"> {{ $item->username }}</a> 
                </div>
            </td>
               <td>
                <h5>{{ $item->id}}</h5>
               
            </td>
            <td>
                <h5>{{ $item->email }}</h5>
               
            </td>
             <td>
                <h5>{{ $item->type }}</h5>
               
            </td>

             <td>
                @if ( $item->supervisor_id == null )
                <h5>unassigned</h5>
                @else
                <h5>{{ $item->supervisor_id}}</h5>
                @endif
            </td>
            <!-- Client -->
            <td>
                {!! Form::open(['method' => 'DELETE','action' => ['UserController@destroy', $item->id]]) !!}
                 {!! Form::submit("Delete",['class' => "btn btn-primary", 'role' => 'button']) !!}
                 {!! Form::hidden('id',$item->id) !!}
                 {!! Form::close() !!}
            </td>
            
        </tr>

        @endforeach

    </tbody>
</table>

@else

<h3>There are no users.</h3>

@endif 