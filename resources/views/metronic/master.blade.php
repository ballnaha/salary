<!DOCTYPE html>
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>NC Raw Material Workflow</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="https://fonts.googleapis.com/css?family=Prompt&amp;subset=latin-ext,thai,vietnamese" rel="stylesheet">
        <link href="{{url('metronic/assets/global/plugins/pace-1.0.2/themes/blue/pace-theme-minimal.css')}}" rel="stylesheet" />

        <link href="{{ url('metronic/assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ url('metronic/assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ url('metronic/assets/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ url('metronic/assets/global/plugins/uniform/css/uniform.default.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ url('metronic/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="{{ url('metronic/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <link href="{{ url('metronic/assets/global/plugins/icheck/skins/all.css')}}" rel="stylesheet" type="text/css" />
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="{{ url('metronic/assets/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ url('metronic/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ url('metronic/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- <link href="{{ url('metronic/assets/global/plugins/datatables/fixedColumns.bootstrap.css')}}" rel="stylesheet" type="text/css" /> -->
        <!-- END PAGE LEVEL PLUGINS -->
        <link href="{{ url('metronic/assets/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ url('metronic/assets/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />

        <link href="{{ url('metronic/assets/global/css/components.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
        <!--<link href="{{ url('metronic/assets/global/css/plugins-md.min.css')}}" rel="stylesheet" type="text/css" />-->
        <link href="{{ url('metronic/assets/global/css/plugins.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="{{ url('metronic/assets/layouts/layout/css/layout.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ url('metronic/assets/layouts/layout/css/themes/default.min.css')}}" rel="stylesheet" type="text/css" id="style_color" />
        <link href="{{ url('metronic/assets/layouts/layout/css/custom.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        {{-- <link href="{{ url('metronic/assets/global/plugins/sweetalert/dist/sweetalert.css')}}" rel="stylesheet" type="text/css"> --}}
        <link href="{{ url('metronic/assets/global/plugins/bootstrap-sweetalert/sweetalert.css')}}" rel="stylesheet" type="text/css">        
        <link rel="stylesheet" href="{{ url('css/custom.css') }}">
        <!-- <link href="{{ url('editable/css/bootstrap-editable.css')}}" rel="stylesheet"> -->
        
        <link href="{{ url('metronic/assets/global/plugins/bootstrap-toastr/toastr.min.css')}}" rel="stylesheet" type="text/css" />

        <link rel="shortcut icon" href="{{url('images/icon-nc-1.ico')}}" />

        <style type="text/css">
          body , h1 , h2 , h3 , h4 , h5 ,h6 {
            font-family: 'Prompt',sans-serif;

          }

#loading {width: 100%;height: 100%;top: 0px;left: 0px;position: fixed;display: none; z-index: 99; background:rgba(255,255,255,0.5);}

#loading-image {position: absolute;top: 40%;left: 45%;z-index: 100} 

.dataTables_scrollBody {
    min-height: 70vh;
}
.highcharts-credits {
    display: none !important;
}

        </style>
      </head>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white page-sidebar-closed">
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

<div id="loading">
<img id="loading-image" src="{{ url('images/spin.gif')}}" alt="Loading..." />
</div>
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
        <script src="{{ url('metronic/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}" type="text/javascript"></script>
        <script src="{{ url('metronic/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
        <script src="{{ url('metronic/assets/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
        <script src="{{ url('metronic/assets/global/plugins/uniform/jquery.uniform.min.js')}}" type="text/javascript"></script>
        <script src="{{ url('metronic/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <script type="text/javascript" src="{{url('metronic/assets/global/plugins/pace-1.0.2/pace.js')}}"></script>
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="{{ url('metronic/assets/global/scripts/datatable.js')}}" type="text/javascript"></script>
        <script src="{{ url('metronic/assets/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
        <script src="{{ url('metronic/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}" type="text/javascript"></script>
        <script src="{{ url('metronic/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
        <script src="{{ url('metronic/assets/pages/scripts/datepicker-locales.js')}}" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="{{ url('metronic/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <script src="{{ url('metronic/assets/global/plugins/icheck/icheck.min.js')}}" type="text/javascript"></script>
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="{{ url('metronic/assets/pages/scripts/components-bootstrap-switch.min.js')}}" type="text/javascript"></script>
        

        <script src="{{ url('metronic/assets/global/scripts/app.min.js')}}" type="text/javascript"></script>

        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- END THEME GLOBAL SCRIPTS -->
        
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- END PAGE LEVEL SCRIPTS -->
        <script src="{{ url('metronic/assets/global/plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
        <script src="{{ url('metronic/assets/pages/scripts/components-select2.min.js')}}" type="text/javascript"></script>
        
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <!-- momentjs -->
        <script src="{{ url('metronic/assets/pages/scripts/momentjs.js')}}" type="text/javascript"></script>
        <script src="{{ url('metronic/assets/pages/scripts/moment-weekday-calc.js')}}" type="text/javascript"></script>
        <!-- end momentjs -->
        <script src="{{ url('metronic/assets/pages/scripts/table-datatables-rowreorder.js')}}" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="{{ url('metronic/assets/layouts/layout/scripts/layout.min.js')}}" type="text/javascript"></script>
        <script src="{{ url('metronic/assets/layouts/layout/scripts/demo.min.js')}}" type="text/javascript"></script>
        <script src="{{ url('metronic/assets/layouts/global/scripts/quick-sidebar.min.js')}}" type="text/javascript"></script>
        <script src="{{ url('metronic/assets/layouts/global/scripts/quick-nav.min.js')}}" type="text/javascript"></script>

        <!-- END THEME LAYOUT SCRIPTS -->
        <!-- Sweet-Alert  -->
        {{-- <script src="{{ url('metronic/assets/global/plugins/sweetalert/dist/sweetalert.min.js')}}"></script>
        <script src="{{ url('metronic/assets/global/plugins/jquery.sweet-alert.init.js')}}"></script> --}}
        <script src="{{ url('metronic/assets/global/plugins/bootstrap-sweetalert/sweetalert.min.js')}}"></script>
        <script src="{{ url('metronic/assets/pages/scripts/ui-sweetalert.min.js')}}"></script>        
        <script src="{{ url('highchart/highcharts.js')}}"></script>
        <script src="{{ url('highchart/exporting.js')}}"></script>
        <script src="{{ url('highchart/drilldown.js')}}"></script>
        <script src="{{ url('highchart/highcharts-more.js')}}"></script>
        <script src="{{ url('highchart/solid-gauge.js')}}"></script>

        {{-- <script src="{{ url('editable/js/bootstrap-editable.js')}}"></script>
        <script src="{{ url('metronic/assets/global/plugins/bootstrap-toastr/toastr.min.js')}}" type="text/javascript"></script> --}}
        <script src="{{ url('metronic/assets/pages/scripts/ui-toastr.min.js')}}" type="text/javascript"></script>

        <script type="text/javascript" src="{{ url('metronic/assets/global/plugins/parsleyjs/dist/parsley.min.js')}}"></script>



        @yield('footer')
        <!-- END THEME LAYOUT SCRIPTS -->
        
        <script type="text/javascript">
        $(document).ready(function() {
            
        $.listen('parsley:form:validated', function(e){
        if (e.validationResult) {
            //$('input[type=submit]').val("Saving Please Wait . . . .");
            $('#loading').css('display', 'block'); 
            $('input[type=submit]').attr('disabled', 'disabled');

        }
        });

              
        $(".select2").select2({
            placeholder: "-- กรุณาเลือก --",
            allowClear: true ,
            containerCssClass: "select2font"
        });

        });

        $('.startDate').datepicker({
        todayBtn: "linked",
        language: "th",
        daysOfWeekDisabled: "0",
        autoclose: true,
        todayHighlight: true,
        clearBtn: true,
        /*datesDisabled: ['2016/12/29','2016/12/30','2016/12/31','2017/01/02','2017/01/27','2017/01/28','2017/04/12','2017/04/13','2017/04/14','2017/04/15','2017/05/01','2017/07/08','2017/09/12','2017/10/23','2017/12/05','2017/12/30'],*/
        });
        </script>   

        <script type = "text/javascript">
            $(document).ready(function () {
                var x_timer;
                $(".fullname").keyup(function (e) {
                    clearTimeout(x_timer);
                    var fullname = $(this).val();
                    x_timer = setTimeout(function () {
                        check_filedoc_ajax(fullname);
                    }, 1000);
                });

                function check_filedoc_ajax(fullname) {
                    $("#fullname-required").html('<img src="{{ url("images/spin.gif")}}" width="15"/>');
                    $.post('{{ url("refno-checker.php")}}', {
                        'fullname': fullname
                    }, function (data) {
                        $("#fullname-required").html(data);
                        
                    });
                }

            }); 
        </script>


    </body>

</html>
