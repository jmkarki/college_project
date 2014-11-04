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
		        <div class="stepwizard-step">
		            <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
		            <p>Step 3</p>
		        </div>
		    </div>
		</div> 
	</div>
</div>
<div class="row" style="margin-right: -15px;margin-left: -15px;">
	{{Form::open(array('url'=>'product/store','role'=>'form','enctype'=>'multipart/form-data'))}}
    <div class="row setup-content" id="step-1">
        <div class="col-xs-12 col-md-12">
            <div class="col-md-12">
                <div class="row app-row">			
					<div class="col-md-4">
						<label>Name:</label>
					</div>
					<div class="col-md-8">
						<input type="text" class="form-control productName" name="product_name" placeholder="Product Name">
						<span class="none product-name-message"></span>
					</div>
				</div>
				<div class="row app-row">			
					<div class="col-md-4">
						<label>Brand:</label>
					</div>
					<div class="col-md-8">
						<select class="chosen-select form-control selectBrand">
							<option selected="selected" value="0">Choose Brand</option>
							@foreach($brands as $each)
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
						<select class="chosen-select form-control selectCategory">
							<option selected="selected" value="0">Choose Category</option>
							@foreach($parents as $parent)
								<option value="{{$parent->category_id}}">{{$parent->category_name}}</option>	
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
						<a href="" class="btn-green" id="addApicture" tabindex='25' data-toggle="modal" data-target="#addPicture">Add a picture</a>
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
						<textarea class="form-control product-des-value" style="height: 115px;">			
						</textarea>
						<span class="none product-des-message"></span>
 					</div>
				</div>
				<div class="row app-row">
		 			<div class="col-md-4">		
					</div>
					<div class="col-md-8">
						<button type="button" class="btn-green nextBtn pull-right"><span class="glyphicon glyphicon-ok"></span> Continue</button>
					</div>
				</div>
             </div>
        </div>
    </div>
    <div class="row setup-content" id="step-2">
        <div class="col-xs-12">
            <div class="col-md-12">
                 <div class="form-group">
                    <label class="control-label">Company Name</label>
                    <input maxlength="200" type="text" class="form-control" placeholder="Enter Company Name" />
                </div>
                <div class="form-group">
                    <label class="control-label">Company Address</label>
                    <input maxlength="200" type="text" class="form-control" placeholder="Enter Company Address"  />
                </div>
                <button class="btn-green nextBtn pull-right" type="button" ><span class="glyphicon glyphicon-ok"></span> Continue</button>
            </div>
        </div>
    </div>
    <div class="row setup-content" id="step-3">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Step 3</h3>
                <button class="btn-green nextBtn pull-right" type="submit"><span class="glyphicon glyphicon-ok"></span> Submit</button>
            </div>
        </div>
    </div>
{{Form::close()}}
</div>
<!-- Modal -->
<div class="modal fade" id="addPicture" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
    	<div class="modal-content">
			<div class="modal-header app-modal-header">
			<button type="button" class="close close-medical" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title app-modal-title">Add a picture</h4>
			</div>
			<div class="modal-body">
				<div class="wrap">
					{{Form::file('uploadImage', array('id'=>'uploadImage', 'onchange'=>'readURL(this);'))}}
					<div class="upload-buttons app-row">
						<button type="button" id='ok_btn' class="btn-green">OK</button>
						<button type="button" id='close_btn' class="btn-green" data-dismiss="modal">Cancel</button>
					</div>
					<input type="hidden" id="x" name="x" />
					<input type="hidden" id="y" name="y" />
					<input type="hidden" id="w" name="w" />
					<input type="hidden" id="h" name="h" />
					<input id="chag_sort" type="hidden" name="chag_sort">
					<img id="uploadPreview" width="300px" height="auto" style="display:none;"/>
					<input type="hidden" id="removed" name="removed" value="0" />
 				</div>	
			</div>
    	</div>
  	</div>
</div>