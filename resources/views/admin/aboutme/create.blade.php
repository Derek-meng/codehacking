@extends('layouts.admin')
@section('content')
    <h1>Create About ME</h1>
    <div class="row">
        @include('include.form_error')
    </div>

    {!! Form::open(['method' => 'post','files' => true,'action'=>'AboutMeController@store']) !!}
    <div class="form-group">
        {!! Form::label('title','title') !!}
        {!! Form::text('title',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('photo_id','Photo:') !!}
        {!! Form::file('photo_id',null,['class'=>'form-control']) !!}

    </div>
    <div class="form-group">
        {!! Form::label('body','Body:') !!}
        {!! Form::textarea('body',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Create About Me',['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}

@stop
