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
		<div class="form-header">
			List of availavle products.
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
					<div class="table-responsive">
 						<table class="table table-striped">
 							<tr><th>Brand</th><th>Description</th><th>Action</th></tr>
 							<tbody class="show-brand-content-data"></tbody>
						</table>
					</div>
 			</div>
			<div class="show-product-list-content">
					<div class="table-responsive">
 						<table class="table table-striped table-hover">
 							<tr><th>Product</th><th>Description</th><th>Action</th></tr>
 							@foreach($products as $product)
 								<tr><td>{{$product->product_name}}</td><td>{{$product->description}}</td><td><a href="javascript:void(0)" data-id="{{$product->product_id}}" class="edit-icon each-product"><span class="glyphicon glyphicon-pencil"></span></a></td></tr>
 							@endforeach
						</table>
					</div>
			</div>
			<div class="show-cate-list none">
					<div class="table-responsive">
 						<table class="table table-striped table-hover">
						 <tr><td>dta</td><td>th</td></tr>
						 <tr><td>data</td><td>tedt</td></tr>
						</table>
					</div>
			</div>
			<div class="update-brand none">
				{{Form::open(array('url'=>'product/updatebrand','class'=>'update-brand-form'))}}
					<div class="show-brand-update-content"></div>
				{{Form::close()}}
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
		$('.update-brand').addClass('none');
		$('.show-product-list-content').addClass('none');
		$('.show-cate-list').addClass('none');
	});
	$('.new-product').on('click',function(){
		$('.show-new-product').removeClass('none');
		$('.show-new-brand').addClass('none');
		$('.show-new-category').addClass('none');
		$('.form-header').removeClass('none').html('New Product.');
		$('.update-brand').addClass('none');
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
		$('.update-brand').addClass('none');
		$('.show-cate-list').addClass('none');
	});
	$('.product-list').on('click',function(){
		$('.show-new-product').addClass('none');
		$('.show-new-brand').addClass('none');
		$('.show-new-category').addClass('none');
		$('.form-header').removeClass('none').html('List of availavle products.');
		$('.show-brand-content').addClass('none');
		$('.show-product-list-content').removeClass('none');
		$('.update-brand').addClass('none');
		$('.show-cate-list').addClass('none');

	});
	$('.brand-list').on('click',function(){
		$('.show-new-product').addClass('none');
		$('.show-new-brand').addClass('none');
		$('.show-new-category').addClass('none');
		$('.form-header').removeClass('none').html('List of availavle product brands.');
		$('.show-brand-content').removeClass('none');
		$('.show-product-list-content').addClass('none');
		$('.show-cate-list').addClass('none');
		$('.update-brand').addClass('none');

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
								data  += '<tr><td>'+response[i].brand_name+'</td><td>'+response[i].description+'</td><td><a href="javascript:void(0)" data-id="'+response[i].brand_id+'" class="edit-icon each-brand"><span class="glyphicon glyphicon-pencil"></span></a></td></tr>';
									};
								}

				$('.show-brand-content-data').html(data);
 			}
		});
	});
	$('.show-brand-content').on('click','.each-brand',function(){
		var brand_id = $(this).data('id');
		$.ajax({
			url: base_url+'/product/updatebrand',
			type:'GET',
			data:{brand_id:brand_id},
			success:function(response){
 				$('.form-header').html('Update Brand Information.');
 				var data = '<div class="row app-row">'+
								'<div class="col-md-4">'+
									'<label>Name of Brand</label>'+
								'</div>'+
								'<div class="col-md-6">'+
									'<input type="text" class="form-control brand-name-update" name="brand_name" value="'+response.brand_name+'">'+
									'<span class="tiny-error-brand-name-update none"></span>'+
								'</div>'+
							'</div>'+
							'<div class="row app-row">'+
								'<div class="col-md-4">'+
									'<label>Description</label>'+
								'</div>'+
								'<div class="col-md-6">'+
									'<textarea class="form-control description-brand-update" style="height: 133px;" name="description">'+response.description+'</textarea>'+
									'<span class="tiny-error-brand-desc-update none"></span>'+
								'</div>'+
							'</div>'+
							'<div class="row app-row">'+
							 	'<div class="col-md-4">'+
							 	'<input type="hidden" value="'+response.brand_id+'" name="brand_id">'+
								'</div>'+
								'<div class="col-md-6">'+
									'<button type="submit" class="btn-green pull-right post-update-brand"><span class="glyphicon glyphicon-ok"></span> Continue</button>'+
								'</div>'+
							'</div>';
 				$('.show-brand-update-content').html(data);
 				$('.show-brand-content').addClass('none');
 				$('.update-brand').removeClass('none');
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
		$('.update-brand').addClass('none');
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
		$('.update-brand').on('click','.post-update-brand',function(){
		var brand = $('.brand-name-update').val(),
			desc = $('.description-brand-update').val();
		if(brand == ''){
			$('.tiny-error-brand-name-update').html('This field is required.').removeClass('none').addClass('tiny-error-message');
			$('.brand-name-update').addClass('error-border').focus();
			return false;
		}else if(desc == ''){
			$('.tiny-error-brand-desc-update').html('This field is required.').removeClass('none').addClass('tiny-error-message');
			$('.description-brand-update').addClass('error-border').focus();
			return false;
		}
		$('.update-brand-form').submit();
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