@extends('layout.app')
@section('page-title') Hospital Management @endsection
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
    <div class="content">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">New Hospital</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>


                    </div>
                </div>
            </div>

            <div class="card-body">

                <form class="col s12" id="hospital-form" method="post" action="/hospital/save" enctype="multipart/form-data">
                    <div class="container">
                        <div class="row">
                        <div class="col-lg-3">
                            <div class="card card-body text-center">
                                <div class="card-img-actions d-inline-block mb-3">
                                    <div id="image-preview" @if(isset($hospital)) style="background-image: url({!! \Illuminate\Support\Facades\Storage::disk('images')->url($hospital->logo) !!})" @endif>
                                        <label for="image-upload" id="image-label">Choose Image</label>
                                        <input type="file" id="image-upload" name="logo" accept="image/png, image/gif, image/jpeg" />
                                    </div>


                                </div>
                            </div>
                            <div class="card card-body">
                                <div class="form-group">
                                    <label>Hospital Types:</label>
                                    <select class="form-control" name="hospital_type" id="selectuserrole">
                                        <option>Select</option>
                                        @php
                                            $types = \App\HospitalTypes::all();
                                        @endphp
                                        @if(isset($types) && $types->count() > 0)
                                            @foreach($types as $type)
                                                <option value="{!! $type->id !!}" @if(isset($hospital) && $hospital->hospital_type==$type->id) selected @endif>{!! $type->type_name !!}</option>
                                            @endforeach
                                        @endif

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="furl">Facebook Url:</label>
                                    <input type="text" class="form-control"  value="{!! isset($hospital)?$hospital->facebook_url:'' !!}"  name="facebook_url" id="furl" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="furl">LinkedIn Url:</label>
                                    <input type="text" class="form-control"  value="{!! isset($hospital)?$hospital->linkedin_url:'' !!}"  id="lurl" name="linkedin_url" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="furl">Web Url:</label>
                                    <input type="text" class="form-control"  value="{!! isset($hospital)?$hospital->web_url:'' !!}"  name="web_url" id="web_url" placeholder="">
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <input type="hidden" name="id" id="doctor_id" value="{!! isset($hospital)?$hospital->id:'' !!}" />
                            {{ csrf_field() }}
                            <div class="card mb-3">
                                <div class="card-header bg-light"><h6 class="card-title">Hospital information</h6></div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-sm-12">
                                            <label for="first_name" class="">Hopsital Name</label>
                                            <input id="first_name" name="name"  value="{!! isset($hospital)?$hospital->hospital_name:'' !!}" type="text" class="form-control" required  data-error=".errorTxt1">


                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-sm-12">
                                            <label for="last_name">Hospital Summary</label>
                                            <textarea class="form-control" name="summary" required rows="5">{!!  isset($hospital)?$hospital->summary:'' !!}</textarea>
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
                                            <input id="phone_number" name="phone_number"  value="{!! isset($hospital)?$hospital->phone:'' !!}"   type="text" class="form-control"   data-error=".errorTxt3">

                                        </div>


                                            <div class="form-group col-sm-12">
                                                <label for="email">Email</label>
                                                <input id="email" type="email" class="small-text-formatting email form-control" @if(isset($hospital)) readonly @endif  value="{!! isset($hospital)?$hospital->users->email:'' !!}"   name="email" required   data-error=".errorTxt4">


                                            </div>




                                        <div class="form-group col-sm-12">
                                            <label for="address">Address</label>
                                            <textarea class="form-control" name="address" required> {!! isset($hospital)?$hospital->address:'' !!}  </textarea>


                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="card green success-message bg-green" style="display: none;">
                                            <div class="card-content white-text">
                                                <p></p>
                                            </div>
                                        </div>
                                        <div class="card red error-message bg-red"  style="display: none;">
                                            <div class="card-content white-text">
                                                <p></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <a href="#!" class="btn btn-danger save-hospital"><i class="icon-floppy-disk"></i> Save</a>
                                    @if(isset($hospital))
                                    <a href="#!" class="btn btn-danger add-more-branch"><i class="icon-plus-circle2"></i> Add More Branch</a>
                                        @endif
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
            $('.tokenfield').tokenfield();
            $("body").on("click",".add-more",function () {

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


            });



            $(".save-hospital").click(function(e){
                $(".alert").hide();


                if($("#hospital-form").valid()){

                    $("#hospital-form").ajaxForm(function(response){
                        response = $.parseJSON(response);
                        if(response.type=="success"){
                            $('.success-message').html(response.message);
                            $('.success-message').fadeIn();

                            setTimeout(function(){
                                window.location = "/hospitals";
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