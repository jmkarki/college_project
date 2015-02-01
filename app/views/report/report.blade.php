@extends('default.main')
@section('content')
<div class="data-container">
	<div class="header">
		<div class="command">
			<a href="[[URL::to('customer')]]" class="menu-btn-green"><span class="glyphicon glyphicon-list"></span> Sales Report</a>
			<!-- <a href="[[URL::to('customer/list')]]" class="menu-btn-green"><span class="glyphicon glyphicon-list"></span> List customers</a> -->
		</div>		
	</div>
	<div class="body">
		contents goes inside here
	</div>	 
</div>
@stop