
<div class="row">
    <div class="col s12">

        <div class="row">
            <div class="col s12">
                <form id="description-form{!! $session_id !!}" action="/save/session/description" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <input type="hidden" name="session_id" id="session_id" value="{!! $session_id !!}" />
                    <textarea id="description{!! $session_id !!}" name="description" required></textarea>
                </form>
            </div>

        </div>
        <div class="row m-top-10">
            <div class="col s12 center">
                <a href="#!" class="btn red white-text save-description">Save</a>  <a href="#!" id="show-new-area-name" class="btn red white-text new-description-cancel">Cancel</a>   <br />
                <span class="response-description"></span>
            </div>
        </div>



    </div>

</div>

<script>
    var patient_id = $("input[name=patient_id]").val();
    var description = new nicEditor({fullPanel : true}).panelInstance('description{!! $session_id !!}',{hasPanel : true});


    $(".save-description").click(function(){
           var text = nicEditors.findEditor('description{!! $session_id !!}').getContent();
           var ths = $(this);
         $("#description{!! $session_id !!}").val(text);
        $("#description-form{!! $session_id !!}").ajaxForm(function(response){
            response = $.parseJSON(response);

            if(response.type=="success") {

                $(".response-description").addClass('green-text');
                $(".response-description").html(response.message);
                $(".response-description").show();

                setTimeout(function(){
                    ths.parents('.collapsible').find('.add-area-section').after('  <p style="margin: 0"><strong>Description</strong></p><hr /><p>'+text+'</p>');
                    ths.parents('.add-description-section').html('');
                },2500);

            }else{
                $(".response-description").addClass('red-text');
                $(".response-description").html(response.message);
                $(".response-description").show();
            }
        }).submit();
    });
</script>

