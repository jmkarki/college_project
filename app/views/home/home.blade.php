@extends('default.main')
@section('content')
<div class="data-container">
	This is a home page
	<a href="{{URL::to('home/supplier')}}">Supplier</a>
</div>
@stop