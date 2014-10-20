	{{Form::open(array('url'=>'product/brand'))}}
<div class="row app-row">
	<div class="col-md-4">
		<label>Name of Brand</label>
	</div>
	<div class="col-md-6">
		<input type="text" class="form-control brand_name" name="brand_name" required placeholder="Name">
		<span class="tiny-error-brand-name none"></span>
	</div>
</div>
<div class="row app-row">
 	<div class="col-md-4">		
	</div>
	<div class="col-md-6">
		<button type="submit" class="btn-green pull-right submit-brand"><span class="glyphicon glyphicon-ok"></span> Continue</button>
	</div>
</div>
{{Form::close()}}
