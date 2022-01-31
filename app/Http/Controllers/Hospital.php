<?php

namespace App\Http\Controllers;

use App\Appointments;
use App\Helpers\CommonMethods;
use App\Hospitals;
use App\PatientFlags;
use App\Patients;
use App\SaleItems;
use App\SendEmail;
use App\ToothAreas;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Validator;
use File;
use DB;

class Hospital extends Controller
{
    //

    public function hospitals(){
        $hospitals = Hospitals::paginate(50);

        return view('hospitals.hospitals',['hospitals'=>$hospitals]);
    }

    public function new(){

        return view('hospitals.hospital-form');
    }

    public function edit($id){
        $hospital = Hospitals::find($id);
        return view('hospitals.hospital-form',['hospital'=>$hospital]);
    }

    public function save(Request $request){
        $id = $request->id;

        if(empty($id)){
            $hospital = new Hospitals();
            $validator = Validator::make($request->all(), [
                'email' => 'unique:users',

            ]);
            if ($validator->fails()) {

                $error = $validator->errors()->all();
                echo json_encode(array('type' => 'error', 'message' => $error));
                exit;
            }
            $password = Str::random(12);
            $user = new User();
            $user->email = $request->email;
            $user->name = Str::slug($request->name);

            $user->password =  bcrypt($password);
            $user->status = 'approved';
            $user->role = 'hospital-administrator';
            $user->save();
            $u_id = $user->id;
            $hospital->user_id = $u_id;
            $hospital->status = 1;
            SendEmail::send_credentials($request->first_name.' '.$request->last_name,$request->email, $password,$user->id);
        } else
            $hospital = Hospitals::find($id);

        $hospital->hospital_name = $request->name;
        $hospital->hospital_type = $request->hospital_type;
        $hospital->address = $request->address;
        $hospital->summary = $request->summary;
        $hospital->phone = $request->phone_number;
        $hospital->facebook_url = $request->facebook_url;
        $hospital->linkedin_url = $request->linkedin_url;
        $hospital->web_url = $request->web_url;

        if($request->hasFile('logo')){
            $profile_image = $request->file('logo');



            $file_name = Str::slug($request->name)."-logo".'-'.time();
            $extension = $profile_image->getClientOriginalExtension();



            Storage::disk('images')->put($file_name.'.'.$extension,  File::get($profile_image));
            $hospital->logo = $file_name.'.'.$extension;
            //END Check Validity
        }

        $hospital->save();

        $id = $hospital->id;

        if($id > 0){
            echo json_encode(array(
                'type' => 'success',
                'message' => 'Hospital added successfully.'
            ));
        }else{
            echo json_encode(array(
                'type' => 'error',
                'message' => 'Some problem in hospital submitting, try again.'
            ));
        }


    }

    public function view($id){

        $months = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December'
        ];

        $hospital = Hospitals::find($id);
        $sale_ = [];
        $last_year_month_wise_sale = DB::table('sales')
            ->select(DB::raw(' sum(grand_total) as sale_amount'),DB::raw('MONTHNAME(created_at) as month_name'))

            ->where('created_at','>=',Carbon::today()->subYear(1)->format('Y-m-d'))

            ->where('hospital_id',$hospital->user_id)
            ->get();
        $patients = [];
        $appointments = [];

        $patient_appointments = [];






        $last_year_month_wise_patients = DB::table('patients')
            ->select(DB::raw(' count(id) as total_patient'),DB::raw('MONTHNAME(created_at) as month_name'))

            ->where('created_at','>=',Carbon::today()->subYear(1)->format('Y-m-d'))

            ->where('hospital_id',$hospital->user_id)
            ->groupBy('month_name')
            ->get();

        $last_year_month_wise_appointments = DB::table('appointments')
            ->select(DB::raw(' count(id) as total_appointments'),DB::raw('MONTHNAME(created_at) as month_name'))

            ->where('created_at','>=',Carbon::today()->subYear(1)->format('Y-m-d'))

            ->where('hospital_id',$hospital->user_id)
            ->groupBy('month_name')
            ->get();




        if(isset($last_year_month_wise_patients) && $last_year_month_wise_patients->count() > 0){
            foreach($last_year_month_wise_patients as $patient){
                $patients[ucwords($patient->month_name)] = $patient->total_patient;

            }
        }

        if(isset($last_year_month_wise_appointments) && $last_year_month_wise_appointments->count() > 0){
            foreach($last_year_month_wise_appointments as $appointment){
                $appointments[ucwords($appointment->month_name)] = $appointment->total_appointments;

            }
        }



        if(isset($last_year_month_wise_sale) && $last_year_month_wise_sale->count() > 0){
            foreach($last_year_month_wise_sale as $sale){
                $sale_[ucwords($sale->month_name)] = $sale->sale_amount;

            }
        }








