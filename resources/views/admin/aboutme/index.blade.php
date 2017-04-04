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
                {{--{{dd($post->photo)}}--}}
                <tr>
                    <td>{{$post->id}}</td>
                    <td><img height="5%" class="img-circle"
                             src="{{$post->photo ?  $post->photo->file :'http://placehold.it/400x400'  }} " alt="">
                    </td>
                    <td><a href={{route('admin.aboutme.edit',$post->id)}}>{{$post->title}}</a></td>
                    <td>{{str_limit($post->body,50)}}</td>
                    <td>
                        @if($post->is_active==1)
                            {!! Form::open(['method' => 'PATCH','action'=>['AboutMeController@update',$post->id]]) !!}
                            <input type="hidden" name="is_active" value="0">
                            <div class="form-group">
                                {!! Form::submit('Un-approve Active',['class'=>'btn btn-success']) !!}
                            </div>
                            {!! Form::close() !!}
                        @else
                            {!! Form::open(['method' => 'PATCH','action'=>['AboutMeController@update',$post->id]]) !!}
                            <input type="hidden" name="is_active" value="1">
                            <div class="form-group">
                                {!! Form::submit('Approve',['class'=>'btn btn-info']) !!}
                            </div>
                            {!! Form::close() !!}
                        @endif
                    </td>
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
