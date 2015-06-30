@extends('app')

@section('content')
    <h1>Tools</h1>

    <hr/>

    @foreach($tools as $tool)
        <article>
            <h2>
                <a href="{{ action('ToolsController@show', [$tool->id]) }}">{{ $tool->name }}</a>
            </h2>
            <div class="body">{{ $tool->description }}</div>
        </article>
    @endforeach
@endsection