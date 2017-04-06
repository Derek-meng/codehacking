@extends('layouts.admin')
@section('content')
    <style>
        @import url(//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css);
        /*Comment List styles*/
        .comment-list .row {
            margin-bottom: 0px;
        }
        .comment-list .panel .panel-heading {
            padding: 4px 15px;
            position: absolute;
            border:none;
            /*Panel-heading border radius*/
            border-top-right-radius:0px;
            top: 1px;
        }
        .comment-list .panel .panel-heading.right {
            border-right-width: 0px;
            /*Panel-heading border radius*/
            border-top-left-radius:0px;
            right: 16px;
        }
        .comment-list .panel .panel-heading .panel-body {
            padding-top: 6px;
        }
        .comment-list figcaption {
            /*For wrapping text in thumbnail*/
            word-wrap: break-word;
        }
        /* Portrait tablets and medium desktops */
        @media (min-width: 768px) {
            .comment-list .arrow:after, .comment-list .arrow:before {
                content: "";
                position: absolute;
                width: 0;
                height: 0;
                border-style: solid;
                border-color: transparent;
            }
            .comment-list .panel.arrow.left:after, .comment-list .panel.arrow.left:before {
                border-left: 0;
            }
            /*****Left Arrow*****/
            /*Outline effect style*/
            .comment-list .panel.arrow.left:before {
                left: 0px;
                top: 30px;
                /*Use boarder color of panel*/
                border-right-color: inherit;
                border-width: 16px;
            }
            /*Background color effect*/
            .comment-list .panel.arrow.left:after {
                left: 1px;
                top: 31px;
                /*Change for different outline color*/
                border-right-color: #FFFFFF;
                border-width: 15px;
            }
            /*****Right Arrow*****/
            /*Outline effect style*/
            .comment-list .panel.arrow.right:before {
                right: -16px;
                top: 30px;
                /*Use boarder color of panel*/
                border-left-color: inherit;
                border-width: 16px;
            }
            /*Background color effect*/
            .comment-list .panel.arrow.right:after {
                right: -14px;
                top: 31px;
                /*Change for different outline color*/
                border-left-color: #FFFFFF;
                border-width: 15px;
            }
        }
        .comment-list .comment-post {
            margin-top: 6px;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="page-header">Comments</h2>
                <section class="comment-list">
                    <!-- First Comment -->
                    <article class="row">
                        <div class="col-xs-6 col-sm-10">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <header class="text-left">
                                        <div class="comment-user"><i class="fa fa-user"></i> {{$posts->contact->name}}</div>
                                        <time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i> {{$posts->contact->created_at}}</time>
                                        <div class=""><i class="fa fa-envelope-o" aria-hidden="true"></i>{{$posts->contact->email}}</div>
                                    </header>
                                    <div class="comment-post">
                                        <p>
                                            {{$posts->contact->body}}
                                        </p>
                                    </div>
                                    <p class="text-right"><a href="#" class="btn btn-default btn-sm"><i class="fa fa-reply"></i> reply</a></p>
                                </div>
                            </div>
                        </div>
                    </article>
                    <!-- Second Comment Reply -->
                    <!-- Third Comment -->
                </section>
            </div>
        </div>
        <div class="col-sm-9">
            {!! Form::model($posts,['method' => 'PATCH','action'=>['AdminContactController@update',$posts->id]]) !!}
            <div class="form-group">
                {!! Form::label('body','Description:') !!}
                {!! Form::textarea('body',null,['class'=>'form-control']) !!}
            </div>
            {!! Form::close() !!}

        </div>
    </div>

@stop
