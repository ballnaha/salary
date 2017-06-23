<div class="page-sidebar navbar-collapse collapse">
    <!-- BEGIN SIDEBAR MENU -->
    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-closed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
        <li class="sidebar-toggler-wrapper hide">
            <div class="sidebar-toggler">
                <span></span>
            </div>
        </li>
        <!-- END SIDEBAR TOGGLER BUTTON -->
        <!-- BEGIN OFFCANVAS SIDEBAR TOGGLER BUTTON -->
        <li class="sidebar-mobile-offcanvas-toggler">
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            <a href="#" class="responsive-toggler">
                <i class="icon-logout"></i>
            </a>
        </li>
        <!-- END OFFCANVAS SIDEBAR TOGGLER BUTTON -->
        <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
        <!--<li class="sidebar-search-wrapper">
             <form class="sidebar-search  " action="page_general_search_3.html" method="POST">
                <a href="javascript:;" class="remove">
                    <i class="icon-close"></i>
                </a>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <a href="javascript:;" class="btn submit">
                            <i class="icon-magnifier"></i>
                        </a>
                    </span>
                </div>
            </form> 
        </li>-->
        <li class="heading">
            <h3 class="uppercase">Home</h3>
        </li>
        <li class="nav-item
        {{ Request::is('dashboard') ? 'active open' : null }}
        ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-home"></i>
                <span class="title">Dashboard</span>
                <span class="arrow
         {{ Request::is('dashboard') ? 'open' : null }}       
                "></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item
         {{ Request::is('dashboard') ? 'active open' : null }}       
                ">
                    <a href="{{url('dashboard')}}" class="nav-link ">
                        <i class="icon-bar-chart"></i>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="heading">
            <h3 class="uppercase">Main</h3>
        </li>
        <li class="nav-item
        {{ Request::is('main/*') ? 'active open' : null }}
        ">
        
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-edit"></i>
                <span class="title">หัวข้อหลัก</span>
                <span class="selected"></span>
                <span class="arrow
                {{ Request::is('main/*') ? 'active open' : null }}
                "></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item
                {{ Request::is('main/pay') ? 'active open' : null }}
                {{ Request::is('main/pay/*') ? 'active open' : null }}
                ">
                    <a href="{{url('main/pay')}}" class="nav-link ">
                        <span class="title">ค่าตอบแทน</span>
                        <span class="selected"></span>
                    </a>
                </li>

            </ul>
        </li>  
        
              
@if(Auth::user()->username != 'guest')
        <li class="heading">
            <h3 class="uppercase">Settings</h3>
        </li>
        <li class="nav-item
       {{ Request::is('setting/*') ? 'active open' : null }} 
        ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-gear"></i>
                <span class="title">ตั้งค่า</span>
                <span class="selected"></span>
                <span class="arrow
        {{ Request::is('setting/*') ? 'open' : null }}         
                "></span>
            </a>
            <ul class="sub-menu">    
                <li class="nav-item
        {{ Request::is('setting/employee') ? 'active open' : null }}
        {{ Request::is('setting/employee/*') ? 'active open' : null }}       
                ">
                    <a href="{{url('setting/employee')}}" class="nav-link ">
                        <span class="title">เจ้าหน้าที่</span>
                        <span class="selected"></span>
                    </a>
                </li>          
                <li class="nav-item
        {{ Request::is('setting/user') ? 'active open' : null }}
        {{ Request::is('setting/user/*') ? 'active open' : null }}       
                ">
                    <a href="{{url('setting/user')}}" class="nav-link ">
                        <span class="title">ผู้ดูแลระบบ</span>
                        <span class="selected"></span>
                    </a>
                </li>


            </ul>
        </li>
@endif

    </ul>
    <!-- END SIDEBAR MENU -->
    <!-- END SIDEBAR MENU -->
</div>