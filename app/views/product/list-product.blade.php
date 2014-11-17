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
										$text = $product->description;
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
		        <h5 class="modal-title">Product Name</h5>
		    </div>
			<div class="modal-body product-data-wrapper">
					list of product details
			</div>
			<div class="modal-footer">
 				<button type="button" class="btn-green" data-dismiss="modal">Close</button>
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
					console.log(response); return false;
					$('.product-data-wrapper').html(response);
				}

			});
		});
	});
</script>
@stop
