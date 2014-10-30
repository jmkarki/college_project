var base_url = $("#base_url").val();
$(document).ready(function(){

	//when transaction save button is clicked
	$("#save_transaction").click(function(){
		var valid = validate();
		if(valid == false){
			return false;
		}

		$.ajax({
			url: base_url+'/ajax/addtransaction',
			type: 'POST',
			data: {
				applicants_id: $("#applicants_id").val(),
				title: $("#transaction_title").val(),
				debit_credit: $("input[name='transaction_debit']:checked").val(),
				date: $("#transaction_date").val(),
				amount: $("#transaction_amount").val(),
				remarks: $("#transaction_remarks").val()
			},
			beforeSend: function(){
				$("#save_transaction").prop('disabled', true).after('<img style="width:30px" src="'+base_url+'/assets/images/loading.gif" />');
			},
			success: function(response){
				console.log(response);
				$("#save_transaction").prop('disabled', false).next('img').remove();
				
				if(response == 'No Such Applicant Exists.'){
          			$('#transaction_error').addClass('manapp-alert').html('No Such Applicant Exists.');
          			return false;
          		}
          		if(response == 'Not of this manpower.'){
          			$('#transaction_error').addClass('manapp-alert').html('Applicant not of this manpower.');
          			return false;
          		}
          		var transactionCount = Number($("#transaction-count").text());
          		transactionCount++;
          		var balance = Number($("#net-balance").text());
          		var transaction = "<tr class='table-row eachtransaction' data-transaction='"+response['id']+"' data-toggle='modal' data-target='#transaction-details'>"+
			  						"<td>"+response['transaction_date']+"</td>"+
			  						"<td>"+response['title']+"</td>"+
			  						"<td>";
			  	if(response['debit_credit'] == 0){
			  		transaction = transaction + response['amount'];
			  		balance = balance + Number(response['amount']);
			  	}
			  	transaction = transaction +	"</td>"+
			  								"<td>";
			  	if(response['debit_credit'] == 1){
			  		transaction = transaction + response['amount'];
			  		balance = balance - Number(response['amount']);
			  	}
			  	transaction = transaction +	"</td>"+
			  								"<td>"+balance+"</td>"+
			  								"</tr>";

			  	$(".transactionShow").find('tr:last').before(transaction);
			  	$("#transaction-count").text(transactionCount);
			  	$("#net-balance").html(balance);
			  	$("#transaction_title, #transaction_date, #transaction_amount, #transaction_remarks").val('');
			  	$("#transaction_error").removeClass('manapp-alert').html('');
			}
		});	
	});



	//to show each transaction details
	$('#transaction-logs').on("click", ".eachtransaction", function(){
		$(this).unbind();
		var thistransaction = $(this);
		var transaction_id = thistransaction.data('transaction');
// console.log(transaction_id);
		$.ajax({
			url: base_url+'/ajax/transactiondetails',
			type: 'POST',
			data:{
				transaction_id: transaction_id
			},
			success: function(response){
				$("#show_date").html(response['transaction']['transaction_date']);
				$("#show_title").html(response['transaction']['title']);
				$("#show_amount").html(response['transaction']['amount']);
				$("#show_remarks").html(response['transaction']['remarks']);
				$("#show_user").html(response['users']['name']);
				$("#show_timestamp").html(response['transaction']['updated_at']);
				if(response['transaction']['debit_credit'] == 0){
					$("#show_type").html('<span class="passed">Incomming</span>');
				}else{
					$("#show_type").html('<span class="failed">Outgoing</span>');
				}
				$('#transaction-details').modal('show');
			}
		});

	});
});


//validation of the transaction form
function validate(){
	var title = $("#transaction_title").val();
	var income = $("input[name='transaction_debit']:checked").val();
	var date = $("#transaction_date").val();
	var amount = $("#transaction_amount").val();
	var remarks = $("#transaction_remarks").val();
	var error = $("#transaction_error");
	if(title == ''){
		error.addClass('manapp-alert').html('Title Field Empty.');
		return false;
	}else if(date == ''){
		error.addClass('manapp-alert').html('Date Field Empty.');
		return false;
	}else if(income == null){
		error.addClass('manapp-alert').html('Income Type Not Selected.');
		return false;
	}else if(amount == ''){
		error.addClass('manapp-alert').html('Amount Field Empty.');
		return false;
	}else{
		error.removeClass('manapp-alert').html('');
		return true;
	}
}