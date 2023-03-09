<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class User extends Controller
{

    function index(){
        $all=\App\Models\User::all();
        return view("Users/users",["users"=>$all]);
    }
    function active($id){
        \App\Models\User::where("id",$id)->update(["is_active"=>1]);
        return redirect()->route("users.index");
    }
    function deactive($id){
        \App\Models\User::where("id",$id)->update(["is_active"=>0]);
        return redirect()->route("users.index");
    }
    function Logout(){
        Auth::logout();
        return redirect()->route("login");
    }

}
