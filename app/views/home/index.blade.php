<!DOCTYPE html>
<html>
<head>
  <title>Welcome:: Webo ERP, Register, secure data ...</title>
    [[HTML::style('assets/css/bootstrap.min.css')]]
    [[HTML::style('assets/css/default.css')]]
    [[HTML::style('assets/css/chosen.css')]]
      [[HTML::style('assets/css/himanshu.css')]]
      [[HTML::style('assets/css/imageareaselect.css')]]
      [[HTML::style('assets/css/font-awesome.min.css')]]
      [[HTML::style('assets/css/datepicker.css')]]
      [[HTML::style('assets/css/test.css')]]
      <link href="[[URL::to('assets/images/favicon.ico')]]" rel="icon" type="image/x-icon" />
    <style type="text/css">
    .container{
    width: 80% !important;
    }
    </style>
 </head>
<body>
<div class="wrapper">
  <div class="row app-header nav navbar nav-collapse">
    <div class="container">
      <div class="row">
        <div class="col-md-2">

       <div class="logo-text">Webo</div>
        </div>
        <div class="col-md-6">
        </div>
        <div class="col-md-4 pull-right" style="text-align: right;">
          <a href="[[URL::to('login/auth')]]" class="login-link">Sign in</a>
        </div>
      </div>
    </div>
  </div>
  <div class="row row-fluid">
    @yield('content')
    @include('home.signup-section')
    @include('home.trial-add')
    @include('home.plan-section')
  </div>
</div>
@include('home.subscription-section')
@include('home.feature-section')
@include('home.index-footer')
[[HTML::script('assets/js/jquery.js')]]
[[HTML::script('assets/js/bootstrap.min.js')]]
[[HTML::script('assets/js/chosen.jquery.js')]]
[[HTML::script('assets/js/imagearea.jquery.js')]]
[[HTML::script('assets/js/bootstrap-datepicker.js')]]
[[HTML::script('assets/js/jquery.validator.min.js')]]
[[HTML::script('assets/js/custom.js')]]
[[HTML::script('assets/js/validator.js')]]
[[HTML::script('assets/js/product.js')]] 
[[HTML::script('assets/js/image-crop.js')]]
[[HTML::script('assets/js/google-chart-api.js')]]
[[HTML::script('assets/js/product-list.js')]]
[[HTMl::script('assets/js/update-product-list.js')]]
@yield('script')
</body>
</html>