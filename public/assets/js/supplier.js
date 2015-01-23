// $(document).ready(function(){
// $('.submit-supplier').on('click',function(){
// 	var name = $('.supplier_name').val() ,
// 		address = $('.supplier_address').val() ,
// 		phone = $('.phone').val(),
// 		mobile = $('.mobile').val(),
// 		email = $('.email').val(),
// 		type = $('.select_type').val();
// 	if(name == ''){
// 		$('.tiny-error-name').html('This field is required.').removeClass('none').addClass('tiny-error-message');
// 		$('.supplier_name').addClass('error-border').focus();
// 		return false;
// 	}else if(address == ''){
// 		$('.tiny-error-address').html('This field is required.').removeClass('none').addClass('tiny-error-message');
// 		$('.supplier_address').addClass('error-border').focus();
// 		return false;
// 	}else if(phone == ''){
// 		$('.tiny-error-phone').html('This field is required.').removeClass('none').addClass('tiny-error-message');
// 		$('.phone').addClass('error-border').focus();
// 		return false;
// 	}else if(mobile == ''){
// 		$('.tiny-error-mobile').html('This field is required.').removeClass('none').addClass('tiny-error-message');
// 		$('.mobile').addClass('error-border').focus();
// 		return false;
// 	}else if(email == ''){
// 		$('.tiny-error-email').html('This field is required.').removeClass('none').addClass('tiny-error-message');
// 		$('.email').addClass('error-border').focus();
// 		return false;
// 	}else if(type == null){
// 		$('.tiny-error-type').html('This field is required.').removeClass('none').addClass('tiny-error-message');
// 		$('.select_type').addClass('error-border').focus();
// 		return false;
// 	}else{
// 		return true;
// 	}
// });
// $('.supplier_name').on('change',function(){
// 	$('.tiny-error-name').addClass('none');
// 	$(this).removeClass('error-border');
// });
// $('.supplier_address').on('change',function(){
// 	$('.tiny-error-address').addClass('none');
// 	$(this).removeClass('error-border');
// });
// $('.phone').on('change',function(){
// 	$('.tiny-error-phone').addClass('none');
// 	$(this).removeClass('error-border');
// });
// $('.mobile').on('change',function(){
// 	$('.tiny-error-mobile').addClass('none');
// 	$(this).removeClass('error-border');
// });
// $('.email').on('change',function(){
// 	$('.tiny-error-email').addClass('none');
// 	$(this).removeClass('error-border');
// });
// $('.select_type').on('change',function(){
// 	$('.tiny-error-type').addClass('none');
// 	$(this).removeClass('error-border');
// });
// });