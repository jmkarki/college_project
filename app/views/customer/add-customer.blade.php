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
		<input type="text" class="form-control" name="customer_name">
	</div>
</div>
<div class="row app-row">
	<div class="col-md-4">
		<label>Address</label>
	</div>
	<div class="col-md-5">
		<input type="text" class="form-control" name="customer_address">
	</div>
</div>
<div class="row app-row">
	<div class="col-md-4">
		<label>Gender</label>
	</div>
	<div class="col-md-5">
		<input type="radio" id="male" name="gender" value="male"> <label for"male">Male</label>&nbsp;
		<input type="radio" id="female" name="gender" value="female"> <label for="female">Female</label>
	</div>
</div>
<div class="row app-row">
	<div class="col-md-4">
		<label>Type</label>
	</div>
	<div class="col-md-5">
		<select class="form-control"  name="select_type">
			<option disabled selected style='display:none;'>Select Type</option>
			<option value="1">Individual</option>
			<option value="0">Business</option>
		</select>
	</div>
</div>
<div class="row app-row">
	<div class="col-md-4">
		
	</div>
	<div class="col-md-5">
		<button type="submit" class="btn-green pull-right"><span class="glyphicon glyphicon-ok"></span> Continue</button>
	</div>
</div>
{{Form::close()}}