        $last_year_month_wise_expense = DB::table('expenses')
            ->select(DB::raw(' sum(grand_total) as expenses_amount'),DB::raw('MONTHNAME(created_at) as month_name'))

            ->where('created_at','>=',Carbon::today()->subYear(1)->format('Y-m-d'))

            ->where('hospital_id',$hospital->user_id)
            ->get();

        $expense_ = [];
        if(isset($last_year_month_wise_expense) && $last_year_month_wise_expense->count() > 0){
            foreach($last_year_month_wise_expense as $expense){
                $expense_[ucwords($expense->month_name)] = $expense->expenses_amount;

            }
        }

        $s_m = [];

        foreach($months as $month){
            $s_m[$month]['expense'] = isset($expense_[$month])?$expense_[$month]:0;
        }

        foreach($months as $month){
            $s_m[$month]['sale'] = isset($sale_[$month])?$sale_[$month]:0;
        }

        foreach($months as $month){
            $patient_appointments[$month]['appointments'] = isset($appointments[$month])?$appointments[$month]:0;
        }

        foreach($months as $month){
            $patient_appointments[$month]['patients'] = isset($patients[$month])?$patients[$month]:0;
        }

        $patients = Patients::whereNull('deleted_at')->where('hospital_id',CommonMethods::getHopsitalID())->orderBy('created_at','DESC')->get()->take(50);





