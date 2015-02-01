$(document).ready(function(){
	var url = $('.base-url').val();
	$('.btn-paid').on('click',function(){
		$.ajax({
			url: url+'/payment/received',
			type:'POST',
			data:{id: $(this).data('id'),},
			success:function(data){
				if(data == 1){
					window.location.reload();
				}
			}
		});
	});

	$('.cheque-hover').on('click',function(){
		var id = $(this).data('id');
		$.ajax({
			url: url+'/payment/eachcheque',
			type:'POST',
			data:{id: id,},
			success:function(data){
				var count = 3+' Days Passed';
				var status = (data.status == 0) ? '<div class="badge btn-primary">Pending</div>': '<div class="badge btn-primary">Received</div>';
				var html =	'<div class="row">'+
							'<div class="col-md-4"></div>'+
							'<div class="col-md-4"></div>'+
							'<div class="col-md-4">'+
								'<b>Issuded Date:</b> <span class="border-dot">'+data.issued_date+'</span><br><br>'+
							'</div>'+
						'</div>'+
						'<div class="row">'+
							'<div class="col-md-4"><b>Bank Name: <span class="border-dot"> '+data.bank_name+'</span></b></div>'+
							'<div class="col-md-4"></div>'+
							'<div class="col-md-4">'+
								'<b>Due Date:</b> <span class="border-dot">'+data.due_date+'</span>'+
							'</div>'+
						'</div><br>'+
						'<div class="row">'+
							'<div class="col-md-4"><b>Beneficiary:</b> <span class="border-dot">'+data.beneficiary+'</span></div>'+
							'<div class="col-md-4"></div>'+
							'<div class="col-md-4"><b>Amount: </b> <span class="border-dot">'+data.amount+'</span></div>'+
						'</div><br>'+
						'<div class="row">'+
							'<div class="col-md-8"><b>Amount in Words:</b>'+
								'<span class="border-dot">&nbsp;'+toWords(data.amount)+'</span>'+
							'</div>'+
							'<div class="col-md-4">'+
								'<b>Status:</b>&nbsp;'+status+
							'</div>	'+
						'</div><br>'+
						'<div class="row">'+
							'<div class="col-md-8">'+
								'<b>Account Holder\'s Name:</b> <span class="border-dotq">'+data.cheque_name+'</span>'+
							'</div>'+
							'<div class="col-md-4">'+
								'<b>Count Days:</b> <span class="badge btn-danger">'+count+'</span>'+
							'</div>'+
						'</div>'+
						'<br>'+
						'<div class="row">'+
							'<div class="col-md-12">'+
								'<b>Account No:</b> <span class="border-dot">'+data.account_no+'</span>'+
							'</div>'+
						'</div>';
				$('.cheque-holder').html(html);
			}
		});
	});

	var th = ['','thousand','million', 'billion','trillion'];
	var dg = ['zero','one','two','three','four', 'five','six','seven','eight','nine'];
	var tn = ['ten','eleven','twelve','thirteen', 'fourteen','fifteen','sixteen',
	'seventeen','eighteen','nineteen'];
	var tw = ['twenty','thirty','forty','fifty', 'sixty','seventy','eighty','ninety'];
	function toWords(s){
		s = s.toString();
		s = s.replace(/[\, ]/g,'');
		if (s != parseFloat(s)) return 'not a number';
		var x = s.indexOf('.');
		if (x == -1) x = s.length;
		if (x > 15) return 'too big';
		var n = s.split('');
		var str = '';
		var sk = 0;
	for (var i=0; i < x; i++){
		if ((x-i)%3==2){
		if (n[i] == '1'){
		str += tn[Number(n[i+1])] + ' ';
		i++;
		sk=1;
	}
	else if (n[i]!=0){
		str += tw[n[i]-2] + ' ';
		sk=1;
		}
	}
	else if (n[i]!=0){
		str += dg[n[i]] +' ';
		if ((x-i)%3==0) str += 'hundred ';
		sk=1;
		}
		if ((x-i)%3==1)
		{
		if (sk) str += th[(x-i-1)/3] + ' ';
		sk=0;
		}
	}
	if (x != s.length){
		var y = s.length;
		str += 'point ';
		for (var i=x+1; i<y; i++) str += dg[n[i]] +' ';
		}
		return str.replace(/\s+/g,' ');
	}	
});	