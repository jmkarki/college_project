@extends('default.main')
@section('content')
<div class="data-container">
	<div class="header">
		<div class="command">
			<button class="menu-btn-green new_supplier"><span class="glyphicon glyphicon-plus"></span> Suppliers</button>
			<button class="menu-btn-green"><span class="glyphicon glyphicon-user"></span> Suppliers</button>
			<button class="menu-btn-green"><span class="glyphicon glyphicon-user"></span> Suppliers</button>
			<button class="menu-btn-green"><span class="glyphicon glyphicon-user"></span> Suppliers</button>
			<button class="menu-btn-green"><span class="glyphicon glyphicon-user"></span> Suppliers</button>
		</div>		
	</div>
	<div class="body">
		<div class="form-header">
		</div>
		<div class="include-form">
			<div class="show-new-supplier none">
				@include('supplier.add-supplier')
			</div>
			<div class="show-available-suppliers">
				<table class="table table-responsive table-stripped">
					<tr>
						<th>Name</th>
						<th>Address</th>
						<th>Phone</th>
						<th>Mobile</th>
						<th>Email</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
					@foreach($suppliers as $supplier)
					<tr>
						<td>{{$supplier->fullname}}</td>
						<td>{{$supplier->address}}</td>
						<td>{{$supplier->phone}}</td>
						<td>{{$supplier->mobile}}</td>
						<td>{{$supplier->email}}</td>
						<td>
							@if($supplier->status == 0)
								<span class="glyphicon glyphicon-ok"></span>
							@else
								<span class="glyphicon glyphicon-remove"></span>
							@endif
						</td>
						<td><span class="glyphicon glyphicon-edit"></span> &nbsp; <span class="glyphicon glyphicon-cloud"> </td>
					</tr>
						
					@endforeach
				</table>
			</div>
		</div>
	</div>	 
</div>
@stop
@section('script')
<script type="text/javascript">
	$(document).ready(function(){
		$('.form-header').html('List of active suppliers availavle with us.');
		$('.new_supplier').click(function(){
			$('.show-available-suppliers').hide();
			$('.form-header').html('Add New Supplier Record.');
			$('.show-new-supplier').removeClass('none');
		});
	});
</script>
@stop