<div class="header_container wrapper mg_bm">
	<header >
		<nav  class="clear">
			<ul  class="nav_left">
				<li><a href="{{ action('TopicController@index')}}" class="tc_blue">社区</a></li>
				<li><a href="http://nav.hgdonline.net">导航</a></li>
				<li><a href="#">微博</a></li>
			</ul>
			<ul class="nav_right">
				<li>
					<a href="">
						<form class="" action="???" method="GET">
							<div class="form_group">
								<input  class="form_control" name="q" type="text" value="" placeholder="搜索本站内容">
							</div>

						</form>
					</a>
				</li>
				@if (Auth::check())
				<li><a href="#">{{ Auth::user()->name }}</a></li>
				<li><a href="{{ action('Auth\AuthController@getLogout')}}">登出</a></li>
				@else
				<li><a href="login">登录</a></li>
				<li><a href="register">注册</a></li>
				@endif
			</ul>
		</nav>
	</header>
</div>