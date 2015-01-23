@extends('default.main')
@section('content')
<div class="data-container">
	<div class="header">
		@include('supplier.supplier-menu')		
	</div>
	<div class="body">
		<div class="form-header">New Supplier</div>
		<div class="include-form">
			<div class="show-new-supplier">
				@include('supplier.add-supplier')
			</div>
		</div>
	</div>	 
</div>
@stop
@section('script')
[[HTML::script('assets/js/supplier.js')]]
@stop
