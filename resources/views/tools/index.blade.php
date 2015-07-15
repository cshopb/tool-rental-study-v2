@extends('app')

@section('content')
    <div class="row">
        <h1 class="col-md-2">Tools</h1>
        @if (Auth::user() != null && Auth::user()->isAManager())
           <h1 class="col-md-2">
               <a href="{{ action('ToolsController@create')}} " role="button" class="btn btn-info">New Tool</a>
           </h1>
        @endif
    </div>

    <hr/>

    @foreach($tools as $tool)
        <article>
            <h2>
                <a href="{{ action('ToolsController@show', [$tool->id]) }}">{{ $tool->name }}</a>
            </h2>

            <div class="body">{{ $tool->description }}</div>
            @if (Auth::user() != null && Auth::user()->isAManager())
                <div class="row">
                    <a href="{{ action('ToolsController@edit', [$tool->id]) }}" role="button"
                       class="btn btn-xs btn-warning">
                        Edit
                    </a>
                </div>
            @endif
        </article>
    @endforeach
@endsection