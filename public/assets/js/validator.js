//validation for customer form
$(document).ready(function(){
	$('.new_customer').click(function(){
		$('.show-new-customer').removeClass('none');
		$('.form-header').html('New Customer.');
		$('.show-available-customers').addClass('none');
	});
	$('.list-customer').click(function(){
		$('.show-available-customers').removeClass('none');
		$('.form-header').html('List of active customers availavle with us.');
		$('.show-new-customer').addClass('none');
	});
	$('.submit-customer').click(function(){
		var name = $('.customer_name').val() ,
			address = $('.customer_address').val() ,
			phone = $('.phone').val(),
			mobile = $('.mobile').val(),
			email = $('.email').val(),
			type = $('.select_type').val();
		if(name == ''){
			$('.tiny-error-name').html('Name is required.').removeClass('none').addClass('tiny-error-message');
			$('.customer_name').addClass('error-border');
			return false;
		}else if(address == ''){
			$('.tiny-error-address').html('Address is required.').removeClass('none').addClass('tiny-error-message');
			$('.customer_address').addClass('error-border');
			return false;
		}else if(phone == ''){
			return false;
		}else if(mobile == ''){
			return false;
		}else if(email == ''){
			return false;
		}else if(gender == ''){
			return false;
		}else if(type == ''){
			return false;
		}else{
			return true;
		}
	});

//validation for employee form

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
	$('.list-employee').click(function(){
		$('.show-available-employees').removeClass('none');
		$('.form-header').html('List of active employees availavle with us.');
		$('.show-new-employee').addClass('none');
	});
	$('.new-employee').click(function(){
		$('.show-new-employee').removeClass('none');
		$('.form-header').html('New Employee.');
		$('.show-available-employees').addClass('none');
	});

//validation for product form

	$('.new-brand').click(function(){
		$('.show-new-product').addClass('none');
		$('.show-new-brand').removeClass('none');
		$('.form-header').removeClass('none');
		$('.show-new-category').addClass('none');
		$('.form-header').html('New Brand.');
	});
	$('.new-product').click(function(){
		$('.show-new-product').removeClass('none');
		$('.show-new-brand').addClass('none');
		$('.show-new-category').addClass('none');
		$('.form-header').removeClass('none').html('New Product.');
	});
	$('.submit-brand').click(function(){
		var brand = $('.brand_name').val(),
			desc = $('.description-brand').val();
		if(brand == ''){
			$('.tiny-error-brand-name').html('Brand name must be provided.').removeClass('none').addClass('tiny-error-message');
			$('.brand_name').addClass('error-border').focus();
			return false;
		}else if(desc == ''){
			$('.tiny-error-brand-desc').html('Description must be provided.').removeClass('none').addClass('tiny-error-message');
			$('.description').addClass('error-border').focus();
			return false;
		}
		return true;
	});
	$('.new-category').click(function(){
		$('.show-new-product').addClass('none');
		$('.show-new-brand').addClass('none');
		$('.show-new-category').removeClass('none');
		$('.form-header').removeClass('none').html('New Category.');
	});
	$('.submit-category').click(function(){
		var name = $('.category_name').val(),
			des = $('.cate-des').val(),
			parent = $('.select_parent').val();
 		if(name == ''){
			$('.tiny-error-cate-name').html('Category name must be provided.').removeClass('none').addClass('tiny-error-message');
			$('.category_name').addClass('error-border').focus();
			return false;
		}else if(des == ''){
			$('.tiny-error-cate-desc').html('Category description must be written.').removeClass('none').addClass('tiny-error-message');
			$('.cate-des').addClass('error-border').focus();
			return false;
		}else if(parent == 'no'){
			$('.tiny-error-parent').html('Parent name must be choosen.').removeClass('none').addClass('tiny-error-message');
			$('.select_parent').addClass('error-border').focus();
			return false;
		}else if(des == ''){
			$('.tiny-error-cate-desc').html('Category description must be written.').removeClass('none').addClass('tiny-error-message');
			$('.cate-des').addClass('error-border').focus();
			return false;
		}else{
			return true;
		}
	});
	//validation for supplier
 	$('.new_supplier').click(function(){
		$('.show-new-supplier').removeClass('none');
		$('.form-header').html('New Supplier.');
		$('.show-available-suppliers').addClass('none');
	});
	$('.list-supplier').click(function(){
		$('.show-available-suppliers').removeClass('none');
		$('.form-header').html('List of active suppliers availavle with us.');
		$('.show-new-supplier').addClass('none');
	});
	$('.submit-supplier').click(function(){
		var name = $('.supplier_name').val() ,
			address = $('.supplier_address').val() ,
			phone = $('.phone').val(),
			mobile = $('.mobile').val(),
			email = $('.email').val(),
			type = $('.select_type').val();
		if(name == ''){
			$('.tiny-error-name').html('Name is required.').removeClass('none').addClass('tiny-error-message');
			$('.supplier_name').addClass('error-border').focus();
			return false;
		}else if(address == ''){
			$('.tiny-error-address').html('Address is required.').removeClass('none').addClass('tiny-error-message');
			$('.supplier_address').addClass('error-border').focus();
			return false;
		}else if(phone == ''){
			$('.tiny-error-phone').html('Phone number is required.').removeClass('none').addClass('tiny-error-message');
			$('.phone').addClass('error-border').focus();
			return false;
		}else if(mobile == ''){
			$('.tiny-error-mobile').html('Mobile number is required.').removeClass('none').addClass('tiny-error-message');
			$('.mobile').addClass('error-border').focus();
			return false;
		}else if(email == ''){
			$('.tiny-error-email').html('Email address is required.').removeClass('none').addClass('tiny-error-message');
			$('.email').addClass('error-border').focus();
			return false;
		}else if(type == null){
			$('.tiny-error-type').html('Select type of person.').removeClass('none').addClass('tiny-error-message');
			$('.select_type').addClass('error-border').focus();
			return false;
		}else{
			return true;
		}
	});
	$('.supplier_name').change(function(){
		$('.tiny-error-name').addClass('none');
		$(this).removeClass('error-border');
	});
	$('.supplier_address').change(function(){
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
	$('.email').change(function(){
		$('.tiny-error-email').addClass('none');
		$(this).removeClass('error-border');
	});
	$('.select_type').change(function(){
		$('.tiny-error-type').addClass('none');
		$(this).removeClass('error-border');
	});
	
});//document ready close