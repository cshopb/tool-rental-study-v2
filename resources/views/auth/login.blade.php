@extends('auth.form')

@section('title')
    Login
@endsection

@section('body')

    {!! Form::open(['action' => 'Auth\AuthController@postLogin', 'class' => 'form-horizontal']) !!}
        @include('auth.partials._emailAndPassword')
        @include('auth.partials._rememberMe')
        @include('auth.partials._submitButton', ['submitButtonText' => 'Login'])
    {!! Form::close() !!}

@endsection