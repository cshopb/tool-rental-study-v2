@extends('app')

@section('content')
    <h1>{{ $tool->name }}</h1>

    <article>
        {{ $tool->description }}
    </article>

    @unless($tool->tags->isEmpty())
        <h5>Tags:</h5>
        <ul>
            @foreach($tool->tags as $tag)
                <li>{{ $tag->name }}</li>
            @endforeach
        </ul>
    @endunless
@endsection