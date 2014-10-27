{{Form::open(array('url'=>'product/store'))}}
<div class="row app-row">
	<div class="col-md-2 processed">Step1 <span class="glyphicon glyphicon-ok checked"></span></div>
	<div class="col-md-4">
		<label>Name</label>
	</div>
	<div class="col-md-6">
		<input type="text" class="form-control employee_name" name="employee_name" required placeholder="Name">
		<span class="tiny-error-name none"></span>
	</div>
</div>
<div class="row app-row">
	<div class="col-md-2 current-item">Step1</div>
	<div class="col-md-4">
		<label>Brand</label>
	</div>
	<div class="col-md-6">
		<select class="select_brand form-control">
			<option selected disabled style="display:none;">Select Brand</option>
			@foreach($brand as $each)
				<option value="{{$each->brand_id}}">{{$each->brand_name}}</option>	
			@endforeach
		</select>
		<span class="tiny-error-address none"></span>
	</div>
</div>
<div class="row app-row">
	<div class="col-md-2">Step1</div>
	<div class="col-md-4">
		<label>Category</label>
	</div>
	<div class="col-md-6">
		<select class="form-control select_category">
			<option selected disabled style="display:none;">Select Parent</option>
			@foreach($parents as $parent)
				<option value="{{$parent->category_id}}">{{$parent->category_name}}</option>	
			@endforeach
		</select>
		<span class="tiny-error-phone none"></span>
	</div>
</div>
<div class="row app-row">
	<div class="col-md-2">Step1</div>
	<div class="col-md-4">
		<label>Description</label>
	</div>
	<div class="col-md-6">
		<textarea class="form-control description">			
		</textarea>
		<span class="tiny-error-mobile none"></span>
	</div>
</div>
<div class="row app-row">
	<div class="col-md-2"></div>
	<div class="col-md-4">		
	</div>
	<div class="col-md-6">
		<button type="submit" class="btn-green pull-right submit-employee"><span class="glyphicon glyphicon-ok"></span> Continue</button>
	</div>
</div>
{{Form::close()}}
