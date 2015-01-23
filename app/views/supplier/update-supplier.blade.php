	[[Form::model($person, array('url'=>'supplier/update'))]]
	<div class="row app-row">
	<div class="col-md-4">
		<label>Name</label>
	</div>
	<div class="col-md-7">
		[[Form::hidden('person_id', $person->person_id)]]
		[[Form::text('fullname', null, array('class' => 'form-control'))]]
		[[$errors->first('fullname')]]
	</div>
</div>
<div class="row app-row">
	<div class="col-md-4">
		<label>Address Line1</label>
	</div>
	<div class="col-md-7">
		[[Form::textarea('addressline1', null, array('class' => 'form-control','rows'=> '2'))]]
		[[$errors->first('addressline1')]]
	</div>
</div>
<div class="row app-row">
	<div class="col-md-4">
		<label>Address Line2</label>
	</div>
	<div class="col-md-7">
		[[Form::textarea('addressline2', null, array('class' => 'form-control','rows'=> '2'))]]
		[[$errors->first('addressline2')]]
	</div>
</div>
<div class="row app-row">
	<div class="col-md-4">
		<label>Phone (Landline)</label>
	</div>
	<div class="col-md-7">
		[[Form::text('phone', null, array('class' => 'form-control'))]]
		[[$errors->first('phone')]]
	</div>
</div>
<div class="row app-row">
	<div class="col-md-4">
		<label>Mobile</label>
	</div>
	<div class="col-md-7">
		[[Form::text('mobile', null, array('class' => 'form-control'))]]
		[[$errors->first('mobile')]]
	</div>
</div>
<div class="row app-row">
	<div class="col-md-4">
		<label>Email</label>
	</div>
	<div class="col-md-7">
		[[Form::text('email', null, array('class' => 'form-control'))]]
		[[$errors->first('email')]]
	</div>
</div>
<div class="row app-row">
	<div class="col-md-4">
		<label>Country</label>
	</div>
	<div class="col-md-7">
		[[Form::text('country', null, array('class' => 'form-control'))]]
		[[$errors->first('country')]]
	</div>
</div>
<div class="row app-row">
	<div class="col-md-4">
		<label>City</label>
	</div>
	<div class="col-md-7">
		[[Form::text('city', null, array('class' => 'form-control'))]]		
		[[$errors->first('city')]]
	</div>
</div>
<div class="row app-row">
	<div class="col-md-4">
		<label>Zip/Postal Code</label>
	</div>
	<div class="col-md-7">
		[[Form::text('postcode', null, array('class' => 'form-control'))]]
		[[$errors->first('postcode')]]
	</div>
</div>
<div class="row app-row">
	<div class="col-md-4">
		<label>Gender</label>
	</div>
	<div class="col-md-7">
		<input type="radio" id="male" name="gender" value="Male" checked> <label for"male">Male</label>&nbsp;
		<input type="radio" id="female" name="gender" value="Female"> <label for="female">Female</label>
	</div>
</div>
<div class="row app-row">
	<div class="col-md-4">
		
	</div>
	<div class="col-md-7">
		<button type="submit" class="btn-green pull-right"><span class="glyphicon glyphicon-cloud"></span> Update</button>
	</div>
</div>
[[Form::close()]]