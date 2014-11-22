@extends('default.main')
@section('content')
<div class="current-stage">
        Home/ New sales
</div>
<div class="data-container">
@include('sales.sales-menu')
	<div class="body">
		<div class="form-header">
			New Sales
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
										<label>Customer:</label>
										</div>
										<div class="col-md-6">
											<select class="chosen-select form-control">
												<option selected="selected" value="0"> Customer Name</option>
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
											<label>Customer Pan No.:</label>
										</div>
										<div class="col-md-6">
											<input type="text" class="form-control pan_no" name="pan_no" placeholder="Customer Pan No.">
						 				</div>
									</div>
									<div class="row app-row">
										<div class="col-md-4">
											<label>Customer Phone:</label>
										</div>
										<div class="col-md-6">
											<input type="text" class="form-control customer_phone" name="customer_phone" placeholder="Customer Phone">
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
													<input type="text" class="form-control datepicker sales_date" name="sales_date" placeholder="Date">
								 				</div>
											</div>
									<div class="row app-row">
										<div class="col-md-4">
											<label>Salesperson:</label>
										</div>
										<div class="col-md-8">
											<input type="text" class="form-control sales_person" name="sales_person" placeholder="Sales Person">
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
						<option>Option 1</option>
						<option>Option 2</option>
						<option>Option 3</option>
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