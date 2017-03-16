@extends('layouts.admin')
@section('content')
    @if(($replies))
        <h1>replies</h1>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Author</th>
                <th>Email</th>
                <th>Body</th>
            </tr>
            </thead>
            <tbody>
            @foreach($replies as $replie)
                <tr>
                    <td>{{$replie->id}}</td>
                    <td>{{$replie->author}}</td>
                    <td>{{$replie->email}}</td>
                    <td>{{$replie->body}}</td>
                    <td><a href="{{route('home.post',$replie->comment->post->id)}}">View posts</a></td>
                    <td>
                        @if($replie->is_active==1)
                            {!! Form::open(['method' => 'PATCH','action'=>['CommentRepliesController@update',$replie->id]]) !!}
                            <input type="hidden" name="is_active" value="0">
                            <div class="form-group">
                                {!! Form::submit('Un-approve Post',['class'=>'btn btn-success']) !!}
                            </div>
                            {!! Form::close() !!}
                        @else
                            {!! Form::open(['method' => 'PATCH','action'=>['CommentRepliesController@update',$replie->id]]) !!}
                            <input type="hidden" name="is_active" value="1">
                            <div class="form-group">
                                {!! Form::submit('Approve',['class'=>'btn btn-info']) !!}
                            </div>
                            {!! Form::close() !!}
                        @endif
                    </td>
                    <td>
                        {!! Form::open(['method' => 'Delete','action'=>['CommentRepliesController@destroy',$replie->id]]) !!}
                        <div class="form-group">
                            {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach.
            </tbody>
        </table>
    @endif
@stop
