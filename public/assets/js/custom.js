
$(document).ready(function(){
	$('.alert-close').click(function(){
		function complete(){
		$('.alert-success').fadeOut(1600,"linear",complete);
		}
	});
	var url = window.location;
	$(".sidebar-menus ul li a").each(function() {
	if($(this).attr('href') == url){
	  $(this).parent().addClass('current');
	  $(this).append('<span class="glyphicon glyphicon-chevron-right" style="font-size:8px; padding: 1px 3px 10px 30px !important;position: absolute;top: 11px;"></span>');
	}
	});
});


