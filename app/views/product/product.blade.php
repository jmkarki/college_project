@extends('default.main')
@section('content')
<div class="data-container">
	<div class="header">
		<div class="command">
			<button class="menu-btn-green new-product"><span class="glyphicon glyphicon-plus"></span> Product</button>
			<button class="menu-btn-green new-category"><span class="glyphicon glyphicon-plus"></span> Category</button>
			<button class="menu-btn-green new-brand"><span class="glyphicon glyphicon-plus"></span> Brand</button>
			<button class="menu-btn-green product-list"><span class="glyphicon glyphicon-chevron-down" style="font-size:12px;"></span> Product List</button>
			<button class="menu-btn-green cate-list"><span class="glyphicon glyphicon-chevron-down"style="font-size:12px;"></span> Category List</button>
			<button class="menu-btn-green brand-list"><span class="glyphicon glyphicon-chevron-down"style="font-size:12px;"></span> Brand List</button>
		</div>		
	</div>
	<div class="body">
		@if(Session::has('message'))
		<div class="alert alert-success success-message">
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
			<div class="show-brand-content none">
 			</div>
			<div class="show-product-list-content none">
				prod list
			</div>
			<div class="show-cate-list none">
				cate-list
			</div>	
		</div>
	</div>	 
</div>
<input type="hidden" class="base-url" value="{{URL::to('/')}}">
<input type="hidden" class="incrementer" value="1">
@stop
@section('script')
	<script type="text/javascript">
		var base_url = $('.base-url').val();
		$('.productForm').validate();
		$('.new-brand').on('click',function(){
		$('.show-new-product').addClass('none');
		$('.show-new-brand').removeClass('none');
		$('.form-header').removeClass('none').html('New Brand.');;
		$('.show-new-category').addClass('none');
		$('.show-brand-content').addClass('none');
		$('.show-product-list-content').addClass('none');
		$('.show-cate-list').addClass('none');
	});
	$('.new-product').on('click',function(){
		$('.show-new-product').removeClass('none');
		$('.show-new-brand').addClass('none');
		$('.show-new-category').addClass('none');
		$('.form-header').removeClass('none').html('New Product.');
		$('.show-brand-content').addClass('none');
		$('.show-product-list-content').addClass('none');
		$('.show-cate-list').addClass('none');
	});
	$('.new-category').on('click',function(){
		$('.show-new-product').addClass('none');
		$('.show-new-brand').addClass('none');
		$('.show-new-category').removeClass('none');
		$('.form-header').removeClass('none').html('New Category.');
		$('.show-brand-content').addClass('none');
		$('.show-product-list-content').addClass('none');
		$('.show-cate-list').addClass('none');
	});
	$('.product-list').on('click',function(){
		$('.show-new-product').addClass('none');
		$('.show-new-brand').addClass('none');
		$('.show-new-category').addClass('none');
		$('.form-header').removeClass('none').html('List of availavle products.');
		$('.show-brand-content').addClass('none');
		$('.show-product-list-content').removeClass('none');
		$('.show-cate-list').addClass('none');
		//fire a ajax request to retrieve data
		$('.show-product-list-content').append();

	});
	$('.brand-list').on('click',function(){
		$('.show-new-product').addClass('none');
		$('.show-new-brand').addClass('none');
		$('.show-new-category').addClass('none');
		$('.form-header').removeClass('none').html('List of availavle product brands.');
		$('.show-brand-content').removeClass('none');
		$('.show-product-list-content').addClass('none');
		$('.show-cate-list').addClass('none');

		//fire the ajax requrest to retrieve data
		$.ajax({
			url: base_url+'/product/brands',
			type: 'GET',
			success: function(response){
 				var data = '';
				if(response.length == 0){
					$('.show-brand-content').html('No brands availavle.');
					}else{
						for (var i = 0; i < response.length; i++) {
								data  += '<div class="row">'+
											'<div class="col-md-1 row-margin-right">'+
												'<h4 class="media-heading">'+response[i].brand_name+'</h4>'+
											'</div>'+
											'<div class="col-md-3 row-margin-right"><p>'+response[i].description+'</p></div>'+
										 '</div>';
									};
								}

				$('.show-brand-content').html(data);
 			}
		});
	});
	$('.cate-list').on('click',function(){
		$('.show-new-product').addClass('none');
		$('.show-new-brand').addClass('none');
		$('.show-new-category').addClass('none');
		$('.form-header').removeClass('none').html('List of product categoris with us.');
		$('.show-brand-content').addClass('none');
		$('.show-product-list-content').addClass('none');
		$('.show-cate-list').removeClass('none');
		//fire a ajax request to get data from database;

	});
	$('.submit-brand').on('click',function(){
		var brand = $('.brand_name').val(),
			desc = $('.description-brand').val();
		if(brand == ''){
			$('.tiny-error-brand-name').html('This field is required.').removeClass('none').addClass('tiny-error-message');
			$('.brand_name').addClass('error-border').focus();
			return false;
		}else if(desc == ''){
			$('.tiny-error-brand-desc').html('This field is required.').removeClass('none').addClass('tiny-error-message');
			$('.description').addClass('error-border').focus();
			return false;
		}
		return true;
	});

	$('.submit-category').on('click',function(){
		var name = $('.category_name').val(),
			des = $('.cate-des').val(),
			parent = $('.select_parent').val();
 		if(name == ''){
			$('.tiny-error-cate-name').html('This field is required.').removeClass('none').addClass('tiny-error-message');
			$('.category_name').addClass('error-border').focus();
			return false;
		}else if(des == ''){
			$('.tiny-error-cate-desc').html('This field is required.').removeClass('none').addClass('tiny-error-message');
			$('.cate-des').addClass('error-border').focus();
			return false;
		}else if(parent == 'no'){
			$('.tiny-error-parent').html('This field is required.').removeClass('none').addClass('tiny-error-message');
			$('.select_parent').addClass('error-border').focus();
			return false;
		}else if(des == ''){
			$('.tiny-error-cate-desc').html('This field is required.').removeClass('none').addClass('tiny-error-message');
			$('.cate-des').addClass('error-border').focus();
			return false;
		}else{
			return true;
		}
	});
	</script>
@stop