<?php

namespace App\Http\Controllers;

use App\Helpers\CommonMethods;
use App\MedicationBrands;
use App\MedicationCategories;
use App\ProductPurchases;
use App\Products;
use App\SessionItems;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Milon\Barcode\DNS1D;
use Milon\Barcode\DNS2D;

class Product extends Controller
{
    //

    public function show_products(){
        $products = Products::whereNull('deleted_at')->orderBy('product_title')->where('hospital_id',CommonMethods::getHopsitalID())->get();
        $brands = MedicationBrands::whereNull('deleted_at')->where('hospital_id',CommonMethods::getHopsitalID())->get();
        $categories = MedicationCategories::whereNull('deleted_at')->where('hospital_id',CommonMethods::getHopsitalID())->where('parent_id',0)->get();

        return view('products.products',['products'=>$products,'brands'=>$brands,'categories'=>$categories]);
    }

    public function save_product(Request $request){
        $product = new Products();

        $product->product_title = $request->product_title;
        $product->product_code = $request->product_code;
        $product->quantity= $request->quantity;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->hospital_id = CommonMethods::getHopsitalID();

        if ($request->hasFile('featured_image')) {
            if ($request->file('featured_image')->isValid()) {
                //
                $file = $request->file('featured_image');
                $image_name = time() . "." . $file->getClientOriginalExtension();
                $original_name = $file->getClientOriginalName();
                $file->move('public/uploads/products/', $image_name);
                //  dd($file);
                $product->featured_picture = $image_name;

            }
        }
        $product->cuser = Auth::id();
        $product->save();

        $p_id = $product->id;

        if ($p_id > 0) {
            $type = empty($id)?"success":"update";
            echo json_encode(array(
                'type' => $type,
                'message' => 'Product is added successfully. you can view in listing.'
            ));
        } else {
            echo json_encode(array(
                'type' => 'error',
                'message' => 'Some problem in product submitting, try again.'
            ));
        }
    }

    public function update_product(Request $request){
        $product = Products::find($request->id);

        $product->product_title = $request->product_title;
        $product->product_code = $request->product_code;
        $product->quantity= $request->quantity;
        $product->price = $request->price;
        $product->description = $request->description;

        if ($request->hasFile('featured_image')) {
            if ($request->file('featured_image')->isValid()) {
                //
                $file = $request->file('featured_image');
                $image_name = time() . "." . $file->getClientOriginalExtension();
                $original_name = $file->getClientOriginalName();
                $file->move('public/uploads/products/', $image_name);
                //  dd($file);
                $product->featured_picture = $image_name;

            }
        }

        $product->save();

        $id = $product->id;

        if ($id > 0) {
            echo json_encode(array(
                'type' => 'success',
                'message' => 'Product is updated successfully. you can view in listing.'
            ));
        } else {
            echo json_encode(array(
                'type' => 'error',
                'message' => 'Some problem in product updating, try again.'
            ));
        }
    }

    public function get_product_by_id(Request $request){
        $id = $request->id;
        $product = Products::find($id);

        $array = array(
            'product_id'            => $product->id,
            'product_purchase_id'   => $product->product_purchases[0]->id,
            'product_title'         => $product->product_title,
            'brand_id'              => $product->brand_id,
            'category_id'           => $product->category_id,
            'sub_category_id'       => $product->sub_category_id,
            'quantity_signal'       => $product->quantity_signal,
            'inv_date'              => !empty($product->product_purchases[0]->inv_date)?CommonMethods::formatDate($product->product_purchases[0]->inv_date):"",
            'expiry_date'           => !empty($product->product_purchases[0]->expiry_date)?CommonMethods::formatDate($product->product_purchases[0]->expiry_date):"",
            'price_unit'            => $product->product_purchases[0]->price_unit,
            'commission'            => $product->product_purchases[0]->commission,
            'shipping_cost'            => $product->product_purchases[0]->shipping_cost,
            'quantity'            => $product->product_purchases[0]->order_qty,
        );

        echo json_encode($array);
    }

    public function product_delete(Request $request){

        $id = $request->id;

        $product = Products::find($id);

        $product->deleted_at = date('Y-m-d H:i:s');
        $product->save();

    }

    public function get_product_by_search(){
        $name = $_GET['search'];
        $products = Products::select('id','product_title as text','price')->where('product_title','LIKE','%'.$name.'%')->get();
        echo json_encode(array('results'=>$products));

    }

