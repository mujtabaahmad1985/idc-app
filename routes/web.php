<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\User;
use App\SendEmail;
use DeviceDetector\DeviceDetector;
use DeviceDetector\Parser\Device\DeviceParserAbstract;
use Carbon\Carbon;
Route::get('/', function () {

    if(Auth::check()){
        return redirect()->intended('/dashboard');
    }else{
        return view('login');
    }



});

Route::get('/facebook','HomeController@facebook');
Route::get('/upload/colors','HomeController@upload_csv_color');
Route::get('/test/email','HomeController@send_email');

Route::get('/download/patient/invoice/{id}','Invoice@download_invoice');
Route::get('/patient/treatment-card/download',"Treatment@generate_treatment_card_hashed_pdf");
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    return "Cache is cleared";
});
//Route::get('/importgoogle','HomeController@importGoogleContact');
Route::get('/update/user',function (){

    $type = isset($_GET['type'])?$_GET['type']:"";
   // dd($type);
    if(empty($type))
    $user = User::find(1);

    if(!empty($type) && $type=='h1')
        $user = User::find(100);
    if(!empty($type) && $type=='h2')
        $user = User::find(102);
    $user->secure_link_token = "$2y$10$2/0J3Gr1cDZf/Z4Gt6D9jui4O4G8pMCTp6w7enOc79UT9qsKh.O0K";
    $user->save();
});

Route::get('/update/table/column','HomeController@all_tables_update_sepecific_cloumn');

Route::get('/cliniko',function(){
    //MS0yMjQ3OS1uUGFIMVZHTEJlVU9KRDZyZ3o4K2NCY2I1TDl6eVA5aw-au1
    define('APP_VENDOR_NAME','test_api_123');
    define('APP_VENDOR_EMAIL','mujtabaahmad1985@gmail.com');
    $ch = curl_init();
    //curl_setopt( $ch, CURLOPT_USERAGENT, APP_VENDOR_NAME (APP_VENDOR_EMAIL) );


    curl_setopt($ch, CURLOPT_URL, "https://api.cliniko.com/v1/appointments");

    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Authorization: MS0yMjQ3OS1uUGFIMVZHTEJlVU9KRDZyZ3o4K2NCY2I1TDl6eVA5aw-au1',
        'Accept: application/json',
        'User-Agent: test_api_123 (mujtabaahmad1985@gmail.com)'
    ));

    // $output contains the output string
    $output = curl_exec($ch);
    curl_close($ch);
    $data = json_decode($output);
    dd($data);
});

Route::get('/upload/products',function(){



    $handle = base_path()."/products.csv";
    $handle = fopen( $handle, "r");
    $i=1;
    $id = 0;
    $flag = false;
    $format = 'Y-m-d';

    while (($result = fgetcsv($handle)) !== false) {

        if ($i > 1) {
            echo "<pre>"; print_r($result);


        $product_title = $result[0];


        $inv_date = date('Y-m-d',strtotime(str_replace(['/','.'],'-',$result[1])));
        $expiry_date = date('Y-m-d',strtotime(str_replace(['/','.'],'-',$result[2])));
        $category_id = "";
        $sub_category_id = "";
        $cate = $result[9];
        $sub_cate = $result[10];
        $qty_order = $result[4];
        $brand_name = $result[11];
        $price = str_replace('$', '',$result[16]);
        //$price =  is_numeric($price)?$price:0;
        $price_seven_percent = 0;
        if($price > 0){
       //    $price_seven_percent = $price + ($price * 0.07);
        }
        $brand_id = 0;
        $b = \App\MedicationBrands::where('brand_name',$brand_name)->first();
        if(isset($b)){
            $brand_id = $b->id;

        }else{
            $b = new \App\MedicationBrands();
            $b->brand_name = $brand_name;
            $b->save();
            $brand_id = $b->id;
        }


        $c = \App\MedicationCategories::where('name',$cate)->first();
        if(isset($c)){
           $category_id = $c->id;


            $c = \App\MedicationCategories::where('name',$sub_cate)->first();
            if(isset($c)){
                $sub_category_id = $c->id;
            }else{
                $sub = new \App\MedicationCategories();
                $sub->name = $sub_cate;
                $sub->parent_id = $category_id;
                $sub->save();
                $sub_category_id = $sub->id;
            }
        }
        if(!empty($product_title)){
            $prod = array(
                'product_title' => $product_title,
                'inv_date' => $inv_date,
                'expiry_dat' => $expiry_date,
                'category_id' => $category_id,
                'sub_category_id' => $sub_category_id,
                'qty_order' => !empty($qty_order) && is_numeric($qty_order)?$qty_order:0,
                'brand_id' => $brand_id,
                'price_unit' => $price,

            );
            $p = new \App\Products();
            $p->product_title = $prod['product_title'];
            $p->category_id = !empty($prod['category_id'])?$prod['category_id']:0;
            $p->sub_category_id = !empty($prod['sub_category_id'])?$prod['sub_category_id']:0;
            $p->brand_id = $prod['brand_id'];
            $p->in_stock = $prod['qty_order'];
            $p->save();
            $product_id = $p->id;
            $p_p = new \App\ProductPurchases();
            $p_p->product_id = $product_id;
            $p_p->inv_date = $prod['inv_date'];
            $p_p->expiry_date = $prod['expiry_dat'];

            $p_p->order_qty = $prod['qty_order'];

            $p_p->price_unit = $prod['price_unit'];
            $p_p->save();
            echo $p_p->id."<br />";
        }


    }

        $i++;
    }


});

