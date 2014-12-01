$(document).ready(function(){
	$('body').attr('style','background-color: #fafafa !important;');
	var base_url = $('.base-url').val();
	$('.email').on('keyup',function(){
		$.ajax({
			url : base_url+'/user/checkemail',
			data: {email : $.trim($(this).val())},
			type: 'GET',
			success:function(response){
				if(response == 1){
					$('.email-check').val(1);
					$('.error-msg').html('The email address has already been taken.');
					return false;
				}else{
					$('.email-check').val(0);
					$('.error-msg').html('');
					return false;
				}
			}
		});
	});
	$('.username').on('keyup',function(){
		$.ajax({
			url : base_url+'/user/checkusername',
			data: {username : $.trim($(this).val())},
			type: 'GET',
			success:function(response){
				if(response == 1){
					$('.username-check').val(1);
					$('.error-msg').html('The username has already been taken.');
					return false;
				}else{
					$('.username-check').val(0);
					$('.error-msg').html('');
					return false;
				}
			}
		});
	});
	$('.btn-user-purple').on('click',function(){
		var fname = $('.fullname').val(),
			uname = $('.username').val(),
			email = $('.email').val(),
			passw = $('.password').val(),
			repassw = $('.repassword').val(),
			phone = $('.phone').val(),
			roles = $('.roles').val(),
			valid_email = IsEmail(email),
			email_check = $('.email-check').val(),
			username_check = $('.username-check').val();

		if(fname == ''){
			$('.error-msg').html('The fullname is required.');
			return false;
		}else if(uname == ''){
			$('.error-msg').html('The username is required.');
			return false;
		}else if(username_check == 1){
			$('.error-msg').html('The username has already been taken.');
			return false;
		}else if(email == ''){
			$('.error-msg').html('The email is required.');
			return false;
		}else if(email_check == 1){
			$('.error-msg').html('The email address has already been taken.');
			return false;
		}else if(!valid_email){
			$('.error-msg').html('The email format provided is invalid.');
			return false;
		}else if(passw == ''){
			$('.error-msg').html('The re-password is required.');
			return false;
		}else if(passw.length < 6){
			$('.error-msg').html('The password must be at least 6 characters.');
			return false;
		}else if(repassw != passw){
			$('.error-msg').html('The password provided do not match.');
			return false;
		}else if(phone == ''){
			$('.error-msg').html('The phone number is required.');
			return false;
		}else if(roles == null){
			$('.error-msg').html('The role is required.');
			return false;
		}else
			return true;
	});
	$('.fullname').on('change',function(){
		$('.error-msg').html('');
	});
	$('.username').on('change',function(){
		$('.error-msg').html('');
	});
	$('.email').on('change',function(){
		$('.error-msg').html('');
	});
	$('.password').on('change',function(){
		$('.error-msg').html('');
	});
	$('.repassword').on('change',function(){
		$('.error-msg').html('');
	});
	$('.phone').on('change',function(){
		$('.error-msg').html('');
	});
	$('.roles').on('change',function(){
		$('.error-msg').html('');
	});

	function IsEmail(email){
		var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		return regex.test(email);
	}
	$('.user-content').on('click','.each-user',function(){
		var user_id = $(this).data('id'),
			status = $(this).data('status');
		$('.user-id').val(user_id);
		$('.user-status').val(status);
 		$('.success-msg').html('');
		$.ajax({
			url: base_url+'/user/eachuser',
			data:{user_id:user_id},
			type:'GET',
			success:function(response){
  				$('.update-fullname').val(response.name);
				$('.update-username').html(response.username);
				$('.update-email').html(response.email);
				$('.update-phone').val(response.phone_no);
				$('.user-image').attr('src',response.img);
				if(response.status == 0){
					$('.status-holder').html('<span class="glyphicon glyphicon-ok ok-tick">');
				}else{
					$('.status-holder').html('<span class="glyphicon glyphicon-remove x-tick">');
				}
			}
		});
		if(status == 0){
			$('.action-holder').html('<button type="button" class="btn-green user-deactivate">Deactivate</button>');
		}else{
			$('.action-holder').html('<button type="button" class="btn-green user-activate">Activate</button>');
		}
	});
	$('#home').on('click','.purple-update',function(){
		var fullname = $('.update-fullname').val(),
			user_id = $('.user-id').val(),
			phone = $('.update-phone').val();
 			if(fullname == ''){
				$('.uerror-msg').html('The fullname is required.');
				return false;
			}else if(phone == ''){
				$('.uerror-msg').html('The phone is required.');
				return false;
			}else{
 				$.ajax({
					url: base_url+ '/user/eachuserupdate',
					type:'POST',
					data:{user_id:user_id,
						fullname:fullname,
						phone:phone},
					success:function(response){
						if(response == 1){
 							$('.success-msg').html('Updated.').fadeOut(1600,"linear");
 							window.location.reload();
						}
					}
				});
			}
	});
	$('.update-username').on('change',function(){
		$('.uerror-msg').html('');
	});
	$('.update-fullname').on('change',function(){
		$('.uerror-msg').html('');
	});
	$('.update-email').on('change',function(){
		$('.uerror-msg').html('');
	});
	$('.update-phone').on('change',function(){
		$('.uerror-msg').html('');
	});
	$('.app-password-reset').on('click','.reset-user-password',function(){
		var newpass = $('.reset-newpass').val(),
			repass = $('.reset-repass').val(),
			user_id = $('.user-id').val();
		if(newpass == ''){
			$('.rerror-msg').html('The new password is required.');
			return false;
		}else if(repass == ''){
			$('.rerror-msg').html('The re-password is required.');
			return false;
		}else if(repass != newpass){
			$('.rerror-msg').html('The password provided donot match.');
			return false;
		}else{
			$.ajax({
				url: base_url+'/user/resetpassword',
				data:{user_id:user_id,password:newpass},
				type:'POST',
				success:function(response){
					if(response == 1){
						$('.success-msgs').html('Updated.').fadeOut(1600,"linear");
						$('.reset-newpass').val('');
						$('.reset-repass').val('');
					}
				}
			});
		}
	});
	$('.reset-newpass').on('change',function(){
		$('.rerror-msg').html('');
	});
	$('.reset-repass').on('change',function(){
		$('.rerror-msg').html('');
	});
	$('.action-holder').on('click','.user-deactivate',function(){
		var user_id =  $('.user-id').val();
		$.ajax({
			url: base_url+'/user/deactivate',
			data:{user_id:user_id},
			type: 'POST',
			success:function(response){
				$('.action-holder').html('<button type="button" class="btn-green user-activate">Activate</button>');
				$('.user-status').val(1);
			}
		});
	});
	$('.action-holder').on('click','.user-activate',function(){
		var user_id =  $('.user-id').val();
		$.ajax({
			url: base_url+'/user/activate',
			data:{user_id:user_id},
			type: 'POST',
			success:function(response){
				$('.action-holder').html('<button type="button" class="btn-green user-deactivate">Deactivate</button>');
				$('.user-status').val(0);
			}
		});		
	});
});