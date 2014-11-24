$(document).ready(function(){
	var base_url = $('.base-url').val();
	$('.trial-section').on('click','.start-trial',function(){
		var type = $(this).data('subscription');
		window.location.replace(base_url+'/trial?subscription='+type);

	});
});