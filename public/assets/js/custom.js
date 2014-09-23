
$(document).ready(function(){
	$('.alert-close').click(function(){
		function complete(){
		$('.alert-success').fadeOut(1600,"linear",complete);
		}
	});
});