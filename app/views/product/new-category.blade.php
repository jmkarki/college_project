{{Form::open(array('url'=>'product/category'))}}
<div class="row app-row">
	<div class="col-md-4">
		<label>Name:</label>
	</div>
	<div class="col-md-6">
		<input type="text" class="form-control category_name" name="category_name" placeholder="Name">
		<span class="tiny-error-cate-name none"></span>
	</div>
</div>
<div class="row app-row">
	<div class="col-md-4">
		<label>Description:</label>
	</div>
	<div class="col-md-6">
		<textarea class="form-control cate-des" style="height: 150px;" name="description" placeholder="Description"></textarea>
		<span class="tiny-error-cate-desc none"></span>
	</div>
</div>
  
<div class="row app-row">
	<div class="col-md-4">
		<label>Parent:</label>
	</div>
	<div class="col-md-6">
		<select data-placeholder="Select Parent ..." class="chosen-select form-control select_parent" name="select_parent">
			<option selected="selected" value="no">Choose Parent</option>
			<option value="0">/</option>
			@foreach($parents as $parent)
				<option value="{{$parent->category_id}}">{{$parent->category_name}}</option>	
			@endforeach
		</select>
		<span class="tiny-error-parent none"></span>
	</div>
</div>
<div class="row app-row">
	<div class="col-md-4">		
	</div>
	<div class="col-md-6">
		<button type="submit" class="btn-green pull-right submit-category"><span class="glyphicon glyphicon-ok"></span> Continue</button>
	</div>
</div>
{{Form::close()}}
