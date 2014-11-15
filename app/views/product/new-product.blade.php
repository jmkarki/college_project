<div class="row" style="margin-right: -15px;margin-left: -15px;">
	<div class="col-md-12">
 		<div class="stepwizard">
		    <div class="stepwizard-row setup-panel">
		        <div class="stepwizard-step">
		            <a href="#step-1" type="button" class="btn btn-primary btn-circle btn-step-1">1</a>
		            <p>Step 1</p>
		        </div>
		        <div class="stepwizard-step">
		            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
		            <p>Step 2</p>
		        </div>
		    </div>
		</div> 
	</div>
</div>
<div class="row" style="margin-right: -15px;margin-left: -15px;">
	{{Form::open(array('url'=>'product/store','class'=>'productForm','role'=>'form','enctype'=>'multipart/form-data'))}}
    <div class="row setup-content" id="step-1">
        <div class="col-xs-12 col-md-12">
            <div class="col-md-12">
                <div class="row app-row">
 					<div class="col-md-4">
						<label>Name:</label>
					</div>
					<div class="col-md-8">
						<input type="text" class="form-control required productName" name="product_name" placeholder="Product Name">
						<span class="none product-name-message"></span>
					</div>
				</div>
				<div class="row app-row">			
					<div class="col-md-4">
						<label>Brand:</label>
					</div>
					<div class="col-md-8">
						<select class="chosen-select form-control required selectBrand" name="select_brand">
							<option selected="selected" value="0">Choose Brand</option>
							@foreach($brand as $each)
								<option value="{{$each->brand_id}}">{{$each->brand_name}}</option>	
							@endforeach
						</select>
						<span class="product-brand-message none"></span>
 					</div>
				</div>
				<div class="row app-row">
					<div class="col-md-4">
						<label>Category:</label>
					</div>
					<div class="col-md-8">
						<select class="chosen-select form-control required selectCategory" name="select_category">
							<option selected="selected" value="0"> Choose Category</option>
							@foreach($category as $each)
								<option value="{{$each->category_id}}">{{$each->category_name}}</option>	
							@endforeach
						</select>
						<span class="product-cate-message none"></span>
 					</div>
				</div>
				<div class="row app-row">
					<div class="col-md-4 col-sm-5 form-label">
							{{ Form::label('Picture:')}}
					</div>
					<div class="col-md-8 col-sm-7 form-field" id="imgdiv">
						<a href="" class="btn-green" id="addApicture" data-toggle="modal" data-target="#addPicture">Add a picture</a>
						<div id="prev_img" style="width: 100px; height: 100px; overflow: hidden; margin-top:6px; display:none;">
							<img src="" >
						</div>
					</div>
				</div>
				<div class="row app-row">
					<div class="col-md-4">
						<label>Description:</label>
					</div>
					<div class="col-md-8"> 
						<textarea class="form-control required product-des-value" rows="6" wrap="physical" name="description"></textarea>
						<span class="none product-des-message"></span>
 					</div>
				</div>
				<div class="row app-row">
		 			<div class="col-md-4">		
					</div>
					<div class="col-md-8">
						<button type="button" class="btn-green nextBtn step-1 pull-right"><span class="glyphicon glyphicon-ok"></span> Continue</button>
					</div>
				</div>
             </div>
        </div>
    </div>
    <div class="row setup-content" id="step-2">
        <div class="col-xs-12">
            <div class="col-md-12">                 
            <h4>Option for Product.</h4>
              	<div class="option-holder">
            		<div class="option-container">
	            		<hr>		
		            	<div class="row app-row">	
							<div class="col-md-4">
								<label>Option Name:</label>
							</div>
							<div class="col-md-8">
								<input type="text" class="form-control required" name="option_name[0]" placeholder="Option Name">
							</div>
						</div>
						<div class="row app-row">	
		 					<div class="col-md-4">
								<label>Option Desc:</label>
							</div>
							<div class="col-md-8">
								<textarea class="form-control required" rows="4" wrap="physical" name="option-desc[0]"></textarea>
							</div>
						</div>
						<div class="row app-row">	
							<div class="col-md-4">
								<label>Purchased On:</label>
							</div>
							<div class="col-md-8">
								<input type="text" class="form-control required datepicker" name="purchasedon[0]" placeholder="Purchased On">
							</div>
						</div>
						<div class="row app-row">	
		 					<div class="col-md-4">
								<label>Batch No, Lot No:</label>
							</div>
							<div class="col-md-8">
								<div class="row app-row">
									<div class="col-md-6 row-margin-right">
										<input type="text" class="form-control required" name="batchno[0]" placeholder="Batch No.">
									</div>
									<div class="col-md-6 row-margin-right">
										<input type="text" class="form-control required" name="lotno[0]" placeholder="Lot No.">
									</div>
								</div>
							</div>
						</div>
						<div class="row app-row">	
							<div class="col-md-4"><label>Date:</label></div>
							<div class="col-md-8">
								<div class="row app-row">
								<div class="col-md-6 row-margin-right">
									<input type="text" name="manufacture-date[0]" class="datepicker form-control required" placeholder="Manufactured Date">
								</div>
								<div class="col-md-6 row-margin-left">
									<input type="text" name="expiry-date[0]" class="datepicker form-control required" placeholder="Expiry Date">
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
										<input type="text" name="cp[0]" class="form-control required" placeholder="Cost Price">
									</div>
									<div class="col-md-4 row-margin-right row-margin-left">
										<input type="text" name="sp[0]" class="form-control required" placeholder="Selling Price">
									</div>
									<div class="col-md-4 row-margin-left">
										<input type="text" name="mp[0]" class="form-control required" placeholder="Market Price">
									</div>
								</div>
							</div>
						</div>
            		</div>	
            	</div>           	 
				<button class="btn-green one-more" type="button"><span class="glyphicon glyphicon-plus" style="font-size:10px;"></span> 1 Option</button>
			 	<button class="btn-green nextBtn submit-product pull-right" type="submit" ><span class="glyphicon glyphicon-ok"></span> Continue</button>
             </div>
        </div>
    </div>
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
				</div>
	    	</div>
	  	</div>
	</div>
{{Form::close()}}
</div>
