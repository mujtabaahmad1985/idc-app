@extends('layout.app')
@section('page-title') Calendar @endsection
@section('css')
    {!! Html::style('public/material/js/plugins/fullcalendar/css/fullcalendar.min.css') !!}
    {!! Html::style('public/material/css/jquery.timepicker.min.css') !!}
    {!! Html::style('public/bootstrap/assets/css/jquery.typeahead.css') !!}
<style>
    .add-more-options{
        position: absolute !important; right:0
    }
    .fc-icon:after {
        display: block !important;
        font-family: none;
        line-height: 11px !important;}

    #full-calendar {
        padding-top: 0px;
        position: fixed;
        height: 73%;
        overflow-y: scroll;
        overflow-x: hidden;
		width:85.5% !important;

    }
    .fc-axis{ width: 50px !important;}
    .fc-toolbar.fc-header-toolbar {
        position: fixed;
        top: 137px;
        background: white;
        z-index: 333;
        right: 42px;
        left: 275px;
        padding: 4px 10px 6px 10px;
        width: calc(100% - 280px);
    }
    .fc-head {
        position: fixed;
        z-index: 99;
        width: calc(100% - 302px);
        background: #FFF;
        margin-top: -21px;
    }
    .fc .fc-axis{ height: 20px !important;}
    #filter-search,#general-search{ display: none}
	.fc-time-grid .fc-bgevent, .fc-time-grid .fc-event{ padding: 2px;}
    #filter-search.active{
        display: block !important;}
    #general-search.active{
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
    .open-advance-search{
        position: absolute;right: 11px;z-index: 7;top: 12px;color: #9a9a9a;
    }
    .typeahead__list.collection{ max-height: 500px; overflow: auto}
    .sidebar-xs .card.d-none.d-md-block{
        display: none !important;}
    @media (min-width: 2880px){
        #full-calendar {
            width: 88.7% ;
        }
    }

    @media (max-width: 1440px) and (min-width: 1281px){
        #full-calendar {
            width: 1195px !important;

        }
        .fc-head {
            width: calc(100% - 246px);
        }
        .fc-toolbar.fc-header-toolbar {
            position: fixed;
            top: 137px;
            background: white;
            z-index: 333;
            right: 42px;
            left: 243px;
            padding: 4px 10px 6px 10px;
            width: calc(100% - 247px);
        }
    }

    @media (max-width: 1281px) and (min-width: 1024px){

        #full-calendar {
            width: 1051px !important;
            height: 77%;
        }
        .fc-head {
            width: calc(100% - 231px);
        }
        .fc-toolbar.fc-header-toolbar {


            left: 227px;
            width: calc(100% - 230px);
        }

    }
    @media (max-width: 1024px) {

        #full-calendar {
            width: 960px !important;
            overflow: auto;
            height: 80%;
        }
        #calendar{ width: 1100px;}
        .fc-head {
            position: relative;
        }
        .fc-toolbar.fc-header-toolbar {


            left: 227px;
            width: calc(100% - 230px);
        }
        .appointment-button-filters{ margin-top: 5px}
        .select2-selection--single{
            padding: .1375rem 0;}
        .add-more-options{ padding: 2px 7px }
        .fc-toolbar.fc-header-toolbar {
            left: 61px;
            width: calc(100% - 64px);
            top: 147px;
        }

        .fc .fc-toolbar>*>:first-child {
            margin-left: 0;
            font-size: 12px;
        }
        .fc button{
            padding: 0 .2em;
        }
        .typeahead__field input, .typeahead__field textarea, .typeahead__field [contenteditable], .typeahead__field .typeahead__hint{ height: 30px; min-height: calc(0.5rem * 2 + 0.25rem + 2px)}
        .open-advance-search{
            top: 7px;}
        .calendar-card{ margin-bottom: 22px !important;}
        
    }

    @media (max-width: 768px) {

        #full-calendar {
            width: 703px !important;
            overflow: auto;
            height: 80%;
        }
        #calendar{ width: 1100px;}
        .fc-head {
            position: relative;
        }
        .fc-toolbar.fc-header-toolbar {


            left: 61px;
            width: calc(100% - 65px);
        }


    }

    @media (max-width: 414px) {
        #full-calendar {
            width: 407px !important;
            overflow: auto;
            height: 66%;
        }
       #filter-appointment{ display: none !important;}
        #general-search{ display: block !important;}

        .fc-toolbar.fc-header-toolbar {
            left: 4px;
            width: calc(100% - 7px);
        }
        .fc-default_calendar-button,.fc-month-button,.fc-agendaTwoDay-button { display: none}
        .appointment-button-filters{ text-align: left !important;}

    }

    @media (max-width: 393px) {
        #full-calendar {
            width: 384px !important;
            overflow: auto;
            height: 66%;
        }
        #filter-appointment{ display: none !important;}
        #general-search{ display: block !important;}

        .fc-toolbar.fc-header-toolbar {
            left: 4px;
            width: calc(100% - 7px);
        }
        .fc-default_calendar-button,.fc-month-button,.fc-agendaTwoDay-button { display: none}
        .appointment-button-filters{ text-align: left !important;}
        .appointment-button-filters .btn-group-sm>.btn, .btn-sm {
            padding: .3125rem .65rem;
        }

    }


    @media (max-width: 375px) {
        #calendar {
            width: 800px;
        }
        #full-calendar {
            width: 368px !important;
            height: 63%;
        }
        .btn-group-sm>.btn, .btn-sm {
            padding: .3125rem .54rem;
        }
    }

</style>
@endsection

@section('content')
    <!-- START CONTENT -->
    <div class="content">



    @php
        $searched_doctor_id =  isset($searched_doctor_id)?$searched_doctor_id:0;
        $searched_location_id =  isset($searched_location_id)?$searched_location_id:0;
        $searched_service_id =  isset($searched_service_id)?$searched_service_id:0;

    @endphp
    <!--start container-->

        @if((in_array(5,$permissions_allowed) || Auth::user()->role=='administrator' ) )
        <div class="card calendar-card" style="margin-bottom: 57px">
            <div class="card-body">
            <div class="row">

                <div class="col-xl-7">
                    <div id="filter-search" class="active">
                    <form id="filter-appointment" action="/appoinment/get_filter_appointments" method="post" enctype="multipart/form-data">
                    <div class="row">
                        @if((in_array(10,$permissions_allowed) || Auth::user()->role=='administrator') )
                        <div class="col-md-4">

                            <div class="input-group">
                                 <span class="input-group-prepend">
												<button class="btn btn-light add-more-options" type="button"data-action="doctor"><i class="icon-plus3"></i> </button>
										</span>
                            <select class="form-control-sm select2" id="filter-doctors" name="doctors">
                                <option value="" selected >Select Doctor</option>
                                @if(isset($doctors) && count($doctors) > 0)

                                    @foreach($doctors as $doctor)
                                        <option value="{!! $doctor->id !!}" @if($searched_doctor_id==$doctor->id) selected @endif>{!! $doctor->fname.' '.$doctor->lname !!}</option>
                                    @endforeach
                                @endif
                            </select>

                            </div>
                        </div>
                        @endif
                            @if((in_array(11,$permissions_allowed) || Auth::user()->role=='administrator') )
                        <div class="col-md-4">
                            <div class="input-group">
