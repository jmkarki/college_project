@extends('default.main')
@section('content')
<div class="data-container">
	<div class="header">
		<div class="command">
			<button class="menu-btn-green new-employee"><span class="glyphicon glyphicon-plus"></span> Employee</button>
			<button class="menu-btn-green list-employee"><span class="glyphicon glyphicon-list"></span> List Employees</button>
			<button class="menu-btn-green"><span class="glyphicon glyphicon-user"></span> Suppliers</button>
			<button class="menu-btn-green"><span class="glyphicon glyphicon-user"></span> Suppliers</button>
			<button class="menu-btn-green"><span class="glyphicon glyphicon-user"></span> Suppliers</button>
		</div>		
	</div>
	<div class="body">
		<div class="form-header">
			New Employee.
		</div>
		<div class="include-form">
			<div class="show-new-employee">
				@include('employee.add-employee')
			</div>
			<div class="show-available-employees table-responsive none">
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
								<td>{{$employee->persons->fullname}}</td>
								<td>{{$employee->persons->address}}</td>
								<td>{{$employee->persons->phone}}</td>
								<td>{{$employee->persons->mobile}}</td>
								<td>{{$employee->persons->email}}</td>
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
<script type="text/javascript">
	$(document).ready(function(){
		$('.form-header').html('New Employee.');
	});
</script>
@stop
