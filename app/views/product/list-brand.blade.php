@extends('default.main')
@section('content')
<div class="data-container">
	@include('product.product-menu')
	<div class="body">
		@if(Session::has('message'))
		<div class="alert alert-success success-message">
			{{Session::get('message')}}
			<a href="" class="pull-right alert-close tiny"><span class="glyphicon glyphicon-remove"></span></a>
		</div>
		@endif
		<div class="form-header">
			<i class="fa fa-align-left"></i> List of availavle product brands.
		</div>
		<div class="include-form">
			<div class="table-responsive">
				<table class="table table-stripped">
					<tr><th>Brand</th><th>Description</th><th>Action</th></tr>
					@foreach($brands as $brand)
						<tr><td>{{$brand->brand_name}}</td><td>{{$brand->description}}</td><td><a href="#" data-id="{{$brand->brand_id}}" class="edit-icon each-brand" data-toggle="modal" data-target="#update-brand"><span class="glyphicon glyphicon-pencil"></span></a></td></tr>
					@endforeach
				</table>
			</div>
		</div>	 
	</div>
</div>
<div class="modal fade" id="update-brand" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
     	<div class="modal-content model-data-content">
	    	<div class="modal-header app-modal">
		        <button type="button" class="close close-file" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h5 class="modal-title">Update Brand Information.</h5>
		    </div>
			<div class="modal-body data-wrapper">
				{{Form::open(array('url'=>'product/updatebrand','class'=>'update-brand-form'))}}
				<div class="row app-row">
					<div class="col-md-4">
						<label>Name of Brand</label>
					</div>
					<div class="col-md-8">
						<input type="text" class="form-control brand-name-update" name="brand_name" value="">
						<span class="tiny-error-brand-name-update none"></span>
					</div>
				</div>
				<div class="row app-row">
					<div class="col-md-4">
						<label>Description</label>
					</div>
					<div class="col-md-8">
						<textarea class="form-control description-brand-update" style="height: 133px;" name="description"></textarea>
						<span class="tiny-error-brand-desc-update none"></span>
					</div>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="brand_id" class="brand_id">
					<input type="hidden" class="base_url" value="{{URL::to('/')}}">
					<button type="submit" class="btn-green update-data">Update</button>
					<button type="button" class="btn-green" data-dismiss="modal">Cancel</button>
				</div>
				{{Form::close()}}
			</div>
    	</div>
  	</div>
</div>
@stop
@section('script')
<script type="text/javascript">
	$(document).ready(function(){
		var base_url = $('.base_url').val();
		$('.include-form').on('click','.each-brand',function(){
			var brand_id = $(this).data('id');
			$('.brand_id').val(brand_id);
			$.ajax({
				url: base_url+'/product/updatebrand',
				type:'GET',
				data:{brand_id:brand_id},
				success:function(response){
					$('.brand-name-update').val(response.brand_name);
					$('.description-brand-update').val(response.description);
				}
			});	
		});

		$('.data-wrapper').on('click','.update-data',function(){
			var brand = $('.brand-name-update').val(),
				desc = $('.description-brand-update').val(); 
			if(brand == ''){
				// $('.tiny-error-brand-name-update').removeClass('none').addClass('tiny-error-message');
				$('.brand-name-update').addClass('error-border').focus();
				return false;
			}else if(desc == ''){
				// $('.tiny-error-brand-desc-update').html('This field is required.').removeClass('none').addClass('tiny-error-message');
				$('.description-brand-update').addClass('error-border').focus();
				return false;
			}
		});
		$('.brand-name-update').on('change',function(){
			$(this).removeClass('error-border');
		});
		$('.description-brand-update').on('change',function(){
			$(this).removeClass('error-border');
		});
	});
</script>
@stop


