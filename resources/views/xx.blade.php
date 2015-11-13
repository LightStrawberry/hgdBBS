<h1>{{ $topic->title }}</h1>
<p>{{ $topic->content }}</p>
@if($topic->tags)
	@foreach($topic->tags as $tag)
	    <li>{{ $tag->name }}</li>
	@endforeach
@endif
<br>
{{ $topic->node->name }}
{{ $topic->node->node }}
<br>
@if($topic->comments)
	@foreach($topic->comments as $comment)
		<p>{{ $comment->user->email }}</p>
		<img src="{{ $comment->user->avatar_path }}"/>
	    <p>{{ $comment->content }}</p>
	@endforeach
@endif

{!! Form::open(['url'=>'comment']) !!}
   <div class="form-group">
       {!! Form::label('content','评论:') !!}
       {!! Form::text('content',null,['class'=>'form-control']) !!}
   </div>
   {!! Form::hidden('topic_id', $topic->id) !!}
   {!! Form::hidden('number', $topic->comments->count()+1) !!}
   <div class="form-group">
       {!! Form::submit('回复',['class'=>'btn btn-success form-control']) !!}
   </div>
{!! Form::close() !!}

@if ($current_id == $topic->user_id)
	{!! Form::open(array('url' => 'topic/' . $topic->id, 'class' => 'pull-right')) !!}
        {!! Form::hidden('_method', 'DELETE') !!}
        {!! Form::submit('Delete this topic', array('class' => 'btn btn-warning')) !!}
    {!! Form::close() !!}
@endif