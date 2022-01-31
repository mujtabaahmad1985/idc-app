<!-- Single line -->
<div class="card">
    <div class="card-header bg-transparent header-elements-inline">
        <h6 class="card-title">My Inbox</h6>
        @if(Auth::User()->user_messages->count() > 0)
        <div class="header-elements">
            <span class="badge bg-blue">{!! Auth::User()->user_messages->count() !!} new today</span>
        </div>
            @endif
    </div>

    <!-- Action toolbar -->
    <div class="bg-light">
        <div class="navbar navbar-light bg-light navbar-expand-lg py-lg-2">
            <div class="text-center d-lg-none w-100">
                <button type="button" class="navbar-toggler w-100" data-toggle="collapse" data-target="#inbox-toolbar-toggle-single">
                    <i class="icon-circle-down2"></i>
                </button>
            </div>

            <div class="navbar-collapse text-center text-lg-left flex-wrap collapse" id="inbox-toolbar-toggle-single">
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
            @if(isset($messages) && $messages->count() > 0)
                @foreach($messages as $message)
                    @if($message->status=="unread")
                        <tr class="unread">
                    @else
                        <tr>
                            @endif
                            <td class="table-inbox-checkbox rowlink-skip">
                                <input type="checkbox" class="form-input-styled" data-fouc>
                            </td>
                            <td class="table-inbox-star rowlink-skip">
                                <a href="#">
                                    <i class="icon-star-empty3 text-muted"></i>
                                </a>
                            </td>
                            <td class="table-inbox-image">
                                <img src="/images/female.png" class="rounded-circle" width="32" height="32" alt="">
                            </td>
                            <td class="table-inbox-name">
                                <a href="javascript:;" class="read-message" data-message-id="{!! $message->id !!}">
                                    @if($message->senders->role=="administrator")
                                        <div class="letter-icon-title text-default">{!! $message->senders->name !!}</div>
                                    @elseif($message->senders->role=="staff")

                                        <div class="letter-icon-title text-default">{!! $message->staffs->first_name.' '.$message->staffs->last_name !!}</div>
                                    @elseif($message->senders->role=="doctor")
                                        <div class="letter-icon-title text-default">{!! $message->doctors->name !!}</div>
                                    @elseif($message->senders->role=="patient")
                                        <div class="letter-icon-title text-default">{!! $message->patients->patient_name !!}</div>
                                    @endif
                                </a>
                            </td>
                            <td class="table-inbox-message">
                                <a href="javascript:;" class="table-inbox-subject read-message" data-message-id="{!! $message->id !!}">{!! $message->subject !!} &nbsp;-&nbsp;</a>
                                <span class="text-muted font-weight-normal">{!! strip_tags($message->email_content) !!}</span>
                            </td>
                            <td class="table-inbox-attachment">
                                <i class="icon-attachment text-muted"></i>
                            </td>
                            <td class="table-inbox-time">
                                @php
                                    $created_at = \Carbon\Carbon::parse($message->created_at);
                                        echo $created_at->diffForHumans(\Carbon\Carbon::now());
                                @endphp
                            </td>
                        </tr>




                        @endforeach
                        @else
                            <tr>
                                <td class="bg-danger">No messages found!</td>
                            </tr>
                        @endif
            </tbody>
        </table>
    </div>
    <!-- /table -->

</div>
<!-- /single line -->