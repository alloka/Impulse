@extends('app')

@section('content')

<h2>Impulse</h2>

<div class="row">

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box-success">
            <span>Open tickets</span>
            <span>{{ $open_tickets }}</span>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box-warning">
            <span>Clients</span>
            <span>{{ $clients }}</span>
        </div>
    </div>
    
</div>

<hr />

<!--

 Log of event here. Ticket created, new comment on ticket etc.

-->

    @stop