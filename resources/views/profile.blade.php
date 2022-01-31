@extends('layout.app')
@section('page-title') {!! \Illuminate\Support\Facades\Auth::user()->staffs->first_name.' '.\Illuminate\Support\Facades\Auth::user()->staffs->last_name !!}'s Profile @endsection
@section('css')

@endsection


@section('content')
@php
    $staff = \Illuminate\Support\Facades\Auth::user()->staffs;
@endphp

<div class="card">


    <div class="card-body">
        <div class="d-md-flex align-items-md-start">

            <!-- Left sidebar component -->
            <div class="sidebar sidebar-light bg-transparent sidebar-component sidebar-component-left wmin-300 border-0 shadow-0 sidebar-expand-md">

                <!-- Sidebar content -->
                <div class="sidebar-content">

                    <!-- Navigation -->
                    <div class="card">
                        <div class="card-body bg-indigo-400 text-center card-img-top" style="background-image: url({!! env('APP_ASSETS_URL') !!}/images/backgrounds/panel_bg.png); background-size: contain;">
                            <div class="card-img-actions d-inline-block mb-3">
                                @if(!empty($staff->profile_picture))
                                    <img class="img-fluid rounded-circle" src="{!! env('APP_URL') !!}uploads/images/{!! $staff->profile_picture !!}" width="170" height="170" alt="">
                                @else
                                    <img class="img-fluid rounded-circle" src="{!! env('APP_ASSETS_URL') !!}uploads/placeholders/placeholder.jpg" width="170" height="170" alt="">
                                @endif

                            </div>

                            <h6 class="font-weight-semibold mb-0"> {!! \Illuminate\Support\Facades\Auth::user()->staffs->first_name.' '.\Illuminate\Support\Facades\Auth::user()->staffs->last_name !!}</h6>
                            <span class="d-block opacity-75">{!! \Illuminate\Support\Facades\Auth::user()->role !!}</span>


                        </div>

                        <div class="card-body p-0">
                            <ul class="nav nav-sidebar mb-2">
                                <li class="nav-item-header">Navigation</li>
                                <li class="nav-item">
                                    <a href="#profile" class="nav-link  active show" data-toggle="tab">
                                        <i class="icon-user"></i>
                                        My profile
                                    </a>
                                </li>
                                {{-- <li class="nav-item">
                                     <a href="#notification-settings" class="nav-link" data-toggle="tab">
                                         <i class="icon-calendar3"></i>
                                         Notification Settings
                                     </a>
                                 </li>--}}
                                {{--<li class="nav-item">
                                    <a href="#account-settings" class="nav-link" data-toggle="tab">
                                        <i class="icon-envelop2"></i>
                                        Account Settings
                                        <span class="badge bg-danger badge-pill ml-auto">29</span>
                                    </a>
                                </li>--}}
                                <li class="nav-item">
                                    <a href="#activities" class="nav-link" data-toggle="tab">
                                        <i class="icon-cart2"></i>
                                        Activities
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




                </div>
                <!-- /sidebar content -->

            </div>
            <!-- /left sidebar component -->


            <!-- Right content -->
            <div class="tab-content w-100 overflow-auto">
                <div class="tab-pane fade  active show" id="profile">



                    <!-- Profile info -->
                    <div class="card">
                        <div class="card-header header-elements-inline">
                            <h5 class="card-title">Profile information</h5>
                            <div class="header-elements">
                                <div class="list-icons">
                                    <a class="list-icons-item" data-action="collapse"></a>
                                    <a class="list-icons-item" data-action="reload"></a>
                                    <a class="list-icons-item" data-action="remove"></a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <form action="/update/profile" method="POST" id="update-profile" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>First Name</label>
                                            <input type="text" value="{!! $staff->first_name !!}" required class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Last Name</label>
                                            <input type="text" value="{!! $staff->last_name !!}" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Address</label>
                                            <textarea class="form-control">{!! $staff->address !!}</textarea>
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>City</label>
                                            <input type="text" value="{!! $staff->city !!}" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label>State/Province</label>
                                            <input type="text" value="{!! $staff->state !!}" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label>ZIP code</label>
                                            <input type="text" value="{!! $staff->zipcode !!}" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Email</label>
                                            <input type="text" readonly="readonly" value="{!! \Illuminate\Support\Facades\Auth::user()->email !!}" class="form-control email">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Your country</label>
                                            <input type="text"  value="{!! $staff->country !!}" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Phone #</label>
                                            <input type="text" value="+{!! $staff->phone_code.''.$staff->contact_number !!}" class="form-control">
                                        </div>

                                        <div class="col-md-6">
                                            <label>Upload profile image</label>
                                            <div class="uniform-uploader"><input type="file" class="form-input-styled" data-fouc=""><span class="filename" style="user-select: none;">No file selected</span><span class="action btn bg-warning" style="user-select: none;">Choose File</span></div>
                                            <span class="form-text text-muted">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /profile info -->



                </div>





                <div class="tab-pane fade" id="activities">

                    <!-- Orders history -->
                    <div class="card">
                        <div class="card-header header-elements-inline">
                            <h6 class="card-title">Activity history</h6>
                            <div class="header-elements">
                                <span><i class="icon-arrow-down22 text-danger"></i> <span class="font-weight-semibold">- 29.4%</span></span>
                            </div>
                        </div>



                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th colspan="2">Module</th>
                                    <th>Text</th>
                                    <th>Date Time</th>

                                    <th class="text-center" style="width: 20px;"><i class="icon-arrow-down12"></i></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="table-active">
                                    <td colspan="3" class="font-weight-semibold">Today Activities</td>
                                    <td class="text-right">
                                        <span class="badge bg-secondary badge-pill">24</span>
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
                                    <td colspan="3" class="font-weight-semibold">Old Activities</td>
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
                                        <a href="#" class="font-weight-semibold">Custom Snowboard</a>
                                        <div class="text-muted font-size-sm">
                                            <span class="badge badge-mark bg-success border-success mr-1"></span>
                                            Shipped
                                        </div>
                                    </td>
                                    <td>151</td>

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
    </div>
</div>
@endsection


@section('js')

@endsection