@extends('default.main')
@section('content')
<div class="data-container">
	<div class="header">
		<div class="command">
			<button class="menu-btn-green new-product"><span class="glyphicon glyphicon-plus"></span> Product</button>
			<button class="menu-btn-green new-category"><span class="glyphicon glyphicon-plus"></span> Category</button>
			<button class="menu-btn-green new-brand"><span class="glyphicon glyphicon-plus"></span> Brand</button>
			<button class="menu-btn-green"><span class="glyphicon glyphicon-chevron-down" style="font-size:12px;"></span> Product List</button>
			<button class="menu-btn-green"><span class="glyphicon glyphicon-chevron-down"style="font-size:12px;"></span> Category List</button>
			<button class="menu-btn-green"><span class="glyphicon glyphicon-chevron-down"style="font-size:12px;"></span> Brand List</button>
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
		</div>
	</div>	 
</div>
@stop
