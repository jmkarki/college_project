<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	{{HTML::style('assets/css/bootstrap.css')}}
	{{HTML::style('assets/css/default.css')}}
</head>
<body>
	<div class="row row-fluid">
		@yield('content')
	</div>
	{{HTML::script('assets/js/jquery.js')}}
	{{HTML::script('assets/js/custom.js')}}
	@yield('script')
</body>
</html>