@extends('layout.app')
@section('page-title') Patients @endsection
@section('css')
    {!! Html::style('public/material/js/plugins/dropify/css/dropify.min.css') !!}
    {!! Html::style('public/material/js/signature_pad/docs/css/signature-pad.css') !!}
    {!! Html::style('public/material/css/jquery.timepicker.min.css') !!}
    {!! Html::style('public/bootstrap/js/plugins/blueimp-gallery/gallery.css') !!}
    {!! Html::style('public/bootstrap/js/plugins/blueimp-gallery/gallery-indicator.css') !!}
    <style>
        .table-responsive{ min-height: 90vh}
        .open-advance-search{
            position: absolute;
            right: 50px;
            z-index: 7;
            top: 9px;
            color: #9a9a9a;
        } #general-search{
              display: block !important;}
        .advance-search-section{
            width: 98%;
            border: 1px solid #ccc;
            height: auto;
            position: absolute;
            z-index: 2;
            background: #FFF;
            display: none;
        }
        .advance-search-section.active{ display: block}
        .modal .table-responsive{ min-height: auto !important;}
        .header-elements{
            width: 19%;
        }

        @media (max-width: 414px){


            .col-4.align-self-center{
                text-align: center!important;
                flex: 0 0 100% !important;
                max-width: 100% !important;
                margin-bottom: 20px !important;
            }
            .header-elements{
                width: 100%;
            }
        }
    </style>
@endsection

