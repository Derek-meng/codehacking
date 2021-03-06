@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-sx-6 col-sm-6"><h1>Message Posts</h1></div>
        <div class="col-sx-6 col-sm-6">
            {!! Form::open(['method' => 'post','id'=>'form-id','action'=>'AdminContactController@search']) !!}
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
            <th>Name</th>
            <th>Email</th>
            <th>Title</th>
            <th>Body</th>
            <th>Reply</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>

        @if($posts)
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->name}}</td>
                    <td>{{$post->email}}</td>
                    <td><a href={{route('admin.contact.show',$post->id)}}>{{$post->title}}</a></td>
                    <td>{{str_limit($post->body,50)}}</td>
                    @if($post->is_active)
                        <td><a href="{{route('admin.replymessage.show',$post->reply_message->id)}}">是</a></td>
                    @else
                        <td>否</td>
                    @endif
                    <td>{{$post->created_at}}</td>
                    <td>{{$post->updated_at}}</td>
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
