@extends('default.main')
@section('content')
<div class="data-container">
	<div class="header form-header">
		@include('purchase.purchase-menu')
		<b style="text-transform:uppercase;">Sales Panel</b>		
	</div>
	<div class="body">
		<div class="include-form">
			<div class="row">
				<div class="col-md-3">
					<input type="text" class="datepicker form-control form-app" value="[[date('Y-m-d')]]">
				</div>
				<div class="col-md-2">
					<input type="text" class="form-control form-app customer-id" disabled>
				</div>
				<div class="col-md-4">
					<select class="form-control chosen-select change-customer">
						<option disabled selected value="0">Select customer</option>
						@foreach($customers as $each)
							<option value="[[$each->customer_id]]">[[$each['persons']->fullname .'('. $each['persons']->addressline1 .')']]</option>
						@endforeach
					</select>
				</div>
			</div><br>	
			<div class="row app-row">
				<div class="col-md-2">
					<input type="text" class="form-control form-app item-code" disabled>
				</div>
				<div class="col-md-3">
					<select class="chosen-select form-control each-item">
						<option selected="selected" value="0" disabled> Select Item</option>
						@foreach($items as $each)
							<option value="[[$each->product_id]]" data-desc="[[$each->product_description]]">[[$each->product_name]]</option>
						@endforeach
					</select>
				</div>
				<div class="col-md-2">
					<select class="current-option custom-select" disabled>						
						<option selected disabled>Select Option</option>
					</select>
				</div>
				 <div>
					<input type="hidden" class="unit-price">
				</div> 
				<div class="col-md-2">
					<input type="text" class="form-control unit form-app" name="unit" placeholder="Unit" style="margin-left: 43px;">
				</div>				
				<div class="col-md-2">
					<button type="submit" class="btn-green pull-right add-items"><span class="glyphicon glyphicon-plus"></span>Add</button>
				</div>
			</div><br>

			<div class="row app-row">
				<div class="col-md-12 table-responsive">
					<table class="table table-stripped particulars">
						<tr>
							<th>Product</th>
							<th>Description</th>
							<th>Quantity</th>
							<th>Unit Price</th>
							<th>Subtotal</th>
						</tr>
					</table>
				</div>
				<div class="col-md-12"><hr></div>
				<div class="col-md-4"></div>
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<div style="margin-left:30px;"><b>Net Amount:</b> <span class="border-dot final-net-amount">0.00</span></div>
				</div>
			</div>
		</div>
	</div>	 
</div>
<input type="hidden" value="[[URL::to('/')]]" class="base-url">
<input type="hidden" value="0" class="net-amount">

@stop
@section('script')
	<script type="text/javascript">
		$(document).ready(function(){
			$('.change-customer').on('change',function(){
				$('.customer-id').val($(this).val());
			});
		});	
		$('.each-item').on('change',function(){
			$('.item-code').val($(this).val());
			$.ajax({
				url : $('.base-url').val()+'/sales/productoption',
				type: 'POST',
				data:{id: $(this).val()},
				success:function(response){
					var option = '<option selected disabled>Select Option</option>';
					for(i = 0; i < response.length; i++){
						option = option + '<option value="'+response[i].option_id+'">'+response[i].option_name+'</option>';
					}
					$('.current-option').html(option).prop('disabled',false);
				}
			});
		});

		$('.custom-select').on('change',function(){
			$.ajax({
				url : $('.base-url').val()+'/sales/optionprice',
				type: 'POST',
				data:{id: $(this).val()},
				success:function(response){
					$('.unit-price').val(response);
				}
			});
			$('.add-items').prop('disabled',false);
		});
		$('.add-items').on('click',function(){
			var item = $('.each-item option:selected').text(),
				option = $('.custom-select option:selected').text(),
				price = $('.unit-price').val(),
				unit = $('.unit').val(),
				subtotal = unit*price;
				console.log('Subtotal' + subtotal);
				prev_net_amount = parseInt($('.net-amount').val());
				new_net_amount = prev_net_amount + subtotal;
				console.log('New - ' + new_net_amount);
				$('.net-amount').val(new_net_amount);
				$('.final-net-amount').html(new_net_amount.toFixed(2));

			var tr = '<tr><td>'+item+'</td>	<td>'+option+'</td>	<td>'+unit+'</td>	<td>'+price+'</td><td>'+subtotal+'</td></tr>';
			$('.particulars').append(tr);
			$(this).prop('disabled',true);
		});
	</script>
@stop