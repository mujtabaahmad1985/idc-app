
<div class="row">
    <div class="col s10">
        <div class="row" id="new-area" style="display: none">
            <div class="col s10">
                <input type="text" name="area-name" id="area-name" autocomplete="off" placeholder="Enter Area Name" />
            </div>
            <div class="col s2"><a href="#!" class="btn red white-text save-new-area">Save</a> </div>
        </div>
        <div class="row">
            <div class="col s12">
                <form id="area-form{!! $session_id !!}" action="/save/session/areas" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <input type="hidden" name="session_id" id="session_id" value="{!! $session_id !!}" />
                <select id="area-select{!! $session_id !!}" name="areas[]" multiple required>
                    <option value=""></option>
                    @if(isset($areas))
                        @foreach($areas as $area)
                            <option value="{!! $area->id !!}">{!! $area->name !!}</option>
                            @endforeach
                        @endif
                </select>
                </form>
            </div>

        </div>
        <div class="row m-top-10">
            <div class="col s12 center">
                <a href="#!" class="btn red white-text save-area">Save</a>  <a href="#!" id="show-new-area-name" class="btn red white-text new-area-cancel">Cancel</a>  <a href="#!" id="show-new-area-name" class="btn red white-text show-new-area-name">Add New</a> <br />
                <span class="response-area"></span>
            </div>
        </div>



    </div>

</div>

<script>
    var patient_id = $("input[name=patient_id]").val();
    $(".show-new-area-name").click(function(){
       $("#add-new-area").modal('open');
    });

    $(".new-area-cancel").click(function(){
        $(this).parents('.add-area-section').html('');
    });



    $("#area-form{!! $session_id !!}").validate({
        ignore: [],
        rules: {
            //Rules
        },
        messages: {
            //messages
        }
    });

    var id= $(this).attr('data-session-id');


    $(".save-area").click(function(){
        $(".response-area").removeClass('green-text');
        $(".response-area").removeClass('red-text');
        if($("#area-form{!! $session_id !!}").valid()){

            $("#area-form{!! $session_id !!}").ajaxForm(function(response){
                response = $.parseJSON(response);

                if(response.type=="success") {

                    $(".response-area").addClass('green-text');
                    $(".response-area").html(response.message);
                    $(".response-area").show();

                    setTimeout(function(){
                        $('#session-record').html('<div class="progress"> <div class="indeterminate"></div></div>');
                        $.ajax({
                            url:'/get/sessions/'+patient_id,
                            success:function (response) {
                                $(".overlay .progress").hide();
                                $(".overlay").hide();
                                $('#session-record').html(response);
                            }
                        });
                    },2500);

                }else{
                    $(".response-area").addClass('red-text');
                    $(".response-area").html(response.message);
                    $(".response-area").show();
                }
            }).submit();
        }
    });

</script>