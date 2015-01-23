@extends('default.main')
@section('content')
<div class="data-container">
	<div class="header">
	@include('supplier.supplier-menu')
	</div>
	<div class="body">
		<div class="form-header">Update Supplier</div>
		<div class="include-form">
			<div class="show-new-customer">
				@include('supplier.update-supplier')
			</div>
		</div>

	</div>	 
</div>
@stop

