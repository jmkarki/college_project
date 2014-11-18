<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
 		[[HTML::style('assets/css/bootstrap.min.css')]]
 		[[HTML::style('assets/css/default.css')]]
 		[[HTML::style('assets/css/chosen.css')]]
  		[[HTML::style('assets/css/himanshu.css')]]
  		[[HTML::style('assets/css/imageareaselect.css')]]
  		<link href="[[URL::to('assets/images/fabicon o.ico')]]" rel="icon" type="image/x-icon" />
</head>
<body>
	<div class="row row-fluid">
		@yield('content')
	</div>
	[[HTML::script('assets/js/jquery.js')]]
	[[HTML::script('assets/js/bootstrap.min.js')]]
	[[HTML::script('assets/js/chosen.jquery.js')]]
	[[HTML::script('assets/js/imagearea.jquery.js')]]
	[[HTML::script('assets/js/custom.js')]]
	[[HTML::script('assets/js/validator.js')]]
	@yield('script')
</body>
</html>