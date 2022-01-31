@extends('layout.app')
@section('page-title') Patients @endsection
@section('css')
    {!! Html::style('public/material/js/plugins/dropify/css/dropify.min.css') !!}
    {!! Html::style('public/material/plugins/select2/css/select2.min.css') !!}
    {!! Html::style('public/material/js/signature_pad/docs/css/signature-pad.css') !!}
    {!! Html::style('public/material/css/jquery.timepicker.min.css') !!}
@endsection

@section('content')


    <!-- START CONTENT -->
    <div class="content">




                @php
                    $keyword = isset($_GET['keywords'])?$_GET['keywords']:"";
                @endphp


            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">Patient List</h5>
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
                        <div class="col align-self-start">

                        </div>
                        <div class="col align-self-center">

                        </div>
                        <div class="col align-self-center text-right">
                            <a href="/patients/add" id="add_patient_link" class="btn btn-danger">Add New Patient</a>
                        </div>
                        <div class="col align-self-end">
                            <form>
                                <div class="input-group">
                                    <input type="text" class="form-control" style="text-transform: none;" id="search-keywords" name="keywords" value="{!! $keyword !!}"
                                           placeholder="Search for patient..">
                                    <span class="input-group-append">
                                                        <button  id="search-patients"><i class="icon-search4"></i></button>
                                                    </span>
                                </div>


                            </form>
                        </div>
                    </div>

                    <div class="table-responsive">
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
                            <tbody></tbody>
                        </table>
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

<script> var patient_id = 0;
var total_patients = "{!! $all_patients !!}";
    var page_number = 2;
</script>
    <script>
        $(function () {
            var keywords = $("#search-keywords").val();
            $.ajax({
                url:'/get/all/patients?keywords='+keywords,


                success:function(response){
                    $("table.patient-list-table > tbody").html(response);
                }
            });

            setInterval(update_page, 8000);




        })



        function update_page(){
            $.ajax({
                url:'/get/all/patients?all_patients='+total_patients,


                success:function(response){
                    if(response && response.trim()!="")
                    $("table.patient-list-table > tbody").html(response);
                }
            });
        }
    </script>

    {{--{!! Html::script('public/demo/demo-form-layouts.js') !!}--}}
@endsection