@extends('default.main')
@section('content')
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
		</div>
		<div class="include-form">
			<div class="table-responsive">
					<table class="table table-striped table-hover">
						<tr><th>Product</th><th>Description</th><th>Action</th></tr>
						@foreach($products as $product)
							<tr><td><a href="#" class="view-icon" data-id="[[$product->product_id]]">[[$product->product_name]]</a></td>
								<td><?php  
										$text = $product->description;
										if( strlen( $text ) < 50 ) {
 											echo '<a href="#" data-target="#product-detail" data-toggle="modal" class="view-icon" data-id="'.$product->product_id.'">'.$text.'</a>';
										} else {
											$cut_text = substr( $text, 0, 50 );
											$last_space = strrpos( $cut_text, " " );
											$short_text = substr( $cut_text, 0, $last_space );
											$end_text = $short_text."...";
											echo '<a href="#" data-target="#product-detail" data-toggle="modal" class="view-icon" data-id="'.$product->product_id.'">'.$end_text.'</a>';
										}
										?>
									</td>
								<td><a href="#" data-id="[[$product->product_id]]" class="edit-icon each-product"><span class="glyphicon glyphicon-pencil"></span></a></td></tr>
						@endforeach
				</table>
			</div>
			[[$products->links()]]
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
			<div class="modal-body data-wrapper">
					list of product details
			</div>
			<div class="modal-footer">
 				<button type="button" class="btn-green" data-dismiss="modal">Close</button>
			</div>
    	</div>
  	</div>
</div>
@stop
