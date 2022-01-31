<style>
    #frm-change-password label.error{
        position: absolute;
        top: 20px;
        color: #F00;
    }
    #frm-change-password label.error.active{
        position: absolute;
        top: 45px;
        color: #F00;
    }
    #frm-change-password input{text-transform: none !important;}
</style>
<form id="frm-change-password" action="/save/new/password" method="post" enctype="multipart/form-data">
    {!! csrf_field() !!}
<div class="row">
    <div class="col s12 input-field">
        <input type="password" id="old_password" name="old_password" required placeholder="Enter old password" />

    </div>
</div>

<div class="row">
    <div class="col s12 input-field">
        <input type="password" id="new_password" name="new_password" required placeholder="Enter new password" />

    </div>
</div>

<div class="row">
    <div class="col s12 input-field">
        <input type="password" id="confirm_password" name="confirm_password" required placeholder="Enter confirm password" />

    </div>
</div></form>

<div class="row">
    <div class="col s12 input-field center-align">
        <a href="#!" class="btn btn-sm btn-change-password red">Change Password</a>

    </div>
</div>
<div class="row">
    <div class="card green message success-message" style="display: none;">
        <div class="card-content white-text">
            <p class="center-align"></p>
        </div>
    </div>
    <div class="card red message error-message" style="display: none;">
        <div class="card-content white-text">
            <p class="center-align"></p>
        </div>
    </div>

</div>
{!! Html::script('public/js/jquery.form.js') !!}
{!! Html::script('public/plugins/jquery.validate/js/jquery.validate.min.js') !!}
<script>
    $(function(){
        $( "#frm-change-password" ).validate({
            rules: {
                new_password: "required",
                confirm_password: {
                    equalTo: "#new_password"
                }
            }
        });
        $(".btn-change-password").click(function(){
            $(".message").hide();
            if($("#frm-change-password").valid()){
                $("#frm-change-password").ajaxForm(function (response) {
                    response = $.parseJSON(response);

                    if(response.type=='success'){

                        $(".success-message p").html(response.message);
                        $(".success-message").show();

                        setTimeout(function () {
                            $("#change-password").modal('close');
                        },2000);
                    }else{
                        $(".error-message p").html(response.message);
                        $(".error-message").show();
                    }




                }).submit()
            }
        });
    })
</script>