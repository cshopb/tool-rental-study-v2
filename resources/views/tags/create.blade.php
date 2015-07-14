@extends('app')

@section('content')
    <h1>Add a new tag</h1>

    <hr/>

    {!! Form::open(['action' => 'TagsController@store']) !!}
        @include('tags.partials._form', ['submitButtonText' => 'Add Tag'])
    {!! Form::close() !!}
@endsection