@section('content')

    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Patients</span> - List</h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none">
                <div class="d-flex justify-content-center">
                    <a href="#" class="btn btn-link btn-float text-body"><i class="icon-bars-alt text-primary"></i><span>Dashboard</span></a>
                    <a href="/patient/add" class="btn btn-link btn-float text-body"><i class="icon-users text-primary"></i> <span>Add Patient</span></a>
                </div>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="/dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="/pharmacy" class="breadcrumb-item">Patients</a>
                    <span class="breadcrumb-item active">Lists</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>


        </div>
    </div>
    <!-- START CONTENT -->
    <div class="content">


        <div class="card">
            <div class="card-header bg-transparent header-elements-inline py-0">
                <h6 class="card-title py-3">Patient Search</h6>
                <div class="header-elements">
                    @if(in_array(3,$permissions_allowed) || Auth::user()->role=='hospital-administrator')
                        <div class="col align-self-end text-right mt-2 mb-2">
                            <a href="/patients/add" id="add_patient_link" class="btn btn-danger">Add New Patient</a>
                        </div>

                        <div class="col align-self-end text-right mt-2 mb-2">
                            <a href="#!" id="add_patient_link" class="btn btn-danger upload-csv-btn">Import Patients</a>
                            <div class="upload-csv-section" style="display:none">
                                <form id="upload-csv-form" method="post" action="/import_patient" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <input name="import_csv" type="file" accept=".csv" />
                                </form>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <form action="/search/patients">


                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>ID:</label>
                                            <input name="unique_id" class="form-control input-sm" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Name:</label>
                                            <input name="patient_name" class="form-control input-sm" />
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Gender:</label>
                                            <select name="gender" class="form-control">
                                                <option value="">Select Gender</option>
                                                <option value="Male" @if(isset($_GET['gender']) && $_GET['gender']=="Male") selected @endif>Male</option>
                                                <option value="Female"  @if(isset($_GET['gender']) && $_GET['gender']=="Female") selected @endif>Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Age From:</label>
                                            <select name="start_age" class="form-control">
                                                <option value="">Select Age</option>
                                                <option value="10" @if(isset($_GET['start_age']) && $_GET['start_age']=="10") selected @endif>10 Years</option>
                                                <option value="15"  @if(isset($_GET['start_age']) && $_GET['start_age']=="15") selected @endif>15 Years</option>
                                                <option value="20"  @if(isset($_GET['start_age']) && $_GET['start_age']=="20") selected @endif>20 Years</option>
                                                <option value="25"  @if(isset($_GET['start_age']) && $_GET['start_age']=="25") selected @endif>25 Years</option>
                                                <option value="40"  @if(isset($_GET['start_age']) && $_GET['start_age']=="40") selected @endif>40 Years</option>
                                                <option value="60"  @if(isset($_GET['start_age']) && $_GET['start_age']=="60") selected @endif>60 Years</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Age To:</label>
                                            <select name="end_age" class="form-control">
                                                <option value="">Select Age</option>
                                                <option value="10" @if(isset($_GET['end_age']) && $_GET['end_age']=="10") selected @endif>10 Years</option>
                                                <option value="15"  @if(isset($_GET['end_age']) && $_GET['end_age']=="15") selected @endif>15 Years</option>
                                                <option value="20"  @if(isset($_GET['end_age']) && $_GET['end_age']=="20") selected @endif>20 Years</option>
                                                <option value="25"  @if(isset($_GET['end_age']) && $_GET['end_age']=="25") selected @endif>25 Years</option>
                                                <option value="40"  @if(isset($_GET['end_age']) && $_GET['end_age']=="40") selected @endif>40 Years</option>
                                                <option value="60"  @if(isset($_GET['end_age']) && $_GET['end_age']=="60") selected @endif>60 Years</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">



                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Patient Visited:</label>
                                            <div class="form-group">
                                                <input type="hidden" name="visited_range" id="visited_range" value="{!! isset($_GET['visited_range']) && !empty($_GET['visited_range'])?$_GET['visited_range']:"" !!}" />
                                                <button type="button" style="width: 100%" class="btn btn-light daterange-predefined daterange-predefined2">
                                                    <i class="icon-calendar22 mr-2"></i>
                                                    <span></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Patient Registered:</label>
                                            <div class="form-group">
                                                <input type="hidden" name="registered_range" id="registered_range" value="{!! isset($_GET['registered_range']) && !empty($_GET['registered_range'])?$_GET['registered_range']:"" !!}" />
                                                <button type="button" style="width: 100%" class="btn btn-light daterange-predefined daterange-predefined3">
                                                    <i class="icon-calendar22 mr-2"></i>
                                                    <span></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                        $medical_conditions = \App\MedicalConditions::where('hospital_id',\App\Helpers\CommonMethods::getHopsitalID())->get();

                                    @endphp
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Medical Conditions</label>
                                            <select class="form-control"  name="illness">
                                                <option value="">Select Medical Condition</option>
                                                @if(isset($medical_conditions))
                                                    @foreach($medical_conditions as $t)
                                                        <option value="{!! strtolower($t->name) !!}" @if(isset($_GET['illness']) && $_GET['illness']==strtolower($t->name)) selected @endif> {!! $t->name !!} </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <button  class="btn btn-danger">Search</button>
                                    </div>
                                </div>

                        </form>
                    </div>




                </div>
            </div>
        </div>



                @php
                    $keyword = isset($_GET['keywords'])?$_GET['keywords']:"";
                @endphp


            <div class="card">


                <div class="card-body">


                    <div class="table-responsive">
                        @if(in_array(17,$permissions_allowed) || Auth::user()->role=='hospital-administrator')
                        <table class="table table-striped patient-list-table">
                            <thead>

                            <tr>
                                <td width="25px">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="all"  >
                                        <label class="custom-control-label" for="all"></label>
                                    </div>
                                </td>
                                <th width="75px">Unique ID</th>
                                <th width="15%">Patient Name</th>
                                <th width="85px"> D.O.B</th>
                                <th  width="5%">Gender</th>
                                <th>Medical Conditions</th>
                                <th width="100px">Flags</th>
                                <th width="100px">Last Visit</th>
                                <th width="100px">Total Visits</th>
                                <th>Total Paid</th>
                                <th>Media</th>


                                <th width="70px">Register at</th>
                                <th width="50px">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(in_array(17,$permissions_allowed) || Auth::user()->role=='hospital-administrator')
                                @if(isset($patients) && ($patients)->count() > 0)
                                    @foreach($patients as $patient)
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="patient{!! $patient->id !!}"   value="{!! $patient->id !!}" >
                                                    <label class="custom-control-label" for="patient{!! $patient->id !!}"></label>
                                                </div>
                                            </td>
                                            <td>{!! $patient->patient_unique_id !!}</td>
                                            <td>


                                                <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false">{!! ucwords($patient->patient_name) !!}</a>
                                                @if(in_array(42,$permissions_allowed) || Auth::user()->role=='hospital-administrator')           <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">

                                                    <a href="/patient/view/{!! $patient->id !!}" class="dropdown-item"><i class="icon-profile"></i> Profile</a>
                                                    <a href="#!" class="dropdown-item delete-patient"  data-patient-id="{!! $patient->id !!}"><i class="icon-cancel-square2"></i> Delete Patient</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="#!" class="dropdown-item patient-actions" data-action="sessions" data-patient-id="{!! $patient->id !!}"><i class="icon-history"></i> Past Sessions</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="/calendar/appointment/{!! $patient->id !!}/{!! strtolower(Illuminate\Support\Str::slug($patient->patient_name)) !!}" class="dropdown-item"><i class="icon-plus-circle2"></i> Make Appointment</a>
                                                    <a href="#!" class="dropdown-item patient-actions"  data-action="pending-appointment" data-patient-id="{!! $patient->id !!}"><i class="icon-alarm"></i>  Pending Appointments</a>
                                                     <a href="#!" class="dropdown-item patient-actions"  data-action="add-form" data-patient-id="{!! $patient->id !!}"><i class="icon-file-text"></i> Consent Forms</a>
                                                    <a href="#!" class="dropdown-item get-media" data-action="media" data-appointment-id="" data-treatment-id="" data-patient-id="{!! $patient->id !!}"><i class="icon-file-media"></i> Media</a>
                                                    <a href="#!" class="dropdown-item patient-actions"  data-action="refer-a-patient" data-patient-id="{!! $patient->id !!}"><i class="icon-link2"></i> Refer Patient </a>
                                                    @if(Auth::user()->role=='hospital-administrator')
                                                    <a href="#!" class="dropdown-item patient-actions"  data-action="contact-patient" data-patient-id="{!! \App\Helpers\CommonMethods::encrypt($patient->id) !!}"><i class="icon-address-book3"></i> Contact Patient </a>
                                                    @endif
                                                </div>

                                                @endif



                                            </td>
                                            <td>{!! !empty($patient->date_of_birth)?date('d.m.Y',strtotime($patient->date_of_birth)):"" !!}</td>
                                            <td>{!! $patient->gender !!}</td>
                                            <td>
                                                @if(!empty($patient->medicals()->first()))
                                                    {!! is_array(json_decode($patient->medicals()->first()->illness))?str_replace('_',' ',implode(', ',json_decode($patient->medicals()->first()->illness))):"" !!}
                                                @endif
                                            </td>
                                            <td>
                                                @if(isset($patient->patient_assigned_flags) && $patient->patient_assigned_flags->count() > 0)

                                                        <span class="badge" title="{!! $patient->patient_assigned_flags[0]->name !!}"><i class="icon-flag7" style="color: {!! $patient->patient_assigned_flags[0]->color !!}"></i> </span>

                                                @endif
                                            </td>
                                            <td >
                                                {!! !empty($patient->appointments()->first())? date('d.m.Y',strtotime($patient->appointments()->first()->booking_date)):"" !!}</a>
                                            </td>


                                            <td>{!! $patient->appointments()->count() !!}</td>
                                            <td>
                                                @if(isset($patient->amount_from_sale))
                                                <a href="#!" class="show-payment" data-patient-id="{!! $patient->id !!}">
                                                   <span class="badge badge-danger">{!! number_format($patient->amount_from_sale->sale_amount,2) !!}</span>
                                                </a>
                                                    @else
                                                0
                                                    @endif
                                            </td>
                                            <td>@if($patient->media_files()->count() > 0) <a href="#!" class="get-media" data-patient-id="{!! $patient->id !!}"><i class="icon-file-media"></i></a>   @endif</td>
                                            <td>{!! date('d.m.Y',strtotime($patient->created_at)) !!}</td>
                                            <td>
                                                @if(in_array(42,$permissions_allowed) || Auth::user()->role=='hospital-administrator')
                                                    <div class="ml-3">
                                                        <div class="list-icons">
                                                            <div class="list-icons-item dropdown">
                                                                <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-menu7"></i></a>
                                                                <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">

                                                                    <a href="/patient/view/{!! $patient->id !!}" class="dropdown-item"><i class="icon-profile"></i> Profile</a>
                                                                    <a href="#!" class="dropdown-item delete-patient"  data-patient-id="{!! $patient->id !!}"><i class="icon-cancel-square2"></i> Delete Patient</a>
                                                                    <div class="dropdown-divider"></div>
                                                                    <a href="#!" class="dropdown-item patient-actions" data-action="sessions" data-patient-id="{!! $patient->id !!}"><i class="icon-history"></i> Past Sessions</a>
                                                                    <div class="dropdown-divider"></div>
                                                                    <a href="/calendar/appointment/{!! $patient->id !!}/{!! strtolower(Illuminate\Support\Str::slug($patient->patient_name)) !!}" class="dropdown-item"><i class="icon-plus-circle2"></i> Make Appointment</a>
                                                                    <a href="#!" class="dropdown-item patient-actions"  data-action="pending-appointment" data-patient-id="{!! $patient->id !!}"><i class="icon-alarm"></i>  Pending Appointments</a>
                                                                    <a href="#!" class="dropdown-item patient-actions"  data-action="add-form" data-patient-id="{!! $patient->id !!}"><i class="icon-file-text"></i> Consent Forms</a>
                                                                    <a href="#!" class="dropdown-item get-media" data-action="media" data-appointment-id="" data-treatment-id="" data-patient-id="{!! $patient->id !!}"><i class="icon-file-media"></i> Media</a>
                                                                    <a href="#!" class="dropdown-item patient-actions"  data-action="refer-a-patient" data-patient-id="{!! $patient->id !!}"><i class="icon-link2"></i> Refer Patient </a>
                                                                    @if(Auth::user()->role=='hospital-administrator')
                                                                    <a href="#!" class="dropdown-item patient-actions"  data-action="contact-patient" data-patient-id="{!! \App\Helpers\CommonMethods::encrypt($patient->id) !!}"><i class="icon-address-book3"></i> Contact Patient </a>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach

                                @endif
                            @else
                                <tr>
                                    <td colspan="6">
                                        <div class="alert bg-danger text-white text-center" style="display: block">

                                            <span class="font-weight-semibold">Oh snap!</span> You are not authorized to see patient list, please <a href="#" class="alert-link">contact hospital-administrator</a>.
                                        </div>
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="13">
                                        @if(isset($patients) && ($patients)->count() > 0)
                                            {{ $patients->links() }}
                                        @endif
                                    </td>
                                </tr>
                            </tfoot>
                        </table>




                            @else
                            <table class="table table-striped ">
                            <thead>

                            <tr>
                                <td width="25px">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="all"  >
                                        <label class="custom-control-label" for="all"></label>
                                    </div>
                                </td>
                                <th width="75px">Unique ID</th>
                                <th width="15%">Patient Name</th>
                                <th width="85px"> D.O.B</th>
                                <th  width="5%">Gender</th>
                                <th>Medical Conditions</th>
                                <th width="100px">Flags</th>
                                <th width="100px">Last Visit</th>
                                <th width="100px">Total Visits</th>
                                <th>Media</th>


                                <th width="70px">Register at</th>
                                <th width="50px">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td colspan="12">
                                    <div class="alert bg-danger text-white text-center" style="display: block">

                                        <span class="font-weight-semibold">Oh snap!</span> You are not authorized to see patient list, please <a href="#" class="alert-link">contact hospital-administrator</a>.
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        @endif
                    </div>
                    </div>
                <div id="blueimp-gallery-example-container" class="blueimp-gallery blueimp-gallery-controls">
                    <div class="slides"></div>
                    <h3 class="title"></h3>
                    <a class="prev">‹</a>
                    <a class="next">›</a>
                    <a class="close">×</a>
                    <a class="play-pause"></a>
                    <ol class="indicator"></ol>
                </div>

            </div>


    </div>







    <div id="view-payments" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Payments</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="show-payment-detail">
                            <thead>
                            <tr>
                                <th>Sale type</th>
                                <th>Description</th>
                                <th>Amount</th>
                                <th>DateTime</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>


                </div>


            </div>
        </div>
    </div>


    <div id="view-sale-items" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header ">
                    <h5 class="modal-title">Payments</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="items-list">
                            <thead>
                            <tr>
                                <th>Item</th>
                                <th>Description</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Paid Price</th>
                            </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>


                </div>


            </div>
        </div>
    </div>














