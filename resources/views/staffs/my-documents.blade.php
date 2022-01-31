@extends('layout.app')
@section('page-title') Staff Management | My Documents @endsection
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
        label.error{ color: #F00;
            top:20px;}

        #read-document > iframe{ height: 100vh !important; width: 100% !important;}

    </style>
    <section id="content">

    @include('partials.breadcrumb')

    <!--start container-->
        <div class="container">
            <div class="row">
                <h4 class="header col s6">{!! $documents !!}'s Documents</h4>
                <div class="col s6 right-align" style="margin-top:20px">
                    <a href="#!" class="waves-effect waves-light  btn red m-10 add-new-documents"><i class="material-icons">file_upload</i> Add new document</a>
                </div>
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
                                <th width="25px"></th>
                                <th width="40%">Document Title</th>
                                <th  width="15%"> Size </th>
                                <th width="20%">Uploaded at </th>
                                <th width="10%">Actions</th>

                            </tr>
                            </thead>
                            @php
                            $array['xlx'] = array('file_type'=>"fa-file-excel-o green-text",'name'=>'Excel');
                            $array['xlxs'] = array('file_type'=>"fa-file-excel-o green-text",'name'=>'Excel');
                            $array['jpg'] = array('file_type'=>"fa-file-image-o orange-text",'name'=>'Image');
                            $array['jpeg'] = array('file_type'=>"fa-file-image-o orange-text",'name'=>'Image');
                            $array['png'] = array('file_type'=>"fa-file-image-o orange-text",'name'=>'Image');
                            $array['gif'] = array('file_type'=>"fa-file-image-o orange-text",'name'=>'Image');
                            $array['mp4'] = array('file_type'=>"fa fa-file-movie-o brown-text  darken-4",'name'=>'Video');;
                            $array['mov'] = array('file_type'=>"fa fa-file-movie-o brown-text  darken-4",'name'=>'Video');;
                            $array['mwv'] = array('file_type'=>"fa fa-file-movie-o brown-text  darken-4",'name'=>'Video');;
                            $array['doc'] = array('file_type'=>"fa fa-file-word-o blue-text",'name'=>'Word');
                            $array['docx'] = array('file_type'=>"fa fa-file-word-o blue-text",'name'=>'Word');
                            $array['pdf'] = array('file_type'=>"fa fa-file-pdf-o red-red",'name'=>'PDF');

                            @endphp
                            <tbody>
                            @if(isset($documents_list))
                                @foreach($documents_list as $d)
                                    @php
                                            $name = explode('.',$d->document);
                                    $extension = strtolower($name[1]);



                                    @endphp
                                    <tr>
                                        <td><p>
                                                <input type="checkbox" class="selected_patient filled-in"
                                                       value="{!! $d->id !!}"
                                                       id="staff{!! $d->staff_id !!}"/>
                                                <label for="staff{!! $d->staff_id !!}"></label>
                                            </p></td>
                                        <td>

                                                <i class="fa {!! $array[$extension]['file_type'] !!}" style="font-size: 20px"></i>


                                        </td>
                                        <td><a href="#!" class="blue-text">{!! $d->document_title !!}</a> </td>
                                        <td>{{ File::size(public_path('uploads/documents/'.$d->document)) }} kb</td>
                                        <td>{!! date('d.M.Y H:i:s') !!}</td>
                                        <td class="actions">

                                            <div class="btn-group">

                                                <ul id='dropdown{!! $d->id !!}' class='dropdown-content'>
                                                    <li><a href="#!" class="view" data-view-type="{!! $array[$extension]['name'] !!}" data-file-name="{!! url('/').'/uploads/documents/'.$d->document !!}"><i class="material-icons">view</i> View</a> </li>
                                                    <li>
                                                        <a href="{!! url('/').'/uploads/documents/'.$d->document !!}" download="{!! url('/').'/uploads/documents/'.$d->document !!}"><i class="material-icons">file_download</i> Download</a> </li>
                                                    <li><a href="#!"><i class="material-icons">share</i> Share</a> </li>
                                                    <li><a href="#!"><i class="material-icons">delete</i> Delete</a> </li>
                                                </ul>
                                            </div>


                                            <a class=" dropdown-button waves-effect waves-light" href="#!" data-activates="dropdown{!! $d->id !!}"><i class="material-icons">more_vert</i></a>


                                        </td>
                                    </tr>
                                    @endforeach
                                @endif
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

    <div id="add-new-document" class="modal z-depth-1" style="width: 40% !important; min-height: 130px !important;">
        <div class="modal-content">
            <div class="row">

                <h4 class="left">Add New Document to {!! $documents !!}</h4>
                <div class="col s1 right-align no-padding right">
                    <a href="#!" class="modal-action modal-close close-media"><i class="material-icons">close</i></a>
                </div>
            </div>
            <form id="document-form" action="/uploads/document" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <input type="hidden" name="folder_id" value="{!! $id !!}" />

            <div class="row">
                <div class="col s12">

                    <div class="input-field">
                        <input type="text" name="document_title" required />
                        <label>Document Title</label>
                    </div>

                    <div class="input-field">
                        <input type="file" name="document_file" required />

                    </div>

                    <a href="#!" class="upload-new-document red right white-text" style="padding: 5px 20px"><i class="material-icons" style="position: relative; top: 5px;  margin-right: 8px; line-height: 15px;">upload_file</i> Upload Document</a>
                    <div style="clear:both"></div>
                    <div class="row m-top-10">
                        <div class="col s12">
                            <div class="card green message success-message" style="display: none;">
                                <div class="card-content white-text">
                                    <p></p>
                                </div>
                            </div>
                            <div class="card red message error-message"  style="display: none;">
                                <div class="card-content white-text">
                                    <p></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>

    <div id="view-document" class="modal z-depth-1" style="width: 60% !important; min-height: 330px !important; overflow: hidden">
        <div class="modal-content" style="padding: 0">
            <div class="row">


                <div class="col s1 right-align no-padding right">
                    <a href="#!" class="modal-action modal-close close-media"><i class="material-icons">close</i></a>
                </div>
            </div>
            <div class="row">
                <div class="col s12" id="read-document">


                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
    {!! Html::script('public/js/jquery.form.js') !!}

    {!! Html::script('public/plugins/jquery.validate/js/jquery.validate.min.js') !!}
