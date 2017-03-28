@extends('layouts.admin')
@section('content')
    <h1>Posts</h1>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>Title</th>
            <th>Body</th>
            <th>Is_Active</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>
        @if($posts)
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td><img height="10%" src="{{$post->photo_id ?  $post->photo->file :'http://placehold.it/400x400'  }} " alt=""></td>
                    {{--<td>{{$post->user->name}}</td>--}}
                    {{--<td>{{$post->category_id ? $post->category->name:'Uncategorized'}}</td>--}}
                    <td><a href={{route('admin.aboutme.edit',$post->id)}}>{{$post->title}}</a></td>
                    <td>{{str_limit($post->body,50)}}</td>
                    {{--<td><a target="_blank" href="{{route('home.post',$post->slug)}}">View Posts</a></td>--}}
                    <td><a href="#">{{$post->is_active}}</a></td>
                    <td>{{$post->created_at}}</td>
                    <td>{{$post->updated_at}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{--{{$posts->render()}}--}}
        </div>
    </div>
@stop