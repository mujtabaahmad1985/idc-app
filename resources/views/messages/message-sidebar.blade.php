<!-- Left sidebar component -->
<div class="sidebar sidebar-light bg-transparent sidebar-component sidebar-component-left border-0 shadow-0 sidebar-expand-md">

    <!-- Sidebar content -->
    <div class="sidebar-content">

        <!-- Actions -->
        <div class="card">
            <div class="card-header bg-transparent header-elements-inline">
                <span class="text-uppercase font-size-sm font-weight-semibold">Actions</span>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <a href="#compose" class="btn bg-indigo-400 btn-block message-folders"  data-type="compose">Compose mail</a>
            </div>
        </div>
        <!-- /actions -->


        <!-- Sub navigation -->
        <div class="card">
            <div class="card-header bg-transparent header-elements-inline">
                <span class="text-uppercase font-size-sm font-weight-semibold">Navigation</span>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                    </div>
                </div>
            </div>

            <div class="card-body p-0">
                <ul class="nav nav-sidebar mb-2" data-nav-type="accordion">
                    <li class="nav-item-header">Folders</li>
                    <li class="nav-item">
                        <a href="#inbox" class="nav-link active message-folders" data-type="inbox">
                            <i class="icon-drawer-in"></i>
                            Inbox
                            @if(0)
                            <span class="badge bg-success badge-pill ml-auto">32</span>
                                @endif
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#draft" class="nav-link message-folders" data-type="draft"><i class="icon-drawer3"></i> Drafts</a>
                    </li>
                    <li class="nav-item">
                        <a href="#sent" class="nav-link message-folders" data-type="sent"><i class="icon-drawer-out"></i> Sent mail</a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link"><i class="icon-bin"></i> Trash</a>
                    </li>
                    <li class="nav-item-header">Labels  <span class="badge badge-pill ml-auto"><a class="icon-add"></a> </span></li>
                    {{--<li class="nav-item">
                        <a href="#" class="nav-link"><span class="badge badge-mark border-primary align-self-center mr-3"></span> Facebook</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link"><span class="badge badge-mark border-success align-self-center mr-3"></span> Spotify</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link"><span class="badge badge-mark border-indigo-400 align-self-center mr-3"></span> Twitter</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link"><span class="badge badge-mark border-pink-400 align-self-center mr-3"></span> Dribbble</a>
                    </li>--}}
                </ul>
            </div>
        </div>
        <!-- /sub navigation -->





        <!-- Contacts -->
        <div class="card">
            <div class="card-header bg-transparent header-elements-inline">
                <span class="text-uppercase font-size-sm font-weight-semibold">Contacts</span>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <ul class="media-list">
                    <li class="media">
                        <a href="#" class="mr-3 position-relative">
                            <img src="../../../../global_assets/images/placeholders/placeholder.jpg" width="36" height="36" class="rounded-circle" alt="">
                            <span class="badge badge-info badge-pill badge-float border-2 border-white">6</span>
                        </a>

                        <div class="media-body">
                            <div class="font-weight-semibold">Rebecca Jameson</div>
                            <span class="font-size-sm text-muted">Web developer</span>
                        </div>

                        <div class="ml-3 align-self-center">
                            <div class="dropdown">
                                <a href="#" class="text-default dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-more2"></i></a>
                                <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-164px, 17px, 0px); top: 0px; left: 0px; will-change: transform;">
                                    <a href="#" class="dropdown-item"><i class="icon-comment-discussion"></i> Start chat</a>
                                    <a href="#" class="dropdown-item"><i class="icon-phone2"></i> Make a call</a>
                                    <a href="#" class="dropdown-item"><i class="icon-mail5"></i> Send mail</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item"><i class="icon-statistics"></i> Statistics</a>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="media">
                        <a href="#" class="mr-3 position-relative">
                            <img src="../../../../global_assets/images/placeholders/placeholder.jpg" width="36" height="36" class="rounded-circle" alt="">
                            <span class="badge badge-info badge-pill badge-float border-2 border-white">9</span>
                        </a>

                        <div class="media-body">
                            <div class="font-weight-semibold">Walter Sommers</div>
                            <span class="font-size-sm text-muted">Lead developer</span>
                        </div>

                        <div class="ml-3 align-self-center">
                            <div class="dropdown">
                                <a href="#" class="text-default dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-more2"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="#" class="dropdown-item"><i class="icon-comment-discussion"></i> Start chat</a>
                                    <a href="#" class="dropdown-item"><i class="icon-phone2"></i> Make a call</a>
                                    <a href="#" class="dropdown-item"><i class="icon-mail5"></i> Send mail</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item"><i class="icon-statistics"></i> Statistics</a>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="media">
                        <a href="#" class="mr-3">
                            <img src="../../../../global_assets/images/placeholders/placeholder.jpg" width="36" height="36" class="rounded-circle" alt="">
                        </a>

                        <div class="media-body">
                            <div class="font-weight-semibold">Otto Gerwald</div>
                            <span class="font-size-sm text-muted">Front end developer</span>
                        </div>

                        <div class="ml-3 align-self-center">
                            <div class="dropdown">
                                <a href="#" class="text-default dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-more2"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="#" class="dropdown-item"><i class="icon-comment-discussion"></i> Start chat</a>
                                    <a href="#" class="dropdown-item"><i class="icon-phone2"></i> Make a call</a>
                                    <a href="#" class="dropdown-item"><i class="icon-mail5"></i> Send mail</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item"><i class="icon-statistics"></i> Statistics</a>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="media">
                        <a href="#" class="mr-3">
                            <img src="../../../../global_assets/images/placeholders/placeholder.jpg" width="36" height="36" class="rounded-circle" alt="">
                        </a>

                        <div class="media-body">
                            <div class="font-weight-semibold">Vince Satmann</div>
                            <span class="font-size-sm text-muted">UX expert</span>
                        </div>

                        <div class="ml-3 align-self-center">
                            <div class="dropdown">
                                <a href="#" class="text-default dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-more2"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="#" class="dropdown-item"><i class="icon-comment-discussion"></i> Start chat</a>
                                    <a href="#" class="dropdown-item"><i class="icon-phone2"></i> Make a call</a>
                                    <a href="#" class="dropdown-item"><i class="icon-mail5"></i> Send mail</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item"><i class="icon-statistics"></i> Statistics</a>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="media">
                        <a href="#" class="mr-3">
                            <img src="../../../../global_assets/images/placeholders/placeholder.jpg" width="36" height="36" class="rounded-circle" alt="">
                        </a>

                        <div class="media-body">
                            <div class="font-weight-semibold">Jason Leroy</div>
                            <span class="font-size-sm text-muted">SEO specialist</span>
                        </div>

                        <div class="ml-3 align-self-center">
                            <div class="dropdown">
                                <a href="#" class="text-default dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-more2"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="#" class="dropdown-item"><i class="icon-comment-discussion"></i> Start chat</a>
                                    <a href="#" class="dropdown-item"><i class="icon-phone2"></i> Make a call</a>
                                    <a href="#" class="dropdown-item"><i class="icon-mail5"></i> Send mail</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item"><i class="icon-statistics"></i> Statistics</a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /contacts -->

    </div>
    <!-- /sidebar content -->

</div>
<!-- /left sidebar component -->