<script>
    $(function(){

        $(".view").click(function () {
            var document = $(this).attr('data-file-name');
            var type = $(this).attr('data-view-type');

            switch (type){
                case "PDF":
                    var str = '<object data="'+document+'" type="application/pdf" style="width: 100%; height: 60vh" >'+
                        '<a href="'+document+'">'+document+'</a>'+
                    '</object>';
                    $("#read-document").html(str);
                    $("#view-document").modal('open')
                    break;
                case "Word":
                        var str = '<iframe style="width:100%; height: 100vh" src="http://docs.google.com/gview?url='+document+'&embedded=true"></iframe>';
                        $("#read-document").html(str);
                    $("#view-document").modal('open');

                    break;

            }

        });

        $(".add-new-documents").click(function(){
            $(".message").hide();
            $("#document-form").resetForm();
            $("#add-new-document").modal('open');
        });

        $(".upload-new-document").click(function(e){
            if($("#document-form").valid()){

                $(".overlay").show();
                $(".overlay .progress").show();
                $(".overlay .message").hide();

                $("#document-form").ajaxForm(function(response){
                   response = $.parseJSON(response);
                   if(response.id > 0){
                       $(".success-message p").html('Document is uploaded successfully');
                        $(".success-message").show();
                       $(".overlay .progress").hide();
                       $(".overlay .message").show();

                       setTimeout(function(){
                           $("#add-new-document").modal('close');
                           $(".overlay").hide();
                           location.reload();
                       },2000);
                   }
                }).submit();
            }
            e.preventDefault();

        });
    })
</script>

    {{--{!! Html::script('public/demo/demo-form-layouts.js') !!}--}}
@endsection