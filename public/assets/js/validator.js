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
                productDp = $.trim($('.product-des-value').val()),
                uploadImg = $('#uploadImage').val();

            if(productName == ''){
                $('.product-name-message').html('Product name is required.').removeClass('none').addClass('tiny-error-message');
                $('.productName').addClass('error-border').focus();
                return false;
            }else if(productBrand == 0){
                $('.product-brand-message').html('No brand selected.').removeClass('none').addClass('tiny-error-message');
                $('.selectBrand').addClass('error-border');
                return false;
            }else if(productCategory == 0){
                $('.product-cate-message').html('No category selected..').removeClass('none').addClass('tiny-error-message');
                $('.selectCategory').addClass('error-border');
                return false;
            }else if(uploadImg == ''){
                $('.image-error').html('No file choosen.').addClass('tiny-error-message');
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
            nextStepWizard.removeAttr('disabled').trigger('click');
            return true;console.log('step-2');
        }
    });
    $('div.setup-panel div a.btn-primary').trigger('click');
 });