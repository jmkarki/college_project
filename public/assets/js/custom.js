
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
        
        if(curStepBtn == 'step-1'){
            var productName = $('.productName').val(),
                productBrand = $('.selectBrand').val(),
                productCategory = $('.selectCategory').val(),
                productDp = $.trim($('.product-des-value').val());
                //console.log(productDes);return false;

            if(productName == ''){
                $('.product-name-message').html('Product name is required.').removeClass('none').addClass('tiny-error-message');
                $('.productName').addClass('error-border').focus();
                return false;
            }else if(productBrand == 0){
                $('.product-brand-message').html('Brand name is required.').removeClass('none').addClass('tiny-error-message');
                $('.selectBrand').addClass('error-border');
                return false;
            }else if(productCategory == 0){
                $('.product-cate-message').html('Category name is required.').removeClass('none').addClass('tiny-error-message');
                $('.selectCategory').addClass('error-border');
                return false;
            }else if(productDp == ''){
                $('.product-des-message').html('Product description is required.').removeClass('none').addClass('tiny-error-message');
                $('.product-des-value').addClass('error-border');
                return false;
            }else{
                nextStepWizard.removeAttr('disabled').trigger('click');
                return true;
            }
        }else if(curStepBtn == 'step-2'){
            console.log('step-2');
        }else if(curStepBtn == 'step-3'){
            console.log('step-3');
        }
       //set up validation before the snippet below.
        //nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-primary').trigger('click');
});


