
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
@php
    $current_page = strtolower(Route::currentRouteName());



    $main_pages = ['dashboard','calendar'];
    $staff_management = ['staff-list','staff-profile','leave-requests'];

    $patient_pages = ['add_patient','patient_listing'];
  //  echo "<pre>"; print_r($patient_pages); echo "</pre>";
    $setup_pages = ['doctors','locations','rooms','doctor_service','clinical_detail','availablity',
    'booking_process','payments','products','import_customers'];

    $crm_configuration = ['drug_allergies','tooth_area','pre_medicals'];




//    $permissions_allowed = Auth::user()->permissions->pluck('id')->all();

 //echo "<pre>";print_r(Auth::user()->permissions);
;


@endphp

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

                    <li class="nav-item">
                        <a href="/dashboard" class="nav-link">
                            <i class="icon-home4"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>


                <li class="nav-item">
                    <a href="/profile" class="nav-link">
                        <i class="icon-user"></i>
                        <span>Profile</span>
                    </a>
                </li>



                    <li class="nav-item">
                        <a href="/calendar" class="nav-link">
                            <i class="icon-calendar52"></i>
                            <span>My Appointments</span>
                        </a>
                    </li>





                    <li class="nav-item">
                        <a href="/setup/availability" class="nav-link">
                            <i class="icon-person"></i>
                            <span>Availability Settings</span>
                        </a>
                    </li>


                <li class="nav-item">
                    <a href="/logout" class="nav-link">
                        <i class="icon-move-left"></i>
                        <span>Logout</span>
                    </a>
                </li>




            </ul>
        </div>
        <!-- /main navigation -->
        <div class="card d-none d-md-block" style="position: absolute; bottom:3%; ">
            <div class="form-control-datepicker border-0"></div>
        </div>

    </div>
    <!-- /sidebar content -->



</div>


{{--<aside id="left-sidebar-nav">
    <ul id="slide-out" class="side-nav fixed leftside-navigation" style="width:205px;">
        --}}{{--<li><h1 class="logo-wrapper"><a href="/dashboard" class="brand-logo darken-1"><img src="/public/images/logo.png" alt="idc logo"></a> <span class="logo-text">IDC Logo</span></h1></li>
--}}{{--


            @if(Auth::user()->role=='staff' || in_array(18,$permissions_allowed) )

                <li class="no-padding @if($current_page=="staff-dashboard") active @endif "><a href="/my-dashboard" class="waves-effect waves-cyan"><i class="material-icons rotate-90">arrow_drop_up</i>My Dashboard</a></li>
                <li class="no-padding @if($current_page=="staff-profile") active @endif "><a href="/my-profile/{!! Auth::user()->id !!}" class="waves-effect waves-cyan"><i class="material-icons rotate-90">arrow_drop_up</i>My Profile</a></li>
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="material-icons rotate-90">arrow_drop_up</i>My Documents</a>
                            <div class="collapsible-body @if(in_array($current_page,$setup_pages)) display_block @endif">
                              <ul>

                                  @if(isset($folders) && !is_null($folders))
                                      @foreach($folders as $f)
                                          <li><a href="/my-documents/{!! $f->slug !!}" >{!! $f->folder_name !!}</a> </li>
                                          @endforeach
                                      @endif
                                      <li><a href="#!" class="add-new-folder">Add New Folder</a> </li>
                              </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="material-icons rotate-90">arrow_drop_up</i>My Payments</a>
                            <div class="collapsible-body @if(in_array($current_page,$setup_pages)) display_block @endif">
                                <ul>
                                    <li><a href="/my-salaries/{!! Auth::user()->id !!}">My Salaries</a> </li>
                                    <li><a href="/my-commissions/{!! Auth::user()->id !!}">My Commissions</a> </li>
                                    <li><a href="/my-purchase/{!! Auth::user()->id !!}">My Purchase</a> </li>
                                    <li><a href="#!">My Bills</a> </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="no-padding"><a href="/my-leave/{!! Auth::user()->id !!}" class="waves-effect waves-cyan"><i class="material-icons rotate-90">arrow_drop_up</i>My Leave</a></li>
                <li class="no-padding"><a href="/my-activities/{!! Auth::user()->id !!}" class="waves-effect waves-cyan"><i class="material-icons rotate-90">arrow_drop_up</i>My Activities</a></li>
                <li class="no-padding"><a href="/my-logs" class="waves-effect waves-cyan"><i class="material-icons rotate-90">arrow_drop_up</i>My Logs</a></li>
                <li class="no-padding"><a href="/logout" class="waves-effect waves-cyan"><i class="material-icons rotate-90">arrow_drop_up</i>Logout</a></li>
            @endif
    </ul>

    <ul class="side-nav fixed leftside-navigation" style="width:205px; top:68%;"><li class="no-padding">

            <div class="row">
                <div class="col s12">
                    @if('calendar'==$current_page)
                    <div id="in_calendar_page"></div>
                        @else
                    <div id="datepicker_outside_calendar"></div>
                        @endif
                </div>
            </div>
        </li></ul>
    <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="material-icons red">list</i></a>
</aside>--}}