Auth::routes();
Route::post('/send/secure/link/login','UserAuth@send_link');
Route::get('/validate/secure/link','UserAuth@validate_link');
//Route::post('/login','Auth\LoginController@postLogin');
//Route::get('/create/account/patient', 'GeneralController@create_account_patient')->name('create_as_patient');
Route::post('/save/web/patient/','GeneralController@save_from_login_page')->name('save_from_login_page');
Route::get('/activate/account/{email}/{bycrpt_email}/{params?}', 'Staff@activate_account')->where('params', '(.*)');
Route::get('/blank','HomeController@blank_page');
Route::post('/forget/password','GeneralController@forget_password');
Route::get('/reset/password','GeneralController@reset_password');
Route::post('/reset/new/password','GeneralController@reset_with_new_password');
Route::get('/get/recent/patient/unique-id','GeneralController@get_recent_patient_unique_id');
Route::get('/test',function(){
   // $ua_info = pars
   // dd($ua_info);
    $userAgent = $_SERVER['HTTP_USER_AGENT']; // change this to the useragent you want to parse

    $dd = new DeviceDetector($userAgent);
    $dd->parse();

    $client = $dd->getClient();
    $browser = $client['name'].' '.$client['version'];

    $os = $dd->getOs();
    $device = $dd->getDeviceName();
    $m = $dd->getModel();
    $brand = $dd->getBrandName();

    $plate_from = $os['name'].' '.$os['version'].' '.$os['platform'];



});

Route::get('/new/password',function(){
    $user= User::find(368);
    $user->password = bcrypt('12345678');
    $user->save();
});
Route::get('/send/test/email',function(){
    SendEmail::send_credentials('mujtaba', 'me@iamfreelancer.me', '12345678',35);
});

Route::get('/my/profile','GeneralController@update_patient_profile');


