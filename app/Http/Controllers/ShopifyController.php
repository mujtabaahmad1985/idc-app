<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Shopify;

class ShopifyController extends Controller
{
    //
    protected $shop = "smart-mobile-and-cctv-cameras.myshopify.com";
    protected $foo;
    protected $scopes = array('read_products','read_themes');
    public function authorized(){

    }

    public function getPermission()
    {

        $this->foo = Shopify::make($this->shop, $this->scopes);
        return $this->foo->redirect();
    }

    public function getResponse(Request $request)
    {
        $this->getPermission();

        // Get user data, you can store it in the data base
        $user = $this->foo->auth()->getUser();

        //GET request to products.json
        return $this->foo->auth()->get('products', ['fields'=>'id,images,title']);
    }
}
