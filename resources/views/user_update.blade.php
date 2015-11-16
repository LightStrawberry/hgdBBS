{!! Form::open(array('url' => 'user/update', 'method' => 'put')) !!}

   <div class="form-group">
       {!! Form::label('name','用户名:') !!}
       {!! Form::text('name',$user->name,['class'=>'form-control']) !!}
   </div>
   <div class="form-group">
       {!! Form::label('bio','签名:') !!}
       {!! Form::text('bio',$user->bio,['class'=>'form-control']) !!}
   </div>
   <div class="form-group">
       {!! Form::label('password','密码:') !!}
       {!! Form::text('password',null ,['class'=>'form-control']) !!}
   </div>
   {!! Form::hidden('id', $user->id) !!}
   <div class="form-group">
       {!! Form::submit('更新',['class'=>'btn btn-success form-control']) !!}
   </div>
{!! Form::close() !!}