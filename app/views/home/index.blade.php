<!DOCTYPE html>
<html>
<head>
	<title>Welcome:: Home page...</title>
	<link rel="stylesheet" type="text/css" href="{{URL::to('assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{URL::to('assets/css/default.css')}}">
	<link rel="stylesheet" type="text/css" href="{{URL::to('assets/css/himanshu.css')}}">
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
						<!-- <input type="search" class="form-control" placeholder="Site Search..."> -->
					</div>
					<div class="col-md-4 pull-right" style="text-align: right;"><a href="{{URL::to('login/auth')}}" class="btn btn-success" style="padding: 4px 12px !important;">Sign in</a></div>
				</div>
			</div>
		</div>
		<div class="body-content">
			<div class="container" style="zoom: 102%;">
				<div class="row">
					<div class="col-md-7">some sweet text here</div>
					<div class="col-md-5">
 						      <form role="form">
						        <!-- <h3>Please Sign Up <small>It's free and always will be.</small></h3> -->
						        <!-- <hr class="colorgraph"> -->
						        <div class="row" >
						          <div class="col-xs-6 col-sm-6 col-md-6" style="padding-right: 1px !important;padding-left: 0px !important;">
						            <div class="form-group">
						              <input type="text" name="first_name" id="first_name" class="form-control " placeholder="First Name" tabindex="1">
						            </div>
						          </div>
						          <div class="col-xs-6 col-sm-6 col-md-6" style="padding-right: 0px !important;padding-left: 1px !important;">
						            <div class="form-group">
						              <input type="text" name="last_name" id="last_name" class="form-control " placeholder="Last Name" tabindex="2">
						            </div>
						          </div>
						        </div>
						        <div class="form-group">
						          <input type="text" name="display_name" id="display_name" class="form-control " placeholder="Pick a Username" tabindex="3">
						        </div>
						        <div class="form-group">
						          <input type="email" name="email" id="email" class="form-control " placeholder="Email Address" tabindex="4">
						        </div>
						        <div class="row">
						          <div class="col-xs-6 col-sm-6 col-md-6"style="padding-right: 1px !important;padding-left: 0px !important;">
						            <div class="form-group">
						              <input type="password" name="password" id="password" class="form-control " placeholder="Create a Password" tabindex="5">
						            </div>
						          </div>
						          <div class="col-xs-6 col-sm-6 col-md-6" style="padding-right: 1px !important;padding-left: 1px !important;">
						            <div class="form-group">
						              <input type="password" name="password_confirmation" id="password_confirmation" class="form-control " placeholder="Confirm Password" tabindex="6">
						            </div>						            
						          </div>
						          <span class="left-section">Use at least one lowercase letter, one numberal, and seven characters.</span>
						        </div>
						        <hr class="colorgraph">
						        <a href="#" class="btn btn-success btn-block" style="margin-bottom: 8px;"><strong>Sign Up &raquo;</strong></a>
						        <span class="right-section">By clicking "Sign Up", you agree to our <a href="#">terms of service</a> and <a href="#">privacy policy</a>. We will send your account related emails occasionally.</span>
						      </form>
						     <p></p>
					</div>
				</div>
			</div>
			<br>
			<div class="container">
			<div class="containera">
			  <div class="row">
			    <div class="col-md-12">
			      <div class="page-header " font=>
			     <h2>Choose Your Plan</h2>
			      </div>
			    </div>
			  </div>
			<div class="row">
			  <div class="col-md-4">
			  <div class="panel panel-danger">
			     <div class="panel-heading"><h3 class="text-center">Silver</h3></div>
			         <div class="panel-body text-center">
						<p class="lead" style="font-size:40px"><strong>$10 / month</strong></p>
					</div>
			                       <ul class="list-group list-group-flush text-center">
										<li class="list-group-item"><i class="icon-ok text-danger"></i> Personal use</li>
										<li class="list-group-item"><i class="icon-ok text-danger"></i> Unlimited projects</li>
										<li class="list-group-item"><i class="icon-ok text-danger"></i> 27/7 support</li>
									</ul>
			    <div class="panel-footer">
					<a class="btn btn-lg btn-block btn-danger" href="">BUY NOW!</a>
				</div>
			 </div>

			  </div>
			   <div class="col-md-4">
			  <div class="panel panel-info">
			     <div class="panel-heading"><h3 class="text-center">Gold</h3></div>
			         <div class="panel-body text-center">
						<p class="lead" style="font-size:40px"><strong>$10 / month</strong></p>
					</div>
			                       <ul class="list-group list-group-flush text-center">
										<li class="list-group-item"><i class="icon-ok text-danger"></i> Personal use <span class="glyphicon glyphicon-ok pull-right"></span></li>
										<li class="list-group-item"><i class="icon-ok text-danger"></i> Unlimited projects <span class="glyphicon glyphicon-remove pull-right"></span></li>
										<li class="list-group-item"><i class="icon-ok text-danger"></i> 27/7 support</li>
									</ul>
			    <div class="panel-footer">
					<a class="btn btn-lg btn-block btn-info" href="">BUY NOW!</a>
				</div>
			 </div>

			  </div>
			   <div class="col-md-4">
			  <div class="panel panel-success">
			    <div class="panel-heading"><h3 class="text-center">Platinum</h3></div>
			         <div class="panel-body text-center">
						<p class="lead" style="font-size:40px"><strong>$10 / month</strong></p>
					</div>
			                       <ul class="list-group list-group-flush text-center">
										<li class="list-group-item"><i class="icon-ok text-danger"></i> Personal use</li>
										<li class="list-group-item"><i class="icon-ok text-danger"></i> Unlimited projects</li>
										<li class="list-group-item"><i class="icon-ok text-danger"></i> 27/7 support</li>
									</ul>
			    <div class="panel-footer">
					<a class="btn btn-lg btn-block btn-success" href="">BUY NOW!</a>
				</div>
			 </div>

			  </div>
			  </div>
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