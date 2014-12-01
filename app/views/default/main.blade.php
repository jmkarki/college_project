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
      <div class="row">
        <div class="col-md-2 col-lg-2 col-sm-2 col-xs-2">

       <div class="logo-text">Webo</div>
        </div>
        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
        </div>
        <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4 pull-right" style="text-align: right;">
          @if(Auth::check())
			<div class="setting-nav">
		        <div data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          <img src="<?php echo $userDet['img'] ?>"> <span><?php echo $userDet['name'] ?></span>
		        </div>
		        <ul class="dropdown-menu setting-dropdown" role="menu" aria-labelledby="dLabel">
		          <div class="triangle-up"></div>
		          <li><a href="[[URL::to('/user/profile')]]">Profile</a></li>
		          <li><a href="[[URL::to('/logout')]]">Logout</a></li>
		        </ul>
		      </div>
			@endif
        </div>
      </div>
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