@if(Session::has('message'))
<div class="alert alert-success success-message">
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">[[Session::get('message')]]</div>
		<div class="col-md-1"><a href="" class="pull-right alert-close tiny"><span class="glyphicon glyphicon-remove"></span></a></div>
	</div>		
</div>
@endif 
<div class="hidden-xs hidden-sm">
	<div id="carousel-webo" class="carousel slide" data-ride="carousel" style="margin-bottom:2px;">
 		  <ol class="carousel-indicators">
		    <li data-target="#carousel-webo" data-slide-to="0" class="active"></li>
		    <li data-target="#carousel-webo-erp" data-slide-to="1"></li>
		    <li data-target="#carousel-webo-erp" data-slide-to="2"></li>
		  </ol>
		<div class="carousel-inner" role="listbox">
		<div class="item active">
		  <img src="[[URL::to('assets/images/slider1.jpg')]]" alt="..." style="height:500px !important; width:100% !important;">
		  <div class="carousel-caption">
		    ...
		  </div>
		</div>
		<div class="item">
		  <img src="[[URL::to('assets/images/slider2.jpg')]]" alt="..." style="height:500px !important; width:100% !important;">
		  <div class="carousel-caption">
		    ...
		  </div>
		</div>
		 <div class="item">
		  <img src="[[URL::to('assets/images/slider3.jpg')]]" alt="..." style="height:500px !important; width:100% !important;">
		  <div class="carousel-caption">
		    ...
		  </div>
		</div>
		</div>
		<a class="left carousel-control" href="#carousel-webo" role="button" data-slide="prev"style="top:40% !important;">
			<span class="fa fa-angle-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#carousel-webo" role="button" data-slide="next" style="top:40% !important;">
			<span class="fa fa-angle-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
</div>
<div class="container">
	<div class="row">			
		<div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="padding: 20px; color: #666 !important;"> 				
			<strong style="font-size: 17px;line-height: 32px;">Are you an ERP or commerce partner, Powerful collaboration, and product management,reports. We have a business opportunity for you!</strong>
		</div>
	</div>
</div>