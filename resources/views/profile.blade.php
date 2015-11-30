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
                                <a href="?tab=recent"><li @if($tab == 'recent') class="tc_blue" @endif>最近</li></a>
                                <a href="?tab=publish"><li @if($tab == 'publish') class="tc_blue" @endif>发布</li></a>
                                <a href="?tab=response"><li @if($tab == 'response') class="tc_blue" @endif>回复</li></a>
                                <a href="?tab=like"><li @if($tab == 'like') class="tc_blue" @endif>收藏</li></a>
                        </ul>
                        @if($tab != 'response')
                        @foreach($responses as $response)
                        <div class="reply">
                                <div>
                                        <p class="ellipsis"><a href="">{{ $response->title }}</a></p>
                                </div>
                                <div>
                                        <span>{{ $response->updated_at }}</span>
                                </div>
                        </div>
                        @endforeach
                        @else
                        @foreach($responses as $response)
                        <div class="reply">
                                <div>
                                        <p class="ellipsis"><a href="">帖子：{{ $response->topic->title }}</a></p>
                                        <p><a href="" class="tc_blue">我的</a>回复：<span>{{ $response->content }}</span></p>
                                </div>
                                <div>
                                        <span>{{ $response->updated_at }}</span>
                                </div>
                        </div>
                        @endforeach
                        @endif
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