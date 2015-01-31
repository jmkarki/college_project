$(document).ready(function(){
	var base_url = $('.base-url').val();
	$('.alert-close').on('click',function(){
		$('.alert-success').fadeOut(10000,"linear");
	});
	$('.success-message, .alert-success').fadeOut(10000,"linear");

	var url = window.location;
	$(".sidebar-menus ul li a").each(function() {
	if($(this).attr('href') == url){
	  $(this).parent().addClass('current');
	  $(this).append('<span class="glyphicon glyphicon-chevron-right" style="font-size:8px;position: absolute;top: 11px;top: 31%;right: 13px;"></span>');
	}
	});
	
	//choosen select
	var config = {
      '.chosen-select': {}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
     $('.datepicker').datepicker({format: "yyyy-mm-dd" }).on('changeDate', function(ev){
        $(this).datepicker('hide');
    });
    function IsEmail(email){
		var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		return regex.test(email);
	}

    $('.btn-notify').on('click',function(){
    	$('.before-subscribe').html('');
    	var email = $('.sub-email').val(),
    		valid_email = IsEmail(email);
    	if(email == ''){
    		$('.sub-email').css('border-color', 'rgb(184, 55, 55)').focus();
    		return false;
    	}else if(!valid_email){
    		$('.sub-email').css('border-color', 'rgb(184, 55, 55)').focus();
    		return false;
    	}else{
   			$.ajax({
				url : base_url+'/register/subscriber',
				data: {email : email},
				async: false,
				type: 'POST',
				beforeSend:function(){
					$('.before-subscribe').append('<img src="'+base_url+'/assets/images/loading.gif"/>');
					$('.btn-notify').prop('disabled', true);
				},
				success:function(response){
					$('.btn-notify').prop('disabled', false);
					if(response == 1){
						window.setTimeout(function (){
							$('.before-subscribe').html('').append('<span class="glyphicon glyphicon-ok-sign ok-sign"></span>');
						}, 3000);
					}
					if(response == 0){
						$('.before-subscribe').html('').append(':(');
					}					
				}
			});
    	}
    });
    $('.sub-email').on('keyup',function(){
    	$(this).css('border-color', '#afafaf');
    	$('.btn-notify').prop('disabled', false);
    	$('.before-subscribe').html('');
    	return true;
    });
});
