<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
 		[[HTML::style('assets/css/bootstrap.min.css')]]
 		[[HTML::style('assets/css/default.css')]]
 		[[HTML::style('assets/css/chosen.css')]]
  		[[HTML::style('assets/css/himanshu.css')]]
  		[[HTML::style('assets/css/imageareaselect.css')]]
  		[[HTML::style('assets/css/font-awesome.min.css')]]
  		[[HTML::style('assets/css/datepicker.css')]]
  		[[HTML::style('assets/css/test.css')]]
   		<link href="[[URL::to('assets/images/favicon.ico')]]" rel="icon" type="image/x-icon" />
 </head>
<body>
<div class="wrapper">
	<div class="row app-header nav navbar">
		<div class="container">
			@if(Auth::check())
			<a href="[[URL::to('logout')]]" class="logout-link pull-right"><i class="fa fa-sign-out"></i> Logout</a>
			@endif
		</div>		
	</div>
	<div class="body-content">
		<div class="container">
			<div class="row body-content-row row-margin-right row-margin-left">
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
	[[HTML::script('assets/js/jquery.js')]]
	[[HTML::script('assets/js/bootstrap.min.js')]]
	[[HTML::script('assets/js/chosen.jquery.js')]]
	[[HTML::script('assets/js/imagearea.jquery.js')]]
	[[HTML::script('assets/js/bootstrap-datepicker.js')]]
	[[HTML::script('assets/js/jquery.validator.min.js')]]
	[[HTML::script('assets/js/custom.js')]]
	[[HTML::script('assets/js/validator.js')]]
	[[HTML::script('assets/js/product.js')]] 
	[[HTML::script('assets/js/image-crop.js')]]
	[[HTML::script('assets/js/google-chart-api.js')]]
	[[HTML::script('assets/js/product-list.js')]]
	[[HTMl::script('assets/js/update-product-list.js')]]
@yield('script')
</body>
</html>