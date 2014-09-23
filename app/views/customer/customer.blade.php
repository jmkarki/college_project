@extends('default.main')
@section('content')
<div class="data-container">
	<div class="header">
		<div class="command">
			<button class="menu-btn-green"><span class="glyphicon glyphicon-plus"></span> Customer</button>
			<button class="menu-btn-green"><span class="glyphicon glyphicon-user"></span> Supplier</button>
			<button class="menu-btn-green"><span class="glyphicon glyphicon-user"></span> Suppliers</button>
			<button class="menu-btn-green"><span class="glyphicon glyphicon-user"></span> Suppliers</button>
			<button class="menu-btn-green"><span class="glyphicon glyphicon-user"></span> Suppliers</button>
		</div>		
	</div>
	<div class="body">
		<div class="new-customer">
			@include('customer.add-customer')
		</div>
	</div>	 
</div>
@stop