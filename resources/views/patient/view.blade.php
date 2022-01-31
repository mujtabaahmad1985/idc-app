@extends('layout.app')
@section('page-title') View Patient @endsection
@section('css')
    {!! Html::style('/material/js/plugins/dropify/css/dropify.min.css') !!}
    {!! Html::style('/material/css/file-explore.css') !!}
    {!! Html::style('/css/croppie.css') !!}
    {!! Html::style(url('/').'/bootstrap/js/plugins/x-editable/bootstrap3-editable/css/bootstrap-editable.css') !!}
    {!! Html::style(url('/').'/bootstrap/js/plugins/bootstrap-datepicker/css/datepicker.css') !!}
    {!! Html::style(url('/').'/bootstrap/assets/css/components.min.css') !!}
    {!! Html::style(url('/').'/bootstrap/js/plugins/magnific/magnific-popup.css') !!}
    <style>

        .img-preview {
            max-height: 3rem;
        }
        .editable.email ~ .editable-container input{ text-transform: lowercase !important;}
        li.folder{  padding: 10px 0 0 10px;}
        li.folder.active{
            background: #e8e7e7;

        }
        .card-header:not([class*=bg-]):not([class*=alpha-]) {
            padding-top: 0.225rem !important;
            padding-bottom: 0.225rem !important;
        }
        #treatment-records .card {
            margin-bottom: 0.325rem;
        }
        #treatment-records .card-header.justify-content-between {
            padding: .2375rem .4375rem;
        }
        .nav-link {
            padding: .625rem 0.925rem;
        }
        .border-left-danger {
            border-left-color: #f44336 !important;
        }
        .my-card-space{
            padding: 2px 1.25rem !important;
        }
        .document-title{

            white-space: nowrap !important;
            overflow: hidden !important;
            text-overflow: ellipsis !important;


        }
        .card-header.d-sm-flex{
            padding-right: 5px;
        }
        .edit-action-button, .add-action-button{
position: absolute;; right: 10px;
            top: 10px;
            z-index: 1;
        }
         .add-action-button{
             right: 27px;
             z-index: 1;

        }
        .top35{
            top:35px;
        }
        .topminus5{
         top:-5px;
        }
        .right10{
            right: 18px;
        }
        .no-position{
            position: relative;
            top: 0;
            margin-left: 21px;
        }
        li.folder.active .ml-3{
            display: block !important;
        }
        .tokenfield .token-input{ width: 100% !important; }
        #communication-form .tokenfield .token-input{ width: 100% !important; text-transform: lowercase !important;}
#communication-form .token-label{ text-transform: lowercase !important;}

    </style>
@endsection

