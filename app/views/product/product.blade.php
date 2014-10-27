@extends('default.main')
@section('content')
<div class="data-container">
	<div class="header">
		<div class="command">
			<button class="menu-btn-green new-product"><span class="glyphicon glyphicon-plus"></span> Product</button>
			<button class="menu-btn-green new-category"><span class="glyphicon glyphicon-plus"></span> Category</button>
			<button class="menu-btn-green new-brand"><span class="glyphicon glyphicon-plus"></span> Brand</button>
			<button class="menu-btn-green"><span class="glyphicon glyphicon-user"></span> Product List</button>
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
			<div class="show-new-category none">
				@include('product.new-category')
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
		$('.show-new-category').addClass('none');
		$('.form-header').html('New Brand.');
	});
	$('.new-product').click(function(){
		$('.show-new-product').removeClass('none');
		$('.show-new-brand').addClass('none');
		$('.show-new-category').addClass('none');
		$('.form-header').removeClass('none').html('New Product.');
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
	$('.new-category').click(function(){
		$('.show-new-product').addClass('none');
		$('.show-new-brand').addClass('none');
		$('.show-new-category').removeClass('none');
		$('.form-header').removeClass('none').html('New Category.');
	});
	$('.submit-category').click(function(){
		var name = $('.category_name').val(),
			des = $('.cate-des').val(),
			parent = $('.select_parent').val();
		if(name == ''){
			$('.tiny-error-cate-name').html('Category name must be provided.').removeClass('none').addClass('tiny-error-message');
			$('.category_name').addClass('error-border').focus();
			return false;
		}else if(des == ''){
			$('.tiny-error-cate-desc').html('Category description must be written.').removeClass('none').addClass('tiny-error-message');
			$('.cate-des').addClass('error-border').focus();
			return false;
		}else if(parent == null){
			$('.tiny-error-parent').html('Parent name must be choosen.').removeClass('none').addClass('tiny-error-message');
			$('.select_parent').addClass('error-border').focus();
			return false;
		}else if(des == ''){
			$('.tiny-error-cate-desc').html('Category description must be written.').removeClass('none').addClass('tiny-error-message');
			$('.cate-des').addClass('error-border').focus();
			return false;
		}else{
			return true;
		}
	});
</script>
@stop