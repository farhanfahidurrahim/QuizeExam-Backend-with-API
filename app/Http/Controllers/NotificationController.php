<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{

    function index(){
        $data=Notification::all();

        return view("Notifications.index",["data"=>$data]);
    }

    function store(Request $request){

        Notification::insert([
            "title"=>$request->title,
            "message"=>$request->message,
        ]);

        return redirect()->back();
    }
}
