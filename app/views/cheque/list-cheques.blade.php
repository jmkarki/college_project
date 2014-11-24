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
			create new product record
		</div>
		<div class="include-form">
		data goes inside this div
		</div>
	</div>
</div>
@stop