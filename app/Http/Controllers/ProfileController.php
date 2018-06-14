<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Vendor;
use App\User;
use App\Products;
use Hash;
use App\Http\Requests;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    

    
    public function index(){
        if(Auth::user()->role->id == 1){
            return view('account.index');
        }else{
            return back();
        }
    }

    public function profileupdate(Request $request){
        $user = User::find($request->id)->first();
        // if(password_verify($user->password, $request->password)){
        //     return 'pass correct';
        // }else{
        //     return 'pass wrong' .' ' .$request->password .' & ' .decrypt($user->password);
        // }
        if(Hash::check($request->password, Auth::user()->password)){
            if($request->path == ''){
                if($user->update([
                    'role_id' => $request->role_id,
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'city' => $request->city,
                    'country' => $request->country,
                    'zip' => $request->zip,
                    'bio' => $request->bio,
                    'password' => bcrypt($request->password)
                ])){
                    return back();
                }
            }else{
                return 'failed';
            }
        }else{
            return 'pass wrong' .' ' .$request->password .' & ' .$user->password;
        }
    }

    public function profilemakebrand(Request $request){
        global $input,$request,$name;
        $input = $request->all();
        if($file = $request->file('path')){
            $name = 'image' .rand(282746508, 9) .'akjdbno' .rand(282746508, 9) .$file->getClientOriginalName();
            $request->path = $name;
            $file->move('uploads', $name);
            $brand = Vendor::create([
                'user_id' => $request->user_id,
                'name' => $request->name,
                'description' => $request->description,
                'path' => $request->path
            ]);      
            return back();
            // return $request->path .' found';
        }else{
            $brand = Vendor::create([
                'user_id' => $request->user_id,
                'name' => $request->name,
                'description' => $request->description
            ]);      
            return back();
            // return $request->path .' Not found';
        }
    }

    public function userpostcreate(Request $request){
            global $input,$request,$name;
            $input = $request->all();
            if($file1 = $request->file('path1')){
                $name = 'image' .rand(282746508, 9) .'akjdbno' .rand(282746508, 9) .$file1->getClientOriginalName();
                $request->path1 = $name;
                $file1->move('uploads', $name);
            }
            if($file2 = $request->file('path2')){
                $name = 'image' .rand(282746508, 9) .'akjdbno' .rand(282746508, 9) .$file2->getClientOriginalName();
                $request->path2 = $name;
                $file2->move('uploads', $name);
            }
            if($file3 = $request->file('path3')){
                $name = 'image' .rand(282746508, 9) .'akjdbno' .rand(282746508, 9) .$file3->getClientOriginalName();
                $request->path3 = $name;
                $file3->move('uploads', $name);
            }

            $product = Products::create([
                'user_id' => $request->user_id,
                'category_id' => $request->category_id,
                'title' => $request->title,
                'description' => $request->description,
                'min_price' => $request->min_price,
                'max_price' => $request->max_price,
                'percentage_off' => $request->percentage_off,
                'vendor_id' => $request->vendor_id,
                'path1' => $request->path1,
                'path2' => $request->path2,
                'path3' => $request->path3,
            ]);
            return back();
    }
}
