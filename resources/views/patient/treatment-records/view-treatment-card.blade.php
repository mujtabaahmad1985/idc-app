<style>
    #accordion-styled .card-header {
        padding: 5px 7px;
    }
    #accordion-styled .h6, h6 {
        font-size: 0.8375rem;
    }

    #session-form .select2-search__field{
        width: 50% !important;
    }

    .view-treatment-session table td{ vertical-align: baseline}

</style>
<div class="container">
    <div class="row">
        <div class="col-sm-6 text-right">
            <div class="btn-group">
                <button type="button" class="btn btn-danger pdf-treatment-card"><i class="icon-file-pdf mr-1 font-size-sm"></i> PDF</button>{{--
                <button type="button" class="btn btn-danger print-treatment-card"><i class="icon-printer mr-1 font-size-sm"></i> Print</button>
                <button type="button" class="btn btn-danger share-treatment-card"><i class="icon-share mr-1 font-size-sm"></i> Share</button>--}}
            </div>
        </div>
        <div class="col-sm-6 text-right">
            <div class="header-elements">
                <form action="#">
                    <div class="form-group form-group-feedback form-group-feedback-right">
                        <input type="search" class="form-control wmin-md-200" placeholder="Search">
                        <div class="form-control-feedback">
                            <i class="icon-search4 font-size-sm text-muted"></i>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">







            <div class="card border-left-danger  border-left-3 rounded-left-0 bg-light">
                <div class="card-header d-sm-flex justify-content-sm-between align-items-sm-center">
                    <div>
                        <i class="icon-reading mr-2"></i> <strong>{!! $patient->salutation !!} {!! $patient->first_name !!} {!! $patient->last_name !!}</strong>
                    </div>

                         <div class="mt-1 mt-sm-0 mr-4">





                                        @if(isset($patient_flags))
                                            @foreach($patient_flags as $f)
                                                <span class="badge" title="{!! $f->name !!}"><i class="icon-flag7" style="color: {!! $f->color !!}"></i> </span>
                                            @endforeach
                                        @endif

                        </div>
                    <a href="#!" class="badge edit-action-button" data-action="edit-patient"><i class="icon-pencil font-size-xs "></i> </a>
                </div>
                <div class="card-body">
                    <blockquote class="blockquote d-flex py-2 mb-0">
                        <div class="row">
                            <div class="col-12">
                                <table>

                                    @if(in_array(44,$permissions_allowed) || Auth::user()->role=='hospital-administrator')
                                    <tr>
                                        <td style="width: 40px">  <i class="icon-calendar2 icon-1x text-muted opacity-25"></i></td>
                                        <td class="font-size-sm">{!! !empty($patient->date_of_birth)?date('d.m.Y',strtotime($patient->date_of_birth)):'-' !!}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 40px">  <i class="icon-credit-card icon-1x text-muted opacity-25"></i></td>
                                        <td class="font-size-sm">{!! !empty($patient->card_number)?$patient->card_number:'-' !!}</td>
                                    </tr>
                                        @endif
                                </table>

                        </div>
                        </div>
                    </blockquote>
                </div>



            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <div class="card border-left-danger  border-left-3 rounded-left-0  bg-light " style="min-height: 126px;">
                <a href="#!" class="badge  add-action-button right10" data-action="add-allergy"><i class="icon-add font-size-xs"></i> </a>
                <div class="card-body my-card-space">
                    <blockquote class="blockquote  py-2 mb-0">
                        <dl class="row mb-0">
                            <dt class="col-sm-2 font-size-sm mb-0">Drug Allergy </dt>

                            <dd class="col-sm-9 font-size-sm mb-0">
                                <table class="table table-striped table-no-padding drug-allergy-table">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Drug Allergy</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     @if(isset($allergies_data))
                                        @foreach($allergies_data as $d)
                                            <tr>
                                                <td width="40%">{!! \App\Helpers\CommonMethods::formatDate($d['created_at']) !!}</td>
                                                <td>{!! $d['name'] !!}</td>
                                                <td><a href="#!" class="delete-allergy text-danger" data-id="{!! $d['id'] !!}"><i class="icon-trash"></i></a>  </td>

                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>



                                </table>
                            </dd>


                        </dl>
                    </blockquote>
                </div>



            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12">
            <div class="card border-left-danger  border-left-3 rounded-left-0  bg-light">

            <div class="card-body my-card-space">
                <blockquote class="blockquote  py-2 mb-0">
            <dl class="row mb-0">


                <dt class="col-sm-2 font-size-sm mb-0">Current Medications </dt>
                <dd class="col-sm-10 font-size-sm mb-2">
                    <a href="#!" class="badge  edit-action-button topminus5" data-action="current-medications"><i class="icon-pencil font-size-xs"></i> </a>

                        <ul class="list-inline list-inline-separate list-inline-dotted mb-0 list-currnet-medication">
                            @if(isset($patient->products) && $patient->products->count() > 0)
                        @foreach($patient->products as $pre_medical)

                                <li class="list-inline-item font-weight-semibold">{!! $pre_medical->product_title !!}</li>

                            @endforeach
                     @endif</ul>
                </dd>
            </dl>
                    <dl class="row mb-0">
                        <a href="#!" class="badge  add-action-button top35 right10" data-action="add-new-medical-history"><i class="icon-add font-size-xs"></i> </a>

                        <dt class="col-sm-2 font-size-sm mb-0">Medical History </dt>
                        <dd class="col-sm-10 font-size-sm mb-0">

                            <div id="recent-history">
                                <div class="form-group">


                                    <div class="list-feed patient-medical-histories">
                                        @if(isset($patient_medical_history) && $patient_medical_history->count() > 0)
                                        @foreach($patient_medical_history as $patient_history)
                                        <div class="list-feed-item border-warning-400">
                                            <div class="text-muted font-size-sm mb-1">  @php
                                                    $created_at = \Carbon\Carbon::parse($patient_history->created_at);
                                                        echo $created_at->diffForHumans(\Carbon\Carbon::now());
                                                $illness_id = isset($patient_history->illness) && !empty($patient_history->illness)?explode(',',$patient_history->illness):NULL;
                                               $illness = \App\MedicalConditions::whereIn('id',$illness_id)->pluck('name')->all();

                                                @endphp</div>
                                            <mark>{!! implode(', ',$illness) !!}</mark> {!! $patient_history->medical_history_text !!}  {{--<a href="#!" class="badge  no-position text-muted edit-history" style="padding: 2px" data-id="{!! $patient_history->id !!}"><i class="icon-pencil font-size-xs"></i> </a>--}} <a href="#!" style="padding:2px" class="badge text-danger  delete-history"  data-id="{!! $patient_history->id !!}"><i class="icon-trash font-size-xs"></i> </a>

                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </dd>
                    </dl>
                </blockquote>
            </div>
            </div>
        </div>


    </div>
    @php
        $image_ext  = ['jpg','png','jpeg'];
        $pdf = ['pdf'];
        $documents   = ['doc','docx','xls','xlsx'];
        $media      = ['avi','mp4','mp3'];
        $download   = ['zip'];
    @endphp
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="card border-left-danger  border-left-3 rounded-left-0  bg-light">
                <div class="card-body my-card-space">
                <h6 class="mb-1 mt-1 font-weight-semibold">Saved Items</h6>
                    <div class="row">

                        @foreach($patient_folders as $folder)
                            @if(isset($folder) && isset($folder->documents) && $folder->documents->count() > 0)
                                @foreach($folder->documents as $document)
                                    @php

                                        $ext = File::extension($document->document_title);