    public function save_item(Request $request){
        $id = $request->product_id;
        $product_purchase_id = $request->product_purchase_id;
        $st=0;
        $new_stock= $request->quantity;
        $stock = 0;
        if(empty($id))
            $product = new Products();
        else
            $product = Products::find($id);
        if(!empty($id)){

            $existing_stock = $product->in_stock;
            $stock = $new_stock + $existing_stock;
        }else{
            $stock = $new_stock;
        }

        if(empty($product_purchase_id)){
            $product_purchase = new ProductPurchases();
            $stock = $new_stock + $existing_stock;
        }

        else{

            $product_purchase = ProductPurchases::find($product_purchase_id);
          //  dd($product_purchase);
            $stock = $existing_stock+($new_stock-$product_purchase->order_qty);
        }

        $product->in_stock              = $stock;
        $product->product_title         = $request->product_title;
        $product->brand_id              = $request->brand_name;
        $product->category_id           = $request->category;
        $product->sub_category_id       = $request->sub_category;
        $product->quantity_signal             = $request->quantity_signal;
        $product->hospital_id                = CommonMethods::getHopsitalID();
        $product->save();
        $p_id = $product->id;




          //  dd($product);

        $product_purchase->product_id = $p_id;
        $product_purchase->inv_date              = date('Y-m-d',strtotime($request->inv_date));
        $product_purchase->expiry_date           = date('Y-m-d',strtotime($request->expiry_date));
        $product_purchase->price_unit            = $request->price_unit;
        $product_purchase->discount              = $request->discount;
        $product_purchase->total_price_7_percent = $request->total_price_with_gst;
        $product_purchase->sale_price_cast_markup = $request->total_price_with_gst_markup;
        $product_purchase->order_qty             = $request->quantity;
        $product_purchase->shipping_cost             = $request->shipping_cost;
        $product_purchase->commission             = $request->commission;
        $product_purchase->previous_stock             = $request->$existing_stock;
        $product_purchase->used_for             = $request->used_for;
        $product_purchase->previous_stock_balance             = $request->previous_stock_balance;
        $product_purchase->total_stock             = $request->total_stock;
        $product_purchase->stock_location             = $request->stock_location;
        $product_purchase->packing_description             = $request->packing_description;
        $product_purchase->singapre_price_per_unit             = $request->singapre_price_per_unit;
        $product_purchase->mm_price             = $request->mm_price;
        $product_purchase->outstanding_quantity             = $request->outstanding_quantity;
        $product_purchase->shipping_cost             = $request->shipping_cost;
        $product_purchase->supplier_name             = $request->supplier_name;
        $product_purchase->supplier_contact             = $request->supplier_contact;
        $product_purchase->supplier_invoice             = $request->supplier_invoice;
        $product_purchase->product_code_from_supplier             = $request->product_code_from_supplier;
        $product_purchase->payment_mode             = $request->payment_mode;
        $product_purchase->payment_paid_transaction             = $request->payment_paid_transaction;



        $product_purchase->hospital_id          = CommonMethods::getHopsitalID();

        $product_purchase->cuser = Auth::id();

        $product_purchase->save();



        if ($p_id > 0) {
            $type = empty($id)?"success":"update";
            echo json_encode(array(
                'type' => $type,
                'message' => 'Product is added successfully. you can view in listing.'
            ));
        } else {
            echo json_encode(array(
                'type' => 'error',
                'message' => 'Some problem in product submitting, try again.'
            ));
        }

    }

    public function get_products(){
        $products = Products::whereNull('deleted_at')->orderBy('updated_at')->where('hospital_id',CommonMethods::getHopsitalID())->get();

        return view('products.get-products',['products'=>$products]);
    }

    public function get_search_sub_categories(Request $request){
        $selected_id = explode(',',$request->category_id);
        $categories = MedicationCategories::whereIn('parent_id',$selected_id)->whereNull('deleted_at')->where('hospital_id',CommonMethods::getHopsitalID())->get();
        return view('products.sub-categories',['categories'=>$categories]);

    }

