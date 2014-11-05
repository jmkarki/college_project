@extends('default.default')
@section('content')
<div class="container">
	<div class="row" style="width:340px !important; margin:auto;">
 		{{Form::open(array('url' => 'login/authenticate','class'=>'form-signin mg-btm','style'=>'margin:auto;'))}}
	    	<h3 class="heading-desc">Sign In</h3>
 			<!-- <div class="social-box">
 	             <div class="row col-md-12">
	                <img src="{{URL::to('assets/images/logoo.jpg')}}">
				</div>
 			</div> -->
			<div class="main">	        
				<input type="text" class="form-control" value="{{Input::old('username')}}" name="username" class="username" placeholder="Email / Username" autofocus>
				<span class="text-danger">{{$errors->first('username')}}</span>
		        <input type="password" class="form-control" class="password" name="password" placeholder="Password">
		        <span class="text-danger">{{$errors->first('password')}}</span>		 
				 
		        <br>Are you a business? <a href=""> Get started here</a>
				<span class="clearfix"></span>
				<span class="app-label text-danger">{{$error}}</span>	
	        </div>
			<div class="login-footer">
				<div class="row">
		            <div class="col-xs-8 col-md-8">
		                <div class="left-section">
							<a href="">Forgot your password?</a>
							<!-- <a href="">Sign up now</a> -->
						</div>
		            </div>
			        <div class="col-xs-4 col-md-4 pull-right">
			            <button type="submit" class="btn btn-large btn-success pull-right login-btn">Sign in &raquo;</button>
			        </div>
		        </div>			
			</div>
      {{Form::close()}}
	</div>
</div>
</div>
@stop
@section('script')
<script type="text/javascript">
	$(document).ready(function(){
		$('.login-btn').click(function(){
			var username = $('.username').val();
			var password = $('.password').val();
			if(username == ''){
				//$('.error-text').html('Username is required.');
				$('.username').focus().addClass('error-border');
				return false;
			}else if(password == ''){
				//$('.error-text').html('Password is required.');
				$('.password').focus().addClass('error-border');
				return false;
			}else{
				$('.username, .password').removeClass('error-border');
				return true;
			}
		});
	});
</script>
@stop