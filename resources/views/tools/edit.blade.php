@extends('app')

@section('content')
    <h1>Edit: {!! $tool->name !!}</h1>

    <!--
     we are using Form::model instead of Form::open so that we can bind data to the fields
     the first argument we pass will be the model that we are passing.
    -->
    {!! Form::model($tool, ['method' => 'PATCH', 'action' => ['ToolsController@update', $tool->id]]) !!}
        @include('tools.partials._form', ['submitButtonText' => 'Edit Tool'])
    {!! Form::close() !!}

    @include('errors._list')
@endsection