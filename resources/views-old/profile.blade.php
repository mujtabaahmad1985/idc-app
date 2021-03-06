@extends('layout.app')
@section('page-title') Profile @endsection
@section('css')
    {!! Html::style('public/material/js/plugins/dropify/css/dropify.min.css') !!}
    {!! Html::style('public/material/plugins/select2/css/select2.min.css') !!}
    {!! Html::style('public/css/croppie.css') !!}
@endsection

@section('content')

    <!-- Content area -->
    <div class="content">

        <!-- Inner container -->
        <div class="d-md-flex align-items-md-start">

            <!-- Left sidebar component -->
            <div class="sidebar sidebar-light bg-transparent sidebar-component sidebar-component-left wmin-300 border-0 shadow-0 sidebar-expand-md">

                <!-- Sidebar content -->
                <div class="sidebar-content">

                    <!-- Navigation -->
                    <div class="card">
                        <div class="card-body bg-indigo-400 text-center card-img-top" style="">
                            <div class="card-img-actions d-inline-block mb-3">
                                <img class="img-fluid rounded-circle" src="/images/avatar-placeholder.png" width="170" height="170" alt="">
                                <div class="card-img-actions-overlay rounded-circle">
                                    <a href="#" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round">
                                        <i class="icon-plus3"></i>
                                    </a>
                                    <a href="user_pages_profile.html" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round ml-2">
                                        <i class="icon-link"></i>
                                    </a>
                                </div>
                            </div>

                            <h6 class="font-weight-semibold mb-0">{!! Auth::user() ->name !!}</h6>
                            <span class="d-block opacity-75">{!! Auth::user() ->role !!}</span>

                            {{--<div class="list-icons list-icons-extended mt-3">
                                <a href="#" class="list-icons-item text-white" data-popup="tooltip" title="" data-container="body" data-original-title="Google Drive"><i class="icon-google-drive"></i></a>
                                <a href="#" class="list-icons-item text-white" data-popup="tooltip" title="" data-container="body" data-original-title="Twitter"><i class="icon-twitter"></i></a>
                                <a href="#" class="list-icons-item text-white" data-popup="tooltip" title="" data-container="body" data-original-title="Github"><i class="icon-github"></i></a>
                            </div>--}}
                        </div>

                        <div class="card-body p-0">
                            <ul class="nav nav-sidebar mb-2">
                                <li class="nav-item-header">Navigation</li>
                                <li class="nav-item">
                                    <a href="#profile" class="nav-link active" data-toggle="tab">
                                        <i class="icon-user"></i>
                                        My profile
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#inbox" class="nav-link" data-toggle="tab">
                                        <i class="icon-envelop2"></i>
                                        Inbox
                                        <span class="badge bg-danger badge-pill ml-auto">29</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#orders" class="nav-link" data-toggle="tab">
                                        <i class="icon-cart2"></i>
                                        Inventory Management
                                        <span class="badge bg-success badge-pill ml-auto">16</span>
                                    </a>
                                </li>
                                <li class="nav-item-divider"></li>
                                <li class="nav-item">
                                    <a href="/logout" class="nav-link" data-toggle="tab">
                                        <i class="icon-switch2"></i>
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /navigation -->


                    <!-- Online users -->
                    <div class="card">
                        <div class="card-header bg-transparent header-elements-inline">
                            <span class="card-title font-weight-semibold">Online staff members</span>
                            <div class="header-elements">
                                <span class="badge bg-success badge-pill">49</span>
                            </div>
                        </div>

                        <div class="card-body">
                            <ul class="media-list">
                                <li class="media">
                                    <a href="#" class="mr-3">
                                        <img src="../../../../global_assets/images/placeholders/placeholder.jpg" width="36" height="36" class="rounded-circle" alt="">
                                    </a>
                                    <div class="media-body">
                                        <a href="#" class="media-title font-weight-semibold">James Alexander</a>
                                        <div class="font-size-sm text-muted">Santa Ana, CA.</div>
                                    </div>
                                    <div class="ml-3 align-self-center">
                                        <span class="badge badge-mark border-success"></span>
                                    </div>
                                </li>

                                <li class="media">
                                    <a href="#" class="mr-3">
                                        <img src="../../../../global_assets/images/placeholders/placeholder.jpg" width="36" height="36" class="rounded-circle" alt="">
                                    </a>
                                    <div class="media-body">
                                        <a href="#" class="media-title font-weight-semibold">Jeremy Victorino</a>
                                        <div class="font-size-sm text-muted">Dowagiac, MI.</div>
                                    </div>
                                    <div class="ml-3 align-self-center">
                                        <span class="badge badge-mark border-danger"></span>
                                    </div>
                                </li>

                                <li class="media">
                                    <a href="#" class="mr-3">
                                        <img src="../../../../global_assets/images/placeholders/placeholder.jpg" width="36" height="36" class="rounded-circle" alt="">
                                    </a>
                                    <div class="media-body">
                                        <a href="#" class="media-title font-weight-semibold">Margo Baker</a>
                                        <div class="font-size-sm text-muted">Kasaan, AK.</div>
                                    </div>
                                    <div class="ml-3 align-self-center">
                                        <span class="badge badge-mark border-success"></span>
                                    </div>
                                </li>

                                <li class="media">
                                    <a href="#" class="mr-3">
                                        <img src="../../../../global_assets/images/placeholders/placeholder.jpg" width="36" height="36" class="rounded-circle" alt="">
                                    </a>
                                    <div class="media-body">
                                        <a href="#" class="media-title font-weight-semibold">Beatrix Diaz</a>
                                        <div class="font-size-sm text-muted">Neenah, WI.</div>
                                    </div>
                                    <div class="ml-3 align-self-center">
                                        <span class="badge badge-mark border-warning"></span>
                                    </div>
                                </li>

                                <li class="media">
                                    <a href="#" class="mr-3">
                                        <img src="../../../../global_assets/images/placeholders/placeholder.jpg" width="36" height="36" class="rounded-circle" alt="">
                                    </a>
                                    <div class="media-body">
                                        <a href="#" class="media-title font-weight-semibold">Richard Vango</a>
                                        <div class="font-size-sm text-muted">Grapevine, TX.</div>
                                    </div>
                                    <div class="ml-3 align-self-center">
                                        <span class="badge badge-mark border-grey-400"></span>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="card-footer d-flex justify-content-between align-items-center py-2">
                            <a href="#" class="text-grey">
                                All users
                            </a>

                            <div>
                                <a href="#" class="text-grey" data-popup="tooltip" title="Conference room"><i class="icon-comment"></i></a>
                                <a href="#" class="text-grey ml-2" data-popup="tooltip" title="Settings"><i class="icon-gear"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- /online users -->







                </div>
                <!-- /sidebar content -->

            </div>
            <!-- /left sidebar component -->


            <!-- Right content -->
            <div class="tab-content w-100 overflow-auto">
                <div class="tab-pane fade active show" id="profile">

                    <!-- Sales stats -->
                    <div class="card">
                        <div class="card-header header-elements-sm-inline">
                            <h6 class="card-title">Weekly statistics</h6>
                            <div class="header-elements">
                                <span><i class="icon-history mr-2 text-success"></i> Updated 3 hours ago</span>

                                <div class="list-icons ml-3">
                                    <a class="list-icons-item" data-action="reload"></a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="chart-container">
                                <div class="chart has-fixed-height" id="weekly_statistics"></div>
                            </div>
                        </div>
                    </div>
                    <!-- /sales stats -->

                    <div class="card">
                        <div class="card-header bg-transparent header-elements-inline">
                            <span class="card-title font-weight-semibold">Recent Invoices</span>
                            <div class="header-elements">
                                <span class="badge bg-success badge-pill">49</span>
                            </div>
                        </div>
                    </div>

                    <!-- Invoices -->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card border-left-3 border-left-danger rounded-left-0">
                                <div class="card-body">
                                    <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
                                        <div>
                                            <h6 class="font-weight-semibold">Leonardo Fellini</h6>
                                            <ul class="list list-unstyled mb-0">
                                                <li>Invoice #: &nbsp;0028</li>
                                                <li>Issued on: <span class="font-weight-semibold">2015/01/25</span></li>
                                            </ul>
                                        </div>

                                        <div class="text-sm-right mb-0 mt-3 mt-sm-0 ml-auto">
                                            <h6 class="font-weight-semibold">$8,750</h6>
                                            <ul class="list list-unstyled mb-0">
                                                <li>Method: <span class="font-weight-semibold">SWIFT</span></li>
                                                <li class="dropdown">
                                                    Status: &nbsp;
                                                    <a href="#" class="badge bg-danger-400 align-top dropdown-toggle" data-toggle="dropdown">Overdue</a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="#" class="dropdown-item active"><i class="icon-alert"></i> Overdue</a>
                                                        <a href="#" class="dropdown-item"><i class="icon-alarm"></i> Pending</a>
                                                        <a href="#" class="dropdown-item"><i class="icon-checkmark3"></i> Paid</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a href="#" class="dropdown-item"><i class="icon-spinner2 spinner"></i> On hold</a>
                                                        <a href="#" class="dropdown-item"><i class="icon-cross2"></i> Canceled</a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer d-sm-flex justify-content-sm-between align-items-sm-center">
											<span>
												<span class="badge badge-mark border-danger mr-2"></span>
												Due:
												<span class="font-weight-semibold">2015/02/25</span>
											</span>

                                    <ul class="list-inline list-inline-condensed mb-0 mt-2 mt-sm-0">
                                        <li class="list-inline-item">
                                            <a href="#" class="text-default"><i class="icon-eye8"></i></a>
                                        </li>
                                        <li class="list-inline-item dropdown">
                                            <a href="#" class="text-default dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>

                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item"><i class="icon-printer"></i> Print invoice</a>
                                                <a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download invoice</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item"><i class="icon-file-plus"></i> Edit invoice</a>
                                                <a href="#" class="dropdown-item"><i class="icon-cross2"></i> Remove invoice</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="card border-left-3 border-left-success rounded-left-0">
                                <div class="card-body">
                                    <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
                                        <div>
                                            <h6 class="font-weight-semibold">Rebecca Manes</h6>
                                            <ul class="list list-unstyled mb-0">
                                                <li>Invoice #: &nbsp;0027</li>
                                                <li>Issued on: <span class="font-weight-semibold">2015/02/24</span></li>
                                            </ul>
                                        </div>

                                        <div class="text-sm-right mb-0 mt-3 mt-sm-0 ml-auto">
                                            <h6 class="font-weight-semibold">$5,100</h6>
                                            <ul class="list list-unstyled mb-0">
                                                <li>Method: <span class="font-weight-semibold">Paypal</span></li>
                                                <li class="dropdown">
                                                    Status: &nbsp;
                                                    <a href="#" class="badge bg-success-400 align-top dropdown-toggle" data-toggle="dropdown">Paid</a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="#" class="dropdown-item"><i class="icon-alert"></i> Overdue</a>
                                                        <a href="#" class="dropdown-item"><i class="icon-alarm"></i> Pending</a>
                                                        <a href="#" class="dropdown-item active"><i class="icon-checkmark3"></i> Paid</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a href="#" class="dropdown-item"><i class="icon-spinner2 spinner"></i> On hold</a>
                                                        <a href="#" class="dropdown-item"><i class="icon-cross2"></i> Canceled</a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer d-sm-flex justify-content-sm-between align-items-sm-center">
											<span>
												<span class="badge badge-mark border-success mr-2"></span>
												Due:
												<span class="font-weight-semibold">2015/03/24</span>
											</span>

                                    <ul class="list-inline list-inline-condensed mb-0 mt-2 mt-sm-0">
                                        <li class="list-inline-item">
                                            <a href="#" class="text-default"><i class="icon-eye8"></i></a>
                                        </li>
                                        <li class="list-inline-item dropdown">
                                            <a href="#" class="text-default dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>

                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item"><i class="icon-printer"></i> Print invoice</a>
                                                <a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download invoice</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item"><i class="icon-file-plus"></i> Edit invoice</a>
                                                <a href="#" class="dropdown-item"><i class="icon-cross2"></i> Remove invoice</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /invoices -->








                    <div class="row">
                        <div class="col-sm-9">
                            <!-- Account settings -->
                            <div class="card">
                                <div class="card-header header-elements-inline">
                                    <h5 class="card-title">Account settings</h5>
                                    <div class="header-elements">
                                        <div class="list-icons">
                                            <a class="list-icons-item" data-action="collapse"></a>
                                            <a class="list-icons-item" data-action="reload"></a>
                                            <a class="list-icons-item" data-action="remove"></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <form action="/save/new/password" method="post" enctype="multipart/form-data" id="frm-change-password">
                                        {!! csrf_field() !!}
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Username</label>
                                                    <input type="text" style="text-transform: none" value="{!! Auth::user() ->name !!}" readonly class="form-control">
                                                </div>

                                                <div class="col-md-6">
                                                    <label>Current password</label>
                                                    <input type="password" placeholder="Enter current password" id="old_password" name="old_password" required  class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>New password</label>
                                                    <input type="password" placeholder="Enter new password" id="new_password" name="new_password" required class="form-control">
                                                </div>

                                                <div class="col-md-6">
                                                    <label>Repeat password</label>
                                                    <input type="password" placeholder="Repeat new password" id="confirm_password" name="confirm_password" required class="form-control">
                                                </div>
                                            </div>
                                        </div>



                                        <div class="text-right">
                                            <button type="submit" class="btn btn-primary btn-change-password">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /account settings -->
                        </div>
                        <div class="col-sm-3">
                            <!-- Latest updates -->
                            <div class="card">
                                <div class="card-header bg-transparent header-elements-inline">
                                    <span class="card-title font-weight-semibold">Latest Activities</span>
                                    <div class="header-elements">
                                        <div class="list-icons">
                                            <a class="list-icons-item" data-action="collapse"></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <ul class="media-list">
                                        <li class="media">
                                            <div class="mr-3">
                                                <a href="#" class="btn bg-transparent border-primary text-primary rounded-round border-2 btn-icon">
                                                    <i class="icon-git-pull-request"></i>
                                                </a>
                                            </div>

                                            <div class="media-body">
                                                Drop the IE <a href="#">specific hacks</a> for temporal inputs
                                                <div class="text-muted font-size-sm">4 minutes ago</div>
                                            </div>
                                        </li>

                                        <li class="media">
                                            <div class="mr-3">
                                                <a href="#" class="btn bg-transparent border-warning text-warning rounded-round border-2 btn-icon">
                                                    <i class="icon-git-commit"></i>
                                                </a>
                                            </div>

                                            <div class="media-body">
                                                Add full font overrides for popovers and tooltips
                                                <div class="text-muted font-size-sm">36 minutes ago</div>
                                            </div>
                                        </li>

                                        <li class="media">
                                            <div class="mr-3">
                                                <a href="#" class="btn bg-transparent border-info text-info rounded-round border-2 btn-icon">
                                                    <i class="icon-git-branch"></i>
                                                </a>
                                            </div>

                                            <div class="media-body">
                                                <a href="#">Chris Arney</a> created a new <span class="font-weight-semibold">Design</span> branch
                                                <div class="text-muted font-size-sm">2 hours ago</div>
                                            </div>
                                        </li>

                                        <li class="media">
                                            <div class="mr-3">
                                                <a href="#" class="btn bg-transparent border-success text-success rounded-round border-2 btn-icon">
                                                    <i class="icon-git-merge"></i>
                                                </a>
                                            </div>

                                            <div class="media-body">
                                                <a href="#">Eugene Kopyov</a> merged <span class="font-weight-semibold">Master</span> and <span class="font-weight-semibold">Dev</span> branches
                                                <div class="text-muted font-size-sm">Dec 18, 18:36</div>
                                            </div>
                                        </li>

                                        <li class="media">
                                            <div class="mr-3">
                                                <a href="#" class="btn bg-transparent border-primary text-primary rounded-round border-2 btn-icon">
                                                    <i class="icon-git-pull-request"></i>
                                                </a>
                                            </div>

                                            <div class="media-body">
                                                Have Carousel ignore keyboard events
                                                <div class="text-muted font-size-sm">Dec 12, 05:46</div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /latest updates -->
                        </div>
                    </div>


                </div>

                <div class="tab-pane fade" id="schedule">

                    <!-- Available hours -->
                    <div class="card">
                        <div class="card-header header-elements-inline">
                            <h6 class="card-title">Available hours</h6>
                            <div class="header-elements">
                                <div class="list-icons">
                                    <a class="list-icons-item" data-action="collapse"></a>
                                    <a class="list-icons-item" data-action="reload"></a>
                                    <a class="list-icons-item" data-action="remove"></a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="chart-container">
                                <div class="chart has-fixed-height" id="available_hours"></div>
                            </div>
                        </div>
                    </div>
                    <!-- /available hours -->


                    <!-- Schedule -->
                    <div class="card">
                        <div class="card-header header-elements-inline">
                            <h5 class="card-title">My schedule</h5>
                            <div class="header-elements">
                                <div class="list-icons">
                                    <a class="list-icons-item" data-action="collapse"></a>
                                    <a class="list-icons-item" data-action="reload"></a>
                                    <a class="list-icons-item" data-action="remove"></a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="my-schedule"></div>
                        </div>
                    </div>
                    <!-- /schedule -->

                </div>

                <div class="tab-pane fade" id="inbox">

                    <!-- My inbox -->
                    <div class="card">
                        <div class="card-header bg-transparent header-elements-inline">
                            <h6 class="card-title">My inbox</h6>

                            <div class="header-elements">
                                <span class="badge bg-blue">25 new today</span>
                            </div>
                        </div>

                        <!-- Action toolbar -->
                        <div class="bg-light">
                            <div class="navbar navbar-light bg-light navbar-expand-lg py-lg-2">
                                <div class="text-center d-lg-none w-100">
                                    <button type="button" class="navbar-toggler w-100" data-toggle="collapse" data-target="#inbox-toolbar-toggle-multiple">
                                        <i class="icon-circle-down2"></i>
                                    </button>
                                </div>

                                <div class="navbar-collapse text-center text-lg-left flex-wrap collapse" id="inbox-toolbar-toggle-multiple">
                                    <div class="mt-3 mt-lg-0">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-light btn-icon btn-checkbox-all">
                                                <input type="checkbox" class="form-input-styled" data-fouc>
                                            </button>

                                            <button type="button" class="btn btn-light btn-icon dropdown-toggle" data-toggle="dropdown"></button>
                                            <div class="dropdown-menu">
                                                <a href="#" class="dropdown-item">Select all</a>
                                                <a href="#" class="dropdown-item">Select read</a>
                                                <a href="#" class="dropdown-item">Select unread</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item">Clear selection</a>
                                            </div>
                                        </div>

                                        <div class="btn-group ml-3 mr-lg-3">
                                            <button type="button" class="btn btn-light"><i class="icon-pencil7"></i> <span class="d-none d-lg-inline-block ml-2">Compose</span></button>
                                            <button type="button" class="btn btn-light"><i class="icon-bin"></i> <span class="d-none d-lg-inline-block ml-2">Delete</span></button>
                                            <button type="button" class="btn btn-light"><i class="icon-spam"></i> <span class="d-none d-lg-inline-block ml-2">Spam</span></button>
                                        </div>
                                    </div>

                                    <div class="navbar-text ml-lg-auto"><span class="font-weight-semibold">1-50</span> of <span class="font-weight-semibold">528</span></div>

                                    <div class="ml-lg-3 mb-3 mb-lg-0">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-light btn-icon disabled"><i class="icon-arrow-left12"></i></button>
                                            <button type="button" class="btn btn-light btn-icon"><i class="icon-arrow-right13"></i></button>
                                        </div>

                                        <div class="btn-group ml-3">
                                            <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i></button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">Action</a>
                                                <a href="#" class="dropdown-item">Another action</a>
                                                <a href="#" class="dropdown-item">Something else here</a>
                                                <a href="#" class="dropdown-item">One more line</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /action toolbar -->


                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table table-inbox">
                                <tbody data-link="row" class="rowlink">
                                <tr class="unread">
                                    <td class="table-inbox-checkbox rowlink-skip">
                                        <input type="checkbox" class="form-input-styled" data-fouc>
                                    </td>
                                    <td class="table-inbox-star rowlink-skip">
                                        <a href="#">
                                            <i class="icon-star-empty3 text-muted"></i>
                                        </a>
                                    </td>
                                    <td class="table-inbox-image">
                                        <img src="../../../../global_assets/images/brands/spotify.png" class="rounded-circle" width="32" height="32" alt="">
                                    </td>
                                    <td class="table-inbox-name">
                                        <a href="mail_read.html">
                                            <div class="letter-icon-title text-default">Spotify</div>
                                        </a>
                                    </td>
                                    <td class="table-inbox-message">
                                        <div class="table-inbox-subject">On Tower-hill, as you go down &nbsp;-&nbsp;</div>
                                        <span class="text-muted font-weight-normal">To the London docks, you may have seen a crippled beggar (or KEDGER, as the sailors say) holding a painted board before him, representing the tragic scene in which he lost his leg</span>
                                    </td>
                                    <td class="table-inbox-attachment">
                                        <i class="icon-attachment text-muted"></i>
                                    </td>
                                    <td class="table-inbox-time">
                                        11:09 pm
                                    </td>
                                </tr>

                                <tr class="unread">
                                    <td class="table-inbox-checkbox rowlink-skip">
                                        <input type="checkbox" class="form-input-styled" data-fouc>
                                    </td>
                                    <td class="table-inbox-star rowlink-skip">
                                        <a href="#">
                                            <i class="icon-star-empty3 text-muted"></i>
                                        </a>
                                    </td>
                                    <td class="table-inbox-image">
													<span class="btn bg-warning-400 rounded-circle btn-icon btn-sm">
														<span class="letter-icon"></span>
													</span>
                                    </td>
                                    <td class="table-inbox-name">
                                        <a href="mail_read.html">
                                            <div class="letter-icon-title text-default">James Alexander</div>
                                        </a>
                                    </td>
                                    <td class="table-inbox-message">
                                        <div class="table-inbox-subject"><span class="badge bg-success mr-2">Promo</span> There are three whales and three boats &nbsp;-&nbsp;</div>
                                        <span class="text-muted font-weight-normal">And one of the boats (presumed to contain the missing leg in all its original integrity) is being crunched by the jaws of the foremost whale</span>
                                    </td>
                                    <td class="table-inbox-attachment">
                                        <i class="icon-attachment text-muted"></i>
                                    </td>
                                    <td class="table-inbox-time">
                                        10:21 pm
                                    </td>
                                </tr>

                                <tr class="unread">
                                    <td class="table-inbox-checkbox rowlink-skip">
                                        <input type="checkbox" class="form-input-styled" data-fouc>
                                    </td>
                                    <td class="table-inbox-star rowlink-skip">
                                        <a href="#">
                                            <i class="icon-star-full2 text-warning-300"></i>
                                        </a>
                                    </td>
                                    <td class="table-inbox-image">
                                        <img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="rounded-circle" width="32" height="32" alt="">
                                    </td>
                                    <td class="table-inbox-name">
                                        <a href="mail_read.html">
                                            <div class="letter-icon-title text-default">Nathan Jacobson</div>
                                        </a>
                                    </td>
                                    <td class="table-inbox-message">
                                        <div class="table-inbox-subject">Any time these ten years, they tell me, has that man held up &nbsp;-&nbsp;</div>
                                        <span class="text-muted font-weight-normal">That picture, and exhibited that stump to an incredulous world. But the time of his justification has now come. His three whales are as good whales as were ever published in Wapping, at any rate; and his stump</span>
                                    </td>
                                    <td class="table-inbox-attachment"></td>
                                    <td class="table-inbox-time">
                                        8:37 pm
                                    </td>
                                </tr>

                                <tr>
                                    <td class="table-inbox-checkbox rowlink-skip">
                                        <input type="checkbox" class="form-input-styled" data-fouc>
                                    </td>
                                    <td class="table-inbox-star rowlink-skip">
                                        <a href="#">
                                            <i class="icon-star-full2 text-warning-300"></i>
                                        </a>
                                    </td>
                                    <td class="table-inbox-image">
													<span class="btn bg-indigo-400 rounded-circle btn-icon btn-sm">
														<span class="letter-icon"></span>
													</span>
                                    </td>
                                    <td class="table-inbox-name">
                                        <a href="mail_read.html">
                                            <div class="letter-icon-title text-default">Margo Baker</div>
                                        </a>
                                    </td>
                                    <td class="table-inbox-message">
                                        <div class="table-inbox-subject">Throughout the Pacific, and also in Nantucket, and New Bedford &nbsp;-&nbsp;</div>
                                        <span class="text-muted font-weight-normal">and Sag Harbor, you will come across lively sketches of whales and whaling-scenes, graven by the fishermen themselves on Sperm Whale-teeth, or ladies' busks wrought out of the Right Whale-bone</span>
                                    </td>
                                    <td class="table-inbox-attachment"></td>
                                    <td class="table-inbox-time">
                                        4:28 am
                                    </td>
                                </tr>

                                <tr>
                                    <td class="table-inbox-checkbox rowlink-skip">
                                        <input type="checkbox" class="form-input-styled" data-fouc>
                                    </td>
                                    <td class="table-inbox-star rowlink-skip">
                                        <a href="#">
                                            <i class="icon-star-empty3 text-muted"></i>
                                        </a>
                                    </td>
                                    <td class="table-inbox-image">
                                        <img src="../../../../global_assets/images/brands/dribbble.png" class="rounded-circle" width="32" height="32" alt="">
                                    </td>
                                    <td class="table-inbox-name">
                                        <a href="mail_read.html">
                                            <div class="letter-icon-title text-default">Dribbble</div>
                                        </a>
                                    </td>
                                    <td class="table-inbox-message">
                                        <div class="table-inbox-subject">The whalemen call the numerous little ingenious contrivances &nbsp;-&nbsp;</div>
                                        <span class="text-muted font-weight-normal">They elaborately carve out of the rough material, in their hours of ocean leisure. Some of them have little boxes of dentistical-looking implements</span>
                                    </td>
                                    <td class="table-inbox-attachment"></td>
                                    <td class="table-inbox-time">
                                        Dec 5
                                    </td>
                                </tr>

                                <tr>
                                    <td class="table-inbox-checkbox rowlink-skip">
                                        <input type="checkbox" class="form-input-styled" data-fouc>
                                    </td>
                                    <td class="table-inbox-star rowlink-skip">
                                        <a href="#">
                                            <i class="icon-star-empty3 text-muted"></i>
                                        </a>
                                    </td>
                                    <td class="table-inbox-image">
													<span class="btn bg-brown-400 rounded-circle btn-icon btn-sm">
														<span class="letter-icon"></span>
													</span>
                                    </td>
                                    <td class="table-inbox-name">
                                        <a href="mail_read.html">
                                            <div class="letter-icon-title text-default">Hanna Dorman</div>
                                        </a>
                                    </td>
                                    <td class="table-inbox-message">
                                        <div class="table-inbox-subject">Some of them have little boxes of dentistical-looking implements &nbsp;-&nbsp;</div>
                                        <span class="text-muted font-weight-normal">Specially intended for the skrimshandering business. But, in general, they toil with their jack-knives alone; and, with that almost omnipotent tool of the sailor</span>
                                    </td>
                                    <td class="table-inbox-attachment">
                                        <i class="icon-attachment text-muted"></i>
                                    </td>
                                    <td class="table-inbox-time">
                                        Dec 5
                                    </td>
                                </tr>

                                <tr>
                                    <td class="table-inbox-checkbox rowlink-skip">
                                        <input type="checkbox" class="form-input-styled" data-fouc>
                                    </td>
                                    <td class="table-inbox-star rowlink-skip">
                                        <a href="#">
                                            <i class="icon-star-empty3 text-muted"></i>
                                        </a>
                                    </td>
                                    <td class="table-inbox-image">
                                        <img src="../../../../global_assets/images/brands/twitter.png" class="rounded-circle" width="32" height="32" alt="">
                                    </td>
                                    <td class="table-inbox-name">
                                        <a href="mail_read.html">
                                            <div class="letter-icon-title text-default">Twitter</div>
                                        </a>
                                    </td>
                                    <td class="table-inbox-message">
                                        <div class="table-inbox-subject"><span class="badge bg-indigo-400 mr-2">Order</span> Long exile from Christendom &nbsp;-&nbsp;</div>
                                        <span class="text-muted font-weight-normal">And civilization inevitably restores a man to that condition in which God placed him, i.e. what is called savagery</span>
                                    </td>
                                    <td class="table-inbox-attachment"></td>
                                    <td class="table-inbox-time">
                                        Dec 4
                                    </td>
                                </tr>

                                <tr>
                                    <td class="table-inbox-checkbox rowlink-skip">
                                        <input type="checkbox" class="form-input-styled" data-fouc>
                                    </td>
                                    <td class="table-inbox-star rowlink-skip">
                                        <a href="#">
                                            <i class="icon-star-full2 text-warning-300"></i>
                                        </a>
                                    </td>
                                    <td class="table-inbox-image">
													<span class="btn bg-pink-400 rounded-circle btn-icon btn-sm">
														<span class="letter-icon"></span>
													</span>
                                    </td>
                                    <td class="table-inbox-name">
                                        <a href="mail_read.html">
                                            <div class="letter-icon-title text-default">Vanessa Aurelius</div>
                                        </a>
                                    </td>
                                    <td class="table-inbox-message">
                                        <div class="table-inbox-subject">Your true whale-hunter is as much a savage as an Iroquois &nbsp;-&nbsp;</div>
                                        <span class="text-muted font-weight-normal">I myself am a savage, owning no allegiance but to the King of the Cannibals; and ready at any moment to rebel against him. Now, one of the peculiar characteristics of the savage in his domestic hours</span>
                                    </td>
                                    <td class="table-inbox-attachment">
                                        <i class="icon-attachment text-muted"></i>
                                    </td>
                                    <td class="table-inbox-time">
                                        Dec 4
                                    </td>
                                </tr>

                                <tr>
                                    <td class="table-inbox-checkbox rowlink-skip">
                                        <input type="checkbox" class="form-input-styled" data-fouc>
                                    </td>
                                    <td class="table-inbox-star rowlink-skip">
                                        <a href="#">
                                            <i class="icon-star-empty3 text-muted"></i>
                                        </a>
                                    </td>
                                    <td class="table-inbox-image">
                                        <img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="rounded-circle" width="32" height="32" alt="">
                                    </td>
                                    <td class="table-inbox-name">
                                        <a href="mail_read.html">
                                            <div class="letter-icon-title text-default">William Brenson</div>
                                        </a>
                                    </td>
                                    <td class="table-inbox-message">
                                        <div class="table-inbox-subject">An ancient Hawaiian war-club or spear-paddle &nbsp;-&nbsp;</div>
                                        <span class="text-muted font-weight-normal">In its full multiplicity and elaboration of carving, is as great a trophy of human perseverance as a Latin lexicon. For, with but a bit of broken sea-shell or a shark's tooth</span>
                                    </td>
                                    <td class="table-inbox-attachment">
                                        <i class="icon-attachment text-muted"></i>
                                    </td>
                                    <td class="table-inbox-time">
                                        Dec 4
                                    </td>
                                </tr>

                                <tr>
                                    <td class="table-inbox-checkbox rowlink-skip">
                                        <input type="checkbox" class="form-input-styled" data-fouc>
                                    </td>
                                    <td class="table-inbox-star rowlink-skip">
                                        <a href="#">
                                            <i class="icon-star-empty3 text-muted"></i>
                                        </a>
                                    </td>
                                    <td class="table-inbox-image">
                                        <img src="../../../../global_assets/images/brands/facebook.png" class="rounded-circle" width="32" height="32" alt="">
                                    </td>
                                    <td class="table-inbox-name">
                                        <a href="mail_read.html">
                                            <div class="letter-icon-title text-default">Facebook</div>
                                        </a>
                                    </td>
                                    <td class="table-inbox-message">
                                        <div class="table-inbox-subject">As with the Hawaiian savage, so with the white sailor-savage &nbsp;-&nbsp;</div>
                                        <span class="text-muted font-weight-normal">With the same marvellous patience, and with the same single shark's tooth, of his one poor jack-knife, he will carve you a bit of bone sculpture, not quite as workmanlike</span>
                                    </td>
                                    <td class="table-inbox-attachment"></td>
                                    <td class="table-inbox-time">
                                        Dec 3
                                    </td>
                                </tr>

                                <tr>
                                    <td class="table-inbox-checkbox rowlink-skip">
                                        <input type="checkbox" class="form-input-styled" data-fouc>
                                    </td>
                                    <td class="table-inbox-star rowlink-skip">
                                        <a href="#">
                                            <i class="icon-star-full2 text-warning-300"></i>
                                        </a>
                                    </td>
                                    <td class="table-inbox-image">
                                        <img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="rounded-circle" width="32" height="32" alt="">
                                    </td>
                                    <td class="table-inbox-name">
                                        <a href="mail_read.html">
                                            <div class="letter-icon-title text-default">Vicky Barna</div>
                                        </a>
                                    </td>
                                    <td class="table-inbox-message">
                                        <div class="table-inbox-subject"><span class="badge bg-pink-400 mr-2">Track</span> Achilles's shield &nbsp;-&nbsp;</div>
                                        <span class="text-muted font-weight-normal">Wooden whales, or whales cut in profile out of the small dark slabs of the noble South Sea war-wood, are frequently met with in the forecastles of American whalers. Some of them are done with much accuracy</span>
                                    </td>
                                    <td class="table-inbox-attachment"></td>
                                    <td class="table-inbox-time">
                                        Dec 2
                                    </td>
                                </tr>

                                <tr>
                                    <td class="table-inbox-checkbox rowlink-skip">
                                        <input type="checkbox" class="form-input-styled" data-fouc>
                                    </td>
                                    <td class="table-inbox-star rowlink-skip">
                                        <a href="#">
                                            <i class="icon-star-empty3 text-muted"></i>
                                        </a>
                                    </td>
                                    <td class="table-inbox-image">
                                        <img src="../../../../global_assets/images/brands/youtube.png" class="rounded-circle" width="32" height="32" alt="">
                                    </td>
                                    <td class="table-inbox-name">
                                        <a href="mail_read.html">
                                            <div class="letter-icon-title text-default">Youtube</div>
                                        </a>
                                    </td>
                                    <td class="table-inbox-message">
                                        <div class="table-inbox-subject">At some old gable-roofed country houses &nbsp;-&nbsp;</div>
                                        <span class="text-muted font-weight-normal">You will see brass whales hung by the tail for knockers to the road-side door. When the porter is sleepy, the anvil-headed whale would be best. But these knocking whales are seldom remarkable as faithful essays</span>
                                    </td>
                                    <td class="table-inbox-attachment">
                                        <i class="icon-attachment text-muted"></i>
                                    </td>
                                    <td class="table-inbox-time">
                                        Nov 30
                                    </td>
                                </tr>

                                <tr>
                                    <td class="table-inbox-checkbox rowlink-skip">
                                        <input type="checkbox" class="form-input-styled" data-fouc>
                                    </td>
                                    <td class="table-inbox-star rowlink-skip">
                                        <a href="#">
                                            <i class="icon-star-empty3 text-muted"></i>
                                        </a>
                                    </td>
                                    <td class="table-inbox-image">
                                        <img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="rounded-circle" width="32" height="32" alt="">
                                    </td>
                                    <td class="table-inbox-name">
                                        <a href="mail_read.html">
                                            <div class="letter-icon-title text-default">Tony Gurrano</div>
                                        </a>
                                    </td>
                                    <td class="table-inbox-message">
                                        <div class="table-inbox-subject">On the spires of some old-fashioned churches &nbsp;-&nbsp;</div>
                                        <span class="text-muted font-weight-normal">You will see sheet-iron whales placed there for weather-cocks; but they are so elevated, and besides that are to all intents and purposes so labelled with "HANDS OFF!" you cannot examine them</span>
                                    </td>
                                    <td class="table-inbox-attachment"></td>
                                    <td class="table-inbox-time">
                                        Nov 28
                                    </td>
                                </tr>

                                <tr>
                                    <td class="table-inbox-checkbox rowlink-skip">
                                        <input type="checkbox" class="form-input-styled" data-fouc>
                                    </td>
                                    <td class="table-inbox-star rowlink-skip">
                                        <a href="#">
                                            <i class="icon-star-empty3 text-muted"></i>
                                        </a>
                                    </td>
                                    <td class="table-inbox-image">
													<span class="btn bg-danger-400 rounded-circle btn-icon btn-sm">
														<span class="letter-icon"></span>
													</span>
                                    </td>
                                    <td class="table-inbox-name">
                                        <a href="mail_read.html">
                                            <div class="letter-icon-title text-default">Barbara Walden</div>
                                        </a>
                                    </td>
                                    <td class="table-inbox-message">
                                        <div class="table-inbox-subject">In bony, ribby regions of the earth &nbsp;-&nbsp;</div>
                                        <span class="text-muted font-weight-normal">Where at the base of high broken cliffs masses of rock lie strewn in fantastic groupings upon the plain, you will often discover images as of the petrified forms</span>
                                    </td>
                                    <td class="table-inbox-attachment"></td>
                                    <td class="table-inbox-time">
                                        Nov 28
                                    </td>
                                </tr>

                                <tr>
                                    <td class="table-inbox-checkbox rowlink-skip">
                                        <input type="checkbox" class="form-input-styled" data-fouc>
                                    </td>
                                    <td class="table-inbox-star rowlink-skip">
                                        <a href="#">
                                            <i class="icon-star-full2 text-warning-300"></i>
                                        </a>
                                    </td>
                                    <td class="table-inbox-image">
                                        <img src="../../../../global_assets/images/brands/amazon.png" class="rounded-circle" width="32" height="32" alt="">
                                    </td>
                                    <td class="table-inbox-name">
                                        <a href="mail_read.html">
                                            <div class="letter-icon-title text-default">Amazon</div>
                                        </a>
                                    </td>
                                    <td class="table-inbox-message">
                                        <div class="table-inbox-subject">Here and there from some lucky point of view &nbsp;-&nbsp;</div>
                                        <span class="text-muted font-weight-normal">You will catch passing glimpses of the profiles of whales defined along the undulating ridges. But you must be a thorough whaleman, to see these sights; and not only that, but if you wish to return to such a sight again</span>
                                    </td>
                                    <td class="table-inbox-attachment">
                                        <i class="icon-attachment text-muted"></i>
                                    </td>
                                    <td class="table-inbox-time">
                                        Nov 27
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /table -->

                    </div>
                    <!-- /my inbox -->

                </div>

                <div class="tab-pane fade" id="orders">

                    <!-- Orders history -->
                    <div class="card">
                        <div class="card-header header-elements-inline">
                            <h6 class="card-title">Orders history</h6>
                            <div class="header-elements">
                                <span><i class="icon-arrow-down22 text-danger"></i> <span class="font-weight-semibold">- 29.4%</span></span>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="chart-container">
                                <div class="chart has-fixed-height" id="balance_statistics"></div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table text-nowrap">
                                <thead>
                                <tr>
                                    <th colspan="2">Product name</th>
                                    <th>Size</th>
                                    <th>Colour</th>
                                    <th>Article number</th>
                                    <th>Units</th>
                                    <th>Price</th>
                                    <th class="text-center" style="width: 20px;"><i class="icon-arrow-down12"></i></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="table-active">
                                    <td colspan="7" class="font-weight-semibold">New orders</td>
                                    <td class="text-right">
                                        <span class="badge bg-secondary badge-pill">24</span>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="pr-0" style="width: 45px;">
                                        <a href="#">
                                            <img src="../../../../global_assets/images/placeholders/placeholder.jpg" height="60" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#" class="font-weight-semibold">Fathom Backpack</a>
                                        <div class="text-muted font-size-sm">
                                            <span class="badge badge-mark bg-grey border-grey mr-1"></span>
                                            Processing
                                        </div>
                                    </td>
                                    <td>34cm x 29cm</td>
                                    <td>Orange</td>
                                    <td>
                                        <a href="#">1237749</a>
                                    </td>
                                    <td>1</td>
                                    <td>
                                        <h6 class="mb-0 font-weight-semibold">&euro; 79.00</h6>
                                    </td>
                                    <td class="text-center">
                                        <div class="list-icons">
                                            <div class="list-icons-item dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="#" class="dropdown-item"><i class="icon-truck"></i> Track parcel</a>
                                                    <a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download invoice</a>
                                                    <a href="#" class="dropdown-item"><i class="icon-wallet"></i> Payment details</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="#" class="dropdown-item"><i class="icon-warning2"></i> Report problem</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="pr-0">
                                        <a href="#">
                                            <img src="../../../../global_assets/images/placeholders/placeholder.jpg" height="60" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#" class="font-weight-semibold">Mystery Air Long Sleeve T Shirt</a>
                                        <div class="text-muted font-size-sm">
                                            <span class="badge badge-mark bg-grey border-grey mr-1"></span>
                                            Processing
                                        </div>
                                    </td>
                                    <td>L</td>
                                    <td>Process Red</td>
                                    <td>
                                        <a href="#">345634</a>
                                    </td>
                                    <td>1</td>
                                    <td>
                                        <h6 class="mb-0 font-weight-semibold">&euro; 38.00</h6>
                                    </td>
                                    <td class="text-center">
                                        <div class="list-icons">
                                            <div class="list-icons-item dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="#" class="dropdown-item"><i class="icon-truck"></i> Track parcel</a>
                                                    <a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download invoice</a>
                                                    <a href="#" class="dropdown-item"><i class="icon-wallet"></i> Payment details</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="#" class="dropdown-item"><i class="icon-warning2"></i> Report problem</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="pr-0">
                                        <a href="#">
                                            <img src="../../../../global_assets/images/placeholders/placeholder.jpg" height="60" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#" class="font-weight-semibold">Women???s Prospect Backpack</a>
                                        <div class="text-muted font-size-sm">
                                            <span class="badge badge-mark bg-grey border-grey mr-1"></span>
                                            Processing
                                        </div>
                                    </td>
                                    <td>46cm x 28cm</td>
                                    <td>Neu Nordic Print</td>
                                    <td>
                                        <a href="#">5739584</a>
                                    </td>
                                    <td>1</td>
                                    <td>
                                        <h6 class="mb-0 font-weight-semibold">&euro; 60.00</h6>
                                    </td>
                                    <td class="text-center">
                                        <div class="list-icons">
                                            <div class="list-icons-item dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="#" class="dropdown-item"><i class="icon-truck"></i> Track parcel</a>
                                                    <a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download invoice</a>
                                                    <a href="#" class="dropdown-item"><i class="icon-wallet"></i> Payment details</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="#" class="dropdown-item"><i class="icon-warning2"></i> Report problem</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="pr-0">
                                        <a href="#">
                                            <img src="../../../../global_assets/images/placeholders/placeholder.jpg" height="60" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#" class="font-weight-semibold">Overlook Short Sleeve T Shirt</a>
                                        <div class="text-muted font-size-sm">
                                            <span class="badge badge-mark bg-grey border-grey mr-1"></span>
                                            Processing
                                        </div>
                                    </td>
                                    <td>M</td>
                                    <td>Gray Heather</td>
                                    <td>
                                        <a href="#">434450</a>
                                    </td>
                                    <td>1</td>
                                    <td>
                                        <h6 class="mb-0 font-weight-semibold">&euro; 35.00</h6>
                                    </td>
                                    <td class="text-center">
                                        <div class="list-icons">
                                            <div class="list-icons-item dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="#" class="dropdown-item"><i class="icon-truck"></i> Track parcel</a>
                                                    <a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download invoice</a>
                                                    <a href="#" class="dropdown-item"><i class="icon-wallet"></i> Payment details</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="#" class="dropdown-item"><i class="icon-warning2"></i> Report problem</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <tr class="table-active">
                                    <td colspan="7" class="font-weight-semibold">Shipped orders</td>
                                    <td class="text-right">
                                        <span class="badge bg-success badge-pill">42</span>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="pr-0">
                                        <a href="#">
                                            <img src="../../../../global_assets/images/placeholders/placeholder.jpg" height="60" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#" class="font-weight-semibold">Infinite Ride Liner</a>
                                        <div class="text-muted font-size-sm">
                                            <span class="badge badge-mark bg-success border-success mr-1"></span>
                                            Shipped
                                        </div>
                                    </td>
                                    <td>43</td>
                                    <td>Black</td>
                                    <td>
                                        <a href="#">34739</a>
                                    </td>
                                    <td>1</td>
                                    <td>
                                        <h6 class="mb-0 font-weight-semibold">&euro; 210.00</h6>
                                    </td>
                                    <td class="text-center">
                                        <div class="list-icons">
                                            <div class="list-icons-item dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="#" class="dropdown-item"><i class="icon-truck"></i> Track parcel</a>
                                                    <a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download invoice</a>
                                                    <a href="#" class="dropdown-item"><i class="icon-wallet"></i> Payment details</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="#" class="dropdown-item"><i class="icon-warning2"></i> Report problem</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="pr-0">
                                        <a href="#">
                                            <img src="../../../../global_assets/images/placeholders/placeholder.jpg" height="60" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#" class="font-weight-semibold">Custom Snowboard</a>
                                        <div class="text-muted font-size-sm">
                                            <span class="badge badge-mark bg-success border-success mr-1"></span>
                                            Shipped
                                        </div>
                                    </td>
                                    <td>151</td>
                                    <td>Black/Blue</td>
                                    <td>
                                        <a href="#">5574832</a>
                                    </td>
                                    <td>1</td>
                                    <td>
                                        <h6 class="mb-0 font-weight-semibold">&euro; 600.00</h6>
                                    </td>
                                    <td class="text-center">
                                        <div class="list-icons">
                                            <div class="list-icons-item dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="#" class="dropdown-item"><i class="icon-truck"></i> Track parcel</a>
                                                    <a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download invoice</a>
                                                    <a href="#" class="dropdown-item"><i class="icon-wallet"></i> Payment details</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="#" class="dropdown-item"><i class="icon-warning2"></i> Report problem</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="pr-0">
                                        <a href="#">
                                            <img src="../../../../global_assets/images/placeholders/placeholder.jpg" height="60" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#" class="font-weight-semibold">Kids' Day Hiker 20L Backpack</a>
                                        <div class="text-muted font-size-sm">
                                            <span class="badge badge-mark bg-success border-success mr-1"></span>
                                            Shipped
                                        </div>
                                    </td>
                                    <td>24cm x 29cm</td>
                                    <td>Figaro Stripe</td>
                                    <td>
                                        <a href="#">6684902</a>
                                    </td>
                                    <td>1</td>
                                    <td>
                                        <h6 class="mb-0 font-weight-semibold">&euro; 55.00</h6>
                                    </td>
                                    <td class="text-center">
                                        <div class="list-icons">
                                            <div class="list-icons-item dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="#" class="dropdown-item"><i class="icon-truck"></i> Track parcel</a>
                                                    <a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download invoice</a>
                                                    <a href="#" class="dropdown-item"><i class="icon-wallet"></i> Payment details</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="#" class="dropdown-item"><i class="icon-warning2"></i> Report problem</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="pr-0">
                                        <a href="#">
                                            <img src="../../../../global_assets/images/placeholders/placeholder.jpg" height="60" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#" class="font-weight-semibold">Lunch Sack</a>
                                        <div class="text-muted font-size-sm">
                                            <span class="badge badge-mark bg-success border-success mr-1"></span>
                                            Shipped
                                        </div>
                                    </td>
                                    <td>24cm x 20cm</td>
                                    <td>Junk Food Print</td>
                                    <td>
                                        <a href="#">5574829</a>
                                    </td>
                                    <td>1</td>
                                    <td>
                                        <h6 class="mb-0 font-weight-semibold">&euro; 20.00</h6>
                                    </td>
                                    <td class="text-center">
                                        <div class="list-icons">
                                            <div class="list-icons-item dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="#" class="dropdown-item"><i class="icon-truck"></i> Track parcel</a>
                                                    <a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download invoice</a>
                                                    <a href="#" class="dropdown-item"><i class="icon-wallet"></i> Payment details</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="#" class="dropdown-item"><i class="icon-warning2"></i> Report problem</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="pr-0">
                                        <a href="#">
                                            <img src="../../../../global_assets/images/placeholders/placeholder.jpg" height="60" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#" class="font-weight-semibold">Cambridge Jacket</a>
                                        <div class="text-muted font-size-sm">
                                            <span class="badge badge-mark bg-success border-success mr-1"></span>
                                            Shipped
                                        </div>
                                    </td>
                                    <td>XL</td>
                                    <td>Nomad/Railroad</td>
                                    <td>
                                        <a href="#">475839</a>
                                    </td>
                                    <td>1</td>
                                    <td>
                                        <h6 class="mb-0 font-weight-semibold">&euro; 175.00</h6>
                                    </td>
                                    <td class="text-center">
                                        <div class="list-icons">
                                            <div class="list-icons-item dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="#" class="dropdown-item"><i class="icon-truck"></i> Track parcel</a>
                                                    <a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download invoice</a>
                                                    <a href="#" class="dropdown-item"><i class="icon-wallet"></i> Payment details</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="#" class="dropdown-item"><i class="icon-warning2"></i> Report problem</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="pr-0">
                                        <a href="#">
                                            <img src="../../../../global_assets/images/placeholders/placeholder.jpg" height="60" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#" class="font-weight-semibold">Covert Jacket</a>
                                        <div class="text-muted font-size-sm">
                                            <span class="badge badge-mark bg-success border-success mr-1"></span>
                                            Shipped
                                        </div>
                                    </td>
                                    <td>XXL</td>
                                    <td>Mocha/Glacier Sierra</td>
                                    <td>
                                        <a href="#">589439</a>
                                    </td>
                                    <td>1</td>
                                    <td>
                                        <h6 class="mb-0 font-weight-semibold">&euro; 126.00</h6>
                                    </td>
                                    <td class="text-center">
                                        <div class="list-icons">
                                            <div class="list-icons-item dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="#" class="dropdown-item"><i class="icon-truck"></i> Track parcel</a>
                                                    <a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download invoice</a>
                                                    <a href="#" class="dropdown-item"><i class="icon-wallet"></i> Payment details</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="#" class="dropdown-item"><i class="icon-warning2"></i> Report problem</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <tr class="table-active">
                                    <td colspan="7" class="font-weight-semibold">Cancelled orders</td>
                                    <td class="text-right">
                                        <span class="badge bg-danger badge-pill">9</span>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="pr-0">
                                        <a href="#">
                                            <img src="../../../../global_assets/images/placeholders/placeholder.jpg" height="60" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#" class="font-weight-semibold">Day Hiker Pinnacle 31L Backpack</a>
                                        <div class="text-muted font-size-sm">
                                            <span class="badge badge-mark bg-danger border-danger mr-1"></span>
                                            Cancelled
                                        </div>
                                    </td>
                                    <td>42cm x 26.5cm</td>
                                    <td>Blotto Ripstop</td>
                                    <td>
                                        <a href="#">5849305</a>
                                    </td>
                                    <td>1</td>
                                    <td>
                                        <h6 class="mb-0 font-weight-semibold">&euro; 130.00</h6>
                                    </td>
                                    <td class="text-center">
                                        <div class="list-icons">
                                            <div class="list-icons-item dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="#" class="dropdown-item"><i class="icon-truck"></i> Track parcel</a>
                                                    <a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download invoice</a>
                                                    <a href="#" class="dropdown-item"><i class="icon-wallet"></i> Payment details</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="#" class="dropdown-item"><i class="icon-warning2"></i> Report problem</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="pr-0">
                                        <a href="#">
                                            <img src="../../../../global_assets/images/demo/products/12.jpeg" height="60" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#" class="font-weight-semibold">Kids' Gromlet Backpack</a>
                                        <div class="text-muted font-size-sm">
                                            <span class="badge badge-mark bg-danger border-danger mr-1"></span>
                                            Cancelled
                                        </div>
                                    </td>
                                    <td>22cm x 20cm</td>
                                    <td>Slime Camo Print</td>
                                    <td>
                                        <a href="#">4438495</a>
                                    </td>
                                    <td>1</td>
                                    <td>
                                        <h6 class="mb-0 font-weight-semibold">&euro; 35.00</h6>
                                    </td>
                                    <td class="text-center">
                                        <div class="list-icons">
                                            <div class="list-icons-item dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="#" class="dropdown-item"><i class="icon-truck"></i> Track parcel</a>
                                                    <a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download invoice</a>
                                                    <a href="#" class="dropdown-item"><i class="icon-wallet"></i> Payment details</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="#" class="dropdown-item"><i class="icon-warning2"></i> Report problem</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="pr-0">
                                        <a href="#">
                                            <img src="../../../../global_assets/images/demo/products/13.jpeg" height="60" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#" class="font-weight-semibold">Tinder Backpack</a>
                                        <div class="text-muted font-size-sm">
                                            <span class="badge badge-mark bg-danger border-danger mr-1"></span>
                                            Cancelled
                                        </div>
                                    </td>
                                    <td>42cm x 26cm</td>
                                    <td>Dark Tide Twill</td>
                                    <td>
                                        <a href="#">4759383</a>
                                    </td>
                                    <td>2</td>
                                    <td>
                                        <h6 class="mb-0 font-weight-semibold">&euro; 180.00</h6>
                                    </td>
                                    <td class="text-center">
                                        <div class="list-icons">
                                            <div class="list-icons-item dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="#" class="dropdown-item"><i class="icon-truck"></i> Track parcel</a>
                                                    <a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download invoice</a>
                                                    <a href="#" class="dropdown-item"><i class="icon-wallet"></i> Payment details</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="#" class="dropdown-item"><i class="icon-warning2"></i> Report problem</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="pr-0">
                                        <a href="#">
                                            <img src="../../../../global_assets/images/demo/products/14.jpeg" height="60" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#" class="font-weight-semibold">Almighty Snowboard Boot</a>
                                        <div class="text-muted font-size-sm">
                                            <span class="badge badge-mark bg-danger border-danger mr-1"></span>
                                            Cancelled
                                        </div>
                                    </td>
                                    <td>45</td>
                                    <td>Multiweave</td>
                                    <td>
                                        <a href="#">34432</a>
                                    </td>
                                    <td>1</td>
                                    <td>
                                        <h6 class="mb-0 font-weight-semibold">&euro; 370.00</h6>
                                    </td>
                                    <td class="text-center">
                                        <div class="list-icons">
                                            <div class="list-icons-item dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="#" class="dropdown-item"><i class="icon-truck"></i> Track parcel</a>
                                                    <a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download invoice</a>
                                                    <a href="#" class="dropdown-item"><i class="icon-wallet"></i> Payment details</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="#" class="dropdown-item"><i class="icon-warning2"></i> Report problem</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /orders history -->

                </div>
            </div>
            <!-- /right content -->

        </div>
        <!-- /inner container -->

    </div>
    <!-- /content area -->

