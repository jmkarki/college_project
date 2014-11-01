@if(Session::has('message'))
<div class="alert alert-success">
	{{Session::get('message')}}
	<a href="" class="pull-right alert-close tiny"><span class="glyphicon glyphicon-remove"></span></a>
</div>
@endif
	{{Form::open(array('url'=>'customer/store'))}}
	<div class="row app-row">
	<div class="col-md-4">
		<label>Name</label>
	</div>
	<div class="col-md-5">
		<input type="text" class="form-control customer_name" name="customer_name">
		<span class="tiny-error-name none"></span>
	</div>
</div>
<div class="row app-row">
	<div class="col-md-4">
		<label>Address</label>
	</div>
	<div class="col-md-5">
		<input type="text" class="form-control customer_address" name="customer_address">
		<span class="tiny-error-address none"></span>
	</div>
</div>
<div class="row app-row">
	<div class="col-md-4">
		<label>Phone</label>
	</div>
	<div class="col-md-5">
		<input type="text" class="form-control phone" name="phone">
		<span class="tiny-error-phone none"></span>
	</div>
</div>
<div class="row app-row">
	<div class="col-md-4">
		<label>Mobile</label>
	</div>
	<div class="col-md-5">
		<input type="text" class="form-control mobile" name="mobile">
		<span class="tiny-error-mobile none"></span>
	</div>
</div>
<div class="row app-row">
	<div class="col-md-4">
		<label>Email</label>
	</div>
	<div class="col-md-5">
		<input type="text" class="form-control email" name="email">
		<span class="tiny-error-email none"></span>
	</div>
</div>
<div class="row app-row">
	<div class="col-md-4">
		<label>Gender</label>
	</div>
	<div class="col-md-5">
		<input type="radio" id="male" name="gender" value="male" checked> <label for"male">Male</label>&nbsp;
		<input type="radio" id="female" name="gender" value="female"> <label for="female">Female</label>
	</div>
</div>
<div class="row app-row">
	<div class="col-md-4">
		<label>Type</label>
	</div>
	<div class="col-md-5">
		<select class="form-control select_type"  name="select_type">
			<option disabled selected style='display:none;'>Select Type</option>
			<option value="1">Individual</option>
			<option value="0">Business</option>
		</select>
		<span class="tiny-error-type none"></span>
	</div>
</div>
<div class="row app-row">
	<div class="col-md-4">
		
	</div>
	<div class="col-md-5">
		<button type="submit" class="btn-green pull-right submit-customer"><span class="glyphicon glyphicon-ok"></span> Continue</button>
	</div>
</div>
{{Form::close()}}
