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
			Update Product Information.
		</div>
		<div class="include-form">
			[[Form::model($product, array('url'=>array('product/update/'.$product->product_id),'method'=>'POST','class'=>'UpdateProductForm', 'enctype'=>'multipart/form-data'))]]
				<div class="row app-row">
					<div class="col-md-4">
						<label>Name:</label>
					</div>
					<div class="col-md-8">
						<input type="text" class="form-control required" name="product_name" value="[[$product->product_name]]">
 					</div>
				</div>				
				<div class="row app-row">
					<div class="col-md-4 col-sm-5 form-label">
						[[ Form::label('Picture:')]]
					</div>
						<div class="col-md-8 col-margin col-sm-7 form-field" id="imgdiv">
						<div class="row">
							<div class="col-md-5">
								<a href="" class="btn-green" id="addApicture" data-toggle="modal" data-target="#addPicture"><i class="fa fa-picture-o"></i> Change</a>
								<div id="prev_img" style="width: 162px;height: 146px; overflow: hidden; margin-top:6px;">
									<img src="[[$product->imgUrl]]" style="width: 162px;height: 146px;">
									<?php $image_status = ($product->imgUrl != '') ? 1 : 0; ?>
									<input type="hidden" name="image_status" value="[[$image_status]]">
	 							</div>
							</div>
							<div class="col-md-7 col-margin">
								<label>Category</label>
								<select class="chosen-select form-control required selectCategory" name="select_category">
									<option selected="selected" value="[[$product->category_id]]">[[$product->categoryName]]</option>
									@foreach($product->categoryList as $category)
										<option value="[[$category->category_id]]">[[$category->category_name]]</option>
									@endforeach
								</select>
								<p></p>
								<label>Brand</label>
								<select class="chosen-select form-control required" name="select_brand">
									<option selected="selected" value="[[$product->brand_id]]">[[$product->brandName]]</option>
									@foreach($product->brandList as $brands)
										<option value="[[$brands->brand_id]]">[[$brands->brand_name]]</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>
					</div>
					<div class="row app-row">
						<div class="col-md-4">
							<label>Description:</label>
						</div>
						<div class="col-md-8"> 
							<textarea class="form-control required" rows="6" wrap="physical" name="product_description">[[$product->product_description]]</textarea>
 							</div>
					</div>
				<div class="row app-row">				
					<div class="col-md-12 option-column" style="padding-right: 1px;padding-left: 1px;">                 
			            <h4>Option for Product.</h4>
			            <?php $i = 1; $counter = count($product->option);?>
			            <div class="option-continer">
 			            @foreach($product->option as $each)			              
			              	<div class="option-holder"><hr>
			              		<div class="row app-row">
			              			<div class="col-md-12">
 			              				<h5 style="background-color: #470;padding: 10px;color: #fff;font-weight: bolder;">Option: [[$i]]</h5>
			              			</div>
			              		</div>
			            		<div class="option-container">
						            <div class="row app-row">	
										<div class="col-md-4">
											<label>Option Name:</label>
										</div>
										<div class="col-md-8">
											<input type="hidden" name="option_id[<?php echo $i ?>]" value="[[$each->option_id]]">
											<input type="hidden" name="price_id[<?php echo $i ?>]" value="[[$each->price->price_id]]">
											<input type="text" class="form-control required" name="option_name[<?php echo $i ?>]" value="[[$each->option_name]]">
										</div>
									</div>
			            		</div>	
					            <div class="row app-row">	
				 					<div class="col-md-4">
										<label>Option Desc:</label>
									</div>
									<div class="col-md-8">
										<textarea class="form-control required" rows="4" wrap="physical" name="option-desc[<?php echo $i ?>]">[[$each->option_description]]</textarea>
									</div>
								</div>
								<div class="row app-row">	
									<div class="col-md-4">
										<label>Purchased On:</label>
									</div>
									<div class="col-md-8">
										<input type="text" class="form-control datepicker required" name="purchasedon[<?php echo $i ?>]" value="[[$each->price->purchase_date]]">
									</div>
								</div>
								<div class="row app-row">	
				 					<div class="col-md-4">
										<label>Batch No, Lot No:</label>
									</div>
									<div class="col-md-8">
										<div class="row app-row">
											<div class="col-md-6 row-margin-right">
												<input type="text" class="form-control required" name="batchno[<?php echo $i ?>]" value="[[$each->price->batch_no]]">
											</div>
											<div class="col-md-6 row-margin-right">
												<input type="text" class="form-control required" name="lotno[<?php echo $i ?>]" value="[[$each->price->lot_no]]">
											</div>
										</div>
									</div>
								</div>
								<div class="row app-row">	
									<div class="col-md-4"><label>Dates:</label></div>
									<div class="col-md-8">
										<div class="row app-row">
										<div class="col-md-6 row-margin-right">
											<label>Manufactured Date</label>
											<input type="text" name="manufacture-date[<?php echo $i ?>]" class="datepicker form-control required" value="[[$each->price->manufacture_date]]">
										</div>
										<div class="col-md-6 row-margin-left">
											<label>Expiry Date</label>
											<input type="text" name="expiry-date[<?php echo $i ?>]" class="datepicker form-control required" value="[[$each->price->expiry_date]]">
										</div>
										</div>
									</div>
								</div>
								<div class="row app-row">
									<div class="col-md-4">
										<label>Prices:</label>
									</div>
									<div class="col-md-8">
										<div class="row app-row">
											<div class="col-md-4 row-margin-right">
												<label>Cost Price</label>
												<input type="text" name="cp[<?php echo $i ?>]" class="form-control required" value="[[$each->price->cost_price]]">
											</div>
											<div class="col-md-4 row-margin-right row-margin-left">
												<label>Selling Price</label>
												<input type="text" name="sp[<?php echo $i ?>]" class="form-control required" value="[[$each->price->sell_price]]">
											</div>
											<div class="col-md-4 row-margin-left">
												<label>Market Price</label>
												<input type="text" name="mp[<?php echo $i ?>]" class="form-control required" value="[[$each->price->market_price]]">
											</div>
										</div>
									</div>
								</div> 
			            	</div>			            
			            <?php $i++; ?>
			            @endforeach
			        </div>
			            <?php echo ($counter != 4) ? '<button class="btn-green update-one-more" type="button"><span class="glyphicon glyphicon-plus" style="font-size:10px;"></span> 1 Option</button>' : '';?>
						<input type="hidden" class="list-counter" value="[[$counter]]">
			 			<button class="btn-green update-product pull-right" type="submit" ><span class="glyphicon glyphicon-ok"></span> Continue</button>
			        </div>
			    </div>

				<!-- model for image change -->
				<div class="modal fade" id="addPicture" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
				    	<div class="modal-content model-data-content">
							<div class="modal-body">
								<div class="wrap">
				 					<input id="uploadImage" name="uploadImage" onchange="readURL(this);" type="file"/>
									<div class="upload-buttons app-row">
										<button type="button" id='ok_btn' disabled class="btn-green">OK</button>
										<button type="button" id='close_btn' class="btn-green" data-dismiss="modal">Cancel</button>
										<input type="hidden" class="check_close" value="0">
									</div>
									<input type="hidden" id="x" name="x" />
									<input type="hidden" id="y" name="y" />
									<input type="hidden" id="w" name="w" />
									<input type="hidden" id="h" name="h" />
									<input id="chag_sort" type="hidden" name="chag_sort">
									<img id="uploadPreview" width="500px" height="auto" style="display:none;"/>
									<input type="hidden" id="removed" name="removed" value="0" />
				 				</div>
				 				<span><i>Drag over the image inorder to select crop area.</i></span>	
							</div>
				    	</div>
				  	</div>
				</div>
				[[Form::close()]]
			</div>
		</div>
	</div>
</div>
@stop