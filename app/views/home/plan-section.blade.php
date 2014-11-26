<div class="container panel-data">
	<div class="row">
	    <div class="col-md-12">
	      <div class="plan-heading">
			<p class="lead"><strong>How commited are you?</strong></p>
		      </div>
	    </div>
	</div>
    <div class="row register-plan">
        <div class="col-xs-6 col-lg-3 col-md-3 col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Free</h3>
                </div>
                <div class="panel-body">
                    <div class="the-price">
                        <p class="lead"><strong>$0/ month</strong></p> 
                        <small>1 month FREE trial</small>
                    </div>
                    <table class="table">
                        <tr><td>  1 Employee </td></tr>
                        <tr class="active"><td>  1 User  </td></tr> 
                        <tr><td> 100K API Access </td></tr>
                        <tr class="active"><td>Only 100MB Storage</td>
                        </tr><tr class="active"><td>Weekly Reports</td></tr>
                    </table>
                </div> 
                <div class="panel-footer">
                    [[Form::open(array('url'=>'register?subscription=free','method'=>'GET'))]]
                        <input type="hidden" name="plan" value="0">
                        <button type="submit" class="btn btn-default btn-default-plan free-plan">Get Started</button>
                    [[Form::close()]]
				</div>                               
            </div>
        </div>
        <div class="col-xs-6 col-lg-3 col-md-3 col-sm-6">
            <div class="panel panel-success">
                <div class="cnrflash">
                    <div class="cnrflash-inner">
                        <span class="cnrflash-label">MOST<br>POPULR</span>
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
                        <tr><td>2 Account</td></tr>
                        <tr class="active"><td>5 Project</td></tr>
                        <tr><td>100K API Access</td></tr>
                        <tr class="active"><td>200MB Storage</td></tr>
                        <tr class="active"><td>Weekly Reports</td></tr>
                    </table>
                </div> 
                <div class="panel-footer">
                    [[Form::open(array('url'=>'register/now?subscription=premium','method'=>'GET'))]]
                        <input type="hidden" name="plan" value="1">
                        <button type="submit" class="btn-green btn-normal silver-plan"><strong>Get Started</strong></button>
                    [[Form::close()]]
				</div>
            </div>
        </div>

        <div class="col-xs-6 col-lg-3 col-md-3 col-sm-6">
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
                        <tr><td>5 Account</td></tr>
                        <tr class="active"><td>20 Project</td></tr>
                        <tr><td>300K API Access</td></tr>
                        <tr class="active"><td>500MB Storage</td></tr>
                        <tr class="active"><td>Weekly Reports</td></tr>
                    </table>
                </div>
                 <div class="panel-footer">
                    [[Form::open(array('url'=>'register/now?subscription=premium','method'=>'GET'))]]
                        <input type="hidden" name="plan" value="2">
                        <button type="submit" class="btn btn-gold btn-normal gold-plan"><strong>Get Started</strong></button>
                    [[Form::close()]]
				</div>
            </div>
        </div>
            <div class="col-xs-6 col-lg-3 col-md-3 col-sm-6">
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
                        <tr><td>5 Account</td></tr>
                        <tr class="active"><td>20 Project</td></tr>
                        <tr><td>300K API Access</td></tr>
                        <tr class="active"><td>500MB Storage</td></tr>
                        <tr class="active"><td>Weekly Reports</td></tr>
                    </table>
                </div>
                <div class="panel-footer">                    
                    [[Form::open(array('url'=>'register/now?subscription=premium','method'=>'GET'))]]
                        <input type="hidden" name="plan" value="3">
                        <button type="submit" class="btn btn-sky btn-normal platinum-plan"><strong>Get Started</strong></button>
                    [[Form::close()]]
                </div>
            </div>
        </div>
    </div>
</div>