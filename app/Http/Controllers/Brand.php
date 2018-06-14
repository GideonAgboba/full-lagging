<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Http\Requests;

class Brand extends Controller
{
    public function brandview($id){
        return view('brands.index');
    }
    public function itemview($id){
        $item = Products::where('id', $id)->first();
        return view('layouts.itemview', compact('item'));
    }
}
