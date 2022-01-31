@extends('layout.app')
@section('page-title') Export @endsection
@section('css')

@endsection


@section('content')
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Export Data</span> - Patients</h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none">
                <div class="d-flex justify-content-center">
                    <a href="#" class="btn btn-link btn-float text-body"><i class="icon-bars-alt text-primary"></i><span>Dashboard</span></a>
                    <a href="/patients/add" class="btn btn-link btn-float text-body"><i class="icon-user text-primary"></i><span>Add Patient</span></a>
                </div>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="/dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Dashboards</a>
                    <a href="#" class="breadcrumb-item">Setup</a>
                    <span class="breadcrumb-item active">Export Data</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>


        </div>
    </div>
    <div class="content">
        <div class="card">


            <div class="card-body">
                <form id="export-form" action="/get/export/data" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-2 mb-2">
                            <select name="master_option" class="form-control" id="export-option-1">
                                <option value=""  selected>Choose Option</option>
                                <option value="patient">Patient</option>
                                <option value="product">Product</option>
                                {{--<option value="appointments">Appointments</option>--}}

                            </select>

                        </div>
                        <div class="col-md-2  mb-2  sub-option" rel="patient" style="display: none">
                            <select class="form-control" name="patient_option"  rel="patient"  >
                                <option value=""  selected>Choose Option</option>
                                <option value="age">Age</option>
                                <option value="gender">Gender</option>
                               {{-- <option value="appointments">Appointments</option>--}}
                                <option value="medical_conditions">Medical Conditions</option>
                                <option value="insuarance_by">Insuarance By</option>
                                <option value="date_registered">Date registered</option>
                            </select>

                        </div>

                        <div class="col-md-2  mb-2  sub-option" rel="product" style="display: none">
                            <select class="form-control" name="product_option"  rel="product"  >
                                <option value=""  selected>Choose Option</option>
                                <option value="all">All</option>
                                <option value="low_stock">With Low Stock</option>
                                {{-- <option value="appointments">Appointments</option>--}}
                                <option value="most_sale">Most Sale</option>
                            </select>

                        </div>

                        <div class="col-md-2  mb-2 sub-sub-option" rel="age" style="display: none">
                            <select class="form-control" name="age"  rel="age" style="display: none"  >
                                <option value=""  selected>Choose Option</option>
                                <option value="0-10"><10 years</option>
                                <option value="10-20">10-20 Years</option>
                                <option value="20-35">20-35 Year</option>
                                <option value="35-50">35-50 Years</option>
                                <option value="50-60">50-60 Years</option>
                                <option value="60-100">60+ Years</option>
                            </select>



                        </div>

                        <div class="col-md-2  mb-2 sub-sub-option" rel="gender" style="display: none">

                            <select class="form-control" name="gender"  rel="gender" style="display: none" >
                                <option value=""  selected>Choose Option</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>

                            </select>
                        </div>

                        <div class="col-md-2  mb-2 sub-sub-option" rel="appointments" style="display: none">

                            <select class="form-control" name="appointments"  rel="appointments" style="display: none" >
                                <option value=""  selected>Choose Option</option>
                                <option value="current-week">Current Week</option>
                                <option value="current-month">Current Month</option>
                                <option value="current-year">Current Year</option>

                            </select>
                        </div>

                        <div class="col-md-2  mb-2  sub-sub-option" rel="insuarance_by" style="display: none">

                            <select class="form-control" name="insuarance_by"  rel="insuarance_by" style="display: none" >
                                <option value=""  selected>Choose Option</option>
                                <option value="AIA">AIA</option>
                                <option value="AXA">AXA</option>
                                <option value="SHENTON">SHENTON</option>
                                <option value="CHAS">CHAS</option>
                                <option value="MEDICLAIM">MEDICLAIM</option>

                            </select>
                        </div>
                        <div class="col-md-6  mb-2 sub-sub-option" rel="medical_conditions" style="display: none">

                            <select class="form-control" name="medical_conditions[]" multiple  rel="medical_conditions" style="display: none" >

                                @if(isset($medical_conditions) && $medical_conditions->count() > 0)
                                    @foreach($medical_conditions as $condition)
                                        <option value="{!! $condition->id !!}">{!! $condition->name !!}</option>
                                    @endforeach
                                @endif

                            </select>
                        </div>

                        <div class="col-md-4  mb-2 sub-sub-option" rel="date_registered" style="display: none">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="from_date" rel="date_registered" autocomplete="off" placeholder="Enter From Date" class="form-control date" />
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="to_date" rel="date_registered"  autocomplete="off"  placeholder="Enter To Date" class="form-control date" />
                                </div>
                            </div>

                        </div>

                        <div class="col-md-1 mb-2 col-xs-2"><a href="javascript:;" class="btn btn-danger get-data">Get Data</a> </div>
                        <div class="col-md-1 col-xs-2"><a href="javascript:;" class="btn btn-danger export-data-csv" style="display: none;">Export</a> </div>

                    </div>
                </form>

            </div>
        </div>
        <div class="card">
            <div class="card-body" id="export-data">

            </div>

        </div>
    </div>


@endsection


@section('js')
    {!! Html::script('public/js/jquery.form.js') !!}
    {!! Html::script('public/js/jquery-ui.js') !!}

    {!! Html::script('public/plugins/jquery.validate/js/jquery.validate.min.js') !!}
    {!! Html::script(url('/').'/bootstrap/js/plugins/tables/datatables/datatables.min.js') !!}

<script>
    $(function () {
        $(".date").datepicker({dateFormat: 'dd.mm.yy'});
        $("#export-option-1").select2().on('change',function () {
            var option = $(this).val();
            $('.sub-option').hide();
            $(".sub-sub-option").hide();
            $(".sub-option[rel="+option+"]").show();

            $(".sub-option select[rel="+option+"]").select2();


        });

        $("body").on("click",".get-data",function () {
            $("input[name=do_export]").remove()
            $(".export-data-csv").hide();
            $("#export-data").html('');
                $('#export-form').ajaxForm(function (response) {
                    $("#export-data").append(response);
                    $(".export-data-csv").show();
                    $(".theme_radar").hide();

                    $("#export-data table").DataTable({
                        "paging": false, "false":     true,"searching": false,"bInfo":false,
                        dom: 'Bfrtip',
                        "lengthMenu": [ [100, 250, 500, -1], [100, 250, 500, "All"] ],

                    });



                }).submit();
        });


        $("body").on("click",'.export-data-csv',function () {
            $('#export-form').append('<input type="hidden" name="do_export" value="do_export">');
            $('#export-form').ajaxForm(function (response) {

                $("input[name=do_export]").remove();

                $(".theme_radar").hide();



            }).submit();
        });


        $(".sub-option select").on("change",function () {
            $(".sub-sub-option").hide();

              var option = $(this).val();

            $(".sub-sub-option[rel="+option+"]").show();

            $(".sub-sub-option select[rel="+option+"]").select2();

        });
    })

    function table_template(structure,data){
        var table = "";
        var header = '<thead>';
            header+="<tr>";
            $.each(structure,function(i,v){
                header+="<th>"+v+"</th>"
            });
            header+="</tr>";
        header+="</thead>"

        table+=header;


        return table;
    }
</script>
@endsection