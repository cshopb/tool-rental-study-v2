@extends('app')

@section('content')
    <h1>Add a new tool</h1>

    <hr/>

    {!! Form::open(['action' => 'ToolsController@store']) !!}
        @include('tools.partials._form', ['submitButtonText' => 'Add Tool'])
    {!! Form::close() !!}
@endsection