<div class="col-md-4">

    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        {!! Form::open(['method' => 'post','class'=>'navbar-form','role'=>'search','action'=>'AdminPostController@home_search']) !!}
        <div class="input-group">
            <input type="text" class="form-control">
            <span class="input-group-btn">
                            <button class="btn btn-default" name="search" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
        </div>
    {!! Form::close() !!}
        <!-- /.input-group -->
    </div>

    <!-- Blog Categories Well -->
    <div class="well">
        <h4>New Posts</h4>
        <div class="row">
            @foreach($newpost as $key=> $post)
                @if($key/2==0)
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    <li><a href="{{route('home.post',$post->slug)}}">{{str_limit($post->title,15)}}</a>
                    </li>
                </ul>
            </div>
                @else
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    <li><a href="{{route('home.post',$post->slug)}}">{{str_limit($post->title,15)}}</a>
                    </li>
                </ul>
            </div>
                @endif
            @endforeach
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->


</div>
