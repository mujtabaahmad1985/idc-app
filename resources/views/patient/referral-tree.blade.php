@extends('layout.app')
@section('page-title') Patient Referrals @endsection
@section('css')
    <style>

        .tree ul {
            padding-top: 20px; position: relative;

            transition: all 0.5s;
            -webkit-transition: all 0.5s;
            -moz-transition: all 0.5s;
        }

        .tree li {
            float: left; text-align: center;
            list-style-type: none;
            position: relative;
            padding: 20px 5px 0 5px;

            transition: all 0.5s;
            -webkit-transition: all 0.5s;
            -moz-transition: all 0.5s;
        }

        /*We will use ::before and ::after to draw the connectors*/

        .tree li::before, .tree li::after{
            content: '';
            position: absolute; top: 0; right: 50%;
            border-top: 1px solid #ccc;
            width: 50%; height: 20px;
        }
        .tree li::after{
            right: auto; left: 50%;
            border-left: 1px solid #ccc;
        }

        /*We need to remove left-right connectors from elements without
        any siblings*/
        .tree li:only-child::after, .tree li:only-child::before {
            display: none;
        }

        /*Remove space from the top of single children*/
        .tree li:only-child{ padding-top: 0;}

        /*Remove left connector from first child and
        right connector from last child*/
        .tree li:first-child::before, .tree li:last-child::after{
            border: 0 none;
        }
        /*Adding back the vertical connector to the last nodes*/
        .tree li:last-child::before{
            border-right: 1px solid #ccc;
            border-radius: 0 5px 0 0;
            -webkit-border-radius: 0 5px 0 0;
            -moz-border-radius: 0 5px 0 0;
        }
        .tree li:first-child::after{
            border-radius: 5px 0 0 0;
            -webkit-border-radius: 5px 0 0 0;
            -moz-border-radius: 5px 0 0 0;
        }

        /*Time to add downward connectors from parents*/
        .tree ul ul::before{
            content: '';
            position: absolute; top: 0; left: 50%;
            border-left: 1px solid #ccc;
            width: 0; height: 20px;
        }

        .tree li a{
            border: 1px solid #ccc;
            padding: 5px 45px;
            text-decoration: none;
            color: #666;
            font-family: arial, verdana, tahoma;
            font-size: 11px;
            display: inline-block;

            border-radius: 0px;
            -webkit-border-radius: 0px;
            -moz-border-radius: 0px;

            transition: all 0.5s;
            -webkit-transition: all 0.5s;
            -moz-transition: all 0.5s;

        }

        /*Time for some hover effects*/
        /*We will apply the hover effect the the lineage of the element also*/
        .tree li a:hover, .tree li a:hover+ul li a {
            background: rgba(255, 0, 3, 0.62); color: #FFF; border: 1px solid rgb(255, 0, 3);
        }
        /*Connector styles on hover*/
        .tree li a:hover+ul li::after,
        .tree li a:hover+ul li::before,
        .tree li a:hover+ul::before,
        .tree li a:hover+ul ul::before{
            border-color:  #94a0b4;
        }
    </style>
@endsection


@section('content')
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Patients</span> - Referrals</h4>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none">
                <div class="d-flex justify-content-center">
                    <a href="#" class="btn btn-link btn-float text-body"><i class="icon-bars-alt text-primary"></i><span>Dashboard</span></a>
                </div>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="/dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Dashboards</a>

                    <span class="breadcrumb-item active">Patients Refferals</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>


        </div>
    </div>
    <div class="content">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Patient Referrals</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>


                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Patient</label>
                            <select class="form-control" name="person_name"></select>
                        </div>
                    </div>
                </div>
        @php
        $id = request()->get('patient');
        if(!empty($id)){
        $patient_info = \App\Patients::find($id);

        $patient = \App\Patients::where('referral_id',$id)->get();
        }


        @endphp
                @if(!empty($id))
                @if(isset($patient) && $patient->count() > 0)
                    <div class="tree">
                        <ul>
                            <li>
                                <a href="/patient/view/{!! $patient_info->id !!}" target="_blank">

                                    <div class="span3 well">
                                        <div class="text-center">
                                            <img src="{!! url('/') !!}/img/no-user-image.gif" name="aboutme" width="40" height="40" class="rounded-circle">
                                            <h6 style="margin-bottom: 2px" class="referral-name"> {!! $patient_info->salutation.' '.$patient_info->patient_name !!}</h6>
                                            <b>idcsg-{!! $patient_info->patient_unique_id !!} |
                                                @php
                                                    $years = \Carbon\Carbon::parse($patient_info->date_of_birth)->age;
                                                echo $years.' years old';
                                                @endphp  <h6><small><i class="icon-users4 mr-1"></i></small> <span class="badge badge-light referral-count">{!! $patient->count() !!}</span></h6>
                                            </b>
                                        </div>
                                    </div>
                                </a>
                                <ul>

                                    @foreach($patient as $p)
                                        <li><a href="/patient/view/{!! $p->id !!}" target="_blank">

                                                <div class="span3 well">
                                                    <div class="text-center">
                                                        <img src="{!! url('/') !!}/img/no-user-image.gif" name="aboutme" width="40" height="40" class="rounded-circle">
                                                        <h6 style="margin-bottom: 2px" class="referral-name"> {!! $p->salutation.' '.$p->patient_name !!} </h6>
                                                        <b>idcsg-{!! $p->patient_unique_id !!} |
                                                            @php
                                                                $years = \Carbon\Carbon::parse($p->date_of_birth)->age;
                                                            echo $years.' years old';
                                                            @endphp  <h6><small><i class="icon-users4 mr-1"></i></small> <span class="badge badge-light referral-count">{!! $p->patient_refers->count() !!}</span></h6>
                                                        </b>
                                                    </div>
                                                </div>


                                            </a>

                                            @if(isset($p->patient_refers) && $p->patient_refers->count() > 0)

                                                @include('patient.patient-refers', ['patient' => $p->patient_refers])
                                            @endif</li>
                                    @endforeach
                                </ul>
                            </li>

                        </ul>

                    </div>
                @else
                    <div class="alert bg-danger text-white text-center" style="display: block">

                        <span class="font-weight-semibold">No referral is found!</span>.
                    </div>
                @endif
                    @endif
            </div>
        </div>
    </div>


@endsection


@section('js')
<script>
    $(function () {
        $('select[name=person_name]').select2({
            placeholder: "Enter Name ",

            allowClear: true,
            tags: true,
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

        }).on('change',function () {
            var id = $(this).val();

            window.location.href="/referrals?patient="+id;


        });

    })

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
</script>
@endsection