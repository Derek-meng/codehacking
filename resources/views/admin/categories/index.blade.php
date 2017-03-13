@extends('layouts.admin');
@section('content')
    <h1>Categories</h1>
    <div class="col-sm-5">
        {!! Form::open(['method' => 'post','action'=>'AdminCategoriesController@store']) !!}
        <div class="form-group">
            {!! Form::label('catergories','catergory') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Create Category',['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
    <div class="col-sm-6">
        @if($categories)
            <table class="table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Created date</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td><a href="{{route('admin.catergories.edit',$category->id)}}">{{$category->name}}</a></td>
                        <td>{{$category->created_ed ? $category->created_ed:'no date'}}</td>
                    </tr>
                @endforeach
                </tbody>
                @endif
            </table>
    </div>
@stop
