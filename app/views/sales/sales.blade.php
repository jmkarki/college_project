@extends('default.main')
@section('content')
<div class="data-container">
@include('sales.sales-menu')
	<div class="body">
		<table class="table table-responsive table-stripped">
			<tr>
				<th>Code</th>
				<th>Item Name</th>
				<th>Quantity</th>
				<th>Price</th>
				<th>Amount</th>
				<th>Action</th>	
			</tr>
			<tr>
				<td>IPT</td>
				<td>IBM Laptop</td>
				<td>20</td>
				<td>20000</td>
				<td>400000</td>
				<td><a href=""><span class="glyphicon glyphicon-remove"></span></a></td>
			</tr>	
						<tr>
				<td>IPT</td>
				<td>IBM Laptop</td>
				<td>20</td>
				<td>20000</td>
				<td>400000</td>
				<td><a href=""><span class="glyphicon glyphicon-remove"></span></a></td>
			</tr>
						<tr>
				<td>IPT</td>
				<td>IBM Laptop</td>
				<td>20</td>
				<td>20000</td>
				<td>400000</td>
				<td><a href=""><span class="glyphicon glyphicon-remove"></span></a></td>
			</tr>		
		</table>
	</div>	 
</div>
@stop