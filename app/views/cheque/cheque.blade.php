@extends('default.main')
@section('content')
<div class="data-container">
		<div class="header">
			@include('payment.payment-menu')
		</div>
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
			[[Form::open(array('url'=>'cheques/store'))]]
			<div class="row app-row">
				<div class="col-md-4">
					<label>Cheque No.:</label>
				</div>
				<div class="col-md-8">
					<input type="text" class="form-control" value="[[Input::old('cheque_no')]]" name="cheque_no" placeholder="Cheque Number">
					[[$errors->first('cheque_no')]]
 				</div>
			</div>
			<div class="row app-row">
				<div class="col-md-4">
					<label>Account No.:</label>
				</div>
				<div class="col-md-8">
					<input type="text" class="form-control" value="[[Input::old('account_no')]]" name="account_no" placeholder="Cheque Number">
					[[$errors->first('account_no')]]
 				</div>
			</div>
			<div class="row app-row">
				<div class="col-md-4">
					<label>AC Holder's Name:</label>
				</div>
				<div class="col-md-8">
					<input type="text" class="form-control" value="[[Input::old('cheque_name')]]" name="cheque_name" placeholder="AC Holder's Name">
					[[$errors->first('cheque_name')]]
				</div>
			</div>	
			<div class="row app-row">
				<div class="col-md-4">
					<label>Issue Date:</label>
				</div>
				<div class="col-md-8">
					<input type="text" class="form-control datepicker" value="[[Input::old('issued_date')]]" name="issued_date" placeholder="Issued Date">
					[[$errors->first('issued_date')]]
 				</div>
			</div>
			<div class="row app-row">
				<div class="col-md-4">
					<label>Due Date:</label>
				</div>
				<div class="col-md-8">
					<input type="text" class="form-control datepicker due_date" value="[[Input::old('due_date')]]" name="due_date" placeholder="Due Date">
					[[$errors->first('due_date')]]
 				</div>            
			</div>
			<div class="row app-row">
				<div class="col-md-4">
					<label>Bank Name:</label>
				</div>
				<div class="col-md-8">
					<input type="text" class="form-control" name="bank_name" value="[[Input::old('bank_name')]]" placeholder="Bank Name">
					[[$errors->first('bank_name')]]
 				</div>            
			</div>

			<div class="row app-row">
				<div class="col-md-4">
					<label>Amount:</label>
				</div>
				<div class="col-md-8">
					<input type="text" class="form-control" value="[[Input::old('amount')]]" name="amount" placeholder="Payable Amount">
					[[$errors->first('amount')]]
 				</div>            
			</div>
			<div class="row app-row">
				<div class="col-md-4">
					<label>Benificiary:</label>
				</div>
				<div class="col-md-8">
					<input type="text" class="form-control benificiary" value="[[Input::old('benificiary')]]" name="benificiary" placeholder="Benificiary">
					[[$errors->first('benificiary')]]
 				</div>            
			</div>
			<div class="row app-row">
				<div class="col-md-4">
					<label>Cashed Date:</label>
				</div>
				<div class="col-md-8">
					<input type="text" class="form-control datepicker" value="[[Input::old('cashed_date')]]" name="cashed_date" placeholder="Cashed On">
					[[$errors->first('cashed_date')]]
 				</div>            
			</div>
			<div class="row app-row">
				<div class="col-md-4">
					<label>Drawee Name:</label>
				</div>
				<div class="col-md-8">
					<input type="text" class="form-control benificiary" value="[[Input::old('drawee_name')]]" name="drawee_name" placeholder="Drawee Name">
					[[$errors->first('drawee_name')]]
 				</div>            
			</div>
			<div class="row app-row">
				<div class="col-md-4"></div>
				<div class="col-md-8">
		              <button type="submit" class="btn-green pull-right"><span class="glyphicon glyphicon-ok"></span> Continue</button>
	        	</div>
			</div>
			[[Form::close()]]
		</div>
	</div>
</div>
@stop