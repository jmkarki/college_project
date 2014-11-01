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
		$('.form-header').html('Add New supplier Record.');
		$('.new_supplier').click(function(){
			$('.show-new-supplier').removeClass('none');
			$('.form-header').html('Add New supplier Record.');
			$('.show-available-suppliers').addClass('none');
		});
		$('.list-supplier').click(function(){
			$('.show-available-suppliers').removeClass('none');
			$('.form-header').html('List of active suppliers availavle with us.');
			$('.show-new-supplier').addClass('none');
		});
		$('.submit-supplier').click(function(){
			var name = $('.supplier_name').val() ,
				address = $('.supplier_address').val() ,
				phone = $('.phone').val(),
				mobile = $('.mobile').val(),
				email = $('.email').val(),
				type = $('.select_type').val();
			if(name == ''){
				$('.tiny-error-name').html('Name is required.').removeClass('none').addClass('tiny-error-message');
				$('.supplier_name').addClass('error-border').focus();
				return false;
			}else if(address == ''){
				$('.tiny-error-address').html('Address is required.').removeClass('none').addClass('tiny-error-message');
				$('.supplier_address').addClass('error-border').focus();
				return false;
			}else if(phone == ''){
				$('.tiny-error-phone').html('Phone number is required.').removeClass('none').addClass('tiny-error-message');
				$('.phone').addClass('error-border').focus();
				return false;
			}else if(mobile == ''){
				$('.tiny-error-mobile').html('Mobile number is required.').removeClass('none').addClass('tiny-error-message');
				$('.mobile').addClass('error-border').focus();
				return false;
			}else if(email == ''){
				$('.tiny-error-email').html('Email address is required.').removeClass('none').addClass('tiny-error-message');
				$('.email').addClass('error-border').focus();
				return false;
			}else if(type == null){
				$('.tiny-error-type').html('Select type of person.').removeClass('none').addClass('tiny-error-message');
				$('.select_type').addClass('error-border').focus();
				return false;
			}else{
				return true;
			}
		});
		$('.supplier_name').change(function(){
			$('.tiny-error-name').addClass('none');
			$(this).removeClass('error-border');
		});
		$('.supplier_address').change(function(){
			$('.tiny-error-address').addClass('none');
			$(this).removeClass('error-border');
		});
		$('.phone').change(function(){
			$('.tiny-error-phone').addClass('none');
			$(this).removeClass('error-border');
		});
		$('.mobile').change(function(){
			$('.tiny-error-mobile').addClass('none');
			$(this).removeClass('error-border');
		});
		$('.email').change(function(){
			$('.tiny-error-email').addClass('none');
			$(this).removeClass('error-border');
		});
		$('.select_type').change(function(){
			$('.tiny-error-type').addClass('none');
			$(this).removeClass('error-border');
		});
	});
</script>
@stop