@section('content')

    <!-- START CONTENT -->
    <div class="content profile-page">
        <div class="card card-body">
            <div class="media flex-column flex-sm-row">
                <div class="mr-sm-2 mb-2 mb-sm-0">
                    <div class="card-img-actions">
                        <a href="#">
                            @if(!empty($patient->profile_picture))
                                <img id="uploadedimage"  class="img-fluid img-preview rounded" src="{!! Storage::disk('images')->url($patient->profile_picture) !!}">
                            @else
                                <img id="uploadedimage"  class="img-fluid img-preview rounded" src="{!! url('/').'/img/no-user-image.gif' !!}">
                            @endif

                            <span class="card-img-actions-overlay card-img"><i class="icon-play3"></i></span>
                        </a>
                    </div>
                </div>

                <div class="media-body">
                    <h6 class="media-title">{!! $patient->salutation !!} {!! $patient->first_name !!} {!! $patient->last_name !!}</h6>
                    <ul class="list-inline list-inline-dotted text-muted mb-2">
                        <li class="list-inline-item"><i class="icon-key mr-1"></i> idcsg-{!! $patient->patient_unique_id !!}</li>
                        <li class="list-inline-item"><i class="icon-calendar2 mr-1"></i> {!! date('d.m.Y',strtotime($patient->created_at)) !!}</li>
                    </ul>
                </div>

                <div class="ml-3 align-self-center">
                    <div class="list-icons">
                        <div class="list-icons-item dropdown">
                            <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-trash"></i></a>
                            <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(16px, 16px, 0px);">
                                <a href="#" class="dropdown-item"><i class="icon-alarm-add"></i> Send Reminder</a>
                                <a href="#" class="dropdown-item"><i class="icon-mail5"></i> Send An Email</a>
                                <a href="#" class="dropdown-item"><i class="icon-trash"></i> Move to archive</a>
                                <div class="dropdown-divider"></div>
                                <a href="/patient/list" class="dropdown-item text-danger"><i class="icon-arrow-left8"></i> Back to Patient List</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">


                    <div class="card-body">
                        <ul class="nav nav-tabs nav-tabs-solid bg-danger-400 border-0">
                            <li class="nav-item"><a href="#biodata" class="nav-link active" data-toggle="tab" ><i class="icon-profile mr-1"></i> Biodate</a></li>
                            <li class="nav-item"><a href="#documents" data-item="documents" class="nav-link" data-toggle="tab"><i class="icon-book2 mr-1"></i> Documents</a></li>
                            <li class="nav-item"><a href="#appointments" data-item="patient-appoinments"  data-id="{!! $patient->id !!}"   class="nav-link" data-toggle="tab"><i class="icon-calendar2 mr-1"></i> Appointments</a></li>
                            <li class="nav-item"><a href="#treatment-records"  data-item="treatment-cards"  data-id="{!! $patient->id !!}"  class="nav-link" data-toggle="tab"><i class="icon-list3 mr-1"></i> Treatment Record</a></li>
                            <li class="nav-item"><a href="#payments" data-item="payments"  data-id="{!! $patient->id !!}"  class="nav-link" data-toggle="tab"><i class="icon-cash mr-1"></i> Payments</a></li>
                            <li class="nav-item"><a href="#refers" class="nav-link" data-toggle="tab" data-item="refers"  data-id="{!! $patient->id !!}"><i class="icon-users4 mr-1"></i> Refers</a></li>
                            <li class="nav-item"><a href="#communications" class="nav-link" data-toggle="tab"><i class="icon-comment mr-1"></i> Communications</a></li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="biodata">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a href="#personal-information" id="get-personal-biodata" class="nav-link active show" data-toggle="tab">Patient Biodata</a></li>
                                    <li class="nav-item"><a href="#update-information" class="nav-link" id="update-data" data-toggle="tab">Update Data</a></li>
                                    <li class="nav-item"><a href="#revised-information"   data-id="{!! $patient->id !!}"  class="nav-link revised-information" data-toggle="tab">Past Data</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="personal-information">
                                        <div class="row">
                                    <div class="col-sm-10">

                                        <div class="table-responsive">
                                            <table class="table table-borderless table-no-padding">
                                                <tbody>
                                                    <tr>
                                                        <td width="160px"><strong>Name: </strong></td>
                                                        <td>{!! $patient->salutation !!} {!! $patient->first_name !!} {!! $patient->last_name !!}</td>
                                                    </tr>

                                                    <tr>
                                                        <td><strong>Date of birth: </strong></td>
                                                        <td> @if(!empty($patient->date_of_birth))  {!! date('d.m.Y', strtotime($patient->date_of_birth)) !!}@endif</td>
                                                    </tr>
                                                    @if(in_array(44,$permissions_allowed) || Auth::user()->role=='administrator')
                                                    <tr>
                                                        <td><strong>Email: </strong></td>
                                                        <td><span class="email"> {!! $patient->patient_email !!}</span></td>
                                                         </td>
                                                    </tr>


                                                        <tr>
                                                            <td><strong>Phone: </strong></td>
                                                            <td>{!! $patient->patient_phone !!}</td>
                                                        </tr>

                                                    @if(!empty($patient->addresses[0]))
                                                        <tr>
                                                            <td><strong>Address: </strong></td>
                                                            <td>{!! $patient->addresses[0]->house_no !!},{!! $patient->addresses[0]->apartments_no !!},{!! $patient->addresses[0]->street_no !!},
                                                                {!! $patient->city !!}, {!! $patient->addresses[0]->country !!},{!! $patient->addresses[0]->zipcode !!} {{--@if(isset($patient->addresses[0]) && ($patient->addresses->count()) > 1) <a style=" height: 18px; line-height: 17px; font-size: 11px;
"  href="#!" class="btn red white-text view-all-address">Show all address</a>@endif--}} </td>
                                                        </tr>
                                                    @endif
                                                    @endif
                                                    <tr>
                                                        <td><strong>Gender: </strong></td>
                                                        <td>{!! $patient->gender !!}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Occupation: </strong></td>
                                                        <td>{!! $patient->occupation !!}</td>
                                                    </tr>


                                                    <tr>
                                                        <td><strong>Company: </strong></td>
                                                        <td>{!! $patient->comapny_name !!}</td>
                                                    </tr>

                                                </tbody>

                                        </table>
                                        </div>



                                        <hr />
                                        <h5>Referral and Insurance Information</h5>
                                        <div class="table-responsive">
                                          <table class="table table-borderless table-no-padding">

                                                    <tbody>
                                                    <tr>
                                                        <td width="160px"><strong>Referral: </strong></td>

                                                        <td>@if((isset($referral) && !is_null($referral) && !empty($referral)) || !empty($patient->referral_name))
                                                                @if(isset($referral) && !is_null($referral) && !empty($referral))
                                                                    {{ $referral->patient_unique_id}} - {{ $referral->patient_name}}
                                                                @endif
                                                                @if(!empty($patient->referral_name))
                                                                    {{ $patient->referral_name}}
                                                                @endif
                                                            @else
                                                                <span class="red-text">Referral : No Information found</span>
                                                            @endif</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Insurance By: </strong></td>
                                                        <td> @if(!empty($patient->insurance_by) && !empty($patient->insurance_number))
                                                                {{ $patient->insurance_by }} - {{ $patient->insurance_number }}
                                                            @else
                                                                <span class="text-danger">No information found</span>
                                                            @endif</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                        </div>

                                        <hr />
                                        <h5>Medical  Information</h5>
                                        @php
                                            $medi = '';
                                        if(isset($medical->illness) && !is_null($medical->illness)){
                                        $m = json_decode($medical->illness);
                                         if(is_array($m)){
                                       $medi = isset($medical->illness) && !is_null($medical->illness) && !empty($medical->illness)?implode(', ',json_decode($medical->illness)):'<span class="red-text">No disease found!</span>';


                                         }
                                         }



                                        @endphp
                                        <div class="table-responsive">
                                            <table class="table table-borderless table-no-padding">

                                                <tbody>
                                                <tr>
                                                    <td width="160px"><strong>Medications: </strong></td>

                                                    <td>{!! isset($medical->medication) && !is_null($medical->medication)?$medical->medication:'<span class="text-danger">None!</span>' !!}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Allergies: </strong></td>
                                                    <td> {!! isset($medical->allegric) && !is_null($medical->allegric)?$medical->allegric:'<span class="text-danger">None!</span>' !!}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Medical Conditions: </strong></td>
                                                    <td> @if(!empty($medi)) {!! str_replace('_',' ',$medi) !!} @else <span class="text-danger">None!</span> @endif</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>


                                        <hr />
                                        <h5>Medical  History</h5>
                                        <div class="table-responsive">
                                            <table class="table table-borderless table-no-padding">

                                                <tbody>
                                                <tr>
                                                    <td width="160px"><strong>Medical History: </strong></td>

                                                    <td>{!! str_replace('_',' ',$history) !!}</td>
                                                </tr>

                                                </tbody>
                                            </table>
                                        </div>


                                    </div>
                                    </div>
                                    </div>
                                    <div class="tab-pane fade" id="update-information"></div>
                                    <div class="tab-pane fade" id="revised-information"></div>
                                </div>
                            </div>
                                <div class="tab-pane fade" id="documents">

                                </div>

                                <div class="tab-pane fade" id="appointments">

                                </div>

                                <div class="tab-pane fade" id="treatment-records">

                                </div>

                            <div class="tab-pane fade" id="payments">
                            </div>
                            <div class="tab-pane fade" id="refers">

                            </div>
                            <div class="tab-pane fade" id="communications">
                                <p class="font-weight-semibold">Patient Communication</p>

                                <form id="communication-form" method="POST" action="/save/communication" enctype="multipart/form-data">
                                    @csrf
                                <input type="hidden" value="{!! $patient->id !!}" name="patient_id" />
                                <table class="table table-stripped">
                                    <tr>
                                        <td width="200px">
                                            <div class="custom-control custom-switch mb-2">
                                                <input type="checkbox" class="custom-control-input" id="sc_ls_c" checked=>
                                                <label class="custom-control-label" for="sc_ls_c">Email</label>
                                            </div>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control tokenfield email" name="emails" value="{!! $patient->patient_email !!}" />
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="sc_ls_u" checked>
                                                <label class="custom-control-label" for="sc_ls_u">Whatsapp</label>
                                            </div>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control tokenfield" name="whatsapp" />
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="custom-control custom-switch mb-2">
                                                <input type="checkbox" class="custom-control-input" id="sc_ls_cd" checked>
                                                <label class="custom-control-label" for="sc_ls_cd">SMS</label>
                                            </div>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control tokenfield"   value="{!! $patient->patient_phone !!}"  name="sms" />
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="sc_ls_ud" checked>
                                                <label class="custom-control-label" for="sc_ls_ud">Phone Call</label>
                                            </div>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control tokenfield" value="{!! $patient->patient_phone !!}" name="phone_call" />
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="2">
                                            <a href="#!" class="save-communication btn btn-danger">Save Communication</a>
                                        </td>
                                    </tr>


                                </table>

                                </form>
                            </div>

                        </div>

                    </div>

                </div>
            </div>



    </div>

    </div>

    <div id="get-revised-data-by-id" class="modal fade">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">

            </div>


        </div>
    </div>
    </div>
    <div id="appointment-show-detail" class="modal fade">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Appointment's Detail</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <div id="show-appointment">
                        <div class="progress"> <div class="indeterminate"></div></div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <div id="appointment-edit-detail" class="modal fade">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Appointment</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <div id="edit-appointment">
                        <div class="progress"> <div class="indeterminate"></div></div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <div id="appointment-reminder" class="modal fade">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Send Reminder</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">

                    <form id="send-reminder-form" method="POST" action="/send/appointment/reminder" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="patient_id" id="communication-patient-id" />
                        <input type="hidden" name="appointment_id" id="communication-appointment-id" />


                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" value="emails" id="c-email"  >
                                <label class="custom-control-label" for="c-email">Email</label>
                            </div>
                        </li>

                        <li class="list-inline-item">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" value="sms" id="c-sms"  >
                                <label class="custom-control-label" for="c-sms">SMS</label>
                            </div>
                        </li>

                        <li class="list-inline-item">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" value="whatsapp" id="c-whatsapp"  >
                                <label class="custom-control-label" for="c-whatsapp">Whatsapp</label>
                            </div>
                        </li>




                    </ul>
                    </form>
                    <a href="#!" class="btn btn-danger send-reminder-notifications">Send Reminder</a>
                </div>


            </div>
        </div>
    </div>


    <div id="add-new-folder" class="modal fade">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Folder</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form class="" id="folder-form" action="/create/folder" method="post" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <input type="hidden" name="patient_id" value="{!! $patient->id !!}" />
                        <input type="hidden" name="folder_id" value="" />
                    <div class="form-group">
                        <label>Title</label>
                        <input id="add_new_folder" name="add_new_folder" value="" required class="form-control">
                    </div>
                </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn bg-primary save-new-folder">Save</button>
                </div>


            </div>
        </div>
    </div>

    <div id="add-new-file" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Upload File to <span id="folder-name"></span></h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                   <div id="can-upload" style="display: none">
                       <div class="file-uploader"><span>Your browser doesn't have Flash installed.</span></div>
                   </div>
                    <div id="cannot-upload">
                        <p class="text-danger-600">Please select any folder before uploading.</p>
                    </div>

                </div>




            </div>
        </div>
    </div>

    <div id="edit-patient" class="modal fade">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Patient</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form class="" id="update-patient-form" action="/update/treatment/patient/update" method="post" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <input type="hidden" name="patient_id" value="{!! $patient->id !!}" />
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <label>Salutation</label>
                                <select name="salutation" class="select2 form-control">
                                    <option value="Mr">Mr</option>
                                    <option value="Mrs">Mrs</option>
                                    <option value="Miss">Miss</option>
                                    <option value="Dr">Dr</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <input id="first_name" name="first_name" type="text"    required  class="alphanumaric long-value-restriction form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input id="last_name" name="last_name" type="text"    required  class="alphanumaric long-value-restriction form-control">
                                </div>
                            </div>
                        </div>




                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="last_name">Date of Birth</label>
                                    <select name="day" id="day-date-of-birth" required>
                                        <option value=""> Day</option>
                                        @for($m=1; $m<=31; ++$m)
                                            <option value="{!! $m !!}">{!! $m !!}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="month-date-of-birth" style="visibility: hidden" class="">Date of Birth </label>
                                    <select name="month" id="month-date-of-birth" required>
                                        <option value=""> Month</option>
                                        @for($m=1; $m<=12; ++$m)
                                            <option value="{!! $m !!}">{!!  date('F', mktime(0, 0, 0, $m, 1)) !!}</option>
                                        @endfor
                                    </select>

                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="year-date-of-birth" style="visibility: hidden" class="">Date of Birth </label>
                                    <select name="year" id="year-date-of-birth" required>
                                        <option value="">Year</option>
                                        @for($i=2016; $i>=1910; $i--)
                                            <option value="{!! $i !!}">{!! $i !!}</option>
                                        @endfor
                                    </select>

                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="last_name">Card Type</label>
                                    <select class="icons" name="card_type"  >
                                        {{--<option value="">Choose Card Type</option>--}}
                                        <option value="IC Number">IC Number</option>
                                        <option value="FIN Number">FIN Number</option>
                                        <option value="Passport Number">PASSPORT Number</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label for="last_name">Card Number</label>
                                    <input id="card_number" name="card_number" placeholder="IC Number" type="text" class="alphanumaric form-control">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="last_name">Patient Type</label>
                                    <select class="form-control multiselect-link patient-flags"
                                            data-button-width="500" multiple="multiple" data-fouc>
                                        @if(isset($flags))
                                            @foreach($flags as $f)
                                                <option value="{!! $f->id !!}" @if(in_array($f->id,$patient_flags_ids)) selected @endif data-color="{!! $f->color !!}">{!! $f->name !!}</option>
                                            @endforeach
                                        @endif

                                    </select>
                                </div>
                            </div>

                        </div>

                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn bg-primary update-patient">Save</button>
                </div>


            </div>
        </div>
    </div>

    @endsection

@section('js')
    {!! Html::script('public/js/jquery.form.js') !!}
    {!! Html::script('public/plugins/jquery.validate/js/jquery.validate.min.js') !!}
    {!! Html::script('/public/material/js/file-explore.js') !!}
    {!! Html::script('public/material/plugins/select2/js/select2.min.js') !!}
    {!! Html::script('public/js/croppie.js') !!}
    {!! Html::script('public/js/jquery-ui.js') !!}
    {!! Html::script('public/material/js/plugins/fullcalendar/lib/moment.min.js') !!}
    {!! Html::script(url('/').'/bootstrap/js/plugins/x-editable/bootstrap3-editable/js/bootstrap-editable.js') !!}
    {!! Html::script(url('/').'/bootstrap/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') !!}
    {!! Html::script(url('/').'/bootstrap/js/plugins/forms/selects/bootstrap_multiselect.js') !!}
    {!! Html::script(url('/').'/bootstrap/js/plugins/pickers/color/spectrum.js') !!}
    {!! Html::script(url('/').'/bootstrap/js/plugins/uploaders/plupload/plupload.full.min.js') !!}
    {!! Html::script(url('/').'/bootstrap/js/plugins/uploaders/plupload/plupload.queue.min.js') !!}
    {!! Html::script(url('/').'/bootstrap/js/plugins/uploaders/fileinput/plugins/purify.min.js') !!}
    {!! Html::script(url('/').'/bootstrap/js/plugins/forms/tags/tagsinput.min.js') !!}
    {!! Html::script(url('/').'/bootstrap/js/plugins/forms/tags/tokenfield.min.js') !!}
    {!! Html::script(url('/').'/bootstrap/js/plugins/loaders/blockui.min.js') !!}
    {!! Html::script(url('/').'/bootstrap/js/plugins/visualization/echarts/echarts.min.js') !!}
    {!! Html::script('public/material/js/jquery.timepicker.min.js') !!}
    {!! Html::script(url('/').'/bootstrap/js/plugins/magnific/jquery.magnific-popup.js') !!}
    <script>
        var folder_id = 0;
        var selected_session_id = 0;
        function patient_result_template(patient){

            if(patient.id > 0)
                var $patient = $('<div class="patient-container">'+
                    '<div class="avatar"><img src="/public/img/user.svg" alt="user"></div>'+
                    '<div class="patient-info">'+
                    '<h4>'+patient.text+'</h4>'+
                    '<p class="inner-text"><i class="material-icons prefix">fingerprint</i> '+patient.patient_unique_id+'  '+
                    '<i class="material-icons prefix" style="margin-left: 20px">contact_phone</i> '+patient.patient_phone+'</p>'+
                    '</div>'+
                    '</div>');
            else
                var $patient = patient.text;
            return $patient;
        }
        $(function(){
            $('.tokenfield').tokenfield();
            $("select").select2();
            $("body").on("click",".save-communication",function(){
                $("#communication-form").ajaxForm().submit();
            });
            $("body").on("click",".save-invoice",function(){
                if($("#invoice-form").valid()){
                    $("#invoice-form").ajaxForm(function(response){
                        response = $.parseJSON(response);

                        if(response.type=="success"){
                            $(".alert-success-invoice").html(response.message);
                            $(".alert-success-invoice").show();

                            setTimeout(function(){
                                $(".alert-success-invoice").hide();
                                $("#add-invoice").modal('hide');
                            },2000);
                        }else{
                            $(".alert-error-invoice").html(response.message);
                            $(".alert-error-invoice").show();
                        }

                    }).submit();
                }
            });

            $("body").on('click','.pdf-treatment-card',function(){
                var patient_id = "{!! $patient->id !!}";
                window.location.href = "/patient/treatment-card/pdf/"+patient_id;
            });

            $("body").on("click",".payment-options a",function(){
                var option = $(this).data('option');
                $(".payment-name").html(option);
                $("input[name=paymeny_via]").val(option);
                $("input[name=other_payment_info]").val('');
                $("input[name=other_payment_info]").hide();
                $("input[name=other_payment_info]").removeAttr('required');
                switch(option){
                    case "Insurance":
                        var insurance = $(this).data('value');
                        $("input[name=other_payment_info]").val(insurance);
                        $("input[name=other_payment_info]").attr('required','required');
                        $("input[name=other_payment_info]").attr('placeholder','Enter Insurance reference');
                        $("input[name=other_payment_info]").show();

                        break;
                    case "Credit Card":
                    case "Bank Transfer":
                        $("input[name=other_payment_info]").attr('required','required');
                        $("input[name=other_payment_info]").attr('placeholder','Enter reference number');
                        $("input[name=other_payment_info]").show();
                        break;
                }

            });

            $("body").on("click",".download-session-items",function(){

                var appointment_id = $(this).data('appointment-id');

                window.location.href = "/download/invoice/"+appointment_id

            });

            $("body").on("click",".delete-session",function(){

                var session_id = $(this).data('id');
                var _this = $(this);


              $.ajax({
                  url:"/sessions/delete/"+session_id,
                  success:function(){
                      _this.parents('.card.border-left-danger').remove();
                  }
              });

            });

            $("body").on('click','.edit-session',function(){
                var id = $(this).data('id');
                $("#add-new-session").modal();
                $.ajax({
                    url:"/edit/session/"+id,
                    success:function(response){
                        $("#add-new-session .modal-body").html(response);
                    }
                });
            });

            $("body").on('click','.make-payments',function(){
                var appointment_id = $(this).data('id');
                $("#add-invoice").find(".modal-body").html('');
                $("#add-invoice").modal();
                $.ajax({
                    url:"/generate/invoice",
                    type:"POST",
                    data:{
                        appointment_id:appointment_id,
                        patient_id: "{!! $patient->id !!}",
                        '_token':"{!! csrf_token() !!}",

                    },
                    success:function(response){
                        $("#add-invoice").find(".modal-body").html(response);
                        $(".download-session-items").attr('data-appointment-id',appointment_id);
                    }
                });
            });

            $("body").on('click','.save-session-items',function(){
                $("#item-form").ajaxForm(function(response){
                        response = $.parseJSON(response);

                        if(response.type="success"){
                            $(".alert-success-session-item-done").html(response.message);
                            $(".alert-success-session-item-done").show();

                            $.ajax({
                                url:"/view/section/template",
                                type:"POST",
                                data:{
                                    appointment_id:response.appointment_id,
                                    patient_id: "{!! $patient->id !!}",
                                    '_token':"{!! csrf_token() !!}",

                                },
                                success:function(response){
                                    _select_appointment_section.find(".view-treatment-session").html(response);
                                }
                            });

                            setTimeout(function(){

                                $("#add-session-items").modal('hide');
                                $("#session-items").val(null).trigger('change');
                                $("#view-item-selection").html('');
                                $(".alert-success-session-item-done").hide();
                            },2000);

                        }
                }).submit();
            });

            $("body").on('change','.item_quantity',function(){
                var value = $(this).val();
                var price_unit = $(this).parents('tr').find('.price-unit').data('price');
                var discount = $(this).parents('tr').find('.item_discount').val();
                var balance = (value * price_unit)-discount;
                balance = balance.toFixed(2);
                $(this).parents('tr').find('.item-balance').html("$"+balance);
            });

            $("body").on('change','.item_discount',function(){
                var value = $(this).val();
                var price_unit = $(this).parents('tr').find('.price-unit').data('price');
                var quantity = $(this).parents('tr').find('.item_quantity').val();
                var balance = (quantity * price_unit)-value;
                balance = balance.toFixed(2);
                $(this).parents('tr').find('.item-balance').html("$"+balance);
            });

            $("body").on('click','.add-items',function(){
                $("#session-items").val(null).trigger('change');
                $("#view-item-selection").html('');
                selected_session_id = $(this).data('session-id');

                $.ajax({
                    url:"/check/existing/items/"+selected_session_id,
                    success:function(response){
                        if(response!=""){
                            response = $.parseJSON(response);

                            if(response){
                                $.each(response, function(i,v){
                                    var new_option = new Option(v.text, v.id, true, true);
                                    $("#session-items").append(new_option);
                                });

                                setTimeout(function(){
                                    $("#session-items").trigger('change');
                                },700);
                            }
                        }
                    }
                });

                $("#add-session-items").modal();
            });

            $("body").on("click",'.edit-history',function(){
              var id = $(this).data('id');
              $("#add-new-medical-history").modal();

              $.ajax({
                  url:"/get/medical/history/"+id,
                  success:function(response){
                      response = $.parseJSON(response);
                  }
              });

            });
            var _selected_appointment = null;
            $("body").on("click",'.add-new-treatment',function(){
                _selected_appointment = $(this).parents('.appointment-sections');
                $("#save-new-treatment").resetForm();
                var appointment_id = $(this).data('id');
                $("#save-new-treatment input[name=appointment_id]").val(appointment_id);
                $("#add-new-treatment").modal();
            });

            $("body").on("click",'.add-new-session',function(){
                _selected_appointment = $(this).parents('.appointment-sections');
                var appointment_id = $(this).data('id');
                $.ajax({
                    url:'/load/section/template',
                    type:'POST',
                    data:{
                      '_token':"{!! csrf_token() !!}",
                      patient_id:  "{!! $patient->id !!}",
                      appointment_id:appointment_id
                    },
                    success:function(response){
                        $("#add-new-session .modal-body").html(response);
                        $("#session-form").resetForm();
                        $("#session-form input[name=patient_id]").val("{!! $patient->id !!}");
                        $("#session-form input[name=appointment_id]").val(appointment_id);
                        $("#add-new-session").modal();
                    }
                });


            });

            $("body").on("click",'.save-new-treatment',function(){
                var _this = $(this);
                if($("#save-new-treatment").valid()){
                    $("#save-new-treatment").ajaxForm(function(response){
                        response = $.parseJSON(response);

                        if(response.type="success"){
                            $(".alert-success-treatment-done").html(response.message);
                            $(".alert-success-treatment-done").show();
                            var str=  "";
                            var existing_records = $.each(response.data.existing_records,function(i,v){
                                str+='<li '+v.id+'  class="mb-2"><i class="icon-arrow-right13 mr-2"></i> '+v.treatment_description+'' +
                                    '<a href="#!" style="padding:2px" class="badge text-danger  delete-treatment ml-2"  data-id="'+v.id+'"><i class="icon-trash font-size-xs"></i> </a>' +
                                    '</li>';

                            });
                            _selected_appointment.find(".treatment-done-list").html(str);
                            $("#add-new-treatment").modal('hide');
                        }
                    }).submit();
                }
            });


            $("body").on("click",'.delete-history',function(){
                var id = $(this).data('id');
                var _this = $(this);

                bootbox.confirm({
                    title: 'Confirmation',
                    message: 'Do you want delete?.',
                    buttons: {
                        confirm: {
                            label: 'Yes',
                            className: 'btn-primary'
                        },
                        cancel: {
                            label: 'Cancel',
                            className: 'btn-link'
                        }
                    },
                    callback: function (result) {
                        if(result){
                            $.ajax({
                                url:"/delete/medical/history/"+id,
                                success:function(){
                                    _this.parents('.list-feed-item').remove();
                                }
                            });
                        }

                    }
                });

            });

            $("body").on("click",'.delete-treatment',function(){
                var _this = $(this);
                var id = $(this).data('id');
                bootbox.confirm({
                    title: 'Confirmation',
                    message: 'Do you want delete?.',
                    buttons: {
                        confirm: {
                            label: 'Yes',
                            className: 'btn-primary'
                        },
                        cancel: {
                            label: 'Cancel',
                            className: 'btn-link'
                        }
                    },
                    callback: function (result) {
                        if(result){
                            $.ajax({
                                url:"/delete/treatment/done/"+id,
                                success:function(){
                                    _this.parent().remove();
                                }
                            });
                        }

                    }
                });
            });

            $("body").on("click",'.add-new-allergy',function(){
                $(this).hide();
                $(".save-new-allergy").show();
                $("#new-drug-allergy").show();
            });

            $("body").on("click",'.save-new-allergy',function(){

                if($("#drug-allergy-form").valid()){
                    $("#drug-allergy-form").ajaxForm(function (response) {

                        response = $.parseJSON(response);

                        var newOption = new Option(response.name, response.id, true, true);
                        // Append it to the select
                        $('#more-allergy').append(newOption).trigger('change');
                        $("#add-drug-allergy").modal('hide');
                    }).submit();
                }
            });

            $("body").on('click','.edit-folder',function(e){
                var id = $(this).data('id');
                var name = $(this).parents('.folder').find('.media-title').text();
                $("#add_new_folder").val(name);
                $("#add-new-folder").modal();
                $("input[name=folder_id]").val(id);
                e.stopPropagation();
            });

            $("body").on('click','.delete-folder',function(e){
                var id = $(this).data('id');
                var _this = $(this);
                bootbox.confirm({
                    title: 'Confirmation',
                    message: 'Do you want delete?.',
                    buttons: {
                        confirm: {
                            label: 'Yes',
                            className: 'btn-primary'
                        },
                        cancel: {
                            label: 'Cancel',
                            className: 'btn-link'
                        }
                    },
                    callback: function (result) {
                        if(result){
                            $.ajax({
                                url:"/delete/folder/"+id,
                                success:function(){
                                    _this.parents('li.folder').remove();
                                }
                            });
                        }

                    }
                });




                e.stopPropagation();
            });
            $("body").on('click','.delete-file',function(e){
                var id = $(this).data('id');
                var _this = $(this);
                bootbox.confirm({
                    title: 'Confirmation',
                    message: 'Do you want delete?.',
                    buttons: {
                        confirm: {
                            label: 'Yes',
                            className: 'btn-primary'
                        },
                        cancel: {
                            label: 'Cancel',
                            className: 'btn-link'
                        }
                    },
                    callback: function (result) {
                        if(result){
                            $.ajax({
                                url:"/delete/document/"+id,
                                success:function(){
                                    _this.parents('.file-box').remove();
                                }
                            });
                        }

                    }
                });




                e.stopPropagation();
            });


            $("body").on('click','.save',function(){
                var _value =$("#drug-allergies-field").val();

                if(_value.trim()==""){
                    $("#drug-allergies-field").focus();
                    return;
                }



                $.ajax({
                    url:'/save/allergy',
                    type:'Post',
                    data:{"_token":"{!! csrf_token() !!}",value:_value},
                    success:function(response){
                        $(".overlay .progress").hide();
                        $(".overlay").hide();

                        $.ajax({
                            url:'/get/allergies',
                            success:function(response){
                                $("#drug-allergies-section").html(response);
                            }
                        });

                    }
                });

            });
            $("body").on('click','.delete-allergy',function(){
                var id = $(this).attr('data-id');
                var _this = $(this);
                $.ajax({
                    url :"/patient/drug/delete/"+id,
                    success:function(){
                        _this.parents('tr').remove();
                    }

                });


            });
            $('.patient-flags').select2('destroy');
            $('.patient-flags').multiselect({
                buttonClass: 'btn btn-link',
                numberDisplayed: 8,
                onChange: function () {



                    var selectedOptions = jQuery('.patient-flags option:selected');
                    var _value = [];;

                    var str = "";
                    $.each(selectedOptions, function () {

                        str += '<li><i class="icon-flag7" style="color: ' + $(this).attr('data-color') + '"></i> </li>';
                        _value.push($(this).val());
                    });

                    $.ajax({
                        url:"/save/patient/flags",
                        data:{patient_id:"{!! $patient->id !!}",flags:_value,"_token":"{!! csrf_token() !!}"},
                        type:"POST",
                        success:function(response){

                        }
                    });

                    $("#selected-flags").html(str);
                }


            });

            $(".update-patient").click(function(){
                if($("#update-patient-form").valid()){
                    $("#update-patient-form").ajaxForm(function(){
                        $("#edit-patient").modal('hide');
                        var patient_id = "{!! $patient->id !!}";
                        $.ajax({
                            url:"/view/treatment-card/"+patient_id,
                            success:function(response){
                                $("#treatment-records").html(response);
                                $(".overlay").hide();

                            }
                        });
                    }).submit();
                }
            });

            $("body").on('click','.edit-action-button',function(){
                var action = $(this).data('action');
                var patient_id = "{!! $patient->id !!}";

                switch (action) {
                    case 'edit-patient':

                        $("#edit-patient").modal();
                        $.ajax({
                            url:"/get/patient/info/"+patient_id,
                            success:function (response) {
                                response = $.parseJSON(response);
                                $("select[name=salutation]").val(response.salutation).trigger('change');
                                $("select[name=card_type]").val(response.card_type).trigger('change');
                                var date_of_birth = response.date_of_birth?response.date_of_birth.split('-'):null;
                                if(date_of_birth){
                                    $("#day-date-of-birth").val(date_of_birth[2].replace('0',''));
                                    $("#day-date-of-birth").trigger('change')

                                    $("#month-date-of-birth").val(date_of_birth[1].replace('0',''));
                                    $("#year-date-of-birth").val(date_of_birth[0]);
                                    $("#year-date-of-birth").trigger('change')
                                }

                                $("#first_name").val(response.first_name);
                                $("#last_name").val(response.last_name);
                                $("#card_number").val(response.card_number);
                            }
                        });
                    break;
                    case "current-medications":
                        $("#add-current-medications").modal();
                    break;
                }
            });

            $("body").on('click','.add-action-button',function(){
                var action = $(this).data('action');
                switch(action){
                    case "add-allergy":
                        $("#new-drug-allergy").hide();
                        $(".save-new-allergy").hide();
                        $(".add-new-allergy").show();
                        $("#add-drug-allergy").modal();
                        break;
                    case "add-new-medical-history":
                        $("#add-new-medical-history").modal();
                    break;
                }

            });



            $(".form-control-datepicker").remove();

            $("body").on('click','.add-new-folder',function(){
                $("#add-new-folder").modal();
            });

            $("body").on('click','.upload-document',function(){
                if(folder_id > 0){

                    $("#cannot-upload").hide();
                    $("#can-upload").show();
                    var folder_name = $("li.folder.active .media-title").text();
                    $("#folder-name").text(folder_name);
                    $('.file-uploader').pluploadQueue({
                        runtimes: 'html5, html4, Flash, Silverlight',
                        url: '/upload/documents',

                        unique_names: true,
                        header: true,
                        filters: {
                            max_file_size: '10mb',
                            mime_types: [
                                {
                                title: 'Image files',
                                extensions: 'jpg,gif,png'
                                },
                                {
                                    title:"Zip File",
                                    extensions:'zip'

                                },
                                {
                                    title:'Media Files',
                                    extensions:'mp4,avi'
                                },
                                {
                                    title:'Document Files',
                                    extensions:'xls,xlsx,doc,docx,pdf,txt'
                                }
                            ]
                        },

                        multipart_params : {
                            "folder_id" : folder_id,
                            "patient_id" : "{!! $patient->id !!}",
                            "_token":"{!! csrf_token() !!}",
                        }

                    });
                }else{
                    $("#cannot-upload").show();
                    $("#can-upload").hide();

                }

                $("#add-new-file").modal();
            });

            $("body").on('click','li.folder',function(){
                folder_id = $(this).data('id');

                $("li.folder").removeClass('active');
                $(this).addClass('active');

                $.ajax({
                    url:"/get/files",
                    type:"POST",
                    data:{
                        "_token":"{!! csrf_token() !!}",
                        patient_id:"{!! $patient->id !!}",
                        folder_id:folder_id
                    },
                    success:function(response){
                            $(".document-files").html(response);
                    }

                })
            });



            $("body").on('click','.appointment-actions',function(){
                var action = $(this).data('action');
                var appointment_id = $(this).data('id');
                switch (action) {
                    case "view":
                        $("#appointment-show-detail").modal();


                        // $("#patient-appointment").animate({right:'0'});
                        // $("#patient-appointment").html('<div class="progress"> <div class="indeterminate"></div></div>');
                        // return;
                        $.ajax({
                            url:"/show/appointment/"+appointment_id+"?type=view",
                            success: function(doc){
                                $("#show-appointment").html(doc);
                                $("#show-appointment .list-icons").remove();


                            }
                        });
                        break;
                    case "reschedule":

                        $("#appointment-edit-detail").modal();
                        $.ajax({
                            url:"/appointment/edit/"+appointment_id,
                            success:function(response){
                                $("#edit-appointment").html(response);
                                $("#edit-patient-name").html("Edit Appointment");
                            }
                        });
                        break;
                    case "send-reminder":
                        var p = $(this).data("patient-id");
                        var a = $(this).data("id");


                        $("#communication-patient-id").val(p);
                        $("#communication-appointment-id").val(a);
                        $("#appointment-reminder").modal();
                        break;
                }
            });

           $.fn.editable.defaults.mode = 'inline';
            $('.editable').editable();
            $("#update-data").click(function(){
                var patient_id = "{!! $patient->id !!}";

                $.ajax({
                    url:'/patient/edit/'+patient_id,
                    success:function(response){
                        $("#update-information").html(response);
                    }
                });
            });





            $(".view-all-address").click(function(){
                $("#show-address").modal('open');
            });

            $("#get-medical-history").click(function(){
                if(!$(this).hasClass('active')) {
                    var patient_id = "{!! $patient->id !!}";
                    $(".overlay").show();
                    $(".overlay .progress").show();
                    $(".overlay .message").html('');
                    $.ajax({
                        url: "/show/profile/medical-history/" + patient_id,
                        success: function (response) {
                            $(".overlay .progress").hide();
                            $(".overlay").hide();

                            $("#medical-history-section").html(response);
                        }
                    });
                }
            });

            $("body").on("click",".send-reminder-notifications",function(e){

                $("#send-reminder-form").ajaxForm(function(response){

                }).submit();

                e.preventDefault();
                e.stopPropagation();
            });

            $("#get-personal-biodata").click(function(){
                var patient_id = "{!! $patient->id !!}";
                $(".overlay").show();
                $(".overlay .progress").show();
                $(".overlay .message").html('Loading...');
                $.ajax({
                    url:"/show/patient/bio-data/"+patient_id,
                    success:function (response) {
                        $(".overlay .progress").hide();
                        $(".overlay").hide();

                        $("#personal-information").html(response);
                    }
                });
            });



            $('.add-new-treatment-card').click(function(){
                $("#add-treatment-modal").modal({
                    dismissible: true, // Modal can be dismissed by clicking outside of the modal
                    opacity: .5, // Opacity of modal background
                    inDuration: 300, // Transition in duration
                    outDuration: 200, // Transition out duration
                    startingTop: '4%', // Starting top style attribute
                    endingTop: '10%', // Ending top style attribute

                    complete: function() {
                        $(".overlay").show();
                        $("#patient-treatment-card .modal-content .patient-result").html('<div class="progress"> <div class="indeterminate"></div></div>');

                        $.ajax({
                            url:"/patient/treatment-cards/"+patient_id,
                            success:function(response){
                                $(".overlay").hide();
                                $("#patient-treatment-card .modal-content .patient-result").html(response);
                            }
                        });
                    } // Callback for Modal close
                });
                $("#add-treatment-modal").modal('open');
                var patient_id = "{!! $patient->id !!}";
                $.ajax({
                    url:"/treatment/card",
                    success:function (response) {
                        $("#treatment-card").html(response);
                        $("#treatment-card input[name=patient_id]").val(patient_id);

                    }
                });
            });
$("body").on('click','.save-new-session',function(){


                $(".message").hide();

                if($("#session-form").valid()){

                    $("#session-form").ajaxForm(function(response){
                        var patient_id = "{!! $patient->id !!}";
                    response = $.parseJSON(response);
                    if(response.type=='success'){
                        $(".message.success-message").html(response.message);
                        $(".message.success-message").show();

                        $.ajax({
                            url:'/get/sessions/'+patient_id,
                            success:function (response) {
                                $(".overlay .progress").hide();
                                $(".overlay").hide();
                                $('#sessions-information').html(response);
                            }
                        });

                        setTimeout(function(){
                            $(".message.success-message").hide();
                            $("#add-new-session").modal('hide');
                            $(".appointment-sections a[data-toggle=collapse]").trigger('click');
                        },2500);

                    }else{
                        $(".message.error-message").html(response.message);
                        $(".message.error-message").show();
                    }
                    }).submit();
                }

            });
            $(".add-new-session").click(function(){
                $("#session-form").ajaxForm().clearForm();
                $("#add-new-session").modal('open');
            });

            $(".upload-new-document").click(function(e){
                if($("#document-form").valid()){

                    $(".overlay").show();
                    $(".overlay .progress").show();
                    $(".overlay .message").hide();

                    $("#document-form").ajaxForm(function(response){
                        response = $.parseJSON(response);
                        if(response.id > 0){
                            $(".success-message p").html('Document is uploaded successfully');
                            $(".success-message").show();
                            $(".overlay .progress").hide();
                            $(".overlay .message").show();

                            setTimeout(function(){
                                $("#add-new-document").modal('close');
                                $(".overlay").hide();
                                location.reload();
                            },2000);
                        }
                    }).submit();
                }
                e.preventDefault();

            });

            $(".save-new-directory").click(function(){
                var add_new_folder = $("input[name=add_new_directory]").val();
                if(add_new_folder!=""){
                    var staff_id = "{!! Auth::id() !!}";
                    $(".message").hide();
                    $.ajax({
                        url:'/create/directory',
                        type:'post',
                        data:{"_token":"{!! csrf_token() !!}",patient_id:"{!! $patient->id !!}",add_new_folder:add_new_folder},
                        success:function (response) {
                            response = $.parseJSON(response);

                            if(response.type=="success"){
                                $(".success-message  p").html(response.message);
                                $(".success-message").show();

                                var newOption = new Option(response.data.name, response.data.id, true, true);

                               // $(".file-tree").filetree();
                                $('#folder').append(newOption).trigger('change');
                                $(".file-tree").append('<li><a href="#">'+response.data.text+'</a><ul></ul></li>');
                                $(".file-tree").filetree({
                                    collapsed: true,

                                });

                                 setTimeout(function(){
                                    $(".success-message").hide();
                                    $("#add-new-directory").modal('close');
                                },2000);
                            }else{
                                $(".error-message > p").html(response.message);
                                $(".error-message").show();
                            }
                        }
                    });
                }else{
                    $("input[name=add_new_folder]").focus();
                }

            });

            $(".show-address").click(function () {
                $("#show-address").modal('open');
                ;
            });

            $(".upload-documents").click(function(){
                $("#upload-document").modal('open');
            });

            $("#month-date-of-birth").select2().change(function(){
                var year = $("#year-date-of-birth").val();
                var days = new Date(year, $(this).val(), 0).getDate();
                // $("#day-date-of-birth").select2('destroy');
                $("#day-date-of-birth").html('');
                for(var i=1;i<=days;i++){
                    var data = {
                        id: i,
                        text: i
                    };

                    var newOption = new Option(data.text, data.id, false, false);
                    $('#day-date-of-birth').append(newOption).trigger('change');

                }
                //$("#day-date-of-birth").select2();
            });

            $(".set_as_main").on('change',function(){
                var id = ($(this).val());
                var address = $(this).parent().parent().find('p').first().html();
                // alert(address);
                $.ajax({
                    url:"/update/address/status/"+id,
                    success:function (response) {
                        $("#address").val(address);
                    }
                });
            });

            $(".gender").select2().on('change',function(){

                if($(this).val() =='Female'){

                    $("#gendar-check").show();
                }else{
                    $("#gendar-check input[type=checkbox]").removeProp('checked');
                    $("#gendar-check").hide();
                }



            });
            $("#folder").select2().on('change',function(){

                if($(this).val() ==0){

                    $("#add-new-directory").modal('open');
                }



            });


            $( "#date_of_birth" ).datepicker({ dateFormat: 'dd.mm.yy',
                changeMonth: true,
                changeYear: true,
                yearRange: '-100:+0',
                maxDate : '-2Y'
            });

            $( "#session-date" ).datepicker({ dateFormat: 'dd.mm.yy',
                changeMonth: true,

                minDate : 'now'
            });

            $(".add-more-address").click(function(){
                $(".row.add-new-address").after($('.row.add-new-address').clone().removeClass('add-new-address')).find('textarea').val('');



            });


            var counter = 1;
            $(".add-button").click(function (e) {

                $.ajax({
                    url: '/add/new/phone',
                    success: function (response) {
                        $(".phone").after(response);

                        $(".country-code").select2();

                        $(".remove-button").click(function () {
                            //var id = $(this).attr('data-id');
                            $(this).parents('.new-phone').remove();
                        });

                        $(".contact_number").change(function () {
                            clearTimeout(timeoutId);
                            timeoutId = setTimeout(function () {
                                // Runs 1 second (1000 ms) after the last change
                                //$(".progress").show();
                                $(".ajax-loading").hide();


                            }, 1000);
                        });

                        $("select.country-code").on('change', function () {
                            var val = $(this).val();

                            $(this).parents('.new-phone').find('.contact_number').val("+" + val);
                        });
                        $(".contact_number").keydown(function (e) {
                            // Allow: backspace, delete, tab, escape, enter and .
                            if ($.inArray(e.keyCode, [187,107,46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                                // Allow: Ctrl+A, Command+A
                                (e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) ||
                                // Allow: home, end, left, right, down, up
                                (e.keyCode >= 35 && e.keyCode <= 40)) {
                                // let it happen, don't do anything
                                return;
                            }
                            // Ensure that it is a number and stop the keypress
                            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                                e.preventDefault();
                            }
                        });

                    }
                });


                /* var new_contact = $(".phone").clone();
                 new_contact.find('ul').remove();
                 new_contact.find('select.icons').material_select('destroy');
                 new_contact.find('.add-button').addClass('remove-button').removeClass('add-button');
                 new_contact.addClass('new-phone').removeClass('phone');
                 new_contact.addClass('new-phone').find('.remove-button > i').html('delete');
                 new_contact.find('select.icons').attr('id','country_area_code'+counter++);

                 new_contact.find('select.icons').material_select();

                 $(".phone").after(new_contact);
                 $(".remove-button").on('click', function(b){
                 $(this).parents('.new-phone').remove();
                 b.preventDefault();
                 });*/
                e.preventDefault();
            });

            $(".remove-button").click(function () {
                var id = $(this).attr('data-id');
                $.ajax({
                    url: "/phone/delete/" + id,
                    success: function (response) {

                    }
                });
                $(this).parents('.new-phone').remove();
            });

            $('select[name=referral_id]').select2({
                placeholder: "Enter Referral Name ",
                allowClear: true,
                tags: true,
                minimumInputLength: 3,
                ajax: {
                    url: function (params) {
                        return '/refferal/get_referral/' + params.term;
                    },
                    dataType: 'json',
                    delay: 150,
                    data: function (params) {
                        //   console.log(params);
                        var query = {
                            search: params.term,
                        }

                        // Query parameters will be ?search=[term]&type=public
                        return query;
                    },

                },


            }).on('change', function () {
                //alert();
                var id = $(this).val();
                if (id > 0) {
                    $("#referral_id").val(id);
                    $("#referral_code").val($(this).select2('data')[0].unique_id);
                    $("#referral_code").focusin();
                }


            });





            $("body").on('click','.save-user',function(e){
                $(".message").hide();
                $(".overlay").show();
                $(".overlay .progress").show();
                $(".overlay .message").hide();
                if($("#form").valid()){
                    $("#form").ajaxForm(function(response){
                        $(".overlay .progress").hide();
                        $(".overlay .message").show();

                        response = $.parseJSON(response);
                        if(response.type=="success"){

                            $(".success-message").html(response.message);
                            $(".success-message").show();

                            setTimeout(function(){
                                $(".success-message").hide();
                                $(".overlay").hide();
                            },2000);
                        }else{

                            $(".error-message").html(response.message);
                            $(".error-message").show();
                        }




                    }).submit();
                }

                e.preventDefault();
            });

            $image_crop = $('#image_profile').croppie({
                enableExif: true,
                viewport: {
                    width:200,
                    height:200,
                    type:'square' //circle
                },
                boundary:{
                    width:300,
                    height:300
                }
            });

            $(".revised-information").click(function(){

                var id = $(this).attr('data-id');
                $(".overlay").show();
                $(".overlay .progress").show();
                $(".overlay .message").hide();
                $.ajax({
                    url:"/get/patient/revised-data/"+id,
                    success:function(response){
                        $(".overlay .progress").hide();
                        $(".overlay").hide();
                        $("#revised-information").html(response);
                    }
                });

            });

            $('.crop_image').click(function(event){
                $(".overlay").show();
                $(".overlay .progress").show();
                $(".overlay .message").hide();
                $image_crop.croppie('result', {
                    type: 'canvas',
                    size: 'viewport'
                }).then(function(response){
                    $.ajax({
                        url:"/upload/patient/profile/picture",
                        type: "POST",
                        data:{"image": response,patient_id:"{!! $patient->id !!}","_token":"{!! csrf_token() !!}"},
                        success:function(data)
                        {
                            $(".overlay .progress").hide();
                            $(".overlay .message").show();
                            $(".overlay").hide();
                            $('#upload-profile-image-modal').modal('close');
                            $('#uploadedimage').attr('src',response);
                        }
                    });
                })
            });

            $('#profile_picture').on('change', function(){
                var reader = new FileReader();
                reader.onload = function (event) {
                    $image_crop.croppie('bind', {
                        url: event.target.result
                    }).then(function(){
                        console.log('jQuery bind complete');
                    });
                }
                reader.readAsDataURL(this.files[0]);
                $('#upload-profile-image-modal').modal('open');
            });

            $(".change-profile-picture").click(function(){
                $("#profile_picture").click();
            });

            $("#country_area_code").on('change', function () {
                var val = $(this).val();

                $('#contact_number').val("+"+val);
            });


            $("body").on('click','.change-doctor-by',function(){
                var doctor_id = $(this).data('doctor-id');
                var session_id = $(this).data('session-id');
                $("#change-doctor").find('input[name=id]').val(session_id);
              //  $("#doctor-list").select2();
                $("#doctor-list").val(doctor_id).trigger('change');
                $("#change-doctor").modal();
            });



            $("body").on('click','a[data-item=treatment-cards]',function(){
                var patient_id = "{!! $patient->id !!}";
                $.ajax({
                    url:"/view/treatment-card/"+patient_id,
                    success:function(response){
                        $("#treatment-records").html(response);
                        $(".overlay").hide();

                    }
                });
            });

            $("body").on('click','.save-history',function(){
                var patient_id = "{!! $patient->id !!}";
                if($("#save-new-medical-history").valid()){
                    $("#save-new-medical-history").ajaxForm(function(response){
                        $.ajax({
                            url:"/get/patient/medical/history/"+patient_id,
                            success:function(response){
                                $(".patient-medical-histories").html(response);
                                $("#add-new-medical-history").modal('hide');
                            }
                        });
                    }).submit();
                }
            });

            $("body").on('click','.edit-treatment-card',function(){
                var patient_id = "{!! $patient->id !!}";
                $.ajax({
                    url:"/load/treatment-card/"+patient_id,
                    success:function(response){
                        $("#treatment-records").html(response);
                        $(".overlay").hide();

                    }
                });
            });

            $("body").on('click','a[data-item=documents]',function(){
                var patient_id = "{!! $patient->id !!}";
                $.ajax({
                    url:"/load/patient/documents/"+patient_id,
                    success:function(response){
                        $("#documents").html(response);
                        $(".overlay").hide();

                        $('li.folder.active').trigger('click');

                    }
                });
            });

            $("body").on('click','a[data-item=patient-appoinments]',function(){
                var patient_id = "{!! $patient->id !!}";
                $.ajax({
                    url:"/load/patient/appointments/"+patient_id,
                    success:function(response){
                        $("#appointments").html(response);
                        $(".overlay").hide();

                    }
                });
            });

            $("body").on('click','a[data-item=payments]',function(){
                var patient_id = "{!! $patient->id !!}";
                $.ajax({
                    url:"/get/patient/invoices/"+patient_id,
                    success:function(response){
                        $("#payments").html(response);
                        $(".overlay").hide();

                    }
                });
            });



            $("body").on('click','a[data-item=refers]',function(){
                var patient_id = "{!! $patient->id !!}";
                $.ajax({
                    url:"/load/refers/"+patient_id,
                    success:function(response){
                        $("#refers").html(response);
                        $(".overlay").hide();
                         $(".tree li ul").each(function(){
                            var count1 = $(this).children().length;
                             console.log(count1);
                             console.log($(this).first('li').find('h6').text());
                        });



                    }
                });
            });

            $("body").on('click','.map-view',function(){
                $(".span3.well").each(function(){

                    var name = $(".referral-name").map(function() {
                        return this.innerHTML;
                    }).get();
                    //name.push($(this).find('h6').first().text());
                    var referrals = [];
                    referrals = $(".referral-count").map(function() {
                        return this.innerHTML;
                    }).get();;
                    console.log(name);
                    setTimeout(function(){
                        var columns_thermometer_element = document.getElementById('tree-chart');
                        var columns_thermometer = echarts.init(columns_thermometer_element);


                        //
                        // Chart config
                        //

                        // Options
                        var columns_thermometer_options = {

                            // Global text styles
                            textStyle: {
                                fontFamily: 'Roboto, Arial, Verdana, sans-serif',
                                fontSize: 13
                            },

                            // Chart animation duration
                            animationDuration: 750,

                            // Setup grid
                            grid: {
                                left: 10,
                                right: 10,
                                top: 35,
                                bottom: 0,
                                containLabel: true
                            },

                            // Add legend
                            legend: {
                                data: ['Referral Count'],
                                itemHeight: 8,
                                itemGap: 20,
                                selectedMode: false
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
                                },
                                formatter: function (params) {
                                    return params[0].name + '<br/>'
                                        + params[0].seriesName + ': ' + params[0].value + '<br/>'
                                        + params[1].seriesName + ': ' + (params[1].value + params[0].value);
                                }
                            },

                            // Horizontal axis
                            xAxis: [{
                                type: 'category',
                                data: name,
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
                                boundaryGap: [0, 0.1],
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
                                        color: ['rgba(250,250,250,0.1)', 'rgba(0,0,0,0.015)']
                                    }
                                }
                            }],

                            // Add series
                            series: [
                                {
                                    name: 'Referral Count',
                                    type: 'bar',
                                    stack: 'sum',
                                    barCategoryGap: '50%',
                                    itemStyle: {
                                        normal: {
                                            color: '#FF7043',
                                            barBorderColor: '#FF7043',
                                            barBorderWidth: 6,
                                            label: {
                                                show: true,
                                                position: 'insideTop'
                                            }
                                        }
                                    },
                                    data: referrals
                                },

                            ]
                        };

                        // Set options
                        columns_thermometer.setOption(columns_thermometer_options);
                    },1000);

                });
            });

            $(".patient-actions").click(function(){
                var patient_id = $(this).attr('data-patient-id');
                var value = $(this).attr('data-value');
                if(!$(this).hasClass('active')) {
                    if (value == "visits") {
                        $.ajax({
                            url: '/get/appointments/patient/' + patient_id,
                            success: function (response) {
                                $("div.visits > span").html(response);
                            }
                        });
                    }

                    if(value=='documents'){
                        $.ajax({
                            url: '/patient/documents/' + patient_id,
                            success: function (response) {
                                $("div.documents > span").html(response);
                            }
                        });
                    }

                }
            });

            $(".all-visits").click(function (response) {
                var patient_id = $(this).attr('data-patient-id');
                $.ajax({
                    url: '/get/all/appointments/patient/' + patient_id,
                    success: function (response) {
                        //$("div.visits > span").html(response);\
                        $("#modal-response  h4").html('<i class="material-icons">local_hospital</i> Patient All Visits');
                        $("#modal-response  .response").html(response);
                        $("#modal-response").modal('open');
                    }
                });
            });

            $(".delete-patient").click(function () {
                var ths = $(this);
                var patient_id = $(this).attr('data-patient-id');
                if (confirm('Do you want to delete?')) {
                    $.ajax({
                        url: "/patient/delete/" + patient_id,
                        success: function (response) {
                            window.location ="/patient/list";
                        }
                    });
                }
            });
            $(".file-tree").filetree({
                collapsed: true,

            });
        })
    </script>
@endsection
