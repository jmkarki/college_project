<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	{{HTML::style('assets/css/bootstrap.css')}}
	{{HTML::style('assets/css/default.css')}}
</head>
<body>
	<div class="row">
		@yield('content')
	</div>
	{{HTML::script('assests/js/jquery.js')}}
	@yield('scripts')
</body>
</html>