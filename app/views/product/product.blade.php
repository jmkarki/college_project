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
			List of availavle products.
		</div>
		<div class="include-form">
			@include('product.new-product')
		</div>
	</div>	 
</div>
 <input type="hidden" class="incrementer" value="1">
@stop