<style type="text/css">
	html,body {
		margin: 0;
		padding: 0;
		font-family: 'Montserrat Bold', Arial, Helvetica, sans-serif !important;
	}
	.head{
		background-color: #659324;
		padding: 10px;
	}
	.email-body{
		background-color: #F9F5F5;
		border: 1px solid #E0D8D8;
		padding: 10px;
		font-family: monospace;
		font-size: 16px;
	}
	.container{
		margin: 0px auto;
		width: 700px;
	}
	.email-link{
		color: #0C6EC0 !important;
		text-decoration: none;
		}
	.email-link:hover{
		color:#084980 !important;
	}
	table tr{
		line-height: 30px;
	}

</style>
<div class="container">
	<table>
		<tr><td style="background-color: #470;padding: 20px;color: #fff;">logo</td></tr>
		<tr><td></td></tr>
		<tr><td><p>Hello,<?php echo $data['fullname'] ?> </p></td></tr>
		<tr><td><p>Welcome to Webo! </p></td></tr>
		<tr><td>Thanks for your interest in Webo, your payment has been received with Payment ID: <em><b><?php echo $data['payment_id'] ?></b></em></td></tr>
		<tr><td>Email Address: <b><em><?php echo $data['email'] ?></em></b></td></tr>
		<tr><td>Company Name: <em><b><?php echo $data['company_name'] ?></b></em></td></tr>
		<tr><td><p>Before you can start using WeboERP, you need to confirm your email address. To get started, just confirm your email address by clicking the link below:</p></td></tr>
		<tr><td><p><a class="email-link" href="<?php echo $data['url'] ?>?token='<?php echo $data['key']; ?>'"><em><?php echo $data['url'] ?>?token='<?php echo $data['key']; ?>'</em></a></p></td></tr>
		<tr><td><p>Hope you enjoy getting up and running. We're excited to see what comes next!</p></td></tr>
		<tr><td></td></tr>
		<tr><td style="padding-top:40px;"><b>Yours,</b></td></tr>
		<tr><td><u>The Webo Team</u></td></tr>
	</table>
</div>