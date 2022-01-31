@extends('layout.app')
@section('page-title') Staff Management | My Salaries @endsection
@section('css')

@endsection

@section('content')
    <style type="text/css">
        .input-field div.error{
            position: relative;
            top: -1rem;
            left: 0rem;
            font-size: 0.8rem;
            color:#FF0000;
            -webkit-transform: translateY(0%);
            -ms-transform: translateY(0%);
            -o-transform: translateY(0%);
            transform: translateY(0%);
        }
        .input-field label.active{
            width:100%;
        }
        .left-alert input[type=text] + label:after,
        .left-alert input[type=password] + label:after,
        .left-alert input[type=email] + label:after,
        .left-alert input[type=url] + label:after,
        .left-alert input[type=time] + label:after,
        .left-alert input[type=date] + label:after,
        .left-alert input[type=datetime-local] + label:after,
        .left-alert input[type=tel] + label:after,
        .left-alert input[type=number] + label:after,
        .left-alert input[type=search] + label:after,
        .left-alert textarea.materialize-textarea + label:after{
            left:0px;
        }
        .right-alert input[type=text] + label:after,
        .right-alert input[type=password] + label:after,
        .right-alert input[type=email] + label:after,
        .right-alert input[type=url] + label:after,
        .right-alert input[type=time] + label:after,
        .right-alert input[type=date] + label:after,
        .right-alert input[type=datetime-local] + label:after,
        .right-alert input[type=tel] + label:after,
        .right-alert input[type=number] + label:after,
        .right-alert input[type=search] + label:after,
        .right-alert textarea.materialize-textarea + label:after{
            right:70px;
        }
        .dropdown-content{
            background: #f5f2f0 !important; width: 210px !important;
        }
        .dropdown-content a{color:rgba(0,0,0,0.54) !important;}
        /*.dropdown-content li{
            padding:10px !important;}*/
        .actions > a{
            padding:3px !important;}

        .staff-table td, .staff-table th{ padding: 0}
        .staff-table .td{ padding-top:7px;}
        .staff-table td i{    font-size: 20px;
            position: relative;
            top: 5px;
            margin-right: 11px;}


        .staff-table tbody p{ margin:2px 0 0 0;}
        .staff-table tbody .dropdown-content li{ min-height: 15px;}
        .staff-table tbody .dropdown-content li > a, .dropdown-content li > span{font-size: 14px;}
        .staff-table tbody .material-icons{ font-size: 20px}
        .staff-table tbody .dropdown-content li > a > i{     margin: 0 30px 0 0;}
        td, th {
            font-size: 0.8rem
        }
        .btn i{ position: relative;
            top:5px;}
        .btn{ line-height: 30px}
        .table-border{ border: 1px solid #ccc}
        .table-border td,.table-border th{ padding: 3px; border: 1px solid #ddd}
        .table-border h5{ margin: 0; font-size: 16px; font-weight: bolder}

    </style>
    <section id="content">

    @include('partials.breadcrumb')

    <!--start container-->
        <div class="container">

            <div class="row">

                <div class="col s12 m12 l10 ">
                    <div class="card-panel">
                        <h5>Mujtaba Ahmad</h5>
                        <hr />
                        <table width="60%" class="staff-table">
                            <tbody>


                            <tr>
                                <td width="140px"><strong><i class="material-icons">date_range</i> Joining Date</strong></td>
                                <td class="td">10.12.2017</td>
                                <td width="140px"><strong><i class="material-icons">work</i> Designation</strong></td>
                                <td class="td">Manager</td>
                            </tr>
                            <tr>
                                <td ><strong><i class="material-icons">fingerprint</i> Staff ID</strong></td>
                                <td class="td">#123456</td>
                                <td ><strong><i class="material-icons">check_box</i> Status</strong></td>
                                <td class="td">Permenant Employee</td>
                            </tr>
                            </tbody>
                        </table>


                        <table class="table-border m-top-25">
                            <tr>
                                <td width="33%" colspan="2" class="center" style="font-weight: bold; font-size: 14px">Pay and Allowances</td>
                                <td width="33%" colspan="2" class="center"  style="font-weight: bold ; font-size: 14px">Deductions</td>
                                <td width="33%" colspan="2" class="center"  style="font-weight: bold; font-size: 14px">Detail</td>
                            </tr>
                            <tr>
                                <th width="16%">Gross Salary</th>
                                <td width="17%"></td>
                                <th width="16%">Tax on Salary</th>
                                <td width="17%"></td>

                                <td colspan="2"></td>
                            </tr>
                            <tr>
                                <th width="16%">Basic Salary</th>
                                <td width="17%"></td>
                                <th width="16%">Advances</th>
                                <td width="17%"></td>

                                <td colspan="2"></td>
                            </tr>
                            <tr>
                                <th width="16%">Medical Allowances</th>
                                <td width="17%"></td>
                                <th width="16%">Lunch</th>
                                <td width="17%"></td>

                                <td colspan="2"></td>
                            </tr>
                            <tr>
                                <th width="16%">Increment</th>
                                <td width="17%"></td>
                                <th width="16%">Eobi</th>
                                <td width="17%"></td>

                                <td colspan="2"></td>
                            </tr>
                            <tr>
                                <th width="16%">Overtime</th>
                                <td width="17%"></td>
                                <th width="16%"></th>
                                <td width="17%"></td>

                                <td colspan="2"></td>
                            </tr>
                            <tr>
                                <th width="16%">Arrears</th>
                                <td width="17%"></td>
                                <th width="16%"></th>
                                <td width="17%"></td>

                                <td colspan="2"></td>
                            </tr>
                            <tr>
                                <th width="16%">Food Allowances</th>
                                <td width="17%"></td>
                                <th width="16%"></th>
                                <td width="17%"></td>

                                <td colspan="2"></td>
                            </tr>
                            <tr>
                                <th width="16%">Bonus</th>
                                <td width="17%"></td>
                                <th width="16%"></th>
                                <td width="17%"></td>

                                <td colspan="2"></td>
                            </tr>
                            <tr>
                                <th width="16%" class="red white-text"><h5>Gross Salary</h5></th>
                                <td width="17%"></td>
                                <th width="16%" class="red white-text"><h5>Total Deduction</h5></th>
                                <td width="17%"></td>

                                <td width="16%" class="red white-text"><h5>Net Salary</h5></td>
                                <td width="17%"></td>
                            </tr>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <!--end container-->
        <style>
            .modal{ width: 48%;}
            .picker__holder{overflow: hidden; background: none}
        </style>

    </section>


@endsection


@section('js')


    {{--{!! Html::script('public/demo/demo-form-layouts.js') !!}--}}
@endsection