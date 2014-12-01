@extends('default.main')
@section('content')
<div class="current-stage">
        Home /
</div>
<div class="data-container">
    <div class="body">
      @if(Session::has('message'))
        <div class="alert alert-success">
          [[Session::get('message')]]
          <a href="javascript:void(0)" class="pull-right alert-close tiny"><span class="glyphicon glyphicon-remove"></span></a>
        </div>
      @endif
      <div class="form-header">
        <button type="button" class="btn-green" data-toggle="modal" data-target="#myModal"> <span class="glyphicon glyphicon-plus"></span> New User</button>
        <span style="right: 50%;position: absolute;"><i class="fa fa-cog"></i> User Settings</span>
      </div>
      <div class="include-form">
    <div class="user-content">
        @foreach(array_chunk($users->all(), 6) as $user)
        <div class="row">
          @foreach($user as $each)
            <div class="col-md-2" style="padding-left: 10px !important;">
              <div class="user-data">
                <a href="#"  data-toggle="modal" data-status="[[$each->status]]" data-id="[[$each->user_id]]" class="each-user" data-target="#userData">
                  <img src="[[$each->imgUrl]]" width="150px" height="150px">
                  <p style="font-weight: bold;color: #5F9D35;padding: 2px 5px;">[[$each->name]]</p>
                </a>
              </div>
            </div>
          @endforeach
        </div>
        @endforeach
      </div>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           <div class="modal-dialog">
              <div class="modal-content model-data-content">
              <div class="modal-header app-header">
                  <button type="button" class="close close-file" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h5 class="modal-title"><h4>New User Information</h4></h5>
               </div>
                <div class="modal-body">
                  [[Form::open(array('url'=>'user/user'))]]
                  <div class="row app-row">
                <div class="col-md-5">
                  <label>Full Name</label>
                </div>
                <div class="col-md-7">
                  <input type="text" class="form-control fullname" name="fullname" placeholder="Fullname">
                </div>
              </div>

              <div class="row app-row">
                <div class="col-md-5">
                  <label>Username</label>
                </div>
                <div class="col-md-7">
                  <input type="text" class="form-control username" name="username" placeholder="Username">
                </div>
              </div>

              <div class="row app-row">
                <div class="col-md-5">
                  <label>Email</label>
                </div>
                <div class="col-md-7">
                  <input type="text" class="form-control email" name="email" placeholder="Email">
                </div>
              </div>
              <div class="row app-row">
                <div class="col-md-5">
                  <label>Password</label>
                </div>
                <div class="col-md-7">
                  <input type="password" class="form-control password" name="password" placeholder="Password">
                </div>
              </div>
              <div class="row app-row">
                <div class="col-md-5">
                  <label>Re-password</label>
                </div>
                <div class="col-md-7">
                  <input type="password" class="form-control repassword" name="repassword" placeholder="Repassword">
                </div>
              </div>
              <div class="row app-row">
                <div class="col-md-5">
                  <label>Phone</label>
                </div>
                <div class="col-md-7">
                  <input type="text" class="form-control phone" name="phone" placeholder="Phone">
                </div>
              </div>
              <div class="row app-row">
                <div class="col-md-5">
                  <label>Role</label>
                </div>
                <div class="col-md-7">
                  <select class="form-control roles chosen-select" name="roles">
                    <option disabled selected value="0">Choose roles</option>
                    @foreach($roles as $erole)
                    <option value="[[$erole->id]]">[[$erole->name]]</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-md-5"></div>
                <div class="col-md-7 error-msg"></div>
              </div>
              
                </div>
              <div class="modal-footer">
                <button type="button" class="btn-green" data-dismiss="modal">Close</button>
                <button type="submit" class="btn-green">Submit</button>
              </div>
              [[Form::close()]]
            </div>
          </div>
        </div>
        <div class="modal fade" id="userData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content modal-data-content">
              <div class="modal-header app-modal">
                  <button type="button" class="close close-file" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h5 class="modal-title"><h4>User Information</h4></h5>
              </div>
                <div class="modal-body">
               <div class="well">
                  <ul class="nav nav-tabs user-tabs">
                    <li class="active"><a href="#home" data-toggle="tab">Profile</a></li>
                    <li><a href="#profile" data-toggle="tab">Settings</a></li>
                  </ul>
                  <div id="myTabContent" class="tab-content">
                    <div class="tab-pane active in" id="home"class="home">
                      <form id="tab" style="margin-top:10px;">
                        <div class="row">
                          <div class="col-md-9">
                           <label>Username :</label>
                            <label class="update-username"></label>
                            <br>
                            <label>Email :</label>
                              <label class="update-email"></label>
                          </div>
                          <div class="col-md-3">
                            <div class="image-icon">
                            <img src="" class="img-circle user-image" style="width: 80px;height: 80px;">
                            </div>
                          </div>
                        </div>  
                        <div class="row">
                          <div class="col-md-9">
                            <label>Full Name</label>
                              <input type="text" class="form-control update-fullname" placeholder="Fullname">
                            </div>
                          <div class="col-md-3">
                            <label>Status</label>
                            <div class="status-holder"></div>
                          </div>
                        </div> 
                        <!-- <div class="row">
                          <div class="col-md-9">
                            <label>Phone No.</label>
                              <input type="text" class="form-control update-phone" placeholder="Phone No.">
                          </div>
                          <div class="col-md-3"></div>
                        </div><br>  --> 
                        <div class="row">
                      <div class="col-md-12">
                        <div class="uerror-msg" style="padding:3px;"></div>
                        <div class="success-msg" style="padding:3px;"></div>
                      </div>
                    </div>              
                          <div class="row">
                            <div class="col-md-9">
                              <button type="button" class="btn-green" data-dismiss="modal">Close</button>
                              <button type="button" class="btn-green btn-user-update-purple purple-update">Update</button>
                            </div>
                            <div class="col-md-3"></div>                    
                        </div>
                      </form>
                    </div>
                    <div class="tab-pane fade" id="profile">
                    <form id="tab2" style="margin-top:10px;">
                        <div class="row">
                          <div class="col-md-8 app-password-reset">
                            <label>New Password</label>
                            <input type="password" class="form-control reset-newpass" name="change_password" placeholder="New Password">
                            <label>Re-password</label>
                            <input type="password" class="form-control reset-repass" placeholder="Repassword"><br>
                            <span class="rerror-msg" style="color:#C82A0E;"></span>
                            <span class="success-msgs"style="color: #17963A;"></span>
                            <div style="margin-top: 10px;">
                                <button type="button" class="btn-green" data-dismiss="modal">Close</button>
                                <button type="button" class="btn-green btn-user-update-purple reset-user-password">Reset Password</button>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <label>Action</label><br>
                              <div class="action-holder"></div>
                          </div>  
                        </div>
                    </form>
                    </div>
                </div>      
              </div>    
            <input type="hidden" class="user-status">
            <input type="hidden" class="email-check">
            <input type="hidden" class="username-check">
            <input type="hidden" name="user_id" class="user-id">
            <input type="hidden" class="base-url" value="[[URL::to('/')]]">
               [[Form::close()]]
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>    
</div>
@stop
@section('script')
[[HTML::script('assets/js/user.js')]]
@stop