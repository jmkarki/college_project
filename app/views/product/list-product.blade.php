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
			<i class="fa fa-align-left"></i> List of availavle products.
		</div>
		<div class="include-form">
			<div class="table-responsive">
					<table class="table table-striped table-hover">
						<tr><th>Product</th><th>Description</th><th>Action</th></tr>
						@foreach($products as $product)
							<tr><td>{{$product->product_name}}</td><td>{{$product->description}}</td><td><a href="javascript:void(0)" data-id="{{$product->product_id}}" class="edit-icon each-product"><span class="glyphicon glyphicon-pencil"></span></a></td></tr>
						@endforeach
				</table>
			</div>
			{{$products->links()}}
		</div>	 
	</div>
</div>
@stop
