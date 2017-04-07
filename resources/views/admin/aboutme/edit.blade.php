@extends('layouts.admin')
@section('content')
    <h1>Edit About Me</h1>
    <div class="row">
        @include('include.form_error')
    </div>
    <div class="row">
        <div class="col-sm-3">
            @if($post->photo)
                <img src="{{$post->photo->file}}" alt="" class="img-responsive">
            @endif
        </div>
        <div class="col-sm-9">
            {!! Form::model($post,['method' => 'PATCH','action'=>['AboutMeController@update',$post->id],'files'=>true]) !!}
            <div class="form-group">
                {!! Form::label('title','Title') !!}
                {!! Form::text('title',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('photo_id','Photo:') !!}
                {!! Form::file('photo_id') !!}
            </div>
            <div class="form-group">
                {!! Form::label('body','Description:') !!}
                {!! Form::textarea('body',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Edit Post',['class'=>'btn btn-primary col-sm-2']) !!}
            </div>
            {!! Form::close() !!}
            {!! Form::open(['method' => 'DELETE','action'=>['AboutMeController@destroy',$post->id]]) !!}
            <div class="form-group">
                {!! Form::submit('Delete User',['class'=>'btn btn-danger col-sm-2 ']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>



@stop
