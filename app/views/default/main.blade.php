<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
 		{{HTML::style('assets/css/bootstrap.min.css')}}
 		{{HTML::style('assets/css/default.css')}}
 		{{HTML::style('assets/css/chosen.css')}}
<<<<<<< HEAD
 		{{HTML::style('assets/css/himanshu.css')}}
=======
 		{{HTML::style('assets/css/imageareaselect.css')}}
>>>>>>> e85f36403ef12953901591579f2ce99f122d37b6
</head>
<body>
<div class="wrapper">
	<div class="row app-header nav navbar">
		<div class="container">
			@if(Auth::check())
			<a href="{{URL::to('logout')}}" class="btn-green pull-right">Logout</a>
			@endif
		</div>		
	</div>
	<div class="body-content">
		<div class="container">
			<div class="row body-content-row">
				<div class="col-md-2 col-sm-3">
					<div class="sidebar">
						<div class="profile">							
							@include('include.sidebar')							
						</div>
					</div>	
				</div>
				<div class="col-md-10 col-sm-9" style="padding:0;">
					<div class="content">
					@yield('content')
					</div>
				</div>
			</div>
		</div>	
	</div>
	@include('include.footer')
</div>
	{{HTML::script('assets/js/jquery.js')}}
	{{HTML::script('assets/js/bootstrap.js')}}
	{{HTML::script('assets/js/chosen.jquery.js')}}
	{{HTML::script('assets/js/imagearea.jquery.js')}}
	{{HTML::script('assets/js/custom.js')}}
	{{HTML::script('assets/js/validator.js')}}

@yield('script')
</body>
</html>