$image_ext  = ['jpg','png','jpeg','pdf'];
                                        $flag=true;
                                    if(in_array($ext,$image_ext)) {
$flag=false;
}

                                    @endphp
                                    @if($flag)
                                    <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
                                        <div class="card  justify-content-center text-center  card-body">
                                            <div class="card-header bg-white header-elements-inline "  style="padding: 0; border-bottom: 0">
                   {{-- <span class="text-muted text-center font-size-xs">{!! \App\Helpers\CommonMethods::fileSize(
                        File::size(public_path('uploads/documents/'.$document->document_title)
                        ))  !!}</span>--}}
                                                <div class="header-elements">
                                                    <div class="list-icons">
                                                        <a href="{!! url('/').'/uploads/documents/'.$document->document_title !!}" class="list-icons-item" download="{!! $document->document_title !!}" title="Download"><i class="icon-download font-size-sm text-success-600"></i></a>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12"> <img src="{!! url('/').'/bootstrap/assets/file-icons/'.$ext.'.svg' !!}" class="" width="40"  alt=""></div>
                                                <div class="col-12 "><p class="font-weight-bold text-center text-nowrap document-title" title="     {!! $document->document_title !!}">
                                                        @if(in_array($ext,$image_ext))
                                                            <a  href="{!! url('/').'/uploads/documents/'.$document->document_title !!}"  class="text-blue-300 font-size-xs  image-file">   {!! $document->document_title !!}</a>
                                                        @elseif(in_array($ext,$pdf))
                                                            <a  href="{!! url('/').'/uploads/documents/'.$document->document_title !!}"  class="text-blue-300 font-size-xs  pdf-file">   {!! $document->document_title !!}</a>
                                                        @elseif(in_array($ext,$documents))
                                                            <a  href="https://docs.google.com/gview?url={!! url('/').'/uploads/documents/'.$document->document_title !!}&embedded=true"  class="text-blue-300 font-size-xs  document-file" data-link="{!! url('/').'/uploads/documents/'.$document->document_title !!}">   {!! $document->document_title !!}</a>
                                                        @endif
                                                    </p> </div>
                                                <div class="col-12">
                                                    <span class="text-muted text-center font-size-xs">{!! \App\Helpers\CommonMethods::formatDate($document->created_at) !!}  </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            @endif
                            @endforeach

                        @if(isset($medias) && $medias->count() > 0)
                            @foreach($medias as $m)
                                    @php

                                        $ext = File::extension($m->media_file_name);
