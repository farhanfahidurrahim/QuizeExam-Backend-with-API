<?php

namespace App\Http\Controllers;

use App\Models\ExamMcq;
use App\Models\Notification;
use App\Models\Order;
use App\Models\Product;
use App\Models\VideoCourse;
use Illuminate\Http\Request;
use \App\Models\User;
class dashboardController extends Controller
{
    //

    function index(){

        $total_user=count(User::all());
        $total_notification=count(Notification::all());
        $total_videos=count(VideoCourse::all());
        $total_product=count(Product::all());
        $total_order=count(Order::all());
        $total_mcq=count(ExamMcq::all());


        return view("dashboard",["users"=>$total_user,"users"=>$total_user,"total_notification"=>$total_notification,"total_videos"=>$total_videos,"total_product"=>$total_product,"total_order"=>$total_order,"total_mcq"=>$total_mcq,]);
    }
}
