<?php

namespace App\Http\Controllers;

use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller
{


    function index(Request $request){

        if($request->user()!=null){
            return view("dashboard");
        }else{
            return view("index");
        }


    }


    function store(Request $request){

        $user=Auth::attempt(
            [   "email"=>$request->email,
                "password"=>$request->password,
                "is_active"=>1
            ]
        );
        if($user){
            $request->session()->regenerate();
            return redirect()->route("dashboard");
        }else{
            return redirect()->back()->with(["mes"=>"Invalid Info"]);
        }

    }

}
