<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;

class login extends Controller
{
    public function index(Request $request){
        $data = [];
        if($request['username'] == ""){
             return back()->withInput()->withErrors(['msg' => 'username blank']);
        }
        if($request['password'] == ""){
             return back()->withInput()->withErrors(['msg' => 'password blank']);
        }
        
        $admin = Admin::all()->where("username", $request['username'])->where("password",$request['password']);
        if(count($admin) > 1){
            return back()->withInput()->withErrors(['msg' => 'To many accounts']);
        }else if(count($admin) < 1){
            return back()->withInput()->withErrors(['msg' => 'Incorrect username or password']);
        }else{
            $data['message'] = "good";
        }
        return view('welcome',$data);;
    }
}
