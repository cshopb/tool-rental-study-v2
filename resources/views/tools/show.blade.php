@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('tools.partials._tool')
        </div>
    </div>

    @unless($tool->tags->isEmpty())
        <h5>Tags:</h5>
        <ul>
            @foreach($tool->tags as $tag)
                <li>{{ $tag->name }}</li>
            @endforeach
        </ul>
    @endunless
@endsection