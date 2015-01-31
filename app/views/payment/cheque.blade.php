@extends('default.main')
@section('content')
<div class="data-container">
	<div class="header">
		@include('payment.payment-menu')
	</div>
	<div class="body">
		@include('cheque.list-cheques')
	</div>	 
</div>
@stop