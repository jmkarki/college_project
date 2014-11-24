@extends('default.main')
@section('content')
<div class="data-container">
	@include('cheque.cheque-menu')
	<div class="body">
		@if(Session::has('message'))
		<div class="alert alert-success success-message">
			[[Session::get('message')]]
			<a href="" class="pull-right alert-close tiny"><span class="glyphicon glyphicon-remove"></span></a>
		</div>
		@endif
		<div class="form-header">
			create new cheque payment record.
		</div>
		<div class="include-form">
			<div class="row app-row">
				<div class="col-md-4">
					<label>Name:</label>
				</div>
				<div class="col-md-6">
					<input type="text" class="form-control cheque_name" name="cheque_name" placeholder="Cheque Holder Name">
					<span class="tiny-error-cate-name none"></span>
				</div>
			</div>
			
			<div class="row app-row">
				<div class="col-md-4">
					<label>Bank Name:</label>
				</div>
				<div class="col-md-6">
					<input type="text" class="form-control bank_name" name="bank_name" placeholder="Bank Name">
 				</div>
			</div>
			<div class="row app-row">
				<div class="col-md-4">
					<label>Cheque No.:</label>
				</div>
				<div class="col-md-6">
					<input type="text" class="form-control cheque_no" name="cheque_no" placeholder="Cheque No.">
 				</div>
			</div>
			<div class="row app-row">
				<div class="col-md-4">
					<label>Account No.:</label>
				</div>
				<div class="col-md-6">
					<input type="text" class="form-control account_no" name="account_no" placeholder="Account No.">
 				</div>
			</div>
			<div class="row app-row">
				<div class="col-md-4">
					<label>Issue Date:</label>
				</div>
				<div class="col-md-6">
					<input type="text" class="form-control datepicker issue_date" name="issue_date" placeholder="Issue Date">
 				</div>
			</div>
			<div class="row app-row">
				<div class="col-md-4">
					<label>Due Date:</label>
				</div>
				<div class="col-md-6">
					<input type="text" class="form-control datepicker due_date" name="due_date" placeholder="Due Date">
 				</div>            
			</div>
			<div class="row app-row">
				<div class="col-md-4">
					<label>Amount:</label>
				</div>
				<div class="col-md-6">
					<input type="text" class="form-control cheque_amount" name="cheque_amount" placeholder="Amount">
 				</div>            
			</div>
			<div class="row app-row">
				<div class="col-md-4">
					<label>Benificiary:</label>
				</div>
				<div class="col-md-6">
					<input type="text" class="form-control benificiary" name="benificiary" placeholder="Benificiary">
 				</div>            
			</div>
			<div class="row app-row">
				<div class="col-md-4"></div>
				<div class="col-md-6">
		              <button type="submit" class="btn-green pull-right submit-cheque"><span class="glyphicon glyphicon-ok"></span> Continue</button>
	        </div>
			</div>

		</div>
	</div>
</div>
@stop