$image_ext  = ['jpg','png','jpeg','pdf'];
                                        $flag=true;
                                    if(in_array($ext,$image_ext)) {
$flag=false;
}
@endphp
                                    <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
                                        <div class="card  justify-content-center text-center  card-body">
                                            <div class="card-header bg-white header-elements-inline "  style="padding: 0; border-bottom: 0">
                                                {{-- <span class="text-muted text-center font-size-xs">{!! \App\Helpers\CommonMethods::fileSize(
                                                     File::size(public_path('uploads/documents/'.$document->document_title)
                                                     ))  !!}</span>--}}
                                                <div class="header-elements">
                                                    <div class="list-icons">
                                                        <a href="{!! env('APP_URL') !!}/uploads/media/{!! $m->directory_name !!}/{!! $m->media_file_name !!}" download="{!! $m->media_file_name !!}" title="Download"><i class="icon-download font-size-sm text-success-600"></i></a>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12"> <img src="{!! url('/').'/bootstrap/assets/file-icons/'.$ext.'.svg' !!}" class="" width="40"  alt=""></div>
                                                <div class="col-12 "><p class="font-weight-bold text-center text-nowrap document-title" title="     {!! $m->media_file_name !!}">
                                                        @if(in_array($ext,$image_ext))
                                                            <a  href="{!! env('APP_URL') !!}/uploads/media/{!! $m->directory_name !!}/{!! $m->media_file_name !!}"  class="text-blue-300 font-size-xs  image-file">   {!! $m->media_file_name  !!}</a>
                                                        @elseif(in_array($ext,$pdf))
                                                            <a  href="{!! env('APP_URL') !!}/uploads/media/{!! $m->directory_name !!}/{!! $m->media_file_name !!}"  class="text-blue-300 font-size-xs  pdf-file">   {!! $m->media_file_name  !!}</a>
                                                        @elseif(in_array($ext,$documents))
                                                            <a  href="https://docs.google.com/gview?url={!! env('APP_URL') !!}/uploads/media/{!! $m->directory_name !!}/{!! $m->media_file_name !!}&embedded=true"  class="text-blue-300 font-size-xs  document-file" data-link="{!! env('APP_URL') !!}/uploads/media/{!! $m->directory_name !!}/{!! $m->media_file_name !!}">   {!! $document->document_title !!}</a>
                                                        @endif
                                                    </p> </div>
                                                <div class="col-12">
                                                    <span class="text-muted text-center font-size-xs">{!! \App\Helpers\CommonMethods::formatDate($m->created_at) !!}  </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="card border-left-danger  border-left-3 rounded-left-0  bg-light">
                <div class="card-body my-card-space">
                <h6 class="mb-1 mt-1 font-weight-semibold">Digital Imaging</h6>
                    <div class="row">
                        @foreach($patient_folders as $folder)
                            @if(isset($folder) && isset($folder->documents) && $folder->documents->count() > 0)
                                @foreach($folder->documents as $document)
                                    @php

                                        $ext = File::extension($document->document_title);
                                        $image_ext  = ['jpg','png','jpeg','pdf'];
                                        $flag=false;
