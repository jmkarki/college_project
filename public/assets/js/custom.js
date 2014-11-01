
$(document).ready(function(){
	$('.alert-close').click(function(){
		$('.alert-success').fadeOut(1600,"linear");
	});
	$('.success-message, .alert-success').fadeOut(2500,"linear");

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
    //multi phase form in product section
    var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a");
        $(".app-row").removeClass("has-error");       
        
        
        nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-primary').trigger('click');
});


