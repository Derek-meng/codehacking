@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-sx-6 col-sm-6"><h1>Reply Message</h1></div>
        <div class="col-sx-6 col-sm-6">
            {!! Form::open(['method' => 'post','id'=>'form-id','action'=>'ReplyMessageController@search']) !!}
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input name="search" type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button  class="btn btn-default" type="submit">
                            <i class="fa fa-search">
                            </i>
                        </button>
                </span>
                </div>
            </li>
            {!! Form::close() !!}
        </div>
    </div>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Body</th>
        </tr>
        </thead>
        <tbody>
        {{--        {{dd($posts)}}--}}
        @if($posts)
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td><a href="{{route('admin.replymessage.show',$post->id)}}">{{$post->body}}</a></td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{$posts->render()}}
        </div>
    </div>
@stop
