@extends('app')

@section('content')

<div class="col-md-8 col-md-offset-2">
            <h4>
                <ol class="breadcrumb">
                    <li>Customers</li>
                </ol>
            </h4>

            <a href="{{ action('CustomerController@create') }}" class="btn btn-primary" role="button">New</a>
            

            <hr/>

            @if( count($clients) )

            <table id="clients" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Select</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ( $clients as $client )
                    <tr>
                        <td>
                            <input type="checkbox" name="option1" value="Selected"> 
                        </td>
                        <td>
                            <a href="{{ action('CustomerController@show', $client->id ) }}">{{ $client->name }}
                        </td>
                        <td>
                            {{ $client->phone }}
                        </td>
                        <td>
                            {{ $client->email }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
</div>
@else  

<h3>There are no clients. <a href="{{ action('CustomerController@create') }}">Create one</a></h3>

@endif

@stop

@section('script')

@stop