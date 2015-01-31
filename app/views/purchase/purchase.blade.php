@extends('default.main')
@section('content')
<div class="data-container">
	<div class="header">
		@include('purchase.purchase-menu')		
	</div>
	<div class="body">
 		<div class="form-header">
			<b>Purchase Panel</b>
		</div>
		<div class="include-form">
			<div class="row">
				<div class="col-md-3">
					<input type="text" class="datepicker form-control form-app" value="[[date('Y-m-d')]]">
				</div>
				<div class="col-md-2">
					<input type="text" class="form-control form-app supplier-id" disabled>
				</div>
				<div class="col-md-4">
					<select class="form-control chosen-select change-supplier">
						<option disabled selected value="0">Select Supplier</option>
						@foreach($suppliers as $each)
							<option value="[[$each->supplier_id]]">[[$each['persons']->fullname .'('. $each['persons']->addressline1 .')']]</option>
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
				<div class="col-md-3">
					<select class="form-control  current-option form-app" disabled placeholder="Select Option">						
					</select>
				</div>
				<div class="col-md-2">
					<input type="text" class="form-control unit form-app" name="no_of_items" placeholder="Unit">
				</div>
				<div class="col-md-2">
					<button type="submit" class="btn-green pull-right continue"><span class="glyphicon glyphicon-plus"></span> Add</button>
				</div>
			</div><br>

			<div class="row app-row">
				<div class="col-md-12 table-responsive">
					<table class="table table-stripped">
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
					<div style="margin-left:30px;"><b>Net Amount:</b> <span class="border-dot">0:00</span></div>
				</div>
			</div>
		</div>
	</div>	 
</div>
<input type="hidden" value="[[URL::to('/')]]" class="base-url">
@stop
@section('script')
	<script type="text/javascript">
		$(document).ready(function(){
			$('.change-supplier').on('change',function(){
				$('.supplier-id').val($(this).val());
			});
		});	
		$('.each-item').on('change',function(){
			$('.item-code').val($(this).val());
			$.ajax({
				url : $('.base-url').val()+'/purchase/productoption',
				type: 'POST',
				data:{id: $(this).val()},
				success:function(data){
					console.log(data);
					return false;
					var option = '<option selected disabled>Select Option</option>';
					for(i = 0; i < data.length; i++){
						option = option + '<option value="'+data[i].option_id+'">'+data[i].option_name+'</option>';
					}
					$('.current-option').html(option).prop('disabled',false);
				}
			});
		});
	</script>
@stop