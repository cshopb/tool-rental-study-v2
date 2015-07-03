@extends('auth.form')

@section('title')
    Register
@endsection

@section('body')

    {!! Form::open(['action' => 'Auth\AuthController@postRegister', 'class' => 'form-horizontal']) !!}
        @include('auth.partials._emailAndPassword')
        @include('auth.partials._confirmPassword')
        @include('auth.partials._personalData')
        @include('auth.partials._submitButton', ['submitButtonText' => 'Register'])
    {!! Form::close() !!}

@endsection