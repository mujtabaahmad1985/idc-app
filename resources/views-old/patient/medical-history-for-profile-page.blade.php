@if(isset($medical_history))
    <table border="0" style="border: none">
        @foreach($medical_history as $k=>$m)
            <tr>
                <td width="5%">#{!! $k+1 !!}</td>
                <td width="35%"><a href="#!" class="medical-history red-text" data-id="{!! $m->id !!}">{!! $m->date_of_history !!}</a> </td>
                <td width="60%">{!! str_replace('_',' ',ucwords($m->illness)) !!}</td>


            </tr>
        @endforeach
        <td colspan="3" class="center"> {{ $medical_history->links() }}</td>


    </table>
@else
    <div class="center red-text">No Medical History Found!</div>


@endif

<script>
    $(function(){


        $("#medical-history-section .pagination a").click(function (e) {

            var url  = $(this).attr('href');


            if(url){
                $(".overlay").show();
                $(".overlay .progress").show();
                $(".overlay .message").hide();
                $.ajax({
                    url:url,
                    success:function(response){
                        console.log(response);
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