<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\DailyDeals;
use App\Http\Requests;

class AdminController extends Controller
{
    public function admindailydeals(){
        return view('admin.home.daily-deals');
    }


    public function createdailydeal(Request $request){
        // $dailydeal = DailyDeals::create($request->all());
        // return 'done!';
        global $input,$request,$name;
        $input = $request->all();
        if($file = $request->file('path')){
            $name = 'image' .rand(282746508, 9) .'akjdbno' .rand(282746508, 9) .$file->getClientOriginalName();
            $request->path = $name;
            $file->move('uploads', $name);
        }else{
            return '404';
        }
        $dailydeal = DailyDeals::create([
            'path' => $request->path,
            'category' => $request->category,
            'min_price' => $request->min_price,
            'max_price' => $request->max_price,
            'title' => $request->title,
            'available' => $request->available,
            'soldout' => $request->soldout,
            'user_id' => $request->user_id
        ]);      
        return back();
    }


    public function adminupdatedailydeals(Request $request){
        // $dailydeal = DailyDeals::create($request->all());
        // return 'done!';
        global $input,$request,$name;
        $input = $request->all();
        if($file = $request->file('path')){
            $name = 'image' .rand(282746508, 9) .'akjdbno' .rand(282746508, 9) .$file->getClientOriginalName();
            $request->path = $name;
            $file->move('uploads', $name);
            $dailydeal = DailyDeals::find($request->id)->update([
                'path' => $request->path,
                'category' => $request->category,
                'min_price' => $request->min_price,
                'max_price' => $request->max_price,
                'title' => $request->title,
                'available' => $request->available,
                'soldout' => $request->soldout,
                'user_id' => $request->user_id
            ]);      
            return back();
        }else{
            $dailydeal = DailyDeals::find($request->id)->update([
                'path' => $request->oldpath,
                'category' => $request->category,
                'min_price' => $request->min_price,
                'max_price' => $request->max_price,
                'title' => $request->title,
                'available' => $request->available,
                'soldout' => $request->soldout,
                'user_id' => $request->user_id
            ]);      
            return back();
        }
    }


    public function admindeletedailydeals(Request $request){
        $dailydeal = DailyDeals::find($request->id)->delete();
        return back();
    }


    public function adminproductscreate(){
        return view('admin.home.products');
    }

    // public function createdailydeal(Request $request){
    //     // $dailydeal = DailyDeals::create($request->all());
    //     // return 'done!';
    //     global $input,$request,$name;
    //     $input = $request->all();
    //     if($file = $request->file('path')){
    //         $name = 'image' .rand(282746508, 9) .'akjdbno' .rand(282746508, 9) .$file->getClientOriginalName();
    //         $request->path = $name;
    //         $file->move('uploads', $name);
    //     }else{
    //         return '404';
    //     }
    //     $dailydeal = DailyDeals::create([
    //         'path' => $request->path,
    //         'category' => $request->category,
    //         'min_price' => $request->min_price,
    //         'max_price' => $request->max_price,
    //         'title' => $request->title,
    //         'available' => $request->available,
    //         'soldout' => $request->soldout,
    //         'user_id' => $request->user_id
    //     ]);      
    //     return back();
    // }

    public function adminviewvendors(){
        return view('admin.vendors.create');
    }

    public function admincreatevendors(Request  $request){
        $vendor = User::create([
            'role_id' => 2,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        return back();

    }

    public function admineditvendors(Request  $request){
        $vendor = User::find($request->id)->update([
            'role_id' => 2,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'description' => $request->description,
            'address' => $request->address,
            'city' => $request->city,
            'country' => $request->country,
            'zip' => $request->zip,
            'bio' => $request->bio
        ]);
        return back();

    }

    public function admindeletevendors(Request  $request){
        $vendor = User::find($request->id)->delete();
        return back();

    }
}
