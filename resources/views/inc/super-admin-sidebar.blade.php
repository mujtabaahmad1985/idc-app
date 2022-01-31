
<!-- Main sidebar -->
<div class="sidebar sidebar-light sidebar-main sidebar-fixed sidebar-expand-md">
    <!-- Sidebar mobile toggler -->
    <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-main-toggle">
            <i class="icon-arrow-left8"></i>
        </a>
        Navigation
        <a href="#" class="sidebar-mobile-expand">
            <i class="icon-screen-full"></i>
            <i class="icon-screen-normal"></i>
        </a>
    </div>
    <!-- /sidebar mobile toggler -->


    <!-- Sidebar content -->
    <div class="sidebar-content">


        <!-- User menu -->
        <div class="sidebar-user">
            <div class="card-body">
                <div class="media">
                    <div class="mr-3">
                        <a href="#"><img src="/images/female.png" width="38" height="38" class="rounded-circle" alt=""></a>
                    </div>

                    <div class="media-body">
                        <div class="media-title font-weight-semibold">{!! Auth::user() ->name !!}</div>
                        <div class="font-size-xs opacity-50">
                            <i class="icon-pin font-size-sm"></i> &nbsp;{!! ucwords(Auth::user() ->role) !!}
                        </div>
                    </div>
{{--
                    <div class="ml-3 align-self-center">
                        <a href="#" class="text-white"><i class="icon-cog3"></i></a>
                    </div>--}}
                </div>
            </div>
        </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="card card-sidebar-mobile">
            <ul class="nav nav-sidebar" data-nav-type="accordion">
                <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li>


                <li class="nav-item active">
                    <a href="/dashboard" class="nav-link">
                        <i class="icon-home4"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/hospitals" class="nav-link">
                        <i class="icon-user"></i>
                        <span>Hospitals</span>
                    </a>
                </li>



                    <li class="nav-item">
                        <a href="/hospital/summary/reports" class="nav-link">
                            <i class="icon-calendar52"></i>
                            <span>Report Summary</span>
                        </a>
                    </li>


                <li class="nav-item">
                    <a href="/hospital/income/summary/reports" class="nav-link">
                        <i class="icon-calendar52"></i>
                        <span>Income Summary</span>
                    </a>
                </li>

                {{--<li class="nav-item">
                    <a href="/admin/users" class="nav-link">
                        <i class="icon-calendar52"></i>
                        <span>User Management</span>
                    </a>
                </li>--}}





                <li class="nav-item">
                    <a href="/logout" class="nav-link">
                        <i class="icon-move-left"></i>
                        <span>Logout</span>
                    </a>
                </li>




            </ul>
        </div>



    </div>




</div>

