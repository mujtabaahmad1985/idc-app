<!-- Single line -->
<div class="card">
    <div class="card-header bg-transparent header-elements-inline">
        <h6 class="card-title">Sent</h6>


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


                </div>

                <div class="navbar-text ml-lg-auto"><span class="font-weight-semibold">1-50</span> of <span class="font-weight-semibold">528</span></div>

                <div class="ml-lg-3 mb-3 mb-lg-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-light btn-icon disabled"><i class="icon-arrow-left12"></i></button>
                        <button type="button" class="btn btn-light btn-icon"><i class="icon-arrow-right13"></i></button>
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

                        <tr>

                            <td class="table-inbox-checkbox rowlink-skip">
                                <input type="checkbox" class="form-input-styled" data-fouc>
                            </td>
                            <td class="table-inbox-star rowlink-skip">
                                <a href="javascript:;" class="read-message" data-message-id="{!! $message->id !!}">
                                    <i class="icon-star-empty3 text-muted"></i>
                                </a>
                            </td>
                            <td class="table-inbox-image">
                                <img src="/images/female.png" class="rounded-circle" width="32" height="32" alt="">
                            </td>
                            <td class="table-inbox-name">
                                <a href="javascript:;" class="read-message" data-message-id="{!! $message->id !!}">
                                    @if($message->receivers->role=="administrator")
                                        <div class="letter-icon-title text-default">{!! $message->receivers->name !!}</div>
                                    @elseif($message->receivers->role=="staff")

                                        <div class="letter-icon-title text-default">{!! $message->staff_users->first_name.' '.$message->staff_users->last_name !!}</div>
                                    @elseif($message->receivers->role=="doctor")
                                        <div class="letter-icon-title text-default">{!! $message->doctor_reciever->name !!}</div>
                                    @elseif($message->receivers->role=="patient")
                                        <div class="letter-icon-title text-default">{!! $message->patient_reciever->patient_name !!}</div>
                                    @endif
                                </a>
                            </td>
                            <td class="table-inbox-message">
                                <a href="javascript:;" class="read-message table-inbox-subject" data-message-id="{!! $message->id !!}">{!! $message->subject !!} &nbsp;-&nbsp;</a>
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