{!! Html::style('css/style.css') !!}
@extends('index')

<div class="header">
	<nav class="navbar navbar-inverse navbar-static-top navbar-default">
	      <div class="container">
	        <div class="navbar-header" id="navbar-header" data-turbolinks-permanent="">
	        	<a href="/" class="navbar-brand"><b>南湖</b>呓语</a>
	        </div>

	        <span id="main-nav-menu" data-turbolinks-temporary="">
	        	<ul class="nav navbar-nav">
		        	<li class="active"><a href="/topics">社区</a></li>
		        	<li class=""><a href="/">导航</a></li>
		        	<li class=""><a href="/">微博</a></li>
	        	</ul>
	        </span>

	        <ul class="nav user-bar navbar-nav navbar-right">
	  <li><a href="/user/register">注册</a></li>
	  <li><a href="/user/login">登录</a></li>
	</ul>


	<ul class="nav navbar-nav navbar-right">
	    <li class="nav-search hidden-xs">
	        <form class="navbar-form form-search" action="/search" method="GET">
	           	<div class="form-group">
	            	<input class="form-control" name="q" type="text" value="" placeholder="搜索本站内容">
	           	</div>
	            <i class="fa btn-search fa-search"></i>
	            <i class="fa btn-close fa-times-circle"></i>
	        </form>
	    </li>
	</ul>
	</div>
	</nav>
</div>