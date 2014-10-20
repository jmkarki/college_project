@extends('default.main')
@section('content')
<div class="data-container">
	<div class="header">
		<div class="command">
			<button class="menu-btn-green new-product"><span class="glyphicon glyphicon-plus"></span> Product</button>
			<button class="menu-btn-green"><span class="glyphicon glyphicon-plus"></span> Category</button>
			<button class="menu-btn-green new-brand"><span class="glyphicon glyphicon-plus"></span> Brand</button>
			<button class="menu-btn-green"><span class="glyphicon glyphicon-user"></span> Products</button>
			<button class="menu-btn-green"><span class="glyphicon glyphicon-user"></span> Category List</button>
			<button class="menu-btn-green"><span class="glyphicon glyphicon-user"></span> Brand List</button>
		</div>		
	</div>
	<div class="body">
		@if(Session::has('message'))
		<div class="alert alert-success">
			{{Session::get('message')}}
			<a href="" class="pull-right alert-close tiny"><span class="glyphicon glyphicon-remove"></span></a>
		</div>
		@endif
		<div class="form-header none">
			Register New Product.
		</div>
		<div class="include-form">
			<div class="show-new-product none">
				@include('product.new-product')
			</div>
			<div class="show-new-brand none">
				@include('product.new-brand')
			</div>
		</div>
	</div>	 
</div>
@stop
@section('script')
<script type="text/javascript">
	$('.new-brand').click(function(){
		$('.show-new-product').addClass('none');
		$('.show-new-brand').removeClass('none');
		$('.form-header').removeClass('none');
		$('.form-header').html('New Brand.');
	});
	$('.new-product').click(function(){
		$('.show-new-product').removeClass('none');
		$('.show-new-brand').addClass('none');
		$('.form-header').removeClass('none').html('Register New Product.');
	});
	$('.submit-brand').click(function(){
		var brand = $('.brand_name').val();
		if(brand == ''){
			$('.tiny-error-brand-name').html('Brand name must be provided.').removeClass('none').addClass('tiny-error-message');
			$('.brand_name').addClass('error-border').focus();
			return false;
		}
		return true;
	});
</script>
@stop