<style>
    .activity-table td, .activity-table th{ padding: 2px; font-size: 0.8rem}
    .activity-table tbody .dropdown-content li > a > i{     margin: 0 30px 0 0;}
</style>
<div class="row">
    <div class="col s12">
        <table class="activity-table">
            <thead>
            <tr>
                <th>#</th>
                <th>Activity Title</th>
                <th>Activity Description</th>
                <th>Activity DateTime</th>
            </tr>
            </thead>
            <tbody>
            @if(isset($activities))
                @foreach($activities as $activity)
                    <tr>
                        <td>
                            {!! $activity->id !!}

                        </td>
                        <td>
                            {!! $activity->activity_title !!}
                        </td>
                        <td>
                            {!! $activity->activity_description !!}
                        </td>
                        <td>
                            {!! date('d.m.Y H:i:s', strtotime($activity->created_at)) !!}
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
            <tfoot>
            <tr>
                <td colspan="4" class="center"> {{ $activities->links() }}</td>
            </tr>
            </tfoot>

        </table>
    </div>
</div>

<script>
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
                    $('#activities-information').html(response);
                }
            });
        }

        e.stopPropagation();
        e.preventDefault();
    });
</script>