if(in_array($ext,$image_ext)) {
$flag=true;
}

                                    @endphp
                                @if($flag)
                                    <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
                                        <div class="card  justify-content-center text-center  card-body">
                                            <div class="card-header bg-white header-elements-inline "  style="padding: 0; border-bottom: 0">
                  {{--  <span class="text-muted text-center font-size-xs">{!! \App\Helpers\CommonMethods::fileSize(
                        File::size(public_path('uploads/documents/'.$document->document_title)
                        ))  !!}</span>--}}
                                                <div class="header-elements">
                                                    <div class="list-icons">
                                                        <a href="{!! url('/').'/uploads/documents/'.$document->document_title !!}" class="list-icons-item" download="{!! $document->document_title !!}" title="Download"><i class="icon-download font-size-sm text-success-600"></i></a>


                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12"> <img src="{!! url('/').'/bootstrap/assets/file-icons/'.$ext.'.svg' !!}" class="" width="40"  alt=""></div>
                                                <div class="col-12 "><p class="font-weight-bold text-center text-nowrap document-title" title="     {!! $document->document_title !!}">
                                                        @if(in_array($ext,$image_ext))
                                                            <a  href="{!! url('/').'/uploads/documents/'.$document->document_title !!}"  class="text-blue-300 font-size-xs  image-file">   {!! $document->document_title !!}</a>
                                                        @elseif(in_array($ext,$pdf))
                                                            <a  href="{!! url('/').'/uploads/documents/'.$document->document_title !!}"  class="text-blue-300 font-size-xs  pdf-file">   {!! $document->document_title !!}</a>
                                                        @elseif(in_array($ext,$documents))
                                                            <a  href="https://docs.google.com/gview?url={!! url('/').'/uploads/documents/'.$document->document_title !!}&embedded=true"  class="text-blue-300 font-size-xs  document-file" data-link="{!! url('/').'/uploads/documents/'.$document->document_title !!}">   {!! $document->document_title !!}</a>
                                                        @endif
                                                    </p> </div>
                                                <div class="col-12">
                                                    <span class="text-muted text-center font-size-xs">{!! \App\Helpers\CommonMethods::formatDate($document->created_at) !!}  </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

   @if(isset($patient->appointments) && $patient->appointments->count()  > 0)
        <div id="accordion-styled">
    @foreach($patient->appointments as $k=>$appointment)


                <div class="card appointment-sections">
                    <div class="card-header bg-danger-600 header-elements-inline">
                        <h6 class="card-title">
                            <a data-toggle="collapse" class="text-white collapsed" href="#accordion-styled-group{!! $k !!}" aria-expanded="false">
                                {!! $appointment->doctor_services->service_name !!} with Dr. {!! isset($appointment->doctors)?$appointment->doctors->fname:"" !!} {!! isset($appointment->doctors)?$appointment->doctors->lname:"" !!} <span class="badge bg-dark">{!! \App\Helpers\CommonMethods::formatDate($appointment->booking_date) !!}  {!! date('H:i A',strtotime($appointment->start_time)) !!} - {!! date('H:i A',strtotime($appointment->end_time)) !!}</span>
                            </a>
                        </h6>
                        <div class="header-elements">
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                               {{-- <button type="button" class="btn btn-danger btn-sm add-new-treatment" data-id="{!! $appointment->id !!}"><i class="icon-plus3 mr-2"></i> Treatment</button>--}}
                                <button type="button" class="btn btn-danger btn-sm add-new-session" data-id="{!! $appointment->id !!}"><i class="icon-plus3 mr-2"></i> Session</button>
                                <button type="button" class="btn btn-danger btn-sm make-payments" data-id="{!! $appointment->id !!}"><i class="icon-coin-dollar mr-2"></i> Payments</button>

                            </div>
                        </div>
                    </div>

                    <div id="accordion-styled-group{!! $k !!}" class="collapse @if($k==0) show @endif" data-appointment-id="{!!  $appointment->id !!}" data-parent="#accordion-styled" style="">
                        <div class="card-body">
                        {{--    <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">





                                    <div class="card border-left-danger  border-left-3 rounded-left-0  bg-light ">
                                        <div class="card-body my-card-space">
                                            <blockquote class="blockquote  py-2 mb-0">
                                                <dl class="row mb-0">
                                                    <dt class="col-sm-2 font-size-sm mb-0">Treatment Done </dt>
                                                    <dd class="col-sm-10 font-size-sm mb-0">
                                                        <ul class="list list-unstyled treatment-done-list mb-0">
                                                        @if(isset($appointment->treatment_dones) && $appointment->treatment_dones->count() > 0)



                                                            @foreach($appointment->treatment_dones as $done)
                                                            <li class="mb-2"><i class="icon-arrow-right13 mr-2"></i> {!! $done->treatment_description !!}<a href="#!" style="padding:2px" class="badge text-danger  delete-treatment ml-2"  data-id="{!! $done->id !!}"><i class="icon-trash font-size-xs"></i> </a></li>
                                                            @endforeach

                                                        @endif
                                                        </ul>

                                                    </dd>

                                                </dl>
                                            </blockquote>
                                        </div>
                                    </div>
                                </div>

                            </div>--}}

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 view-treatment-session">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>




    @endforeach  </div>
       @endif
