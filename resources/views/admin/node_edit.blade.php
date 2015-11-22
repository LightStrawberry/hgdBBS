{!! Form::open(array('url' => 'node/'.$node->id, 'method' => 'put')) !!}
   <div class="form-group">
       {!! Form::label('name','节点名:') !!}
       {!! Form::text('name', $node->name ,['class'=>'form-control']) !!}
   </div>
   <div class="form-group">
       {!! Form::label('node_url','独特域名:') !!}
       {!! Form::text('node_url', $node->node_url ,['class'=>'form-control']) !!}
   </div>
   <div class="form-group">
       {!! Form::label('description','描述:') !!}
       {!! Form::text('description', $node->description ,['class'=>'form-control']) !!}
   </div>
   <div class="form-group">
       {!! Form::label('parent_id','父节点ID:') !!}
       {!! Form::text('parent_id', $node->parent_id ,['class'=>'form-control']) !!}
   </div>
   <a>7.资源 8.分享 9.交流 10.经验</a>
   <div class="form-group">
       {!! Form::submit('更新',['class'=>'btn btn-success form-control']) !!}
   </div>
{!! Form::close() !!}