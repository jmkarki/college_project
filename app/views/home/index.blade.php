<!DOCTYPE html>
<html>
<head>
	<title>Welcome:: Home page...</title>
	<link rel="stylesheet" type="text/css" href="{{URL::to('assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{URL::to('assets/css/default.css')}}">
	<link rel="stylesheet" type="text/css" href="{{URL::to('assets/css/himanshu.css')}}">
</head>
<body>
	<div class="wrapper">
		<div class="row app-header nav navbar nav-collapse">
			<div class="container">
				<div class="row">
					<div class="col-md-2">
						<!-- <img src="{{URL::to('assets/images/logo1.png')}}"> -->
					</div>
					<div class="col-md-6">
						<!-- <input type="search" class="form-control medium-control" placeholder="Site Search..."> -->
					</div>
					<div class="col-md-4 pull-right" style="text-align: right;"><a href="{{URL::to('login/auth')}}" class="btn-green btn-normal">Sign in</a></div>
				</div>
			</div>
		</div>
		<div class="body-content">
			<div class="container" style="zoom: 102%;">
				<div class="row">
					<div class="col-md-7">some sweet text here</div>
					<div class="col-md-5">
 						      <form role="form">
						        <!-- <h3>Please Sign Up <small>It's free and always will be.</small></h3> -->
						        <!-- <hr class="colorgraph"> -->
						        <div class="row" >
						          <div class="col-xs-6 col-sm-6 col-md-6 row-margin-right">
						            <div class="form-group">
						              <input type="text" name="first_name" id="first_name" class="form-control medium-control " placeholder="First Name" tabindex="1">
						            </div>
						          </div>
						          <div class="col-xs-6 col-sm-6 col-md-6 row-margin-left">
						            <div class="form-group">
						              <input type="text" name="last_name" id="last_name" class="form-control medium-control " placeholder="Last Name" tabindex="2">
						            </div>
						          </div>
						        </div>
						        <div class="form-group">
						          <input type="text" name="display_name" id="display_name" class="form-control medium-control " placeholder="Pick a Username" tabindex="3">
						        </div>
						        <div class="form-group">
						          <input type="email" name="email" id="email" class="form-control medium-control " placeholder="Email Address" tabindex="4">
						        </div>
						        <div class="row">
						          <div class="col-xs-6 col-sm-6 col-md-6 row-margin-right">
						            <div class="form-group">
						              <input type="password" name="password" id="password" class="form-control medium-control " placeholder="Create a Password" tabindex="5">
						            </div>
						          </div>
						          <div class="col-xs-6 col-sm-6 col-md-6 row-margin-left">
						            <div class="form-group">
						              <input type="password" name="password_confirmation" id="password_confirmation" class="form-control medium-control " placeholder="Confirm Password" tabindex="6">
						            </div>						            
						          </div>
						          <span class="left-section">Use at least one lowercase letter, one numberal, and seven characters.</span>
						        </div>
						        <hr class="colorgraph">
						        <a href="#" class="btn-green btn-wide" style="margin-bottom: 8px;"><strong>Sign up &raquo;</strong></a><br>
						        <span class="right-section">By clicking "Sign Up", you agree to our <a href="#">terms of service</a> and <a href="#">privacy policy</a>. We will send your account related emails occasionally.</span>
						      </form>
						     <p></p>
					</div>
				</div>
			</div>
			<!--  <div class="container">
				<div class="row">
				    <div class="col-md-12">
				      <div class="plan-heading">
						<p class="lead"><strong>How Commited Are You?</strong></p>
						 <p style="font-size:22px; font-weight:300;font-style:bold;">How Commited Are You ?</p> -->
				    <!--   </div>
				    </div>
				</div>
			<div class="row"> --> 
							   <!--<div class="col-md-4">
			  <div class="panel panel-info">
			     <div class="panel-heading"><h3 class="text-center">Silver</h3></div>
			         <div class="panel-body text-center">
						<p class="lead"><strong>$9/ month</strong></p>
					</div>
			                       <ul class="list-group list-group-flush text-center">
										<li class="list-group-item"><i class="icon-ok text-warning"></i> Personal use <span class="glyphicon glyphicon-ok pull-right"></span></li>
										<li class="list-group-item"><i class="icon-ok text-warning"></i> Unlimited projects <span class="glyphicon glyphicon-remove pull-right"></span></li>
										<li class="list-group-item"><i class="icon-ok text-warning"></i> 27/7 support</li>
									</ul>
			    <div class="panel-footer">
					<a class="btn btn-lg btn-plan btn-blue" href=""><strong>Choose</strong></a>
				</div>
			 </div>

			  </div>
			  <div class="col-md-4">
				  <div class="panel panel-warning">
				     <div class="panel-heading"><h3 class="text-center">Gold</h3></div>
				         <div class="panel-body text-center">
							<p class="lead"><strong>$49 / six month</strong></p>
						</div>
                       <ul class="list-group list-group-flush text-center">
							<li class="list-group-item"><i class="icon-ok text-warning"></i> Personal use</li>
							<li class="list-group-item"><i class="icon-ok text-warning"></i> Unlimited projects</li>
							<li class="list-group-item"><i class="icon-ok text-warning"></i> 27/7 support</li>
						</ul>
				    <div class="panel-footer">
						<a class="btn btn-lg btn-plan btn-gold" href=""><strong>Choose</strong></a>
					</div>
				 </div>
			  </div>
			   <div class="col-md-4">
			  <div class="panel panel-success">
			    <div class="panel-heading"><h3 class="text-center">Platinum</h3></div>
			         <div class="panel-body text-center">
						<p class="lead"><strong>$93 / year</strong></p>
					</div>
			                       <ul class="list-group list-group-flush text-center">
										<li class="list-group-item"><i class="icon-ok text-warning"></i> Personal use</li>
										<li class="list-group-item"><i class="icon-ok text-warning"></i> Unlimited projects</li>
										<li class="list-group-item"><i class="icon-ok text-warning"></i> 27/7 support</li>
									</ul>
			    <div class="panel-footer">
					<a class="btn-green btn-wide btn-plan" href=""><strong>Choose</strong></a>
				</div>
			 </div>

			  </div>
			  </div>
			</div> -->
			<p style="height:20px;"></p>
			<div class="container">
			<div class="row">
				    <div class="col-md-12">
				      <div class="plan-heading">
						<p class="lead"><strong>How Commited Are You?</strong></p>
						 <!-- <p style="font-size:22px; font-weight:300;font-style:bold;">How Commited Are You ?</p> -->
				      </div>
				    </div>
				</div>
    <div class="row">
        <div class="col-xs-12 col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Bronze</h3>
                </div>
                <div class="panel-body">
                    <div class="the-price">
                          <p class="lead"><strong>$9/ month</strong></p> 
                         <small>1 month FREE trial</small>
                    </div>
                    <table class="table">
                        <tr>
                            <td>
                                1 Account
                            </td>
                        </tr>
                        <tr class="active">
                            <td>
                                1 Project
                            </td>
                        </tr>
                        <tr>
                            <td>
                                100K API Access
                            </td>
                        </tr>
                        <tr class="active">
                            <td>
                                100MB Storage
                            </td>
                        </tr>
                      <!--   <tr>
                            <td>
                                Custom Cloud Services
                            </td>
                        </tr> -->
                        <tr class="active">
                            <td>
                                Weekly Reports
                            </td>
                        </tr>
                    </table>
                </div> 
                     <div class="panel-footer">
					<a class="btn btn-default btn-default-plan" href=""><strong>Sign Up</strong></a>
				</div>
                   
            </div>
        </div>
        <div class="col-xs-12 col-md-3">
            <div class="panel panel-success">
                <div class="cnrflash">
                    <div class="cnrflash-inner">
                        <span class="cnrflash-label">MOST
                            <br>
                            POPULR</span>
                    </div>
                </div>
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Silver</h3>
                </div>
                <div class="panel-body">
                    <div class="the-price">
                          <p class="lead"><strong>$9/ month</strong></p> 
                         <small>1 month FREE trial</small>
                    </div>
                    <table class="table">
                        <tr>
                            <td>
                                2 Account
                            </td>
                        </tr>
                        <tr class="active">
                            <td>
                                5 Project
                            </td>
                        </tr>
                        <tr>
                            <td>
                                100K API Access
                            </td>
                        </tr>
                        <tr class="active">
                            <td>
                                200MB Storage
                            </td>
                        </tr>
                       <!--  <tr>
                            <td>
                                Custom Cloud Services
                            </td>
                        </tr> -->
                        <tr class="active">
                            <td>
                                Weekly Reports
                            </td>
                        </tr>
                    </table>
                </div>
               <!--  <div class="panel-footer">
                    <a href="http://www.jquery2dotnet.com" class="btn btn-success" role="button">Sign Up</a>
                    1 month FREE trial</div> -->
                     <div class="panel-footer">
					<a class="btn-green btn-normal" href=""><strong>Sign Up</strong></a>
				</div>
            </div>
        </div>

        <div class="col-xs-12 col-md-3">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Gold</h3>
                </div>
                <div class="panel-body">
                    <div class="the-price">
                          <p class="lead"><strong>$9/ month</strong></p> 
                         <small>1 month FREE trial</small>
                    </div>
                    <table class="table">
                        <tr>
                            <td>
                                5 Account
                            </td>
                        </tr>
                        <tr class="active">
                            <td>
                                20 Project
                            </td>
                        </tr>
                        <tr>
                            <td>
                                300K API Access
                            </td>
                        </tr>
                        <tr class="active">
                            <td>
                                500MB Storage
                            </td>
                        </tr>
                     <!--    <tr>
                            <td>
                                Custom Cloud Services
                            </td>
                        </tr> -->
                        <tr class="active">
                            <td>
                                Weekly Reports
                            </td>
                        </tr>
                    </table>
                </div>
                 <div class="panel-footer">
					<a class="btn btn-gold btn-normal" href=""><strong>Sign Up</strong></a>
				</div>
            </div>
        </div>
            <div class="col-xs-12 col-md-3">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Platinum</h3>
                </div>
                <div class="panel-body">
                    <div class="the-price">
                          <p class="lead"><strong>$9/ month</strong></p> 
                         <small>1 month FREE trial</small>
                    </div>
                    <table class="table">
                        <tr>
                            <td>
                                5 Account
                            </td>
                        </tr>
                        <tr class="active">
                            <td>
                                20 Project
                            </td>
                        </tr>
                        <tr>
                            <td>
                                300K API Access
                            </td>
                        </tr>
                        <tr class="active">
                            <td>
                                500MB Storage
                            </td>
                        </tr>
<!--                         <tr>
                            <td>
                                Custom Cloud Services
                            </td>
                        </tr> -->
                        <tr class="active">
                            <td>
                                Weekly Reports
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="panel-footer">
                    <a class="btn btn-sky btn-normal" href=""><strong>Sign Up</strong></a>
                </div>
            </div>
        </div>
    </div>
</div>



			</div>
		<div class="row app-footer" style="text-align:center;">
			<div class="container">
				<span class="centered">
					&copy; 2014 - All rights reserved.
				</span>
			</div>
		</div>
	</div>
</body>
</html>