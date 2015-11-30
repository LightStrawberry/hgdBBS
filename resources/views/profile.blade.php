{!! Html::style('css/normalize.css') !!}
{!! Html::style('css/main.css') !!}
{!! Html::style('css/page_structure.css') !!}
{!! Html::style('css/profile.css') !!}
{!! Html::script('js/jquery.js') !!}


@include('header')
<div class="main_container wrapper clear">
        <div class="main  profile">
                <div class="topic bc media ">
                        <div class=" media_left pd_s">
                                <a href=""><img class="media-object avatar" src="{{ $user->avatar_path }}" alt="1107"></a>
                        </div>
                        <div class="infos media_body">
                                <div class=" media_heading">
                                        <a title="" href="" class="username">{{ $user->name }}</a>
                                </div>
                                <div class="info">
                                        <p>
                                                社区第<span> {{ $user->id }} </span>位成员·加入时间：<?php Carbon::setLocale('zh'); echo $user->updated_at->toRfc2822String(); ?>
                                        </p>
                                </div>
                        </div>
                </div>   
                <div class="status_panel bc">
                        <ul class="bc_w">
                                <a><li class="tc_blue">最近</li></a>
                                <a href="ss"><li>发布</li></a>
                                <a href="ss"><li>回复</li></a>
                                <a href="ss"><li>收藏</li></a>
                        </ul>
                        @foreach($topics as $topic)
                        <div class="reply">
                                <div>
                                        <p class="ellipsis"><a href=""><问题问题问题问题问题问题问题问题问题问题问题问题问题问题问题问题问题问题问题问题问题问题？></a></p>
                                        <p><a href="" class="tc_blue">我的</a>回复：<span>回答回答</span></p>
                                </div>
                                <div>
                                        <span>2015/7/7</span>
                                </div>
                        </div>
                        @endforeach
                </div>                         
        </div> <!-- #main -->
        @include('sidebar')
</div>

<div class="footer-container">
        <footer class="">

        </footer>
</div>
</body>
</html>