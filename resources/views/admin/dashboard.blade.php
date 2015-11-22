<h1>帖子：</h1>

@foreach($topics as $topic)

<p>{{ $topic->title }}</p>

@endforeach

<h1>用户：</h1>
@foreach($users as $user)

<p>{{ $user->name }}</p>
<a href="member/{{ $user->name }}/edit">编辑</a>
{!! Form::open(array('url' => 'user/' . $user->id, 'class' => 'pull-right')) !!}
    {!! Form::hidden('_method', 'DELETE') !!}
    {!! Form::submit('Delete', array('class' => 'btn btn-warning')) !!}
{!! Form::close() !!}

@endforeach

<h1>节点：</h1>
@foreach($nodes as $node)

<li>{{ $node->name }}</li>
<a href="node/{{ $node->node_url }}/edit">编辑</a>
{!! Form::open(array('url' => 'node/' . $node->id, 'class' => 'pull-right')) !!}
    {!! Form::hidden('_method', 'DELETE') !!}
    {!! Form::submit('Delete', array('class' => 'btn btn-warning')) !!}
{!! Form::close() !!}
@endforeach

<p>添加节点</p>
{!! Form::open(array('url' => 'node', 'method' => 'post')) !!}
   <div class="form-group">
       {!! Form::label('name','节点名:') !!}
       {!! Form::text('name', null ,['class'=>'form-control']) !!}
   </div>
   <div class="form-group">
       {!! Form::label('node_url','独特域名:') !!}
       {!! Form::text('node_url', null ,['class'=>'form-control']) !!}
   </div>
   <div class="form-group">
       {!! Form::label('description','描述:') !!}
       {!! Form::text('description', null ,['class'=>'form-control']) !!}
   </div>
   <div class="form-group">
       {!! Form::label('parent_id','父节点ID:') !!}
       {!! Form::text('parent_id', null ,['class'=>'form-control']) !!}
   </div>
   <a>7.资源 8.分享 9.交流 10.经验</a>
   <div class="form-group">
       {!! Form::submit('创建',['class'=>'btn btn-success form-control']) !!}
   </div>
{!! Form::close() !!}
