{!! Html::style('css/normalize.css') !!}
{!! Html::style('css/posts.css') !!}
{!! Html::style('css/main.css') !!}
{!! Html::style('css/page_structure.css') !!}
{!! Html::script('js/jquery.js') !!}
{!! Html::script('js/index.js') !!}

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
                    <li><?php use App\Node; $a = $topic->node->parent_id; echo Node::find($a)->name;?>></li>
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
                    @if ($currentUser && App\Like::isUserLikedTopic($currentUser, $topic))
                    <a href="/like/{{ $topic->id }}" class="">取消收藏</a>
                    @else
                    <a href="/like/{{ $topic->id }}" class="">收藏</a>
                    @endif
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
                                <p>{!! $comment->at($comment->content) !!}</p>
                            </div>
                            <div class="info">
                                <a class="author" href="">{{ $comment->user->name }}</a>
                                <span>#1</span>
                                <span ><?php Carbon::setLocale('zh');
                                echo $comment->updated_at->diffForHumans(Carbon::now());?>
                                </span>
                            </div>
                        </div>
                        @if (Auth::check())
                        <div class="like_repost">
                            <a >{{ $comment->vote_count }}</a>
                            <a href="{{ action('CommentController@vote', ['id' => $comment->id]) }}">
                                {!! Html::image('img/like.png') !!}
                            </a>
                            <a href="javascript:void(0)" onclick="replyOne('{{{ $comment->user->name }}}');">
                                {!! Html::image('img/reply.png') !!}
                            </a>
                        </div>
                        @endif
                    </div>
                    @endforeach
                </div>
                @if (Auth::check())
                <div class="reply_edit">
                    <div class="head"></div>
                    {!! Form::open(['url'=>'comment']) !!}
                       <div class="">
                           {!! Form::textarea('content',null,['class'=>'form-control', 'id' => 'reply_content']) !!}
                       </div>
                       {!! Form::hidden('topic_id', $topic->id) !!}
                       {!! Form::hidden('number', $topic->comments->count()+1) !!}
                       <div class="bc_b tc_white fs_middle">
                           {!! Form::submit('回复',['class'=>'btn btn-success form-control']) !!}
                       </div>
                    {!! Form::close() !!}
                </div>
                @endif
            </div> <!-- #main -->
            @include('sidebar')
        </div> <!-- #main-container -->
        <div class="footer-container">
            <footer class="">

            </footer>
        </div>
    </body>
    </html>