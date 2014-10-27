<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	{{HTML::style('assets/css/bootstrap.min.css')}}
	{{HTML::style('assets/css/default.css')}}
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
{{HTML::script('assets/js/custom.js')}}
@yield('script')
</body>
</html>