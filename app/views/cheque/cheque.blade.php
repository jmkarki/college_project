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
					<input type="text" class="form-control category_name" name="category_name" placeholder="Name">
					<span class="tiny-error-cate-name none"></span>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
