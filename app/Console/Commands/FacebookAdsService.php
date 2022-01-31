<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use FacebookAds\Object\AdAccount;
use FacebookAds\Api;
use FacebookAds\Object\AdSet;
use FacebookAds\Object\Fields\AdSetFields;
class FacebookAdsService extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'facebook_sdk:service';
    /**
     *The console command description.
     * @var string
     */
    protected $description = 'Facebook ads api for campaign 
                            service, adset etc';    /**

/**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $app_id = "1917629921677848";
        $app_secret = "6321be9bc8c77ce16fbfd680ffd3cef1";
        $access_token =  "EAAbQEwJK0hgBADM1WRKkUXcjMKbskibWW2yqlj4Sr1I8i9UFurvgtH0y0hhdybI4dXpSNiZCUq7BiVkCpr60XuSrkUaKJZAK0wdECbirVgHwULxPNVCDFKW5HTS49bf9diYGUf4ZBZBzgBRsRugZAdZC9HopGU6Mb3GjURyMfHwVsmkbMU0hfABOMkLOX6mxYZD
";
        Api::init($app_id, $app_secret, $access_token);
        $api = Api::instance();

        $account_id = 'act_116261482';
        $account = new AdAccount($account_id);
        $account->read();

        dd($account);
    }
}
