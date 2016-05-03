@extends('app')

@section('content')

<h2> Tweets </h2>


	<section>
    <div>
        <ul>
            @foreach($tweets->text as $text )
            <li>$text</li>
             @endforeach
        </ul>
    </div>
</section>


@stop