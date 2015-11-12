<header class="profile-header">
<div id="validation-errors"></div>

<div class="avatar-upload" id="avatar-upload">
 {!! Form::open( [ 'url' => ['/avatar/upload/'], 'method' => 'POST', 'id' => 'upload', 'files' => true ] ) !!}
<a href="#" class="btn button-change-profile-picture">
<label for="upload-profile-picture">
<span id="upload-avatar">更换新头像</span>
 <input name="image" id="image" type="file" class="manual-file-chooser js-manual-file-chooser js-avatar-field">
</label>
</a>
<div class="form-group">
       {!! Form::submit('更新',['class'=>'btn btn-success form-control']) !!}
</div>
{!! Form::close() !!}


<div class="span5">
<div id="output" style="display:none">
</div>
</div>

<span id="filename"></span>
 </header>