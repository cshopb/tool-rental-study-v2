@extends('app')

@section('content')
    <h1>{{ $tool->name }}</h1>

    <article>
        {{ $tool->description }}
    </article>
@endsection