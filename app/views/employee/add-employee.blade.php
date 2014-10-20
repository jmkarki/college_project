@if(Session::has('message'))
<div class="alert alert-success">
	{{Session::get('message')}}
	<a href="" class="pull-right alert-close tiny"><span class="glyphicon glyphicon-remove"></span></a>
</div>
@endif
	{{Form::open(array('url'=>'employee/store'))}}
	<div class="row app-row">
	<div class="col-md-4">
		<label>Name</label>
	</div>
	<div class="col-md-5">
		<input type="text" class="form-control employee_name" name="employee_name">
		<span class="tiny-error-name none"></span>
	</div>
</div>
<div class="row app-row">
	<div class="col-md-4">
		<label>Address</label>
	</div>
	<div class="col-md-5">
		<input type="text" class="form-control employee_address" name="employee_address">
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
		<input type="text" class="form-control email" name="email" email>
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
		<label>Post</label>
	</div>
	<div class="col-md-5">
		<input type="text" class="form-control post" name="post">
		<span class="tiny-error-post none"></span>
	</div>
</div>
<div class="row app-row">
	<div class="col-md-4">
		<label>Salary</label>
	</div>
	<div class="col-md-5">
		<input type="text" class="form-control salary" name="salary">
		<span class="tiny-error-salary none"></span>
	</div>
</div>
<div class="row app-row">
	<div class="col-md-4">
		<label>Joined</label>
	</div>
	<div class="col-md-5">
		<input type="date" class="form-control join_date" name="join_date">
		<span class="tiny-error-join none"></span>
	</div>
</div>
<div class="row app-row">
	<div class="col-md-4">
		
	</div>
	<div class="col-md-5">
		<button type="submit" class="btn-green pull-right submit-employee"><span class="glyphicon glyphicon-ok"></span> Continue</button>
	</div>
</div>
{{Form::close()}}
