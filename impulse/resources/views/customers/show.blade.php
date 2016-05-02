@extends('app')

@section('content')

<div class="col-md-8 col-md-offset-2">

            <h4>
                <ol class="breadcrumb">
                    <li><a href="{{ action( 'CustomerController@index') }}">Clients</a></li>
                    <li class="active">{{ $client->name }}</li>
                </ol>
            </h4>

            
            <hr/>

            <h3>{{ $client->name }}</h3>
            <h5>phone : {{ $client->phone }}</h5>
            <h5>email : {{ $client->email }}</h5>
            <h4>Address</h4>
            <h5>{{ $client->street }}</h5>
            <h5>{{ $client->city }}</h5>
            <h5>{{ $client->zip_code }}</h5>
            <h5>{{ $client->country }}</h5>

            <hr />

            @include('tickets._ticket_list', [ 'collection' => $client->tickets ] )

</div>
@stop

@section('script')

<script>
    $(document).ready(function () {
        $("#tickets").dataTable();
    });
</script>

@stop
