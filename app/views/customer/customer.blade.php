@extends('default.main')
@section('content')
<div class="data-container">
	<div class="header">
		<div class="command">
			<button class="menu-btn-green new_customer"><span class="glyphicon glyphicon-plus"></span> Customer</button>
			<button class="menu-btn-green"><span class="glyphicon glyphicon-user"></span> Supplier</button>
			<button class="menu-btn-green"><span class="glyphicon glyphicon-user"></span> Suppliers</button>
			<button class="menu-btn-green"><span class="glyphicon glyphicon-user"></span> Suppliers</button>
			<button class="menu-btn-green"><span class="glyphicon glyphicon-user"></span> Suppliers</button>
		</div>		
	</div>
	<div class="body">
		<div class="form-header">
			heading
		</div>
		<div class="include-form">
			<div class="show-new-customer none">
				@include('customer.add-customer')
			</div>
			<div class="show-available-customers">
				<table class="table table-responsive table-stripped">
					<tr>
						<th>Name</th>
						<th>Address</th>
						<th>Phone</th>
						<th>Email</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
					@foreach($customers as $customer)
					<tr>
						<td>{{$customer->fullname}}</td>
						<td>{{$customer->address}}</td>
						<td>blank</td>
						<td>blank</td>
						<td>
							@if($customer->status == 0)
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
		$('.form-header').html('List of active customers availavle with us.');
		$('.new_customer').click(function(){
			$('.show-available-customers').hide();
			$('.form-header').html('Add New Customer Record.');
			$('.show-new-customer').removeClass('none');
		});
	});
</script>
@stop