@if(isset($login_activities) && $login_activities->count() > 0)
    @foreach($login_activities as $activity)
<tr>

    <td>{!! date('d.M.Y H:i:s',strtotime($activity->created_at)) !!}</td>
    <td>{!! $activity->login_ip !!}</td>
    <td>{!! $activity->device !!}</td>
    <td>{!! $activity->plateform !!}</td>
    <td>{!! $activity->browser !!}</td>

</tr>
@endforeach
    @else
    <tr>
        <td colspan="5">
            <div class="alert bg-danger text-white text-center" style="display: block">

                <span class="font-weight-semibold">No Login Activiy found!</span>.
            </div>
        </td>
    </tr>
@endif