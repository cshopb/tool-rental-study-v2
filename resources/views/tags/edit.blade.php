@extends('app')

@section('content')
    <h1>Edit: {!! $tag->name !!}</h1>

    <!--
     we are using Form::model instead of Form::open so that we can bind data to the fields
     the first argument we pass will be the model that we are passing.
    -->
    {!! Form::model($tag, ['method' => 'PATCH', 'action' => ['TagsController@update', $tag->id]]) !!}
        @include('tags.partials._form', ['submitButtonText' => 'Edit Tag'])
    {!! Form::close() !!}
@endsection