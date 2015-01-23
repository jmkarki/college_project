@extends('default.home')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6 col-sm-12 col-lg-6 col-xs-12 app-col-md">
			<h3 style="color:#4d4d4d;line-height: 60px;"><strong>Quick and easy &amp; secure.</strong></h3>
			<h4 style="color:#4d4d4d; line-height: 40px;text-align:justify;">Millions of customers around the world use us for one simple reason: it’s simple. Just an email address and password will get you through to checkout before you can reach for your data.</h4>
			<p><h4 class="note-text" style="line-height: 28px !important;"><b>Make a payment without sharing your financial information with no body. It's simple, faster and more secure.</b></h4></p>
			<p><b><h4 class="note-text"><i class="fa fa-caret-right"></i> Your business data, in a good place.</h4></b></p>
		</div>
		<div class="hidden-md hidden-lg visible-xs visible-sm"><hr></div>
 		<div class="col-md-6 col-sm-12 col-lg-6 col-xs-12 app-col-md register-premium-form">
			<p class="hidden-xs hidden-sm" style="margin-top:40px;"></p>
			[[Form::open(array('url'=>'register/payment'))]]			
			<div class="row app-row">
				<div class="col-md-4 col-sm-4 col-lg-4 col-xs-4 app-col-md"><label>Full Name:</label></div>
				<div class="col-md-8 col-sm-8 col-lg-8 col-xs-8 app-col-md"><input type="text" name="fullname"  value="[[Input::old('fullname')]]" class="form-control register-form-control fullname" placeholder="Your Name">
					<span class="error-msg-fullname text-danger">[[$errors->first('fullname')]]</span></div>
			</div>
			<div class="row app-row">
				<div class="col-md-4 col-sm-4 col-lg-4 col-xs-4 app-col-md"><label>Username:</label></div>
				<div class="col-md-8 col-sm-8 col-lg-8 col-xs-8 app-col-md"><input type="text" name="username" value="[[Input::old('username')]]" class="form-control register-form-control username" placeholder="Pick Username">
					<span class="error-msg-username text-danger">[[$errors->first('username')]]</span></div>
			</div>
			<div class="row app-row">
				<div class="col-md-4 col-sm-4 col-lg-4 col-xs-4 app-col-md"><label>Email:</label></div>
				<div class="col-md-8 col-sm-8 col-lg-8 col-xs-8 app-col-md"><input type="text" name="email" value="[[Input::old('email')]]" class="form-control register-form-control email" placeholder="Email">
					<span class="error-msg-email text-danger">[[$errors->first('email')]]</span>
				</div>
			</div>
			<div class="row app-row">
				<div class="col-md-4 col-sm-4 col-lg-4 col-xs-4 app-col-md"><label>Password:</label></div>
				<div class="col-md-8 col-sm-8 col-lg-8 col-xs-8 app-col-md"><input type="password" name="password" class="form-control register-form-control password" placeholder="Create Password">
					<span class="error-msg-password text-danger">[[$errors->first('password')]]</span>
				</div>
			</div>
			<div class="row app-row">
				<div class="col-md-4 col-sm-4 col-lg-4 col-xs-4 app-col-md"><label>Confirm Password:</label></div>
				<div class="col-md-8 col-sm-8 col-lg-8 col-xs-8 app-col-md"><input type="password" name="repassword" class="form-control register-form-control repassword" placeholder="Confirm Password">
					<span class="error-msg-repassword text-danger">[[$errors->first('repassword')]]</span>
				</div>
			</div>
			<div class="row app-row">
				<div class="col-md-4 col-sm-4 col-lg-4 col-xs-4 app-col-md"><label>Company Name:</label></div>
				<div class="col-md-8 col-sm-8 col-lg-8 col-xs-8 app-col-md"><input type="text" name="company_name" value="[[Input::old('company_name')]]" class="form-control register-form-control company_name" placeholder="Company Name">
					<span class="error-msg-company text-danger">[[$errors->first('company_name')]]</span>
				</div>
			</div>
			<div class="row app-row">
				<div class="col-md-4 col-sm-4 col-lg-4 col-xs-4 app-col-md"><label>Country:</label></div>
				<div class="col-md-8 col-sm-8 col-lg-8 col-xs-8 app-col-md">
					<select class="chosen-select form-control choose_country" name="country">
						@include('include.country-list')
 					</select>
 					<span class="error-msg-country text-danger">[[$errors->first('country')]]</span>
				</div>
			</div>
			<div class="row app-row">
				<div class="col-md-4 col-sm-4 col-lg-4 col-xs-4 app-col-md"><label>URL:</label></div>
				<div class="col-md-8 col-sm-8 col-lg-8 col-xs-8 app-col-md"><input type="text" value="[[Input::old('url')]]" name="url" class="form-control trial-form-control url" placeholder="Web URL">
					<span class="error-msg-url text-danger">[[$errors->first('url')]]</span>
				</div>
			</div>
			<div class="row app-row">
				<div class="col-md-4 col-sm-4 col-lg-4 col-xs-4 app-col-md"><label>Location:</label></div>
				<div class="col-md-8 col-sm-8 col-lg-8 col-xs-8 app-col-md"><textarea name="location" class="form-control register-form-control location" placeholder="Stree, City/Town">[[Input::old('location')]]</textarea>
					<span class="error-msg-location text-danger">[[$errors->first('location')]]</span>
				</div>
			</div>
			<div class="row app-row">
				<div class="col-md-4 col-sm-4 col-lg-4 col-xs-4 app-col-md"><label>Plan:</label></div>
				<div class="col-md-8 col-sm-8 col-lg-8 col-xs-8 app-col-md">
					<select class="form-control chosen-select" name="plan">
						@foreach($plans as $each)
							<option value="[[$each->id]]" [[( $each->id == $plan) ? 'selected' : '']]> [[$each->name]] $[[$each->amount]] /Month</option>
						@endforeach
					</select>
					<span class="error-msg-location text-danger">[[$errors->first('location')]]</span>
				</div>
			</div>
			<div class="row app-row" style="padding:10px 0">
				<div class="col-md-4 col-sm-4 col-lg-4 col-xs-4 app-col-md"><label>Pay with:</label></div>
				<div class="col-md-8 col-sm-8 col-lg-8 col-xs-8 app-col-md">
					<input type="radio" value="paypal" checked name="payment"> <img class="pay-paypal" src="[[URL::to('assets/images/ppcom.svg')]]"> 
					<!-- <input type="radio" value="stripe" name="payment"> <img class="pay-stripe" src="[[URL::to('assets/images/stripe-logo.png')]]"> -->
				</div>
			</div>

			<div class="row app-row app-col-md">
				<div class="col-md-4 col-sm-4 col-lg-4 col-xs-4 app-col-md"></div>
				<div class="col-md-8 col-sm-8 col-lg-8 col-xs-8 app-col-md">
					<input type="checkbox" id="terms" style="vertical-align: text-bottom;" class="i-accept">
					<label for="terms" class="terms">I accept the terms of service &amp; privacy policy.</label>
					<span class="error-msg-terms text-danger"></span>
				</div>
			</div>			
			<div class="hidden-sm hidden-xs visible-md visible-lg"><hr></div>
 			<div class="row app-row">
				<div class="col-md-4 col-sm-4 col-lg-4 col-xs-4 app-col-md"></div>
				<div class="col-md-8 col-sm-8 col-lg-8 col-xs-8 app-col-md">
					<div class="hidden-md hidden-lg visible-xs visible-sm"><hr></div>
 					<button type="submit" class="btn btn-green pull-right btn-wide register-premium-btn">Continue <i class="fa fa-angle-double-right"></i></button>
				</div>
			</div>
			[[Form::close()]]
		</div>
	</div>
</div>
<div class="hidden-md hidden-lg visible-xs visible-sm"><hr></div>
<input type="hidden" class="email-check">
<input type="hidden" class="username-check">
@stop