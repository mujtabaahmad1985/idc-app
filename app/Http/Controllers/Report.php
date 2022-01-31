<?php

namespace App\Http\Controllers;

use App\Expenses;
use App\Helpers\CommonMethods;
use App\Products;
use App\PurchaseOrders;
use App\SaleItems;
use App\Sales;
use App\SessionItems;
use App\Suppliers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;

class Report extends Controller
{
    //
    private $today;
    private $last_week;
    private $last_month;
    private $last_year;


    public function __construct(){
        $this->today =     \Carbon\Carbon::today()->format('Y-m-d');
        $this->last_week =  \Carbon\Carbon::today()->subDays(7)->format('Y-m-d');
        $this->last_month = Carbon::today()->subMonth(1)->format('Y-m-d');
        $this->last_year = Carbon::today()->subYear(1)->format('Y-m-d');
    }
    public function sale_report(){

        // echo DNS2D::getBarcodeHTML('mujtaba', 'QRCODE',3,3);
        // echo DNS1D::getBarcodeHTML('4445645656', 'C39');

        // exit;

      //  $last_7_date = \Carbon\Carbon::today()->subDays(7);

        $total_sale = DB::table('sales')
            ->select(DB::raw(' count(*) as sale_count'))
            ->where('hospital_id',CommonMethods::getHopsitalID())
            ->get()->toArray();

        $total_revenue = DB::table('sales')
            ->select(DB::raw(' sum(grand_total) as sale_amount'))
            ->where('hospital_id',CommonMethods::getHopsitalID())
            ->get()->toArray();

        $total_expense = DB::table('expenses')
            ->select(DB::raw(' sum(grand_total) as expense_amount'))
            ->where('hospital_id',CommonMethods::getHopsitalID())
            ->get()->toArray();

        $last_year_month_wise_sale = DB::table('sales')
            ->select(DB::raw(' sum(grand_total) as sale_amount'),DB::raw('MONTHNAME(created_at) as month_name'))
            ->where('created_at','>=',$this->last_year)
            ->groupBy(DB::raw('MONTHNAME(created_at)'))
            ->where('hospital_id',CommonMethods::getHopsitalID())
            ->get();

        if((request()->get('for')=="sale" || request()->get('for')=="") && (request()->get('q')=="today" || request()->get('q')==""))
        $sales = Sales::where('created_at','>=',$this->today)->where('hospital_id',CommonMethods::getHopsitalID())->get();
        if((request()->get('for')=="sale") && (request()->get('q')=="week" ))
            $sales = Sales::where('created_at','>=',$this->last_week)->where('hospital_id',CommonMethods::getHopsitalID())->get();





        $d = [
            'total_sale'=>isset($total_sale[0])?$total_sale[0]->sale_count:0,

            'total_revenue'=>isset($total_revenue[0])?$total_revenue[0]->sale_amount:0,
            'total_expense'=>isset($total_expense[0])?$total_expense[0]->expense_amount:0,
            'month_wise_sale' =>$last_year_month_wise_sale,
            'sales' => $sales,
        ];
        return view('reports.report',$d);
    }

