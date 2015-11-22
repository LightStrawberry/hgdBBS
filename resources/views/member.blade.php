{!! Html::style('css/select2.css') !!}
{!! Html::style('css/normalize.css') !!}
{!! Html::style('css/main.css') !!}
{!! Html::style('css/page_structure.css') !!}
{!! Html::script('js/jquery.js') !!}
{!! Html::script('js/select2.min.js') !!}

@include('header')
<div class="main_container wrapper clear">
	<div class="main">
		<div class="member_main bc">
			<div class="pic fr">
                <img class="avatar" src="{{ $user->avatar_path }}" alt="avatar">
            </div>
            <div class="clear">
				<h1>{{ $user->name }}</h1>
				<p>介绍：{{ $user->bio }}</p>
				<p>南湖呓语第{{ $user->id }}号会员</p>
				<p>hahaha</p>
			</div>
		</div>

		<div class="bc_w">
			<h1>帖子列表：</h1>
			<div>
				@foreach($topics as $topic)
				<ul>
					<li>{{ $topic->title }}</li>
				</ul>
				@endforeach
			</div>
		</div>
	</div>
	@include('sidebar')
</div>
