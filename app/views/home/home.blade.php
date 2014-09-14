@extends('default.main')
@section('content')
	<h2>This is a home page</h2>
	<a href="{{URL::to('home/supplier')}}">Supplier</a>
@stop