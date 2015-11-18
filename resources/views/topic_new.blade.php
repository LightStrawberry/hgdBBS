{!! Html::style('css/select2.css') !!}
{!! Html::style('css/normalize.css') !!}
{!! Html::style('css/main.css') !!}
{!! Html::style('css/page_structure.css') !!}
{!! Html::style('css/posts.css') !!}
{!! Html::script('js/jquery.js') !!}
{!! Html::script('js/select2.min.js') !!}
{!! Html::script('js/index.js') !!}

@include('header')
<div class="main_container wrapper clear">
  <div class="main">
    {!! Form::open(['url'=>'topic']) !!}
    <div class="post_main bc ">
      <ul class="clear">
        <li>社区></li>
        <li>发帖></li>
        <li>主题</li>
      </ul>
      <div class="p_title">
        <ul class="clear">
          <li >{!! Form::select('node',$nodes,null,['class'=>'js-example-placeholder-single']) !!}</li>
          <li >{!! Form::select('tag_list',$tags,null,['class'=>'js-example-placeholder-single2','multiple'=>'multiple']) !!}</li>
          <li >{!! Form::text('title',null,['class'=>'form-title']) !!}</li>
        </ul>
      </div>
    </div>
    <div class="reply_edit publish_edit">
      <div class="head">编辑器</div>
      {!! Form::textarea('content',null,['class'=>'form-control']) !!}
      {!! Form::submit('发表',['class'=>'bc_b tc_white  fs_middle']) !!}
    </div>
    {!! Form::close() !!}
    @if($errors->any())
    <ul class="alert alert-danger">
      @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
    @endif
  </div> <!-- #main -->
  @include('sidebar_topic')
</div> <!-- #main-container -->
<div class="footer-container">
  <footer class="">
  </footer>
</div>