@extends('layouts.master')

@section('content')

    <ul>
        @foreach($thread as $message)
            <li>
                {{$message->body}}
                <br>
                {{$message->user->email}}
            </li>
        @endforeach
    </ul>

    {{ Form::open( ['route'=>'message'] ) }}

        <input type="hidden" name="threadId" value="{{$threadId}}">

        <div class="form-group">
            {{ Form::label('body', 'Body:') }}
            {{ Form::text('body', Input::get('body'), ['class'=>'form-control']) }}
            {{ $errors->first('body', '<p class="label label-danger">:message</p>') }}
        </div>

        <div class="form-group">
            {{ Form::submit('Send', ['class'=>'btn btn-success']) }}
        </div>

    {{ Form::close() }}

@stop