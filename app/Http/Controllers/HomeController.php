<?php

namespace App\Http\Controllers;

use App\Activities;
use App\Appointments;
use App\Colors;
use App\DoctorServices;
use App\Documents;
use App\Helpers\CommonMethods;
use App\Hospitals;
use App\Locations;
use App\MedicalConditions;
use App\PatientFlags;
use App\Patients;
use App\Products;
use App\Rooms;
use App\Doctors;
use App\Countries;
use App\SaleItems;
use App\Sales;
use App\SendEmail;
use App\SessionItems;
use App\Staffs;
use App\TreatmentProducts;
use App\Treatments;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;
use App\Medicals;
use App\Addresses;
use App\Availabilities;
use Illuminate\Support\Facades\Auth;
use Mail;
use Hash;
use App\User;
use Twilio\Rest\Client;
use Dotenv;
use DB;
use  PDF;
use Storage;
use FacebookAds\Api;
use FacebookAds\Object\AdAccount;
use FacebookAds\Object\Fields\AdAccountFields;
use Google_Client;
use Google_Service_PeopleService;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function blank_page(){
        return view('blank');
    }

    public function all_tables_update_sepecific_cloumn(){


        $sales = Sales::whereNull('deleted_at')->get();
        foreach($sales as $sale){
            $i = (rand(100,102));
            dump($i);
            $sale->hospital_id = $i;
            $sale->save();
        }
        exit;

        $appointments = Appointments::whereNull('deleted_at')->get();

        foreach($appointments as $appointment){
            $i = (rand(100,102));
            dump($i);
            $appointment->hospital_id = $i;
            $appointment->save();
        }

exit;
        $patients = Patients::whereNull('deleted_at')->get();
        foreach($patients as $patient){
            $i = (rand(100,102));
            dump($i);
            $patient->hospital_id = $i;
            $patient->save();
       }

        exit;

        $tables = DB::select('SHOW TABLES');
        $exclude_tables = ['api_tokens','expense_types','hospital_meta_def','hospital_types','hospitals','mobile_codes'];
        foreach($tables as $table)
        {
           // dump($table->Tables_in_idc_new);
            $i = rand(100,102);
            //if($table)
            if(!in_array($table->Tables_in_idc_new,$exclude_tables)){
                $sql = "Update ".$table->Tables_in_idc_new.' set hospital_id = '.$i;
                dump($sql);
                DB::statement($sql);
            }

            //echo $table->hospital_id;
        }
    }

    public function update_patients_all_mass(){

    }

    function getClient()
    {
        define('STDIN',fopen("php://stdin","r"));
        $client = new Google_Client();
        $client->setApplicationName('People API PHP Quickstart');
        $client->setScopes(Google_Service_PeopleService::CONTACTS_READONLY);
        $client->setAuthConfig(base_path('credentials.json'));
        $client->setAccessType('offline');
        $client->setPrompt('select_account consent');

        // Load previously authorized token from a file, if it exists.
        // The file token.json stores the user's access and refresh tokens, and is
        // created automatically when the authorization flow completes for the first
        // time.
        $tokenPath = 'token.json';
        if (file_exists($tokenPath)) {
            $accessToken = json_decode(file_get_contents($tokenPath), true);
            $client->setAccessToken($accessToken);
        }

        // If there is no previous token or it's expired.
        if ($client->isAccessTokenExpired()) {
            // Refresh the token if possible, else fetch a new one.
            if ($client->getRefreshToken()) {
                $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
            } else {
                // Request authorization from the user.
                $authUrl = $client->createAuthUrl();
                printf("Open the following link in your browser:\n%s\n", $authUrl);
                print 'Enter verification code: ';
                $authCode = trim(fgets(STDIN));
                $authCode = $_GET['code'];

                // Exchange authorization code for an access token.
                $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
                $client->setAccessToken($accessToken);

                // Check to see if there was an error.
                if (array_key_exists('error', $accessToken)) {
                    throw new Exception(join(', ', $accessToken));
                }
            }
            // Save the token to a file.
            if (!file_exists(dirname($tokenPath))) {
                mkdir(dirname($tokenPath), 0700, true);
            }
            file_put_contents($tokenPath, json_encode($client->getAccessToken()));
        }
        return $client;
    }


    public function importGoogleContact()
    {
        $client = $this->getClient();
        $service = new Google_Service_PeopleService($client);

// Print the names for up to 10 connections.
        $optParams = array(
            'pageSize' => 100,
            'personFields' => 'names,emailAddresses,phoneNumbers',
        );
        $results = $service->people_connections->listPeopleConnections('people/me', $optParams);

        if (count($results->getConnections()) == 0) {
            print "No connections found.\n";
        } else {
            print "People:\n";
            foreach ($results->getConnections() as $person) {
                if (count($person->getNames()) == 0) {
                    print "No names found for this connection\n";
                } else {
                    $names = $person->getNames();
                    $name = $names[0];
                    dump(isset( $person->getPhoneNumbers()[0])? $person->getPhoneNumbers()[0]->getValue():"");
                }
            }
        }

        exit;
        // get data from request
        $code = request()->get('code');



        // get google service
        $googleService = \OAuth::consumer('Google');


        // check if code is valid

        // if code is provided get user data and sign in
        if ( ! is_null($code)) {
            // This was a callback request from google, get the token

            $token = $googleService->requestAccessToken($code);
            dd($token);

            // Send a request with it
            $result = json_decode($googleService->request('https://www.google.com/m8/feeds/contacts/default/full?alt=json&amp;max-results=400'), true);

            // Going through the array to clear it and create a new clean array with only the email addresses
            $emails = []; // initialize the new array
            foreach ($result['feed']['entry'] as $contact) {
                if (isset($contact['gd$email'])) { // Sometimes, a contact doesn't have email address
                    $emails[] = $contact['gd$email'][0]['address'];
                }
            }
            dd($emails);

            return $emails;

        }

        // if not ask for permission first
        else {
            // get googleService authorization
            $url = $googleService->getAuthorizationUri();

            // return to google login url
            return redirect((string)$url);
        }
    }
    public function facebook(){
//https://github.com/facebook/facebook-php-business-sdk
        $app_id = "1917629921677848";
        $app_secret = "6321be9bc8c77ce16fbfd680ffd3cef1";
        $access_token =  "EAAbQEwJK0hgBADM1WRKkUXcjMKbskibWW2yqlj4Sr1I8i9UFurvgtH0y0hhdybI4dXpSNiZCUq7BiVkCpr60XuSrkUaKJZAK0wdECbirVgHwULxPNVCDFKW5HTS49bf9diYGUf4ZBZBzgBRsRugZAdZC9HopGU6Mb3GjURyMfHwVsmkbMU0hfABOMkLOX6mxYZD
";
// Initialize a new Session and instantiate an Api object
        Api::init($app_id, $app_secret, $access_token);

// The Api object is now available through singleton
        $api = Api::instance();


       // $account = new AdAccount();
       // $account->name = 'My New Account';
       // echo $account->name;

        $account_id = "act_116261482";

        $fields = array(
            AdAccountFields::ID,
            AdAccountFields::NAME,
        );

        $account = (new AdAccount($account_id))->getSelf($fields);
        dd($account);
    }
    public function download_pdf(){

        $patient = Patients::find(37);
        $pdf = PDF::loadView('pdf.appointment-detail-pdf',['patient'=>$patient]);
        $file_name="appointment.pdf";
        $path = public_path('/uploads/qrcode/');
        $pdf->save($path . '/' . $file_name);
        //SendEmail::sendBookAppointmentEmail('mujtaba','mujtabaahmad1985@hotmail.com',37);
       // Storage::put('\uploads\qrcode\appointment.pdf', $pdf->output());
       return $pdf->download($file_name);
    }

    public function whatsapp(){

        $dotenv = new Dotenv\Dotenv(base_path());
       $dotenv->load();

// Your Account Sid and Auth Token from twilio.com/console
        $sid    = getenv("TWILIO_ACCOUNT_SID");
        $token  = getenv("TWILIO_AUTH_TOKEN");
     //   echo $sid.' '.$token;exit;
        $twilio = new Client($sid, $token);

        $codes = ["chocolate", "vanilla", "strawberry", "mint-chocolate-chip", "cookies-n-cream"];

        $message = $twilio->messages
            ->create("whatsapp:".env("MY_WHATSAPP_NUMBER"),
                [
                    "body" => "Your ice-cream code is ".$codes[rand(0,4)],
                    "from" => "whatsapp:".env("TWILIO_WHATSAPP_NUMBER")
                ]
            );

        print($message->sid);

    }
    public function calendar(Request $request)
    {

        $data = $request->session()->all();


        $searched_doctor_id = $request->session()->get('search_doctor_id');
        $searched_doctor_id = isset($searched_doctor_id[0])?$searched_doctor_id[0]:"";

        $searched_location_id = $request->session()->get('search_location_id');
        $searched_location_id = isset($searched_location_id[0])?$searched_location_id[0]:"";

        $searched_service_id = $request->session()->get('search_service_id');
        $searched_service_id = isset($searched_service_id[0])?$searched_service_id[0]:"";
      //  echo $searched_doctor_id; exit;

        $services       = DoctorServices::whereNull('deleted_at')->where('hospital_id',CommonMethods::getHopsitalID())->get();
        $locations      = Locations::whereNull('deleted_at')->where('hospital_id',CommonMethods::getHopsitalID())->get();
        $rooms          = Rooms::whereNull('deleted_at')->where('hospital_id',CommonMethods::getHopsitalID())->get();
        if(Auth::User()->role=='doctor')
            $doctors = Doctors::with('users')->whereNull('deleted_at')->where('doctor_id',Auth::id())->where('hospital_id',CommonMethods::getHopsitalID())->get();
        else
            $doctors        = Doctors::with('users')
                ->whereNull('deleted_at')->where('hospital_id',CommonMethods::getHopsitalID())->get();

        $patient = Patients::orderBy('created_at', 'desc')->where('hospital_id',CommonMethods::getHopsitalID())->first();
        $uniqueId = isset($patient->id)?25082000+$patient->id+1:25082000;

        $countries = Countries::get();
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        $ch = curl_init();


        // set url
        curl_setopt($ch, CURLOPT_URL, "http://ip-api.com/json/".$ipaddress);

        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
        $output = curl_exec($ch);

        // close curl resource to free up system resources
        curl_close($ch);
        $data = json_decode($output);

        //  $details    = json_decode( $data );

        $current_country = !empty($data) && $data->status=="success"? $data->country:"";
        // dd( $current_country );

        return view('calendar',['searched_service_id'=>$searched_service_id,'searched_location_id'=>$searched_location_id,'searched_doctor_id'=>$searched_doctor_id,'unique_id'=>$uniqueId,'doctors'=>$doctors,'services'=>$services,'rooms'=>$rooms,'locations'=>$locations,'countries'=>$countries,'current_country'=>$current_country,'page'=>'calendar']);
    }

    public function dashboard(){

       // echo bcrypt('development2018##');exit;










        if(Auth::user()->role=='administrator'){
            $hospitals = Hospitals::whereNull('deleted_at')->where('status',1)->get();
            //dd($hospitals);

            return view('dashboards.admin-dashboard',['hospitals'=>$hospitals]);
        }

        if(Auth::user()->role=='hospital-administrator' || Auth::user()->role=='staff' || Auth::user()->role=='receptionist' || Auth::user()->role=='subadmin'){
            $hospital_id = 0;
            if(Auth::user()->role=='hospital-administrator')
                $hospital_id = Auth::id();
            else
                $hospital_id = Auth::user()->hospital_id;
            //dd($hospital_id);

           // $hospital_id = 99;
            $low_products = Products::whereNull('deleted_at')->whereRaw('in_stock <= quantity_signal')->where('hospital_id',$hospital_id)->orderBy('product_title')->get();
            $patient = Patients::whereNull('deleted_at')->orderBy('created_at','DESC')->where('hospital_id',$hospital_id)->limit(15)->get();

            $items_from_sessions= DB::table('session_items')
                ->select(DB::raw(' count(session_items.product_id) as item_name_count'),'product_title as item_name')
                ->join('products as product','product.id','=','session_items.product_id')

                ->groupBy('item_name')
                ->orderBy('item_name_count','DESC')
                ->where('session_items.hospital_id',$hospital_id)
                ->get()->take(50)->toArray();
            $items_from_sessions  = json_decode(json_encode($items_from_sessions),true);
            $item_sold = SaleItems::select(DB::raw(' count(item_name) as item_name_count'),'item_name')->whereNull('deleted_at')->groupBy('item_name')->orderBy('item_name_count','DESC')->where('hospital_id',$hospital_id)->get()->take(50)->toArray();

            $s = [];
            if(isset($items_from_sessions) && isset($item_sold)){
                $final = array_merge($items_from_sessions,$item_sold);

                foreach($final as $v){
                    if(array_key_exists($v['item_name'],$s)){
                        $s[$v['item_name']] = $v['item_name_count']+ $s[$v['item_name']];
                        // dump();
                    }

                    else
                        $s[$v['item_name']] = $v['item_name_count'];
                }

            }elseif(isset($items_from_sessions) && !isset($item_sold)){
                foreach($items_from_sessions as $v){
                    if(array_key_exists($v['item_name'],$s)){
                        $s[$v['item_name']] = $v['item_name_count']+ $s[$v['item_name']];
                        // dump();
                    }

                    else
                        $s[$v['item_name']] = $v['item_name_count'];
                }
            }else{
                foreach($item_sold as $v){
                    if(array_key_exists($v['item_name'],$s)){
                        $s[$v['item_name']] = $v['item_name_count']+ $s[$v['item_name']];
                        // dump();
                    }

                    else
                        $s[$v['item_name']] = $v['item_name_count'];
                }
            }

            arsort($s);

            return view('dashboard',['patients'=>$patient,'most_drug_usage' => $s,'low_drugs'=>$low_products]);


        }

        if(Auth::user()->role=='doctor'){

            $pending_appointments = Appointments::where('doctor',Auth::User()->doctors->id)->where('appointment_type','appointment')->where('status','pending')->whereNull('deleted_at')->orderBy('booking_date','DESC')->paginate(5);
            $today_appointments = Appointments::where('doctor',Auth::User()->doctors->id)->where('appointment_type','appointment')->where('status','pending')->where('booking_date',date('Y-m-d'))->whereNull('deleted_at')->orderBy('booking_date','DESC')->paginate(5);
            //$today_appointments = Appointments::where('doctor',Auth::User()->doctors->id)->where('appointment_type','appointment')->where('status','pending')->whereNull('deleted_at')->orderBy('booking_date','DESC')->paginate(5);

            //dd($pending_appointments);
            //$total_appointments = $appointment;
        }

        if(Auth::user()->role=='patient'){
            $appointment = Appointments::where('patient',Auth::User()->patients->id)->whereNull('deleted_at')->get();

            $total_appointments = $appointment;
        }



        if(Auth::user()->role=='doctor'){

            return view('dashboards.doctor-dashboard',['pending_appointment'=>$pending_appointments,'today_appointments'=>$today_appointments]);
        }

        if(Auth::user()->role=='patient')
            return view('dashboards.patient-dashboard',['appointment'=>$appointment,'total_appointments'=>$total_appointments->count()]);
    }

    public function calculate(Request $request){

        $start_time = "";

        $start = date('H:i',strtotime($request->start_time));;



        $end = "23:30";

        /*if(isset($request->doctor_id) && $request->doctor_id > 0){
            $day = strtolower(date('l', strtotime($request->selected_date)));
            $time_slots = Availabilities::where('doctors_id',$request->doctor_id)->where('days',$day)->orderBy('id','desc')->first();
            dd($time_slots);
            $end = $time_slots->end_time;
        }*/



        $tStart = strtotime($start);
        $tEnd = strtotime($end);
        $tNow = $tStart;
        $tNow = strtotime('+5 minutes',$tNow);

        while($tNow <= $tEnd){



            $now = date("H:i",$tNow);

            $tNow = strtotime('+5 minutes',$tNow);

            $time_slotss[] = $now;

        }

        foreach($time_slotss as $slots){
            $start = new DateTime($slots);
            $diff = $start->diff(new DateTime($time_slotss[0]));
            $array[] = array(
                'value' => $slots,
                'text'  => $slots
            );
        }

        echo json_encode($array);




    }

    public function import_patient(){
        return view('setup.import_patients');
    }

    public function upload_csv_color(){
        $handle = base_path("colors.csv");;

        $handle = fopen( $handle, "r");
        $i=1;
        $id = 0;
        $flag = false;

        while (($result = fgetcsv($handle)) !== false) {
         $color_name = $result[1];
         $color_code = $result[2];

         $color = new Colors();
         $color->color_name = $color_name;
         $color->color_code = $color_code;

         $color->save();
        }
    }

    public function upload_products(Request $request){
        $handle = "/products.csv";
        $handle = fopen( $handle, "r");
        $i=1;
        $id = 0;
        $flag = false;

        while (($result = fgetcsv($handle)) !== false) {
echo "<pre>"; print_r($result);
            if ($i > 1) {

            }
        }
    }

    public function get_import(Request $request){
        $file = $request->file('import_csv');
        $handle = $file->getRealPath();
        $handle = fopen( $handle, "r");
        $i=1;
        $id = 0;
        $flag = false;

        while (($result = fgetcsv($handle)) !== false) {

            if($i>1){
                if(!empty($result[1]))
                    $d = explode('.',$result[1]);
                $d = $d[2].'-'.$d[1].'-'.$d[0];
                $date =  date('Y-m-d',strtotime(str_replace('.','-',$d)));

                $p_name = explode(' ',$result[3]);

                $first_name = "";
                $last_name = "";

                if(count($p_name)==2){
                    $first_name = $p_name[0];
                    $last_name = $p_name[1];
                }

                if(count($p_name)==3){
                    $first_name = $p_name[0].' '.$p_name[1];
                    $last_name = $p_name[2];
                }
                if(count($p_name)==4){
                    $first_name = $p_name[0].' '.$p_name[1];
                    $last_name = $p_name[2].' '.$p_name[3];
                }
               // dd($first_name.' '.$last_name);
             //   echo $result[1].':'.$date."<br />";

                $user = new User();
                $user->email = $result[18];;;
                $user->name = strtolower($first_name.'-'.$last_name);
                $user->password =  bcrypt($request->unique_id.'.123#!');
                $user->role = 'patient';

                $user->save();
                $user_id = $user->id;

                $patient = new Patients();

                if(!empty($user_id))
                    $patient->user_id               = $user_id;

                $patient->patient_unique_id        = $result[0];
                $patient->patient_name             = $result[3];






                $patient->first_name = $first_name;
                $patient->last_name = $last_name;


                $patient->patient_phone            = $result[12];
                $patient->patient_email            =  $result[18];;
                $patient->date_of_birth            = !empty($result[4])?date('Y-m-d',strtotime($result[4])):NULL;
                if(!empty($date) && $date!='1970-01-01')
                $patient->created_at            = $date;
                $patient->gender                   = $result[6]=='M'?"Male":"Female";

                $patient->card_number              = $result[5];

                $patient->zipcode                  = $result[8];
                // $patient->address               = $request->address;
                $patient->occupation               =  $result[17];;
                $patient->comapny_name             = $result[20];;

                $patient->referral_name            = $result[13];

                $patient->referral_code            = $result[14];


                $patient->insurance_by                  =  $result[21];;
                $patient->insurance_number                  =  $result[22];;
                //  $patient->change_of_address                  = $request->change_of_address;
                $patient->custom_code                  = $result[0];
                $patient->cuser                         = Auth::id();
                $patient->hosptial_id                   = CommonMethods::getHopsitalID();



                $patient->save();

              $id = $patient->id;
                if ($id > 0) {
                //    if(!empty(trim($request->address))):
                        $addresses = new Addresses();
                        $addresses->address = $result[7];
                        $addresses->patient_id = $id;
                        $addresses->save();
                 //   endif;

                    $medical_history = new Medicals();
                    $medical_history->is_allegric   = isset($result[15]) && !empty($result[15])?"Yes":"No";
                    $medical_history->patient_id                  = $id;
                    $medical_history->allegric                  = $result[16];
                    $medical_history->hospital_id               = CommonMethods::getHopsitalID();
                    $medical_history->save();
                }

        }
         $i++;

            $result = NULL;
        }
        if($id) {
            echo json_encode(array(
                'type' => 'success',
                'message' => 'CSV is imported successfully.'
            ));
        } else {
            echo json_encode(array(
                'type' => 'error',
                'message' => 'Some problem in importing, try again.'
            ));
        }
    }

    public function get_to_tasks(){
        return view('partials.task-panel');
    }

    public function get_patient_history($id){

        $treatments = Patients::find($id)->treatments->take(5);
        $appointments = Patients::find($id)->appointments->take(10);
        $patient = Patients::find($id);
        $appointments = Patients::find($id)->appointments;
        $activity = Patients::find($id)->activities->take(15);

        return view('partials.get-history',['treatments'=>!$treatments->isEmpty()?$treatments:NULL,'patient'=>$patient,'appointments'=>isset($appointments[0])?$appointments[0]:NULL,'activities'=>!$activity->isEmpty()?$activity:NULL]);
    }

    public function get_treatment_card(){
        return view('partials.treatment');
    }

    public function get_patient_consent($id){

        $treatment = Treatments::find($id);
        $appointment_id = $treatment->appointment_id;

        $appointment = Appointments::find($appointment_id);
        $doctor = Doctors::find($appointment->doctor);

        $patient_id = $treatment->patient_id;
        $patient = Patients::find($patient_id);

        return view('partials.consent-form',['patient'=>$patient,'doctor'=>$doctor,'treatment_id'=>$id]);
    }
    public function get_patient_products($treatment_id){
        $products = Products::whereNull('deleted_at')->where('hospital_id',CommonMethods::getHopsitalID())->get();
        $products = !empty($products)?$products:NULL;
        $treamnt_product = new TreatmentProducts();

        $treamnt_product = $treamnt_product->get_treatment_product($treatment_id);
        //dd($treamnt_product);
        return view('partials.products',['products' => $products,'treatment_product'=>$treamnt_product]);
    }

    public function get_patient_saved_products($treatment_id){

        $treamnt_product = new TreatmentProducts();

        $treamnt_product = $treamnt_product->get_treatment_product($treatment_id);
        //dd($treamnt_product);
        return view('partials.get_product',['treatment_product'=>$treamnt_product]);
    }

    public function get_block_time(){
        $services       = DoctorServices::whereNull('deleted_at')->where('hospital_id',CommonMethods::getHopsitalID())->get();
        $locations      = Locations::whereNull('deleted_at')->where('hospital_id',CommonMethods::getHopsitalID())->get();
        $rooms          = Rooms::whereNull('deleted_at')->where('hospital_id',CommonMethods::getHopsitalID())->get();
        $doctors        = Doctors::with('users')
            ->whereNull('deleted_at')->get();
        $patient = Patients::orderBy('created_at', 'desc')->where('hospital_id',CommonMethods::getHopsitalID())->first();
        $uniqueId = 25082000+$patient->id+1;

        $countries = Countries::get();
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        $ch = curl_init();


        // set url
        curl_setopt($ch, CURLOPT_URL, "http://ip-api.com/json/".$ipaddress);

        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
        $output = curl_exec($ch);

        // close curl resource to free up system resources
        curl_close($ch);
        $data = json_decode($output);

        //  $details    = json_decode( $data );

        $current_country = !empty($data) && $data->status=="success"? $data->country:"";
        // dd( $current_country );

        return view('partials.block-time',['unique_id'=>$uniqueId,'doctors'=>$doctors,'services'=>$services,'rooms'=>$rooms,'locations'=>$locations,'countries'=>$countries,'current_country'=>$current_country,'page'=>'block_time']);

    }

    public function getLogout()
    {
        Session::flush();
        Auth::logout();

        return redirect('/');
    }

    public function upload_documents(Request $request){

             $patient_profile = ['insurance','medical'];
             $staff_profile = ['profile'];

             $documents = new Documents();

        if ($request->hasFile('document_file')) {
            if ($request->file('document_file')->isValid()) {
                //
                $file = $request->file('document_file');
                $size = $file->getSize() * 1.024;

                if(in_array($request->document_type,$patient_profile)){
                    $patient = Patients::find($request->patient_id);
                    $filename = $request->patient_id.'-'.$patient->patient_name.'-'.time();
                    $documents->user_id = $request->patient_id;
                    $documents->user_type = 'patient';
                }
                if(in_array($request->document_type,$staff_profile)){
                    $staff = Staffs::find($request->staff_id);
                    $filename = $request->staff_id.'-'.$staff->first_name.'-'.$staff->last_name.'-'.time();
                    $documents->user_id = $request->staff_id;
                    $documents->user_type = 'staff';
                }


                $filen = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $document_name =  str_slug($filename.'-'.$filen).'.'. $file->getClientOriginalExtension();
                $type = $file->getClientOriginalExtension();
                $file->move('public/uploads/documents/', $document_name);
                $documents->document = $document_name;
                $documents->document_type = $request->document_type;
                $documents->hospital_id     = CommonMethods::getHopsitalID();
                //  dd($file);
                $documents->save();

                echo json_encode(array(
                    'id' => $documents->id,
                    'document_name' => $document_name,
                    'file_size' => $size,
                    'file_type' => $type
                ));

            }
        }
    }

    public function send_email(){

        $p = Patients::find(5);


       //SendEmail::sendReminderEmail('mujtaba','mujtabaahmad1985@gmaiu',5);
    }

    public function change_password(){
        return view('partials.change-password');
    }


    public function save_password(Request $request){

        $old_password = $request->old_password;

        $message = array();

        if (!(Hash::check($request->old_password, Auth::user()->password))) {
            $message = array(
                    'type' => 'error',
                    'message' => 'Old password is not matching'
            );

        }else{

            $user = Auth::user();
            $user->password = bcrypt($request->new_password);
            $user->save();


            $message = array(
                'type' => 'success',
                'message' => 'Password is changed successfully.'
            );
        }

        echo json_encode($message);


    }

    public function get_elements(Request $request){
        $element = $request->element;
        $title = $request->title;
        $type = $request->_type;
        $patient_id = $request->patient_id;
        $description  = isset($request->description)?$request->description:"";
        return view('partials.treatment-card-description-elements',['type'=>$type,'element'=>$element,'title'=>$title,'description'=>$description,'patient_id'=>$patient_id]);
    }


    public function treatment_card_settings(){
        return view('crm-configuration.configuration');
    }

    public function load_treatment_type($type){
        switch($type){
            case "flags":
                $flags = PatientFlags::where('hospital_id',CommonMethods::getHopsitalID())->get();
                return view('crm-configuration.patient-flags.patient-flags',['flags'=>$flags]);
            break;
        }
    }

    public function profile($username){
        $doctors = Doctors::with('users')
            ->whereNull('deleted_at')->where('hospital_id',CommonMethods::getHopsitalID())->get();
        $data = [
            'doctor' => $doctors
        ];
        if(Auth::User()->role=="administrator"){
            $activities = Activities::paginate(10);
            $data['activities'] = $activities;
            return view('profile',$data);
        }


        if(Auth::User()->role=="staff")
            return view('staffs.profile',$data);

        if(Auth::User()->role=="doctor"){
            $user = User::where('name',$username)->first();

            return view('doctors.profile',['doctor'=>isset($user->doctors)?$user->doctors:NULL]);
        }


    }




    public function me(){

        return view("profile");
    }



}