    public function expense_report(){

        // echo DNS2D::getBarcodeHTML('mujtaba', 'QRCODE',3,3);
        // echo DNS1D::getBarcodeHTML('4445645656', 'C39');

        // exit;

        //  $last_7_date = \Carbon\Carbon::today()->subDays(7);

        $total_expense = DB::table('expenses')
            ->select(DB::raw(' count(grand_total) as expense_count'))
            ->where('hospital_id',CommonMethods::getHopsitalID())
            ->get()->toArray();
      ;



        $total_expense_amount = DB::table('expenses')
            ->select(DB::raw(' sum(grand_total) as expense_amount'))
            ->where('hospital_id',CommonMethods::getHopsitalID())
            ->get()->toArray();

        $total_expense_amount_by_category = DB::table('expenses')
            ->select(DB::raw(' sum(grand_total) as expense_amount'),'category.name as category_name')
            ->join('expense_categories as category','category.id','=','expenses.category_id')
            ->where('expenses.hospital_id',CommonMethods::getHopsitalID())
            ->groupBy('category_id')
            ->get();
     //   dd($total_expense_amount_by_category);

        $last_year_month_wise_expense = DB::table('expenses')
            ->select(DB::raw(' sum(grand_total) as expense_amount'),DB::raw('MONTHNAME(created_at) as month_name'))
            ->where('created_at','>=',$this->last_year)
            ->groupBy(DB::raw('MONTHNAME(created_at)'))
            ->where('expenses.hospital_id',CommonMethods::getHopsitalID())
            ->get();


        if((request()->get('for')=="expense" || request()->get('for')=="") && (request()->get('q')=="today" || request()->get('q')==""))
            $expenses = Expenses::where('created_at','>=',$this->today)->where('hospital_id',CommonMethods::getHopsitalID())->get();
        if((request()->get('for')=="expense") && (request()->get('q')=="week" ))
            $expenses = Expenses::where('created_at','>=',$this->last_week)->where('hospital_id',CommonMethods::getHopsitalID())->get();





        $d = [
            'total_expense'=>isset($total_expense[0])?$total_expense[0]->expense_count:0,


            'total_expense_amount'=>isset($total_expense[0])?$total_expense_amount[0]->expense_amount:0,
            'month_wise_expenses' =>$last_year_month_wise_expense,
            'expenses' => $expenses,
            'expenses_per_categories' =>$total_expense_amount_by_category
        ];
        return view('reports.expense-report',$d);
    }

    public function purchase_report (){

        // echo DNS2D::getBarcodeHTML('mujtaba', 'QRCODE',3,3);
        // echo DNS1D::getBarcodeHTML('4445645656', 'C39');

        // exit;

        //  $last_7_date = \Carbon\Carbon::today()->subDays(7);

        $total_purchase = DB::table('orders')
            ->select(DB::raw(' count(total_price) as total_purchase'))
            ->where('orders.hospital_id',CommonMethods::getHopsitalID())
            ->get()->toArray();
        ;




        $total_purchase_amount =DB::table('orders')
            ->select(DB::raw(' sum(total_price) as total_purchase'))
            ->where('orders.hospital_id',CommonMethods::getHopsitalID())
            ->get()->toArray();

        $total_supplier = Suppliers::whereNull('deleted_at')->where('hospital_id',CommonMethods::getHopsitalID())->get()->count();

        $cost_per_manufactures = "";

        $total_purchase_by_manufactures= DB::table('orders')
            ->select(DB::raw(' sum(total_price) as total_price'),'manufacture.name as manufacture_name')
            ->join('manufactures as manufacture','manufacture.id','=','orders.manufacturer_id')
            ->where('orders.hospital_id',CommonMethods::getHopsitalID())
            ->groupBy('manufacturer_id')
            ->get();

        $total_purchase_per_products= DB::table('orders')
            ->select(DB::raw(' sum(items.total_price) as total_prices'),'item_name')
            ->join('order_items as items','items.order_id','=','orders.id')
            ->where('orders.hospital_id',CommonMethods::getHopsitalID())
            ->groupBy('item_name')
            ->orderBy('total_prices','DESC')

            ->get()->take(5);


        $last_year_month_wise_expense = DB::table('expenses')
            ->select(DB::raw(' sum(grand_total) as expense_amount'),DB::raw('MONTHNAME(created_at) as month_name'))
            ->where('created_at','>=',$this->last_year)
            ->where('expenses.hospital_id',CommonMethods::getHopsitalID())
            ->groupBy(DB::raw('MONTHNAME(created_at)'))

            ->get();


        if((request()->get('for')=="purchase" || request()->get('for')=="") && (request()->get('q')=="today" || request()->get('q')==""))
            $orders =PurchaseOrders::where('created_at','>=',$this->today)->where('hospital_id',CommonMethods::getHopsitalID())->get();
        if((request()->get('for')=="purchase") && (request()->get('q')=="week" ))
            $orders = PurchaseOrders::where('created_at','>=',$this->last_week->where('hospital_id',CommonMethods::getHopsitalID()))->get();





        $d = [
            'total_purchase'=>isset($total_purchase[0])?$total_purchase[0]->total_purchase:0,


            'total_purchase_amount'=>isset($total_purchase_amount[0])?$total_purchase_amount[0]->total_purchase:0,
            'total_suppliers'=>$total_supplier,
            'month_wise_expenses' =>$last_year_month_wise_expense,
            'orders' => $orders,
            'total_purchase_per_manufatures' =>$total_purchase_by_manufactures,
            'total_price_per_item' => $total_purchase_per_products
        ];
        return view('reports.purchase-report',$d);
    }