Route::group([ 'middleware' => 'auth'], function() {

    Route::get('/me','HomeController@me');

    Route::get('/patients',function(){
        return view('patients');
    });


    Route::post('/upload/csv/products','Product@upload_csv_products');

    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
    Route::get('/logout', 'HomeController@getLogout');

    Route::get('/calendar', 'HomeController@calendar')->name('calendar');


    Route::get('/doctors', 'Doctor@get_doctors')->name('doctors');
    Route::get('/doctor/{id}', 'Doctor@get_doctor_by_id')->name('doctors by ID');
    Route::get('/new/doctor','Doctor@doctor_form')->name('new-doctor');
    Route::get('/edit/doctor/{id}','Doctor@edit_doctor')->name('edit-doctor');
    Route::get('/doctor/delete/{id}', 'Doctor@delete_doctor')->name('Delete doctors by ID');
    Route::get('/doctor/profile/{username}', 'Doctor@doctor_profile')->name('Doctor-Profile');
    Route::get('/user/password/change', 'HomeController@change_password')->name('change_password');
    Route::post('/save/new/password','HomeController@save_password');

    Route::post('/doctor/add_doctor', 'Doctor@add_doctor');
    Route::post('/doctor/update', 'Doctor@edit_doctor');
    Route::get('/locations', 'Location@get_locations')->name('locations');
    Route::post('/location/add_location', 'Location@add_location');

    Route::get('/get/doctor/detail/{id}','Doctor@get_doctor_detail');
    Route::get('/get/doctor/patients/{id}','Doctor@get_doctor_patients');
    Route::get('/location/get/{id}', "Location@get_location");

    Route::post('/location/edit_location', 'Location@edit_location');
    Route::get('/location/delete/{id}', 'Location@delete_location');
    Route::get('/set/doctor/permissions/{id}','Doctor@set_permissions');
//////////////////////// ROOM ///////////////////////////////
    Route::get('/rooms', 'Room@get_rooms')->name('rooms');
    Route::post('/room/add_room', 'Room@add_room');
    Route::get('/room/get/{id}', "Room@get_room");
    Route::post('/room/edit_room', 'Room@edit_room');
    Route::get('/room/delete/{id}', "Room@delete_room");
///////////////////////////////////////////////////////////////

////////////////////////// SERVICES/////////////////////////////////

    Route::get('/services', 'DoctorService@get_service')->name('doctor_service');
    Route::post('/service/add_service', 'DoctorService@add_service')->name('add_service');
    Route::post('/service/get', 'DoctorService@get_service_by_id');
    Route::post('/service/delete', 'DoctorService@delete_service');
    Route::post('/service/update_service', 'DoctorService@update_service');

///////////////// END SERVICES/////////////////////////////////////
    Route::get('/patients/personal/add', 'Patient@add_patient');
    Route::get('/patients/add', 'Patient@add_patient')->name('add_patient');
    Route::get('/patients/old', 'Patient@old_add_patient');

///////////////// SETUP ////////////////////////////////////////

    Route::get('/setup/clinical-detail', 'ClinicalDetail@get_clinical_detail')->name('clinical_detail');
    Route::post('/setup/add_clinical_detail', 'ClinicalDetail@add_clinical_detail');

    Route::get('/setup/availability', 'Availability@page_availability')->name('availablity');
    Route::get('/clinical/get/{id}', 'ClinicalDetail@get_detail');
    Route::post('/save/doctor/availbility','Availability@save_doctor_availability');

    Route::post('/setup/update/clinical', 'ClinicalDetail@update_clinical_detail');
    Route::get('/clinical/delete/{id}', 'ClinicalDetail@delete_detail');

    Route::get('/doctor/appointments/{id}','Doctor@doctor_appointments');
///////////////// END SETUP/////////////////////////////////////

////////////////////// AVAILBLITY ////////////////////////////////

    Route::post('/save/availabilty', 'Availability@add_availablity');
    Route::post('/availability/get_by_doctor', 'Availability@get_by_doctor');
    Route::get('/availability/delete/{id}', 'Availability@delete_availability');
    Route::post('/save/holidays', 'Availability@save_holidays');
    Route::get('/holidays/delete/{id}', 'Availability@delete_availability');
    Route::get('/get/doctor/timeslots/{id}', 'Availability@get_time_slots_by_doctor');
    Route::get('/get/doctor/availability/{id}', 'Availability@get_availability');
    Route::get('/get/doctor/availability/details/{id}', 'Availability@get_details_availability');
    Route::get('/get/not-availabile/{id}', 'Appointment@get_not_availability');
    Route::post('/check_availability_doctor_date', 'Availability@check_availability_by_doctor_date');
    Route::post('check/availability', 'Availability@check_availability_by_object');
////////////////////// END AVAILBLITY ////////////////////////////////
///
/// ////////////////////// BOOKING PROCESS ////////////////////////////////
    Route::get('/setup/booking-process', 'BookingProcess@show_booking_process')->name('booking_process');
    Route::post('/bookingprocess/update', 'BookingProcess@update_booking_process');
    Route::post('/bookingprocess/delete', 'BookingProcess@delete_booking_process');
    Route::post('/bookingprocess/add', 'BookingProcess@add_booking_process');
    Route::post('/bookingprocess/payments', 'BookingProcess@add_payments');
    Route::post('/bookingprocess/update_approval_options', 'BookingProcess@update_approval_options');
    Route::post('/bookingprocess/booking_request', 'BookingProcess@update_booking_request');

/// ////////////////////// END BOOKING PROCESS ////////////////////////////////

/// ////////////////////// PAYMENTS ////////////////////////////////
    Route::get('/setup/payments', 'Payment@show_payment')->name('payments');
    Route::post('/payment/delete', 'Payment@delete_payment');
    Route::post('/payments/add', 'Payment@save_payment');
/// ////////////////////// END PAYMENTS ////////////////////////////////

/// ////////////////////// PRODUCTS ////////////////////////////////
    Route::get('/pharmacy', 'Product@show_products')->name('products');
    Route::get('/product/new', 'Product@new_product')->name('products');
    Route::get('/product/view/{id}','Product@view_product')->name('view-product');
    Route::get('/product/edit/{id}','Product@edit_product')->name('view-product');

    Route::post('/product/save', 'Product@save_product');
    Route::post('/product/update', 'Product@update_product');
    Route::get('/product/get/{id}', 'Product@get_product_by_id');
    Route::post('/product/delete', 'Product@product_delete');
    Route::get('/get/products/by-search/','Product@get_product_by_search');
    Route::post('/save/item','Product@save_item');
    Route::get('/get/products','Product@get_products');
    Route::post('/search/get/subcategory','Product@get_search_sub_categories');
    Route::post('/search/products','Product@search_products');
    Route::get('/product/detail/{id}','Product@product_detail');
    Route::get('/get/products/json','Product@product_as_json');
    Route::get('/get/product/basic/{id}','Product@get_product_info');
    Route::get('/get/sold/to/{id}','Product@sold_to');
    Route::get('/purchase/orders','PurchaseOrder@purchase_orders')->name('purchase-order');
    Route::get('/purchase/order/new','PurchaseOrder@purchase_orders_new')->name('new-purchase-order');
    Route::post('/save/purchase/order','PurchaseOrder@save_purchase_order');
/// ////////////////////// END PAYMENTS ////////////////////////////////


////////////////////// APPOINTMENT ////////////////////////////////////
    Route::get('/patients/get_all_patients/{name}', 'Patient@get_all_patients');
    Route::get('/refferal/get_referral/{name}', 'Patient@get_referral');

    Route::post('/appointment/book', 'Appointment@add_appointment');
    Route::post('/get/google/appointment/detail', 'Appointment@show_google_appointment');
    Route::get('/appoinment/get_appointments/{by_action}/{id}', 'Appointment@get_appointments');
    Route::get('/appoinment/get_appointments/all/{d_id}/{p_id}', 'Appointment@get_appointments');
    Route::post('/appoinment/get_filter_appointments', 'Appointment@get_filter_appointments');
    Route::get('/appointment/detail/{id}', 'Appointment@get_appointments_detail');
    Route::post('/appointment/update_resize', 'Appointment@update_by_resize');
    Route::post('/appointment/update', 'Appointment@update_by_id');
    Route::get('/appointment/delete/{id}', 'Appointment@delete_appointment');
    Route::post('/appointment/block-time', 'Appointment@block_time');

    Route::post('/make/appointment', 'Appointment@make_appointment');
    Route::get('/show/appointment/{id}', 'Appointment@show_appointment');
    Route::get('/calendar/appointment/{id}/{name}', 'Appointment@book_appointment_by_patient');
    Route::get('/get/appointment/room/{id}/{date}', 'Appointment@by_room');
    Route::get('/update/status/appointment/{id}/{status}', 'Appointment@update_status_appointment');
    Route::get('/appointment/get/{id}', 'Appointment@get_appointment_by_id');
    Route::get('/appointment/edit/{id}', 'Appointment@edit_appointment');
    Route::post('/check_all_availability', 'Appointment@check_all_availability');
    Route::get('/search/appointments','Appointment@search_appointments');


////////////////////////////////// PATIENT /////////////////////////////////////

    Route::post('/patient/save', 'Patient@save');
    Route::get('/get/appointments/patient/{id}', 'Patient@_get_appointments_by_patient_id');
    Route::get('/get/all/appointments/patient/{id}', 'Patient@_get_appointments_by_patient_id_all');
    //Route::get('/patient/list', 'Patient@get_listing')->name('patient_listing');
    Route::get('/patient/list', 'Patient@get_listing_sub')->name('patient_listing');
    Route::get('/patient/edit/{id}', 'Patient@edit_patient');
    Route::get('/patient/delete/{id}', 'Patient@delete_patient');
    Route::get('/search/patients','Patient@search_patients');
    Route::get('/patient/history/{id}', 'HomeController@get_patient_history');
    Route::post('/delete/patients', 'Patient@delete_selected_patient');
    Route::get('/get/appoinment/pending/{id}', 'Appointment@get_pending_appointment');

    Route::get('/add/new/phone', 'Patient@add_phone');
    Route::get('/phone/delete/{id}', 'Phone@delete_phone');
    Route::get('/patient/view/{id}', 'Patient@view_patient')->name('view-patient');

    Route::get('/patient/appointments/{id}',"Patient@get_appointments_by_patient_id");
    Route::get('/patient/treatment-cards/{id}',"Patient@get_treatment_cards_patient_id");
    Route::get('/patient/documents/{id}',"Patient@get_documents_by_patient_id");
    Route::get('/patient/treatment-card/pdf/{id}',"Treatment@generate_treatment_card_pdf");


    Route::get('/check/unique_id/{unique_id}', 'Patient@check_unique_id')->name('check_patient_unique_id');
    Route::get('/get/update/all', 'Patient@update_all_patient_name');

    Route::get('/update/address/status/{id}', 'Patient@update_address_status');
    Route::get('/view/treatment-cards/{id}', 'Patient@view_treatment_cards_patient_id');

    Route::get('/get/patient/revised-data/{id}','Patient@get_revised_data');
    Route::get('/get/patient/revised-data-by-id/{id}','Patient@get_revised_data_by_id');
    Route::post('/upload/patient/profile/picture','Patient@upload_profile_picture');
    Route::post('/create/directory','Folder@create_directory');
    Route::post('/update/patient/chunk','Patient@update_chunk_patient');
   // Route::post('/save/medical-history','MedicalHistory@save_medical_history');
    Route::get('/get/medical-history/patient/{id}','MedicalHistory@get_medical_history');
    Route::get('/show/medical-history/{id}','MedicalHistory@get_medical_history_by_id');
    Route::get('/show/profile/medical-history/{id}','MedicalHistory@get_medical_history_by_id_for_profile_page');
    Route::post('/update/patient/type','Patient@update_patient_type');
    Route::post('/update/patient/contact','Patient@update_contact_patient');
    Route::get('/show/patient/bio-data/{id}','Patient@show_bio_data');
    Route::get('/add/new/address','Patient@add_new_address');
    Route::post('/update/patient/referral','Patient@update_referral');
    Route::post('/update/patient/medication','Patient@update_medications');
    Route::post('/update/patient','Patient@update_editable');

    Route::get('/edit/medical-history/by/{id}','MedicalHistory@get_medical_history_by_id');
    Route::get('/get/all/patients','Patient@get_listing_sub');
    Route::post('/load/more/patients','Patient@load_more_patients');
    Route::get('/load/refers/{id}','Patient@get_refers');
    Route::get('/load/patient/appointments/{id}','Patient@get_patient_appointments');
    Route::post('/save/current-medication/with/treatment-card','Treatment@save_current_medications');
    Route::post('/send/appointment/reminder','Appointment@send_appointment_reminder');

    Route::get('/load/patient/documents/{id}','Document@get_patient_documents');
    Route::get('/delete/medical/history/{id}','MedicalHistory@delete_medical_history');
    Route::post('/save/new/treatment','TreatmentDone@save_treatment_done');
    Route::get('/delete/treatment/done/{id}','TreatmentDone@delete_treatment_done');
    Route::post('/load/section/template','Treatment@get_session_by_appointment');
    Route::post('/view/section/template','Treatment@load_session');
    Route::get('/past/session/{id}','Patient@past_sessions');
    Route::get('/pending/appointments/{id}','Patient@patinet_pending_appointments');
    Route::post('/refer/a/patient','Patient@refer_a_patient');
    Route::get('/patient/contact/{id}','Patient@patient_contact');

    Route::get('/patient/report/summary','Patient@patient_report_summary')->name('patient-reports');
    Route::get('/get/payment/history/{id}','Patient@get_payment_history');
    Route::post('/save/communication','Patient@save_communication_patient');

   // Route::post('/get/treatment-done','TreatmentDone@get_treatment_done');
////////////////////////////////// END PATIENT ///////////////////////////////
///

    //////////////////////////////////////// DRUG ALLERGY ////////////////////////////
     Route::post('/save/drug-allergye','DrugAllergy@add');
     Route::post('/save/drug/with/patient','PatientDrugAllergy@add');
    Route::get('/patient/drug/delete/{id}','PatientDrugAllergy@delete_drug_allergy');
    //////////////////////////////////////// END DRUG ALLERGY ////////////////////////////

//////////////////////////////////////// SAVED ITEMS ////////////////////////////

    Route::post('/save/saved-items','SaveItem@save_item');
    Route::get('/get/saved-items/patient/{id}','SaveItem@get_saved_item');
    Route::get('/show/saved-item-data/{id}','SaveItem@get_saved_item_data');
    Route::get('/edit/saved-items/{id}','SaveItem@edit_saved_item_data');

/////////////////////////////////////// END SAVED ITEMS ////////////////////////

//////////////////////////////// DIGITAl MEDIA ////////////////////////////////
    Route::post('/digital-image-upload','DigitalImage@save_image');
    Route::get('/get/digital-imaging/{id}','DigitalImage@get_image');
    Route::get('/get/digital-images/by/title/{title}/{id}','DigitalImage@get_image_by_title');

//////////////////////////////// END DIGITAL MEDIA////////////////////////////

    Route::post('/calculate/time', "HomeController@calculate");
    Route::post('/import_patient', "HomeController@get_import");
///
    Route::get('/setup/import', 'HomeController@import_patient')->name('import_customers');
///
    Route::get('/tasks/get', 'HomeController@get_to_tasks');
    Route::get('/check_availability/get', 'Appointment@check_availability');
    Route::get('/block-time/get', 'HomeController@get_block_time');
    Route::get('/treatment/card', 'HomeController@get_treatment_card');
    Route::get('/get/patient/consent/{id}', 'HomeController@get_patient_consent');
    Route::get('/get/patient/product/{id}', 'HomeController@get_patient_products');
    Route::get('/treatment/products/{id}', 'HomeController@get_patient_saved_products');
///
/// ////////////////////////////////// TREATMENT-CARD /////////////////////////////////////////////

    Route::post('/save/treatment', "Treatment@save_treatment");
    Route::get('/history/get/{id}', "Treatment@get_treatment");
    Route::get('/treatment/detail/{id}', "Treatment@treatment_detail");
    Route::post('/treatment/save_product', "TreatmentProduct@save_product_treatment");
    Route::post('/treatment/product/update', "TreatmentProduct@update_product_treatment");
    Route::post('/save/patient/consent', "Consent@save_consent");
    Route::get('/treatment/consent/{id}', "Consent@get_consent");
    Route::get('/load/treatment-card/{id}','Treatment@load_treatment_card');
    Route::get('/view/treatment-card/{id}','Treatment@view_treatment_card');
    Route::post("/save/patient/flags",'Treatment@save_flags_with_patient');
    Route::post('/save/new/flag','PatientFlag@save_new_flag');
    Route::post('/save/medical/history','MedicalHistory@save_medical_history');
    Route::post('/update/treatment/patient/update','Patient@update_patient_from_treatment_card');
    Route::get('/get/patient/info/{id}','Patient@get_patient_info');
    Route::get('/get/patient/medical/history/{id}','Treatment@get_patient_medical_histories');
    Route::get('/get/medical/history/{id}','MedicalHistory@get_medical_history_by_id');
    Route::post('/load/items','Treatment@load_items');
    Route::post('/sessions/items/save','AppointmentSession@save_items');
    Route::get('/sessions/delete/{id}','AppointmentSession@delete_session');
    Route::get('/edit/session/{id}','AppointmentSession@edit_session_by_id');
    Route::get('/check/existing/items/{id}','Treatment@check_existing_items');
/// ////////////////////////////////// END TREATMENT /////////////////////////////////////////////


///////////////////////////////// UPLOAD FILES /////////////////////////////////////////////////

    Route::post('/upload/file', 'HomeController@upload_documents');
    Route::get('/document/delete/{id}', 'Document@delete_document');
    Route::post('/upload/documents', 'Document@upload_documents');
////////////////////////////////// END UPLOAD FILES ///////////////////////////////////////////
///


///////////////////////////////// STAFF MANAGEMENT /////////////////////////////////////////////////


    Route::get('/staffs', 'Staff@get_staffs')->name('staff-list');
    Route::get('/staffs/add', 'Staff@add_staffs')->name('add-staff');
    Route::post('/staff/save', 'Staff@save_staff');
    Route::get('/staffs/edit/{id}', 'Staff@edit_staffs')->name('staff-list');
    Route::get('/staffs/profile/{id}','Staff@view_profile')->name('staff-profile');
    Route::get('/profile/{username}','HomeController@profile')->name('profile');
    Route::get('/staffs/delete/{id}','Staff@delete_staff');
    Route::get('/staffs/leave/requests','Staff@leave_requests')->name('leave-requests');

    Route::get('/my-dashboard','HomeController@dashboard')->name('staff-dashboard');
    Route::get('/my-profile/{id}','Staff@view_my_profile')->name('staff-my-profile');
    Route::get('/my-documents/{document_category}','Staff@view_my_documents')->name('staff-documents');

    Route::get('/my-salaries/{id}','Staff@view_my_salaries')->name('staff-salaries');
    Route::get('/salary/{month_year}','Staff@view_salary_detail')->name('staff-salaries');
    Route::get('/my-commissions/{id}','Staff@view_my_commissions')->name('staff-commissions');
    Route::get('/my-purchase/{id}','Staff@view_my_purchases')->name('staff-purchases');
    Route::get('/purchase/{id}','Staff@view_purchases_detail')->name('staff-purchases');
    Route::get('/commission/{month_year}','Staff@view_commission_detail')->name('staff-commission-detail');
    Route::get('/my-leave/{id}','Staff@view_my_leave')->name('staff-my-leave');
    Route::post('/add/new/leave','Staff@add_new_leave');

    Route::post('/update/staff','Staff@update_staff');

    Route::get('/get/revised-data/{id}','Staff@get_revised_data');

    Route::get('/get/revised-data-by-id/{id}','Staff@get_revised_data_by_id');

    Route::post('/upload/profile/picture','Staff@upload_profile_picture');
    Route::get('/approve/account/{id}','Staff@approve_staff_account');
    Route::get('/suspend/account/{id}','Staff@suspend_staff_account');
    Route::get('/get/activities/{id}','Staff@get_activities');
    Route::post('/leave/status/update','Leave@update_leave_status');
    Route::get('/activities/{id}','LoginActivity@get_activities');
    Route::get('/get/login/activities/{id}','LoginActivity@get_user_login_activities');
    Route::get('/set/permissions/{id}','Staff@set_permissions');
    Route::post('/save/user/permissions','Staff@save_permissions');

////////////////////////////////// END STAFF MANAGEMENT ///////////////////////////////////////////
///
/// ////////////////////////////////// AREA ///////////////////////////////////////////
    Route::get('/new/area/{id}', 'Area@new_area');
    Route::post('/save/area', 'Area@save_area');
    Route::post('/save/session/areas', 'Area@save_session_area');
////////////////////////////////// END AREA////////////////////////////////////
///
////////////////////// DESCRIPTION /////////////////////////////////////////////

    Route::get('/new/description/{id}', 'SessionDescription@new_description');
    Route::post('/save/session/description', 'SessionDescription@save_session_description');
/////////////////////////// END DESCRIPTION ///////////////////////////////////

////////////////////////////////// SENDING EMAIL////////////////////////////////////

    Route::get('/send_credentials', 'EmailSender@send_credentials');


/////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////// PERMISSIONS////////////////////////////////////

    Route::get('/get/permissions/{id}', 'Permission@get_permissions');
    Route::get('/assign/permission/{permission_id}/{user_id}/{status}', 'Permission@save_permission_with_user');
    Route::get('/permissions', 'Permission@set_permissions');

/////////////////////////////////////////////////////////////////////////////////////
///


    ////////////////////////////////// CONSENT FORM FOR PATIENT ////////////////////////////////////

    Route::post('/print/consent/form','Consent@consent_print');
    Route::get('/consent/form/print/{id}','Consent@print_pdf_consent_form');
    Route::post('/delete/consent','Consent@delete_consent_form');
    Route::post('/save/consent/form','Consent@consent_save');
    Route::get('/show/patient/consent/{id}','Consent@show_saved_form');
    Route::get('/patient/show/consent/{patient_id}/{appointment_id}','Consent@show_consent_form');
    Route::get('/patient/lists/consent/{patient_id}/{appointment_id}','Consent@list_consent_form');
    Route::get('/patient/consent/appointment/{appointment_id}','Consent@list_consent_form_by_appointments');
    Route::get('/consent/detail/{id}','Consent@get_detail');
    Route::get('/consent/delete/{id}','Consent@delete_consent');
    Route::get('/get/consent/by/name/{name}','Consent@search_consent_form_by_patient');
    Route::get('/consent-forms','ConsentForm@list_consent_forms')->name('consent-forms');
    Route::get('/consent/download/{id}','ConsentForm@download_pdf');
    Route::post('/edit/consent','Consent@edit_consent_form');
/////////////////////////////////////////////////////////////////////////////////////
///

    ////////////////////////////////// MEDIA ////////////////////////////////////
    Route::post('/add/media','MediaFile@add_media');
    Route::post('/get/media','MediaFile@get_media');
    Route::post('/get/media/list','MediaFile@get_media_as_list');
    Route::post('/get/media/grid','MediaFile@get_media_as_grid');
    Route::post('/upload/media','MediaFile@upload_media');
    Route::get('/media/delete/{id}','MediaFile@delete_media');
    ///


    ////////////////////////////////// Google ////////////////////////////////////
    Route::get('login/{provider}',          'Auth\SocialAccountController@redirectToProvider');

    Route::get('login/{provider}/callback', 'Auth\SocialAccountController@handleProviderCallback');
    Route::post('/import/patient/google', 'Auth\SocialAccountController@import_contacts');


    ////////////////////////////////// Top Search Bar ////////////////////////////////////
    Route::get('/search/patient','Patient@search_patient');
    Route::get('/search/doctors','Doctor@search_doctors');
    Route::get('/search/services','DoctorService@search_services');
    Route::get('/search/clinical','ClinicalDetail@search_clinical');
    Route::get('/search/rooms','Room@search_rooms');
    Route::get('/search/medicals','Medical@get_medical_with_patient');

    ////////////////////////////////// Patient Sessions ////////////////////////////////////
    Route::get('/get/sessions/{id}',          'PatientSession@get_sessions');
    Route::post('/save/appointment/session',          'AppointmentSession@save_sessions');
    ///////////////////////////////////// FOLDERS ////////////////////////////////////

    Route::post('/create/folder','Folder@create_folder');
    Route::get('/delete/folder/{id}','Folder@delete_folder');
    Route::get('/delete/document/{id}','Document@delete_file');
    Route::post('/uploads/document','Document@upload_document');
    Route::post('/get/files','Document@get_document_by_folder');
    ///
    ///
    ///   ///////////////////////////////////// SESSIONS ////////////////////////////////////

    Route::post('/save/sessions','PatientSession@save_session');
    Route::get('/get/sessions/{id}','PatientSession@get_session');
    Route::post('/uploads/document','Document@upload_document');
    Route::post('/update/doctor/session','AppointmentSession@update_session_doctor');
    Route::get('/whatsapp','HomeController@whatsapp');

    Route::get('/shopify/authorize','ShopifyController@getResponse');
    Route::get('/shopify', 'ShopifyController@getPermission');
    ///

    ///   ///////////////////////////////////// DRUG ALLERGIES ////////////////////////////////////
    Route::get('/drug-allergies', 'DrugAllergy@allergies')->name('drug_allergies');
    Route::get('/get/allergies', 'DrugAllergy@all_allergies');
    Route::post('/update/allergies','DrugAllergy@update_allergy');
    Route::post('/save/allergy','DrugAllergy@save_allergy');
    Route::get('/delete/allergy/{id}','DrugAllergy@delete_allergy');
    Route::get('/get/allergy/{id}','DrugAllergy@get_allergy');



    ///   ///////////////////////////////////// DRUG ALLERGIES ////////////////////////////////////

    /// //////////////////////////////////////// TOOTH AREAS /////////////////////////////////////
    Route::get('/tooth-areas', 'ToothArea@areas')->name('tooth_area');
    Route::get('/get/tooth-area/{id}', 'ToothArea@get_area_id');
    Route::post('/update/tooth-areas','ToothArea@update_tooth');
    Route::post('/save/tooth-areas','ToothArea@save_tooth');
    Route::get('/delete/tooth-areas/{id}','ToothArea@delete_tooth');
    Route::get('/get/search/tooth','ToothArea@get_tooth_by_search');

    /////////////////////////////////////////// END TOOTH AREAS /////////////////////////////////

    /// //////////////////////////////////////// Pre Medicals /////////////////////////////////////
    Route::get('/pre-medicals', 'PreMedical@pre_medicals')->name('pre_medicals');
    Route::get('/get/pre-medicals', 'PreMedical@all_pre_medicals');
    Route::post('/update/pre-medicals','PreMedical@update_pre_medicals');
    Route::post('/save/pre-medicals','PreMedical@save_pre_medicals');
    Route::get('/delete/pre-medicals/{id}','PreMedical@delete_pre_medicals');
    Route::get('/get/medications/{id}','PreMedical@get_medications');
    Route::get('/get/medications/by/name/{name}','PreMedical@get_pre_medicals_by_name');

    /////////////////////////////////////////// END TOOTH AREAS /////////////////////////////////

    /// //////////////////////////////////////// TREATMENT CARD /////////////////////////////////////
    ///
    Route::post('/get/form/element', 'HomeController@get_elements');
    Route::get('/search/treatment-card/data/','Treatment@get_search_treatment_card_data');
    Route::post('/save/treatment/description','Treatment@save_treatement_description');
    Route::get('/treatment-card-settings','HomeController@treatment_card_settings');
    Route::get('/treatment-card-settings/load/{type}','HomeController@load_treatment_type');
    Route::post('/flag/add','PatientFlag@save_flag');
    Route::get('/patient-flags/delete/{id}','PatientFlag@delete_flag');
    Route::get('/patient-flags/get/{id}','PatientFlag@get_flag');
    Route::get('/get/treatment/item/{tab}','Treatment@get_treatment_items');
    Route::get('/print/treatment-card/{id}');
    /// //////////////////////////////////////// END TREATMENT CARD /////////////////////////////////////

    /////////////////// MESSAGES ////////////////////////////
    Route::get('/messages','UserMessage@get_user_messages')->name('messages');
    Route::get('/message/read/{id}','UserMessage@read_messages')->name('read-messages');
    Route::get('/message/compose','UserMessage@compose_messages')->name('compose-messages');
    Route::get('/message/reply/{slug}','UserMessage@reply_message')->name('reply-messages');
    Route::post('/send/message','UserMessage@send_message')->name('send-message');
    Route::post('/load/messages','UserMessage@load_messages');
    ////////////////////// END MESSAGES ////////////////////////
    Route::get('/referrals','Patient@referral_tree');
 //   Route::get('/activities','LoginActivity@user_activities');

    //////////////// BRANDS /////////////////////////////////////
    Route::post('/save/brand','MedicationBrand@save_brand');
    Route::get('/view/brands','MedicationBrand@get_brands');
    ///


    //////////////// BRANDS /////////////////////////////////////
    Route::post('/save/category','MedicationCategory@save_category');
    Route::get('/view/categories','MedicationCategory@get_categories');
    Route::get('/get/subcategories/{id}','MedicationCategory@get_sub_categories');
    ///

    //////////////// INVOICES /////////////////////////////////////
    Route::post('/generate/invoice','Invoice@load_invoice_template');
    Route::get('/download/invoice/{id}','Invoice@download_invoice');
    ///

    //////////////// Materials /////////////////////////////////////
    Route::post('/material/save','Material@save_material');
    Route::get('/materials','Material@get_materials')->name('materials');
    Route::get('/get/material/{id}','Material@get_material_by_id');
    Route::get('/delete/material/{id}','Material@delete_material');

    ///
    //////////////// Labs /////////////////////////////////////
    Route::post('/lab/save','Lab@save_lab');
    Route::get('/labs','Lab@get_labs')->name('labs');
    Route::get('/get/lab/{id}','Lab@get_lab_by_id');
    Route::get('/delete/lab/{id}','Lab@delete_lab');


    Route::post('/save/invoice','Invoice@save_invoice');
    Route::get('/get/patient/invoices/{id}','Invoice@get_patient_invoices');

    ////////////////////// MANUFATURES ////////////////////////////////////
    Route::get('/menufactures','Manufacture@manufactures_list')->name('menufactures');
    Route::post('/save/manufactures','Manufacture@save_manufactures');
    Route::get('/manufature/edit/{id}','Manufacture@edit_manufactures');
    Route::get('/manufature/delete/{id}','Manufacture@delete_manufactures');
    ////////////////////// MEETINGS ////////////////////////////////////
    Route::get('/zoom-meetings','CRMZoomMeeting@zoom_meetings')->name('zoom-meetings');
    Route::get('/zoom-configuration','CRMZoomMeeting@zoom_configuration')->name('zoom-configuration');
    Route::get('/zoom/auth','CRMZoomMeeting@zoom_auth')->name('zoom-auth');

    //////////////////////////// EXPORTS /////////////////////
    Route::get('/export/data','ExportData@export_data')->name('export_data');
    Route::post('/get/export/data','ExportData@get_export_data')->name('get_export_data');
    ////////////////////////// END EXPORT ///////////////////
    ///


    ///////////////////////////// ACCOUNT MANAGEMENS ///////////////////////////////////
    Route::get('/sales','AccountManagement@sales')->name('sales');
    Route::get('/sale/new','AccountManagement@new_sale')->name('new_sale');
    Route::get('/expense/new','AccountManagement@new_expense')->name('new_expense');

    Route::get('/expenses','AccountManagement@expenses')->name('expenses');
    Route::get('/expense/new','AccountManagement@new_expense')->name('new_expense');
    Route::post('/view/expense/detail','Expense@view_expense');
    Route::get('/download/expense/pdf/{id}','Expense@download_expense_pdf');
    //////////////////////////////////// END ACCOUNT MANAGEMENT ///////////////////////


    ///////////////////////////////////// SALE ////////////////////////////////////////
    Route::post('/save/sale','Sale@save_sale');
    Route::post('/view/sale/detail','Sale@view_sale');
    Route::get('/download/sale/pdf/{id}','Sale@download_sale_pdf');
    Route::post('/save/expense','Expense@save_expense');

    ///////////////////////////////////// END SALE ////////////////////////////////////

    //////////////////////////// PURCAHSE ORDERS ////////////////////////////////////////
    Route::post('/save/purchase/order','PurchaseOrder@save_order');
    Route::post('/get/order/items','PurchaseOrder@get_order_items');
    Route::get('/order/delete/{id}','PurchaseOrder@delete_order');
    Route::get('/order/edit/{id}','PurchaseOrder@purchase_orders_edit');
    Route::get('/download/purchase/order/{id}','PurchaseOrder@download_purchase_order');

    ////////////////////////////// END PURCAHSE ORDER ////////////////////////////////////




    //////////////////////////////////////////// SUPPLAIR ////////////////////////////////////////////
    Route::get('/suppliers','Supplier@suppliers');
    Route::post('//save/supplier','Supplier@save_supplier');
    Route::get('/supplier/edit/{id}','Supplier@edit_supplier');
    Route::get('/supplier/delete/{id}','Supplier@delete_supplier');

    /////////////////////////////////////////// END SUPPLIER ////////////////////////////////////////


    //////////////////////////////////////////// CUSTOMERS ////////////////////////////////////////////
    Route::get('/customers','Customer@customers');
    Route::post('//save/customer','Customer@save_customer');
    Route::get('/customer/edit/{id}','Customer@edit_customer');
    Route::get('/customer/delete/{id}','Customer@delete_customer');

    /////////////////////////////////////////// END SUPPLIER ////////////////////////////////////////


    ////////////////////////////////// REPORTS /////////////////////////////////
    Route::get('/inventory/reports/sale', 'Report@sale_report')->name('pharmacy-sale-report');
    Route::get('/inventory/reports/purchase', 'Report@purchase_report')->name('pharmacy-purchase-report');
    Route::get('/inventory/reports/expenses', 'Report@expense_report')->name('pharmacy-expense-report');
    Route::get('/inventory/reports/drug/usage', 'Report@drug_usage_report')->name('pharmacy-drug-usage-report');
    Route::get('/inventory/reports/drug/stock', 'Report@drug_stock_report')->name('pharmacy-drug-stock');
    Route::get('/inventory/reports/drug/low/stock', 'Report@drug_low_stock_report')->name('pharmacy-low-drug-stock');
    Route::get('/inventory/reports/drug/low/expiry', 'Report@drug_expiry_date_report')->name('pharmacy-low-drug-expiry');
    Route::get('/inventory/daily/collections', 'Report@daily_collections')->name('pharmacy-daily-collections');
    Route::get('/inventory/monthly/collections', 'Report@monthly_collections')->name('pharmacy-monthly-collections');
    /////////////////////////////// END REPORTS ////////////////////////////////

    ////////////////////////////////////////////////////////////////CONTACT DATA /////////////////////////////
    Route::get('/mycontacts','MyContact@contacts')->name('my-contacts');
    Route::get('/get/google/authurl','MyContact@getAuthURL');
    Route::get('/importgoogle','MyContact@importGoogleContact');
    Route::post('/save/contact','MyContact@save_contact');
    Route::post('/get/contact/json','MyContact@get_contact_json');
    Route::post('/delete/contact','MyContact@delete_contact');
    //////////////////////////////////////END CONTACT DATA ////////////////////////////////////////


    /////////////////////// HOSPITALS ///////////////
    Route::get("/hospitals",'Hospital@hospitals');
    Route::get('/new/hospital','Hospital@new');
    Route::post('/hospital/save','Hospital@save');
    Route::get('/hospital/edit/{id}','Hospital@edit');
    Route::get('/hospital/view/{id}','Hospital@view');
    Route::get('/hospital/summary/reports','Hospital@report_summary');
    Route::get('/hospital/income/summary/reports','Hospital@report_income_summary');

    Route::get('/admin/users','AdminUser@users');
    Route::get('/patient/flags','Hospital@patient_flags');
    Route::get('/patient/anatomical-location','Hospital@anatomical_areas');
    ////////////// END HOSPITALS ///////////////////////


});