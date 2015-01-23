@if(Session::has('message'))
<div class="alert alert-success">
	[[Session::get('message')]]
	<a href="" class="pull-right alert-close tiny"><span class="glyphicon glyphicon-remove"></span></a>
</div>
@endif

[[Form::open(array('url'=>'supplier/store'))]]
<div class="row app-row">
	<div class="col-md-4">
		<label>Name</label>
	</div>
	<div class="col-md-7">
		<input type="text" class="form-control supplier_name" name="fullname" placeholder="Name">
		[[$errors->first('fullname')]]
		<!-- <span class="tiny-error-name none"></span> -->
	</div>
</div>
<div class="row app-row">
	<div class="col-md-4">
		<label>Address Line1</label>
	</div>
	<div class="col-md-7">
		<textarea class="form-control supplier_address" name="addressline1" placeholder="AdressLine1"></textarea>
		[[$errors->first('addressline1')]]
		<!-- <span class="tiny-error-address none"></span> -->
	</div>
</div>
<div class="row app-row">
	<div class="col-md-4">
		<label>Address Line2</label>
	</div>
	<div class="col-md-7">
		<textarea class="form-control supplier_address" name="addressline2" placeholder="AddressLine2"></textarea>
		[[$errors->first('addressline2')]]
		<!-- <span class="tiny-error-address none"></span> -->
	</div>
</div>
<div class="row app-row">
	<div class="col-md-4">
		<label>Phone</label>
	</div>
	<div class="col-md-7">
		<input type="text" class="form-control phone" name="phone" placeholder="Phone">
		[[$errors->first('phone')]]
		<!-- <span class="tiny-error-phone none"></span> -->
	</div>
</div>
<div class="row app-row">
	<div class="col-md-4">
		<label>Mobile</label>
	</div>
	<div class="col-md-7">
		<input type="text" class="form-control mobile" name="mobile" placeholder="Mobile">
		[[$errors->first('mobile')]]
		<!-- <span class="tiny-error-mobile none"></span> -->
	</div>
</div>
<div class="row app-row">
	<div class="col-md-4">
		<label>Email</label>
	</div>
	<div class="col-md-7">
		<input type="text" class="form-control email" name="email" placeholder="Email">
		[[$errors->first('email')]]
		<!-- <span class="tiny-error-email none"></span> -->
	</div>
</div>
<div class="row app-row">
	<div class="col-md-4">
		<label>Country</label>
	</div>
	<div class="col-md-7">
		<input type="text" class="form-control country" name="country" placeholder="Country">
		[[$errors->first('country')]]
		<!-- <span class="tiny-error-email none"></span> -->
	</div>
</div>
<div class="row app-row">
	<div class="col-md-4">
		<label>City</label>
	</div>
	<div class="col-md-7">
		<input type="text" class="form-control city" name="city" placeholder="City">
		[[$errors->first('city')]]
		<!-- <span class="tiny-error-email none"></span> -->
	</div>
</div>
<div class="row app-row">
	<div class="col-md-4">
		<label>Zip/Postal Code</label>
	</div>
	<div class="col-md-7">
		<input type="text" class="form-control postcode" name="postcode" placeholder="Zip/Post Code">
		[[$errors->first('postcode')]]
		<!-- <span class="tiny-error-email none"></span> -->
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
		<button type="submit" class="btn-green pull-right submit-supplier"><span class="glyphicon glyphicon-ok"></span> Continue</button>
	</div>
</div>
[[Form::close()]]
