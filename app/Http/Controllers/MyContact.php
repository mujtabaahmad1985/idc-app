<?php

namespace App\Http\Controllers;

use App\Helpers\CommonMethods;
use App\MyContacts;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Google_Client;
use Google_Service_PeopleService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MyContact extends Controller
{
    //

    private $client;
    private $accessToken;
    private $tokenPath;
    public function __construct(){
        define('STDIN',fopen("php://stdin","r"));
        $this->client = new Google_Client();
        $this->client->setApplicationName('People API PHP Quickstart');
        $this->client->setScopes(Google_Service_PeopleService::CONTACTS_READONLY);
        $this->client->setAuthConfig(base_path('credentials.json'));
        $this->client->setAccessType('offline');
        $this->client->setPrompt('select_account consent');
        $this->tokenPath = "token.json";
    }
    public function contacts(){

        if(!isset($_GET['search']))
            $contacts = MyContacts::where('created_by',Auth::id())->paginate(50);
        else{
            $data = $_GET;
            $contacts = MyContacts::where('created_by',Auth::id())->where(function($q) use($data){
                if(!empty($data['name']))
                    $q->where('name',$data['name']);
            })->paginate(50);
        }



            return view('my-contacts.contact',['contacts'=>$contacts]);

    }

    function getAuthURL(){
             $authUrl = $this->client->createAuthUrl();
                echo $authUrl;
    }

    public function getGoogleAccessToken(){

        if (Storage::disk('token_files')->exists($this->tokenPath)) {
            $this->accessToken = json_decode((Storage::disk('token_files')->get($this->tokenPath)), true);
            //dd($this->accessToken);
            $this->client->setAccessToken($this->accessToken);
        }


        if ($this->client->isAccessTokenExpired()) {
            if ($this->client->getRefreshToken()) {
                $this->client->fetchAccessTokenWithRefreshToken($this->client->getRefreshToken());
            }
        }
    }

    public function importGoogleContact()
    {

        if(isset($_GET['code'])){
            $authCode = $_GET['code'];

            $this->accessToken = $this->client->fetchAccessTokenWithAuthCode($authCode);

            $this->client->setAccessToken($this->accessToken);

            if (array_key_exists('error', $this->accessToken)) {
                throw new Exception(join(', ', $this->accessToken));
            }

           // if (!file_exists(dirname($this->tokenPath))) {
              //  dump('TEST');
            Storage::disk('token_files')->put($this->tokenPath,json_encode($this->client->getAccessToken()));
              //  fopen(public_path($this->tokenPath), 0700, true);
          // }
          //  file_put_contents($this->tokenPath, json_encode($this->client->getAccessToken()));
        }
        if (Storage::disk('token_files')->exists($this->tokenPath)) {

              $this->getGoogleAccessToken();

              $service = new Google_Service_PeopleService($this->client);

            $optParams = array(
                'pageSize' => 2000,
                'personFields' => 'names,emailAddresses,phoneNumbers,metadata,addresses',
            );
            $results = $service->people_connections->listPeopleConnections('people/me', $optParams);

            if (count($results->getConnections()) == 0) {
                print "No connections found.\n";
            } else {

                foreach ($results->getConnections() as $person) {
                    if (count($person->getNames()) == 0) {
                        print "No names found for this connection\n";
                    } else {
                        $names = $person->getNames();
                        $google_user_id = ($names[0]->getMetaData()->getSource()->getId());
                        $name = $names[0];
                        $display_name = ($name->getDisplayName());
                        $phone_number =isset( $person->getPhoneNumbers()[0])? $person->getPhoneNumbers()[0]->getValue():"";
                        $address = isset( $person->getAddresses()[0])? $person->getAddresses()[0]->getFormattedValue():"";;
                         $emailaddress =  isset( $person->getEmailAddresses()[0])? $person->getEmailAddresses()[0]->getValue():"";;
                       // dump($google_user_id.' - '.$emailaddress.' - '.$display_name.' - '.$phone_number.' - '.$address);
                        $data = array(
                            'vendor_id'=>$google_user_id,
                            'created_by' =>Auth::id(),
                            'name'=>$display_name,
                            'imported_from'=>'google',
                            'email_address'=>$emailaddress,
                            'phone_number'=>$phone_number,
                            'address'=>$address,
                            'hospital_id' => CommonMethods::getHopsitalID()

                        );

                        $mycontact = MyContacts::where('vendor_id',$google_user_id)->where('hospital_id',CommonMethods::getHopsitalID())->where('created_by',Auth::id())->where('imported_from','google')->first();
                        if(isset($mycontact)){
                            $data['updated_at'] = Carbon::now()->format('Y-m-d H:i:s');
                            $mycontact->update($data);
                        }else{
                            $mycontact = new MyContacts();
                            $data['created_at'] = Carbon::now()->format('Y-m-d H:i:s');
                            $mycontact->insert($data);
                        }
                    }
                }

                return redirect('/mycontacts');
            }

            }else{
                $this->getAuthURL();
            }






    }

    public function save_contact(Request $request){
        $id = $request->id;

        if(empty($id)){
            $mycontact = new MyContacts();
            $mycontact->vendor_id = Str::uuid();
            $mycontact->imported_from = 'Web';
        }

        else
            $mycontact = MyContacts::find($id);
       ;
        $mycontact->name = $request->name;
        $mycontact->email_address = $request->email;
        $mycontact->phone_number = $request->phone_number;
        $mycontact->address = $request->address;

        $mycontact->created_by = Auth::id();

        $mycontact->save();

        $id = $mycontact->id;

        if ($id > 0) {
            echo json_encode(array(
                'type' => 'success',
                'message' => 'Contact is saved successfully with selected session.',

            ));
        } else {
            echo json_encode(array(
                'type' => 'error',
                'message' => 'Some problem in user submitting, try again.'
            ));
        }

    }

    public function get_contact_json(Request $request){
        $id = $request->id;

        $contact = MyContacts::where('id',$id)->where('created_by',Auth::id())->first();
        return $contact->toJson();
    }

    public function delete_contact(Request $request){
        $id = $request->id;

        $contact = MyContacts::where('id',$id)->where('created_by',Auth::id())->delete();
    }
}
