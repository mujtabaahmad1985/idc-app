@extends('layout.app')
@section('page-title') Add Patient @endsection
@section('css')

    {!! Html::style('public/plugins/bootstrap-switch/css/bootstrap-switch.min.css') !!}
    {!! Html::style('public/plugins/select2/css/select2.min.css') !!}
    {!! Html::style('public/plugins/jasny-bootstrap/css/jasny-bootstrap.min.css') !!}
    {!! Html::style('public/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') !!}
    {!! Html::style('public/plugins/rippler/css/rippler.min.css') !!}
    {!! Html::style('public/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') !!}
    {!! Html::style('public/plugins/bootstrap-daterangepicker/css/bootstrap-daterangepicker.min.css') !!}
    {!! Html::style('public/plugins/bootstrap-tabdrop/css/tabdrop.css') !!}

    {!! Html::style('public/plugins/bootstrap-sweetalert/css/sweetalert.css') !!}

    {!! Html::style('public/plugins/icheck/css/skins/all.css') !!}

    {!! Html::style('public/css/main.min.css') !!}
    {!! Html::style('public/css/plugins.min.css') !!}
    {!! Html::style('public/css/admin.css') !!}
    {!! Html::style('public/css/theme-default.css') !!}
    {!! Html::style('public/css/custom.css') !!}
@endsection

@section('content')
    <div class="content">
        <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
                <li class="active">Patient</li>
            </ol>
        </div><!-- /.breadcrumb-wrapper -->
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title-wrapper">
                    <h2 class="page-title">Patient</h2>

                </div><!-- /.page-titile-wrapper -->
            </div>



        </div>

