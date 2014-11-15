<?php 
 $home 			= ($current == 'home')?'current' :'';
 $customer 		= ($current == 'customer')?'current' :'';
 $supplier 		= ($current == 'supplier')?'current' :'';
 $employee 		= ($current == 'employee')?'current' :'';
 $purchase 		= ($current == 'purchase')?'current' :'';
 $sales 		= ($current == 'sales')?'current' :'';
 $product 		= ($current == 'product')?'current' :'';
 $payment 		= ($current == 'payment')?'current' :'';
 $report 		= ($current == 'report')?'current' :'';
 $admin 		= ($current == 'admin')?'current' :'';
 $cheque 		= ($current == 'cheque')?'current' :'';
 ?>
<div class="sidebar-menus">
	<ul>
		<li class="{{$home}}"><a href="{{URL::to('home')}}"><span class="glyphicon glyphicon-home"></span> Home</a></li>
		<li class="{{$customer}}"><a href="{{URL::to('customer')}}"><span class="glyphicon glyphicon-user"></span> Customer</a></li>
		<li class="{{$supplier}}"><a href="{{URL::to('supplier')}}"><span class="glyphicon glyphicon-user"></span> Supplier</a></li>
		<li class="{{$employee}}"><a href="{{URL::to('employee')}}"><span class="glyphicon glyphicon-user"></span> Employee</a></li>
		<li class="{{$purchase}}"><a href="{{URL::to('purchase')}}"><span class="glyphicon glyphicon-user"></span> Purchase</a></li>
		<li class="{{$sales}}"><a href="{{URL::to('sales')}}"><span class="glyphicon glyphicon-user"></span> Sales</a></li>
		<li class="{{$product}}"><a href="{{URL::to('product')}}"><i class="fa fa-gift fa-lg"></i>Product</a></li>
		<li class="{{$payment}}"><a href="{{URL::to('payment')}}"><span class="glyphicon glyphicon-credit-card"></span> Payment</a></li>
		<li class="{{$report}}"><a href="{{URL::to('report')}}"><span class="glyphicon glyphicon-print"></span> Reports</a></li>
		<li class="{{$admin}}"><a href="{{URL::to('admin')}}"> <i class="fa fa-user fa-lg"></i>Admin</a></li>
		<li class="{{$cheque}}"><a href="{{URL::to('cheques')}}"><span class="glyphicon glyphicon-user"></span> Cheques</a></li>
	</ul>
</div>