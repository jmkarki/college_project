<div class="container panel-data">
	<div class="row">
	    <div class="col-md-12">
	      <div class="plan-heading">
			<p class="leader"><strong>How commited are you?</strong></p>
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
                          <p class="lead" ><strong>$0/ month</strong></p> 
                         
                    </div>
                    <table class="table">
                        <tr class="active"><td>Limited Users</td></tr>
                        
                        <tr><td>Limited invoices, estimates, bills,and Expenses</td></tr>
                        <tr class="active"><td>1 GB Storage</td></tr>
                        <tr ><td>Limited Reports</td></tr>
                    </table>
                </div> 
                <div class="panel-footer">
                    [[Form::open(array('url'=>'register','method'=>'GET'))]]
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
                         
                    </div>
                    <table class="table">
                        <tr class="active"><td>Multiple Users</td></tr>
                        
                        <tr><td>Unlimited invoices, estimates, bills,and Expenses</td></tr>
                        <tr class="active"><td>1 GB Storage</td></tr>
                        <tr ><td>Weekly Reports</td></tr>
                    </table>
                </div> 
                <div class="panel-footer">
                    [[Form::open(array('url'=>'register/now','method'=>'GET'))]]
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

                          <p class="lead">
                              
                          </style><strong>$13/ month</strong></p> 
                         

                    </div>
                    <table class="table">
                        <tr class="active"><td>Multiple Users</td></tr>
                        
                        <tr><td>Unlimited invoices, estimates, bills,and Expenses</td></tr>
                        <tr class="active"><td>3 GB Storage</td></tr>
                        <tr class=><td>Weekly Reports</td></tr>
                    </table>
                </div>
                 <div class="panel-footer">
                    [[Form::open(array('url'=>'register/now','method'=>'GET'))]]
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
                          <p class="lead" ><strong>$25/ month</strong></p> 
                         
                    </div>
                    <table class="table">
                        <tr class="active"><td>Multiple Users</td></tr>
                      
                        <tr><td>Unlimited invoices, estimates, bills,and Expenses</td></tr>
                        <tr class="active"><td>5 GB Storage</td></tr>
                        <tr class=><td>Weekly Reports</td></tr>
                    </table>
                </div>
                <div class="panel-footer">                    
                    [[Form::open(array('url'=>'register/now','method'=>'GET'))]]
                        <input type="hidden" name="plan" value="3">
                        <button type="submit" class="btn btn-sky btn-normal platinum-plan"><strong>Get Started</strong></button>
                    [[Form::close()]]
                </div>
            </div>
        </div>
    </div>
</div>