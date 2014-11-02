<div class="row" style="margin-right: -15px;margin-left: -15px;">
	<div class="col-md-12">
 		<div class="stepwizard">
		    <div class="stepwizard-row setup-panel">
		        <div class="stepwizard-step">
		            <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
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
	{{Form::open(array('url'=>'product/store','role'=>'form'))}}
    <div class="row setup-content" id="step-1">
        <div class="col-xs-12 col-md-12">
            <div class="col-md-12">
                <div class="row app-row">			
					<div class="col-md-4">
						<label>Name</label>
					</div>
					<div class="col-md-8">
						<input type="text" class="form-control product-name" name="product_name" placeholder="Name">
					</div>
				</div>
				<div class="row app-row">			
					<div class="col-md-4">
						<label>Brand</label>
					</div>
					<div class="col-md-8">
						<select class="chosen-select form-control select-brand">
							<option selected="selected">Choose Brand</option>
							@foreach($brands as $each)
								<option value="{{$each->brand_id}}">{{$each->brand_name}}</option>	
							@endforeach
						</select>
 					</div>
				</div>
				<div class="row app-row">
					<div class="col-md-4">
						<label>Category</label>
					</div>
					<div class="col-md-8">
						<select class="chosen-select form-control select-category">
							<option selected="selected">Choose Category</option>
							@foreach($parents as $parent)
								<option value="{{$parent->category_id}}">{{$parent->category_name}}</option>	
							@endforeach
						</select>
 					</div>
				</div>
				<div class="row app-row">
					<div class="col-md-4">
						<label>Description</label>
					</div>
					<div class="col-md-8">
						<textarea class="form-control product-des" style="height: 115px;">			
						</textarea>
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
