@include('header')

{!! Form::open(['url'=>'register']) !!}
   <div class="form-group">
       {!! Form::label('email','账号:') !!}
       {!! Form::text('email',null,['class'=>'form-control']) !!}
   </div>
   <div class="form-group">
       {!! Form::label('name','用户名:') !!}
       {!! Form::text('name',null,['class'=>'form-control']) !!}
   </div>
   <div class="form-group">
       {!! Form::label('password','密码:') !!}
       {!! Form::text('password',null,['class'=>'form-control']) !!}
   </div>
   <div class="form-group">
       {!! Form::submit('注册',['class'=>'btn btn-success form-control']) !!}
   </div>
{!! Form::close() !!}