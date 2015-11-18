{!! Html::style('css/normalize.css') !!}
{!! Html::style('css/main.css') !!}
{!! Html::style('css/page_structure.css') !!}
{!! Html::script('js/jquery.js') !!}

@include('header')
<div class="main_container wrapper clear">
        <div class="main bc">
                <ul class="first_tag tag_list clear pd_lm">
                        @foreach($tabs as $tab)
                        <li><a href="?tab={{ $tab->node_url }}">{{ $tab->name }}</a></li>
                        @endforeach
                </ul>
                <ul class="second_tag bc_w tag_list  clear pd_lm">
                        @foreach($nodes as $node)
                        @if($node->parent_id != 0)
                        <li><a href="node/{{ $node->node_url }}">{{ $node->name }}</a></li>
                        @endif
                        @endforeach
                </ul>
                <div class="topic_body">
                        @foreach($topics as $topic)
                        <div class="topic media ">
                                <div class=" media_left pd_s">
                                        <a href=""><img class="media-object avatar" src="{{ $topic->user->avatar_path }}" alt="1107"></a>
                                </div>
                                <div class="infos media_body">
                                        <div class=" media_heading">
                                                <a title="" href="topic/{{ $topic->id }}">{{ $topic->title }}</a>
                                        </div>
                                        <div class="info">
                                                <a class="tag tc_dark_grey bc_b" href="">{{ $topic->node->name }}</a>
                                                发布
                                                <a  href="" class="tc_dark_grey">{{ $topic->user->name }}</a>
                                                <span class="hidden-mobile">
                                                        最后回复 <a  href="" >{{ $topic->comments->count() }}</a> <abbr ><?php 
                                                        Carbon::setLocale('zh');
                                                        echo $topic->updated_at->diffForHumans(Carbon::now());
                                                        ?></abbr>
                                                </span>
                                        </div>
                                </div>
                                <div class="count media_right pd_rs  ">
                                        <a  class="bc_b tc_white">{{ $topic->comments->count() }}</a>
                                </div>
                        </div>
                        @endforeach                          

                        <div class="topic_footer clear">
                                <ul class="pagination clear">
                                        <li class="prev previous_page disabled"><a href="#">← Prev</a></li>
                                        <li class="active"><a rel="start" href="/topic?page={{ $topic_page['current_page'] }}">{{ $topic_page['current_page'] }}</a></li> 
                                        <li><a rel="next" href="/?tab={{ $tab_active }}&page={{ $topic_page['current_page']+1 }}">{{ $topic_page['current_page']+1 }}</a></li>
                                        <li><a href="/?tab={{ $tab_active }}&page=3">{{ $topic_page['current_page']+2 }}</a></li> 
                                        <li><a href="/?tab={{ $tab_active }}&page=4">{{ $topic_page['current_page']+3 }}</a></li>
                                        <li><a href="/?tab={{ $tab_active }}&page=5">{{ $topic_page['current_page']+4 }}</a></li>
                                        <li class="disabled"><a href="#">…</a></li> 
                                        <li><a href="/topic?page=68">68</a></li> 
                                        <li><a href="/topic?page=69">69</a></li>
                                        <li class="next next_page ">
                                                <a rel="next" href="/topics?page=2">Next →</a></li></ul>
                                        </div>
                                </div>
                        </div> <!-- #main -->
                        @include('sidebar')
                </div> <!-- #main-container -->
                <div class="footer-container">
                        <footer class="">

                        </footer>
                </div>