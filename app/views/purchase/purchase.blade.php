@extends('default.main')
@section('content')
<div class="data-container">
	<div class="header">
		<div class="command">
			<button class="menu-btn-green"><span class="glyphicon glyphicon-user"></span> Suppliers</button>
			<button class="menu-btn-green"><span class="glyphicon glyphicon-user"></span> Suppliers</button>
			<button class="menu-btn-green"><span class="glyphicon glyphicon-user"></span> Suppliers</button>
			<button class="menu-btn-green"><span class="glyphicon glyphicon-user"></span> Suppliers</button>
			<button class="menu-btn-green"><span class="glyphicon glyphicon-user"></span> Suppliers</button>
		</div>		
	</div>
	<div class="body">
 		<div class="form-header">
			New Purchase
		</div>
		<div class="include-form">
			<div class="row app-row">
				<div class="col-md-7" style="padding-right: 2px;padding-left: 2px;">
					<div class="well">
					    <ul class="nav nav-tabs user-tabs">
					      <li class="active"><a href="#home" data-toggle="tab">Billing</a></li>
					      <li><a href="#profile" data-toggle="tab">Shipping</a></li>
					    </ul>
					    <div id="myTabContent" class="tab-content">
					      <div class="tab-pane active in" id="home"class="home">
					      		<div id="tab"style="margin-top:10px;">

					      		<div class="row app-row">
										<div class="col-md-4">
										<label>Supplier:</label>
										</div>
										<div class="col-md-6">
											<select class="chosen-select form-control">
												<option selected="selected" value="0"> Supplier Name</option>
												<option>Option 1</option>
												<option>Option 2</option>
												<option>Option 3</option>
											</select>
										</div>
								</div>

                                <div class="row app-row">
										<div class="col-md-4">
											<label>Bill To:</label>
										</div>
										<div class="col-md-6">
											<input type="text" class="form-control bill_no" name="bill_no" placeholder="Bill To">
						 				</div>
									</div>
									<div class="row app-row">
										<div class="col-md-4">
											<label>Supplier Pan No.:</label>
										</div>
										<div class="col-md-6">
											<input type="text" class="form-control pan_no" name="pan_no" placeholder="Supplier Pan No.">
						 				</div>
									</div>
									<div class="row app-row">
										<div class="col-md-4">
											<label>Supplier Phone:</label>
										</div>
										<div class="col-md-6">
											<input type="text" class="form-control supplier_phone" name="supplier_phone" placeholder="Supplier Phone">
						 				</div>
									</div>
					      		</div>			       
					      </div>
					      <div class="tab-pane fade" id="profile">
					    	<div id="tab2" style="margin-top:10px;">
					    		content
					    	</div>
					      </div>
					  </div>			
					</div>
				</div>
				<div class="col-md-5" style="padding-right: 2px;padding-left: 2px;">
					<div class="well">
					    <ul class="nav nav-tabs user-tabs">
					      <li class="active"><a href="#home" data-toggle="tab">Invoice</a></li>
 					    </ul>
					    <div id="myTabContent" class="tab-content">
					      <div class="tab-pane active in" id="home"class="home">
					      		<div id="tab"style="margin-top:10px;">
					      			<div class="row app-row">
										<div class="col-md-4">
											<label>Invoice No:</label>
										</div>
										<div class="col-md-8">
											<input type="text" class="form-control invoice_no" name="invoice_no" placeholder="Invoice No.">
						 				</div>
									</div>
											<div class="row app-row">
												<div class="col-md-4">
													<label>Date:</label>
												</div>
												<div class="col-md-8">
													<input type="text" class="form-control datepicker purchase_date" name="purchase_date" placeholder="Date">
								 				</div>
											</div>
									<div class="row app-row">
										<div class="col-md-4">
											<label>User:</label>
										</div>
										<div class="col-md-8">
											<input type="text" class="form-control purchase_person" name="purchase_person" placeholder="Purchase Person">
						 				</div>
									</div>

					      		</div>			       
					      </div>
					  </div>			
					</div>
				</div>
			</div>

			<div class="row app-row">
				<div class="col-md-3"style="padding-right: 2px;padding-left: 2px;">
					<select class="chosen-select form-control">
						<option selected="selected" value="0"> Select Item</option>
						<option>Dell 1522</option>
						<option>Aspire 1522</option>
						<option>Acer 1522</option>
					</select>
				</div>
				<div class="col-md-3">
					<div class="row app-row">
										
									<div class="col-md-12">
											<input type="text" class="form-control description" name="description" placeholder="Description">
						 			</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="row app-row">
										
									<div class="col-md-12">
											<input type="text" class="form-control no_of_items" name="no_of_items" placeholder="No. Of Items">
						 			</div>
					</div>
				</div>
				<div class="col-md-3">
			<div class="row app-row">
				<div class="col-md-4"></div>
				<div class="col-md-12">
		              <button type="submit" class="btn-green pull-right continue"><span class="glyphicon glyphicon-ok"></span> Continue</button>
	        </div>
			</div>
				</div>
			</div>

			<div class="row app-row">
				<div class="col-md-12 table-responsive"style="padding-right: 2px;padding-left: 2px;">
					<table class="table table-stripped">
						<tr><th>Qty</th><th>Item</th><th>Description</th><th>Unit Price</th><th>Total</th><th>Action</th></td></tr>
						<tr><td></td><td></td><td></td><td></td><td></td><td></td></tr>
					</table>
				</div>
			</div>
			<div class="row app-row">
				<div class="col-md-12" style="padding-right: 2px;padding-left: 2px;">
					prices total show case
				</div>
			</div>
			<div class="row app-row">
				<div class="col-md-3"style="padding-right: 2px;padding-left: 2px;">
						<div class="row app-row">
							<div class="col-md-4"></div>
							<div class="col-md-12">
					              <button type="submit" class="btn-green pull-right submit-cheque"><span class="glyphicon glyphicon-ok"></span> Save</button>
				        </div>
						</div>	
				</div>
				<div class="col-md-3"style="padding-right: 2px;padding-left: 2px;">
					     <div class="row app-row">
							<div class="col-md-4"></div>
							<div class="col-md-12">
					              <button type="submit" class="btn-green pull-right submit-cheque"><span class="glyphicon glyphicon-ok"></span> Print</button>
				        </div>
						</div>
				</div>
				<div class="col-md-3"style="padding-right: 2px;padding-left: 2px;">
							<div class="col-md-12"style="padding-right: 2px;padding-left: 2px;">
								<select class="chosen-select form-control">
									<option selected="selected" value="0"> Payment Option</option>
									<option>Cash</option>
									<option>Credit</option>
									<option>Cheque</option>
								</select>
							</div>

				</div>
				<div class="col-md-3"style="padding-right: 2px;padding-left: 2px;">
					     <div class="row app-row">
							<div class="col-md-4"></div>
							<div class="col-md-12">
					              <button type="submit" class="btn-green pull-right cancel"><span class="glyphicon glyphicon-ok"></span> Cancel</button>
				        </div>
						</div>
				</div>

			</div>
		</div>
	</div>	 
</div>
@stop