@if(Session::has('message'))
<div class="alert alert-success success-message">
	[[Session::get('message')]]
	<a href="" class="pull-right alert-close tiny"><span class="glyphicon glyphicon-remove"></span></a>
</div>
@endif
<div class="form-header">
	Add New Cheque Payment Record
</div>
<div class="include-form table-responsive">
<table class="table table-stripped">
	<tr>
		<th>Home</th>
		<th>About Us</th>
		<th>Business</th>
	</tr>
</table>
</div>