    public function search_products(Request $request){
        $data = $request->all();

        $products = Products::whereNull('deleted_at')->where('hospital_id',CommonMethods::getHopsitalID())->where(function($query) use ($data){
            if(!empty($data['product_title'])){
                $query->where('product_title','LIKE','%'.$data['product_title'].'%');
            }

            if(!empty($data['order_qty'])){
                $query->where('in_stock','<=',$data['order_qty']);
            }

            if(!empty($data['brands']) && count($data['brands']) > 0){
                $query->whereIn('brand_id',$data['brands']);
            }

            if(!empty($data['categories']) && count($data['categories']) > 0){
                $query->whereIn('category_id',$data['categories']);
            }

            if(!empty($data['sub_category_id']) && count($data['sub_category_id']) > 0){
                $query->whereIn('sub_category_id',$data['sub_category_id']);
            }






        });


        if(!empty($data['expiry_from']) && !empty($data['expiry_to'])){
            $products->whereHas('product_purchases',function($q) use ($data){
                $q->where('expiry_date','>=',date('Y-m-d',strtotime($data['expiry_from'])));
                $q->where('expiry_date','<=',date('Y-m-d',strtotime($data['expiry_to'])));
            });
        }

        if(!empty($data['expiry_from']) && empty($data['expiry_to'])){
            $products->whereHas('product_purchases',function($q) use ($data){
                $q->where('expiry_date','>=',date('Y-m-d',strtotime($data['expiry_from'])));

            });
        }

        if(!empty($data['expiry_from']) && !empty($data['expiry_to'])){
            $products->whereHas('product_purchases',function($q) use ($data){
                //$q->where('expiry_date','>=',date('Y-m-d',strtotime($data['expiry_from'])));
                $q->where('expiry_date','<=',date('Y-m-d',strtotime($data['expiry_to'])));
            });
        }


        if(!empty($data['purchase_from']) && !empty($data['purchase_to'])){
            $products->whereHas('product_purchases',function($q) use ($data){
                $q->where('created_at','>=',date('Y-m-d',strtotime($data['purchase_from'])));
                $q->where('created_at','<=',date('Y-m-d',strtotime($data['purchase_to'])));
            });
        }

        if(!empty($data['purchase_from']) && empty($data['purchase_to'])){
            $products->whereHas('product_purchases',function($q) use ($data){
                $q->where('created_at','>=',date('Y-m-d',strtotime($data['purchase_from'])));

            });
        }

        if(!empty($data['purchase_from']) && !empty($data['purchase_to'])){
            $products->whereHas('product_purchases',function($q) use ($data){
                //$q->where('expiry_date','>=',date('Y-m-d',strtotime($data['expiry_from'])));
                $q->where('created_at','<=',date('Y-m-d',strtotime($data['purchase_to'])));
            });
        }


        $products = $products->get();
      //  dd($products);
        return view('products.searched-products',['products'=>$products]);
    }

    public function product_detail($id){
        $product = Products::find($id);
        return view('products.product-detail',['product'=>$product]);
    }

    public function product_as_json(){
        $keywords = $_GET['phrase'];
        $products = Products::whereNull('deleted_at')->where('product_title','LIKE','%'.$keywords.'%')->where('hospital_id',CommonMethods::getHopsitalID())->get();

        $p = [];
        if(isset($products) && $products->count() > 0){
            foreach($products as $product){
                $p[] = array(
                    'value'=>$product->product_title,
                    'id' => $product->id
                );
            }
        }

        echo json_encode($p);
    }

    public function get_product_info($product_id){
        $product = Products::find($product_id);
        return json_encode(array(
            'brand_id' => $product->brand_id,
            'category_id' => $product->category_id,
            'sub_category_id' => $product->sub_category_id
        ));
    }

    public function sold_to($id){
        $product = Products::find($id);

        //dd($product->session_items[0]->patients);

        return view('products.sold-to',['product'=>$product]);
    }

    public function pharmacy_report(){

       // echo DNS2D::getBarcodeHTML('mujtaba', 'QRCODE',3,3);
       // echo DNS1D::getBarcodeHTML('4445645656', 'C39');

       // exit;

        $last_7_date = \Carbon\Carbon::today()->subDays(7);

        $recent_sale = SessionItems::select('product_id', DB::raw('count(product_id) as total'), DB::raw('sum(item_quantity) as total_quantity'),DB::raw('sum(item_price) as total_price'))->where('hospital_id',CommonMethods::getHopsitalID())->groupBy('product_id')->orderBy('created_at','DESC')->limit(10)->get();
        $weekly_sale = SessionItems::select('product_id', DB::raw('count(product_id) as total'), DB::raw('sum(item_quantity) as total_quantity'),DB::raw('sum(item_price) as total_price'),DB::raw('DAYNAME(created_at) as day_name'),'created_at')
            ->where('hospital_id',CommonMethods::getHopsitalID())->where('created_at','>=',$last_7_date->toDateString())->groupBy(DB::raw('DAYNAME(created_at)'))->orderBy('created_at','DESC')->get();
      //  dd($weekly_sale);
        return view('products.report',['recent_sale'=>$recent_sale,'weekly_sale'=>$weekly_sale]);
    }

