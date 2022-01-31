@extends('layout.app')
@section('page-title') Doctors Management @endsection
@section('css')
    {!! Html::style('public/material/plugins/select2/css/select2.min.css') !!}
    <style>
        #image-preview {
            width: 100%;
            height: 200px;
            position: relative;
            overflow: hidden;
            background-color: #f9f9f9;
            color: #ecf0f1;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }
        #image-preview input {
            line-height: 200px;
            font-size: 200px;
            position: absolute;
            opacity: 0;
            z-index: 10;
        }
        #image-preview label {
            position: absolute;
            z-index: 5;
            opacity: 0.8;
            cursor: pointer;
            background-color: #bdc3c7;
            width: 200px;
            height: 50px;
            font-size: 20px;
            line-height: 50px;
            text-transform: uppercase;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            margin: auto;
            text-align: center;
        }
    </style>
@endsection

@section('content')
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                @if(isset($doctor))
                    <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Doctor</span> - {!! $doctor->fname.' '.$doctor->lname !!}</h4>
                    @else
                    <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Doctor</span> - New</h4>
                    @endif

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none">
                <div class="d-flex justify-content-center">
                    <a href="#" class="btn btn-link btn-float text-body"><i class="icon-bars-alt text-primary"></i><span>Dashboard</span></a>
                    <a href="/doctors" class="btn btn-link btn-float text-body"><i class="icon-calculator text-primary"></i> <span>Doctors</span></a>
                </div>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="/dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Dashboards</a>
                    <a href="/doctors" class="breadcrumb-item">Doctors</a>
                    @if(isset($doctor))
                    <span class="breadcrumb-item active">Dr. {!! $doctor->fname.' '.$doctor->lname !!}</span>
                        @else
                        <span class="breadcrumb-item active">New Doctor</span>
                    @endif
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>


        </div>
    </div>
    <div class="content">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">New Doctor</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>


                    </div>
                </div>
            </div>

            <div class="card-body">

                <form class="col s12" id="user-form" method="post" action="/doctor/add_doctor" enctype="multipart/form-data">
                    <div class="container">
                        <div class="row">
                        <div class="col-lg-3">
                            <div class="card card-body text-center">
                                <div class="card-img-actions d-inline-block mb-3">
                                    <div id="image-preview" @if(isset($doctor)) style="background-image: url({!! \Illuminate\Support\Facades\Storage::disk('images')->url($doctor->profile_picture) !!})" @endif>
                                        <label for="image-upload" id="image-label">Choose Image</label>
                                        <input type="file" id="image-upload" name="profile_image" accept="image/png, image/gif, image/jpeg" />
                                    </div>


                                </div>
                            </div>
                            <div class="card card-body">
                                <div class="form-group">
                                    <label>Doctor Role:</label>
                                    <select class="form-control" name="doctor_role" id="selectuserrole">
                                        <option>Select</option>
                                        @php
                                            $roles = \App\DoctorRoles::all();
                                        @endphp
                                        @if(isset($roles) && $roles->count() > 0)
                                            @foreach($roles as $role)
                                                <option value="{!! $role->id !!}" @if(isset($doctor) && $doctor->doctor_role==$role->id) selected @endif>{!! $role->role_name !!}</option>
                                            @endforeach
                                            @endif

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="furl">Facebook Url:</label>
                                    <input type="text" class="form-control"  value="{!! isset($doctor)?$doctor->facebook_url:'' !!}"  name="facebook_url" id="furl" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="furl">LinkedIn Url:</label>
                                    <input type="text" class="form-control"  value="{!! isset($doctor)?$doctor->linkedin_url:'' !!}"  id="lurl" name="linkedin_url" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="furl">Twitter Url:</label>
                                    <input type="text" class="form-control"  value="{!! isset($doctor)?$doctor->twitter_url:'' !!}"  name="twitter_url" id="turl" placeholder="">
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <input type="hidden" name="id" id="doctor_id" value="{!! isset($doctor)?$doctor->id:'' !!}" />
                            {{ csrf_field() }}
                            <div class="card mb-3">
                                <div class="card-header bg-light"><h6 class="card-title">Personal information</h6></div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-sm-12">
                                            <label for="first_name" class="">First Name</label>
                                            <input id="first_name" name="first_name"  value="{!! isset($doctor)?$doctor->fname:'' !!}" type="text" class="form-control" required  data-error=".errorTxt1">


                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-12">
                                            <label for="last_name">Last Name</label>
                                            <input id="last_name" type="text" class="form-control"  value="{!! isset($doctor)?$doctor->lname:'' !!}" name="last_name" required  data-error=".errorTxt2">

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-sm-12">
                                            <label for="last_name">Date of birth</label>
                                            <input id="date_of_birth" type="text" class="form-control"  value="{!! isset($doctor)?$doctor->date_of_birth:'' !!}" name="date_of_birth" required  data-error=".errorTxt2">

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-sm-12">
                                            <label for="last_name">Gender</label>
                                            <select class="form-control" name="gender" required="">
                                                <option value="">Gender</option>
                                                <option value="Male"  @if(isset($doctor) && $doctor->gender=="Male") selected @endif>Male</option>
                                                <option value="Female"   @if(isset($doctor) && $doctor->gender=="Female") selected @endif>Female</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-12">
                                            <label for="last_name">Specialities <small class="text-danger">(can add multiple)</small></label>
                                            <input type="text" name="specialities" class="form-control tokenfield" VALUE="{!!  isset($doctor)?$doctor->specialities:'' !!}" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-12">
                                            <label for="last_name">About Me</label>
                                            <textarea class="form-control" name="about_me" required rows="5">{!!  isset($doctor)?$doctor->about_me:'' !!}</textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-12">
                                            <label for="last_name">Biography</label>
                                            <textarea class="form-control" name="biography" required rows="5">{!!  isset($doctor)?$doctor->biography:'' !!}</textarea>
                                        </div>
                                    </div>

                                </div>


                            </div>

                            <div class="card mb-3">
                                <div class="card-header bg-light"><h6 class="card-title">Contact information</h6></div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-sm-12">
                                            <label for="phone_number" class="">Phone Number</label>
                                            <input id="phone_number" name="phone_number"  value="{!! isset($doctor)?$doctor->phone_number:'' !!}"   type="text" class="form-control"   data-error=".errorTxt3">

                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label for="mobile_number" class="">Mobile Number</label>
                                            <input id="mobile_number" name="mobile_number"  value="{!! isset($doctor)?$doctor->mobile_number:'' !!}"   type="text" class="form-control"   data-error=".errorTxt3">


                                        </div>

                                            <div class="form-group col-sm-12">
                                                <label for="email">Email</label>
                                                <input id="email" type="email" class="small-text-formatting email form-control"  value="{!! isset($doctor)?$doctor->users->email:'' !!}"   name="email" required   data-error=".errorTxt4">


                                            </div>



                                        <div class="form-group col-sm-6">
                                            <label for="zipcode">Zip</label>
                                            <input id="zipcode" type="text" class="small-text-formatting  form-control"  value="{!! isset($doctor)?$doctor->zip_code:'' !!}"   name="zipcode" required   data-error=".errorTxt4">


                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="city">City</label>
                                            <input id="city" type="text" class="small-text-formatting  form-control" name="city"  value="{!! isset($doctor)?$doctor->city:'' !!}"    data-error=".errorTxt4">


                                        </div>

                                        <div class="form-group col-sm-12">
                                            <label for="address">Address</label>
                                            <textarea class="form-control" name="address" required> {!! isset($doctor)?$doctor->address:'' !!}  </textarea>


                                        </div>

                                    </div>

                                </div>
                            </div>
                            @if(isset($doctor) && isset($doctor->doctor_experience) && $doctor->doctor_experience->count() > 0)

                                @foreach($doctor->doctor_experience as $experience)
                            <div class="card mb-3 experience">
                                        <div class="card-header bg-light header-elements-sm-inline py-sm-1">
                                            <h6 class="card-title">Experience</h6>
                                            <div class="header-elements">
                                                <button type="button" class="btn btn-light btn-icon btn-sm add-more"><i class="icon-plus-circle2"></i></button>
                                                <button type="button" class="btn btn-danger btn-icon btn-sm delete-experience" style="display: none"><i class="icon-cross2"></i></button>
                                            </div>
                                        </div>
                                        <div class="card-body">

                                            <input type="hidden" name="experience_id[]" value="{!! $experience->id !!}" />
                                            <div class="form-group col-sm-12">
                                                <label for="position" class="">Position</label>
                                                <input id="position" name="position[]" type="text" value="{!! $experience->position !!}" class="form-control" required   data-error=".errorTxt3">

                                            </div>
                                            <div class="form-group col-sm-12">
                                                <label for="department" class="">Department</label>
                                                <input id="department" name="department[]" value="{!! $experience->department !!}" type="text" class="form-control"  required  data-error=".errorTxt3">

                                            </div>
                                            <div class="form-group col-sm-12">
                                                <label for="department" class="">Hospital</label>
                                                <input id="department" name="hospital[]" value="{!! $experience->hospital !!}" type="text" class="form-control"  required  data-error=".errorTxt3">

                                            </div>
                                            <div class="form-group col-sm-12">
                                                <label for="year" class="">Year</label>
                                                <select class="form-control" name="year[]">
                                                    <option value="">Select Year</option>
                                                    @for($i=date('Y');$i>=1970;$i--)
                                                        <option @if(isset($doctor) && $experience->year==$i) selected @endif value="{!! $i !!}">{!! $i !!}</option>
                                                    @endfor
                                                </select>

                                            </div>

                                            <div class="form-group col-sm-12">
                                                <label for="summary">Summary</label>
                                                <textarea class="form-control" name="summary[]">{!! $experience->summary !!}</textarea>


                                            </div>






                                        </div>
                                    </div>
                                @endforeach
                             @else
                                <div class="card mb-3 experience">
                                    <div class="card-header bg-light header-elements-sm-inline py-sm-1">
                                        <h6 class="card-title">Experience</h6>
                                        <div class="header-elements">
                                            <button type="button" class="btn btn-light btn-icon btn-sm add-more"><i class="icon-plus-circle2"></i></button>
                                            <button type="button" class="btn btn-danger btn-icon btn-sm delete-experience" style="display: none"><i class="icon-cross2"></i></button>
                                        </div>
                                    </div>
                                    <div class="card-body">

                                        <input type="hidden" name="experience_id[]" value="" />
                                        <div class="form-group col-sm-12">
                                            <label for="position" class="">Position</label>
                                            <input id="position" name="position[]" type="text" value="" class="form-control" required   data-error=".errorTxt3">

                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label for="department" class="">Department</label>
                                            <input id="department" name="department[]" value="" type="text" class="form-control"  required  data-error=".errorTxt3">

                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label for="department" class="">Hospital</label>
                                            <input id="department" name="hospital[]" value="" type="text" class="form-control"  required  data-error=".errorTxt3">

                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label for="year" class="">Year</label>
                                            <select class="form-control" name="year[]">
                                                <option value="">Select Year</option>
                                                @for($i=date('Y');$i>=1970;$i--)
                                                    <option value="{!! $i !!}">{!! $i !!}</option>
                                                @endfor
                                            </select>

                                        </div>

                                        <div class="form-group col-sm-12">
                                            <label for="summary">Summary</label>
                                            <textarea class="form-control" name="summary[]"></textarea>


                                        </div>






                                    </div>
                                </div>
                             @endif
                            <div class="card card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <a href="#!" class="btn btn-danger save-doctor"><i class="icon-floppy-disk mr-3"></i> Save</a>
                                        <a href="#!" class="btn btn-danger reset-doctor"><i class="icon-redo mr-3"></i> Reset</a>
                                        <div class="card green success-message bg-green" style="display: none;">
                                            <div class="card-content white-text">
                                                <p>d</p>
                                            </div>
                                        </div>
                                        <div class="card red error-message bg-danger"  style="display: none;">
                                            <div class="card-content white-text">
                                                <p>d</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>
                    </div>
                </form>


            </div>
        </div>
    </div>



