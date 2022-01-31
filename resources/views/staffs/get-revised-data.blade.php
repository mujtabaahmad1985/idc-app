

<table>
    <thead>
    <tr>
        <th width="70%">
            Revision Name
        </th>

        <th width="30%">
            Revision Date
        </th>
    </tr>
    </thead>
    <tbody>
    @if($revised)
    @foreach($revised as $r)
        <tr>
            <td><a href="#!" class="get-revised-data" data-id="{!! $r->id !!}">{!! $r->first_name !!}-{!! date('Ymdhis', strtotime($r->created_at)) !!} </a></td>

            <td>{!! date('d.m.Y H:i:s', strtotime($r->created_at)) !!}</td>
        </tr>
    @endforeach
        @endif
    </tbody>
</table>



<script>
    $(function () {
        $(".get-revised-data").click(function(){
            var id = $(this).attr('data-id');
            $("#get-revised-data-by-id").modal('open');
            $.ajax({
                url:"/get/revised-data-by-id/"+id,
                success:function (response) {
                    $("#show-revised-data").html(response);
                }
            });

        });
    })
</script>