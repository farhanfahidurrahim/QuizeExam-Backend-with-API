<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    function index(){
        $data=Product::all();
        return view("Product.index",["data"=>$data]);

    }
    function store(Request $request){
        $image = $request->file('photo');
        $image_name = time().rand(1000,1000000).".".$image->getClientOriginalExtension();
        $image->move(public_path('/upload/products/'),$image_name);
        $path=public_path('/upload/products/').$image_name;
        Product::insert([
            "name"=>$request->name,
            "desc"=>$request->desc,
            "price"=>$request->price,
            "photo"=>$path
        ]);

        return redirect()->back();

    }
    function delete($id){
        Product::where("id",$id)->delete();
        return redirect()->back();
    }
    function edit($id){
        $data=Product::where("id",$id)->get();
        if(count($data)>0){
            return view("Product.edit",["data"=>$data[0],"pid"=>$id]);
        }else{
            return redirect()->back();
        }

    }

    function editSave($id,Request $request){


        if($request->file("photo")!=null){
            $image = $request->file('photo');
            $image_name = time().rand(1000,1000000).".".$image->getClientOriginalExtension();
            $image->move(public_path('/upload/products/'),$image_name);
            $path=public_path('/upload/products/').$image_name;
            Product::where("id",$id)->update([
                "name"=>$request->name,
                "desc"=>$request->desc,
                "price"=>$request->price,
                "photo"=>$path
            ]);

        }else{
            Product::where("id",$id)->update([
                "name"=>$request->name,
                "desc"=>$request->desc,
                "price"=>$request->price
            ]);
        }

        return redirect()->back();
    }

    function orders(){
        $data=DB::table("users")
            ->join("orders","users.id","=","orders.user_id")
            ->join("payments","orders.id","=","payments.order_id")
            ->select("payments.name as payment_user_name","payments.email","payments.number","payments.address","payments.payment_type","payments.trx_id","payments.amount","orders.total_bill","orders.info","orders.status","orders.id","users.name")
            ->get();


//        return json_decode($data[0]["info"])[0]->product_id;
        return view("Product.orders",["data"=>$data]);
    }
    function OrderStatus($id,$status){

        Order::where("id",$id)->update(
            [
                "status"=>$status
            ]
        );

        return redirect()->back();
    }

}
