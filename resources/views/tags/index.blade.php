@extends('app')

@section('table')
    <div class="row">
        <h1 class="col-md-2">Tags</h1>
        @if (Auth::user() != null && Auth::user()->isAManager())
            <h1 class="col-md-2">
                <a href="{{ action('TagsController@create')}} " role="button" class="btn btn-info">New Tag</a>
            </h1>
        @endif
    </div>

    @include('tags.partials._table')
@endsection