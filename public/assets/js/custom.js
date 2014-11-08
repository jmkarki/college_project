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
    //
    $('.datepicker').datepicker();
    
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
        }else if(curStepBtn == 'step-3'){
            nextStepWizard.removeAttr('disabled').trigger('click');
            return true;
            console.log('step-3');
        } 
    });
    $('#addApicture').click(function(){
        $('.image-error').html('');
        $('#cancel').remove();
    });
    $('div.setup-panel div a.btn-primary').trigger('click');      
});

//image crop section
var inputFile,ah,ab;
$(document).ready(function() {
    var p = $("#uploadPreview");
    var _URL = window.URL || window.webkitURL;

    // prepare instant preview
    $("#uploadImage").change(function(e){
        console.log($(this).val());
         var file, img,aw;
        if ((file = this.files[0])) {
            img = new Image();
            img.onload = function () {
                aw= (this.width)/500;
                ah = this.height;
                ab = this.width;
                $('#chag_sort').val(aw);
            };
            img.src = _URL.createObjectURL(file);
        }
        p.fadeOut();
        var ext = $('#uploadImage').val().split('.').pop().toLowerCase();
        if($.inArray(ext, ['png','jpg','jpeg']) == -1) {
             $("#uploadImage").val("");
        }
        // prepare HTML5 FileReader
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

        oFReader.onload = function (oFREvent) {
            p.attr('src', oFREvent.target.result).fadeIn();
        };
        if($(this).val() != ''){
            $('#ok_btn, #close_btn').prop('disabled',false);
        }
    });     
    $("#uploadPreview").imgAreaSelect({
        x1 : 120,
        y1 : 64,
        x2 : 276, 
        y2 : 220,
        aspectRatio: '1:1',
        instance: true,
        onSelectStart: function(){
            $(".imgareaselect-outer").show();
            $(".imgareaselect-border1").show();
            $(".imgareaselect-border2").show();
            $(".imgareaselect-border3").show();
            $(".imgareaselect-border4").show();
        },
        onSelectEnd: setInfo                        
    });

    $('img#uploadPreview').load(function(){      
        $(this).imgAreaSelect({
            x1 : 120,
            y1 : 64,
            x2 : 276, 
            y2 : 220,
            aspectRatio: '1:1',
            instance: true,
            onSelectStart: function(){
                $(".imgareaselect-outer").show();
                $(".imgareaselect-border1").show();
                $(".imgareaselect-border2").show();
                $(".imgareaselect-border3").show();
                $(".imgareaselect-border4").show();
            },
            onSelectEnd: setInfo                        
        });
        $('#x').val(120);
        $('#y').val(64);
        $('#w').val(276);
        $('#h').val(220);
    });
    
    $("#close_btn").click(function(){ 
        $(".imgareaselect-outer").hide();
        $(".imgareaselect-border1").hide();
        $(".imgareaselect-border2").hide();
        $(".imgareaselect-border3").hide();
        $(".imgareaselect-border4").hide();  
    });
        
    $("#ok_btn").unbind().click(function(){
        $(".imgareaselect-outer").hide();
        $(".imgareaselect-border1").hide();
        $(".imgareaselect-border2").hide();
        $(".imgareaselect-border3").hide();
        $(".imgareaselect-border4").hide();
        $('#removed').val('0');
        //for image preview
        var xval = $("#x").val();
        var yval = $("#y").val();
        var resizex = 100/$("#w").val();
        var resizey = 100/$("#h").val();

        $("#prev_img img").css({
            'width': Math.round(resizex*ab)+'px',
            'height': Math.round(resizey*ah)+'px',
            'margin-left': -Math.round(resizex*xval)+'px',
            'margin-top': -Math.round(resizey*yval)+'px'
        });
        $("#prev_img").show();
        if($("#removeApicture").length == 0)
        $("#prev_img").one().before('<button class="btn-green" id="cancel">Cancel</button>');
        $("#close_btn").click();

    });
      
});

function setInfo(i, e) {
        
    var as= $('#chag_sort').val();
    var x= e.x1 * as;
    var y= e.y1 * as;
    var w= e.width * as;
    var h= e.height * as;
    $('#x').val(x);
    $('#y').val(y);
    $('#w').val(w);
    $('#h').val(h);
    if((e.x1==e.x2)&&(e.y1==e.y2)){
        $( 'img#uploadPreview' ).imgAreaSelect({
            instance: true,
            aspectRatio: '1:1', 
            x1 : 120,
            y1 : 64,
            x2 : 276, 
            y2 : 220                        
        });
        $('#x').val(120);
        $('#y').val(64);
        $('#w').val(276);
        $('#h').val(220);
    }
}
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function (e) {
            $('#prev_img img').attr('src', e.target.result);

        };

        reader.readAsDataURL(input.files[0]);
    }
}

$('#removeApicture').click(function(){
    $(this).remove();
    $('#x').val('');
    $('#y').val('');
    $('#w').val('');
    $('#h').val('');
    $('#removed').val('1');
    $('#prev_img').hide();
    return false;
});
$('#imgdiv').on('click','#cancel',function(){
    $(this).remove();
    $('#x').val('');
    $('#y').val('');
    $('#w').val('');
    $('#h').val('');
    $('#prev_img').hide();
    return false;
});



// var nowTemp = new Date();
// var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
 
// var checkin = $('#dpd1').datepicker({
//   onRender: function(date) {
//     return date.valueOf() < now.valueOf() ? 'disabled' : '';
//   }
// }).on('changeDate', function(ev) {
//   if (ev.date.valueOf() > checkout.date.valueOf()) {
//     var newDate = new Date(ev.date)
//     newDate.setDate(newDate.getDate() + 1);
//     checkout.setValue(newDate);
//   }
//   checkin.hide();
//   $('#dpd2')[0].focus();
// }).data('datepicker');
// var checkout = $('#dpd2').datepicker({
//   onRender: function(date) {
//     return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
//   }
// }).on('changeDate', function(ev) {
//   checkout.hide();
// }).data('datepicker');