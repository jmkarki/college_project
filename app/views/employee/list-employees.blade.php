@extends('default.main')
@section('content')
<div class="data-container">
	@include('employee.employee-menu')
	<div class="body">
		<div class="form-header">New Employee.</div>
		<div class="include-form">
			<div class="table-responsive">
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
					@foreach($employees as $employee)
						@if($employee->persons->company_id == Session::get('company_id'))
							<tr>
								<td>[[$employee->persons->fullname]]</td>
								<td>[[$employee->persons->address]]</td>
								<td>[[$employee->persons->phone]]</td>
								<td>[[$employee->persons->mobile]]</td>
								<td>[[$employee->persons->email]]</td>
								<td>
									@if($employee->persons->status == 0)
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
[[HTML::script('assets/js/supplier.js')]]
@stop