@endsection


@section('js')
    {!! Html::script('public/js/jquery.form.js') !!}
    {!! Html::script('public/js/jquery.uploadPreview.js') !!}
    {!! Html::script('public/plugins/jquery.validate/js/jquery.validate.min.js') !!}
    {!! Html::script('public/material/plugins/select2/js/select2.min.js') !!}
    {!! Html::script(url('/').'/bootstrap/js/plugins/forms/tags/tokenfield.min.js') !!}
    <script>

        $(function(){
            $("#date_of_birth").datepicker({
                dateFormat: 'dd.mm.yy'
                ,
                maxDate: "today"
            });
            $('.tokenfield').tokenfield();
            $("body").on("click",".add-more",function () {
                var experience = $(this).parents('.experience').first().clone();
                experience.find('.add-more').hide();
                experience.find('.delete-experience').show();
                experience.find('input').val('');
                $(".experience").last().after(experience);
            });

            $("body").on("click",".delete-experience",function () {
                var experience = $(this).parents('.experience').remove();

            });

            $.uploadPreview({
                input_field: "#image-upload",   // Default: .image-upload
                preview_box: "#image-preview",  // Default: .image-preview
                label_field: "#image-label",    // Default: .image-label
                label_default: "Choose File",   // Default: Choose File
                label_selected: "Change File",  // Default: Change File
                no_label: true                 // Default: false
            });

            $('.doctor_service').select2({dropdownAutoWidth : 'true'});;
            var timeoutId;

            $(".dropdown-item").click(function(){
                var doctor_id = $(this).attr('data-id');
                var action = $(this).attr('data-action');

                switch(action){

                    case "edit":
                        $.ajax({
                            url:"/doctor/"+doctor_id,
                            success:function(response){
                                response = $.parseJSON(response);
                                $("#doctor-modal #doctor_id").val(doctor_id);
                                $("#doctor-modal #first_name").val(response.fname);
                                $("#doctor-modal #last_name").val(response.lname);
                                $("#doctor-modal #phone_number").val(response.phone_number);
                                $("#doctor-modal #mobile_number").val(response.mobile_number);
                                $("#doctor-modal #email").val(response.email);
                                $("#doctor-modal #notes").val(response.notes);
                                $("#doctor-modal").modal();;
                            }
                        });
                        break;
                    case "delete":
                        if(confirm("Do you want delete?")){
                            $.ajax({
                                url:"/doctor/delete/"+doctor_id,
                                success:function(response){
                                    location.reload();
                                }
                            });
                        }

                        break;
                    case "view":
                        $.ajax({
                            url:"/get/doctor/detail/"+doctor_id,
                            success:function (response) {
                                $("#doctor-modal-view .modal-body").html(response);
                            }
                        });
                        $("#doctor-modal-view").modal();
                        break;
                }
            });


            $(".adddoctor").click(function(){

                $("#doctor-modal").modal();;
            });
            $(".save-doctor").click(function(e){
                $(".alert").hide();


                if($("#user-form").valid()){

                    $("#user-form").ajaxForm(function(response){
                        response = $.parseJSON(response);
                        if(response.type=="success"){
                            $('.success-message').html(response.message);
                            $('.success-message').fadeIn();

                            setTimeout(function(){
                                window.location = "/doctors";
                            }, 2500);
                        }else{
                            $('.error-message').html(response.message);
                            $('.error-message').fadeIn();
                        }
                    }).submit();
                }
                e.preventDefault();
            });
        })




    </script>
    {{--{!! Html::script('public/demo/demo-form-layouts.js') !!}--}}
@endsection