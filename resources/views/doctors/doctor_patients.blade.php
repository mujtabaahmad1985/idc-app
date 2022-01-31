@extends('layout.app')
@section('page-title') Dr. {!! $doctor->fname !!}'s Patient List @endsection
@section('css')
    {!! Html::style('public/material/js/plugins/dropify/css/dropify.min.css') !!}
    {!! Html::style('public/material/plugins/select2/css/select2.min.css') !!}
    {!! Html::style('public/material/js/signature_pad/docs/css/signature-pad.css') !!}
    {!! Html::style('public/material/css/jquery.timepicker.min.css') !!}
    <style>
        .table-responsive{ min-height: 90vh}
        .open-advance-search{
            position: absolute;
            right: 39px;
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
    </style>
@endsection

@section('content')


    <!-- START CONTENT -->
    <div class="content">




        @php
            $keyword = isset($_GET['keywords'])?$_GET['keywords']:"";
        @endphp


        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Dr. {!! $doctor->fname !!}'s Patient List</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="row">

                    {{--@if(in_array(3,$permissions_allowed) || Auth::user()->role=='administrator')
                        <div class="col col-4 align-self-center text-right">
                            <a href="/patients/add" id="add_patient_link" class="btn btn-danger">Add New Patient</a>
                        </div>
                    @endif--}}
                    <div class="col align-self-end">
                        <form>
                            <div class="input-group">
                                <input type="text" class="form-control" style="text-transform: none;" id="search-keywords" name="keywords" value="{!! $keyword !!}"
                                       placeholder="Search for patient..">
                                <span class="input-group-append">
                                            <a href="#!" class="open-advance-search"><i class="icon-circle-down2"></i> </a>
                                                        <button  id="search-patients"><i class="icon-search4"></i></button>
                                                    </span>
                            </div>


                        </form>
                        <div id="general-search" style="display: none">
                            <form>
                                <div class="advance-search-section card card-body">

                                    <div class="row">
                                        <div class="col-md-4">
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
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Gender:</label>
                                                <select name="gender" class="form-control">
                                                    <option value="">Select Gender</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">



                                        <div class="col-md-6">
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


                                        <div class="col-md-6">
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

                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 text-right">
                                            <button  class="btn btn-danger">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    @if(in_array(17,$permissions_allowed) || Auth::user()->role=='administrator')
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
                                <th>Media</th>


                                <th width="70px">Register at</th>
                                <th width="50px">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(in_array(17,$permissions_allowed) || Auth::user()->role=='administrator')
                                @if(isset($patients) && $patients->count() > 0)
                                    @foreach($patients as $p)

                                        @php
                                            $patient = $p->patients;
                                        @endphp
                                        @if(isset($patient))
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
                                                @if(in_array(42,$permissions_allowed) || Auth::user()->role=='administrator')           <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">

                                                    <a href="/patient/view/{!! $patient->id !!}" class="dropdown-item"><i class="icon-profile"></i> Profile</a>
                                                    <a href="#!" class="dropdown-item delete-patient"  data-patient-id="{!! $patient->id !!}"><i class="icon-cancel-square2"></i> Delete Patient</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="#!" class="dropdown-item patient-actions" data-action="sessions" data-patient-id="{!! $patient->id !!}"><i class="icon-history"></i> Past Sessions</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="/calendar/appointment/{!! $patient->id !!}/{!! strtolower(str_slug($patient->patient_name)) !!}" class="dropdown-item"><i class="icon-plus-circle2"></i> Make Appointment</a>
                                                    <a href="#!" class="dropdown-item"><i class="icon-alarm"></i>  Pending Appointments</a>
                                                    <a href="#!" class="dropdown-item patient-actions"  data-action="add-form" data-patient-id="{!! $patient->id !!}"><i class="icon-file-text"></i> Add Form</a>
                                                    <a href="#!" class="dropdown-item get-media" data-action="media" data-appointment-id="" data-treatment-id="" data-patient-id="{!! $patient->id !!}"><i class="icon-file-media"></i> Add Media</a>
                                                    <a href="#!" class="dropdown-item patient-actions"  data-action="refer-a-patient" data-patient-id="{!! $patient->id !!}"><i class="icon-link2"></i> Refer Patient </a>
                                                    <a href="#!" class="dropdown-item patient-actions"  data-action="contact-patient" data-patient-id="{!! $patient->id !!}"><i class="icon-address-book3"></i> Contact Patient </a>

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
                                            <td><div class="purple-text"><i class="icon-flag7"></i> </div> </td>
                                            <td >
                                                {!! !empty($patient->appointments()->first())? date('d.m.Y',strtotime($patient->appointments()->first()->booking_date)):"" !!}</a>
                                            </td>


                                            <td>{!! $patient->appointments()->count() !!}</td>
                                            <td>@if($patient->media_files()->count() > 0) <a href="#!" class="get-media" data-patient-id="{!! $patient->id !!}"><i class="icon-file-media"></i></a>   @endif</td>
                                            <td>{!! date('d.m.Y',strtotime($patient->created_at)) !!}</td>
                                            <td>
                                                @if(in_array(42,$permissions_allowed) || Auth::user()->role=='administrator')
                                                    <div class="ml-3">
                                                        <div class="list-icons">
                                                            <div class="list-icons-item dropdown">
                                                                <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-menu7"></i></a>
                                                                <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">

                                                                    <a href="/patient/view/{!! $patient->id !!}" class="dropdown-item"><i class="icon-profile"></i> Profile</a>
                                                                    <a href="#!" class="dropdown-item delete-patient"  data-patient-id="{!! $patient->id !!}"><i class="icon-cancel-square2"></i> Delete Patient</a>
                                                                    <div class="dropdown-divider"></div>
                                                                    <a href="/view/treatment-cards/{!! $patient->id !!}" class="dropdown-item"><i class="icon-book2"></i> Treatment Record</a>
                                                                    <a href="#!" class="dropdown-item patient-actions" data-action="sessions" data-patient-id="{!! $patient->id !!}"><i class="icon-history"></i> Past Sessions</a>
                                                                    <div class="dropdown-divider"></div>
                                                                    <a href="/calendar/appointment/{!! $patient->id !!}/{!! strtolower(str_slug($patient->patient_name)) !!}" class="dropdown-item"><i class="icon-plus-circle2"></i> Make Appointment</a>
                                                                    <a href="#!" class="dropdown-item"><i class="icon-alarm"></i>  Pending Appointments</a>
                                                                    <a href="#!" class="dropdown-item patient-actions"  data-action="add-form" data-patient-id="{!! $patient->id !!}"><i class="icon-file-text"></i> Add Form</a>
                                                                    <a href="#!" class="dropdown-item get-media" data-action="media" data-appointment-id="" data-treatment-id="" data-patient-id="{!! $patient->id !!}"><i class="icon-file-media"></i> Add Media</a>
                                                                    <a href="#!" class="dropdown-item patient-actions"  data-action="refer-a-patient" data-patient-id="{!! $patient->id !!}"><i class="icon-link2"></i> Refer Patient </a>
                                                                    <a href="#!" class="dropdown-item patient-actions"  data-action="contact-patient" data-patient-id="{!! $patient->id !!}"><i class="icon-address-book3"></i> Contact Patient </a>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                        @endif
                                    @endforeach

                                @endif
                            @else
                                <tr>
                                    <td colspan="6">
                                        <div class="alert bg-danger text-white text-center" style="display: block">

                                            <span class="font-weight-semibold">Oh snap!</span> You are not authorized to see patient list, please <a href="#" class="alert-link">contact administrator</a>.
                                        </div>
                                    </td>
                                </tr>
                            @endif
                            </tbody>
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

                                        <span class="font-weight-semibold">Oh snap!</span> You are not authorized to see patient list, please <a href="#" class="alert-link">contact administrator</a>.
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>


        </div>





    </div>


    <div id="patient-history" class="patient-history z-depth-1">
        <div class="progress">
            <div class="indeterminate"></div>
        </div>
    </div>

    <div id="appointment-pending-detail" class="modal " style="width:900px !important;" >
        <div class="modal-content">
            <div class="row">

                <h4 class="left">Pending Appointments</h4>
                <div class="col s1 right-align no-padding right">
                    <a href="#!" class="modal-action modal-close"><i class="material-icons">close</i></a>
                </div>
            </div>
            <div id="show-pending-appointment">
                <div class="progress"> <div class="indeterminate"></div></div>
            </div>

        </div>

    </div>


    <div id="saved-product-modal" class="modal " style="width:70% !important">
        <div class="modal-content">
            <div class="row">

                <h4 class="left">Products</h4>
                <div class="col s1 right-align no-padding right">
                    <a href="#!" class="modal-action modal-close"><i class="material-icons">close</i></a>
                </div>
            </div>
            <div id="product-saved">
                <div class="progress">
                    <div class="indeterminate"></div>
                </div>
            </div>

        </div>

    </div>
    <div id="sessions" class="modal " style="width:50% !important">
        <div class="modal-content">
            <div class="row">

                <h4 class="left">Sessions</h4>
                <div class="col s1 right-align no-padding right">
                    <a href="#!" class="modal-action modal-close"><i class="material-icons">close</i></a>
                </div>
            </div>
            <div id="sessions-saved">
                <div class="progress">
                    <div class="indeterminate"></div>
                </div>
            </div>

        </div>

    </div>



    <div id="consent-modal" class="modal " style="width:50% !important">
        <div class="modal-content">
            <div class="row">

                <h4 class="left">Patient's Consent</h4>
                <div class="col s1 right-align no-padding right">
                    <a href="#!" class="modal-action modal-close"><i class="material-icons">close</i></a>
                </div>
            </div>
            <div id="consent-saved">
                <div class="progress">
                    <div class="indeterminate"></div>
                </div>
            </div>

        </div>

    </div>

    <div id="advance-search" class="modal " style="width:400px !important">
        <div class="modal-content no-padding">
            <div class="heading red white-text">
                <div class="row">

                    <h4 class="left">Advance Search</h4>
                    <div class="col s1 right-align no-padding right">
                        <a href="#!" class="modal-action modal-close"><i class="material-icons">close</i></a>
                    </div>
                </div>
            </div>


            <div class="row search-dates">
                <div class="col s6 input-field ">

                    <input id="from_date" name="from_date" type="text" value=""  class="datepicker">

                </div>
                <div class="col s6 input-field  ">

                    <input id="to_date" name="to_date" type="text" value=""  class="datepicker">

                </div>

            </div>




        </div>

    </div>

    <div id="patient-consent" class="modal fade">
        <div class="modal-dialog" style="max-width:90% !important;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Patient Consent Form</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body patient-consent-show">

                </div>


            </div>
        </div>
    </div>


    <div id="patient-consent-form" class="modal" style="width: 535px !important">
        <div class="modal-content">
            <div class="row">

                <h4 class="left">Patient Consent Form</h4>
                <div class="col s1 right-align no-padding right">
                    <a href="#!" class="modal-action modal-close"><i class="material-icons">close</i></a>
                </div>
            </div>
            <div class="patient-consent-result">
                <div class="progress">
                    <div class="indeterminate"></div>
                </div>
            </div>


        </div>
    </div>

    <div id="patient-treatment-card" class="modal" style="width: 70% !important">
        <div class="modal-content">
            <div class="row">

                <h4 class="left">Treatment Cards </h4>
                <div class="col s1 right-align no-padding right">
                    <a href="#!" class="modal-action modal-close"><i class="material-icons">close</i></a>
                </div>
            </div>
            <div class="patient-result">
                <div class="progress">
                    <div class="indeterminate"></div>
                </div>
            </div>
            <div class="row">
                <div class="col s12 right-align"><a href="#!" class="add-treament-card">Add new treatment card</a> </div>
            </div>

        </div>
    </div>

    <div id="add-treatment-modal" class="modal ">
        <div class="modal-content">
            <div class="row">

                <h4 class="left">Add Treatment</h4>
                <div class=" col s1 right-align no-padding right">
                    <a href="#!" class="modal-action modal-close"><i class="material-icons">close</i></a>
                </div>
            </div>
            <div id="treatment-card">
                <div class="progress"> <div class="indeterminate"></div></div>
            </div>

        </div>

    </div>
    <div id="appointment-edit-detail" class="modal " style="width:700px !important;" >
        <div class="modal-content">
            {{-- <div class="row">

                 <h4 class="left">Show Appointment </h4>
                 <div class="col s1 right-align no-padding right">
                     <a href="#!" class="modal-action modal-close"><i class="material-icons">close</i></a>
                 </div>
             </div>--}}
            <div id="edit-appointment">
                <div class="progress"> <div class="indeterminate"></div></div>
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
    @if(in_array(17,$permissions_allowed) || Auth::user()->role=='administrator')

        <script>
            $(function () {


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