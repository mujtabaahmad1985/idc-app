<?php

namespace App\Listeners;

use Carbon\Carbon;
use DeviceDetector\DeviceDetector;
use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Activities;
use App\LoginActivities;
use Illuminate\Support\Facades\Log;

class LogSuccessfulLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        //

       /* $activity = new Activities();

        $activity->user_id = $event->user->id;
        $activity->activity_type = $event->user->role;
        $activity->activity_title = "User logged";
        $activity->activity_description =  $event->user->email." logged at ".date('Y-m-d H:i:s').' using IP: '.\Illuminate\Support\Facades\Request::ip();
        $activity->created_at = Carbon::now();
            $activity->save();*/
        $userAgent = $_SERVER['HTTP_USER_AGENT']; // change this to the useragent you want to parse

        $dd = new DeviceDetector($userAgent);
        $dd->parse();

        $os = $dd->getOs();
        $device = $dd->getDeviceName();
        $model = $dd->getModel();
        $brand = $dd->getBrandName();
        $client = $dd->getClient();
        $browser = $client['name'].' '.$client['version'];
        $plate_from = $os['name'].' '.$os['version'].' '.$os['platform'];
       $old_activity = LoginActivities::where('user_id',$event->user->id)->where('device',$device)->whereNotNull('token')->where('plateform',$plate_from)->first();
       if(!empty($old_activity)){
           $old_activity->token = null;
           $old_activity->save();
       }
       $activity = new LoginActivities();
       $activity->user_id = $event->user->id;
       $activity->token = bcrypt(time());
       $activity->user_agent = $_SERVER['HTTP_USER_AGENT'];
       $activity->device = $device;
       $activity->login_ip = \Illuminate\Support\Facades\Request::ip();
       $activity->model = $model;
        $activity->plateform = $plate_from;
        $activity->browser = $browser;
       $activity->save();
    }
}
