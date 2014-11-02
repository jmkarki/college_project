<!DOCTYPE html>
<html>
<head>
	<title>Welcome:: Home page...</title>
	<link rel="stylesheet" type="text/css" href="{{URL::to('assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{URL::to('assets/css/default.css')}}">
</head>
<body>
	<div class="wrapper">
		<div class="row app-header nav navbar nav-collapse">
			<div class="container">
				<div class="row">
					<div class="col-md-2">
						logo
					</div>
					<div class="col-md-6">
						<input type="search" class="form-control" placeholder="Site Search...">
					</div>
					<div class="col-md-4 pull-right" style="text-align: right;"><a href="{{URL::to('login/auth')}}" class="btn-green">Sign in</a></div>
				</div>
			</div>
		</div>
		<div class="body-content">
			<div class="container" style="height:400px; border:1px solid #dfdfdf;">
				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-6">some sweet text here</div>
					<div class="col-md-5">form</div>
				</div>
			</div>
			<br>
			<div class="container" style="height:400px; border:1px solid #dfdfdf;">
				<div class="row">
					<div class="col-md-4">plan 1</div>
					<div class="col-md-4">plan 2</div>
					<div class="col-md-4">plan 3</div>
				</div>
			</div>
		</div>
		<div class="row app-footer" style="text-align:center;">
			<div class="container">
				<span class="centered">
					&copy; 2014 - All rights reserved.
				</span>
			</div>
		</div>
	</div>
</body>
</html>