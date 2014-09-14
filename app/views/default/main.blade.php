<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	{{HTML::style('assets/css/bootstrap.css')}}
	{{HTML::style('assets/css/default.css')}}
</head>
<body>
	<div class="row app-header nav navbar">
		<div class="container">
			@if(Auth::check())
			<a href="{{URL::to('logout')}}" class="btn-green pull-right">Logout</a>
			@endif

		</div>		
	</div>
	<div class="row app-container">
		<div class="container">
			@yield('content')
		</div>	
	</div>
	@include('include.footer')
	{{HTML::script('assests/js/jquery.js')}}
	@yield('scripts')
</body>
</html>