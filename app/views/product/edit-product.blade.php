@extends('default.main')
@section('content')
<div class="data-container">
	@include('product.product-menu')
	<div class="body">
		@if(Session::has('message'))
		<div class="alert alert-success success-message">
			[[Session::get('message')]]
			<a href="" class="pull-right alert-close tiny"><span class="glyphicon glyphicon-remove"></span></a>
		</div>
		@endif
		<div class="form-header">
			ADD NEW PRODUCT CATEGORY.
		</div>
		<div class="include-form">
			<div class="row app-row">
				<div class="col-md-12">
			        <div class="row app-row">
							<div class="col-md-4">
							<label>Name:</label>
						</div>
						<div class="col-md-8">
							<input type="text" class="form-control required productName" name="product_name" placeholder="Product Name">
							<span class="none product-name-message"></span>
						</div>
					</div>
					<div class="row app-row">			
						<div class="col-md-4">
							<label>Brand:</label>
						</div>
						<div class="col-md-8">
							<select class="chosen-select form-control required selectBrand" name="select_brand">
								<option selected="selected" value="0">Choose Brand</option>
							</select>
							<span class="product-brand-message none"></span>
							</div>
					</div>
					<div class="row app-row">
						<div class="col-md-4">
							<label>Category:</label>
						</div>
						<div class="col-md-8">
							<select class="chosen-select form-control required selectCategory" name="select_category">
								<option selected="selected" value="0"> Choose Category</option>
							</select>
							<span class="product-cate-message none"></span>
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
							<label>Description:</label>
						</div>
						<div class="col-md-8"> 
							<textarea class="form-control required product-des-value" rows="6" wrap="physical" name="description"></textarea>
							<span class="none product-des-message"></span>
							</div>
					</div>
					<div class="row app-row">
			 			<div class="col-md-4">		
						</div>
						<div class="col-md-8">
							<button type="button" data-loading-text="Loading..."class="btn-green nextBtn step-1 pull-right"><span class="glyphicon glyphicon-ok"></span> Continue</button>
						</div>
					</div>
			     </div>
			</div>
		</div>
	</div>
</div>
@stop