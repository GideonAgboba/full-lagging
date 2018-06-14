<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Wishlist;
use App\Cart;
use App\Http\Requests;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function wishlist(Request $request){
        $wishlist = Wishlist::create([
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
            'vendor_id' => $request->vendor_id,
            'product_id' => $request->product_id,
            'title' => $request->title,
            'percentage_off' => $request->percentage_off,
            'min_price' => $request->min_price,
            'max_price' => $request->max_price,
            'path' => $request->path
        ]);
        return back();
    }


    public function addtocart(Request $request){
        $cartlist = Cart::create([
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
            'vendor_id' => $request->vendor_id,
            'product_id' => $request->product_id,
            'title' => $request->title,
            'percentage_off' => $request->percentage_off,
            'min_price' => $request->min_price,
            'max_price' => $request->max_price,
            'path' => $request->path
        ]);
        return back();
    }
}
