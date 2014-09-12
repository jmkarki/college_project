@extends('default.default')
@section('content')
<div class="container">
	<div class="login-data">
		<h2>User Authentication!</h2>
		{{Form::open(array('url' => 'login/authenticate'))}}
		<table class="table table-responsive">
			<tbody>
				<tr>
					<td>{{ Form::label("username", "Username") }}</td>
					<td>{{ Form::text("username", Input::old("username"), array('class' => 'form-control','id' =>'username')) }}</td>
				</tr>
				<tr>
					<td>{{ Form::label("password", "Password",array('class' => 'app-label')) }}</td>
					<td>{{ Form::password('password',array('class' => 'form-control','id'=> 'password')) }}</td>
				</tr>
				<tr>
					<td class="app-label">Remeber me</td>
					<td>{{Form::checkbox('remember',1,true)}}</td>
				</tr>
				<tr>
					<td></td>
					<td>{{ Form::submit('Login &raquo;',array('class' => 'btn btn-default login-btn')) }}</td>
				</tr>		
				<span id="error-text" class="app-label"></span>
			</tbody>
		</table>
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