@extends('layouts.blog-post')
@section('content')

    <div id="ww">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 centered">
                    @if($post->photo)
                        <img class="img-circle" height="150px" src="{{($post->photo->file)}}" alt="Stanley">
                    @endif
                    <h1>{{$post->title}}</h1>
                    <p>{!! ($post->body)!!}</p>

                </div><!-- /col-lg-8 -->
            </div><!-- /row -->
        </div> <!-- /container -->
    </div><!-- /ww -->


    <!-- +++++ Information Section +++++ -->

    <div class="container pt">
        <div class="row mt centered">
            <div class="col-lg-3">
                <span class="glyphicon glyphicon glyphicon-tag"></span>
                <p>PHP（全稱：PHP：Hypertext Preprocessor，即「PHP：超文字預處理器」）是一種開源的通用電腦手稿語言</p>
            </div>

            <div class="col-lg-3">
                <span class="glyphicon glyphicon glyphicon-tag"></span>
                <p>JavaScript，一種高階程式語言，通過解釋執行，是一門動態型別，物件導向（基於原型）的直譯語言。 它已經由ECMA（歐洲電腦製造商協會）通過ECMAScript實現語言的標準化。</p>
            </div>

            <div class="col-lg-3">
                <span class="glyphicon glyphicon glyphicon-tag"></span>
                <a href="https://laravel.tw/">Laravel</a>
                <p >Laravel ,是一個免費的且開放式的PHP web框架,是由Taylor Otwell 帶領的開發團隊而創造,Laravel運用著MVC(Model、view、Controller)架構
                    優點：簡潔明瞭，優美的語法。程式優雅、簡約，還擁有可讀性,有助於工程師部署和維護及開發的框架<br></p>
            </div>

        </div><!-- /row -->

        <div class="row mt">
            <div class="col-lg-6">
                <h4>About Me </h4>
                <p> Welcome to The Derek Blog<br>
                    Hi,I'm Derek<br>
                    I'm newbie on laravel,This Blog want to share about some Laravel skills
                    <br>  and I use to practice my skill to Laravel
                </p>
                <br>
                <h4>What about Laravel</h4>
                <p>Laravel is a PHP framework for constructing everything from small to enterprise-level applications.</p>
            </div><!-- /colg-lg-6 -->

            <div class="col-lg-6">
                <h4>The Article Categorys</h4>
                @foreach($categorys as  $key => $value)
                    {{$value}}
                    <div class="progress">
                        <div class="progress-bar progress-bar-theme" role="progressbar" aria-valuenow="60"
                        aria-valuemin="0" aria-valuemax="100" style="width: {{$categorys->categorys_all_count[$key]}};">
                        <span class="sr-only">60% Complete</span>
                        </div>
                    </div>
                @endforeach
            </div><!-- /col-lg-6 -->
        </div><!-- /row -->
    </div><!-- /container -->
@stop
@section('footer')
    @include('include.postfooter')
@endsection
