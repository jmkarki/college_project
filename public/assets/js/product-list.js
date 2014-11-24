$(document).ready(function(){
	var base_url =$('.base-url').val();
	$('.product-container').on('click','.each-product',function(){
		var id = $(this).data('id');
		$.ajax({
			url: base_url+'/product/currentproduct',
			type: 'GET',
			data:{product_id:id},
			success:function(response){
				$('.product-title').html(response.product_name);
				$('.product-des').html(response.product_description);
				$('.product-img').attr('src',response.imgUrl);
				var result = '';
				 for (var i = 0; i < response.option.length; i++) {
			 		result += '<div class="option-content">'+
						 					'<div class="row app-row">'+
												'<div class="col-md-4">'+
													'<div class="option-title">'+response.option[i].option_name+'</div>'+
													'<div class="option-price">'+
														'Market Price: <strong>'+response.option[i].price.market_price+'</strong>'+
													'</div>'+
													'<div class="option-price">'+
														'Selling Price: <strong>'+response.option[i].price.sell_price+'</strong>'+
													'</div>'+
												'</div>'+
												'<div class="col-md-8">'+
													'<div class="option-des">'+response.option[i].option_description+'</div>'+
												'</div>'+
											'</div>'+
											'<div class="row app-row">'+
												'<div class="table-responsive">'+
													'<table class="table table-stripped">'+
														'<tr><th>Lot No</th><th>Batch No</th><th>Manufactured Date</th><th>Purchased Date</th><th>Expiry Date</th></tr>'+
														'<tr><td>'+response.option[i].price.lot_no+'</td><td>'+response.option[i].price.batch_no+'</td><td>'+response.option[i].price.manufacture_date+'</td><td>'+response.option[i].price.purchase_date+'</td><td>'+response.option[i].price.expiry_date+'</td></tr>'+
													'</table>'+
												'</div>'+
											'</div>'+
										'</div>';
				 }
				$('.option-content-holder').html(result);
			}

		});
	});
});