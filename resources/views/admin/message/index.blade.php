@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-sx-6 col-sm-6"><h1>Posts</h1></div>
        <div class="col-sx-6 col-sm-6">
            {!! Form::open(['method' => 'post','id'=>'form-id','action'=>'AdminPostController@search']) !!}
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
{{--        {{dd($posts)}}--}}
        @if($posts)
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->name}}</td>
                    <td>{{$post->email}}</td>
                    <td><a href={{route('admin.contact.show',$post->id)}}>{{$post->title}}</a></td>
                    <td>{{str_limit($post->body,50)}}</td>
                    <td>{{$post->is_active?"是":'否'}}</td>
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
