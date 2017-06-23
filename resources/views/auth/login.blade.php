<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>SM | Kidney Foundation</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{ url('metronic/assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ url('metronic/assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ url('metronic/assets/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ url('metronic/assets/global/plugins/uniform/css/uniform.default.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ url('metronic/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="{{ url('metronic/assets/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ url('metronic/assets/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{ url('metronic/assets/global/css/components-md.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{ url('metronic/assets/global/css/plugins-md.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="{{ url('metronic/assets/pages/css/login-2.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <!-- <link rel="shortcut icon" href="{{url('images/prepress.ico')}}" /> -->

      </head>
    <!-- END HEAD -->
    <style type="text/css">
    .parsley-required{
      color: red;
      font-weight: 400;
      font-size: 13px;
      list-style: none;
    }
    </style>
    <body class=" login">
        <!-- BEGIN LOGO -->
        <div class="logo container">
                        
<div class="row">
    <div class="col-md-12">
        <div style="font-family:'Helvetica',sans-serif; color:#fff; font-weight: bolder; font-size: 30px;">KIDNEY FOUNDATION</div>    
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
                <div style="color:#fff; font-weight: bolder; font-size: 25px;font-family:'Helvetica',sans-serif;">
                    <i class="fa fa-money"></i>
                        SALARY MANAGEMENT
                </div>    
    </div>
</div>



        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
            <form class="login-form" role="form" method="POST" action="{{ url('/login') }}" data-parsley-validate id="myform">
                        {{ csrf_field() }}
                <h3 class="form-title">Login</h3>

                <!-- <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span>กรอก Username และ Password</span>
                </div> -->
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Username</label>
                    <input data-parsley-required-message="Please enter your username" required class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username" value="{{ old('username') }}" />

                    </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <input data-parsley-required-message="Please enter your password" required class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" />
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password','') }}</strong>
                                    </span>
                                @endif
                </div>
                <div class="form-actions">
                    <label class="rememberme check mt-checkbox mt-checkbox-outline">
                        <input type="checkbox" name="remember" value="1" />Remember <span></span></label>
                    <!-- <a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a> -->
                      <!-- <input type="submit" class="btn blue uppercase pull-right listen" id="btnlogin" name="login" value="Login"> -->
                      <button class="btn red uppercase pull-right listen" type="submit" name="button">Login</button>
                </div>

                <!--<div class="create-account">
                    <p>
                        <a href="javascript:;" id="register-btn" class="uppercase">Create an account</a>
                    </p>
                </div>-->
            </form>
            <!-- END LOGIN FORM -->
            <!-- BEGIN FORGOT PASSWORD FORM -->
            <form class="forget-form" action="" method="post">
                <h3 class="font-green">Forget Password ?</h3>
                <p> Enter your e-mail address below to reset your password. </p>
                <div class="form-group">
                    <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" /> </div>
                <div class="form-actions">
                    <button type="button" id="back-btn" class="btn btn-default">Back</button>
                    <button type="submit" class="btn btn-primary uppercase pull-right">Submit</button>
                </div>
            </form>
            <!-- END FORGOT PASSWORD FORM -->
            <!-- BEGIN REGISTER FORM -->

            <form class="register-form" role="form" method="POST" action="{{ url('/register') }}">
              {{ csrf_field() }}

              <h3 class="font-green" style="margin-bottom:20px;">Sign Up</h3>

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <input id="name" type="text" class="form-control placeholder-no-fix" name="name" placeholder="Fullname" value="{{ old('name') }}">

                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                </div>

                <input type="hidden" name="role" value="0" class="form-control">

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input id="email" type="email" class="form-control placeholder-no-fix" placeholder="Email" name="email" value="{{ old('email') }}">

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                </div>

                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                        <input id="name" type="text" class="form-control placeholder-no-fix" name="username" placeholder="Username" value="{{ old('username') }}">

                        @if ($errors->has('username'))
                            <span class="help-block">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                </div>



              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                      <input id="password" type="password" class="form-control placeholder-no-fix" placeholder="Password" name="password">

                      @if ($errors->has('password'))
                          <span class="help-block">
                              <strong>{{ $errors->first('password') }}</strong>
                          </span>
                      @endif
              </div>

              <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                      <input id="password-confirm" type="password" class="form-control placeholder-no-fix" placeholder="Confirm Password" name="password_confirmation">

                      @if ($errors->has('password_confirmation'))
                          <span class="help-block">
                              <strong>{{ $errors->first('password_confirmation') }}</strong>
                          </span>
                      @endif
              </div>

              <div class="form-actions">
                  <button type="button" id="register-back-btn" class="btn btn-default">Back</button>
                  <button type="submit" id="register-submit-btn" class="btn btn-primary uppercase pull-right">Submit</button>
              </div>
            </form>
            <!-- END REGISTER FORM -->

        </div>
        <div class="copyright"> © 2017 Copyright KIDNEY FOUNDATION</div>
        <div class="text-center" style="color:#fff;">Full Compatible with Chrome Browser</div>


        <!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script>
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="{{ url('metronic/assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
        <script src="{{ url('metronic/assets/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
        <script src="{{ url('metronic/assets/global/plugins/js.cookie.min.js')}}" type="text/javascript"></script>
        <script src="{{ url('metronic/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}" type="text/javascript"></script>
        <script src="{{ url('metronic/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
        <script src="{{ url('metronic/assets/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
        <script src="{{ url('metronic/assets/global/plugins/uniform/jquery.uniform.min.js')}}" type="text/javascript"></script>
        <script src="{{ url('metronic/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="{{ url('metronic/assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
        <script src="{{ url('metronic/assets/global/plugins/jquery-validation/js/additional-methods.min.js')}}" type="text/javascript"></script>
        <script src="{{ url('metronic/assets/global/plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="{{ url('metronic/assets/global/scripts/app.min.js')}}" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="{{ url('metronic/assets/pages/scripts/login.min.js')}}" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->

        <script type="text/javascript" src="{{ url('metronic/assets/global/plugins/parsleyjs/dist/parsley.min.js')}}"></script>
        <script type="text/javascript">
        $(document).ready(function() {
        $.listen('parsley:form:validated', function(e){
        if (e.validationResult) {
            $('button[type=submit]').html("<i class='fa fa-spinner fa-spin'></i> <span> Please wait...</span>");
            $('button[type=submit]').attr('disabled', 'disabled');
        }
        });

        });
        </script>

    </body>

</html>