        return view('hospitals.hospital-view',['hospital'=>$hospital,'anually_sale_expense_report'=>$s_m,'annually_patients_appointments'=>$patient_appointments,'patients'=>$patients]);
    }

    public function report_summary(){

        $months = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December'
        ];

        $id = request()->get('hospital-id');
        $hospital = null;
        $patient_array_visited = null;
        $patient_array = null;
        $most_used_services = null;
        $p = null;
        $v = null;
        if(!empty($id)){
            $hospital = Hospitals::find($id);


                $month_wise_hosptial_data = DB::table('patients')
                ->select(DB::raw(' count(id) as total_patient'),DB::raw('MONTHNAME(created_at) as month_name'))
                ->where('created_at','>=',Carbon::today()->subYear(1)->format('Y-m-d'))
                ->groupBy(DB::raw('MONTHNAME(created_at)'))
                ->where('patients.hospital_id',$hospital->user_id)
                ->get();


            if(isset($month_wise_hosptial_data) && $month_wise_hosptial_data->count() > 0){
                foreach($month_wise_hosptial_data as $patient){
                    $p[ucwords($patient->month_name)] = $patient->total_patient;
                }
            }

            foreach($months as $month){
                $patient_array[$month] = isset($p[$month])?$p[$month]:0;
            }


            $last_year_month_patients_visited = DB::table('appointments')
                ->select(DB::raw(' count(id) as patients'),DB::raw('MONTHNAME(updated_at) as month_name'))
                ->where('updated_at','>=',Carbon::today()->subYear(1)->format('Y-m-d'))
                ->whereIn('status',['completed','pending'])
                ->where('hospital_id',$hospital->user_id)
                ->groupBy(DB::raw('MONTHNAME(updated_at)'))
                ->get();

            $most_used_services = DB::table('appointments')
                ->select(DB::raw(' count(service) as services'),DB::raw('(service_name) as service_name'))
                ->join('doctor_services as services','services.id','=','appointments.service')
                ->whereIn('status',['completed','pending'])
                ->where('appointments.hospital_id',$hospital->user_id)
                ->groupBy('appointments.service')
                ->orderBy('services','DESC')
                ->get()->take(10);

            if(isset($last_year_month_patients_visited) && $last_year_month_patients_visited->count() > 0){
                foreach($last_year_month_patients_visited as $patient){
                    $v[ucwords($patient->month_name)] = $patient->patients;
                }
            }

            foreach($months as $month){
                $patient_array_visited[$month] = isset($v[$month])?$v[$month]:0;
            }



           // $appointments = Appointments::select(DB::raw(' count(id) as appoinments'))->where('hospital_id',$hospital->user_id)->whereIn('status',['completed','pending'])->groupBy('service')->get();



        }



        return view('hospitals.hospital-summary',['hospital'=>$hospital, 'patients'=>$patient_array,'most_used_services'=>$most_used_services,'visited_patients'=>$patient_array_visited]);
    }

    public function report_income_summary(){

        $months = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December'
        ];

        $id = request()->get('hospital-id');
        $hospital = null;
        $patient_array_visited = null;
        $sale_array = null;
        $most_used_services = null;
        $p = null;
        $v = null;
        $invoice = null;
        $invoice_array = null;
        $this_month =NULL;
        $last_year_month_wise_sale = null;
        $s =null;
        if(!empty($id)){
            $hospital = Hospitals::find($id);


            $last_year_month_wise_sale = DB::table('sales')
                ->select(DB::raw(' sum(grand_total) as sale_amount'),DB::raw('MONTHNAME(created_at) as month_name'))
                ->where('created_at','>=',Carbon::today()->subYear(1)->format('Y-m-d'))
                ->groupBy(DB::raw('MONTHNAME(created_at)'))
                ->where('hospital_id',$hospital->user_id)
                ->get();


            if(isset($last_year_month_wise_sale) && $last_year_month_wise_sale->count() > 0){
                foreach($last_year_month_wise_sale as $sale){
                    $p[ucwords($sale->month_name)] = $sale->sale_amount;
                }
            }

            foreach($months as $month){
                $sale_array[$month] = isset($p[$month])?$p[$month]:0;
            }




            $last_year_month_patients_visited = DB::table('appointments')
                ->select(DB::raw(' count(id) as patients'),DB::raw('MONTHNAME(updated_at) as month_name'))
                ->where('updated_at','>=',Carbon::today()->subYear(1)->format('Y-m-d'))
                ->whereIn('status',['completed','pending'])
                ->where('hospital_id',$hospital->user_id)
                ->groupBy(DB::raw('MONTHNAME(updated_at)'))
                ->get();

            $most_used_services = DB::table('appointments')
                ->select(DB::raw(' count(service) as services'),DB::raw('(service_name) as service_name'))
                ->join('doctor_services as services','services.id','=','appointments.service')
                ->whereIn('status',['completed','pending'])
                ->where('appointments.hospital_id',$hospital->user_id)
                ->groupBy('appointments.service')
                ->orderBy('services','DESC')
                ->get()->take(10);

            $last_six_month_invoice = $hospital->last_six_monthtotal_incvoices;

            if(isset($last_six_month_invoice) && $last_six_month_invoice->count() > 0){
                foreach($last_six_month_invoice as $inc){
                    $invoice[ucwords($inc->month_name)] = $inc->invoices;
                }
            }

            foreach($months as $month){
                $invoice_array[$month] = isset($invoice[$month])?$invoice[$month]:0;
            }


            if(isset($last_year_month_patients_visited) && $last_year_month_patients_visited->count() > 0){
                foreach($last_year_month_patients_visited as $patient){
                    $v[ucwords($patient->month_name)] = $patient->patients;
                }
            }

            foreach($months as $month){
                $patient_array_visited[$month] = isset($v[$month])?$v[$month]:0;
            }


            $this_month = DB::table('sales')
                ->select(DB::raw(' sum(grand_total) as sale_amount'))
                ->where('created_at','>=',Carbon::today()->subMonth(1)->format('Y-m-d'))

                ->where('hospital_id',$hospital->user_id)

                ->get();
         //   dump(Carbon::today()->subMonth(1)->format('Y-m-d'));
         //   dd($this_month);

            $last_year_month_wise_sale = DB::table('sales')
                ->select(DB::raw(' sum(grand_total) as sale_amount'))
                ->where('created_at','>=',Carbon::today()->subYear(1)->format('Y-m-d'))

                ->where('hospital_id',$hospital->user_id)
                ->get();


            $items_from_sessions= DB::table('session_items')
                ->select(DB::raw(' count(session_items.product_id) as item_name_count'),'product_title as item_name')
                ->join('products as product','product.id','=','session_items.product_id')
                ->where('session_items.hospital_id',$hospital->user_id)
                ->groupBy('item_name')
                ->orderBy('item_name_count','DESC')
                ->get()->take(50)->toArray();
            $items_from_sessions  = json_decode(json_encode($items_from_sessions),true);
            $item_sold = SaleItems::select(DB::raw(' count(item_name) as item_name_count'),'item_name')->where('hospital_id',$hospital->user_id)->whereNull('deleted_at')->groupBy('item_name')->orderBy('item_name_count','DESC')->get()->take(50)->toArray();

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


            $d = [
                'most_drug_usage' => $s
            ];








            // $appointments = Appointments::select(DB::raw(' count(id) as appoinments'))->where('hospital_id',$hospital->user_id)->whereIn('status',['completed','pending'])->groupBy('service')->get();



        }



        return view('hospitals.hospital-income-summary',['hospital'=>$hospital, 'patients'=>$sale_array,'most_used_services'=>$most_used_services,
            'visited_patients'=>$patient_array_visited,'this_month'=>$this_month,'last_year_month_wise_sale'=>$last_year_month_wise_sale,
            'most_drug_usage' => $s,'invoice_array'=>$invoice_array
        ]);
    }

    public function patient_flags(){
        $flags = PatientFlags::where('hospital_id',CommonMethods::getHopsitalID())->get();

        return view('crm-configuration.patient-flags.patient-flags',['flags'=>$flags]);
    }

    public function anatomical_areas(){
        $tooth_areas = ToothAreas::where('hospital_id',CommonMethods::getHopsitalID())->get();

        return view('crm-configuration.tooth-area.get-tooth-areas',['tooth_areas'=>$tooth_areas]);
    }
}
