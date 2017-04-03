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
            <th>Photo</th>
            <th>Owner</th>
            <th>Category</th>
            <th>Title</th>
            <th>Body</th>
            <th>Post link</th>
            <th>Comments</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>
        @if($posts)
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td><img height="10%"
                             src="{{$post->photo_id ?  $post->photo->file :'http://placehold.it/400x400'  }} " alt="">
                    </td>
                    <td>{{$post->user->name}}</td>
                    <td>{{$post->category_id ? $post->category->name:'Uncategorized'}}</td>
                    <td><a href={{route('admin.posts.edit',$post->id)}}>{{$post->title}}</a></td>
                    <td>{{str_limit($post->body,50)}}</td>
                    <td><a target="_blank" href="{{route('home.post',$post->slug)}}">View Posts</a></td>
                    <td><a href="{{route('admin.comments.show',$post->id)}} ">View Comment</a></td>
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