@endsection


@section('js')


    {!! Html::script('public/js/jquery.form.js') !!}
    {!! Html::script('public/plugins/jquery.validate/js/jquery.validate.min.js') !!}
    {!! Html::script('/public/material/js/file-explore.js') !!}
    {!! Html::script('public/material/plugins/select2/js/select2.min.js') !!}
    {!! Html::script('public/js/croppie.js') !!}
    {!! Html::script(url('/').'/bootstrap/js/plugins/visualization/echarts/echarts.min.js') !!}
    <script>

        $(function(){

            $( "#frm-change-password" ).validate({
                rules: {
                    new_password: "required",
                    confirm_password: {
                        equalTo: "#new_password"
                    }
                }
            });
            $(".btn-change-password").click(function(e){
                $(".message").hide();
                if($("#frm-change-password").valid()){
                    $("#frm-change-password").ajaxForm(function (response) {
                        response = $.parseJSON(response);

                        if(response.type=='success'){

                            $(".success-message p").html(response.message);
                            $(".success-message").show();

                            setTimeout(function () {
                                $("#change-password").modal('close');
                            },2000);
                        }else{
                            $(".error-message p").html(response.message);
                            $(".error-message").show();
                        }




                    }).submit()
                }

                e.preventDefault();
            });


        })


        // Setup module
        // ------------------------------

        var UserProfileTabbed = function() {


            //
            // Setup module components
            //

            // Charts
            var _componentEcharts = function() {
                if (typeof echarts == 'undefined') {
                    console.warn('Warning - echarts.min.js is not loaded.');
                    return;
                }

                // Define elements
                var weekly_statistics_element = document.getElementById('weekly_statistics');
                var balance_statistics_element = document.getElementById('balance_statistics');
                var available_hours_element = document.getElementById('available_hours');

                // Weekly statistics chart config
                if (weekly_statistics_element) {

                    // Initialize chart
                    var weekly_statistics = echarts.init(weekly_statistics_element);


                    //
                    // Chart config
                    //

                    // Options
                    weekly_statistics.setOption({

                        // Define colors
                        color: ['#2ec7c9','#5ab1ef','#b6a2de',],

                        // Global text styles
                        textStyle: {
                            fontFamily: 'Roboto, Arial, Verdana, sans-serif',
                            fontSize: 13
                        },

                        // Chart animation duration
                        animationDuration: 750,

                        // Setup grid
                        grid: {
                            left: 0,
                            right: 10,
                            top: 35,
                            bottom: 0,
                            containLabel: true
                        },

                        // Add legend
                        legend: {
                            data: ['Patients', 'Appointments', 'Income'],
                            itemHeight: 8,
                            itemGap: 20,
                            textStyle: {
                                padding: [0, 5]
                            }
                        },

                        // Add tooltip
                        tooltip: {
                            trigger: 'axis',
                            backgroundColor: 'rgba(0,0,0,0.75)',
                            padding: [10, 15],
                            textStyle: {
                                fontSize: 13,
                                fontFamily: 'Roboto, sans-serif'
                            },
                            axisPointer: {
                                type: 'shadow',
                                shadowStyle: {
                                    color: 'rgba(0,0,0,0.025)'
                                }
                            }
                        },

                        // Horizontal axis
                        xAxis: [{
                            type: 'value',
                            axisLabel: {
                                color: '#333'
                            },
                            axisLine: {
                                lineStyle: {
                                    color: '#999'
                                }
                            },
                            splitLine: {
                                show: true,
                                lineStyle: {
                                    color: '#eee',
                                    type: 'dashed'
                                }
                            }
                        }],

                        // Vertical axis
                        yAxis: [{
                            type: 'category',
                            data: ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'],
                            axisTick: {
                                show: false
                            },
                            axisLabel: {
                                color: '#333'
                            },
                            axisLine: {
                                lineStyle: {
                                    color: '#999'
                                }
                            },
                            splitLine: {
                                show: true,
                                lineStyle: {
                                    color: ['#eee']
                                }
                            },
                            splitArea: {
                                show: true,
                                areaStyle: {
                                    color: ['rgba(250,250,250,0.1)', 'rgba(0,0,0,0.015)']
                                }
                            }
                        }],

                        // Add series
                        series: [
                            {
                                name: 'Patients',
                                type: 'bar',
                                barWidth: 26,
                                itemStyle: {
                                    normal: {
                                        label: {
                                            show: true,
                                            position: 'inside',
                                            textStyle: {
                                                fontSize: 12
                                            }
                                        }
                                    }
                                },
                                data: [200, 170, 240, 244, 200, 220, 210]
                            },
                            {
                                name: 'Income',
                                type: 'bar',
                                stack: 'Total',
                                barWidth: 5,
                                itemStyle: {
                                    normal: {
                                        label: {
                                            show: true,
                                            position: 'right',
                                            textStyle: {
                                                fontSize: 12
                                            }
                                        }
                                    }
                                },
                                data: [320, 302, 341, 374, 390, 450, 420]
                            },
                            {
                                name: 'Appointments',
                                type: 'bar',
                                stack: 'Total',
                                itemStyle: {
                                    normal: {
                                        label: {
                                            show: true,
                                            position: 'left',
                                            textStyle: {
                                                fontSize: 12
                                            }
                                        }
                                    }
                                },
                                data: [-120, -132, -101, -134, -190, -230, -210]
                            }
                        ]
                    });
                }

                // Balance chart
                if (balance_statistics_element) {

                    // Initialize chart
                    var balance_statistics = echarts.init(balance_statistics_element);


                    //
                    // Chart config
                    //

                    // Common styles
                    var labelRight = {
                        normal: {
                            color: '#FF7043',
                            label: {
                                position: 'right'
                            }
                        }
                    };

                    // Options
                    balance_statistics.setOption({

                        // Global text styles
                        textStyle: {
                            fontFamily: 'Roboto, Arial, Verdana, sans-serif',
                            fontSize: 13
                        },

                        // Chart animation duration
                        animationDuration: 750,

                        // Setup grid
                        grid: {
                            left: 0,
                            right: 10,
                            top: 30,
                            bottom: 0,
                            containLabel: true
                        },

                        // Add legend
                        legend: {
                            data: ['Income', 'Outcome'],
                            itemHeight: 8,
                            itemGap: 20,
                            textStyle: {
                                padding: [0, 5]
                            }
                        },

                        // Add tooltip
                        tooltip: {
                            trigger: 'axis',
                            backgroundColor: 'rgba(0,0,0,0.75)',
                            padding: [10, 15],
                            textStyle: {
                                fontSize: 13,
                                fontFamily: 'Roboto, sans-serif'
                            },
                            axisPointer: {
                                type: 'shadow',
                                shadowStyle: {
                                    color: 'rgba(0,0,0,0.025)'
                                }
                            }
                        },

                        // Horizontal axis
                        xAxis: [{
                            type: 'category',
                            data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                            axisLabel: {
                                color: '#333'
                            },
                            axisLine: {
                                lineStyle: {
                                    color: '#999'
                                }
                            },
                            splitLine: {
                                show: true,
                                lineStyle: {
                                    color: ['#eee']
                                }
                            },
                            splitArea: {
                                show: true,
                                areaStyle: {
                                    color: ['rgba(250,250,250,0.1)', 'rgba(0,0,0,0.015)']
                                }
                            }
                        }],

                        // Vertical axis
                        yAxis: [{
                            type: 'value',
                            axisLabel: {
                                color: '#333'
                            },
                            axisLine: {
                                lineStyle: {
                                    color: '#999'
                                }
                            },
                            splitLine: {
                                show: true,
                                lineStyle: {
                                    color: '#eee',
                                    type: 'dashed'
                                }
                            }
                        }],

                        // Add series
                        series: [
                            {
                                name: 'Income',
                                type: 'bar',
                                barCategoryGap: '50%',
                                label: {
                                    normal: {
                                        textStyle: {
                                            color: '#682d19'
                                        },
                                        position: 'left',
                                        show: false,
                                        formatter: '{b}',
                                        height: 30
                                    }
                                },
                                itemStyle: {
                                    normal: {
                                        color: '#6bca6f',
                                        barBorderRadius: 3
                                    }
                                },
                                data: [190, 122, 160, 240, 110, 180, 280]
                            },
                            {
                                name: 'Outcome',
                                type: 'line',
                                smooth: true,
                                symbolSize: 7,
                                silent: true,
                                data: [120, 180, 30, 137, 90, 230, 120],
                                itemStyle: {
                                    normal: {
                                        color: '#2f4553',
                                        borderWidth: 2
                                    }
                                }
                            }
                        ]
                    });
                }

                // Basic columns chart
                if (available_hours_element) {

                    // Initialize chart
                    var available_hours = echarts.init(available_hours_element);


                    //
                    // Chart config
                    //

                    // Options
                    available_hours.setOption({

                        // Define colors
                        color: ['#2ec7c9','#b6a2de','#5ab1ef','#ffb980','#d87a80'],

                        // Global text styles
                        textStyle: {
                            fontFamily: 'Roboto, Arial, Verdana, sans-serif',
                            fontSize: 13
                        },

                        // Chart animation duration
                        animationDuration: 750,

                        // Setup grid
                        grid: {
                            left: 0,
                            right: 10,
                            top: 30,
                            bottom: 0,
                            containLabel: true
                        },

                        // Add legend
                        legend: {
                            data: ['Booked hours', 'Available hours'],
                            itemHeight: 8,
                            itemGap: 20,
                            textStyle: {
                                padding: [0, 5]
                            }
                        },

                        // Add tooltip
                        tooltip: {
                            trigger: 'axis',
                            backgroundColor: 'rgba(0,0,0,0.75)',
                            padding: [10, 15],
                            axisPointer: {
                                type: 'shadow',
                                shadowStyle: {
                                    color: 'rgba(0,0,0,0.025)'
                                }
                            },
                            textStyle: {
                                fontSize: 13,
                                fontFamily: 'Roboto, sans-serif'
                            }
                        },

                        // Horizontal axis
                        xAxis: [{
                            type: 'category',
                            data : ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
                            axisLabel: {
                                color: '#333'
                            },
                            axisLine: {
                                lineStyle: {
                                    color: '#999'
                                }
                            },
                            splitLine: {
                                show: true,
                                lineStyle: {
                                    color: '#eee',
                                    type: 'dashed'
                                }
                            }
                        }],

                        // Vertical axis
                        yAxis: [{
                            type: 'value',
                            axisLabel: {
                                color: '#333'
                            },
                            axisLine: {
                                lineStyle: {
                                    color: '#999'
                                }
                            },
                            splitLine: {
                                lineStyle: {
                                    color: '#eee'
                                }
                            },
                            splitArea: {
                                show: true,
                                areaStyle: {
                                    color: ['rgba(250,250,250,0.1)', 'rgba(0,0,0,0.01)']
                                }
                            }
                        }],

                        // Add series
                        series: [
                            {
                                name: 'Booked hours',
                                type: 'bar',
                                data: [4, 8, 6, 4, 7, 5, 9],
                                itemStyle: {
                                    normal: {
                                        color: '#B0BEC5',
                                        label: {
                                            show: true,
                                            position: 'top',
                                            textStyle: {
                                                fontWeight: 500
                                            }
                                        }
                                    }
                                }
                            },
                            {
                                name: 'Available hours',
                                type: 'bar',
                                data: [6, 2, 4, 6, 3, 5, 1],
                                itemStyle: {
                                    normal: {
                                        color: '#29B6F6',
                                        label: {
                                            show: true,
                                            position: 'top',
                                            textStyle: {
                                                fontWeight: 500
                                            }
                                        }
                                    }
                                }
                            }
                        ]
                    });
                }


                //
                // Resize charts
                //

                // Resize function
                var triggerChartResize = function() {
                    weekly_statistics_element && weekly_statistics.resize();
                    balance_statistics_element && balance_statistics.resize();
                    available_hours_element && available_hours.resize();
                };

                // On sidebar width change
                $(document).on('click', '.sidebar-control, .navbar-toggler', function() {
                    setTimeout(function () {
                        triggerChartResize();
                    }, 0);
                });

                // On window resize
                var resizeCharts;
                window.onresize = function () {
                    clearTimeout(resizeCharts);
                    resizeCharts = setTimeout(function () {
                        triggerChartResize();
                    }, 200);
                };

                // Resize charts when hidden element becomes visible
                $('.nav-link[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                    triggerChartResize();
                });
            };

            // Uniform
            var _componentUniform = function() {
                if (!$().uniform) {
                    console.warn('Warning - uniform.min.js is not loaded.');
                    return;
                }

                // Initialize
                $('.form-input-styled').uniform({
                    fileButtonClass: 'action btn bg-warning'
                });
            };

            // Select2
            var _componentSelect2 = function() {
                if (!$().select2) {
                    console.warn('Warning - select2.min.js is not loaded.');
                    return;
                }

                // Initialize
                $('.form-control-select2').select2({
                    minimumResultsForSearch: Infinity
                });
            };

            // Schedule
            var _componentFullCalendar = function() {
                if (typeof FullCalendar == 'undefined') {
                    console.warn('Warning - Fullcalendar files are not loaded.');
                    return;
                }

                // Add events
                var eventColors = [
                    {
                        title: 'Day off',
                        start: '2014-11-01',
                        color: '#DB7272'
                    },
                    {
                        title: 'University',
                        start: '2014-11-07',
                        end: '2014-11-10',
                        color: '#42A5F5'
                    },
                    {
                        id: 999,
                        title: 'Shopping',
                        start: '2014-11-09T13:00:00',
                        color: '#8D6E63'
                    },
                    {
                        id: 999,
                        title: 'Shopping',
                        start: '2014-11-15T16:00:00',
                        color: '#00BCD4'
                    },
                    {
                        title: 'Conference',
                        start: '2014-11-11',
                        end: '2014-11-13',
                        color: '#26A69A'
                    },
                    {
                        title: 'Meeting',
                        start: '2014-11-14T08:30:00',
                        end: '2014-11-14T12:30:00',
                        color: '#7986CB'
                    },
                    {
                        title: 'Meeting',
                        start: '2014-11-11T09:30:00',
                        color: '#78909C'
                    },
                    {
                        title: 'Happy Hour',
                        start: '2014-11-12T14:30:00',
                        color: '#26A69A'
                    },
                    {
                        title: 'Dinner',
                        start: '2014-11-13T19:00:00',
                        color: '#FF7043'
                    },
                    {
                        title: 'Birthday Party',
                        start: '2014-11-13T03:00:00',
                        color: '#4CAF50'
                    }
                ];

                // Define element
                var myScheduleElement = document.querySelector('.my-schedule');

                // Initialize
                if(myScheduleElement) {
                    var myScheduleInit = new FullCalendar.Calendar(myScheduleElement, {
                        plugins: [ 'dayGrid', 'timeGrid', 'interaction' ],
                        header: {
                            left: 'prev,next today',
                            center: 'title',
                            right: 'dayGridMonth,timeGridWeek,timeGridDay'
                        },
                        defaultDate: '2014-11-12',
                        defaultView: 'timeGridWeek',
                        businessHours: true,
                        events: eventColors
                    });

                    // Render if inside hidden element
                    $('.nav-link[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                        myScheduleInit.render();
                    });
                }
            };

            // Row link
            var _componentRowLink = function() {
                if (!$().rowlink) {
                    console.warn('Warning - rowlink.js is not loaded.');
                    return;
                }

                // Initialize
                $('tbody.rowlink').rowlink();
            };

            // Inbox table
            var _componentTableInbox = function() {

                // Define variables
                var highlightColorClass = 'alpha-slate';

                // Highlight row when checkbox is checked
                $('.table-inbox').find('tr > td:first-child').find('input[type=checkbox]').on('change', function() {
                    if($(this).is(':checked')) {
                        $(this).parents('tr').addClass(highlightColorClass);
                    }
                    else {
                        $(this).parents('tr').removeClass(highlightColorClass);
                    }
                });

                // Grab first letter and insert to the icon
                $('.table-inbox tr').each(function (i) {

                    // Title
                    var $title = $(this).find('.letter-icon-title'),
                        letter = $title.eq(0).text().charAt(0).toUpperCase();

                    // Icon
                    var $icon = $(this).find('.letter-icon');
                    $icon.eq(0).text(letter);
                });
            };


            //
            // Return objects assigned to module
            //

            return {
                init: function() {
                    _componentEcharts();
                    _componentUniform();
                    _componentSelect2();
                    _componentFullCalendar();
                    _componentRowLink();
                    _componentTableInbox();
                }
            }
        }();


        // Initialize module
        // ------------------------------

        document.addEventListener('DOMContentLoaded', function() {
            UserProfileTabbed.init();
        });



    </script>
    {{--{!! Html::script('public/demo/demo-form-layouts.js') !!}--}}
@endsection