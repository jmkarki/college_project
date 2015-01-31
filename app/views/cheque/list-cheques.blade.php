@if(Session::has('message'))
<div class="alert alert-success success-message">
	[[Session::get('message')]]
	<a href="" class="pull-right alert-close tiny"><span class="glyphicon glyphicon-remove"></span></a>
</div>
@endif
<div class="form-header">
	List of Cheque Payment Records
</div>
<div class="include-form table-responsive">
<table class="table table-stripped">
	<tr>
		<th>Name</th>
		<th>Bank</th>
		<th>Phone</th>
		<th>Cheque No.</th>
		<th>Due Date</th>
		<th>Status</th>
		<th>Action</th>
	</tr>
	@foreach($cheques as $each)
		<tr>
			<td class="cheque-hover" data-id="[[$each->cheque_id]]" data-target="#cheque-detail" data-toggle="modal">[[$each->customer_name]]</td>
			<td>[[$each->bank_name]]</td>
			<td>[[$each->phone]]</td>
			<td>[[$each->cheque_no]]</td>					
			<td>[[ ($each->due_date == date('Y-m-d')) ? '<div class="badge btn-primary">Today</div>' : $each->due_date ]]</td>
			<td>[[($each->status == 0) ? '<button class="btn-green btn-paid" style="padding-left: 20px;padding-right: 20px;" data-id="'.$each->cheque_id.'">Paid</button>': '<div class="badge btn-primary">Received</div>']]</td>
			<td><span class="glyphicon glyphicon-trash"></span>&nbsp; &nbsp;<span class="glyphicon glyphicon-pencil"></span></td>
		</tr>
	@endforeach
</table>
</div>
<input type="hidden" class="base-url" value="[[URL::to('/')]]">
<div class="modal fade" id="cheque-detail" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
     	<div class="modal-content model-data-content">
	    	<div class="modal-header app-modal">
		        <button type="button" class="close close-file" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h5 class="modal-title"><h4>Cheque Information</h4></h5>
		    </div>
			<div class="modal-body product-data-wrapper">
				<div class="product-content">
					<div class="row app-row cheque-holder">
					</div>						
					<button type="button" style="bottom: 20px;position: relative;right: 20px;"class="btn-green pull-right" data-dismiss="modal">Close</button>
				</div>
			</div>
    	</div>
  	</div>
</div>
