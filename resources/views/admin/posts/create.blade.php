@extends('layouts.admin')
@section('content')
    @include('include.tinyeditor')
    <h1>Create Posts</h1>
    <div class="row">
        {!! Form::open(['method' => 'post','action'=>'AdminPostController@store','files'=>true]) !!}
        <div class="form-group">
            {!! Form::label('title','Title') !!}
            {!! Form::text('title',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('category_id','Category:') !!}
            {!! Form::select('category_id',[''=>'Choose Categories']+$categories,null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('photo_id','Photo:') !!}
            {!! Form::file('photo_id') !!}
        </div>
        <div class="form-group">
        {!! Form::label('body','Description:') !!}
        {!! Form::textarea('body',null,['class'=>'form-control']) !!}
        </div>

        {{--<textarea id="bodyField"></textarea>--}}

        {{--@ckeditor('bodyField', ['height' => 500])--}}
        <div class="form-group">
            {!! Form::submit('Create Post',['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
    <div class="row">
        @include('include.form_error')
    </div>


@stop
