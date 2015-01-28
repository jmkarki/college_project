@extends('default.main')
@section('content')
<div class="data-container">
	@include('employee.employee-menu')
	<div class="body">
		<div class="form-header">New Employee.</div>
		<div class="include-form employee-list">
			<div class="table-responsive">
				<table class="table table-stripped">
					<tr>
						<th>Name</th>
						<th>Address</th>
						<th>Phone</th>
						<th>Mobile</th>
						<th>Email</th>
						<th>Action</th>
					</tr>					
					@foreach($employees as $employee)
						<tr>
							<td class="each-employee" data-toggle="modal" data-target="#employee-detail" data-id="[[$employee->employee_id]]">[[$employee['persons']->fullname]]</td>
							<td>[[$employee['persons']->addressline1]]</td>
							<td>[[$employee['persons']->phone]]</td>
							<td>[[$employee['persons']->mobile]]</td>
							<td>[[$employee['persons']->email]]</td>
							<td style="text-align: center">
							<a class="green-icon" href="[[URL::to('employee/update/'.$employee['persons']->person_id)]]">
								<span class="glyphicon glyphicon-edit"></span>
							</a>
						</td>
						</tr>					
					@endforeach
				</table>
			</div>
		</div>
	</div>	 
</div>
<div class="modal fade" id="employee-detail" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
     	<div class="modal-content model-data-content">
	    	<div class="modal-header app-modal">
		        <button type="button" class="close close-file" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h5 class="modal-title"><h4>Employee Information</h4></h5>
		    </div>
			<div class="modal-body product-data-wrapper">
				<div class="product-content">
					<div class="row app-row employee-holder"></div>						
					<div class="option-content-holder"></div>
					<!-- <button type="button" style="bottom: 20px;position: relative;right: 20px;"class="btn-green pull-right" data-dismiss="modal">Close</button> -->
				</div>
			</div>
    	</div>
  	</div>
</div>
<input type="hidden" value="[[URL::to('/')]]" class="base-url">
@stop
@section('script')
[[HTML::script('assets/js/supplier.js')]]
<script type="text/javascript">
	var base_url = $('.base-url').val();
	$('.employee-list').on('click','.each-employee',function(){
		var id = $(this).data('id');
		$.ajax({
			url: base_url+'/employee/eachemployee',
			type:'POST',
			data: {id: id},
			success:function(respose){
				var html = '<div class="row">'+
						'<div class="col-md-12 title-banner"><b>Basic Information</b></div>'+
						'</div>'+
						'<div class="row">'+
						'<div class="col-md-4">'+
							'<p><b>Name :</b> '+respose.persons.fullname+'</p>'+
							'<p><b>Address Line1:</b></p>'+
							'<p>'+respose.persons.addressline1+'</p>'+
							'<p><b>Address Line2:</b></p>'+
							'<p>'+respose.persons.addressline2+'</p>'+
						'</div>'+
						'<div class="col-md-4">'+
						'	<p><b>City:	</b> '+respose.persons.city+'</p>'+
							'<p><b>Country:	</b> '+respose.persons.country+'</p>'+
							'<p><b>Email:  </b> '+respose.persons.email+'</p>'+
							'<p><b>Gender:  </b>Male</p>'+
							'<p><b>Phone(Landline):	</b> '+respose.persons.phone+' </p>'+
						'</div>'+
						'<div class="col-md-4">'+
							'<p><b>Mobile:	</b> '+respose.persons.mobile+' </p>'+
							'<p><b>Zip/Postal Code:	</b> '+respose.persons.postcode+' </p>'+
							'<p><b>Created at:	</b> '+respose.persons.created_at+' </p>'+
						'</div>'+
					'</div>'+
					'<div class="row">'+
						'<div class="col-md-12 title-banner"><b>Job Specific Information</b></div>'+
					'</div>';
				var title = '';
				for(i = 0; i < respose.title.length; i++){					
					title = title + '<tr>'+
									'<td>'+respose.title[i].title+'</td>'+
									'<td>'+respose.title[i].salary+'</td>'+
									'<td>'+respose.title[i].department+'</td>'+
									'<td>'+respose.title[i].started_from+'</td>'+
									'<td data-id="'+respose.title[i].id+'">'+respose.title[i].ended_at+'</td>'+
									'<td style="float:right;"><span class="btn-green end-title" data-id="'+respose.title[i].id+'">End Title</span></td>'+
								'</tr>';
				}
				var titlelist = '';
				titlelist = '<div class="row">'+
							'<div class="col-md-12">'+
								'<table class="table table-stripped">'+
									'<tr>'+
										'<th>Job Title</th>'+
										'<th>Salary</th>'+
										'<th>Department</th>'+
										'<th>From</th>'+
										'<th>To</th>'+
										'<th>Action</th>'+
									'</tr>'+
									'<div>'+title+'</div>'+
								'</table>'+
							'</div>'+
						'</div>'+
						'<div class="row">'+
						// '<div class="col-md-12 title-banner"><button class="btn-green">New Job Specification</button> <i>Click Here For New Job Specification</i></div>'+
						'</div>';

				html = html + titlelist;
				$('.employee-holder').html(html);

			}
		});
	});
	$('.employee-holder').on('click','.end-title',function(){
		var id = $(this).data('id');
		$.ajax({
			url: base_url+'/employee/endtitle',
			type:'POST',
			data:{id:id},
			success:function(respose){
				var td = $('td[data-id='+respose.id+']');
				td.html(respose.ended_at);
			}
		});
	});
</script>
@stop
