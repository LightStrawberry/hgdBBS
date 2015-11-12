<h1>{{ $topic->title }}</h1>
<p>{{ $topic->content }}</p>
@if($topic->tags)
	@foreach($topic->tags as $tag)
	    <li>{{ $tag->name }}</li>
	@endforeach
@endif

{!! Form::open(['url'=>'comment']) !!}
   <div class="form-group">
       {!! Form::label('comment','评论:') !!}
       {!! Form::text('comment',null,['class'=>'form-control']) !!}
   </div>
   {!! Form::hidden('id', $current_id) !!}
   <div class="form-group">
       {!! Form::submit('回复',['class'=>'btn btn-success form-control']) !!}
   </div>
{!! Form::close() !!}