@endsection


@section('js')
    {!! Html::script('/js/jquery.form.js') !!}
    {!! Html::script('/plugins/jquery.validate/js/jquery.validate.min.js') !!}
    {!! Html::script('/js/jquery-ui.js') !!}
    {!! Html::script('/material/plugins/select2/js/select2.min.js') !!}
    {!! Html::script('/material/js/signature_pad/docs/js/signature_pad.umd.js') !!}
    {!! Html::script('/material/js/masonry.min.js') !!}
    {!! Html::script('/js/jquery.form.js') !!}
    {!! Html::script('/plugins/jquery.validate/js/jquery.validate.min.js') !!}
    {!! Html::script('public/material/js/jquery.timepicker.min.js') !!}
    {!! Html::script(url('/').'/bootstrap/js/plugins/tables/datatables/datatables.min.js') !!}
    {!! Html::script('public/bootstrap/js/plugins/blueimp-gallery/gallery.js') !!}
    {!! Html::script('public/bootstrap/js/plugins/blueimp-gallery/gallery-indicator.js') !!}
    @if(in_array(17,$permissions_allowed) || Auth::user()->role=='hospital-administrator')
<script> var patient_id = 0;
var total_patients = "{!! $all_patients !!}";
    var page_number = 2;
</script>
    <script>
        function patient_result_template(patient){



            if(patient.id > 0)

                var $patient = $('<div class="patient-container">'+



                    '<div class="patient-info">'+

                    '<h5>'+patient.text+'</h5>'+

                    '<p class="inner-text"><i class="icon-key"></i> '+patient.patient_unique_id+'  '+

                    //'<i class="icon-phone2" style="margin-left: 20px"></i> '+patient.patient_phone+'</p>'+

                    '</div>'+

                    '</div>');

            else

                var $patient = patient.text;

            return $patient;

        }
        $(function () {
            $(".upload-csv-btn").click(function(){
                $("input[name=import_csv]").click();
            });
            var progressbar = $(".progress-bar");

            $("input[name=import_csv]").change(function(){
                $("#upload-csv-form").ajaxForm(
                    {


                        beforeSend: function() {
                            $(".progress").css("display","block");
                            progressbar.width('0%');
                            progressbar.text('0%');
                        },
                        uploadProgress: function (event, position, total, percentComplete) {
                            //alert(percentComplete);
                            progressbar.width(percentComplete + '%');
                            progressbar.text(percentComplete + '%');
                        },
                        success: function(response) {
                            $(".progress").css("display","none");
                            response = $.parseJSON(response);
                            if(response.type=="success"){
                                $('.success-message').html(response.message);
                                $('.success-message').fadeIn();

                                setTimeout(function(){location.reload()}, 2500);
                            }else{
                                $('.error-message').html(response.message);
                                $('.error-message').fadeIn();
                            }

                            setTimeout(function(){location.reload()}, 2500);
                        }
                    })
                    .submit();
            });
            $("body").on("click",".show-payment",function () {
                var id = $(this).data('patient-id');

                $("#view-payments").modal();

                $("#show-payment-detail tbody").html('');

                $.ajax({
                    url:"/get/payment/history/"+id,
                    success:function(response){
                        response = $.parseJSON(response);


                        if(response){
                            $(response).each(function (i,v) {
                                var str = '<tr>';
                                str+='<td>'+v.sale_type+'</td>';
                                str+='<td>'+v.description+'</td>';
                                str+='<td>'+v.amount+'</td>';
                                str+='<td>'+v.date_time+'</td>';
                                str+='<td><a href="#!" class="btn btn-sm show-items" data-sale-id="'+v.sale_id+'"><i class="icon-cart2"></i> </a> </td>';

                                str+='</tr>';
                                $("#show-payment-detail tbody").append(str);
                            });

                        }
                    }
                });




            });

            $("body").on("click",".show-items",function () {
                $("#view-sale-items").modal();
                $("#items-list tbody").html('');
                var id = $(this).data('sale-id');
                $.ajax({
                    url:"/view/sale/detail",
                    type:"POST",
                    data:{
                        id:id,

                        '_token':"{!! csrf_token() !!}",

                    },
                    success:function(response){
                        response = $.parseJSON(response);


                        if(response.sale_items){
                            var str="";
                            $.each(response.sale_items,function (i,v) {
                                str+='<tr>';
                                str+='<td>'+v.item_name+'</td>';
                                str+='<td>'+v.item_description+'</td>';
                                str+='<td>'+v.quantity+'</td>';
                                str+='<td>'+v.price+'</td>';
                                str+='<td>'+v.total_price+'</td>';
                                str+='</tr>';
                            })

                            $("#items-list tbody").html(str);
                        }

                        // $("#view-sale").find(".modal-body").html(response);
                    }
                });
            });

            $("select").select2();
            $('.illness-history').multiselect({
                buttonClass: 'btn btn-link',
                numberDisplayed: 8,



            });
            $(".delete-patient").click(function () {
                var ths = $(this);
                var patient_id = $(this).attr('data-patient-id');
                if (confirm('Do you want to delete?')) {
                    $.ajax({
                        url: "/patient/delete/" + patient_id,
                        success: function (response) {
                            ths.parents('tr').remove();
                        }
                    });
                }
            });
            $("body").on('click','.refer-patient',function () {
                $(".alert").hide();
                $("#referral-form").ajaxForm(function (response) {
                    response = $.parseJSON(response);
                    if(response.type=="success"){
                        $(".alert-success-refer").html(response.message);
                        $(".alert-success-refer").show();

                        setTimeout(function () {
                            $(".alert-success-refer").hide();
                            $("#refer-patient-modal").modal('hide');
                        },1500);
                    }else{
                        $(".alert-error-refer").html(response.message);
                        $(".alert-error-refer").show();
                    }
                });
            });

            $('select[name=patient_select]').select2({

                placeholder: "Enter Patient ",

                allowClear: true,

                minimumInputLength: 3,

                templateResult:patient_result_template,

                dropdownAutoWidth : 'true',

                ajax: {

                    url: function (params) {

                        return '/patients/get_all_patients/' + params.term;

                    },

                    dataType: 'json',

                    data: function (params) {

                        var query = {

                            search: params.term,

                            type: 'public'

                        }



                        // Query parameters will be ?search=[term]&type=public

                        return query;

                    }

                }

            }).on('change', function() {

                var id = $(this).val();
            });




            $(".patient-list-table").DataTable({
                "paging": false, "false":     true,"searching": false,"bInfo":false,
                dom: 'Bfrtip',
                "lengthMenu": [ [100, 250, 500, -1], [100, 250, 500, "All"] ],

                    });

            $('.daterange-predefined1').daterangepicker(
                {

                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    opens: 'left',
                    applyClass: 'btn-sm bg-slate',
                    cancelClass: 'btn-sm btn-light'
                },
                function(start, end) {
                    $("#age_range").val(start.format('YYYY-MMMM-D') + 'to' + end.format('YYYY-MMMM-D'));
                    $('.daterange-predefined1 span').html(start.format('D.MMMM.YYYY') + ' &nbsp; - &nbsp; ' + end.format('D.MMMM.YYYY'));

                }
            );
            $('.daterange-predefined2').daterangepicker(
                {

                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    opens: 'left',
                    applyClass: 'btn-sm bg-slate',
                    cancelClass: 'btn-sm btn-light'
                },
                function(start, end) {
                    $("#visited_range").val(start.format('YYYY-MMMM-D') + 'to' + end.format('YYYY-MMMM-D'));
                    $('.daterange-predefined2 span').html(start.format('D.MMMM.YYYY') + ' &nbsp; - &nbsp; ' + end.format('D.MMMM.YYYY'));

                }
            );
            $('.daterange-predefined3').daterangepicker(
                {

                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    opens: 'left',
                    applyClass: 'btn-sm bg-slate',
                    cancelClass: 'btn-sm btn-light'
                },
                function(start, end) {
                    $("#registered_range").val(start.format('YYYY-MMMM-D') + 'to' + end.format('YYYY-MMMM-D'));
                    $('.daterange-predefined3 span').html(start.format('D.MMMM.YYYY') + ' &nbsp; - &nbsp; ' + end.format('D.MMMM.YYYY'));

                }
            );

            // Display date format
            $('.daterange-predefined span').html(moment().subtract(29, 'days').format('D.MMMM.YYYY') + ' &nbsp; - &nbsp; ' + moment().format('D.MMMM.YYYY'));


            $(".open-advance-search").click(function(){
                $(".advance-search-section").toggleClass('active');
            });

            var keywords = $("#search-keywords").val();
            var age_range = $("#age_range").val();
            var visited_range = $("#visited_range").val();
            var registered_range = $("#registered_range").val();
           /* $.ajax({
                url:'/get/all/patients?keywords='+keywords+"&age_range="+age_range+"&visited_range="+visited_range+"&registered_range="+registered_range,


                success:function(response){
                    $("table.patient-list-table > tbody").html(response);
                }
            });*/

          //  setInterval(update_page, 8000);




        })



        function update_page(){
            return false;
            $.ajax({
                url:'/get/all/patients?all_patients='+total_patients,


                success:function(response){
                    if(response && response.trim()!="")
                    $("table.patient-list-table > tbody").html(response);
                }
            });
        }
    </script>
@endif
    {{--{!! Html::script('public/demo/demo-form-layouts.js') !!}--}}
@endsection