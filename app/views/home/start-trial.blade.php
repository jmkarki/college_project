@extends('default.home')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6 col-sm-12 col-lg-6 col-xs-12 app-col-md">
			<h3 style="color:#4d4d4d;line-height: 60px;"><strong>Start Trial. The step to experiment.</strong></h3>
			<h4 style="color:#4d4d4d; line-height: 33px;text-align:justify;">Access a self-service environment equipped, go into detail with the product exploration. We recommend that you go through the product, sales before using other environment that will allow you to generate other things.</h4>
			<p><h4 style="color:#4d4d4d; line-height: 23px;text-align:justify;">30 Days trial period is available for you.</h4></p>
			<p><h4 style="color:#4d4d4d; line-height: 23px;text-align:justify;"><!-- Get started with webo ERP.  -->It's your typical registration - It's fairly simple to complete.</h4></p>
		</div>
		<div class="col-md-6 col-sm-12 col-lg-6 col-xs-12 app-col-md">
			<p class="hidden-xs hidden-sm" style="margin-top:40px;"></p>			
			<div class="row app-row">
				<div class="col-md-4 col-sm-4 col-lg-4 col-xs-4 app-col-md"><label>Full Name:</label></div>
				<div class="col-md-8 col-sm-8 col-lg-8 col-xs-8 app-col-md"><input type="text" name="fullname" class="form-control trial-form-controlntrol" placeholder="Your Name"></div>
			</div>
			<div class="row app-row">
				<div class="col-md-4 col-sm-4 col-lg-4 col-xs-4 app-col-md"><label>Username:</label></div>
				<div class="col-md-8 col-sm-8 col-lg-8 col-xs-8 app-col-md"><input type="text" name="username" class="form-control trial-form-controlntrol" placeholder="Pick Username"></div>
			</div>
			<div class="row app-row">
				<div class="col-md-4 col-sm-4 col-lg-4 col-xs-4 app-col-md"><label>Email:</label></div>
				<div class="col-md-8 col-sm-8 col-lg-8 col-xs-8 app-col-md"><input type="text" name="email" class="form-control trial-form-controlntrol" placeholder="Email"></div>
			</div>
			<div class="row app-row">
				<div class="col-md-4 col-sm-4 col-lg-4 col-xs-4 app-col-md"><label>Password:</label></div>
				<div class="col-md-8 col-sm-8 col-lg-8 col-xs-8 app-col-md"><input type="password" name="password" class="form-control trial-form-controlntrol" placeholder="Create Password"></div>
			</div>
			<div class="row app-row">
				<div class="col-md-4 col-sm-4 col-lg-4 col-xs-4 app-col-md"><label>Confirm Password:</label></div>
				<div class="col-md-8 col-sm-8 col-lg-8 col-xs-8 app-col-md"><input type="password" name="repassword" class="form-control trial-form-controlntrol" placeholder="Confirm Password"></div>
			</div>
			<div class="row app-row">
				<div class="col-md-4 col-sm-4 col-lg-4 col-xs-4 app-col-md"><label>Company Name:</label></div>
				<div class="col-md-8 col-sm-8 col-lg-8 col-xs-8 app-col-md"><input type="text" name="repassword" class="form-control trial-form-controlntrol" placeholder="Company Name"></div>
			</div>
			<div class="row app-row">
				<div class="col-md-4 col-sm-4 col-lg-4 col-xs-4 app-col-md"><label>Country:</label></div>
				<div class="col-md-8 col-sm-8 col-lg-8 col-xs-8 app-col-md">
					<select class="chosen-select form-control">
						<option selected disabled>Select Country</option>
					</select>
				</div>
			</div>
			<div class="row app-row">
				<div class="col-md-4 col-sm-4 col-lg-4 col-xs-4 app-col-md"><label>Location:</label></div>
				<div class="col-md-8 col-sm-8 col-lg-8 col-xs-8 app-col-md"><textarea name="text" class="form-control trial-form-controlntrol" placeholder="Stree, City/Town"></textarea></div>
			</div>
			<div class="row app-row app-col-md">
				<div class="col-md-4 col-sm-4 col-lg-4 col-xs-4 app-col-md"></div>
				<div class="col-md-8 col-sm-8 col-lg-8 col-xs-8 app-col-md">
					<input type="checkbox" style="vertical-align: text-bottom;">
					<strong> <span>I accept the terms of service & privacy policy</span></strong>
				</div>
			</div>
			<p><hr></p>
			<div class="row app-row">
				<div class="col-md-4 col-sm-4 col-lg-4 col-xs-4 app-col-md"></div>
				<div class="col-md-8 col-sm-8 col-lg-8 col-xs-8 app-col-md">
					<button type="submit" class="btn btn-green pull-right btn-wide">Continue <i class="fa fa-angle-double-right"></i></button>
				</div>
			</div>
		</div>
	</div>
</div>
@stop