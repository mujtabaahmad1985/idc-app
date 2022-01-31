<?php

namespace App\Console\Commands;

use App\Helpers\CommonMethods;
use App\SendEmail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;

class AppointmentReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:appointment-reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Reminder to patients for reminder  of appointments';

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

       SendEmail::sendBookAppointmentEmail('Mujtaba','mujtabaahmad1985@gmail.com','5');
    }
}
