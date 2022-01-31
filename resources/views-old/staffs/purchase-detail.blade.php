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

        .purcahse-table td, .purcahse-table th{ padding: 1px 5px}
        .item-table td, .purcahse-table th{ padding: 1px 5px}

        .purcahse-table tbody p{ margin:2px 0 0 0;}
        .purcahse-table tbody .dropdown-content li{ min-height: 15px;}
        .purcahse-table tbody .dropdown-content li > a, .dropdown-content li > span{font-size: 14px;}
        .purcahse-table tbody .material-icons{ font-size: 20px}
        .purcahse-table tbody .dropdown-content li > a > i{     margin: 0 30px 0 0;}
        .purcahse-table tbody td:nth-child(odd){text-align: right}
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
                <h4 class="header col s6">Purchase PO #E832aies9bbscftwhob8e9dl Detail</h4>

            </div>
            <div class="row">

                <div class="s12 m12 l12">
                    <div class="card-panel">
                        <div class="row">
                            <div class="col s2 right">
                                <table class="purcahse-table">
                                    <tr>
                                        <td>Date: </td>
                                        <td>10.12.2018</td>
                                    </tr>
                                    <tr>
                                        <td>Order: </td>
                                        <td>#125489</td>
                                    </tr>
                                    <tr>
                                        <td>Invoice: </td>
                                        <td>#725489</td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <table class="item-table">
                            <thead>
                            <tr>
                                <th>Item</th>
                                <th>Seller</th>
                                <th>Type</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            @for($i=1;$i<=10;$i++)
                                <tr>
                                    <td>Item Name {!! $i !!}</td>
                                    <td>Seller Name {!! $i !!}</td>
                                    <td>New Order</td>
                                    <td>{!! rand(10,150) !!}</td>
                                    <td>{!! number_format(rand(10000,35000),2) !!} SGD</td>

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