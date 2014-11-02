@extends('default.main')
@section('content')
<div class="data-container">
	<div class="header">
		<div class="command">
			<button class="menu-btn-green new_supplier"><span class="glyphicon glyphicon-plus"></span> Suppliers</button>
			<button class="menu-btn-green list-supplier"><span class="glyphicon glyphicon-list"></span> List Suppliers</button>
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
			<div class="show-new-supplier">
				@include('supplier.add-supplier')
			</div>
			<div class="show-available-suppliers table-responsive none">
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
 					@foreach($suppliers as $supplier)
						@if($supplier->persons->company_id == Session::get('company_id'))
							<tr>
								<td>{{$supplier->persons->fullname}}</td>
								<td>{{$supplier->persons->address}}</td>
								<td>{{$supplier->persons->phone}}</td>
								<td>{{$supplier->persons->mobile}}</td>
								<td>{{$supplier->persons->email}}</td>
								<td>
									@if($supplier->persons->status == 0)
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
		$('.form-header').html('New Supplier.');
	});
</script>
@stop
