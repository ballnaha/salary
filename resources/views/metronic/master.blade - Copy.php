<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.7
Version: 4.7.1
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>QA CLAIM LETTER</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Prompt&amp;subset=latin-ext,thai" rel="stylesheet">
        <link href="{{url('metronic/assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('metronic/assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('metronic/assets/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('metronic/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="{{url('metronic/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{url('metronic/assets/global/css/components.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{url('metronic/assets/global/css/plugins.min.css')}}" rel="stylesheet" type="text/css" />

        <link href="{{ url('metronic/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet" type="text/css" />        
        
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="{{url('metronic/assets/layouts/layout/css/layout.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('metronic/assets/layouts/layout/css/themes/default.min.css')}}" rel="stylesheet" type="text/css" id="style_color" />
        <link href="{{url('metronic/assets/layouts/layout/css/custom.min.css')}}" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" href="{{ url('laddabtn/dist/ladda.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('datatables/media/css/jquery.dataTables.css')}}"/>
        <link rel="stylesheet" href="{{url('css/custom.css')}}">
        <link href="{{ url('metronic/assets/global/plugins/bootstrap-sweetalert/sweetalert.css')}}" rel="stylesheet" type="text/css">
        <!-- END THEME LAYOUT STYLES -->


        <link rel="shortcut icon" href="favicon.ico" />

        <style type="text/css">
          body , h1 , h2 , h3 , h4 , h5 ,h6 {
            font-family: 'Prompt',sans-serif;

          }
          
        </style>
      </head>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-sidebar-mobile-offcanvas page-content-white">
        <div class="page-wrapper">
            <!-- BEGIN HEADER -->
            @include('metronic/header')
            <!-- END HEADER -->
            <!-- BEGIN HEADER & CONTENT DIVIDER -->
            <div class="clearfix"> </div>
            <!-- END HEADER & CONTENT DIVIDER -->
            <!-- BEGIN CONTAINER -->
            <div class="page-container">
                <!-- BEGIN SIDEBAR -->
                <div class="page-sidebar-wrapper">
                    <!-- BEGIN SIDEBAR -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    @include('metronic/leftside')
                    <!-- END SIDEBAR -->
                </div>
                <!-- END SIDEBAR -->
                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
                        <!-- BEGIN PAGE BAR -->
                            @yield('content-breadcrumb')
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->

                            @yield('content-title')


                        <!-- END PAGE TITLE-->
                        <!-- END PAGE HEADER-->
                        <div class="page-content-body">

                            <div class="portlet light">
                                @yield('content-body')
                            </div>
                        </div>
                    </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->

            </div>
            <!-- END CONTAINER -->
            <!-- BEGIN FOOTER -->
            @include('metronic/footer')
            <!-- END FOOTER -->
        </div>

        <!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script>
<script src="../assets/global/plugins/ie8.fix.min.js"></script>
<![endif]-->
    
        <!-- BEGIN CORE PLUGINS -->
        
        <script src="{{ url('metronic/assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
        <script src="{{ url('metronic/assets/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
        <script src="{{ url('metronic/assets/global/plugins/js.cookie.min.js')}}" type="text/javascript"></script>
        <script src="{{ url('metronic/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
        <script src="{{ url('metronic/assets/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
        <script src="{{ url('metronic/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="{{ url('metronic/assets/global/scripts/app.min.js')}}" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <script src="{{ url('metronic/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script>
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="{{ url('metronic/assets/layouts/layout/scripts/layout.min.js')}}" type="text/javascript"></script>
        <script src="{{ url('metronic/assets/layouts/layout/scripts/demo.min.js')}}" type="text/javascript"></script>
        <script src="{{ url('metronic/assets/layouts/global/scripts/quick-sidebar.min.js')}}" type="text/javascript"></script>
        <script src="{{ url('metronic/assets/layouts/global/scripts/quick-nav.min.js')}}" type="text/javascript"></script>
        
        <script src="{{ url('laddabtn/dist/spin.js')}}"></script>
        <script src="{{ url('laddabtn/dist/ladda.min.js')}}"></script>

        <script type="text/javascript" src="{{url('datatables/media/js/jquery.dataTables.js')}}"></script>
        <script src="{{ url('metronic/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>           

        <script type="text/javascript" src="{{ url('metronic/assets/global/plugins/parsleyjs/dist/parsley.min.js')}}"></script>

        <script src="{{ url('metronic/assets/global/plugins/bootstrap-sweetalert/sweetalert.min.js')}}"></script>
        <script src="{{ url('metronic/assets/pages/scripts/ui-sweetalert.min.js')}}"></script>



        @yield('footer')
        <!-- END THEME LAYOUT SCRIPTS -->
        <script type="text/javascript">
        $(document).ready(function() {
        // $('form').parsley();
        $.listen('parsley:form:validated', function(e){
        if (e.validationResult) {
        /* Validation has passed, prevent double form submissions */
            $('input[type=submit]').val("Saving Please Wait . . . .");
            $('input[type=submit]').attr('disabled', 'disabled');

        }
        });


        });
        </script>      
    </body>

</html>
