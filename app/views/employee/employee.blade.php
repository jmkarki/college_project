@extends('default.main')
@section('content')
<div class="data-container">
	<div class="header">
		<div class="command">
			<button class="menu-btn-green new-employee"><span class="glyphicon glyphicon-plus"></span> Employee</button>
			<button class="menu-btn-green"><span class="glyphicon glyphicon-list"></span> List Employees</button>
			<button class="menu-btn-green"><span class="glyphicon glyphicon-user"></span> Suppliers</button>
			<button class="menu-btn-green"><span class="glyphicon glyphicon-user"></span> Suppliers</button>
			<button class="menu-btn-green"><span class="glyphicon glyphicon-user"></span> Suppliers</button>
		</div>		
	</div>
	<div class="body">
		<div class="form-header">
			New Employee.
		</div>
		<div class="include-form">
			<div class="show-new-employee">
				@include('employee.add-employee')
			</div>
		</div>
	</div>	 
</div>
@stop
@section('script')
<script type="text/javascript">
	$(document).ready(function(){
		function IsEmail(email){
			var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			return regex.test(email);
		}
		function IsMobile (mobile) {
			var regex = /\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/;
			return regex.test(mobile);
		}
		function IsPhone(phone){
			var regx = /^\d*[0-9](|.\d*[0-9]|,\d*[0-9])?$/;
			return regx.test(phone);
		}
		function IsDate(date){
			var dateReg = /^[0,1]?\d{1}\/(([0-2]?\d{1})|([3][0,1]{1}))\/(([1]{1}[9]{1}[9]{1}\d{1})|([2-9]{1}\d{3}))$/;
			return dateReg.test(date);
		}
		$('.submit-employee').click(function(){
			var name = $('.employee_name').val(),
				address = $('.employee_address').val(),
				phone = $('.phone').val(),
				mobile = $('.mobile').val(),
				email = $('.email').val(),
				post = $('.post').val(),
				salary = $('.salary').val(),
				joined = $('.join_date').val(),
				valid_email = IsEmail(email),
				valid_mobile = IsPhone(mobile),
				valid_phone = IsPhone(phone);
			if(name == ''){
				$('.tiny-error-name').html('Employee name is required.').removeClass('none').addClass('tiny-error-message');
				$('.employee_name').addClass('error-border').focus();
				return false;
			}else if(address == ''){
				$('.tiny-error-address').html('Employee address is required.').removeClass('none').addClass('tiny-error-message');
				$('.employee_address').addClass('error-border').focus();
				return false;
			}else if (phone == ''){
				$('.tiny-error-phone').html('Employee phone number is required.').removeClass('none').addClass('tiny-error-message');
				$('.phone').addClass('error-border').focus();
				return false;
			}else if(mobile == ''){
				$('.tiny-error-mobile').html('Employee mobile number is required.').removeClass('none').addClass('tiny-error-message');
				$('.mobile').addClass('error-border').focus();
				return false;
			}else if(!valid_phone){
				$('.tiny-error-phone').html('Employee phone number provided is invalid.').removeClass('none').addClass('tiny-error-message');
				$('.phone').addClass('error-border').focus();
				return false;
			}else if(email == ''){
				$('.tiny-error-email').html('Employee email must be provided.').removeClass('none').addClass('tiny-error-message');
				$('.email').addClass('error-border').focus();
				return false;
			}else if(!valid_mobile){
				$('.tiny-error-mobile').html('Employee phone number format provided is invalid.').removeClass('none').addClass('tiny-error-message');
				$('.mobile').addClass('error-border').focus();
				return false;
			}else if(!valid_email){
				$('.tiny-error-email').html('The email format provided is invalid.').removeClass('none').addClass('tiny-error-message');
				$('.email').addClass('error-border').focus();
				return false;
			}else if(post == ''){
				$('.tiny-error-post').html('The employee post must be defined.').removeClass('none').addClass('tiny-error-message');
				$('.post').addClass('error-border').focus();
				return false;
			}else if(salary == ''){
				$('.tiny-error-salary').html('The employee salary field is required.').removeClass('none').addClass('tiny-error-message');
				$('.salary').addClass('error-border').focus();
				return false;
			}else if(joined == ''){
				$('.tiny-error-join').html('The employee joined date is required.').removeClass('none').addClass('tiny-error-message');
				$('.joined_date').addClass('error-border').focus();
				return false;

			}else{
				return true;
			}
		});
		$('.employee_name').change(function(){
			$('.tiny-error-name').addClass('none');
			$(this).removeClass('error-border');
		});
		$('.employee_address').change(function(){
			$('.tiny-error-address').addClass('none');
			$(this).removeClass('error-border');
		});
		$('.phone').change(function(){
			$('.tiny-error-phone').addClass('none');
			$(this).removeClass('error-border');
		});
		$('.mobile').change(function(){
			$('.tiny-error-mobile').addClass('none');
			$(this).removeClass('error-border');
		});
		$('.post').change(function(){
			$('.tiny-error-post').addClass('none');
			$(this).removeClass('error-border');
		});
		$('.email').change(function(){
			$('.tiny-error-email').addClass('none');
			$(this).removeClass('error-border');
		});
		$('.salary').change(function(){
			$('.tiny-error-salary').addClass('none');
			$(this).removeClass('error-border');
		});
		$('.join_date').change(function(){
			$('.tiny-error-join').addClass('none');
			$(this).removeClass('error-border');
		});
	});
</script>
@stop