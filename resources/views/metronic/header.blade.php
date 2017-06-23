<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="index.html">
                <img src="{{url('images/logo-text.png')}}" alt="logo" class="logo-default" /> 
            </a>
            <div class="menu-toggler sidebar-toggler">
                <span></span>
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                        <span></span>
                    </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                <!-- BEGIN USER LOGIN DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->

                <li class="dropdown dropdown-user user-menu">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="" data-close-others="true">
                        @if(Auth::user()->photo != '')
                            <img alt="" class="img-circle" src="{{url('images')}}/{{Auth::user()->photo}}" />
                        @else 
                            <img class="img-circle" src="{{url('images/logo-job.png')}}">
                        @endif    
                        <span class="username"> {{Auth::user()->name}} - {{Auth::user()->department_code}} </span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        {{-- <li>
                            <a href="{{url('/logout')}}">
                                <i class="icon-key"></i> Log Out </a>
                        </li> --}}
                        <!-- User image -->
                      <li class="user-header">
                      @if(Auth::user()->photo != '')
                        <img src="{{url('images')}}/{{Auth::user()->photo}}" class="img-circle" alt="User Image">
                      @else
                        <img class="img-circle" src="{{url('images/logo-job.png')}}">
                      @endif  
                        <p>
                          {{Auth::user()->name}} - {{Auth::user()->department_code}} <br>
                          <small>{{Auth::user()->role == 10?'Administrator':'User'}}</small>
                        </p>
                      </li>
                      <!-- Menu Body -->
                      {{-- <li class="user-body">
                        <div class="row">
                          <div class="col-xs-4 text-center">
                            <a href="#">Followers</a>
                          </div>
                          <div class="col-xs-4 text-center">
                            <a href="#">Sales</a>
                          </div>
                          <div class="col-xs-4 text-center">
                            <a href="#">Friends</a>
                          </div>
                        </div>
                        <!-- /.row -->
                      </li>  --}} 
                      <!-- Menu Footer-->
                      <li class="user-footer">
                        
                        <div class="text-right">
                          <a href="{{url('/logout')}}" class="btn btn-primary btn-flat">Log out</a>
                        </div>

                      </li>                                          
                    </ul>
                </li>


                <!-- END USER LOGIN DROPDOWN -->
                <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <!-- <li class="dropdown dropdown-quick-sidebar-toggler">
                    <a href="javascript:;" class="dropdown-toggle">
                        <i class="icon-logout"></i>
                    </a>
                </li> -->
                <!-- END QUICK SIDEBAR TOGGLER -->
            </ul>
        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->


