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

    </style>
    <section id="content">

    @include('partials.breadcrumb')

    <!--start container-->
        <div class="container">
            <div class="row">
                <h4 class="header col s6">My Purchases</h4>

            </div>
            <div class="row">

                <div class="s12 m12 l12">
                    <div class="card-panel">
                        <table class="responsive-table staff-table" style="margin-top: 30px">
                            <thead>
                            <tr>
                                <td width="5%"><p>
                                        <input type="checkbox" class="filled-in" id="all"/>
                                        <label for="all"></label>
                                    </p></td>

                                <th  width="10%"> PO No </th>
                                <th  width="10%"> Order For </th>
                                <th width="10%">Order Date </th>
                                <th width="10%">Pay Date</th>.
                                <th width="10%">Pay Method </th>
                                <th width="10%">Type </th>
                                <th width="10%">Status </th>
                                <th width="10%">Amount </th>
                                <th width="10%">Actions</th>

                            </tr>
                            </thead>

                            <tbody>
                            @for($i=1;$i<=50;$i++)
                                <tr>
                                    <td><p>
                                            <input type="checkbox" class="selected_patient filled-in"
                                                   value="{!! $i !!}"
                                                   id="staff{!! $i !!}"/>
                                            <label for="staff{!! $i !!}"></label>
                                        </p></td>


                                    <td>{!!  str_shuffle('abcdefthsoiebbslwe889923') !!}</td>
                                    <td>IDC Singapore</td>
                                    <td>10.12.2018</td>
                                    <td>11.12.2018</td>
                                    <td>Cheque</td>
                                    <td>Purchase</td>
                                    <td>Pending</td>
                                    <td>{!! number_format(2500000,2) !!}</td>
                                    <td class="actions">

                                        <div class="btn-group">

                                            <ul id='dropdown{!! $i !!}' class='dropdown-content'>
                                                <li><a href="/purchase/1"><i class="material-icons">details</i> View Detail</a> </li>
                                                <li><a href="#!"><i class="material-icons">file_download</i> Download</a> </li>
                                            </ul>
                                        </div>


                                        <a class=" dropdown-button waves-effect waves-light" href="#!" data-activates="dropdown{!! $i !!}"><i class="material-icons">more_vert</i></a>


                                    </td>
                                </tr>
                            @endfor

                            </tbody>
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