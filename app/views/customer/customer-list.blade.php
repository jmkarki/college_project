@extends('default.main')
@section('content')
<div class="data-container">
	@include('customer.customer-menu')
	<div class="body">
		<div class="form-header">List of Customers</div>
		<div class="customer-list">
			<div class="table-responsive">
				<table class="table table-stripped">
					<tr>
						<th>Name</th>
						<th>Address</th>
						<th>Phone</th>
						<th>Mobile</th>
						<th>Email</th>
						<th>Action</th>
					</tr>
					@foreach($customerlist as $each)
					<tr>
						<td class="each-customer" data-toggle="modal" data-target="#customer-detail" data-id="[[$each['persons']->person_id]]">[[$each['persons']->fullname]]</td>
						<td>[[$each['persons']->address1]]</td>
						<td>[[$each['persons']->phone]]</td>
						<td>[[$each['persons']->mobile]]</td>
						<td>[[$each['persons']->email]]</td>
						
						<td><a class="green-icon" href="[[URL::to('customer/update/'.$each['persons']->person_id)]]">
								<span class="glyphicon glyphicon-edit"></span>
							</a>
						</td>
					</tr>
					@endforeach
				</table>
			</div>
		</div>

	</div>	 
</div>
<div class="modal fade" id="customer-detail" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
     	<div class="modal-content model-data-content">
	    	<div class="modal-header app-modal">
		        <button type="button" class="close close-file" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h5 class="modal-title"><h4>Customer Information</h4></h5>
		    </div>
			<div class="modal-body product-data-wrapper">
				<div class="product-content">
					<div class="row app-row customer-holder">

					</div>						
					<div class="option-content-holder"></div>
					<button type="button" style="bottom: 20px;position: relative;right: 20px;"class="btn-green pull-right" data-dismiss="modal">Close</button>
				</div>
			</div>
    	</div>
  	</div>
</div>
<input type="hidden" value="[[URL::to('/')]]" class="base-url">
@stop
@section('script')
<script type="text/javascript">
	var base_url = $('.base-url').val();
	$('.customer-list').on('click','.each-customer',function(){
		var id = $(this).data('id');
		$.ajax({
			url: base_url+'/customer/eachcustomer',
			async: false,
			data: {id: id},
			success:function(respose){
				var html = '<div class="col-md-4">'+
							'<div class="product-image">'+
								'<p><b>Name :</b> '+respose.fullname+'</p>'+
								'<p><b>Address Line1:</b></p>'+
								'<p>'+respose.addressline1+'</p>'+
								'<p><b>Address Line2:</b></p>'+
								'<p>'+respose.addressline2+'</p>'+
							'</div>'+
							'</div>'+
							'<div class="col-md-4">'+
								'<p><b>City:	</b> '+respose.city+'</p>'+
								'<p><b>Country:	</b>'+respose.country+'</p>'+
								'<p><b>Email:  </b>'+respose.email+'</p>'+
								'<p><b>Gender:  </b>Male</p>'+
								'<p><b>Phone(Landline):	</b> '+respose.phone+'</p>							'+
							'</div>'+
							'<div class="col-md-4">'+
								'<p><b>Mobile:	</b> '+respose.mobile+'</p>'+
								'<p><b>Zip/Postal Code:	</b> '+respose.postcode+'</p>'+
								'<p><b>Created at:	</b>'+respose.created_at+'</p>'+
							'</div>';
						$('.customer-holder').html(html);
			}
		});
	});
</script>
@stop