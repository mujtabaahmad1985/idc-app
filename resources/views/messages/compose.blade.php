
<style>
    .card-header.note-toolbar>.btn-group {
        margin-top: 0.9375rem;
        margin-right: .9375rem;
    }
    .bootstrap-tagsinput {

        border: 0;

        padding: 0.1rem 0 0.35rem 0;

        border-radius: 0
    }
    .bootstrap-tagsinput input {
        padding: .3125rem 0;
        margin-top: .125rem;
        margin-left: 0;
        text-transform: lowercase
    }
    .bootstrap-tagsinput .tag:not([class*=bg-]) {
        background-color: #eee;
        color: #333;
        margin-right: 5px;
        text-transform: lowercase;
    }
    .note-editable *{ text-transform: none}
    .note-toolbar:not([class*=bg-]):not([class*=alpha-]){
        padding: .3375rem 1.25rem;
    }
    .note-editor.note-frame .note-editing-area .note-editable {
        padding: 20px 10px;
    }
</style>
    <!-- Content area -->





    <div class="content">

        <!-- Inner container -->
        <div class="d-md-flex align-items-md-start">



            <!-- Right content -->
                <div class="flex-fill overflow-auto">

                    <!-- Single mail -->
                    <div class="card">

                        <!-- Action toolbar -->
                        <div class="bg-light rounded-top">
                            <div class="navbar navbar-light bg-light navbar-expand-lg py-lg-2 rounded-top">
                                <div class="text-center d-lg-none w-100">
                                    <button type="button" class="navbar-toggler w-100 h-100" data-toggle="collapse" data-target="#inbox-toolbar-toggle-write">
                                        <i class="icon-circle-down2"></i>
                                    </button>
                                </div>

                                <div class="navbar-collapse text-center text-lg-left flex-wrap collapse" id="inbox-toolbar-toggle-write">

                                    <div class="mt-3 mt-lg-0 mr-lg-3">
                                        <button type="button" class="btn bg-blue send-message"><i class="icon-paperplane mr-2"></i> Send mail</button>
                                    </div>


                                    <div class="mt-3 mt-lg-0 mr-lg-3">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-light save-as-draft">
                                                <i class="icon-checkmark3"></i>
                                                <span class="d-none d-lg-inline-block ml-2">Save as Draft</span>
                                            </button>
                                            <button type="button" class="btn btn-light cancel-message">
                                                <i class="icon-cross2"></i>
                                                <span class="d-none d-lg-inline-block ml-2">Cancel</span>
                                            </button>


                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <!-- /action toolbar -->
<form class="" id="mail-form" method="POST" action="/send/message" enctype="multipart/form-data">
    {!! csrf_field() !!}

                        <!-- Mail details -->
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td class="align-top py-0" style="width: 1%">
                                        <div class="py-2 mr-sm-3">To:</div>
                                    </td>
                                    <td class="align-top py-0">
                                        <div class="d-sm-flex flex-sm-wrap">
                                            <input type="text" class="form-control flex-fill w-auto py-2 px-0 border-0 rounded-0" value="{!! isset($person_to_email)?$person_to_email:"" !!}" id="recipients" name="recipients" required placeholder="Add recipients">

                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-top py-0">
                                        <div class="py-2 mr-sm-3">Subject:</div>
                                    </td>
                                    <td class="align-top py-0">
                                        <input type="text" class="form-control py-2 px-0 border-0 rounded-0" value="{!! isset($subject)?$subject:"" !!}" required name="subject" placeholder="Add subject">
                                    </td>
                                </tr>
                               {{-- <tr>
                                    <td colspan="3">
                                        <ul class="list-inline d-sm-flex flex-sm-wrap mb-0">
                                            <li class="list-inline-item"><a href="#"><i class="icon-attachment mr-2"></i> Attach files</a></li>
                                            <li class="list-inline-item"><a href="#"><i class="icon-google-drive mr-2"></i> Google Drive</a></li>
                                            <li class="list-inline-item"><a href="#"><i class="icon-dropbox mr-2"></i> Dropbox</a></li>
                                            <li class="list-inline-item ml-sm-auto"><a href="#"><i class="icon-cloud-upload2 mr-2"></i> Cloud drive</a></li>
                                        </ul>
                                    </td>
                                </tr>--}}
                                </tbody>
                            </table>
                        </div>
                        <!-- /mail details -->


                        <!-- Mail container -->
                        <div class="card-body p-0">
                            <div class="overflow-auto mw-100">



                                    <textarea class="summernotes" name="email_content">{!! isset($email_content)?"<br /><hr />".$email_content:"" !!}</textarea>


                            </div>
                        </div>
                        <!-- /mail container -->
</form>

                        <!-- Attachments -->
                        <div class="card-body border-top">
                            <h6 class="mb-0">Attachments</h6>


                        </div>
                        <!-- /attachments -->
                        <div class="alert bg-success sucess-message" style="margin-bottom: 0"></div>
                        <div class="alert bg-warning warning-message" style="margin-bottom: 0"></div>
                        <div class="alert bg-danger danger-message" style="margin-bottom: 0"></div>
                    </div>
                    <!-- /single mail -->

                </div>
                <!-- /right content -->


        </div>
        <!-- /inner container -->

    </div>


    {!! Html::script(url('/').'/bootstrap/js/plugins/editors/summernote/summernote.min.js') !!}
    {!! Html::script(url('/').'/bootstrap/js/plugins/forms/styling/uniform.min.js') !!}
    {!! Html::script(url('/').'/bootstrap/js/plugins/forms/tags/tagsinput.min.js') !!}
    {!! Html::script(url('/').'/bootstrap/js/plugins/forms/tags/tokenfield.min.js') !!}
    {!! Html::script(url('/').'/bootstrap/js/plugins/forms/inputs/typeahead/typeahead.bundle.min.js') !!}
    {!! Html::script('public/plugins/jquery.validate/js/jquery.validate.min.js') !!}
    {!! Html::script('public/js/jquery.form.js') !!}
    <script>
        $(function(){
            $('.summernotes').summernote({
                height: 400
            });

            $('#recipients').tagsinput({
                maxTags: 10,
                trimValue: true
            });

            $('#recipients').on('beforeItemAdd', function(event) {
                var tag = event.item;
                console.log(event.options);
                // event.item: contains the item
                // event.cancel: set to true to prevent the item getting added
            });

            $(".send-message").click(function(){
                    $(".alert").hide();
                if($("#mail-form").valid()){
                    $("#mail-form").ajaxForm(function(response){
                        response = $.parseJSON(response);

                        if(response.type=="success"){
                            $(".sucess-message").html(response.message);
                            $(".sucess-message").show();

                            setTimeout(function(){
                                $(".sucess-message").hide();
                                location.reload();
                            },3000);
                        }

                        if(response.type=="partial"){
                            $(".warning-message").html(response.message);
                            $(".warning-message").show();

                            setTimeout(function(){
                                $(".warning-message").hide();
                                location.reload();
                            },5000);
                        }

                        if(response.type=="error"){
                            $(".danger-message").html(response.message);
                            $(".danger-message").show();


                        }

                    }).submit();
                }


            });


        })
    </script>
