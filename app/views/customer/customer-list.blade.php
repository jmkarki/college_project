@extends('default.main')
@section('content')
<div class="data-container">
	@include('customer.customer-menu')
	<div class="body">
		<div class="form-header">List of Customers</div>
		<div class="include-form">
			<div class="table-responsive">
				<table class="table table-stripped">
					<tr>
						<th>Name</th>
						<th>Address</th>
						<th>Phone</th>
						<th>Mobile</th>
						<th>Email</th>
						<th>Action</th>
					</tr>
					@foreach($customerlist as $each)
					<tr>
						<td><a href="#" class="green-icon" data-id="[[$each['persons']->person_id]]">[[$each['persons']->fullname]]</a></td>
						<td>[[$each['persons']->address1]]</td>
						<td>[[$each['persons']->phone]]</td>
						<td>[[$each['persons']->mobile]]</td>
						<td>[[$each['persons']->email]]</td>
						
						<td><a class="green-icon" href="[[URL::to('customer/update/'.$each->customer_id)]]">
								<span class="glyphicon glyphicon-edit"></span>
							</a>
						</td>
					</tr>
					@endforeach
				</table>
			</div>
		</div>

	</div>	 
</div>
@stop