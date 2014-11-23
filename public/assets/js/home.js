$(document).ready(function(){
	var base_url = $('.base-url').val();
	$('.trial-section').on('click','.start-trial',function(){
		var type = $(this).data('subscription');
		window.location.replace(base_url+'/register?subscription=trial');
	});
	$('.register-plan').on('click','.free-plan',function(){
		var type = $(this).data('plan');
		var premium = (type == 0) ?'free' :'premium';
		window.location.replace(base_url+'/register/now?subscription='+premium);
	});
});