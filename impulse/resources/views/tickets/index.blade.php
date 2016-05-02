@extends('app')

@section('content')

<div class="col-md-8 col-md-offset-2">
    <h4>
        <ol class="breadcrumb">
            <li>Tickets</li>
        </ol>
    </h4>
    <a href="{{ action('TicketController@create') }}" class="btn btn-primary" role="button">New</a>
    <a href="#" class="btn btn-primary" role="button">Merge</a>
    <a href="#" class="btn btn-primary" role="button">Delete</a>
    <a href="#" class="btn btn-primary" role="button">Close</a>
    <a href="#" class="btn btn-primary" role="button">Assigned to</a>

    <hr/>

    @include('tickets._ticket_list', [ 'collection' => $tickets ] )
</div>
@stop   

@section('script')

<script>
    $(document).ready(function () {
        $("#tickets").dataTable();
    });
</script>

@stop
