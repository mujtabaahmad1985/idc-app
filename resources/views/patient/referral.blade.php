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


<ul class="nav nav-tabs">
    <li class="nav-item"><a href="#tree-view" class="nav-link  active show" data-toggle="tab"><i class="icon-tree6 mr-2"></i> Tree View</a></li>
    <li class="nav-item"><a href="#map-view" class="nav-link map-view" data-toggle="tab"><i class="icon-stats-bars mr-2"></i> Chart View</a></li>

</ul>

<div class="tab-content">
    <div class="tab-pane fade active show" id="tree-view">
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
    </div>

    <div class="tab-pane fade" id="map-view">
        <div class="chart-container">
            <div class="chart has-fixed-height" id="tree-chart"></div>
        </div>

    </div>


</div>


