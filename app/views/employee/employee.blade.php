@extends('default.main')
@section('content')
<div class="data-container">
	@include('employee.employee-menu')
	<div class="body">
		<div class="form-header">New Employee.</div>
		<div class="include-form">
			<div class="show-new-employee">
				@include('employee.add-employee')
			</div>
		</div>
	</div>	 
</div>
@stop
@section('script')
[[HTML::script('assets/js/supplier.js')]]
@stop
