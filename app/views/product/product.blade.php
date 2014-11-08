@extends('default.main')
@section('content')
<div class="data-container">
	<div class="header">
		<div class="command">
			<button class="menu-btn-green new-product"><span class="glyphicon glyphicon-plus"></span> Product</button>
			<button class="menu-btn-green new-category"><span class="glyphicon glyphicon-plus"></span> Category</button>
			<button class="menu-btn-green new-brand"><span class="glyphicon glyphicon-plus"></span> Brand</button>
			<button class="menu-btn-green"><span class="glyphicon glyphicon-chevron-down" style="font-size:12px;"></span> Product List</button>
			<button class="menu-btn-green"><span class="glyphicon glyphicon-chevron-down"style="font-size:12px;"></span> Category List</button>
			<button class="menu-btn-green"><span class="glyphicon glyphicon-chevron-down"style="font-size:12px;"></span> Brand List</button>
		</div>		
	</div>
	<div class="body">
		@if(Session::has('message'))
		<div class="alert alert-success success-message">
			{{Session::get('message')}}
			<a href="" class="pull-right alert-close tiny"><span class="glyphicon glyphicon-remove"></span></a>
		</div>
		@endif
		<div class="form-header none">
			Register New Product.
		</div>
		<div class="include-form">
			<div class="show-new-product none">
				@include('product.new-product')
			</div>
			<div class="show-new-category none">
				@include('product.new-category')
			</div>
			<div class="show-new-brand none">
				@include('product.new-brand')
			</div>
			<div class="show-brands none">
				<!-- 	<div class="media block-update-card">
				  <a class="pull-left" href="#">
				    <img class="media-object update-card-MDimentions" src="http://3.bp.blogspot.com/-IbEOTNtCMyU/TfCAdHaAxEI/AAAAAAAAA8U/EATib38SSAM/s320/joe-mcelderry.jpg" alt="...">
				  </a>
				  <div class="media-body update-card-body">
				    <h4 class="media-heading">Manning Hilton</h4>
				    <p>This is the body content of this media.This can be 
				      used as an update panel</p>
				  </div>
				 </div> -->

				 <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css"/>
			<!--Card with Media-->    
			<div class="media block-update-card">
			  <a class="pull-left" href="#">
			    <img class="media-object update-card-MDimentions" src="http://3.bp.blogspot.com/-IbEOTNtCMyU/TfCAdHaAxEI/AAAAAAAAA8U/EATib38SSAM/s320/joe-mcelderry.jpg" alt="...">
			  </a>
			  <div class="media-body update-card-body">
			    <h4 class="media-heading">Manning Hilton</h4>
			    <p>This is the body content of this media.This can be 
			      used as an update panel</p>
			  </div>
			 </div>
			  
			  <!--Simple Card Layout-->
			  <div class="block-update-card">
			    <div class="update-card-body">
			      <h4>Vinothbabu K</h4>
			      <p>This is me. I am a Good Boy.This is the body content of this media.This can be 
			      used as an update panel.</p>
			    </div>
			  </div>
			  
			  
			  <!--Wanna Call Someone :P -->
			  <div class="media block-update-card">
			  <a class="pull-left" href="#">
			    <img class="media-object update-card-MDimentions" src="http://3.bp.blogspot.com/-IbEOTNtCMyU/TfCAdHaAxEI/AAAAAAAAA8U/EATib38SSAM/s320/joe-mcelderry.jpg" alt="...">
			  </a>
			  <div class="media-body update-card-body">
			    <h4 class="media-heading">Manning Hilton</h4>
			    <div class="btn-toolbar card-body-social" role="toolbar">
			      <div class="btn-group fa fa-github-alt git"></div>
			      <div class="btn-group linkedin fa fa-linkedin-square"></div>
			      <div class="btn-group twitter fa fa-twitter"></div>
			      <div class="btn-group facebook fa fa-facebook"></div>
			      <div class="btn-group google-plus fa fa-google-plus"></div>
			    </div>
			  </div>
			  </div>
			  
			  <!--Simple Card with Status Highlight-->
			  
			  <div class="block-update-card status">
			    <div class="h-status">
			     </div>
			      <div class="update-card-body">
			      <h4>Vinothbabu K</h4>
			      <p>This is me. I am a Good Boy.This is the body content of this media.This can be 
			      used as an update panel.</p>
			    </div>
			  </div>
			    
			   
			   <!--Simple Card with Status Highlight-->
			  
			  <div class="block-update-card">
			    <div class="v-status">
			     </div>
			      <div class="update-card-body">
			      <h4>Vinothbabu K</h4>
			      <p>This is me. I am a Good Boy.This is the body content of this media.This can be 
			      used as an update panel.</p>
			    </div>
			  </div>
			    
			  <!--Card with basic actions-->
			    
			  <div class="block-update-card status">
			    <div class="update-card-body">
			      <div class="update-card-body">
			      <h4>Vinothbabu K</h4>
			      <p>This is me. I am a Good Boy.This is the body content of this media.This can be 
			      used as an update panel.</p>
			    </div>
			    </div>
			    <div class="card-action-pellet btn-toolbar pull-right" role="toolbar">
			  <div class="btn-group fa fa-mail-reply"></div>
			  <div class="btn-group fa fa-map-marker"></div>
			  <div class="btn-group fa fa-magic"></div>
			  <div class="btn-group fa fa-photo"></div>
			</div>
			</div>
			    <!--Notification with a Clickable bottom-->
			    <div class="block-update-card status">
			    <div class="update-card-body">
			      <div class="update-card-body">
			      <h4>Vinothbabu K</h4>
			      <p>This is me. I am a Good Boy.This is the body content of this media.This can be 
			      used as an update panel.</p>
			    </div>
			    </div>
			        <p class="text-center card-bottom-status">
			        	UPDATE STATUS
			        </p>
			</div>			    
		</div>

		<div class="show-product-list none">
			    <div class="container">
		<div class="row">
			<div class="[ col-xs-12 col-sm-offset-2 col-sm-8 ]">
				<ul class="event-list">
					<li>
						<time datetime="2014-07-20">
							<span class="day">4</span>
							<span class="month">Jul</span>
							<span class="year">2014</span>
							<span class="time">ALL DAY</span>
						</time>
						<img alt="Independence Day" src="https://farm4.staticflickr.com/3100/2693171833_3545fb852c_q.jpg" />
						<div class="info">
							<h2 class="title">Independence Day</h2>
							<p class="desc">United States Holiday</p>
						</div>
						<div class="social">
							<ul>
								<li class="facebook" style="width:33%;"><a href="#facebook"><span class="fa fa-facebook"></span></a></li>
								<li class="twitter" style="width:34%;"><a href="#twitter"><span class="fa fa-twitter"></span></a></li>
								<li class="google-plus" style="width:33%;"><a href="#google-plus"><span class="fa fa-google-plus"></span></a></li>
							</ul>
						</div>
					</li>

					<li>
						<time datetime="2014-07-20 0000">
							<span class="day">8</span>
							<span class="month">Jul</span>
							<span class="year">2014</span>
							<span class="time">12:00 AM</span>
						</time>
						<div class="info">
							<h2 class="title">One Piece Unlimited World Red</h2>
							<p class="desc">PS Vita</p>
							<ul>
								<li style="width:50%;"><a href="#website"><span class="fa fa-globe"></span> Website</a></li>
								<li style="width:50%;"><span class="fa fa-money"></span> $39.99</li>
							</ul>
						</div>
						<div class="social">
							<ul>
								<li class="facebook" style="width:33%;"><a href="#facebook"><span class="fa fa-facebook"></span></a></li>
								<li class="twitter" style="width:34%;"><a href="#twitter"><span class="fa fa-twitter"></span></a></li>
								<li class="google-plus" style="width:33%;"><a href="#google-plus"><span class="fa fa-google-plus"></span></a></li>
							</ul>
						</div>
					</li>

					<li>
						<time datetime="2014-07-20 2000">
							<span class="day">20</span>
							<span class="month">Jan</span>
							<span class="year">2014</span>
							<span class="time">8:00 PM</span>
						</time>
						<img alt="My 24th Birthday!" src="https://farm5.staticflickr.com/4150/5045502202_1d867c8a41_q.jpg" />
						<div class="info">
							<h2 class="title">Mouse0270's 24th Birthday!</h2>
							<p class="desc">Bar Hopping in Erie, Pa.</p>
							<ul>
								<li style="width:33%;">1 <span class="glyphicon glyphicon-ok"></span></li>
								<li style="width:34%;">3 <span class="fa fa-question"></span></li>
								<li style="width:33%;">103 <span class="fa fa-envelope"></span></li>
							</ul>
						</div>
						<div class="social">
							<ul>
								<li class="facebook" style="width:33%;"><a href="#facebook"><span class="fa fa-facebook"></span></a></li>
								<li class="twitter" style="width:34%;"><a href="#twitter"><span class="fa fa-twitter"></span></a></li>
								<li class="google-plus" style="width:33%;"><a href="#google-plus"><span class="fa fa-google-plus"></span></a></li>
							</ul>
						</div>
					</li>

					<li>
						<time datetime="2014-07-31 1600">
							<span class="day">31</span>
							<span class="month">Jan</span>
							<span class="year">2014</span>
							<span class="time">4:00 PM</span>
						</time>
						<img alt="Disney Junior Live On Tour!" src="http://www.thechaifetzarena.com/images/main/DL13_PiratePrincess_thumb.jpg" />
						<div class="info">
							<h2 class="title">Disney Junior Live On Tour!</h2>
							<p class="desc"> Pirate and Princess Adventure</p>
							<ul>
								<li style="width:33%;">$49.99 <span class="fa fa-male"></span></li>
								<li style="width:34%;">$29.99 <span class="fa fa-child"></span></li>
							</ul>
						</div>
						<div class="social">
							<ul>
								<li class="facebook" style="width:33%;"><a href="#facebook"><span class="fa fa-facebook"></span></a></li>
								<li class="twitter" style="width:34%;"><a href="#twitter"><span class="fa fa-twitter"></span></a></li>
								<li class="google-plus" style="width:33%;"><a href="#google-plus"><span class="fa fa-google-plus"></span></a></li>
							</ul>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>

		</div>	
		</div>
	</div>	 
</div>
@stop
