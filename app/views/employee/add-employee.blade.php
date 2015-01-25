@if(Session::has('message'))
<div class="alert alert-success">
	[[Session::get('message')]]
	<a href="" class="pull-right alert-close tiny"><span class="glyphicon glyphicon-remove"></span></a>
</div>
@endif



	[[Form::open(array('url'=>'employee/store','enctype'=>'multipart/form-data'))]]
	<div class="row app-row">
	<div class="col-md-4">
		<label>Name</label>
	</div>
	<div class="col-md-7">
		[[Form::text('fullname', null, array('class' => 'form-control','placeholder'=>'Fullname'))]]
		[[$errors->first('fullname')]]
	</div>
</div>
<div class="row app-row">
	<div class="col-md-4">
		<label>Address Line1</label>
	</div>
	<div class="col-md-7">
		[[Form::textarea('addressline1', null, array('class' => 'form-control','rows'=> '2','placeholder'=>'AddressLine1'))]]
		[[$errors->first('addressline1')]]
	</div>
</div>
<div class="row app-row">
	<div class="col-md-4">
		<label>Address Line2</label>
	</div>
	<div class="col-md-7">
		[[Form::textarea('addressline2', null, array('class' => 'form-control','rows'=> '2','placeholder'=>'AddressLine2'))]]
		[[$errors->first('addressline2')]]
	</div>
</div>
<div class="row app-row">
	<div class="col-md-4 col-sm-5 form-label">
			[[ Form::label('Picture:')]]
	</div>
	<div class="col-md-8 col-sm-7 form-field" id="imgdiv">
		<a href="" class="btn-green" id="addApicture" data-toggle="modal" data-target="#addPicture"><i class="fa fa-picture-o"></i> Picture</a>
		<div id="prev_img" style="width: 100px; height: 100px; overflow: hidden; margin-top:6px; display:none;">
			<img src="" >
		</div>
	</div>
</div>
<div class="row app-row">
	<div class="col-md-4">
		<label>Phone (Landline)</label>
	</div>
	<div class="col-md-7">
		[[Form::text('phone', null, array('class' => 'form-control','placeholder'=>'Phone'))]]
		[[$errors->first('phone')]]
	</div>
</div>
<div class="row app-row">
	<div class="col-md-4">
		<label>Mobile</label>
	</div>
	<div class="col-md-7">
		[[Form::text('mobile', null, array('class' => 'form-control','placeholder'=>'Mobile'))]]
		[[$errors->first('mobile')]]
	</div>
</div>
<div class="row app-row">
	<div class="col-md-4">
		<label>Email</label>
	</div>
	<div class="col-md-7">
		[[Form::text('email', null, array('class' => 'form-control','placeholder'=>'Email'))]]
		[[$errors->first('email')]]
	</div>
</div>
<div class="row app-row">
	<div class="col-md-4">
		<label>Country</label>
	</div>
	<div class="col-md-7">
		[[Form::text('country', null, array('class' => 'form-control','placeholder'=>'Country'))]]
		[[$errors->first('country')]]
	</div>
</div>
<div class="row app-row">
	<div class="col-md-4">
		<label>City</label>
	</div>
	<div class="col-md-7">
		[[Form::text('city', null, array('class' => 'form-control','placeholder'=>'City'))]]		
		[[$errors->first('city')]]
	</div>
</div>
<div class="row app-row">
	<div class="col-md-4">
		<label>Zip/Postal Code</label>
	</div>
	<div class="col-md-7">
		[[Form::text('postcode', null, array('class' => 'form-control','placeholder'=>'Zip/Post Code'))]]
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
		<!-- <button type="submit" class="btn-green pull-right"><span class="glyphicon glyphicon-cloud"></span> Update</button> -->
		<button type="submit" class="btn-green pull-right submit-employee"><span class="glyphicon glyphicon-ok"></span> Continue</button>
	</div>
</div>
	<div class="modal fade" id="addPicture" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
	    	<div class="modal-content model-data-content">
				<div class="modal-body">
					<div class="wrap">
	 					<input id="uploadImage" name="uploadImage" onchange="readURL(this);" type="file"/>

						<div class="upload-buttons app-row">
							<button type="button" id='ok_btn' disabled class="btn-green">OK</button>
							<button type="button" id='close_btn' class="btn-green" data-dismiss="modal">Cancel</button>
							<input type="hidden" class="check_close" value="0">
						</div>
						<input type="hidden" id="x" name="x" />
						<input type="hidden" id="y" name="y" />
						<input type="hidden" id="w" name="w" />
						<input type="hidden" id="h" name="h" />
						<input id="chag_sort" type="hidden" name="chag_sort">
						<img id="uploadPreview" width="500px" height="auto" style="display:none;"/>
						<input type="hidden" id="removed" name="removed" value="0" />
	 				</div>
	 				<span><i>Drag over the image inorder to select crop area.</i></span>	
				</div>
	    	</div>
	  	</div>
	</div>
[[Form::close()]]