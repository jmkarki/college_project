@extends('default.main')
@section('content')
<div class="data-container">
	@include('product.product-menu')
	<div class="body">
		@if(Session::has('message'))
		<div class="alert alert-success success-message">
			{{Session::get('message')}}
			<a href="" class="pull-right alert-close tiny"><span class="glyphicon glyphicon-remove"></span></a>
		</div>
		@endif
		<div class="form-header">
			List of availavle product brands.
		</div>
		<div class="include-form">
			{{Form::open(array('url'=>'product/brand'))}}
				<div class="row app-row">
					<div class="col-md-4">
						<label>Name of Brand</label>
					</div>
					<div class="col-md-6">
						<input type="text" class="form-control brand_name" name="brand_name" placeholder="Name">
						<span class="tiny-error-brand-name none"></span>
					</div>
				</div>
				<div class="row app-row">
					<div class="col-md-4">
						<label>Description</label>
					</div>
					<div class="col-md-6">
						<textarea class="form-control description-brand" style="height: 133px;" name="description" placeholder="Description"></textarea>
						<span class="tiny-error-brand-desc none"></span>
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
		</div>	 
	</div>
</div>
@stop
@section('script')
<script type="text/javascript">
$(document).ready(function(){
	$('.submit-brand').on('click',function(){
		var brand = $('.brand_name').val(),
			desc = $('.description-brand').val();
		if(brand == ''){
			// $('.tiny-error-brand-name').html('This field is required.').removeClass('none').addClass('tiny-error-message');
			$('.brand_name').addClass('error-border').focus();
			return false;
		}else if(desc == ''){
			// $('.tiny-error-brand-desc').html('This field is required.').removeClass('none').addClass('tiny-error-message');
			$('.description').addClass('error-border').focus();
			return false;
		}
		return true;
	});
	$('.brand_name').on('change',function(){
		$(this).removeClass('none');
	});
	$('.description-brand').on('change',function(){
		$(this).removeClass('none');
	});
});	

</script>
@stop
