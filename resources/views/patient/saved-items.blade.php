@if(isset($saved_items))
    <table border="0" style="border: none">
        @foreach($saved_items as $k=>$m)
            <tr>
                <td width="5%">#{!! $k+1 !!}</td>
                <td width="55%"><a href="#!" class="save-items-data red-text trucate" data-id="{!! $m->id !!}">{!! substr(strip_tags($m->notes),0,50) !!}</a>  </td>
                <td width="30%"><a style="text-transform: none !important;" href="/uploads/saved-item/{!! $m->file_name !!}" download="{!! $m->file_name !!}">{!! $m->file_name !!}</a> </td>
                <td width="10%"><a href="#!" class="edit-item red-text" data-id="{!! $m->id !!}"><i class="material-icons" style="font-size: 14px">create</i> </a> {{-- <a href="#!" class="delete-item red-text" data-id="{!! $m->id !!}"><i class="material-icons" style="font-size: 14px">delete</i> </a>--}} </td>


            </tr>
        @endforeach
        <td colspan="3" class="center"> {{ $saved_items->links() }}</td>


    </table>
@else
    <div class="center red-text">No Item Found!</div>


@endif

<script>
    $(function(){


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
                        $('#saved-items-section').html(response);
                    }
                });
            }

            e.stopPropagation();
            e.preventDefault();
        });

        $(".save-items-data").click(function(){
            var id = $(this).attr('data-id');
            $.ajax({
                url:"/show/saved-item-data/"+id,
                success:function(response){
                   $("#show-saved-items-data").html(response);
                }
            });
            $("#show-saved-items-").modal('open');
        });


        $(".edit-item").click(function(){
            var id = $(this).attr('data-id');
            $("#item_id").val(id);

            $.ajax({
                url:'/edit/saved-items/'+id,
                success:function(response){
                    response = $.parseJSON(response);
                    $("#notes").val(response.notes);
                    $("#add-saved-items").modal('open');
                }
            });
        });

    })

</script>