<div id="is_patient_set"></div>

        <div class="row">
            <div class="col-sm-2">
                <ul class="nav nav-tabs underline-tabs primary-tabs nav-stacked">
                    <li class="active">
                        <a href="#personal" data-toggle="tab" aria-expanded="true">
                            <i class="fa fa-user m-right-10"></i> Personal
                        </a>
                    </li>
                    <li class="">
                        <a href="#medical" class="inner-tabs" data-toggle="tab" aria-expanded="false">
                            <i class="fa fa-heartbeat m-right-10"></i> Medical
                        </a>
                    </li>

                    <li>
                        <a href="#billing"  class="inner-tabs" data-toggle="tab">
                            <i class="fa fa-tag m-right-10"></i> Billing
                        </a>
                    </li>
                </ul>
            </div><!-- /.col-sm-3 -->

            <div class="col-sm-10">
                <div class="tab-content">
                    <div class="tab-pane fade active in" id="personal">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form class="form-m m-top-15" id="form" action="/patients/personal/add" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-xs-6 col-sm-4 col-md-4">

                                            <div class="form-group has-floating-label form-group-primary">
                                                <i class="material-icons prefix">account_circle</i>
                                                <input type="text" class="form-control" id="first_name">
                                                <label for="inputEmailExample1">Basic example</label>
                                                <span class="line"></span>
                                            </div><!-- /.form-group -->

                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input class="form-control"  type="text" name="first_name" />
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-4 col-md-4">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input class="form-control"  type="text"name="last_name" />
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-4 col-md-4">
                                            <div class="form-group">
                                                <label>Date of Birth</label>
                                                <input class="form-control"  type="text" name="date_of_birth" data-provide="datepicker" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-3 col-sm-3 col-md-3">
                                            <div class="form-group">
                                                <label>Gendar</label>
                                                <select class="form-control" name="gender">
                                                    <option value="">Gendar</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-3 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label>Nationality</label>
                                                <select class="form-control" name="nationality">
                                                    <option value="">Nationality</option>
                                                    <option value="male">Singapore</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                            <div class="form-group">
                                                <label>ID Card Type</label>
                                                <select class="form-control" name="card_type">
                                                    <option value="">Choose Type</option>
                                                    <option value="1">Type1</option>
                                                    <option value="2">Type2</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                            <div class="form-group">
                                                <label>Card Number</label>
                                                <input class="form-control"  type="text" name="card_number" />
                                            </div>
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                            <div class="form-group">
                                                <label>Unique ID</label>
                                                <input class="form-control"  type="text" readonly name="unique_number" />
                                            </div>
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label>Country</label>
                                                <select class="form-control" name="country">
                                                    <option value="">Country</option>
                                                    <option value="male">Singapore</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label>Mobile Number</label>
                                                <input class="form-control" type="text" name="mobile_number" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <textarea class="form-control" name="address"></textarea>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6 col-sm-4 col-md-4">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input class="form-control" type="text" name="city" />
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-4 col-md-4">
                                            <div class="form-group">
                                                <label>State</label>
                                                <input class="form-control" type="text" name="state" />
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-4 col-md-4">
                                            <div class="form-group">
                                                <label>Zipcode</label>
                                                <input class="form-control" type="text" name="zipcode" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6 col-sm-4 col-md-4">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input class="form-control" type="email" name="emal" />
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-4 col-md-4">
                                            <div class="form-group">
                                                <label>Guardian</label>
                                                <input class="form-control" name="guardian" />
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-4 col-md-4">
                                            <div class="form-group">
                                                <label>Relationship</label>

                                                <select name="relationship" class="form-control">
                                                    <option value="">Choose Guardian</option>
                                                    <option value="father">Father</option>
                                                    <option value="mother">Mother</option>
                                                    <option value="son">Son</option>
                                                    <option value="daughter">Daughter</option>
                                                    <option value="husband">Husband</option>
                                                    <option value="wife">Wife</option>
                                                    <option value="brother">Brother</option>
                                                    <option value="sister">Sister</option>
                                                    <option value="grandfather">Grandfather</option>
                                                    <option value="grandmother">Grandmother</option>
                                                    <option value="uncle">Uncle</option>
                                                    <option value="aunty">Aunty</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 text-right">
                                            <button class="btn btn-success save"><i class="fa fa-floppy-o"></i>&nbsp; Add Patient Personal</button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!-- /.tab-pane -->

                    <div class="tab-pane fade" id="medical">
                        <form>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-xs-4 col-sm-3 col-md-3">
                                            <p>Are you any medication?</p>
                                            <div class="form-group">
                                                <div class="radio">
                                                    <label class="block">
                                                        <input type="radio" class="icheck-line-red" name="medication" checked>
                                                        <small>Yes</small>
                                                    </label>
                                                </div>
                                            </div><!-- /.form-group -->
                                            <div class="form-group">
                                                <div class="radio">
                                                    <label class="block">
                                                        <input type="radio" class="icheck-line-red" name="medication" >
                                                        <small>No</small>
                                                    </label>
                                                </div>
                                            </div><!-- /.form-group -->
                                        </div>
                                        <div class="col-xs-8 col-sm-9 col-md-9">
                                            <textarea class="form-control" rows="5" placeholder="if yes, please state all the medication you are talking."></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-4 col-sm-3 col-md-3">
                                            <p>Are you allegric to any medication?</p>
                                            <div class="form-group">
                                                <div class="radio">
                                                    <label class="block">
                                                        <input type="radio" class="icheck-line-red" name="allegric" checked>
                                                        <small>Yes</small>
                                                    </label>
                                                </div>
                                            </div><!-- /.form-group -->
                                            <div class="form-group">
                                                <div class="radio">
                                                    <label class="block">
                                                        <input type="radio" class="icheck-line-red" name="allegric" >
                                                        <small>No</small>
                                                    </label>
                                                </div>
                                            </div><!-- /.form-group -->
                                        </div>
                                        <div class="col-xs-8 col-sm-9 col-md-9">
                                            <textarea class="form-control" rows="5" placeholder="if yes, please state all possible allergic."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3>Do you suffer from any of the following ilnessess?</h3>
                                    <hr />
                                    <div class="row">
                                        <div class="col-xs-4 col-sm-2 col-md-2">
                                            <p>Allergie</p>
                                            <div class="form-group">
                                                <div class="radio">
                                                    <label class="block">
                                                        <input type="radio" class="icheck-line-red" name="allergie" checked>
                                                        <small>Yes</small>
                                                    </label>
                                                </div>
                                            </div><!-- /.form-group -->
                                            <div class="form-group">
                                                <div class="radio">
                                                    <label class="block">
                                                        <input type="radio" class="icheck-line-red" name="allergie" >
                                                        <small>No</small>
                                                    </label>
                                                </div>
                                            </div><!-- /.form-group -->
                                        </div>
                                        <div class="col-xs-4 col-sm-2 col-md-2">
                                            <p>Gastric Problems</p>
                                            <div class="form-group">
                                                <div class="radio">
                                                    <label class="block">
                                                        <input type="radio" class="icheck-line-red" name="gastric_problems" checked>
                                                        <small>Yes</small>
                                                    </label>
                                                </div>
                                            </div><!-- /.form-group -->
                                            <div class="form-group">
                                                <div class="radio">
                                                    <label class="block">
                                                        <input type="radio" class="icheck-line-red" name="gastric_problems" >
                                                        <small>No</small>
                                                    </label>
                                                </div>
                                            </div><!-- /.form-group -->
                                        </div>
                                        <div class="col-xs-4 col-sm-2 col-md-2">
                                            <p>High Blood Pressure</p>
                                            <div class="form-group">
                                                <div class="radio">
                                                    <label class="block">
                                                        <input type="radio" class="icheck-line-red" name=">high_blood_pressure" checked>
                                                        <small>Yes</small>
                                                    </label>
                                                </div>
                                            </div><!-- /.form-group -->
                                            <div class="form-group">
                                                <div class="radio">
                                                    <label class="block">
                                                        <input type="radio" class="icheck-line-red" name="high_blood_pressure" >
                                                        <small>No</small>
                                                    </label>
                                                </div>
                                            </div><!-- /.form-group -->
                                        </div>

                                        <div class="col-xs-4 col-sm-2 col-md-2">
                                            <p>Asthma</p>
                                            <div class="form-group">
                                                <div class="radio">
                                                    <label class="block">
                                                        <input type="radio" class="icheck-line-red" name="asthma" checked>
                                                        <small>Yes</small>
                                                    </label>
                                                </div>
                                            </div><!-- /.form-group -->
                                            <div class="form-group">
                                                <div class="radio">
                                                    <label class="block">
                                                        <input type="radio" class="icheck-line-red" name="asthma" >
                                                        <small>No</small>
                                                    </label>
                                                </div>
                                            </div><!-- /.form-group -->
                                        </div>
                                        <div class="col-xs-4 col-sm-2 col-md-2">
                                            <p>Head/Neck Injuries</p>
                                            <div class="form-group">
                                                <div class="radio">
                                                    <label class="block">
                                                        <input type="radio" class="icheck-line-red" name="dead_neck injuries" checked>
                                                        <small>Yes</small>
                                                    </label>
                                                </div>
                                            </div><!-- /.form-group -->
                                            <div class="form-group">
                                                <div class="radio">
                                                    <label class="block">
                                                        <input type="radio" class="icheck-line-red" name="dead_neck" >
                                                        <small>No</small>
                                                    </label>
                                                </div>
                                            </div><!-- /.form-group -->
                                        </div>
                                        <div class="col-xs-4 col-sm-2 col-md-2">
                                            <p>Kidney Problems</p>
                                            <div class="form-group">
                                                <div class="radio">
                                                    <label class="block">
                                                        <input type="radio" class="icheck-line-red" name="kidney_problems" checked>
                                                        <small>Yes</small>
                                                    </label>
                                                </div>
                                            </div><!-- /.form-group -->
                                            <div class="form-group">
                                                <div class="radio">
                                                    <label class="block">
                                                        <input type="radio" class="icheck-line-red" name="kidney_problems" >
                                                        <small>No</small>
                                                    </label>
                                                </div>
                                            </div><!-- /.form-group -->
                                        </div>

                                        <div class="col-xs-4 col-sm-2 col-md-2">
                                            <p>Diabetes</p>
                                            <div class="form-group">
                                                <div class="radio">
                                                    <label class="block">
                                                        <input type="radio" class="icheck-line-red" name="diabetes" checked>
                                                        <small>Yes</small>
                                                    </label>
                                                </div>
                                            </div><!-- /.form-group -->
                                            <div class="form-group">
                                                <div class="radio">
                                                    <label class="block">
                                                        <input type="radio" class="icheck-line-red" name="diabetes" >
                                                        <small>No</small>
                                                    </label>
                                                </div>
                                            </div><!-- /.form-group -->
                                        </div>
                                        <div class="col-xs-4 col-sm-2 col-md-2">
                                            <p>Heart Disease</p>
                                            <div class="form-group">
                                                <div class="radio">
                                                    <label class="block">
                                                        <input type="radio" class="icheck-line-red" name="heart_disease" checked>
                                                        <small>Yes</small>
                                                    </label>
                                                </div>
                                            </div><!-- /.form-group -->
                                            <div class="form-group">
                                                <div class="radio">
                                                    <label class="block">
                                                        <input type="radio" class="icheck-line-red" name="heart_disease" >
                                                        <small>No</small>
                                                    </label>
                                                </div>
                                            </div><!-- /.form-group -->
                                        </div>
                                        <div class="col-xs-4 col-sm-2 col-md-2">
                                            <p>Liver Problems</p>
                                            <div class="form-group">
                                                <div class="radio">
                                                    <label class="block">
                                                        <input type="radio" class="icheck-line-red" name="liver_problems" checked>
                                                        <small>Yes</small>
                                                    </label>
                                                </div>
                                            </div><!-- /.form-group -->
                                            <div class="form-group">
                                                <div class="radio">
                                                    <label class="block">
                                                        <input type="radio" class="icheck-line-red" name="liver_problems" >
                                                        <small>No</small>
                                                    </label>
                                                </div>
                                            </div><!-- /.form-group -->
                                        </div>

                                        <div class="col-xs-4 col-sm-2 col-md-2">
                                            <p>Eilepsy</p>
                                            <div class="form-group">
                                                <div class="radio">
                                                    <label class="block">
                                                        <input type="radio" class="icheck-line-red" name="eilepsy" checked>
                                                        <small>Yes</small>
                                                    </label>
                                                </div>
                                            </div><!-- /.form-group -->
                                            <div class="form-group">
                                                <div class="radio">
                                                    <label class="block">
                                                        <input type="radio" class="icheck-line-red" name="eilepsy" >
                                                        <small>No</small>
                                                    </label>
                                                </div>
                                            </div><!-- /.form-group -->
                                        </div>
                                        <div class="col-xs-4 col-sm-2 col-md-2">
                                            <p>Herpes</p>
                                            <div class="form-group">
                                                <div class="radio">
                                                    <label class="block">
                                                        <input type="radio" class="icheck-line-red" name="herpes" checked>
                                                        <small>Yes</small>
                                                    </label>
                                                </div>
                                            </div><!-- /.form-group -->
                                            <div class="form-group">
                                                <div class="radio">
                                                    <label class="block">
                                                        <input type="radio" class="icheck-line-red" name="herpes" >
                                                        <small>No</small>
                                                    </label>
                                                </div>
                                            </div><!-- /.form-group -->
                                        </div>
                                        <div class="col-xs-4 col-sm-2 col-md-2">
                                            <p>Respiratory</p>
                                            <div class="form-group">
                                                <div class="radio">
                                                    <label class="block">
                                                        <input type="radio" class="icheck-line-red" name="respiratory" checked>
                                                        <small>Yes</small>
                                                    </label>
                                                </div>
                                            </div><!-- /.form-group -->
                                            <div class="form-group">
                                                <div class="radio">
                                                    <label class="block">
                                                        <input type="radio" class="icheck-line-red" name="respiratory" >
                                                        <small>No</small>
                                                    </label>
                                                </div>
                                            </div><!-- /.form-group -->
                                        </div>

                                        <div class="col-md-12">
                                            <textarea class="form-control" placeholder="Other"></textarea>
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="col-xs-4 col-sm-3 col-md-3">
                                            <p>If female, are you pragnent</p>
                                            <div class="form-group">
                                                <div class="radio">
                                                    <label class="block">
                                                        <input type="radio" class="icheck-line-red" name="pragnent" checked>
                                                        <small>Yes</small>
                                                    </label>
                                                </div>
                                            </div><!-- /.form-group -->
                                            <div class="form-group">
                                                <div class="radio">
                                                    <label class="block">
                                                        <input type="radio" class="icheck-line-red" name="pragnent" >
                                                        <small>No</small>
                                                    </label>
                                                </div>
                                            </div><!-- /.form-group -->
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <p>I would like to recive a regular check-up reminder by</p>
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" class="icheck-flat-red">
                                                            Email
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" class="icheck-flat-red">
                                                            SMS
                                                        </label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" class="icheck-flat-red">
                                                            POST
                                                        </label>
                                                    </div>
                                                </div><!-- /.form-group -->
                                            </div><!-- /.form-group -->

                                        </div>
                                        <div class="col-xs-2 col-sm-3 col-md-3 text-right">
                                            <button class="btn btn-success"><i class="fa fa-floppy-o"></i> Save </button>
                                            <button class="btn btn-warning grey"><i class="fa fa-file"></i> Update PDF </button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </form>
                    </div><!-- /.tab-pane -->

                    <div class="tab-pane fade" id="billing">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form>
                                    <div class="row">
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <label>Reffered by</label>
                                            <input type="text" class="form-control" />
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <label>IDC-Code(if you have one)</label>
                                            <input type="text" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row m-top-5">
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <label>Payment Mode</label>
                                            <select class="form-control">
                                                <option value="">Select payment mode</option>
                                                <option value="Cash Payment">Cash Payment</option>
                                                <option value="Cheque">Cheque</option>
                                                <option value="Bank Draft">Bank Draft</option>
                                                <option value="Master Card">Master Card</option>
                                                <option value="Online Transfer">Online Transfer</option>
                                            </select>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <label>Insurance</label> <br />
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <span class="btn btn-default-outline btn-file">
                                                  <span class="fileinput-new">Upload file</span>
                                                  <span class="fileinput-exists">Change</span>
                                                  <input type="file" name="">
                                                </span>
                                                <span class="fileinput-filename"></span>
                                                <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">&times;</a>
                                            </div><!-- /.fileinput -->
                                        </div>
                                    </div>
                                    <div class="row m-top-5">
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <label>Profession</label>
                                            <input type="text" class="form-control" />
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <label>Policy No</label> <br />
                                            <input type="text" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row m-top-5">
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <label>Exp Date</label>
                                            <input type="text" class="form-control"  data-provide="datepicker" />
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <label>MSC</label> <br />
                                            <input type="text" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row m-top-15">
                                        <div class="col-md-12 text-right">
                                            <button class="btn btn-success"><i class="fa fa-floppy-o"></i> Save Billing info</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!-- /.tab-pane -->


                </div><!-- /.tab-content -->
            </div><!-- /.col-sm-8 -->
        </div>



    </div>
