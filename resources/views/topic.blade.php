

{!! Html::style('css/select2.css') !!}
{!! Html::script('js/jquery.js') !!}
{!! Html::script('js/select2.min.js') !!}
{!! Html::script('js/index.js') !!}

{!! Form::open(['url'=>'topic']) !!}
  <div class="form-group">
    {!! Form::label('title','title:') !!}
    {!! Form::text('title',null,['class'=>'form-control']) !!}
  </div>
  <div class="form-group">
    {!! Form::label('content','content:') !!}
    {!! Form::textarea('content',null,['class'=>'form-control']) !!}
  </div>
  <div class="form-group">
        {!! Form::label('tag_list','选择标签') !!}
        {!! Form::select('tag_list[]',$tags,null,['class'=>'form-control js-example-basic-multiple','multiple'=>'multiple']) !!}
  </div>
  <div class="form-group">
    {!! Form::submit('发表',['class'=>'btn btn-success form-control']) !!}
  </div>
{!! Form::close() !!}