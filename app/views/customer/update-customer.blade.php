@if(Session::has('message'))
<div class="alert alert-success">
	[[Session::get('message')]]
	<a href="" class="pull-right alert-close tiny"><span class="glyphicon glyphicon-remove"></span></a>
</div>
@endif
	[[Form::model($person, array('url'=>'customer/update'))]]
	<div class="row app-row">
	<div class="col-md-4">
		<label>Name</label>
	</div>
	<div class="col-md-7">
		[[Form::hidden('person_id', $person->person_id)]]
		<!-- <input type="text" class="form-control" value="[[Input::old('fullname')]]" name="fullname" placeholder="Name"> -->
		[[Form::text('fullname', null, array('class' => 'form-control'))]]
		[[$errors->first('fullname')]]
	</div>
</div>
<div class="row app-row">
	<div class="col-md-4">
		<label>Address Line1</label>
	</div>
	<div class="col-md-7">
		<!-- <textarea rows="2" class="form-control" value="[[Input::old('addressline1')]]" name="addressline1" placeholder="Address Line 1"></textarea> -->
		[[Form::textarea('addressline1', null, array('class' => 'form-control','rows'=> '2'))]]
		[[$errors->first('addressline1')]]
	</div>
</div>
<div class="row app-row">
	<div class="col-md-4">
		<label>Address Line2</label>
	</div>
	<div class="col-md-7">
		<!-- <textarea rows="2" class="form-control addressline2" value="[[Input::old('addressline2')]]" name="addressline2" placeholder="Address Line 2"></textarea> -->
		[[Form::textarea('addressline2', null, array('class' => 'form-control','rows'=> '2'))]]
		[[$errors->first('addressline2')]]
	</div>
</div>
<div class="row app-row">
	<div class="col-md-4">
		<label>Phone (Landline)</label>
	</div>
	<div class="col-md-7">
		<!-- <input type="text" class="form-control phone" value="[[Input::old('phone')]]" name="phone" placeholder="Landline"> -->
		[[Form::text('phone', null, array('class' => 'form-control'))]]
		[[$errors->first('phone')]]
	</div>
</div>
<div class="row app-row">
	<div class="col-md-4">
		<label>Mobile</label>
	</div>
	<div class="col-md-7">
		<!-- <input type="text" class="form-control mobile" value="[[Input::old('mobile')]]" name="mobile" placeholder="Mobile"> -->
		[[Form::text('mobile', null, array('class' => 'form-control'))]]
		[[$errors->first('mobile')]]
	</div>
</div>
<div class="row app-row">
	<div class="col-md-4">
		<label>Email</label>
	</div>
	<div class="col-md-7">
		<!-- <input type="text" class="form-control email" value="[[Input::old('email')]]" name="email" placeholder="Email"> -->
		[[Form::text('email', null, array('class' => 'form-control'))]]
		[[$errors->first('email')]]
		<span class="tiny-error-email none"></span>
	</div>
</div>
<div class="row app-row">
	<div class="col-md-4">
		<label>Country</label>
	</div>
	<div class="col-md-7">
		<!-- <input type="text" class="form-control country" value="[[Input::old('country')]]" name="country" placeholder="Country"> -->
		[[Form::text('country', null, array('class' => 'form-control'))]]
		[[$errors->first('country')]]
	</div>
</div>
<div class="row app-row">
	<div class="col-md-4">
		<label>City</label>
	</div>
	<div class="col-md-7">
		<!-- <input type="text" class="form-control city" value="[[Input::old('city')]]" name="city" placeholder="City"> -->
		[[Form::text('city', null, array('class' => 'form-control'))]]		
		[[$errors->first('city')]]
	</div>
</div>
<div class="row app-row">
	<div class="col-md-4">
		<label>Zip/Postal Code</label>
	</div>
	<div class="col-md-7">
		<!-- <input type="text" class="form-control postcode" value="[[Input::old('postcode')]]" name="postalcode" placeholder="Zip/Postal Code"> -->
		[[Form::text('postcode', null, array('class' => 'form-control'))]]
		[[$errors->first('postcode')]]
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
		<button type="submit" class="btn-green pull-right"><span class="glyphicon glyphicon-ok"></span> Continue</button>
	</div>
</div>
[[Form::close()]]