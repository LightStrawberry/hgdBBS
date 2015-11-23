<div class="sidebar fr">
        <p class="join bc">加入我们</p>
        @if (!Auth::check())
        <div class="login bc">
                <span>已经有帐号了？</span>
                <a href="{{ action('Auth\AuthController@getLogin')}}" class="tc_white bc_b"  >登&nbsp;&nbsp;&nbsp;录</a>
        </div>
        <div class="signup bc">
                <span>还没有帐号吗？</span>
                <a href="{{ action('Auth\AuthController@getRegister') }}" class="tc_white bc_b">注&nbsp;&nbsp;&nbsp;册</a>
        </div> <!-- 登录注册 -->
        @else
        <div class="login bc">
                <span>{{ Auth::user()->name }}</span>
                <img class="avatar" src="{{ Auth::user()->avatar_path }}" />
        </div>
        <div class="signup bc">
                <a href="{{ action('Auth\AuthController@getLogout')}}" class="tc_white bc_b">登&nbsp;&nbsp;&nbsp;出</a>
        </div>
        @endif
        <div class="weibo bc">
                <div class="weibo_head">
                        <img src="" />
                        <span class="tc_blue">湖工大在线</span>
                        <a href="#">关注</a>
                </div>
                <div class="weibo_container"> 
                        <p>这是内容</p>
                </div> <!-- 微博内容 -->
        </div> <!-- 微博展示 -->
        @if (Auth::check())
        <div class="publish bc_b tc_white">
                <a href="{{ action('TopicController@create')}}" class="tc_white">发布主题</a>
        </div><!-- 发布按钮 -->
        @endif
</div>