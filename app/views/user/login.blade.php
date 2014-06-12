@extends('layouts.master')

@section('content')

    {{ Form::open( ['route'=>'login'] ) }}

        <div class="form-group">
            {{ Form::label('email', 'Email:') }}
            {{ Form::text('email', Input::get('email'), ['class'=>'form-control']) }}
            {{ $errors->first('email', '<p class="label label-danger">:message</p>') }}
        </div>

        <div class="form-group">
            {{ Form::label('password', 'Password:') }}
            {{ Form::text('password', null, ['class'=>'form-control']) }}
            {{ $errors->first('password', '<p class="label label-danger">:message</p>') }}
        </div>

        <div class="form-group">
            {{ Form::submit('Login', ['class'=>'btn btn-success']) }}
        </div>

    {{ Form::close() }}

@stop