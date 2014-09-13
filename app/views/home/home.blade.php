@extends('default.main')
@section('content')
<div class="container">
	<h2>This is a home page</h2>
	<a href="{{URL::to('logout')}}" class="btn btn-green">Logout</a>
			<!-- {{Form::submit('Sign in &raquo;',array('class' => 'btn btn-green login-btn btn-block'))}} -->

</div>
@stop