<span class="input-group-prepend">
											<button class="btn btn-light add-more-options" type="button"data-action="location"><i class="icon-plus3"></i> </button>
										</span>
                                <select class="form-control-sm select2"  name="locations" >
                                    <option value="" selected >Select Location</option>

                                    @if(isset($locations) && count($locations) > 0)

                                        @foreach($locations as $location)
                                            <option value="{!! $location->id !!}" @if($searched_location_id==$location->id) selected @endif>{!! $location->name !!}</option>
                                        @endforeach
                                    @endif
                                </select>

                            </div>
                        </div>
                            @endif


                        <div class="col-md-4">
                            <div class="input-group">
                                 <span class="input-group-prepend">
												<button class="btn btn-light add-more-options" type="button"data-action="services"><i class="icon-plus3"></i> </button>
								</span>
                                <select class="form-control-sm select2" name="services">
                                    <option value="" selected >Select Service</option>
                                    @if(isset($services) && count($services) > 0)

                                        @foreach($services as $service)
                                            <option class=""  value="{!! $service->id !!}"  @if($searched_service_id==$service->id) selected @endif   data-duration="{!! date('H:i', strtotime($service->duration)) !!}">{!! substr($service->service_name,0,25) !!}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                    </div>
                    </form>
                    </div>
                    <div id="general-search" style="display: none">
                        <div class="typeahead__container">
                        <div class="typeahead__field">
                            <div class="typeahead__query">
                                <input class="js-typeahead form-control" name="q[query]" type="search"  placeholder="Search..." />
                            </div>
                            <a href="#!" class="open-advance-search"><i class="icon-circle-down2"></i> </a>
                        </div>
                        </div>
                        <div class="advance-search-section card card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Date:</label>
                                        <div class="input-group">
										<span class="input-group-prepend">
											<span class="input-group-text"><i class="icon-calendar22"></i></span>
										</span>
                                            <input type="text" class="form-control daterange-basic" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Doctor:</label>
                                        <div class="input-group">


                                            <select class="form-control-sm select2"  name="doctors">
                                                <option value="" selected disabled>Select Doctor</option>
                                                @if(isset($doctors) && count($doctors) > 0)

                                                    @foreach($doctors as $doctor)
                                                        <option value="{!! $doctor->id !!}" @if($searched_doctor_id==$doctor->id) selected @endif>{!! $doctor->fname.' '.$doctor->lname !!}</option>
                                                    @endforeach
                                                @endif
                                            </select>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Patient Name:</label>
                                        <div class="input-group">
                                            <input name="patient_search_id" type="hidden" />
                                            <select class="patient2 validate form-control input-sm" autocomplete="off" name="patient_name" data-error=".errorTxt2"></select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Location:</label>
                                        <div class="input-group">


                                            <select class="form-control-sm select2"  name="location" >
                                                <option value="" selected disabled>Select Location</option>

                                                @if(isset($locations) && count($locations) > 0)

                                                    @foreach($locations as $location)
                                                        <option value="{!! $location->id !!}" @if($searched_location_id==$location->id) selected @endif>{!! $location->name !!}</option>
                                                    @endforeach
                                                @endif
                                            </select>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Room:</label>
                                        <div class="input-group">

                                            <select class="form-control-sm select2"  name="location" >
                                                <option value="" selected disabled>Select Room</option>

                                                @if(isset($rooms) && count($rooms) > 0)

                                                    @foreach($rooms as $room)
                                                        <option value="{!! $room->id !!}">{!! $room->name !!}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Appointment:</label>
                                        <div class="input-group">

                                            <select class="form-control-sm select2" name="appointment_type">
                                                <option value="" selected disabled>Select Appointment Type</option>
                                                <option  value="pending">Pending Appointments</option>
                                                <option  value="confirmed">Confirmed</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label style="visibility: hidden;">Date:</label>
                                    <div class="input-group">
                                        <button type="button" class="btn btn-danger submit-advance-search" style="width: 100%">Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 text-right appointment-button-filters">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger btn-sm appointment-search-button"><i class="icon-search4"></i> </button>
                        @if((in_array(8,$permissions_allowed) || Auth::user()->role=='administrator') )
                        <button type="button" class="btn btn-danger calendar-options btn-sm"  data-option="room"> Room</button>
                        @endif
                            @if((in_array(9,$permissions_allowed) || Auth::user()->role=='administrator') )
                        <button type="button" class="btn btn-danger calendar-options btn-sm" data-option="staff">Staff</button>
                                @endif


                    </div>


                    <div class="btn-group">
                        @if(in_array(6,$permissions_allowed) || Auth::user()->role=='administrator')
                        <button type="button" class="btn btn-danger add-appointment btn-sm">Book Appointment</button>
                        @endif
                            @if((in_array(45,$permissions_allowed) || Auth::user()->role=='administrator') )
                        <button type="button" class="btn btn-danger block-time-btn btn-sm">Block Time</button>
                                @endif

                    </div>
                </div>
            </div>
            </div>
        </div>






        <div class="card">
            <div id="full-calendar">
                <div class="row">

                    <div class="col s12 m12 l12">

                        <div id='calendar'></div>

                    </div>
                </div>
            </div>
        </div>











            <div id="search-appointments-panel" class="modal fade">
                <div class="modal-dialog modal-full">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Appointments</h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <div class="modal-body">

                            <div class="card card-body">

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


        <div id="appointment-panel" class="modal fade">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Make Appointment</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">
                        <div id="make-appointment">
                            <div class="progress"> <div class="indeterminate"></div></div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <div id="block-time" class="modal fade">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Block Time</h5>
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





            <div id="patient-consent" class="modal" style="width: 70% !important">
                <div class="modal-content">
                    <div class="row">

                        <h4 class="left">Patient Consent Form</h4>
                        <div class="col s1 right-align no-padding right">
                            <a href="#!" class="modal-action modal-close"><i class="material-icons">close</i></a>
                        </div>
                    </div>
                    <div class="patient-consent-show">
                        <div class="progress">
                            <div class="indeterminate"></div>
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
            <div id="patient-view-panel" class="modal " style="width:90% !important" >
                <div class="modal-content">
                    <div class="row">

                        <h4 class="left">Patient Treatment Record | International Dental Centre,Singapore </h4>
                        <div class="col s1 right-align no-padding right">
                            <a href="#!" class="modal-action modal-close"><i class="material-icons">close</i></a>
                        </div>
                    </div>
                    <div id="patient-history">
                        <div class="progress"> <div class="indeterminate"></div></div>
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
            <div id="patient-consent-modal" class="modal " >
                <div class="modal-content">
                    <div class="row">
                        <h4 class="left">Patient Consent Form</h4>
                        <div class="col s1 right-align no-padding right">
                            <a href="#!" class="modal-action modal-close"><i class="material-icons">close</i></a>
                        </div>
                    </div>
                    <div id="consent-form">
                        <div class="progress"> <div class="indeterminate"></div></div>
                    </div>

                </div>

            </div>
            <div id="patient-product-modal" class="modal " style="width:70% !important" >
                <div class="modal-content">
                    <div class="row">

                        <h4 class="left">Products</h4>
                        <div class="col s1 right-align no-padding right">
                            <a href="#!" class="modal-action modal-close"><i class="material-icons">close</i></a>
                        </div>
                    </div>
                    <div id="product-form">
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
                        <div class="progress"> <div class="indeterminate"></div></div>
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
                        <div class="progress"> <div class="indeterminate"></div></div>
                    </div>

                </div>

            </div>
            <div id="next-appointment-modal" class="modal " style="width:50% !important">
                <div class="modal-content">
                    <div class="row">

                        <h4 class="left">Next Appointment</h4>
                        <div class="col s1 right-align no-padding right">
                            <a href="#!" class="modal-action modal-close"><i class="material-icons">close</i></a>
                        </div>
                    </div>
                    <div id="consent-saved">
                        <div class="progress"> <div class="indeterminate"></div></div>
                    </div>

                </div>

            </div>

                <div id="add-doctor" class="modal fade">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Doctor</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form class="col s12" id="doctor-form" method="post" action="/doctor/add_doctor" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input id="first_name" name="first_name" type="text" class="validate form-control" required data-error=".errorTxt1">
                                   </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input id="last_name" name="last_name" type="text" class="validate form-control" required data-error=".errorTxt2">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input id="email" type="email" class="small-text-formatting form-control" name="email"   data-error=".errorTxt4">
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-sm-12">
                                <div class="form-group">

                                    <button class="btn btn-danger save-doctor" style="width:100%;">Save Doctor</button>
                                </div>

                            </div>

                        </div>


                    </form>
                </div>


            </div>
        </div>
    </div>

                <div id="add-service" class="modal fade">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Service</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form class="col s12" id="service-form" method="post" action="/service/add_service" enctype="multipart/form-data">
                    {{ csrf_field() }}

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Service Name</label>
                                    <input id="service_name" name="service_name" type="text" class="validate form-control" required data-error=".errorTxt1">
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-sm-12">
                                <div class="form-group">

                                    <button class="btn btn-danger  save-service" style="width:100%;">Save Service</button>
                                </div>

                            </div>

                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>


                <div id="add-location" class="modal fade">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Location</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form class="col s12" id="location-form" method="post" action="/location/add_location" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input id="name" name="name" type="text" class="validate form-control" required data-error=".errorTxt1">
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-sm-12">
                                <div class="form-group">

                                    <button class="btn btn-danger  save-location" style="width:100%;">Save Location</button>
                                </div>

                            </div>

                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>






        </div>
@else
    <div class="card">
        <div class="card-body">
            <div class="row text-center">
                <div class="col-md-12">
                <div class="alert bg-danger text-white text-center" style="display: block">

                    <span class="font-weight-semibold">Oh snap!</span> You are not authorized to this page, please <a href="#" class="alert-link">contact administrator</a>.
                </div>
            </div></div>
        </div>
    </div>
    @endif
        <!--end container-->





    <!-- END CONTENT -->
@endsection



