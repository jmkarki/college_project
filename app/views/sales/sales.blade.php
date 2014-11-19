@extends('default.main')
@section('content')
<div class="current-stage">
        Home/ New sales
</div>
<div class="data-container">
@include('sales.sales-menu')
	<div class="body">
		<div class="form-header">
			herader edit it
		</div>
		<div class="include-form">
			<div class="row app-row">
				<div class="col-md-8" style="padding-right: 2px;padding-left: 2px;">
					<div class="well">
					    <ul class="nav nav-tabs user-tabs">
					      <li class="active"><a href="#home" data-toggle="tab">Profile</a></li>
					      <li><a href="#profile" data-toggle="tab">Settings</a></li>
					    </ul>
					    <div id="myTabContent" class="tab-content">
					      <div class="tab-pane active in" id="home"class="home">
					      		<div id="tab"style="margin-top:10px;">
					      			contnt
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
				<div class="col-md-4" style="padding-right: 2px;padding-left: 2px;">
					<div class="well">
					    <ul class="nav nav-tabs user-tabs">
					      <li class="active"><a href="#home" data-toggle="tab">Profile</a></li>
 					    </ul>
					    <div id="myTabContent" class="tab-content">
					      <div class="tab-pane active in" id="home"class="home">
					      		<div id="tab"style="margin-top:10px;">
					      			content
					      		</div>			       
					      </div>
					  </div>			
					</div>
				</div>
			</div>
			<div class="row app-row">
				<div class="col-md-12"style="padding-right: 2px;padding-left: 2px;">
					<select class="chosen-select form-control">
						<option selected="selected" value="0"> Choose Category</option>
						<option>Option 1</option>
						<option>Option 2</option>
						<option>Option 3</option>
					</select>
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
				<div class="col-md-12"style="padding-right: 2px;padding-left: 2px;">
					checkout cancel show case
				</div>
			</div>
		</div>
	</div>	 
</div>
@stop