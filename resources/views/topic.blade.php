{!! Html::style('css/normalize.css') !!}
{!! Html::style('css/posts.css') !!}
{!! Html::style('css/main.css') !!}
{!! Html::style('css/page_structure.css') !!}
{!! Html::script('js/jquery.js') !!}

<body>
    <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    @include('header')
    <div class="main_container wrapper clear">
        <div class="main">
            <div class="post_main bc ">
                <div class="pic fr">
                    <img class="avatar" src="{{ $topic->user->avatar_path }}" alt="avatar">
                </div>
                <ul class="clear">
                    <li>社区></li>
                    <li>资源></li>
                    <li>{{ $topic->node->name }}</li>
                </ul>
                <h1>{{ $topic->title }}</h1>
                <div class="info">
                    <a class="" href="">{{ $topic->user->name }}</a>
                    <a  href="" ><?php Carbon::setLocale('zh');
                        echo $topic->updated_at->diffForHumans(Carbon::now()); 
                        ?></a>
                        <span>111次阅读</span>
                    </div>
                    <div class="post_content">
                        {{ $topic->content }}
                    </div>
                </div>
                <div class="post_footer bc_w">
                    <a href="">收藏</a>
                    <a href="">微博转发</a>
                </div>
                <div class="post_replys bc">
                    <span>总共{{ $topic->comments->count() }}条回复</span>
                    @foreach($topic->comments as $comment)
                    <div class="reply">
                        <div class=" media_left pd_s">
                            <a href=""><img class="avatar" src="{{ $comment->user->avatar_path }}"></a>
                        </div>
                        <div class="infos media_body">
                            <div class=" media_heading">
                                <a title="" href="">{{ $comment->content }}</a>
                            </div>
                            <div class="info">
                                <a class="" href="">{{ $comment->user->name }}</a>
                                <span>#1</span>
                                <span ><?php Carbon::setLocale('zh');
                                echo $comment->updated_at->diffForHumans(Carbon::now());?>
                                </span>
                            </div>
                        </div>
                        <div class="like_repost  ">
                            <a>
                                {!! Html::image('img/like.png') !!}
                            </a>
                            <a>
                                {!! Html::image('img/reply.png') !!}
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="reply_edit">
                    <div class="head"></div>
                    {!! Form::open(['url'=>'comment']) !!}
                       <div class="">
                           {!! Form::textarea('content',null,['class'=>'form-control']) !!}
                       </div>
                       {!! Form::hidden('topic_id', $topic->id) !!}
                       {!! Form::hidden('number', $topic->comments->count()+1) !!}
                       <div class="bc_b tc_white fs_middle">
                           {!! Form::submit('回复',['class'=>'btn btn-success form-control']) !!}
                       </div>
                    {!! Form::close() !!}
                </div>
            </div> <!-- #main -->
            @include('sidebar')
        </div> <!-- #main-container -->
        <div class="footer-container">
            <footer class="">

            </footer>
        </div>
    </body>
    </html>