@extends('layouts.blog-post')
@section('content')
    <div class="container pt">
        <div class="row mt">
            <div class="col-lg-6 col-lg-offset-3 centered">
                <h3>Contact Me</h3>
                <hr>
            </div>
        </div>
        <div class="row">
            @include('include.form_error')
        </div>
        @if(Session::has('sent_masseage'))
            <div class="col-lg-6 col-lg-offset-3 centered">
                <h4>
                    <span style="text-align:center" class="alert alert-danger">{{session('sent_masseage')}}</span>
                </h4>
            </div>
        @endif
        <div class="row mt" ng-controller="mainController">
            <div class="col-lg-8 col-lg-offset-2">
                {!! Form::open(['method' => 'post','name'=>'myForm','action'=>'ContactController@store']) !!}
                <div class="form-group">
                    {!! Form::label('name','姓名:') !!}
                    <span>@{{ name }}</span>
                    <br>
                    {!! Form::text('name',null,['class'=>'form-control','required','ng-model'=>'name','placeholder'=>'Your Name']) !!}
                    <div ng-messages="myForm.name.$error" style="color:maroon" role="alert">
                        <div class="alert-danger" ng-message="required">請輸入您的姓名</div>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('email','Email:') !!}
                    <span>@{{ email }}</span>
                    <br>
                    {!! Form::text('email',null,['class'=>'form-control','required','ng-model'=>'email','placeholder'=>'請填寫您正確的郵箱,以便我日後與您聯繫']) !!}
                    <div ng-messages="myForm.email.$error" style="color:maroon" role="alert">
                        <div class="alert-danger" ng-message="required">請輸入您的郵箱</div>
                        <div class="alert-danger" ng-message="email">您輸入Email的格式錯誤</div>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('title','主題:') !!}
                    <span>@{{title}}</span>
                    {!! Form::text('title',null,['class'=>'form-control','name'=>'title','required','ng-model'=>'title','placeholder'=>'請輸入主題']) !!}
                    <div ng-messages="myForm.title.$error" style="color:maroon" role="alert">
                        <div class="alert-danger" ng-message="required">請輸入主題</div>
                    </div>
                </div>

                {!! Form::label('body','內容:') !!}
                {!! Form::textarea('body',null,['class'=>'form-control','rows'=>'6','placeholder'=>'Enter your text here']) !!}

                <br>
                {!! Form::submit('Create Post',['class'=>'btn btn-success']) !!}
                {!! Form::close() !!}
            </div>

        </div><!-- /row -->
    </div>

@endsection