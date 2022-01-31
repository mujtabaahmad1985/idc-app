<?php

namespace App\Http\Controllers\Auth;

use App\Patients;
use Dompdf\Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Google_Client;
use Google_Service_PeopleService;
use Google_Service_People;
use Google_Service_Calendar;
use App\SocialAccountService;



class SocialAccountController extends Controller
{
    //
    private $client;

    public function __construct()
    {
        $client = new Google_Client();

        $client->setClientId(env('GOOGLE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
        $client->setRedirectUri(env('GOOGLE_REDIRECT_URL'));
        //  $client->setScopes(explode(',', env('GOOGLE_SCOPES')));
        $client->setApprovalPrompt(env('GOOGLE_APPROVAL_PROMPT'));
        $this->client = $client;
    }
    public function redirectToProvider($provider)
    {

        return \Socialite::driver('google')
            ->scopes(['openid', 'profile', 'email', Google_Service_People::CONTACTS_READONLY,Google_Service_Calendar::CALENDAR_READONLY,Google_Service_Calendar::CALENDAR])
            ->redirect();
    }

    /**
     * Obtain the user information
     *
     * @return Response
     */
    public function handleProviderCallback(SocialAccountService $accountService, $provider)
    {

       // echo Google_Service_People::CONTACTS_READONLY;exit;
        try {
            $user = \Socialite::with($provider)->user();
        } catch (\Exception $e) {
            echo $e->getMessage();
            return redirect('login/google');
        }

        //dd($authUser);
        session(['google_token' => $user->token,'avatar' => $user->avatar,'google_email'=>$user->email,'google_name'=>$user->name]);

        $token = $this->client->refreshToken($user->token);
        //   $client->setAccessToken($token);
        $this->client->setAccessToken($token);
        $timezone = env('APP_TIMEZONE');
        //auth()->login($authUser, false);

        $service = new Google_Service_PeopleService($this->client);

        $optParams = array(
            'pageSize' => 50,
            'personFields' => 'names,emailAddresses,phoneNumbers,genders,emailAddresses',
        );
        $results = $service->people_connections->listPeopleConnections('people/me', $optParams);
        dd($results);
        if (count($results->getConnections()) == 0) {
            print "No connections found.\n";
        } else {
            print "People:\n";
            foreach ($results->getConnections() as $person) {
                if (count($person->getNames()) == 0) {
                    print "No names found for this connection\n";
                } else {
                    $names = $person->getNames();
                    $phone = $person->getPhoneNumbers();
                    $gender = $person->getGenders();
                    $email = $person->getEmailAddresses();
                    echo "<pre>"; print_r($email); echo "</pre>";
                    $p = isset($phone[0]) && !empty($phone[0])?$phone[0]->getValue():"";
                    $name = $names[0];
                    echo $name->getDisplayName().' - '.$p."<br />";
                }
            }
        }
        //return redirect()->to('/dashboard');
    }

    public function import_contacts(Request $request){

        $patient = Patients::orderBy('created_at', 'desc')->first();
        $unique_id = $patient->patient_unique_id;


        $token = $this->client->refreshToken($request->token);
        //   $client->setAccessToken($token);
        $this->client->setAccessToken($token);
        $service = new Google_Service_PeopleService($this->client);

        $optParams = array(
            'pageSize' => 2000,
            'personFields' => 'names,emailAddresses,phoneNumbers,genders,emailAddresses,addresses,birthdays,occupations,organizations,residences',
        );
        $results = $service->people_connections->listPeopleConnections('people/me', $optParams);
       try{
           if (count($results->getConnections()) == 0) {
               print "No connections found.\n";
           } else {
               print "People:\n";
               foreach ($results->getConnections() as $person) {
                   if (count($person->getNames()) == 0) {
                       print "No names found for this connection\n";
                   } else {
                       $names = $person->getNames();
                       $phone = $person->getPhoneNumbers();
                       $gender = $person->getGenders();
                       $email = $person->getEmailAddresses();
                       $addresses = $person->getAddresses();
                       $birthdays = $person->getBirthdays();
                       $occupations = $person->getOccupations();
                       $organizations = $person->getOrganizations();

                       $p = isset($phone[0]) && !empty($phone[0])?$phone[0]->getValue():"";
                       $e = isset($email[0]) && !empty($email[0])?$email[0]->getValue():"";
                       $g = isset($gender[0]) && !empty($gender[0])?$gender[0]->getValue():"";
                       $city = isset($addresses[0]) && !empty($addresses[0])?$addresses[0]->getCity():"";
                       $country = isset($addresses[0]) && !empty($addresses[0])?$addresses[0]->getCountry():"";
                       $code = isset($addresses[0]) && !empty($addresses[0])?$addresses[0]->getCountryCode():"";
                       $zipcode = isset($addresses[0]) && !empty($addresses[0])?$addresses[0]->getPostalCode():"";
                       $occupation = isset($addresses[0]) && !empty($addresses[0])?$addresses[0]->getPostalCode():"";
                       $bb = isset($birthdays[0]) && !empty($birthdays[0])?$birthdays[0]->getDate():"";
                       $b = isset($bb)&&!empty($bb)?'1960'.'-'.$bb['month'].'-'.$bb['day']:NULL;
                       $organization = isset($organizations[0]) && !empty($organizations[0])?$organizations[0]->getName():"";
                       $occupation = isset($occupations[0]) && !empty($occupations[0])?$occupations[0]->getValue():"";
                       $name = $names[0];
                       //echo "<pre>".$name->getDisplayName().'-'.$b.' - '.$occupation. ' - '.$city.' - '.$zipcode.' - '.$code.' - '.$country.'<br />';



                       $patient = Patients::where('patient_name',$name->getDisplayName())->where('patient_email',$e)->get();
                       if($patient->isEmpty()){
                           try{
                               $pt = new Patients();
                               $pt->patient_name = $name->getDisplayName();
                               $pt->patient_email = $e;
                               $pt->patient_phone = htmlspecialchars($p);
                               $pt->patient_unique_id = (++$unique_id);
                               $pt->date_of_birth = $b;
                               $pt->city = $city;
                               $pt->city = $city;
                               $pt->gender = $g;
                               $pt->code = $code;
                               $pt->occupation = $occupation;
                               $pt->comapny_name = $organization;
                               $pt->zipcode = $zipcode;
                               $pt->save();
                               echo $pt->id;
                           }catch(Exception $e){

                           }

                       }
                   }
               }
           }
       }catch (Exception $e){

       }

    }
}
