@extends('default.main')
@section('content')
<div class="data-container">
	<div class="header">
		@include('supplier.supplier-menu')		
	</div>
	<div class="body">
		<div class="form-header">List of Existing Suppliers</div>
		@if(Session::has('message'))
		<div class="alert alert-success">
			[[Session::get('message')]]
			<a href="" class="pull-right alert-close tiny"><span class="glyphicon glyphicon-remove"></span></a>
		</div>
		@endif
		<div class="include-form supplier-list">
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
 					@foreach($suppliers as $supplier)
							<tr>
								<td class="each-supplier" data-toggle="modal" data-target="#supplier-detail" data-id="[[$supplier['persons']->person_id]]">[[$supplier['persons']->fullname]]</td>
								<td>[[$supplier['persons']->addressline1]]</td>
								<td>[[$supplier['persons']->phone]]</td>
								<td>[[$supplier['persons']->mobile]]</td>
								<td>[[$supplier['persons']->email]]</td>
								<td style="text-align: center">
									<a class="green-icon" href="[[URL::to('supplier/update/'.$supplier['persons']->person_id)]]">
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
<div class="modal fade" id="supplier-detail" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
     	<div class="modal-content model-data-content">
	    	<div class="modal-header app-modal">
		        <button type="button" class="close close-file" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h5 class="modal-title"><h4>Supplier Information</h4></h5>
		    </div>
			<div class="modal-body product-data-wrapper">
				<div class="product-content">
					<div class="row app-row supplier-holder">
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
	$('.supplier-list').on('click','.each-supplier',function(){
		var id = $(this).data('id');
		$.ajax({
			url: base_url+'/supplier/eachsupplier',
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
				$('.supplier-holder').html(html);
			}
		});
	});
</script>
@stop