    public function drug_usage_report(){

        //$items_from_sessions = SessionItems::with('products')->select('products.product_title')->whereNull('deleted_at')->groupBy('product_id')->get()->take(20)->toArray();
        $items_from_sessions= DB::table('session_items')
            ->select(DB::raw(' count(session_items.product_id) as item_name_count'),'product_title as item_name')
            ->join('products as product','product.id','=','session_items.product_id')
            ->where('session_items.hospital_id',CommonMethods::getHopsitalID())
            ->groupBy('item_name')
            ->orderBy('item_name_count','DESC')
            ->get()->take(50)->toArray();
        $items_from_sessions  = json_decode(json_encode($items_from_sessions),true);
        $item_sold = SaleItems::select(DB::raw(' count(item_name) as item_name_count'),'item_name')->whereNull('deleted_at')->groupBy('item_name')->orderBy('item_name_count','DESC')->get()->take(50)->toArray();

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

            return view('reports.drug-usage-report',$d);
    }

    public function drug_stock_report(){
        $products = Products::whereNull('deleted_at')->orderBy('product_title')->where('hospital_id',CommonMethods::getHopsitalID())->get();
        return view('reports.products',['products'=>$products]);
    }

    public function drug_low_stock_report(){
        $products = Products::whereNull('deleted_at')->whereRaw('in_stock <= quantity_signal')->orderBy('product_title')->where('hospital_id',CommonMethods::getHopsitalID())->get();
        return view('reports.products',['products'=>$products]);
    }

    public function drug_expiry_date_report(){
        $expirty_till_date = Carbon::now()->addMonth(2);
        $products = DB::table('products')
            ->select('products.id as product_id','product_title','expiry_date','brand_name')
            ->join('product_purchases as product_purchase','product_purchase.product_id','=','products.id')
            ->join('medication_brands as brand','brand.id','=','products.brand_id')
            ->where('product_purchase.expiry_date','<=',$expirty_till_date)
            ->where('products.hospital_id',CommonMethods::getHopsitalID())
            ->where('product_purchase.expiry_date','>',Carbon::now())
            ->groupBy('product_purchase.product_id')
            ->get();


        return view('reports.expiry-products',['products'=>$products]);
    }

    public function daily_collections(){
        $sales = Sales::where('created_at','>=',$this->today)->where('hospital_id',CommonMethods::getHopsitalID())->get();
        return view('reports.collections',['sales'=>$sales]);
    }

    public function monthly_collections(){
        $sales = Sales::where('created_at','>=',$this->last_month)->where('hospital_id',CommonMethods::getHopsitalID())->get();
        $last_week_sales = DB::table('sales')
            ->select(DB::raw(' sum(grand_total) as sale_amount'),DB::raw('DAYNAME(created_at) as day_name'))
            ->where('created_at','>=',$this->last_week)
            ->where('hospital_id',CommonMethods::getHopsitalID())
            ->groupBy(DB::raw('DAYNAME(created_at)'))
            ->get();

        return view('reports.collections',['sales'=>$sales,'last_week_sales'=>$last_week_sales]);
    }

}
