$(document).ready(function(){
	var base_url = $('.base-url').val();
	$('.email').on('change',function(){
		$.ajax({
			url : base_url+'/register/checkemail',
			data: {email : $(this).val()},
			type: 'GET',
			success:function(response){
 				if(response == 1){
					$('.email-check').val(1);
				}else{
					$('.email-check').val(0);
				}
			}
		});
	});
	$('.username').on('change',function(){
		$.ajax({
			url : base_url+'/register/checkusername',
			data: {username : $(this).val()},
			type: 'GET',
			success:function(response){
				if(response == 1){
					$('.username-check').val(1);
				}else{
					$('.username-check').val(0);
				}
			}
		});
	});
	$('.register-trial-form, .register-premium-form').on('click','.register-trial-btn, .register-premium-btn',function(){
		var fullname 		= 	$('.fullname').val(),
			username 		= 	$('.username').val(),
			password 		= 	$('.password').val(),
			repassword 		= 	$('.repassword').val(),
			email 			= 	$('.email').val(),
			company 		= 	$('.company_name').val(),
			location 		= 	$('.location').val(),
			country 		= 	$('.choose_country').val(),
			chk 			= 	$('.i-accept').is(':checked');
			valid_email 	= 	IsEmail(email),
			email_check 	= 	$('.email-check').val(),
			username_check 	= 	$('.username-check').val();

		if(fullname == ''){
 			$('.fullname').focus();
			$('.error-msg-fullname').html('This field is required.');
			return false;
		}else if(username == ''){
			$('.username').focus();
			$('.error-msg-username').html('This field is required.');
			return false;
		}else if(username_check == 1){
			$('.error-msg-username').html('The username has already been taken.');
			return false;
		}else if(email == ''){
			$('.error-msg-email').html('This field is requird.');
			return false;
		}else if(email_check == 1){
			$('.error-msg-email').html('The email address has already been taken.');
			return false;
		}else if(!valid_email){
			$('.error-msg-email').html('The email address provided is invalid.');
			return false;
		}else if(password == ''){
			$('.password').focus();
			$('.error-msg-password').html('This field is required.');
			return false;
		}else if(repassword == ''){
			$('.repassword').focus();
			$('.error-msg-repassword').html('This field is required.');
			return false;
		}else if(repassword != password){
			$('.error-msg-repassword').html('This password fields donot match.');
			return false;
		}else if(company == ''){
			$('.error-msg-company').html('This field is required.');
			return false;
		}else if(country == null){
			$('.error-msg-country').html('This field is required.');
			return false;
		}else if(location == ''){
			$('.error-msg-location').html('This field is required.');
			return false;
		}else if(chk == false){
			$('.error-msg-terms').html('&nbsp;&nbsp;&nbsp;&nbsp;Accept our terms, conditions & privacy policy.');
			return false;
		}
	});
	$('.fullname').on('change',function(){
		$('.error-msg-fullname').html('');
	});
	$('.username').on('change',function(){
		$('.error-msg-username').html('');
	});
	$('.password').on('change',function(){
		$('.error-msg-password').html('');
	});
	$('.repassword').on('change',function(){
		$('.error-msg-repassword').html('');
	});
	$('.email').on('change',function(){
		$('.error-msg-email').html('');
	});
	$('.company_name').on('change',function(){
		$('.error-msg-company').html('');
	});
	$('.location').on('change',function(){
		$('.error-msg-location').html('');
	});
	$('.choose_country').on('change',function(){
		$('.error-msg-country').html('');
	});
	$('.i-accept').on('change',function(){
		$('.error-msg-terms').html('');
	});
});
	function IsEmail(email){
		var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		return regex.test(email);
	}