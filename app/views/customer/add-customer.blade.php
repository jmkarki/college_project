@if(Session::has('message'))
<div class="alert alert-success">
	[[Session::get('message')]]
	<a href="" class="pull-right alert-close tiny"><span class="glyphicon glyphicon-remove"></span></a>
</div>
@endif
	[[Form::open(array('url'=>'customer/store'))]]
	<div class="row app-row">
	<div class="col-md-4">
		<label>Name</label>
	</div>
	<div class="col-md-7">
		<input type="text" class="form-control customer_name" value="[[Input::old('customer_name')]]" name="customer_name" placeholder="Name">
		[[$errors->first('customer_name')]]
		<span class="tiny-error-name none"></span>
	</div>
</div>
<div class="row app-row">
	<div class="col-md-4">
		<label>Address Line1</label>
	</div>
	<div class="col-md-7">
		<!-- <input type="text" class="form-control customer_address" name="customer_address"> -->
		<textarea rows="2" class="form-control addressline1" value="[[Input::old('addressline1')]]" name="addressline1" placeholder="Address Line 1"></textarea>
		[[$errors->first('addressline1')]]
		<span class="tiny-error-address none"></span>
	</div>
</div>
<div class="row app-row">
	<div class="col-md-4">
		<label>Address Line2</label>
	</div>
	<div class="col-md-7">
		<!-- <input type="text" class="form-control customer_address" name="customer_address"> -->
		<textarea rows="2" class="form-control addressline2" value="[[Input::old('addressline2')]]" name="addressline2" placeholder="Address Line 2"></textarea>
		[[$errors->first('addressline2')]]
		<span class="tiny-error-address none"></span>
	</div>
</div>
<div class="row app-row">
	<div class="col-md-4">
		<label>Phone (Landline)</label>
	</div>
	<div class="col-md-7">
		<input type="text" class="form-control phone" value="[[Input::old('phone')]]" name="phone" placeholder="Landline">
		[[$errors->first('phone')]]
		<span class="tiny-error-phone none"></span>
	</div>
</div>
<div class="row app-row">
	<div class="col-md-4">
		<label>Mobile</label>
	</div>
	<div class="col-md-7">
		<input type="text" class="form-control mobile" value="[[Input::old('mobile')]]" name="mobile" placeholder="Mobile">
		[[$errors->first('mobile')]]
		<span class="tiny-error-mobile none"></span>
	</div>
</div>
<div class="row app-row">
	<div class="col-md-4">
		<label>Email</label>
	</div>
	<div class="col-md-7">
		<input type="text" class="form-control email" value="[[Input::old('email')]]" name="email" placeholder="Email">
		[[$errors->first('email')]]
		<span class="tiny-error-email none"></span>
	</div>
</div>
<div class="row app-row">
	<div class="col-md-4">
		<label>Country</label>
	</div>
	<div class="col-md-7">
		<input type="text" class="form-control country" value="[[Input::old('country')]]" name="country" placeholder="Country">
		[[$errors->first('country')]]
	</div>
</div>
<div class="row app-row">
	<div class="col-md-4">
		<label>City</label>
	</div>
	<div class="col-md-7">
		<input type="text" class="form-control city" value="[[Input::old('city')]]" name="city" placeholder="City">
		[[$errors->first('city')]]
	</div>
</div>
<div class="row app-row">
	<div class="col-md-4">
		<label>Zip/Postal Code</label>
	</div>
	<div class="col-md-7">
		<input type="text" class="form-control postalcode" value="[[Input::old('postalcode')]]" name="postalcode" placeholder="Zip/Postal Code">
		[[$errors->first('postalcode')]]
	</div>
</div>
<div class="row app-row">
	<div class="col-md-4">
		<label>Gender</label>
	</div>
	<div class="col-md-7">
		<input type="radio" id="male" name="gender" value="male" checked> <label for"male">Male</label>&nbsp;
		<input type="radio" id="female" name="gender" value="female"> <label for="female">Female</label>
	</div>
</div>
<div class="row app-row">
	<div class="col-md-4">
		
	</div>
	<div class="col-md-7">
		<button type="submit" class="btn-green pull-right submit-customer"><span class="glyphicon glyphicon-ok"></span> Continue</button>
	</div>
</div>
[[Form::close()]]
