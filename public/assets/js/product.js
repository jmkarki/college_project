$(document).ready(function(){
    var max_fields      = 3;
    var wrapper         = $(".option-holder");

    var x = 1;
    $('#step-2').on('click','.one-more',function(e){
        e.preventDefault();
       if(x < max_fields){
            x++;
       $(wrapper).append('<hr>'+
               '<div class="row col-md-12">'+
                    '<a class="remove_field btn-green pull-right" style="margin-bottom:3px;">'+
                    '<span class="glyphicon glyphicon-remove" style="color:#fff; font-size:10px;"></span></a>'+
                '</div>'+
                '<div class ="each-option">'+
                '<div class="row app-row">'+   
                    '<div class="col-md-4">'+
                        '<label>Option Name:</label>'+
                    '</div>'+
                    '<div class="col-md-8">'+
                        '<input type="text" class="form-control" name="option_name[]" placeholder="Option Name">'+
                        '<span class="none product-name-message"></span>'+
                    '</div>'+
                '</div>'+
                '<div class="row app-row">'+   
                    '<div class="col-md-4">'+
                        '<label>Option Desc:</label>'+
                    '</div>'+
                    '<div class="col-md-8">'+
                        '<textarea class="form-control" rows="4" wrap="physical" name="option-desc[]"></textarea>'+
                        '<span class="none product-name-message"></span>'+
                    '</div>'+
                '</div>'+
                '<div class="row app-row">'+   
                    '<div class="col-md-4">'+
                        '<label>Purchased On:</label>'+
                    '</div>'+
                    '<div class="col-md-8">'+
                        '<input type="text" class="form-control" name="purchasedon[]" placeholder="Purchased On">'+
                        '<span class="none product-name-message"></span>'+
                    '</div>'+
                '</div>'+
                '<div class="row app-row">'+   
                    '<div class="col-md-4">'+
                        '<label>Batch No, Lot No:</label>'+
                    '</div>'+
                    '<div class="col-md-8">'+
                        '<div class="row app-row">'+
                            '<div class="col-md-6 row-margin-right">'+
                                '<input type="text" class="form-control" name="batchno[]" placeholder="Batch No.">'+
                            '</div>'+
                            '<div class="col-md-6 row-margin-right">'+
                                '<input type="text" class="form-control" name="lotno[]" placeholder="Lot No.">'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
                '<div class="row app-row">   '+
                    '<div class="col-md-4"><label>Date:</label></div>'+
                    '<div class="col-md-8">'+
                        '<div class="row app-row">'+
                        '<div class="col-md-6 row-margin-right">'+
                            '<input type="text" name="manufacture-date[]" class="form-control" placeholder="Manufactured Date">'+
                        '</div>'+
                        '<div class="col-md-6 row-margin-left">'+
                            '<input type="text" name="expiry-date[]" class="form-control" placeholder="Expiry Date">'+
                        '</div>'+
                        '</div>'+
                    '</div>'+
                '</div> '+
               ' <div class="row app-row">'+
                    '<div class="col-md-4">'+
                        '<label>Prices:</label>'+
                    '</div>'+
                    '<div class="col-md-8">'+
                        '<div class="row app-row">'+
                            '<div class="col-md-4 row-margin-right">'+
                                '<input type="text" name="cp[]" class="form-control" placeholder="Cost Price">'+
                            '</div>'+
                            '<div class="col-md-4 row-margin-right row-margin-left">'+
                                '<input type="text" name="sp[]" class="form-control" placeholder="Selling Price">'+
                            '</div>'+
                            '<div class="col-md-4 row-margin-left">'+
                                '<input type="text" name="mp[]" class="form-control" placeholder="Market Price">'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
                '</div>');
        }
    });

    $(wrapper).on("click",".remove_field", function(e){
        e.preventDefault();
         var thissel = $(this).parent();
         var nextdiv = thissel.next('.each-option').remove();
         thissel.remove();
         x--;
    });
});