    public function upload_csv_products(Request $request){




        $file = $request->file('upload-csv');
        $handle = $file->getRealPath();
        $handle = fopen( $handle, "r");

        $i=1;
        $id = 0;
        $flag = false;
        $format = 'Y-m-d';

        $skipped_uploading = [];

        while (($result = fgetcsv($handle)) !== false) {
            $old_stock = 0;
            if ($i > 1) {



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
                    $b->hospital_id = CommonMethods::getHopsitalID();
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
                        $sub->hospital_id = CommonMethods::getHopsitalID();
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
                    $p_e = Products::where('product_title',$prod['product_title'])->first();
                    if(empty($p_e)){


                    $p = new \App\Products();
                    $p->product_title = $prod['product_title'];
                    $p->category_id = !empty($prod['category_id'])?$prod['category_id']:0;
                    $p->sub_category_id = !empty($prod['sub_category_id'])?$prod['sub_category_id']:0;
                    $p->brand_id = $prod['brand_id'];
                    $p->in_stock = $prod['qty_order'];
                    $p->hospital_id = CommonMethods::getHopsitalID();
                    $p->save();
                    $product_id = $p->id;
                }else{
                        $old_stock = $p_e->in_stock;

                        $new_stock = $old_stock + $prod['qty_order'];

                        $product_id = $p_e->id;
                        $p_e->in_stock = $new_stock;
                        $p_e->save();
                        $p= $p_e;
                    }
                    $p_p = new \App\ProductPurchases();
                    $p_p->product_id = $product_id;
                    $p_p->inv_date = $prod['inv_date'];
                    $p_p->expiry_date = $prod['expiry_dat'];
                    $p_p->previous_stock = $old_stock;
                    $p_p->order_qty = $prod['qty_order'];

                    $p_p->hospital_id = CommonMethods::getHopsitalID();

                    $p_p->price_unit = $prod['price_unit'];
                    $r= 0;
                     $r =   $p_p->save();
                 $id = $p->id;
                 if(!$r){
                     $skipped_uploading[] = $prod['product_title'];
                 }
                }


            }

            $i++;
        }

        if($id) {
            echo json_encode(array(
                'type' => 'success',
                'message' => 'CSV is imported successfully.',
                'skipped_data' => $skipped_uploading
            ));
        } else {
            echo json_encode(array(
                'type' => 'error',
                'message' => 'Some problem in importing, try again.'
            ));
        }

    }

    public function new_product(){
        $products = Products::whereNull('deleted_at')->orderBy('product_title')->where('hospital_id',CommonMethods::getHopsitalID())->get();
        $brands = MedicationBrands::whereNull('deleted_at')->where('hospital_id',CommonMethods::getHopsitalID())->get();

        $categories = MedicationCategories::whereNull('deleted_at')->where('hospital_id',CommonMethods::getHopsitalID())->where('parent_id',0)->get();


        return view('products.new-product',['products'=>$products,'brands'=>$brands,'categories'=>$categories]);


    }

    public function view_product($id){
        $product = Products::where('id',$id)->where('hospital_id',CommonMethods::getHopsitalID())->first();


        return view('products.product-view',['product'=>$product]);
    }

    public function edit_product($id){
        $product = Products::where('id',$id)->where('hospital_id',CommonMethods::getHopsitalID())->first();
        $brands = MedicationBrands::whereNull('deleted_at')->where('hospital_id',CommonMethods::getHopsitalID())->get();

        $categories = MedicationCategories::whereNull('deleted_at')->where('hospital_id',CommonMethods::getHopsitalID())->where('parent_id',0)->get();

        return view('products.new-product',['product'=>$product,'brands'=>$brands,'categories'=>$categories]);
    }


}
