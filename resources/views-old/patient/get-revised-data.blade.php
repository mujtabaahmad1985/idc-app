<div class="row">
    <div class="col-sm-4">
        @if($revised)

        <table class="table table-striped">
            <tbody>
            @foreach($revised as $r)
                <tr>
                    <td>Update at <strong>{!! date('d.m.Y H:i:s', strtotime($r->created_at)) !!}</strong></td>
                    <td><a href="#!" class="get-revised-data" data-id="{!! $r->id !!}"><i class="icon-eye2"></i></a>  </td>
                </tr>@endforeach
            </tbody>
        </table>

        @else
            <div class="red-text center">No Record Found!</div>
        @endif
    </div>
</div>








<script>
    $(function () {

        $(".get-revised-data").click(function(){
            var ths = $(this);
            var id = $(this).attr('data-id');
           $("#get-revised-data-by-id").modal();
            $.ajax({
                url:"/get/patient/revised-data-by-id/"+id,
                success:function (response) {
                    $("#get-revised-data-by-id .modal-body").html(response);
                }
            });

        });
    })
</script>