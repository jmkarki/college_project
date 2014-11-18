@extends('default.main')
@section('content')
	<div class="current-stage">
		Home/ Product/ List Product
	</div>
<div class="data-container">
	@include('product.product-menu')
	<div class="body">
		@if(Session::has('message'))
		<div class="alert alert-success success-message">
			[[Session::get('message')]]
			<a href="" class="pull-right alert-close tiny"><span class="glyphicon glyphicon-remove"></span></a>
		</div>
		@endif
		<div class="form-header">
			<i class="fa fa-align-left"></i> List of availavle products.
			<span class="pull-right" style="text-transform: none !important;font-weight: bolder;font-size: 14px !important;line-height: 18px;">Showing [[ $products->getFrom() ]] to [[ $products->getTo() ]] of [[ $products->getTotal() ]] products.</span>
		</div>
		<div class="include-form">
			<div class="table-responsive">
					<table class="table table-striped table-hover product-container">
						<tr><th>S.N</th><th>Product</th><th>Description</th><th>Action</th></tr>
						<?php $sn = $products->getFrom(); ?>
						@foreach($products as $product)
							<tr><td>[[$sn]]</td><td><a href="#" data-target="#product-detail" data-toggle="modal" class="view-icon each-product" data-id="[[$product->product_id]]">[[$product->product_name]]</a></td>
								<td><?php  
										$text = $product->product_description;
										if( strlen( $text ) < 50 ) {
 											echo '<a href="#" data-target="#product-detail" data-toggle="modal" class="each-product view-icon" data-id="'.$product->product_id.'">'.$text.'</a>';
										} else {
											$cut_text = substr( $text, 0, 50 );
											$last_space = strrpos( $cut_text, " " );
											$short_text = substr( $cut_text, 0, $last_space );
											$end_text = $short_text."...";
											echo '<a href="#" data-target="#product-detail" data-toggle="modal" class="each-product view-icon" data-id="'.$product->product_id.'">'.$end_text.'</a>';
										}
										?>
									</td>
								<td><a href="#" data-id="[[$product->product_id]]" class="edit-icon"><span class="glyphicon glyphicon-pencil"></span></a></td></tr>
								<?php $sn++; ?>
						@endforeach
				</table>
			</div>
			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-6">[[$products->links()]]</div>
				<input type="hidden" class="base-url" value="[[URL::to('/')]]">
			</div>
		</div>	 
	</div>
</div>
<div class="modal fade" id="product-detail" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
     	<div class="modal-content model-data-content">
	    	<div class="modal-header app-modal">
		        <button type="button" class="close close-file" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h5 class="modal-title">Product Details...</h5>
		    </div>
			<div class="modal-body product-data-wrapper">
				<div class="product-content">
					<div class="row app-row product-holder">
						<div class="col-md-4">
							<div class="product-image">
								<img src="[[URL::to('assets/images/test.jpg')]]" height="200" width="200">
							</div>
						</div>
						<div class="col-md-8">
							<div class="product-title">Dell Tek Backpack</div>
							<div class="product-des">
									90 days Premium Phone Support 
									24x7 advanced phone support for hardware and software issues (including support for 3rd party software). You can count on us for a great experience and rapid support.

									One year In-Home Service after Remote diagnosis8
									Have a technician and/or part dispatched to your home following remote diagnosis if the issue is covered by Dell’s Limited Hardware Warranty.9
									
							</div>		
						</div>
					</div>						
					<div class="option-content">
						<div class="row app-row">						
							<div class="col-md-4">
								<div class="option-title">
									Dell Tek Backpack - 15.6”
								</div>
								<div class="option-price">
									Cost Price: <strong>Rs.400</strong>
								</div>
								<div class="option-price">
									Market Price: <strong>Rs.400</strong>
								</div>
								<div class="option-price">
									Selling Price: <strong>Rs.400</strong>
								</div>
							</div>
							<div class="col-md-8">
								<div class="option-des">
									90 days Premium Phone Support 24x7 advanced phone support for hardware and software issues (including support for 3rd party software). You can count on us for a great experience and rapid support. One year In-Home Service after Remote diagnosis8 Have a technician and/or part dispatched to your home following remote diagnosis if the issue is covered by Dell’s Limited Hardware Warranty.9 Dell Cloud Data Tools, now standard on all PCs Never be without your data, no matter where you are.
								</div>
							</div>
						</div>
						<div class="row app-row">
							<div class="table-responsive">
								<table class="table table-stripped">
									<tr><th>Lot No</th><th>Batch No</th><th>Manufactured Date</th><th>Purchased Date</th><th>Expiry Date</th></tr>
									<tr><td>89898JKJ</td><td>9898HHJH</td><td>12/13/2014</td><td>12/23/2014</td><td>12/31/2015</td></tr>
								</table>
							</div>
						</div>
						<button type="button" class="btn btn-green pull-right" data-dismiss="modal">Close</button>						
					</div>
				</div>
			</div>
    	</div>
  	</div>
</div>
@stop
@section('script')
<script type="text/javascript">
	$(document).ready(function(){
		var base_url =$('.base-url').val();
		$('.product-container').on('click','.each-product',function(){
			var id = $(this).data('id');
			$.ajax({
				url: base_url+'/product/currentproduct',
				type: 'GET',
				data:{product_id:id},
				success:function(response){
					console.log(response.option[0].price.option_id); return false;
					$('.product-data-wrapper').html(response);
				}

			});
		});
	});
</script>
@stop