@endsection


@section('js')
    {!! Html::script('public/js/jquery.min.js') !!}
    {!! Html::script('public/js/bootstrap.min.js') !!}
    {!! Html::script('public/js/materialize.js') !!}
    {!! Html::script('public/plugins/jquery.slimscroll/js/jquery.slimscroll.min.js') !!}
    {!! Html::script('public/plugins/bootstrap-switch/js/bootstrap-switch.min.js') !!}
    {!! Html::script('public/plugins/jquery.succinct/js/jquery.succinct.min.js') !!}
    {!! Html::script('public/plugins/jasny-bootstrap/js/fileinput.js') !!}
    {!! Html::script('public/plugins/holderjs/js/holder.min.js') !!}
    {!! Html::script('public/plugins/bootstrap-hover-dropdown/js/bootstrap-hover-dropdown.min.js') !!}
    {!! Html::script('public/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') !!}
    {!! Html::script('public/plugins/moment/js/moment.min.js') !!}
    {!! Html::script('public/plugins/bootstrap-daterangepicker/js/bootstrap-daterangepicker.min.js') !!}
    {!! Html::script('public/plugins/rippler/js/jquery.rippler.min.js') !!}
    {!! Html::script('public/plugins/bootstrap-sweetalert/js/sweetalert.min.js') !!}
    {!! Html::script('public/js/jquery.form.js') !!}
    {!! Html::script('public/plugins/select2/js/select2.full.min.js') !!}
    {!! Html::script('public/plugins/jquery.validate/js/jquery.validate.min.js') !!}
    {!! Html::script('public/plugins/icheck/js/icheck.min.js') !!}



    {!! Html::script('public/plugins/markdown-js/js/markdown.min.js') !!}
    {!! Html::script('public/js/main.min.js') !!}
    {!! Html::script('public/js/admin.js') !!}
    <script>
        $(function () {
            $(".bs-switch-example").bootstrapSwitch();
            $(".dont-hide").click(function (event) {
                event.stopPropagation();
            });

            $(".inner-tabs").click(function(){
                var is_set = $("#is_patient_set").attr('data-value');
                if(!is_set){
                    swal('Please fill patient personal info first!');
                    return false;
                }

            });

            $("select").select2();
            $('.icheck-line-red').each(function(){
                var self = $(this),
                    // Following the Bootstrap markup structure and being already located in the <label> we use a <small> that acts as a <label>.
                    small = self.next(),
                    small_text = small.text();

                small.remove();
                self.iCheck({
                    checkboxClass: 'icheckbox_line-red',
                    radioClass: 'iradio_line-red',
                    insert: '<div class="icheck_line-icon"></div>' + small_text
                });
            });
            $('input.icheck-flat-red').iCheck({
                checkboxClass: 'icheckbox_flat-red',
                radioClass: 'iradio_flat-red'
            });

            $(".save").click(function(e){
                $validation = $("#form").validate({
                    // Validation rules
                    // Selecting input by name attribute
                    rules: {
                        first_name: {
                            required: true,
                        },

                        last_name: {
                            required: true
                        },
                        email: {
                            email: true,
                            required: true
                        },
                        mobile_number: {
                            required: true,
                        },
                        card_type: {
                            required: true
                        },
                        date_of_birth: {
                            required: true,
                        },
                        card_number:{
                            required:true,
                        },
                        gender:{
                            required:true,
                        },
                        zipcode:{
                            required:true,
                        }
                    },
                    // Error messages
                    messages: {

                        email: "Email Address is required",
                        first_name: "First name is required ",
                        last_name: "Last name is required",
                        date_of_birth: "Date of birth is required",
                        mobile_number: "Mobile number is required",
                        card_number:"Valid card number is required.",
                        gender:"Choose gender",
                        zipcode:"Zipcode is required"
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
                    errorElement: "div",
                    errorPlacement: function(error, element) {
                        $(element).closest(".form-group").append(error);

                        // Select2 validation
                        $("select").on("change", function(){
                            var select2Valid = $(this).valid();
                            // If clicked on clear button
                            if(!select2Valid){
                                $(this).parent().removeClass("has-success").addClass("has-error");
                            }
                        });
                    },
                    success: function(helpBlock) {
                        if( $(helpBlock).closest(".form-group").hasClass('has-error') ){
                            $(helpBlock).closest(".form-group").removeClass("has-error").addClass("has-success");
                        }
                    }
                });
                $("#form").valid();
                e.preventDefault();
            });
        })


    </script>
    {{--{!! Html::script('public/demo/demo-form-layouts.js') !!}--}}
@endsection