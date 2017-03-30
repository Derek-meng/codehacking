@extends('layouts.blog-post')
@section('content')
    @for($i=0;$i<count($posts);$i++)
        {{--@if($i=2)--}}
        {{--{{dd($i%2)}}--}}
        {{--@endif--}}
        @if($i%2==0)
            <div id="grey{{$i}}" class="grey">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            @if($posts[$i]->user->photo)
                            <p><img src="{{$posts[$i]->user->photo->file}}" width="50px" height="50px">
                                <ba>{{$posts[$i]->user->name}}</ba>
                            </p>
                            @endif
                            <p>
                                <bd>{{$posts[$i]->created_at}}</bd>
                            </p>
                            <h4>{{$posts[$i]->title}}</h4>
                            <p>{!!  $posts[$i]->body  !!} </p>
                            <p><a href="{{route('home.post',$posts[$i]->slug)}}">Continue Reading...</a></p>
                        </div>

                    </div><!-- /row -->
                </div> <!-- /container -->
            </div>
            {{--@endforeach--}}
        @else
            <div id="white{{$i}}" class="white">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            @if($posts[$i]->user->photo)
                            <p><img src="{{$posts[$i]->user->photo->file}}" width="50px" height="50px">
                                <ba>{{$posts[$i]->user->name}}</ba>
                            </p>
                            @endif
                            <p>
                                <bd>{{$posts[$i]->created_at}}</bd>
                            </p>
                            <h4>{{$posts[$i]->title}}</h4>
                            <p class="bq">{!! $posts[$i]->body !!}</p>
                            <p><a  href="{{route('home.post',$posts[$i]->slug)}}">Continue Reading...</a></p>
                        </div>

                    </div><!-- /row -->
                </div> <!-- /container -->
            </div><!-- /grey -->
        @endif
    @endfor
    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{$posts->render()}}
        </div>
    </div>
@endsection