</div>

<div id="add-drug-allergy" class="modal fade">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Drug Allergy</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <select id="more-allergy" class="mt-1">
                    @if(isset($drug_allergies))
                        @foreach($drug_allergies as $d)
                            <option value="{!! $d->id !!}" @if(in_array($d->id,$allergies)) disabled @endif>{!! $d->name !!}</option>
                        @endforeach
                    @endif

                </select>
                <div id="new-drug-allergy">
                    <hr />
                    <form id="drug-allergy-form" method="POST" action="/save/allergy" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                    <input type="text" style="text-transform: none;" id="drug-allergies-field" name="name"
                           placeholder="Enter New Drug Allergy.." class="form-control" required>
                    </form>
                </div>


            </div>

            <div class="modal-footer">
                <button type="button" class="btn bg-danger add-new-allergy">Add New Drug</button>
                <button type="button" class="btn bg-danger save-new-allergy" style="display: none">Save New Drug</button>
            </div>


        </div>
    </div>
</div>


<div id="change-doctor" class="modal fade">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            @php

                $doctors =  \App\Doctors::with('users')->whereNull('deleted_at')->get();

            @endphp

            <div class="modal-body">
                <form id="change-doctor-form" action="/update/doctor/session" method="POST" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <input type="hidden" id="" name="id" />
                    <select id="doctor-list" class="form-control mt-1" name="doctor_id">

                        @if(isset($doctors) && $doctors->count() > 0)
                            @foreach($doctors as $doctor)
                                <option value="{!! $doctor->id !!}">Dr. {!! $doctor->fname !!} {!! $doctor->lname !!}</option>
                            @endforeach
                        @endif

                    </select>
                </form>




            </div>




        </div>
    </div>
