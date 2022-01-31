@if(isset($medical_history))
    <table border="0" style="border: none">
        @foreach($medical_history as $k=>$m)
            <tr>
                <td width="5%">#{!! $k+1 !!}</td>
                <td width="30%"><a href="#!" class="medical-history red-text" data-id="{!! $m->id !!}">{!! $m->date_of_history !!}</a> </td>
                <td width="55%">{!! str_replace('_',' ',ucwords($m->illness)) !!}</td>
                <td width="10%"><a href="#!" class="edit-medical red-text" data-id="{!! $m->id !!}"><i class="material-icons" style="font-size: 14px">create</i> </a>  {{--<a href="#!" class="delete-medical red-text" data-id="{!! $m->id !!}"><i class="material-icons" style="font-size: 14px">delete</i> </a>--}} </td>



            </tr>
        @endforeach
        <td colspan="3" class="center"> {{ $medical_history->links() }}</td>


    </table>
    @else
    <div class="center red-text">No Medical History Found!</div>


@endif

<script>
    $(function(){

        $(".delete-medical").click(function(){

            var id = $(this).attr('data-id');
            $.ajax({
                url:'/delete/medical-history/'+id,
                success:function(response){

                }
            });
        });

        $(".edit-medical").click(function(){
            var id = $(this).attr('data-id');

            $.ajax({
                url:'/show/medical-history/'+id,
                success:function(response){
                    response = $.parseJSON(response);

                    $("#medical_id").val(id);
                    $("#medical_history").val(response.text);
                    var illness_db  = response.illness_db.split(', ');

                    $("#medical-history-form input[type=checkbox]").each(function(){
                        var value = $(this).val();

                        if($.inArray(value,illness_db) !== -1){
                            $(this).prop('checked','checked');
                        }else{
                            $(this).prop('checked',false);
                        }
                    });


                    $("#add-medical-history").modal('open');
                }
            });
        });


    $(".pagination a").click(function (e) {

        var url  = $(this).attr('href');

        if(url){
            $(".overlay").show();
            $(".overlay .progress").show();
            $(".overlay .message").hide();
            $.ajax({
                url:url,
                success:function(response){
                    $(".overlay .progress").hide();
                    $(".overlay").hide();
                    $('#medical-history-section').html(response);
                }
            });
        }

        e.stopPropagation();
        e.preventDefault();
    });

    $(".medical-history").click(function(){
        var id = $(this).attr('data-id');
        $.ajax({
            url:"/show/medical-history/"+id,
            success:function(response){
                response = $.parseJSON(response);
                $("#response-medical-history").html(response.text);
                $("#illness").html(response.illness);
            }
        });
        $("#show-medical-history").modal('open');
    });
    })

</script>