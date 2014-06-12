@extends('layouts.master')

@section('content')

    @foreach($threads as $thread)
        <a href="<?= url('message/'.$thread->thread_id) ?>">{{$thread->thread_id}}</a>
    @endforeach

    {{ Form::open( ['route'=>'message'] ) }}

        <div class="form-group">
            {{ Form::label('body', 'Body:') }}
            {{ Form::text('body', Input::get('body'), ['class'=>'form-control']) }}
            {{ $errors->first('body', '<p class="label label-danger">:message</p>') }}
        </div>

        <div class="form-group">
            {{ Form::label('toUserId', 'To:') }}
            {{ Form::select('toUserId', $user_list) }}
        </div>

        <div class="form-group">
            {{ Form::submit('Send', ['class'=>'btn btn-success']) }}
        </div>

    {{ Form::close() }}

@stop