
@php
    $logged_user = \Illuminate\Support\Facades\Auth::user();
$logo_picture = "/images/female.png";
                                $display_name = "Admin";
                                $role = ucwords(str_replace('-',' ',Auth::user() ->role));

                            if($logged_user->role=="hospital-administrator"){
                                $hospital = $logged_user->hospitals;
                                $display_name = ucwords($hospital->hospital_name);

                               $logo_picture = \Illuminate\Support\Facades\Storage::disk('images')->url($hospital->logo);
                            }
@endphp

<div id="change-password" class="modal " style="width:300px !important; min-height: 380px !important;">
    <div class="modal-content">
        <div class="row">

            <h4 class="left">Change Password</h4>
            <div class="col s1 right-align no-padding right">
                <a href="#!" class="modal-action modal-close"><i class="material-icons">close</i></a>
            </div>
        </div>
        <div id="change-password-panel">
            <div class="progress"> <div class="indeterminate"></div></div>
        </div>

    </div>

</div>
<!-- Main navbar -->
<div class="navbar navbar-expand-md navbar-light fixed-top">
    <div class="navbar-brand">
        <a href="/dashboard" class="d-inline-block">
            <img src="/images/logo.png" alt="">
        </a>
    </div>

    <div class="d-md-none">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
            <i class="icon-tree5"></i>
        </button>
        <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
            <i class="icon-paragraph-justify3"></i>
        </button>
    </div>

    <div class="collapse navbar-collapse" id="navbar-mobile">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
                    <i class="icon-paragraph-justify3"></i>
                </a>
            </li>
            @if(Auth::user()->role=='hospital-administrator' || Auth::user()->role=='staff' || Auth::user()->role=='doctor')
            <li class="nav-item dropdown">
                <a href="#" class="navbar-nav-link dropdown-toggle caret-0" data-toggle="dropdown">
                    <i class="icon-plus-circle2"></i>
                    <span class="d-md-none ml-2"></span>

                </a>

                <div class="dropdown-menu dropdown-content wmin-md-350">
                    <div class="dropdown-content-header">
                       {{-- <span class="font-weight-semibold">Quick Options</span>--}}
                        <!--<a href="#" class="text-default"><i class="icon-sync"></i></a>-->
                    </div>

                    <div class="dropdown-content-body dropdown-scrollable">
                        <ul class="media-list">
                            <li class="media" >
                                <div class="mr-3">
                                    <a href="#" class="btn bg-transparent border-primary text-primary rounded-round border-2 btn-icon"><i class="icon-plus-circle2"></i></a>
                                </div>

                                <div class="media-body" style="padding-top: 10px">
                                    <a href="/calendar?action=new-appointment">Add An Appointment To Patient</a>
                                </div>
                            </li>
                            <li class="media" >
                                <div class="mr-3">
                                    <a href="#" class="btn bg-transparent border-primary text-primary rounded-round border-2 btn-icon"><i class="icon-plus-circle2"></i></a>
                                </div>

                                <div class="media-body" style="padding-top: 10px">
                                    <a href="/patients/add">Add A New Patient</a>
                                </div>
                            </li>


                        </ul>
                    </div>


                </div>
            </li>
                @endif
        </ul>
        @if($logged_user->role=='administrator' || $logged_user->role=='staff' || $logged_user->role=='doctor')

            @else
            {{--<span class="badge bg-success ml-md-3 mr-md-auto">Toggle menu</span>--}}
@endif
        <div class="typeahead__container">
            <div class="typeahead__field">
                <div class="typeahead__query">
                    <input type="text" class="form-control js-typeahead" placeholder="Type for search here...." id="general-search-bar">
                </div>
            </div>
        </div>
        <ul class="navbar-nav">


            <li class="nav-item dropdown">
                <a href="#" class="navbar-nav-link dropdown-toggle caret-0" data-toggle="dropdown">
                    <i class="icon-bubbles4"></i>
                    <span class="d-md-none ml-2">Messages</span>

                   @if($logged_user->user_messages->count() > 0) <span class="badge badge-pill bg-warning-400 ml-auto ml-md-0">{!! $logged_user->user_messages->count() !!}</span> @endif
                </a>

                <div class="dropdown-menu dropdown-menu-right dropdown-content wmin-md-350">
                    <div class="dropdown-content-header">
                        <span class="font-weight-semibold">Messages</span>
                        <a href="/messages#compose" class="text-default"><i class="icon-compose"></i></a>
                    </div>
                    @if($logged_user->user_recent_messages->count() > 0)
                    <div class="dropdown-content-body dropdown-scrollable">
                        <ul class="media-list">
                            @foreach($logged_user->user_recent_messages as $message)
                            <li class="media">
                                <div class="mr-3 position-relative">
                                    <img src="/images/female.png" width="36" height="36" class="rounded-circle" alt="">
                                </div>

                                <div class="media-body">
                                    <div class="media-title">
                                        <a href="/messages#inbox">
                                            @if($message->senders->role=="administrator")
                                                <span class="font-weight-semibold">{!! $message->senders->name !!}</span>
                                            @elseif($message->senders->role=="staff")
                                                <span class="font-weight-semibold">{!! $message->staffs->first_name.' '.$message->staffs->last_name !!}</span>
                                            @elseif($message->senders->role=="doctor")
                                                <span class="font-weight-semibold">{!! $message->doctors->name !!}</span>
                                            @elseif($message->senders->role=="patient")
                                                <span class="font-weight-semibold">{!! $message->patients->patient_name !!}</span>
                                            @endif

                                            <span class="text-muted float-right font-size-sm">
                                                  @php
                                                      $created_at = \Carbon\Carbon::parse($message->created_at);
                                                          echo $created_at->diffForHumans(\Carbon\Carbon::now());
                                                  @endphp
                                                </span>
                                        </a>
                                    </div>

                                    <span class="text-muted">{!! substr(strip_tags($message->email_content),0,50) !!}...</span>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="dropdown-content-footer justify-content-center p-0">
                        <a href="/messages#inbox" class="bg-light text-grey w-100 py-2" data-popup="tooltip" title="Load more"><i class="icon-menu7 d-block top-0"></i></a>
                    </div>
                </div>
            </li>

            <li class="nav-item dropdown dropdown-user">
                <a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">


                        <img src="{!! $logo_picture !!}" width="38" height="38" class="rounded-circle mr-2" alt="">

                    <span>{!! $display_name !!}</span>
                </a>

                <div class="dropdown-menu dropdown-menu-right">
                   <a href="/me" class="dropdown-item"><i class="icon-user-plus"></i> My profile</a>

                    <a href="/messages#inbox" class="dropdown-item"><i class="icon-comment-discussion"></i> Messages @if($logged_user->user_messages->count() > 0)<span class="badge badge-pill bg-blue ml-auto">{!! $logged_user->user_messages->count() !!}</span>@endif</a>
                    <div class="dropdown-divider"></div>
                   {{-- <a href="#" class="dropdown-item"><i class="icon-cog5"></i> Account settings</a>--}}
                    <a href="/logout" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
                </div>
            </li>
        </ul>
    </div>
</div>
<!-- /main navbar -->



