$(document).ready(function(){
    var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');
            allWells.hide();

    navListItems.on('click',function (e){
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
    allNextBtn.on('click',function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a");
        $(".app-row").removeClass("has-error");       
        
        if(curStepBtn == 'step-1'){
            var productName = $('.productName').val(),
                productBrand = $('.selectBrand').val(),
                productCategory = $('.selectCategory').val(),
                productDp = $.trim($('.product-des-value').val());
 
            if(productName == ''){
                $('.product-name-message').html('This field is required.').removeClass('none').addClass('tiny-error-message');
                $('.productName').focus();
                return false;
            }else if(productBrand == 0){
                $('.product-brand-message').html('This field is required.').removeClass('none').addClass('tiny-error-message');
                 return false;
            }else if(productCategory == 0){
                $('.product-cate-message').html('This field is required.').removeClass('none').addClass('tiny-error-message');
                 return false;
            }else if(productDp == ''){
                $('.product-des-message').html('This field is required.').removeClass('none').addClass('tiny-error-message');
                 return false;
            }else{
                nextStepWizard.removeAttr('disabled').trigger('click');
                return true;
            }    
        }
    });
    $('.productName').on('change',function(){
        $('.product-name-message').html('');
    });
    $('.selectBrand').on('change',function(){
        $('.product-brand-message').html('');
    });
    $('.selectCategory').on('change',function(){
        $('.product-cate-message').html('');
    });
    $('.product-des-value').on('change',function(){
        $('.product-des-message').html('');
    });
    $('div.setup-panel div a.btn-primary').trigger('click');
 });