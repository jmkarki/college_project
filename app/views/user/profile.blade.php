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
      @if(Session::has('error'))
        <div class="alert alert-danger">
          [[Session::get('error')]]
          <a href="javascript:void(0)" class="pull-right alert-close tiny"><span class="glyphicon glyphicon-remove" style="color: #B52929 !important;"></span></a>
        </div>
        @endif
      <div class="form-header">        
        <span> User Profile</span>
      </div>
      <div class="include-form">
        <div class="well">
          <ul class="nav nav-tabs user-tabs">
            <li class="active"><a href="#home" data-toggle="tab">General</a></li>
            <li><a href="#profile" data-toggle="tab">Settings</a></li>
          </ul>
          <div id="myTabContent" class="tab-content">
            <div class="tab-pane active in" id="home"class="home">
              [[Form::open(['url'=>'user/profile','id'=> 'tab','class'=>'profile-update-form','style'=>'margin-top:10px;','enctype'=>'multipart/form-data'])]]
              <div class="row">
                <div class="col-md-7">
                  <div class="row profile-label">
                <div class="col-md-12">
                  <div class="uerror-msg" style="padding:3px;"></div>
                  <div class="success-msg" style="padding:3px;"></div>
                </div>
              </div>
                <div class="row profile-label">
                  <div class="col-md-12">
                   <label>Name :</label>
                    <input type="text" name="name" class="form-control profile-fullname" value="[[$user->name]]" placeholder="Fullname">
                    <br>
                    <label style="padding-top: 24px;">Username :</label>
                      <label class="update-email">[[$user->username]]</label>
                  </div>
                </div>  
                <div class="row profile-label">
                  <div class="col-md-12">
                    <label style="padding-top: 24px;">Email :</label>
                      <label class="update-email">[[$user->email]]</label>
                    </div>
                </div>           
            <div class="row profile-label">
              <div class="col-md-12">
                <label style="padding-top: 24px;">Role: </label>
                <label class="update-email">[[$roleName]]</label>
              </div>
            </div>
            <!-- <div class="row profile-label">
              <div class="col-md-12">
                <label style="padding-top: 24px;">Phone: </label>
                <input type="text" name="phone_no" class="form-control phone_num" value="[[$user->phone_no]]">
              </div>              
            </div>  -->                             
                  <div class="row profile-label" style="padding-top: 24px;">
                    <div class="col-md-12">
                      <button type="submit" id="profile-update"class="btn-green btn-user-update-purple purple-update"><span class="glyphicon glyphicon-ok"></span> Update</button>
                    </div>                    
                </div>
                </div>
                <div class="col-md-5">
                    <div class="row app-row">
              <div class="col-md-12">
                [[Form::label('uploadImage','Image')]]
                <input id="uploadImage" type="file" class="form-controls" accept="image/jpeg" name="uploadImage" onchange="readURL(this);" />
              </div>
              <div class="">
                <input type="hidden" id="x" name="x" value="0" />
                <input type="hidden" id="y" name="y" value="0" />
                <input type="hidden" id="w" name="w" value="0" />
                <input type="hidden" id="h" name="h" value="0" />
                <?php
                  $no_img = 2;
                  if($img == ''){
                    $no_img = 0;
                  }
                ?>
                <input id="no_img" type="hidden" name="no_img" value="[[$no_img]]" />
                <input id="chag_sort" type="hidden" name="chag_sort" />
                <input type="hidden" name="description" value="profile-imgage" />
              </div>
            </div>
            <div class="row app-row">
              <div class="col-md-12">
                <a id="imgcancel" href="javascript:void(0)" class="pull-right" style="display:none; font-size:10px;"><span class="glyphicon glyphicon-remove"></span></a>
                @if($img)
                  <a id="imgcancel-update" href="javascript:void(0)" class="pull-right" style="font-size: 10px;right: 20px;position: absolute;top: -15px;"><span class="glyphicon glyphicon-remove"></span></a>
                  <img id="showimg" style="width:100%;" src='[[$img]]'/>
                @endif
                <img id="uploadPreview" style="display:none;width:100%; max-height:60% !important;overflow:hidden !important;" src=''/>
              </div>
            </div>
                </div>
              </div>
              [[Form::close()]]
            </div>
            <div class="tab-pane fade" id="profile">
              [[Form::open(['url'=>'user/resetpassword','class'=>'profile-pass-reset-form','style'=>'margin-top:10px;'])]]
                <div class="row profile-label">
              <div class="col-md-12">
                <div class="uerror-msg" style="padding:3px; color:#BE1F1F;"></div>
              </div>
            </div>
                <div class="row">
                  <div class="col-md-7 app-password-reset">
                    <label>Old Password</label>
                    <input type="password" name="old_password" class="old-password form-control" placeholder="Current Password">
                    <label>New Password</label>
                    <input type="password" class="form-control new-password" name="password" placeholder="New Password">
                    <label>Re-password</label>
                    <input type="password" class="form-control confirm-new" name="confirm-new" placeholder="Confirm Password"><br>
                    <div style="margin-top: 10px;">                 
                        <button type="submit" class="btn-green btn-user-update-purple" id="reset-user-password"><span class="glyphicon glyphicon-ok"></span> Change Password</button>
                    </div>
                  </div>
                </div>
            [[Form::close()]]
            </div>
        </div>      
      </div>  

      </div>
    </div>
</div>
@stop
@section('script')
[[HTML::script('assets/js/user.js')]]
[[HTML::script('assets/js/crop.js')]]
<script type="text/javascript">
  $(document).ready(function(){
    var base = $('.base').val();
    $('#tab').on('click','#profile-update',function(){
      var name = $('.profile-fullname').val(),
        phone_num = $('.phone_num').val();
      if(name == ''){
        $('.uerror-msg').html('Fill Your Name.');
        $('.profile-fullname').focus();
        return false;
      }else if(phone_num == ''){
        $('.uerror-msg').html('Fill Your Phone No.');
        $('.phone_num').focus();
        return false;
      }
    });

    $('.profile-pass-reset-form').on('click','#reset-user-password',function(){
      var oldp = $('.old-password').val(),
        newp = $('.new-password').val(),
        cnewp = $('.confirm-new').val();         

        if(oldp == ''){
          $('.uerror-msg').html('Old Password Required.');
          $('.old-password').focus();
          return false;
        }else if(newp == ''){
          $('.uerror-msg').html('New Password Required.');
          $('.new-password').focus();
          return false;
        }else if(cnewp == ''){
          $('.uerror-msg').html('Confirm New Password.');
          $('.confirm-new').focus();
          return false;
        }else if(newp != cnewp){
          $('.uerror-msg').html('Password do not match.');
          $('.confirm-new').focus();
          return false;
        }else{
          return true;
        }
    });
  });
</script>
@stop