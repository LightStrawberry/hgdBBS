
@foreach($topics as $topic)
	<h2 class="post-title pad">
	    <a href="/topics/{{ $topic->id }}"> {{ $topic->title }}</a>
	</h2>
	<ul class="post-meta pad group">
	    <li><i class="fa fa-clock-o"></i></li>
	    @if($topic->tags)
	        @foreach($topic->tags as $tag)
	            <li>{{ $tag->name }}</li>
	        @endforeach
	    @endif
	</ul>
@endforeach