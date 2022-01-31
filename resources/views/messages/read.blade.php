<!-- Right content -->
<div class="flex-fill overflow-auto">

    <!-- Single mail -->
    <div class="card">

        <!-- Action toolbar -->
        <div class="bg-light rounded-top">
            <div class="navbar navbar-light bg-light navbar-expand-lg py-lg-2 rounded-top">
                <div class="text-center d-lg-none w-100">
                    <button type="button" class="navbar-toggler w-100 h-100" data-toggle="collapse" data-target="#inbox-toolbar-toggle-read">
                        <i class="icon-circle-down2"></i>
                    </button>
                </div>

                <div class="navbar-collapse text-center text-lg-left flex-wrap collapse" id="inbox-toolbar-toggle-read">
                    <div class="mt-3 mt-lg-0 mr-lg-3">
                        <div class="btn-group">
                            <a href="#reply" type="button" class="btn btn-light message-folders"   data-type="reply" data-message-id="{!! $user_message->id !!}">
                                <i class="icon-reply"></i>
                                <span class="d-none d-lg-inline-block ml-2">Reply</span>
                            </a>

                            <a type="button" class="btn btn-light">
                                <i class="icon-forward"></i>
                                <span class="d-none d-lg-inline-block ml-2">Forward</span>
                            </a>
                            <a type="button" class="btn btn-light">
                                <i class="icon-bin"></i>
                                <span class="d-none d-lg-inline-block ml-2">Delete</span>
                            </a>
                            <div class="btn-group">
                                <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="#" class="dropdown-item">Select all</a>
                                    <a href="#" class="dropdown-item">Select read</a>
                                    <a href="#" class="dropdown-item">Select unread</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item">Clear selection</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="navbar-text ml-lg-auto">12:49 pm</div>

                    <div class="ml-lg-3 mb-3 mb-lg-0">
                        <div class="btn-group">
                            <button type="button" class="btn btn-light">
                                <i class="icon-printer"></i>
                                <span class="d-none d-lg-inline-block ml-2">Print</span>
                            </button>
                            <button type="button" class="btn btn-light">
                                <i class="icon-new-tab2"></i>
                                <span class="d-none d-lg-inline-block ml-2">Share</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /action toolbar -->


        <!-- Mail details -->
        <div class="card-body">
            <div class="media flex-column flex-md-row">
                <a href="#" class="d-none d-md-block mr-md-3 mb-3 mb-md-0">
											<span class="btn bg-teal-400 btn-icon btn-lg rounded-round">
												<span class="letter-icon"></span>
											</span>
                </a>

                <div class="media-body">
                    <h6 class="mb-0">{!! $user_message->subject !!}</h6>

                    <div class="letter-icon-title font-weight-semibold">
                        @if($user_message->senders->role=="administrator")
                            {!! $user_message->senders->name !!}
                        @elseif($user_message->senders->role=="staff")
                            {!! $user_message->staffs->name  !!}
                        @elseif($user_message->senders->role=="doctor")
                            {!! $user_message->doctors->fname. ' '.$user_message->doctors->lname  !!}
                        @elseif($user_message->senders->role=="patient")
                            {!! $user_message->patients->patient_name  !!}
                        @endif
                        <a href="#" class="email">&lt;{!! $user_message->senders->email !!}&gt;</a></div>
                </div>

                <div class="align-self-md-center ml-md-3 mt-3 mt-md-0">
                    <ul class="list-inline list-inline-condensed mb-0">
                        <li class="list-inline-item">
                            <a href="#"><img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="rounded-circle" width="32" height="32" alt=""></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#"><img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="rounded-circle" width="32" height="32" alt=""></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#"><img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="rounded-circle" width="32" height="32" alt=""></a>
                        </li>
                        <li class="list-inline-item">
                            <span class="btn btn-sm bg-transparent border-slate-300 text-slate rounded-round border-dashed">+26</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /mail details -->


        <!-- Mail container -->
        <div class="card-body">
            <div class="overflow-auto mw-100">

                <!-- Email sample (demo) -->
                <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                    <tr>
                        <td>

                            {!! $user_message->email_content !!}
                        </td>
                    </tr>
                </table>
                <!-- /email sample (demo) -->

            </div>
        </div>
        <!-- /mail container -->


        <!-- Attachments -->
    {{-- <div class="card-body border-top">
         <h6 class="mb-0">2 Attachments</h6>

         <ul class="list-inline mb-0">
             <li class="list-inline-item">
                 <div class="card bg-light py-2 px-3 mt-3 mb-0">
                     <div class="media my-1">
                         <div class="mr-3 align-self-center"><i class="icon-file-pdf icon-2x text-danger-400 top-0"></i></div>
                         <div class="media-body">
                             <div class="font-weight-semibold">new_december_offers.pdf</div>

                             <ul class="list-inline list-inline-condensed mb-0">
                                 <li class="list-inline-item text-muted">174 KB</li>
                                 <li class="list-inline-item"><a href="#">View</a></li>
                                 <li class="list-inline-item"><a href="#">Download</a></li>
                             </ul>
                         </div>
                     </div>
                 </div>
             </li>
             <li class="list-inline-item">
                 <div class="card bg-light py-2 px-3 mt-3 mb-0">
                     <div class="media my-1">
                         <div class="mr-3 align-self-center"><i class="icon-file-pdf icon-2x text-danger-400 top-0"></i></div>
                         <div class="media-body">
                             <div class="font-weight-semibold">assignment_letter.pdf</div>

                             <ul class="list-inline list-inline-condensed mb-0">
                                 <li class="list-inline-item text-muted">736 KB</li>
                                 <li class="list-inline-item"><a href="#">View</a></li>
                                 <li class="list-inline-item"><a href="#">Download</a></li>
                             </ul>
                         </div>
                     </div>
                 </div>
             </li>
         </ul>
     </div>--}}
    <!-- /attachments -->

    </div>
    <!-- /single mail -->

</div>
<!-- /right content -->
