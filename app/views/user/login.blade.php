@extends('default.default')
@section('content')
<div class="container">
	<div class="login-data">
		<h3 style="border-bottom:1px solid #fff;">Sign in</h3>
		{{Form::open(array('url' => 'login/authenticate'))}}
		{{Form::label("username", "Username")}}<br>
		{{Form::text("username", Input::old("username"), array('class' => 'form-control','id' =>'username','placeholder'=>'Email / username'))}}
		@if($errors->has('username'))
		{{$errors->first('username')}}
		@endif
		{{Form::label("password", "Password",array('class' => 'app-label'))}}<br>
		{{Form::password('password',array('class' => 'form-control','id'=> 'password','placeholder'=>'Password'))}}<br>
		@if($errors->has('password'))
		{{$errors->first('password')}}
		@endif
		{{Form::checkbox('remember',1,true,array('id'=>'remember'))}}
		{{Form::label('remember','Remember me')}}<br>
		{{Form::submit('Sign in &raquo;',array('class' => 'btn btn-default login-btn btn-block'))}}
		{{ HTML::link('', 'Forgot password ?', array('class' => 'wlink'))}}
		<span id="error-text" class="app-label">{{$error}}</span>
		{{Form::close()}}
	</div>
</div>
@stop
@section('scripts')
<script type="text/javascript">
	$(document).ready(function(){
		$('.login-btn').click(function(){
			var username = $('#username').val();
			var password = $('#password').val();
			if(username === ''){
				$('#error-text').html('Username is required.');
				$('#username').focus();
				return false;
			}else if(password === ''){
				$('#error-text').html('Password is required.');
				$('#password').focus();
				return false;
			}else{
				$('#error-text').html('');
				return true;
			}
		});
	});
</script>
@stop