@section('js')

    {!! Html::script('/bootstrap/js/plugins/forms/styling/uniform.min.js') !!}
    {!! Html::script('/bootstrap/js/plugins/forms/selects/bootstrap_multiselect.js') !!}
    {!! Html::script('/bootstrap/js/plugins/jquery.typeahead.min.js') !!}
    {!! Html::script(url('/').'/bootstrap/js/plugins/tables/datatables/datatables.min.js') !!}
    {!! Html::script(url('/').'/bootstrap/js/plugins/tables/datatables/dataTables.buttons.min.js') !!}
    {!! Html::script('public/material/js/plugins/fullcalendar/js/fullcalendar.min.js') !!}
    {!! Html::script('public/material/js/plugins/fullcalendar/lib/moment.min.js') !!}
    {!! Html::script('public/js/jquery.form.js') !!}
    {!! Html::script('public/plugins/jquery.validate/js/jquery.validate.min.js') !!}
    {!! Html::script('public/material/js/fullcalendar.min.js') !!}
    {!! Html::script('public/material/js/scheduler.min.js') !!}
    {!! Html::script('public/js/jquery-ui.js') !!}
    {!! Html::script('public/material/js/jquery.timepicker.min.js') !!}
    {!! Html::script('public/material/js/signature_pad/docs/js/signature_pad.umd.js') !!}
    {!! Html::script('public/material/js/masonry.min.js') !!}

    @if((in_array(5,$permissions_allowed) || Auth::user()->role=='administrator') )
    <script>
        var calendar = null;
        var start_calendar_time = "09:00:00";
        var end_calendar_time = "19:30:00";
        var patient_id = "{!! isset($patient_id)?$patient_id:'0' !!}";
        var patient_name = "{!! isset($patient_name)?$patient_name:'' !!}";
        var doctor_id= 0;
        var location_id = 0;
        var searched_doctor_id = "{!! $searched_doctor_id !!}";
        var searched_location_id = "{!! $searched_location_id !!}";
        var calendar_type = "agendaWeek";
        var resource_type = "room";
        var room_ids = [{!! implode(',',$rooms->pluck('id')->all()) !!}];

        var menu_action = "{!! Request::get('action') !!}";
        var hashfull = document.location.hash;


        if(searched_doctor_id!="")
            doctor_id = searched_doctor_id;

        if(searched_location_id!="")
            location_id = searched_location_id;



        var un_available_doctor_id = 0;
        $(function () {

            $("body").on('click','.searched-show-appointment',function(){

                var appointment_id = $(this).data('appointment-id');
                $("#show-appointment").html('<div class="progress"> <div class="indeterminate"></div></div>');

                $("#appointment-show-detail").modal();
                //$("#appointment-show-detail").css('z-index','1999');

                // $("#patient-appointment").animate({right:'0'});
                // $("#patient-appointment").html('<div class="progress"> <div class="indeterminate"></div></div>');
                // return;
                $.ajax({
                    url:"/show/appointment/"+appointment_id,
                    success: function(doc){
                        $("#show-appointment").html(doc);

                        $(".close-patient-appointment").click(function(){
                            //  $("#patient-appointment").animate({right:'-360px'});
                        });


                    }
                });
            });

            $(".open-advance-search").click(function(){
                $(".advance-search-section").toggleClass('active');
            });

            $.typeahead({
                input: ".js-typeahead",
                order: "asc",
                minLength: 3,
                maxItem: 20,
                dynamic: true,
                emptyTemplate: 'No result for "@{{query}}"',
                display:"display",
                template:
                    '<i class="icon-user"></i> '+
                    '<span class="title">@{{text}}</span>'+
                    '<p class="text-muted">Patient'+

                    '</p>',
                source: {
                    patient: {
                        display:"text",

                        ajax: function (query) {
                            return {
                                url: "/search/patient",
                                type:"get",
                                path: "data.patient",
                                data: {
                                    q: query,
                                    keyword:$(".js-typeahead").val()

                                }
                            }
                        },

                        // Ajax Request

                    },
                    doctors: {
                        display:"text",
                        template:
                            '<i class="icon-user"></i> '+
                            '<span class="title">@{{text}}</span>'+
                        '<p class="text-muted">Doctor'+

                            '</p>',

                        ajax: function (query) {
                            return {
                                url: "/search/doctors",
                                type:"get",
                                path: "data.doctors",
                                data: {
                                    q: query,
                                    keyword:$(".js-typeahead").val()

                                }
                            }
                        },
                        // Ajax Request

                    },
                    services: {
                        // href:"http://google.com",
                        display:"text",
                        template:
                            '<i class=icon-lab" ></i>'+
                            '<span class="title">@{{text}}</span>'
                        ,
                        ajax: function (query) {
                            return {
                                url: "/search/services",
                                type:"get",
                                path: "data.services",
                                data: {
                                    q: query,
                                    keyword:$(".js-typeahead").val()

                                }
                            }
                        },
                        // Ajax Request

                    },
                    /*clinical: {
                        display:"text",
                        template:
                            '<i class="icon-location4"></i>'+
                            '<span class="title">@{{text}}</span>',
                        ajax: function (query) {
                            return {
                                url: "/search/clinical",
                                type:"get",
                                path: "data.clinical",
                                data: {
                                    q: query,
                                    keyword:$(".js-typeahead").val()

                                }
                            }
                        },
                        // Ajax Request

                    },*/
                    rooms: {
                        display:"text",
                        template:
                            '<i class="icon-bed2"></i> '+
                            '<span class="title">@{{text}} - @{{short_name}}</span>',
                        ajax: function (query) {
                            return {
                                url: "/search/rooms",
                                type:"get",
                                path: "data.rooms",
                                data: {
                                    q: query,
                                    keyword:$(".js-typeahead").val()

                                }
                            }
                        },
                        // Ajax Request

                    },

                },


                callback: {
                    onClickAfter: function (node, a, item, event) {
                       var keywords= item.text;
                       var keyword = keywords.split(' ');
                        $("#search-appointments-panel").modal();
                       $.ajax({
                           url:"/search/appointments?q="+keyword[0],
                           success:function(response){
                               $("#search-appointments-panel .card-body").html(response);
                               $(".appointments-table").dataTable({
                                   autoWidth: false,
                                   searching: false,
                                   "bInfo" : false,
                                   "lengthChange": false,
                                   "drawCallback": function( settings ) {
                                       $("#search-appointments-panel thead").remove(); }
                               });
                           }
                       });
                //    console.log(item.text);
                    },
                    onResult: function (node, query, result, resultCount) {
                        //   if (query === "") return;

                        var text = "";
                        if (result.length > 0 && result.length < resultCount) {
                            text = "Showing <strong>" + result.length + "</strong> of <strong>" + resultCount + '</strong> elements matching "' + query + '"';
                        } else if (result.length > 0) {
                            text = 'Showing <strong>' + result.length + '</strong> elements matching "' + query + '"';
                        } else {
                            text = 'No results matching "' + query + '"';
                        }
                        $('#result-container').html(text);

                    },
                },

            });



            $(".appointment-search-button").click(function(){
                   // $("#search-panel").modal();
                $("#filter-search").toggleClass('active');
                $("#general-search").toggleClass('active');
            });

            $('.daterange-basic').daterangepicker({
                applyClass: 'bg-slate-600',
                cancelClass: 'btn-light'
            });

            $(window).scroll(function() {
                if ($(this).scrollTop() > 1){
                    $('.fc-border-separate thead').addClass("sticky");
                }
                else{
                    $('.fc-border-separate thead').removeClass("sticky");
                }
            });


            $('.select2').select2();



            $('select[name=patient_name]').select2({

                placeholder: "Enter Patient ",

                allowClear: true,

                minimumInputLength: 3,

                templateResult:patient_result_template1,

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

            }).on('change', function(){

                var id = $(this).val();

//alert();





                if(id > 0){







                    $("input[name=patient_search_id]").val(id);



                    $(this).parents('form').find('.new-patient-info').hide();

                }else{



                    $(this).parents('form').find('.new-patient-info').show();

                    //  const ps3 = new PerfectScrollbar('.booking-appointment');

                }

            });
            $(".add-more-options").click(function(){
                var action = $(this).attr('data-action');

                switch(action){
                    case "doctor":
                        $("#add-doctor").modal();
                    break;
                    case "services":
                        $("#add-service").modal();
                     break;
                    case "location":
                        $("#add-location").modal();
                        break;


                }
            });

            $(".save-doctor").click(function(){
                if($("#doctor-form").valid()){
                    $("#doctor-form").ajaxForm(function(response){
                        response = $.parseJSON(response);

                        if(response.type=='success'){
                            var newOption = new Option(response.name, response.id, true, true);
                            // Append it to the select
                            $('#filter-doctors').append(newOption).trigger('change');
                            $("#add-doctor").modal('hide');
                        }
                    });
                }
            });


            $(".save-service").click(function(){
                if($("#service-form").valid()){
                    $("#service-form").ajaxForm(function(response){
                        response = $.parseJSON(response);

                        if(response.type=='success'){
                            var newOption = new Option(response.name, response.id, true, true);
                            // Append it to the select
                            $('.services_').append(newOption).trigger('change');
                            $("#add-service").modal('hide');
                        }
                    })
                }
            });

            $(".save-location").click(function(){
                if($("#location-form").valid()){
                    $("#location-form").ajaxForm(function(response){
                        response = $.parseJSON(response);

                        if(response.type=='success'){
                            var newOption = new Option(response.name, response.id, true, true);
                            // Append it to the select
                            $('.locations').append(newOption).trigger('change');
                            $("#add-location").modal('hide');
                        }
                    }).submit();
                }
            });


            $(".block-time-btn").click(function(){
             //   const book_time = new PerfectScrollbar('#block-time');

                $("#block-time").modal();
                $("#block-time  .modal-body").html('<div class="progress"> <div class="indeterminate"></div></div>');
                // return;
                $.ajax({
                    url:"/block-time/get",
                    success: function(doc){
                        $("#block-time  .modal-body").html(doc);
                        $("#block_date").focusin();
                        $(".save-block-time").click(function(e){
                            $(".message").hide();

                            if($("#slide-block-form").valid()){

                                $("#slide-block-form").ajaxForm(function(response){
                                    response = $.parseJSON(response);
                                    if(response.type=="success"){
                                        $('.alert-success-block-time').html(response.message);
                                        $('.alert-success-block-time').fadeIn();
                                        calendar.fullCalendar('refetchEvents');

                                        setTimeout(function(){$('.alert-success-block-time').fadeOut();
                                            $("#slide-block-form").resetForm();


                                            $("#block-time").modal('hide');

                                        }, 2500);
                                    }else{
                                        $('.error-message').html(response.message);
                                        $('.error-message').fadeIn();
                                    }
                                }).submit();
                            }
                            e.preventDefault();
                        });

                    }
                });
            });




                $(".today-tasks").click(function(){
                 //   const task_panel = new PerfectScrollbar('#task-panel');

                    $("#task-panel").animate({right:'0'});
                    $("#task-panel").html('<div class="progress"> <div class="indeterminate"></div></div>');
                    // return;
                    $.ajax({
                        url:"/tasks/get",
                        success: function(doc){
                            $("#task-panel").html(doc);

                            $(".close-task-panel").click(function(){
                                $("#task-panel").animate({right:'-360px'});
                            });

                            $("#task-panel input:checkbox").change(function () {

                                $(this).is(":checked") ? $(this).next().css("text-decoration", "line-through") : $(this).next().css("text-decoration", "none");
                            });


                        }
                    });
                });







           // $('select[name=patient_id]').material_select('destroy');



            $(".save-appointment").click(function(e){
                $(".alert").hide();
                $validation = $("#slide-booking-form").validate({
                    // Validation rules
                    // Selecting input by name attribute
                    rules: {

                        service_id: {
                            required: true
                        },
                        location_id: {
                            required: true
                        },
                        room_id: {
                            required: true
                        },
                        doctor_id: {
                            required: true
                        },
                        patient_name: {
                            required: true
                        },
                    },
                    // Error messages
                    messages: {

                    },
                    highlight: function(element, errorClass, validClass) {
                        $(element).closest('.form-group').addClass('has-error').find('label').addClass('control-label');
                    },
                    unhighlight: function(element, errorClass, validClass) {
                        $(element).closest('.form-group').removeClass('has-error');
                    },
                    // Class that wraps error message
                    errorClass: "help-block",
                    focusInvalid: true,
                    // Element that wraps error message
                    errorElement : 'div',
                    errorPlacement: function(error, element) {
                        console.log(element);
                        var placement = $(element).data('error');
                        if (placement) {
                            $(placement).append(error)
                        } else {
                            error.insertAfter(element);
                        }
                    },
                    success: function(helpBlock) {
                        if( $(helpBlock).closest(".form-group").hasClass('has-error') ){
                            $(helpBlock).closest(".form-group").removeClass("has-error").addClass("has-success");
                        }
                    }
                });
                if($("#slide-booking-form").valid()){

                    $("#slide-booking-form").ajaxForm(function(response){
                        response = $.parseJSON(response);
                        if(response.type=="success"){
                            $('.alert-success-appointment').html(response.message);
                            $('.alert-success-appointment').fadeIn();
                            calendar.fullCalendar('refetchEvents');

                            setTimeout(function(){$('.alert-success-appointment').fadeOut();
                                $("#slide-booking-form")[0].reset();
                                $(".new-patient-info").hide();

                            }, 2500);
                        }else{
                            $('.error-message').html(response.message);
                            $('.error-message').fadeIn();
                        }
                    }).submit();
                }
                e.preventDefault();
            });

            $(".save-appointment-modal").click(function(e){
                $(".message").hide();
                $validation = $("#modal-booking-form").validate({
                    // Validation rules
                    // Selecting input by name attribute
                    rules: {

                        service_id: {
                            required: true
                        },
                        location_id: {
                            required: true
                        },
                        room_id: {
                            required: true
                        },
                        doctor_id: {
                            required: true
                        },
                        patient_name: {
                            required: true
                        },
                    },
                    // Error messages
                    messages: {

                    },
                    highlight: function(element, errorClass, validClass) {
                        $(element).closest('.form-group').addClass('has-error').find('label').addClass('control-label');
                    },
                    unhighlight: function(element, errorClass, validClass) {
                        $(element).closest('.form-group').removeClass('has-error');
                    },
                    // Class that wraps error message
                    errorClass: "help-block",
                    focusInvalid: true,
                    // Element that wraps error message
                    errorElement : 'div',
                    errorPlacement: function(error, element) {
                        var placement = $(element).data('error');
                        if (placement) {
                            $(placement).append(error)
                        } else {
                            error.insertAfter(element);
                        }
                    },
                    success: function(helpBlock) {
                        if( $(helpBlock).closest(".form-group").hasClass('has-error') ){
                            $(helpBlock).closest(".form-group").removeClass("has-error").addClass("has-success");
                        }
                    }
                });
                if($("#modal-booking-form").valid()){

                    $("#modal-booking-form").ajaxForm(function(response){
                        response = $.parseJSON(response);
                        if(response.type=="success"){
                            $('.success-message').html(response.message);
                            $('.success-message').fadeIn();
                            calendar.fullCalendar('refetchEvents');

                            setTimeout(function(){$('.success-message').fadeOut();
                                $("#modal-booking-form")[0].reset();
                                $(".new-patient-info").hide();
                                $("#appointment-modal").modal('hide');
                            }, 2500);
                        }else{
                            $('.error-message').html(response.message);
                            $('.error-message').fadeIn();
                        }
                    }).submit();
                }
                e.preventDefault();
            });

            $(".add-appointment").click(function(){
              //  $('#appointment-modal').modal();;
                    var strTime = "00:00";
                  //  var strTime = "00:00";
                $.ajax({
                    url:"/make/appointment",
                    type:"POST",
                    data:{"_token":"{!! csrf_token() !!}",strTime:strTime, patient_id:patient_id, patient_name:patient_name,doctor_id:doctor_id,un_available_doctor_id:un_available_doctor_id},
                    success:function (response) {
                        var calendar = calendar;
                        $("#make-appointment").html(response);



                    }
                });
                $("#appointment-panel").modal();
            });
                        $(".calendar-options").click(function(){
                            var options = $(this).attr('data-option');
                            $("#calendar").fullCalendar('destroy');
                            $(".day-options").hide();
                            switch(options){

                                case "room":

                                    $(".day-options").show();
                                    $("#calendar").fullCalendar({
                                        minTime:start_calendar_time,
                                        maxTime:end_calendar_time,
                                        defaultView: 'agendaDay',
                                        allDaySlot:false,
                                        editable: true,
                                        height: "auto",
										 timeZone: 'America/Singapore',
                                        selectable: true,
                                        eventLimit: true, // allow "more" link when too many events
                                        slotDuration: "00:15:00",
                                        slotMinutes: 15,
                                        navLinks: true,
                                        eventOverlap:false,
                                        refetchResourcesOnNavigate: true,
                                        navLinkDayClick: function(date, jsEvent) {
                                        // alert(date);
                                            calendar.fullCalendar('changeView', 'agendaDay');
                                            calendar.fullCalendar('gotoDate', date);
                                        },
                                        columnFormat: 'ddd M/D',
                                        columnHeaderFormat : 'ddd M/D',
                                        /* eventConstraint: {
                                         start: moment().format('YYYY-MM-DD HH:mm'),
                                         //  end: '2100-01-01' // hard coded goodness unfortunately
                                         },
                                         businessHours: {
                                         start: moment().format('HH:mm'), /!* Current Hour/Minute 24H format *!/
                                         // end: '19:00', // 5pm? set to whatever
                                         dow: [0,1,2,3,4,5,6] // Day of week. If you don't set it, Sat/Sun are gray too
                                         },
                                         droppable: true, // this allows things to be dropped onto the calendar
                                         drop: function () {
                                         // is the "remove after drop" checkbox checked?
                                         if ($("#drop-remove").is(":checked")) {
                                         // if so, remove the element from the "Draggable Events" list
                                         $(this).remove();
                                         }
                                         },*/
                                        header: {
                                            left: 'prev,next today,default_calendar',
                                            center: 'title',
                                            right: 'agendaDay,agendaTwoDay,agendaWeek,month'
                                        },
                                        customButtons: {
                                            default_calendar: {
                                                text: 'Default Calendar',
                                                click: function() {
                                                   // $("#calendar").fullCalendar('destroy');
                                                    set_calendar($("#calendar"));
                                                   // $("#calendar").fullCalendar('changeView', 'agendaWeek');
                                                   // calendar.fullCalendar('gotoDate');
                                                }
                                            }
                                        },
                                        views: {
                                            agendaTwoDay: {
                                                columnHeaderFormat : 'ddd M/D',
                                                columnFormat: 'ddd M/D',
                                                type: 'agenda',
                                                duration: { days: 2 },

                                                // views that are more than a day will NOT do this behavior by default
                                                // so, we need to explicitly enable it
                                                groupByResource: true,


                                                //// uncomment this line to group by day FIRST with resources underneath
                                                //groupByDateAndResource: true
                                            },
                                            day: {
                                                titleFormat: 'dddd, MMMM DD YYYY'
                                            }
                                        },
                                        dayClick: function (date, jsEvent, view) {

                                            var d = new Date(date.format());
                                            var selected_date = d.getDate()+"."+(d.getMonth()+1)+"."+d.getFullYear();
                                            var  s_date = d.getTime();

                                            var check = s_date;

                                            var today = new Date();

                                            today = today.getTime();

                                            if(check < today){


                                            }


                                            if (jsEvent.target.classList.contains('fc-bgevent')) {

                                                un_available_doctor_id = jsEvent.target.attributes[1].nodeValue;
                                                return false;

                                            }
                                            //  alert();
                                            var duration = $(".services").find(":selected").data("duration");
                                            ;


                                           // var d = new Date(date.format());
                                          //  var selected_date =  d.getDate()+"."+(d.getMonth()+1)+"."+d.getFullYear();
                                            $("#appointment_date").val(selected_date);
                                            $("#appointment_date").focusin();
                                            //d.setMinutes();
                                            var hours = d.getHours();
                                            var minutes = d.getMinutes();
                                            var ampm = hours >= 12 ? 'PM' : 'AM';
                                            hours = hours % 12;
                                            hours = hours ? hours : 12; // the hour '0' should be '12'
                                            minutes = minutes < 10 ? '0' + minutes : minutes;
                                            var strTime = hours + ':' + minutes + ' ' + ampm;
                                            $("#start_time").val(strTime);
                                            $("#start_time").focusin();
                                            var add_minute = 0;
                                            if (duration) {
                                                duration = (duration.split(':'));
                                                add_minute = (parseInt(duration[0]) * 60 + parseInt(duration[1]));
                                                d.setMinutes(minutes + add_minute);
                                                hours = d.getHours();
                                                minutes = d.getMinutes();
                                                ampm = hours >= 12 ? 'PM' : 'AM';
                                                hours = hours % 12;
                                                hours = hours ? hours : 12; // the hour '0' should be '12'
                                                minutes = minutes < 10 ? '0' + minutes : minutes;
                                                strTime = hours + ':' + minutes + ' ' + ampm;
                                                $("#end_time").val(strTime);
                                                $("#end_time").focusin();
                                            }

                                            $("#booking_type").val('appointment');
                                            $("#booking-appointment").animate({right:'0'});
                                            //  $(".make-booking").find('[data-toggle=dropdown]').attr('aria-expanded','true');
                                            // change the day's background color just for fun

                                        },
                                        buttonText: {
                                            today: 'Today',
                                            month: 'Month',
                                            week: 'Week',
                                            day: 'Day'
                                        },
                                        //// uncomment this line to hide the all-day slot
                                        //allDaySlot: false,

                                        resources: [
                                        @foreach($rooms as $room)
                                        { id: '{!! $room->id !!}', title: '{!! $room->name !!}' },
                                        @endforeach


                                        ],
                                        dayClick: function (date, jsEvent, view,resource) {
                                            // alert(date);

                                            if (view.name === "month") {

                                                calendar.fullCalendar('changeView', 'agendaDay');
                                                calendar.fullCalendar('gotoDate', date);
                                                return false;
                                            }
                                            var duration = $(".services").find(":selected").data("duration");
                                            ;


                                            var d = new Date(date.format());
                                            var selected_date = d.getDate()+"."+(d.getMonth()+1)+"."+d.getFullYear();

                                            $("#appointment_date").val(selected_date);
                                            $("#appointment_date").focusin();
                                            //d.setMinutes();
                                            var hours = d.getHours();
                                            var minutes = d.getMinutes();
                                            var d = new Date(date.format());

                                            var ampm = "";//hours >= 12 ? 'PM' : 'AM';
                                            // hours = hours % 12;
                                            // hours = hours ? hours : 12; // the hour '0' should be '12'
                                            minutes = minutes < 10 ? '0' + minutes : minutes;
                                            var strTime = hours + ':' + minutes + ' ' + ampm;
                                            $("#start_time").val(strTime);
                                            $("#start_time").focus();
                                            var add_minute = 0;
                                            if (duration) {
                                                duration = (duration.split(':'));
                                                add_minute = (parseInt(duration[0]) * 60 + parseInt(duration[1]));
                                                d.setMinutes(minutes + add_minute);
                                                hours = d.getHours();
                                                minutes = d.getMinutes();
                                                ampm = "";//hours >= 12 ? 'PM' : 'AM';
                                                //hours = hours % 12;
                                                // hours = hours ? hours : 12; // the hour '0' should be '12'
                                                minutes = minutes < 10 ? '0' + minutes : minutes;
                                                strTime = hours + ':' + minutes + ' ' + ampm;
                                                $("#end_time").val(strTime);
                                                $("#end_time").focusin();
                                            }
                                           /* $("#booking_type").val('appointment');
                                             $("#booking-appointment").animate({right:'0'});*/
                                            $("#booking_type").val('appointment');
                                            // $("#booking-appointment").animate({right:'0'});
                                            $.ajax({
                                                url:"/make/appointment",
                                                type:"POST",
                                                data:{"_token":"{!! csrf_token() !!}",strTime:strTime,selected_date:selected_date, patient_id:patient_id, patient_name:patient_name,doctor_id:doctor_id, room_id:resource.id,un_available_doctor_id:un_available_doctor_id},
                                                success:function (response) {
                                                    var calendar = calendar;
                                                    $("#make-appointment").html(response);



                                                }
                                            });
                                            $("#appointment-panel").modal();

                                            //  $(".make-booking").find('[data-toggle=dropdown]').attr('aria-expanded','true');
                                            // change the day's background color just for fun

                                        },
                                        events:function(start, end, timezone, callback){
                                            $.ajax({
                                                url: '/appoinment/get_appointments/all/0',
                                                dataType: 'json',

                                                success: function(doc) {
                                                    //    console.log(doc);
                                                    var events = [];
                                                    $(doc).each(function(i,v) {
                                                        if(v.appointment_type=='appointment'){
                                                            events.push({
                                                                id: v.id,
                                                                title: v.title,
                                                                start: v.start, // will be parsed
                                                                end: v.end, // will be parsed
                                                                resourceId:v.room_id,
                                                                color:v.appointment_type=='appointment'?v.room_color:v.color,
                                                                status:v.status
                                                            });
                                                        }else{
                                                            events.push({
                                                                id: v.id,
                                                                title: v.room_id || v.doctor_id?v.title:"These slots are blocked for all rooms",
                                                                start: v.start, // will be parsed
                                                                end: v.end, // will be parsed
                                                                resourceIds:(v.room_id?[v.room_id]:room_ids),
                                                                color:v.color,
                                                                status:v.status,

                                                            });
                                                        }
                                                    });
                                                    callback(events);
                                                }
                                            });
                                            /*$.ajax({
                                                url: '/get/not-availabile/'+doctor_id,
                                                dataType: 'json',

                                                success: function(doc) {
                                                    console.log(doc);
                                                    var events = [];
                                                    $(doc).each(function(i,v) {
                                                        events.push({
                                                            id: v.id,
                                                            title: v.title,
                                                            start: v.start, // will be parsed
                                                            end: v.end, // will be parsed
                                                            rendering: 'background'
                                                        });
                                                    });

                                                    // events.push(j);
                                                    callback(events);
                                                }
                                            });*/
                                        },
                                        eventRender: function(event, element, view) {
                                            if (event.rendering == 'background') {
                                                element.append(event.title);
                                                element.attr('data-doctor-id',event.doctor_id);
                                            }

                                            if(event.status=="completed"){
                                                console.log(event.id);
                                                element.prepend('<span class="new badge teal darken-4" data-badge-caption="Confirmed"></span>')  ;
                                            }

                                            if(event.status=="cancelled"){
                                                console.log(event.id);
                                                element.prepend('<span class="new badge red darken-4" data-badge-caption="Cancelled"></span>')  ;
                                            }
                                            // console.log(event);
                                            //alert("Start: "+event.start.format("YYYY-MM-DD hh:mma")+"<br> End: "+event.end.format("YYYY-MM-DD hh:mma"));
                                            /// alert(event.end);

                                        },
                                        select: function(start, end, jsEvent, view, resource) {
                                            var check = new Date(start.format());

                                            var today = new Date();

                                            if(check < today)
                                                return false;

                                        },
                                        eventClick:function(event, jsEvent, view){
                                            $("#show-appointment").html('<div class="progress"> <div class="indeterminate"></div></div>');
                                            $("#appointment-show-detail").modal();

                                            var appointment_id = event.id;
                                            // $("#patient-appointment").animate({right:'0'});
                                            // $("#patient-appointment").html('<div class="progress"> <div class="indeterminate"></div></div>');
                                            // return;
                                            $.ajax({
                                                url:"/show/appointment/"+appointment_id,
                                                success: function(doc){
                                                    $("#show-appointment").html(doc);

                                                    $(".close-patient-appointment").click(function(){
                                                        //  $("#patient-appointment").animate({right:'-360px'});
                                                    });


                                                }
                                            });

                                        }
                                        ,
                                        eventDrop:function(event, delta, revertFunc){

                                            var id = event.id;
                                            var resource_id = event.resourceId;
                                            var end_time = event.end.format();
                                            var start_time = event.start.format();

                                            $(".overlay").show();
                                            $(".overlay .progress").show();
                                            $(".overlay .message").hide();
                                            $.ajax({
                                                url: "/appointment/update_resize",
                                                data:{resource_type:"room",resource_id:resource_id,id:id,end_time:end_time, start_time:start_time, "_token":"{!! csrf_token() !!}"},
                                                type:"POST",
                                                success:function(response){
                                                    if(response > 0){
                                                        $(".overlay .progress").hide();
                                                        $(".overlay .message").show();

                                                        setTimeout(function(){ $(".overlay").hide();}, 2500);
                                                    }else{
                                                        revertFunc();
                                                    }
                                                }
                                            });
                                        },

                                        eventResize:function(event, jsEvent, ui, view ){

                                            var id = event.id;
                                            var end_time = event.end.format();
                                            var start_time = event.start.format();

                                            $(".overlay").show();
                                            $(".overlay .progress").show();
                                            $(".overlay .message").hide();
                                            $.ajax({
                                                url: "/appointment/update_resize",
                                                data:{id:id,end_time:end_time, start_time:start_time, "_token":"{!! csrf_token() !!}"},
                                                type:"POST",
                                                success:function(response){
                                                    if(response > 0){
                                                        $(".overlay .progress").hide();
                                                        $(".overlay .message").show();

                                                        setTimeout(function(){ $(".overlay").hide();}, 2500);
                                                    }else{
                                                    //    revertFunc();
                                                    }
                                                }
                                            });
                                        },
                                        viewRender: function () {
                                            var $todayButton = $('.fc-today-button');
                                            $todayButton.removeClass('fc-state-disabled');
                                            $todayButton.prop('disabled', false);
                                        },

                                    });
                                    $(".fc-resource-cell").click(function(){
                                        var date = calendar.fullCalendar('getDate');
                                        date =  moment(date).format('YYYY-MM-DD');

                                        var resource_id = $(this).attr('data-resource-id');

                                        $.ajax({
                                            url:"/get/appointment/room/"+resource_id+"/"+date,
                                            success:function (response) {
                                                $("#full-calendar").html(response);
                                            }
                                        });


                                    });

                                    $(".fc-next-button").click(function(){
                                         var date = calendar.fullCalendar('getDate');
                                       date =  moment(date).format('YYYY-MM-DD');

                                        $(".fc-resource-cell").click(function(){
                                            var resource_id = $(this).attr('data-resource-id');

                                            $.ajax({
                                                url:"/get/appointment/room/"+resource_id+"/"+date,
                                                success:function (response) {
                                                    $("#full-calendar").html(response);
                                                }
                                            });


                                        });

                                    });

                                    $(".fc-prev-button").click(function(){
                                        var date = calendar.fullCalendar('getDate');
                                        $(".fc-resource-cell").click(function(){
                                            var resource_id = $(this).attr('data-resource-id');
                                            date =  moment(date).format('YYYY-MM-DD');
                                            $.ajax({
                                                url:"/get/appointment/room/"+resource_id+"/"+date,
                                                success:function (response) {
                                                    $("#full-calendar").html(response);
                                                }
                                            });


                                        });

                                    });
                                    break;
                                case "staff":
                                    $(".day-options").show();
                                    $("#calendar").fullCalendar({
										 timeZone: 'America/Singapore',
                                        minTime:start_calendar_time,
                                        maxTime:end_calendar_time,
                                        defaultView: 'agendaDay',
                                        allDaySlot:false,
                                        editable: true,
                                        selectable: true,
                                        eventLimit: true, // allow "more" link when too many events
                                        slotDuration: "00:15:00",
                                        eventOverlap:false,
                                        slotMinutes: 15,
                                        navLinks: true,
                                        navLinkDayClick: function(date, jsEvent) {

                                            calendar.fullCalendar('changeView', 'agendaDay');
                                            calendar.fullCalendar('gotoDate', date);
                                        },
                                        columnFormat: 'ddd M/D',
                                        columnHeaderFormat : 'ddd M/D',
                                        /* eventConstraint: {
                                         start: moment().format('YYYY-MM-DD HH:mm'),
                                         //  end: '2100-01-01' // hard coded goodness unfortunately
                                         },
                                         businessHours: {
                                         start: moment().format('HH:mm'), /!* Current Hour/Minute 24H format *!/
                                         // end: '19:00', // 5pm? set to whatever
                                         dow: [0,1,2,3,4,5,6] // Day of week. If you don't set it, Sat/Sun are gray too
                                         },
                                         droppable: true, // this allows things to be dropped onto the calendar
                                         drop: function () {
                                         // is the "remove after drop" checkbox checked?
                                         if ($("#drop-remove").is(":checked")) {
                                         // if so, remove the element from the "Draggable Events" list
                                         $(this).remove();
                                         }
                                         },*/
                                        header: {
                                            left: 'prev,next today,default_calendar',
                                            center: 'title',
                                            right: 'agendaDay,agendaTwoDay,agendaWeek,month'
                                        },
                                        customButtons: {
                                            default_calendar: {
                                                text: 'Default Calendar',
                                                click: function() {
                                                    set_calendar($("#calendar"));
                                                }
                                            }
                                        },
                                        views: {
                                            agendaTwoDay: {
                                                columnFormat: 'ddd M/D',
                                                columnHeaderFormat : 'ddd M/D',
                                                type: 'agenda',
                                                duration: { days: 2 },

                                                // views that are more than a day will NOT do this behavior by default
                                                // so, we need to explicitly enable it
                                                groupByResource: true,


                                                //// uncomment this line to group by day FIRST with resources underneath
                                                //groupByDateAndResource: true
                                            },
                                            day: {
                                                titleFormat: 'dddd, MMMM DD YYYY'
                                            }
                                        },

                                        buttonText: {
                                            today: 'Today',
                                            month: 'Month',
                                            week: 'Week',
                                            day: 'Day'
                                        },
                                        //// uncomment this line to hide the all-day slot
                                        //allDaySlot: false,

                                        resources: [
                                        @if(isset($doctors) && count($doctors) > 0)

                                        @foreach($doctors as $doctor)
                                        { id: '{!! $doctor->id !!}', title: '{!! $doctor->fname.' '.$doctor->lname !!}' },
                                            @endforeach
                                            @endif



                                        ],
                                        dayClick: function (date, jsEvent, view, resource) {
                                            // alert(date);

                                            var d = new Date(date.format());
                                            var selected_date = d.getDate()+"."+(d.getMonth()+1)+"."+d.getFullYear();
                                            var  s_date = d.getTime();

                                            var check = s_date;

                                            var today = new Date();

                                            today = today.getTime();

                                            if(check < today){


                                            }



                                            if (view.name === "month") {

                                                calendar.fullCalendar('changeView', 'agendaDay');
                                                calendar.fullCalendar('gotoDate', date);
                                                return false;
                                            }
                                            var duration = $(".services").find(":selected").data("duration");
                                            ;
                                            un_available_doctor_id = 0;
                                            if (jsEvent.target.classList.contains('fc-bgevent')) {

                                                un_available_doctor_id = jsEvent.target.attributes[1].nodeValue;
                                                return false;

                                            }

                                          //  var d = new Date(date.format());
                                           // var selected_date = d.getDate()+"."+(d.getMonth()+1)+"."+d.getFullYear();

                                            $("#appointment_date").val(selected_date);
                                            $("#appointment_date").focusin();
                                            //d.setMinutes();
                                            var hours = d.getHours();
                                            var minutes = d.getMinutes();

                                            var ampm = "";//hours >= 12 ? 'PM' : 'AM';
                                            // hours = hours % 12;
                                            // hours = hours ? hours : 12; // the hour '0' should be '12'
                                            minutes = minutes < 10 ? '0' + minutes : minutes;
                                            var strTime = hours + ':' + minutes + ' ' + ampm;
                                            $("#start_time").val(strTime);
                                            $("#start_time").focus();
                                            var add_minute = 0;
                                            if (duration) {
                                                duration = (duration.split(':'));
                                                add_minute = (parseInt(duration[0]) * 60 + parseInt(duration[1]));
                                                d.setMinutes(minutes + add_minute);
                                                hours = d.getHours();
                                                minutes = d.getMinutes();
                                                ampm = "";//hours >= 12 ? 'PM' : 'AM';
                                                //hours = hours % 12;
                                                // hours = hours ? hours : 12; // the hour '0' should be '12'
                                                minutes = minutes < 10 ? '0' + minutes : minutes;
                                                strTime = hours + ':' + minutes + ' ' + ampm;
                                                $("#end_time").val(strTime);
                                                $("#end_time").focusin();
                                            }
                                          /*  $("#booking_type").val('appointment');
                                            $("#booking-appointment").animate({right:'0'});*/

                                            $("#booking_type").val('appointment');
                                            // $("#booking-appointment").animate({right:'0'});
                                            $.ajax({
                                                url:"/make/appointment",
                                                type:"POST",
                                                data:{"_token":"{!! csrf_token() !!}",strTime:strTime,selected_date:selected_date, patient_id:patient_id, patient_name:patient_name,doctor_id:doctor_id, staff_id:resource.id,un_available_doctor_id:un_available_doctor_id},
                                                success:function (response) {
                                                    var calendar = calendar;
                                                    $("#make-appointment").html(response);



                                                }
                                            });
                                            $("#appointment-panel").modal();
                                            //  $(".make-booking").find('[data-toggle=dropdown]').attr('aria-expanded','true');
                                            // change the day's background color just for fun

                                        },
                                        events:function(start, end, timezone, callback){
                                          //  doctor_id = 0;
                                            var events = [];

                                            $.ajax({
                                                url: '/get/not-availabile/0',
                                                dataType: 'json',

                                                success: function(doc) {
                                                    //console.log(doc);
                                                    //  var events = [];
                                                    $(doc).each(function(i,v) {
                                                        events.push({
                                                            id: v.id,
                                                            title: v.title,
                                                            start: v.start, // will be parsed
                                                            end: v.end, // will be parsed
                                                            rendering: 'background',
                                                            resourceId:v.doctor_id,
                                                            color:v.appointment_type=='appointment'?v.room_color:v.color,
                                                            status:v.status


                                                        });
                                                    });

                                                    // events.push(j);
                                                  //  callback(events);
                                                }
                                            });

                                            $.ajax({
                                                url: '/appoinment/get_appointments/all/0',
                                                dataType: 'json',

                                                success: function(doc) {
                                                    //    console.log(doc);

                                                    $(doc).each(function(i,v) {
                                                        events.push({
                                                            id: v.id,
                                                            title: v.title,
                                                            start: v.start, // will be parsed
                                                            end: v.end, // will be parsed
                                                            resourceId:v.doctor_id,
                                                            color:v.appointment_type=='appointment'?v.room_color:v.color,
                                                            status:v.status
                                                        });
                                                    });
                                                    callback(events);
                                                }
                                            });


                                        },
                                        eventRender: function(event, element, view) {
                                            if (event.rendering == 'background') {
                                                element.append(event.title);
                                                element.attr('data-doctor-id',event.doctor_id);
                                            }

                                            if(event.status=="completed"){
                                                console.log(event.id);
                                                element.prepend('<span class="new badge teal darken-4" data-badge-caption="Confirmed"></span>')  ;
                                            }

                                            if(event.status=="cancelled"){
                                                console.log(event.id);
                                                element.prepend('<span class="new badge red darken-4" data-badge-caption="Cancelled"></span>')  ;
                                            }
                                            // console.log(event);
                                            //alert("Start: "+event.start.format("YYYY-MM-DD hh:mma")+"<br> End: "+event.end.format("YYYY-MM-DD hh:mma"));
                                            /// alert(event.end);

                                        },
                                        select: function(start, end, jsEvent, view, resource) {

                                        },
                                        eventClick:function(event, jsEvent, view){
                                            $("#show-appointment").html('<div class="progress"> <div class="indeterminate"></div></div>');
                                            $("#appointment-show-detail").modal();

                                            var appointment_id = event.id;
                                            // $("#patient-appointment").animate({right:'0'});
                                            // $("#patient-appointment").html('<div class="progress"> <div class="indeterminate"></div></div>');
                                            // return;
                                            $.ajax({
                                                url:"/show/appointment/"+appointment_id,
                                                success: function(doc){
                                                    $("#show-appointment").html(doc);

                                                    $(".close-patient-appointment").click(function(){
                                                        //  $("#patient-appointment").animate({right:'-360px'});
                                                    });


                                                }
                                            });

                                        }
                                        ,
                                        eventDrop:function(event, delta, revertFunc){

                                            var id = event.id;
                                            var resource_id = event.resourceId;
                                            var end_time = event.end.format();
                                            var start_time = event.start.format();

                                            $(".overlay").show();
                                            $(".overlay .progress").show();
                                            $(".overlay .message").hide();
                                            $.ajax({
                                                url: "/appointment/update_resize",
                                                data:{resource_type:"staff",resource_id:resource_id,id:id,end_time:end_time, start_time:start_time, "_token":"{!! csrf_token() !!}"},
                                                type:"POST",
                                                success:function(response){
                                                    if(response > 0){
                                                        $(".overlay .progress").hide();
                                                        $(".overlay .message").show();

                                                        setTimeout(function(){ $(".overlay").hide();}, 2500);
                                                    }else{
                                                        revertFunc();
                                                    }
                                                }
                                            });
                                        },

                                        eventResize:function(event, jsEvent, ui, view ){

                                            var id = event.id;
                                            var end_time = event.end.format();
                                            var start_time = event.start.format();

                                            $(".overlay").show();
                                            $(".overlay .progress").show();
                                            $(".overlay .message").hide();
                                            $.ajax({
                                                url: "/appointment/update_resize",
                                                data:{id:id,end_time:end_time, start_time:start_time, "_token":"{!! csrf_token() !!}"},
                                                type:"POST",
                                                success:function(response){
                                                    if(response > 0){
                                                        $(".overlay .progress").hide();
                                                        $(".overlay .message").show();

                                                        setTimeout(function(){ $(".overlay").hide();}, 2500);
                                                    }else{
                                                       // revertFunc();
                                                    }
                                                }
                                            });
                                        },
                                        viewRender: function () {
                                            var $todayButton = $('.fc-today-button');
                                            $todayButton.removeClass('fc-state-disabled');
                                            $todayButton.prop('disabled', false);
                                        },
                                    });
                                    break;
                            }

                            $(".fc-agendaDay-button").click(function() {
                                $(".day-options").show();
                                $("#calendar table tr span:contains(':30')").each(function(){

                                    $(this).text('');
                                });
                            });
                            $(".fc-axis.fc-widget-header").html('GMT +'+$("#timezone-offset").attr('data-value'));
                            $(".fc-axis.fc-widget-header").css({"font-size":"10px","font-weight":"normal"});
                            $(".fc-right .fc-button").click(function() {
                                //     $(".day-options").show();
                                $("#calendar table tr span:contains(':30')").each(function(){

                                    $(this).text('');
                                });
                            });

                            $("#calendar table tr span:contains(':30')").each(function(){

                                $(this).text('');
                            });
                            $('.fc-today-button').click(function() {
                                calendar.fullCalendar('changeView', 'agendaDay');
                                calendar.fullCalendar('gotoDate');
                            });

                        });
          //  $('#payment-table').editableTableWidget();
            $(".appointment .tab").click(function(){
                var type = $(this).attr('data-action');

                switch (type){
                    case 'payments':
                            var services = [];
                            var doctors = [];
                            var price = [];
                            $("#services .services").each(function(){
                                if($(this).val()!="")
                                services.push($(this).val());
                            });
                        $("#services .doctors").each(function(){
                            if($(this).val()!="")
                                doctors.push($(this).val());
                        });

                        $("#services .price").each(function(){
                            if($(this).val()!="")
                                price.push($(this).val());
                        });

                        $.each(services, function(i,v){
                            $("#payment-table tbody").append("<tr>" +$("#payment-table tbody tr#clone").html()+"</tr>");
                        });

                        break;

                }
            });

            var height = parseInt($('.slimScrollDiv').css('max-height'));
            $(".clock").on("focus", function () {
                $(this).timepicker("showWidget");
            });






            var c =1;











            calendar =  $("#calendar").fullCalendar({
				 timeZone: 'America/Singapore',
                minTime:start_calendar_time,
                maxTime:end_calendar_time,
                defaultView: 'agendaDay',
                allDaySlot:false,
                editable: true,
                height: "auto",
                nowIndicator: true,
                selectable: true,
                eventLimit: true, // allow "more" link when too many events
                slotDuration: "00:15:00",
                slotMinutes: 15,
                navLinks: true,
                eventOverlap:false,
                refetchResourcesOnNavigate: true,
                navLinkDayClick: function(date, jsEvent) {
                    // alert(date);
                    calendar.fullCalendar('changeView', 'agendaDay');
                    calendar.fullCalendar('gotoDate', date);
                },
                select: function(info) {
                    alert('selected ' + info.startStr + ' to ' + info.endStr);
                },
                columnFormat: 'ddd M/D',
                columnHeaderFormat : 'ddd M/D',
                /* eventConstraint: {
                 start: moment().format('YYYY-MM-DD HH:mm'),
                 //  end: '2100-01-01' // hard coded goodness unfortunately
                 },
                 businessHours: {
                 start: moment().format('HH:mm'), /!* Current Hour/Minute 24H format *!/
                 // end: '19:00', // 5pm? set to whatever
                 dow: [0,1,2,3,4,5,6] // Day of week. If you don't set it, Sat/Sun are gray too
                 },
                 droppable: true, // this allows things to be dropped onto the calendar
                 drop: function () {
                 // is the "remove after drop" checkbox checked?
                 if ($("#drop-remove").is(":checked")) {
                 // if so, remove the element from the "Draggable Events" list
                 $(this).remove();
                 }
                 },*/
                header: {
                    left: 'prev,next today,default_calendar',
                    center: 'title',
                    right: 'agendaDay,agendaTwoDay,agendaWeek,month'
                },
                customButtons: {
                    default_calendar: {
                        text: 'Default Calendar',
                        click: function() {
                            // $("#calendar").fullCalendar('destroy');
                            set_calendar($("#calendar"));
                            // $("#calendar").fullCalendar('changeView', 'agendaWeek');
                            // calendar.fullCalendar('gotoDate');
                        }
                    }
                },
                views: {
                    agendaTwoDay: {
                        columnHeaderFormat : 'ddd M/D',
                        columnFormat: 'ddd M/D',
                        type: 'agenda',
                        duration: { days: 2 },

                        // views that are more than a day will NOT do this behavior by default
                        // so, we need to explicitly enable it
                        groupByResource: true,


                        //// uncomment this line to group by day FIRST with resources underneath
                        //groupByDateAndResource: true
                    },
                    day: {
                        titleFormat: 'dddd, MMMM DD YYYY'
                    }
                },

                dayClick: function (date, jsEvent, view) {

                    var d = new Date(date.format());
                    var selected_date = d.getDate()+"."+(d.getMonth()+1)+"."+d.getFullYear();
                    var  s_date = d.getTime();

                    var check = s_date;

                    var today = new Date();

                    today = today.getTime();

                    if(check < today){


                    }


                    if (jsEvent.target.classList.contains('fc-bgevent')) {

                        un_available_doctor_id = jsEvent.target.attributes[1].nodeValue;
                        return false;

                    }
                    //  alert();
                    var duration = $(".services").find(":selected").data("duration");
                    ;


                    // var d = new Date(date.format());
                    //  var selected_date =  d.getDate()+"."+(d.getMonth()+1)+"."+d.getFullYear();
                    $("#appointment_date").val(selected_date);
                    $("#appointment_date").focusin();
                    //d.setMinutes();
                    var hours = d.getHours();
                    var minutes = d.getMinutes();
                    var ampm = hours >= 12 ? 'PM' : 'AM';
                    hours = hours % 12;
                    hours = hours ? hours : 12; // the hour '0' should be '12'
                    minutes = minutes < 10 ? '0' + minutes : minutes;
                    var strTime = hours + ':' + minutes + ' ' + ampm;
                    $("#start_time").val(strTime);
                    $("#start_time").focusin();
                    var add_minute = 0;
                    if (duration) {
                        duration = (duration.split(':'));
                        add_minute = (parseInt(duration[0]) * 60 + parseInt(duration[1]));
                        d.setMinutes(minutes + add_minute);
                        hours = d.getHours();
                        minutes = d.getMinutes();
                        ampm = hours >= 12 ? 'PM' : 'AM';
                        hours = hours % 12;
                        hours = hours ? hours : 12; // the hour '0' should be '12'
                        minutes = minutes < 10 ? '0' + minutes : minutes;
                        strTime = hours + ':' + minutes + ' ' + ampm;
                        $("#end_time").val(strTime);
                        $("#end_time").focusin();
                    }

                    $("#booking_type").val('appointment');
                    $("#booking-appointment").animate({right:'0'});
                    //  $(".make-booking").find('[data-toggle=dropdown]').attr('aria-expanded','true');
                    // change the day's background color just for fun

                },
                buttonText: {
                    today: 'Today',
                    month: 'Month',
                    week: 'Week',
                    day: 'Day'
                },
                //// uncomment this line to hide the all-day slot
                //allDaySlot: false,

                resources: [
                        @foreach($rooms as $room)
                    { id: '{!! $room->id !!}', title: '{!! $room->name !!}' },
                    @endforeach


                ],
                dayClick: function (date, jsEvent, view,resource) {
                    // alert(date);

                    if (view.name === "month") {

                        calendar.fullCalendar('changeView', 'agendaDay');
                        calendar.fullCalendar('gotoDate', date);
                        return false;
                    }
                    var duration = $(".services").find(":selected").data("duration");
                    ;


                    var d = new Date(date.format());
                    var selected_date = d.getDate()+"."+(d.getMonth()+1)+"."+d.getFullYear();

                    $("#appointment_date").val(selected_date);
                    $("#appointment_date").focusin();
                    //d.setMinutes();
                    var hours = d.getHours();
                    var minutes = d.getMinutes();
                    var d = new Date(date.format());

                    var ampm = "";//hours >= 12 ? 'PM' : 'AM';
                    // hours = hours % 12;
                    // hours = hours ? hours : 12; // the hour '0' should be '12'
                    minutes = minutes < 10 ? '0' + minutes : minutes;
                    var strTime = hours + ':' + minutes + ' ' + ampm;
                    $("#start_time").val(strTime);
                    $("#start_time").focus();
                    var add_minute = 0;
                    if (duration) {
                        duration = (duration.split(':'));
                        add_minute = (parseInt(duration[0]) * 60 + parseInt(duration[1]));
                        d.setMinutes(minutes + add_minute);
                        hours = d.getHours();
                        minutes = d.getMinutes();
                        ampm = "";//hours >= 12 ? 'PM' : 'AM';
                        //hours = hours % 12;
                        // hours = hours ? hours : 12; // the hour '0' should be '12'
                        minutes = minutes < 10 ? '0' + minutes : minutes;
                        strTime = hours + ':' + minutes + ' ' + ampm;
                        $("#end_time").val(strTime);
                        $("#end_time").focusin();
                    }
                    /* $("#booking_type").val('appointment');
                     $("#booking-appointment").animate({right:'0'});*/
                    $("#booking_type").val('appointment');
                    // $("#booking-appointment").animate({right:'0'});
                    $.ajax({
                        url:"/make/appointment",
                        type:"POST",
                        data:{"_token":"{!! csrf_token() !!}",strTime:strTime,selected_date:selected_date, patient_id:patient_id, patient_name:patient_name,doctor_id:doctor_id, room_id:resource.id,un_available_doctor_id:un_available_doctor_id},
                        success:function (response) {
                            var calendar = calendar;
                            $("#make-appointment").html(response);



                        }
                    });
                    $("#appointment-panel").modal();

                    //  $(".make-booking").find('[data-toggle=dropdown]').attr('aria-expanded','true');
                    // change the day's background color just for fun

                },
                events:function(start, end, timezone, callback){
                    $.ajax({
                        url: '/appoinment/get_appointments/all/0',
                        dataType: 'json',

                        success: function(doc) {
                            //    console.log(doc);
                            var events = [];
                            $(doc).each(function(i,v) {
                                if(v.appointment_type=='appointment'){
                                    events.push({
                                        id: v.id,
                                        title: v.title,
                                        start: v.start, // will be parsed
                                        end: v.end, // will be parsed
                                        resourceId:v.room_id,
                                        color:v.appointment_type=='appointment'?v.room_color:v.color,
                                        status:v.status
                                    });
                                }else{
                                    events.push({
                                        id: v.id,
                                        title: v.room_id || v.doctor_id?v.title:"These slots are blocked for all rooms",
                                        start: v.start, // will be parsed
                                        end: v.end, // will be parsed
                                        resourceIds:(v.room_id?[v.room_id]:room_ids),
                                        color:v.color,
                                        status:v.status,

                                    });
                                }

                            });
                            callback(events);
                        }
                    });
                    /*$.ajax({
                     url: '/get/not-availabile/'+doctor_id,
                     dataType: 'json',

                     success: function(doc) {
                     console.log(doc);
                     var events = [];
                     $(doc).each(function(i,v) {
                     events.push({
                     id: v.id,
                     title: v.title,
                     start: v.start, // will be parsed
                     end: v.end, // will be parsed
                     rendering: 'background'
                     });
                     });

                     // events.push(j);
                     callback(events);
                     }
                     });*/
                },
                eventRender: function(event, element, view) {
                    if (event.rendering == 'background') {
                        element.append(event.title);
                        element.attr('data-doctor-id',event.doctor_id);
                    }

                    if(event.status=="completed"){
                        console.log(event.id);
                        element.prepend('<span class="new badge teal darken-4" data-badge-caption="Confirmed"></span>')  ;
                    }

                    if(event.status=="cancelled"){
                        console.log(event.id);
                        element.prepend('<span class="new badge red darken-4" data-badge-caption="Cancelled"></span>')  ;
                    }
                    // console.log(event);
                    //alert("Start: "+event.start.format("YYYY-MM-DD hh:mma")+"<br> End: "+event.end.format("YYYY-MM-DD hh:mma"));
                    /// alert(event.end);

                },
                select: function(start, end, jsEvent, view, resource) {
                    var check = new Date(start.format());

                    var today = new Date();

                    if(check < today)
                        return false;

                },
                eventClick:function(event, jsEvent, view){
                    $("#show-appointment").html('<div class="progress"> <div class="indeterminate"></div></div>');
                    $("#appointment-show-detail").modal();

                    var appointment_id = event.id;
                    // $("#patient-appointment").animate({right:'0'});
                    // $("#patient-appointment").html('<div class="progress"> <div class="indeterminate"></div></div>');
                    // return;
                    $.ajax({
                        url:"/show/appointment/"+appointment_id,
                        success: function(doc){
                            $("#show-appointment").html(doc);

                            $(".close-patient-appointment").click(function(){
                                //  $("#patient-appointment").animate({right:'-360px'});
                            });


                        }
                    });

                }
                ,
                eventDrop:function(event, delta, revertFunc){

                    var id = event.id;

                    var resource_id = event.resourceId;
                    var end_time = event.end.format();
                    var start_time = event.start.format();

                    $(".overlay").show();
                    $(".overlay .progress").show();
                    $(".overlay .message").hide();
                    $.ajax({
                        url: "/appointment/update_resize",
                        data:{resource_type:resource_type,resource_id:resource_id,id:id,end_time:end_time, start_time:start_time, "_token":"{!! csrf_token() !!}"},
                        type:"POST",
                        success:function(response){
                            if(response > 0){
                                $(".overlay .progress").hide();
                                $(".overlay .message").show();

                                setTimeout(function(){ $(".overlay").hide();}, 2500);
                            }else{
                                revertFunc();
                            }
                        }
                    });
                },

                eventResize:function(event, jsEvent, ui, view ){

                    var id = event.id;
                    var end_time = event.end.format();
                    var start_time = event.start.format();

                    $(".overlay").show();
                    $(".overlay .progress").show();
                    $(".overlay .message").hide();
                    $.ajax({
                        url: "/appointment/update_resize",
                        data:{id:id,end_time:end_time, start_time:start_time, "_token":"{!! csrf_token() !!}"},
                        type:"POST",
                        success:function(response){
                            if(response > 0){
                                $(".overlay .progress").hide();
                                $(".overlay .message").show();

                                setTimeout(function(){ $(".overlay").hide();}, 2500);
                            }else{
                              //  revertFunc();
                            }
                        }
                    });
                },
                viewRender: function () {
                    var $todayButton = $('.fc-today-button');
                    $todayButton.removeClass('fc-state-disabled');
                    $todayButton.prop('disabled', false);
                },

            });
            $(".fc-resource-cell").click(function(){
                var date = calendar.fullCalendar('getDate');
                date =  moment(date).format('YYYY-MM-DD');

                var resource_id = $(this).attr('data-resource-id');

                $.ajax({
                    url:"/get/appointment/room/"+resource_id+"/"+date,
                    success:function (response) {
                        $("#full-calendar").html(response);
                    }
                });


            });

            $(".fc-next-button").click(function(){
                var date = calendar.fullCalendar('getDate');
                date =  moment(date).format('YYYY-MM-DD');

                $(".fc-resource-cell").click(function(){
                    var resource_id = $(this).attr('data-resource-id');

                    $.ajax({
                        url:"/get/appointment/room/"+resource_id+"/"+date,
                        success:function (response) {
                            $("#full-calendar").html(response);
                        }
                    });


                });

            });

            $(".fc-prev-button").click(function(){
                var date = calendar.fullCalendar('getDate');
                $(".fc-resource-cell").click(function(){
                    var resource_id = $(this).attr('data-resource-id');
                    date =  moment(date).format('YYYY-MM-DD');
                    $.ajax({
                        url:"/get/appointment/room/"+resource_id+"/"+date,
                        success:function (response) {
                            $("#full-calendar").html(response);
                        }
                    });


                });

            });


            $("#calendar table tr span:contains(':30')").each(function(){

                $(this).text('');
            });
            $(".close-appointment-booking").click(function(){
                $("#booking-appointment").animate({right:'-360px'});
            });


                $('#filter-appointment select').change(function(){

                    var d = $(this).val();
                    if(d && d.length > 0){
                       // $(this).material_select('destroy');
                        $(this).find($('option:first-child')).attr('selected',false);
                      //  $(this).material_select();
                    }


                   // alert(d.length);
                    if(!d) return false;
                    var class_name = $(this).attr('class').split(' ')[0];

                    if(class_name==='filter-doctors'){

                       // alert();
                        if(d && d.length ==1 && d[0]!=""){
                            doctor_id = d[0];

                         //   $("#booking-appointment select[name=doctor_id]").material_select('distory');
                            $("#booking-appointment select[name=doctor_id]").val(d[0]);
                            //$("#booking-appointment select[name=doctor_id]").material_select();
                        }else{
                            //$("#booking-appointment select[name=doctor_id]").material_select('distory');
                            $("#booking-appointment select[name=doctor_id]").val("");
                           // $("#booking-appointment select[name=doctor_id]").material_select();
                        }
                    }

                    if(class_name==='locations'){
                        if(d && d.length ==1 && d[0]!=""){
                            location_id = d[0];

                            $("#booking-appointment select[name=location_id]").val(d[0]);

                        }else{

                            $("#booking-appointment select[name=location_id]").val("");

                        }
                    }

                    if(class_name==='services_'){
                        if(d && d.length ==1 && d[0]!=""){
                            //alert(d[0]);

                            $("#booking-appointment select[name=service_id]").val(d[0]);

                        }else{

                            $("#booking-appointment select[name=service_id]").val("");

                        }
                    }

                    set_calendar($("#calendar"),$(this).val(),'doctor');
                    $(".fc-agendaDay-button").click(function() {
                        $(".day-options").show();
                        $("#calendar table tr span:contains(':30')").each(function(){

                            $(this).text('');
                        });
                    });
                    $(".fc-axis.fc-widget-header").html('GMT +'+$("#timezone-offset").attr('data-value'));
                    $(".fc-axis.fc-widget-header").css({"font-size":"10px","font-weight":"normal"});
                    $(".fc-right .fc-button").click(function() {
                        //     $(".day-options").show();
                        $("#calendar table tr span:contains(':30')").each(function(){

                            $(this).text('');
                        });
                    });

                    $("#calendar table tr span:contains(':30')").each(function(){

                        $(this).text('');
                    });
                    $('#calendar button.fc-today-button').removeClass('fc-state-disabled');
                });




            // $('.fc-scroller').niceScroll({cursorcolor:"#F00"});
            if(searched_doctor_id!="" && searched_location_id==""){
                $("select.filter-doctors").val(searched_doctor_id).trigger('change');;
            }

            if(searched_doctor_id!="" && searched_location_id!=""){
                $("select.locations").val(searched_location_id).trigger('change');;
            }

            $('.fc-today-button').click(function() {
                calendar.fullCalendar('changeView', 'agendaDay');
                calendar.fullCalendar('gotoDate');
            });

            $( "#in_calendar_page" ).datepicker({
                onSelect: function(dateText, inst) {
                    $("#full-calendar").fadeOut('200');
                    dateText = new Date(dateText);

                    calendar.fullCalendar('changeView', 'agendaDay');
                    calendar.fullCalendar('gotoDate',dateText);
                    $("#full-calendar").fadeIn('200');

                }
            });

            if(menu_action != "" && menu_action=="new-appointment"){
                var strTime = "00:00";
                //  var strTime = "00:00";
                $.ajax({
                    url:"/make/appointment",
                    type:"POST",
                    data:{"_token":"{!! csrf_token() !!}",strTime:strTime, patient_id:patient_id, patient_name:patient_name,doctor_id:doctor_id,un_available_doctor_id:un_available_doctor_id},
                    success:function (response) {
                        var calendar = calendar;
                        $("#make-appointment").html(response);



                    }
                });
                $("#appointment-panel").modal();
            }

        })
        function patient_result_template1(patient){



            if(patient.id > 0)

                var $patient = $('<div class="patient-container">'+



                    '<div class="patient-info">'+

                    '<h5>'+patient.text+'</h5>'+

                    '<p class="inner-text"><i class="icon-key"></i> '+patient.patient_unique_id+'  '+

                    '<i class="icon-phone2" style="margin-left: 20px"></i> '+patient.patient_phone+'</p>'+

                    '</div>'+

                    '</div>');

            else

                var $patient = patient.text;

            return $patient;

        }
        function set_calendar(calendar,data,type){
            calendar.fullCalendar('destroy');
            calendar = calendar.fullCalendar({
                minTime:start_calendar_time,
                maxTime:end_calendar_time,
                defaultView: 'agendaWeek',
                allDaySlot:false,
                editable: true,
                height: "auto",
                contentHeight: 'auto',
                slotLabelFormat:'h(:mm)a',
                selectable: true,
                eventLimit: false, // allow "more" link when too many events
                slotDuration: "00:15:00",
                eventOverlap:false,
                slotMinutes: 15,

                header: {
                    left: 'prev,next today,default_calendar',
                    center: 'title',
                    right: 'agendaDay,agendaTwoDay,agendaWeek,month'
                },
                customButtons: {
                    default_calendar: {
                        text: 'Default Calendar',
                        click: function() {
                            set_calendar($("#calendar"));
                        }
                    }
                },
                views: {
                    agendaTwoDay: {
                        type: 'agenda',
                        duration: { days: 2 },

                        // views that are more than a day will NOT do this behavior by default
                        // so, we need to explicitly enable it
                        groupByResource: true

                        //// uncomment this line to group by day FIRST with resources underneath
                        //groupByDateAndResource: true
                    },
                    day: {
                        titleFormat: 'dddd, MMMM DD YYYY'
                    }
                },
                navLinks: true,
                navLinkDayClick: function(date, jsEvent) {

                    calendar.fullCalendar('changeView', 'agendaDay');
                    calendar.fullCalendar('gotoDate', date);
                },
                dayClick: function (date, jsEvent, view) {
                    var d = new Date(date.format());
                    var selected_date = d.getDate()+"."+(d.getMonth()+1)+"."+d.getFullYear();
                    var  s_date = d.getTime();

                    var check = s_date;

                    var today = new Date();

                    today = today.getTime();

                    if(check < today){

                        //return false;
                    }

                    // alert(date);
                    un_available_doctor_id = 0;
                    if (jsEvent.target.classList.contains('fc-bgevent')) {

                        un_available_doctor_id = jsEvent.target.attributes[1].nodeValue;
                        return false;

                    }
                    if (view.name === "month") {

                        calendar.fullCalendar('changeView', 'agendaDay');
                        calendar.fullCalendar('gotoDate', date);
                        return false;
                    }
                    var duration = $(".services").find(":selected").data("duration");
                    ;


                    var d = new Date(date.format());
                   // var selected_date =  d.getDate()+"."+(d.getMonth()+1)+"."+d.getFullYear();

                    $("#appointment_date").val(selected_date);
                    $("#appointment_date").focusin();
                    //d.setMinutes();
                    var hours = d.getHours();
                    var minutes = d.getMinutes();

                    var ampm = "";//hours >= 12 ? 'PM' : 'AM';
                    // hours = hours % 12;
                    // hours = hours ? hours : 12; // the hour '0' should be '12'
                    minutes = minutes < 10 ? '0' + minutes : minutes;
                    var strTime = hours + ':' + minutes + ' ' + ampm;
                    $("#start_time").val(strTime);
                    $("#start_time").focus();
                    var add_minute = 0;
                    if (duration) {
                        duration = (duration.split(':'));
                        add_minute = (parseInt(duration[0]) * 60 + parseInt(duration[1]));
                        d.setMinutes(minutes + add_minute);
                        hours = d.getHours();
                        minutes = d.getMinutes();
                        ampm = "";//hours >= 12 ? 'PM' : 'AM';
                        //hours = hours % 12;
                        // hours = hours ? hours : 12; // the hour '0' should be '12'
                        minutes = minutes < 10 ? '0' + minutes : minutes;
                        strTime = hours + ':' + minutes + ' ' + ampm;
                        $("#end_time").val(strTime);
                        $("#end_time").focusin();
                    }
                    /*$("#booking_type").val('appointment');
                    $("#booking-appointment").animate({right:'0'});*/

                    $.ajax({
                        url:"/make/appointment",
                        type:"POST",
                        data:{"_token":"{!! csrf_token() !!}",strTime:strTime,selected_date:selected_date, patient_id:patient_id, patient_name:patient_name,doctor_id:doctor_id,un_available_doctor_id:un_available_doctor_id,location_id:location_id},
                        success:function (response) {
                            var calendar = calendar;
                            $("#make-appointment").html(response);



                        }
                    });
                    $("#appointment-panel").modal();


                    //  $(".make-booking").find('[data-toggle=dropdown]').attr('aria-expanded','true');
                    // change the day's background color just for fun

                },
                buttonText: {
                    today: 'Today',
                    month: 'Month',
                    week: 'Week',
                    day: 'Day'
                },
                nowIndicator: true,
                // events: '/appoinment/get_appointments/all',
                events:function(start, end, timezone, callback){
                    var events = [];
                    //alert();
                    $.ajax({
                        url: '/get/not-availabile/'+doctor_id,
                        dataType: 'json',

                        success: function(doc) {
                            // console.log(doc);
                            // var events = [];
                            $(doc).each(function(i,v) {
                                events.push({
                                    id: v.id,
                                    title: v.title,
                                    start: v.start, // will be parsed
                                    end: v.end, // will be parsed
                                    rendering: 'background',
                                    doctor_id:v.doctor_id
                                });
                            });

                            // events.push(j);
                           // console.log(events);
                            //callback(events);
                        }
                    });
                    //if(type=='doctor'){
                      $("#filter-appointment").ajaxForm(function(doc){
                          doc = $.parseJSON(doc);
                          //console.log(doc);

                          $(doc).each(function(i,v) {
                              events.push({
                                  id: v.id,
                                  title: v.title,
                                  start: v.start, // will be parsed
                                  end: v.end, // will be parsed
                                  doctor_id:v.doctor_id,
                                  color:v.appointment_type=='appointment'?v.room_color:v.color,
                                  status:v.status
                              });
                          });
                          callback(events);
                      }).submit();


                    //}


                },
                eventRender: function(event, element, view) {
                    if (event.rendering == 'background') {
                        element.append(event.title);
                        element.attr('data-doctor-id',event.doctor_id);
                    }

                    if(event.status=="completed"){
                        console.log(event.id);
                        element.prepend('<span class="new badge" data-badge-caption="Confirmed"></span>')  ;
                    }

                    if(event.status=="cancelled"){
                        console.log(event.id);
                        element.prepend('<span class="new badge red darken-4" data-badge-caption="Cancelled"></span>')  ;
                    }
                    // console.log(event);
                    //alert("Start: "+event.start.format("YYYY-MM-DD hh:mma")+"<br> End: "+event.end.format("YYYY-MM-DD hh:mma"));
                    /// alert(event.end);

                },
                select: function(start, end, jsEvent, view, resource) {


                },
                eventClick:function(event, jsEvent, view){
                    $("#show-appointment").html('<div class="progress"> <div class="indeterminate"></div></div>');
                    $("#appointment-show-detail").modal();

                    var appointment_id = event.id;
                    // $("#patient-appointment").animate({right:'0'});
                    // $("#patient-appointment").html('<div class="progress"> <div class="indeterminate"></div></div>');
                    // return;
                    $.ajax({
                        url:"/show/appointment/"+appointment_id,
                        success: function(doc){
                            $("#show-appointment").html(doc);

                            $(".close-patient-appointment").click(function(){
                                //  $("#patient-appointment").animate({right:'-360px'});
                            });


                        }
                    });

                }
                ,
                eventDrop:function(event, delta, revertFunc){

                    var id = event.id;
                    var end_time = event.end.format();
                    var resource_id = event.resourceId;
                    var start_time = event.start.format();

                    $(".overlay").show();
                    $(".overlay .progress").show();
                    $(".overlay .message").hide();
                    $.ajax({
                        url: "/appointment/update_resize",
                        data:{resource_id:resource_id,id:id,end_time:end_time, start_time:start_time, "_token":"{!! csrf_token() !!}"},
                        type:"POST",
                        success:function(response){
                            if(response > 0){
                                $(".overlay .progress").hide();
                                $(".overlay .message").show();

                                setTimeout(function(){ $(".overlay").hide();}, 2500);
                            }else{
                                revertFunc();
                            }
                        }
                    });
                },

                eventResize:function(event, jsEvent, ui, view ){

                    var id = event.id;
                    var end_time = event.end.format();
                    var start_time = event.start.format();

                    $(".overlay").show();
                    $(".overlay .progress").show();
                    $(".overlay .message").hide();
                    $.ajax({
                        url: "/appointment/update_resize",
                        data:{id:id,end_time:end_time, start_time:start_time, "_token":"{!! csrf_token() !!}"},
                        type:"POST",
                        success:function(response){
                            if(response > 0){
                                $(".overlay .progress").hide();
                                $(".overlay .message").show();

                                setTimeout(function(){ $(".overlay").hide();}, 2500);
                            }else{
                               // revertFunc();
                            }
                        }
                    });
                },
                viewRender: function () {
                    var $todayButton = $('.fc-today-button');
                    $todayButton.removeClass('fc-state-disabled');
                    $todayButton.prop('disabled', false);
                },


            });


            $('.fc-today-button').click(function() {
                calendar.fullCalendar('changeView', 'agendaDay');
                calendar.fullCalendar('gotoDate');
            });
        }
    </script>
    @endif
@endsection