</div>

<div id="add-current-medications" class="modal fade">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Current Medications</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <select class="form-control" multiple id="current-medications">
                    @if(isset($patient->products) && $patient->products->count() > 0)
                        @foreach($patient->products as $pre_medical)
                            <option value="{!! $pre_medical->id !!}" selected>{!! $pre_medical->product_title !!}</option>
                        @endforeach
                    @endif
                </select>


            </div>




        </div>
    </div>
</div>

<div id="add-new-medical-history" class="modal fade">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Medical History</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <form id="save-new-medical-history" action="/save/medical/history" method="POST" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <input type="hidden" name="patient_id" value="{!! $patient->id !!}" />
                    <div class="form-group">
                        <label>Medical Conditions</label>
                        <select class="form-control multiselect-link illness-history"  name="illness[]"
                                data-button-width="500" multiple="multiple" data-fouc>

                            @if(isset($medical_conditions))
                                @foreach($medical_conditions as $t)
                                    <option value="{!! $t->id !!}"> {!! $t->name !!} </option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control medical-history-card" name="description" required></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-danger save-history">Save</button>
            </div>
    </div>
</div>
</div>
<div id="add-new-treatment" class="modal fade">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Treatment</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <form id="save-new-treatment" action="/save/new/treatment" method="POST" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <input type="hidden" name="patient_id" value="{!! $patient->id !!}" />
                    <input type="hidden" name="appointment_id" />
                    <div class="form-group">
                        <label>Treatment Done</label>

                        <textarea class="form-control medical-history-card" rows="6" name="treatment_done" required></textarea>
                    </div>


                        <div class="row">

                            <div class="col-md-12">
                                <div class="alert bg-success text-white alert-success-treatment-done">

                                    <p></p>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="alert bg-danger text-white alert-error-treatment-done">

                                    <p></p>
                                </div>
                            </div>

                        </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-danger save-new-treatment">Save</button>
            </div>
        </div>
    </div>
</div>
<div id="add-new-session" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Session</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-danger save-new-session">Save</button>
            </div>
        </div>
    </div>
</div>

<div id="add-session-items" class="modal fade">
    <div class="modal-dialog modal-lg" style="width: 70%">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Session Items</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label>Items</label>
                    <select class="form-control" multiple id="session-items"></select>
                </div>

                <div class="row">
                    <div class="col-sm-12" id="view-item-selection"></div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-danger save-session-items">Save</button>
            </div>
        </div>
    </div>
</div>

<div id="add-invoice" class="modal fade">
    <div class="modal-dialog modal-lg" style="width: 70%;max-width: 70%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Invoice</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">


            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-danger download-session-items">Download Invoice</button>
                <button type="button" class="btn bg-danger save-invoice">Save Invoice</button>
            </div>
        </div>
    </div>
</div>


<div id="add-lab-form" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Lab</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">


            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-danger save-lab-form">Save</button>

            </div>
        </div>
    </div>
</div>

