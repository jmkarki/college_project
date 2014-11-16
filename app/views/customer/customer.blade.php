@extends('default.main')
@section('content')
<div class="data-container">
	<div class="header">
		<div class="command">
			<button class="menu-btn-green new_customer"><span class="glyphicon glyphicon-plus"></span> Customer</button>
			<button class="menu-btn-green list-customer"><span class="glyphicon glyphicon-list"></span> List customers</button>
			<button class="menu-btn-green"><span class="glyphicon glyphicon-user"></span> Suppliers</button>
			<button class="menu-btn-green"><span class="glyphicon glyphicon-user"></span> Suppliers</button>
			<button class="menu-btn-green"><span class="glyphicon glyphicon-user"></span> Suppliers</button>
		</div>		
	</div>
	<div class="body">
		<div class="form-header">
		</div>
		<div class="include-form">
			<div class="show-new-customer">
				@include('customer.add-customer')
			</div>
			<div class="show-available-customers table-responsive none">
				<table class="table table-stripped">
					<tr>
						<th>Name</th>
						<th>Address</th>
						<th>Phone</th>
						<th>Mobile</th>
						<th>Email</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
					@foreach($customers as $customer)
						@if($customer->persons->company_id == Session::get('company_id'))
							<tr>
								<td>[[$customer->persons->fullname]]</td>
								<td>[[$customer->persons->address]]</td>
								<td>[[$customer->persons->phone]]</td>
								<td>[[$customer->persons->mobile]]</td>
								<td>[[$customer->persons->email]]</td>
								<td>
									@if($customer->persons->status == 0)
										<span class="glyphicon glyphicon-ok"></span>
									@else
										<span class="glyphicon glyphicon-remove"></span>
									@endif
								</td>
								<td><span class="glyphicon glyphicon-edit"></span> &nbsp; <span class="glyphicon glyphicon-cloud"> </td>
							</tr>
						@endif						
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
		$('.form-header').html('New Customer.');

		$('.new_customer').on('click',function(){
		$('.show-new-customer').removeClass('none');
		$('.form-header').html('New Customer.');
		$('.show-available-customers').addClass('none');
	});
	$('.list-customer').on('click',function(){
		$('.show-available-customers').removeClass('none');
		$('.form-header').html('List of active customers availavle with us.');
		$('.show-new-customer').addClass('none');
	});
	$('.submit-customer').on('click',function(){
		var name = $('.customer_name').val() ,
			address = $('.customer_address').val() ,
			phone = $('.phone').val(),
			mobile = $('.mobile').val(),
			email = $('.email').val(),
			type = $('.select_type').val();
		if(name == ''){
			$('.tiny-error-name').html('This field is required.').removeClass('none').addClass('tiny-error-message');
			$('.customer_name').addClass('error-border');
			return false;
		}else if(address == ''){
			$('.tiny-error-address').html('This field is required.').removeClass('none').addClass('tiny-error-message');
			$('.customer_address').addClass('error-border');
			return false;
		}else if(phone == ''){
			return false;
		}else if(mobile == ''){
			return false;
		}else if(email == ''){
			return false;
		}else if(gender == ''){
			return false;
		}else if(type == ''){
			return false;
		}else{
			return true;
		}
	});
	});
</script>
@stop