<script>

    $('.illness-history').multiselect({
        buttonClass: 'btn btn-link',
        numberDisplayed: 8,



    });
    $("#doctor-list").select2().on('change',function(){
    var data =$("#doctor-list").select2('data');
    var doctor_name = data[0].text;
    var session_id =  $("#change-doctor").find('input[name=id]').val();
        $("#change-doctor-form").ajaxForm(function(response){
            $("span[rel=session-"+session_id+"]").text(doctor_name);
        }).submit();
    });
    $("#current-medications").select2({
        minimumInputLength: 3,
        ajax: {
            url: function (params) {
                return '/get/medications/by/name/' + params.term;
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
    }).on('change',function(){
        var id  = $(this).val();
        $.ajax({
            url:"/save/current-medication/with/treatment-card",
            type:"POST",
            data:{patient_id:{!! $patient->id !!},'_token':"{!! csrf_token() !!}",id:id},
            success:function(response){
                $("#add-current-medications").modal('hide');
                $("a[data-item=treatment-cards]").click();
            }
        });
    });

    $("#more-allergy").select2().on('change',function(){
        var _value = $(this).val();
        var _text = $(this).find("option:selected").text();
        $(".text-danger.d-message").hide();
        $.ajax({
            url: '/save/drug/with/patient',
            type: 'POST',
            data: {patient_id: "{!! $patient->id !!}", '_token': "{!! csrf_token() !!}", drugs: _value},
            success: function (response) {

                response = $.parseJSON(response);
                // console.log(response);
                if(response.type=="success"){


                    var str = "<tr>";
                    str+="<td>";
                    str+= response.created_at;
                    str+="</td>";

                    str+="<td>";
                    str+=_text;
                    str+="</td>";
                    str+='<td><a href="#!" class="delete-allergy text-danger" data-id="'+response.id+'"><i class="icon-trash"></i></a></td>';

                    str+="</tr>";

                    console.log(str);
                    $(".drug-allergy-table tbody").prepend(str);
                }else{
                    $(".text-danger.d-message").html(response.message);
                    $(".text-danger.d-message").show();
                }


            }
        });



    });

    var _select_appointment_section = $("#accordion-styled-group0");
    if(_select_appointment_section){
        var appointment_id = _select_appointment_section.data('appointment-id');
        $.ajax({
            url:"/view/section/template",
            type:"POST",
            data:{
                appointment_id:appointment_id,
                patient_id: "{!! $patient->id !!}",
                '_token':"{!! csrf_token() !!}",

            },
            success:function(response){
                _select_appointment_section.find(".view-treatment-session").html(response);
            }
        });
    }

    $(".appointment-sections a[data-toggle=collapse]").click(function(){
         _select_appointment_section = $(this).parents('.appointment-sections').find(".collapse");

        if(_select_appointment_section){
            var appointment_id = _select_appointment_section.data('appointment-id');
            $.ajax({
                url:"/view/section/template",
                type:"POST",
                data:{
                    appointment_id:appointment_id,
                    patient_id: "{!! $patient->id !!}",
                    '_token':"{!! csrf_token() !!}",

                },
                success:function(response){
                    _select_appointment_section.find(".view-treatment-session").html(response);
                }
            });
        }
    });

    $("#session-items").select2({
        minimumInputLength: 3,
        ajax: {
            url: function (params) {
                return '/get/medications/by/name/' + params.term;
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
    }).on('change',function(){

        var id  = $(this).val();
        var data = ($('#session-items').select2('data'));
        var item_array = [];

        if(data){
            $.each(data,function (i,v) {
                item_array.push(v.id);
            });

        $.ajax({
            url:"/load/items",
            type:"POST",
            data:{
                items:item_array,
                'patient_id':"{!! $patient->id !!}",
                'appointment_id':_select_appointment_section.data('appointment-id'),
                'session_id':selected_session_id,
                "_token":"{!! csrf_token() !!}"
            },
            success:function (response) {
                    $("#view-item-selection").html(response);
            }

        });
        }
    });

</script>
<script>
    var file_name = "";
    $('.image-file').magnificPopup({
        type: 'image',
        gallery:{
            enabled:true
        }
        // other options
    });
    $('.pdf-file').magnificPopup({
        type: 'iframe',
        mainClass: 'my-custom-class',
        // other options
    });
    $(".document-file").magnificPopup({


        type: 'iframe',
        mainClass: 'my-custom-class',
        // other options


    });


</script>