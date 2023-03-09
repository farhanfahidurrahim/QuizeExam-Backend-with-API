<?php

namespace App\Http\Controllers;

use App\Models\ExamMcq;
use App\Models\ExamMcqResult;
use App\Models\ExamSubject;
use App\Models\ExamSubjectTopic;
use App\Models\ModelTestResult;
use App\Models\ModelTestSubject;
use App\Models\ModelTestTitle;
use App\Models\ModelTestTopic;
use App\Models\Notification;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Quiz;
use App\Models\QuizResults;
use App\Models\QuizSubject;
use App\Models\QuizTopic;
use App\Models\User;
use App\Models\VideoCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;

class ApiControler extends Controller
{
function Register(Request $request){


     $error=false;
     $msg="";
     if($request->name==null){
         $error=true;
         $msg="Name Is Required";
     }
     if($request->email==null){
         $error=true;
         $msg="Email Is Required";
     }
     if($request->number==null){
         $error=true;
         $msg="Number Is Required";
     }
     if($request->password==null){
         $error=true;
         $msg="Password Is Required";
     }

     if($error==false){
    $status= User::create([
         "name"=>$request->name,
         "email"=>$request->email,
         "number"=>$request->number,
         "password"=>Hash::make($request->password)
     ]);


        if($status){
            return Response::json([
                "error"=>false,
                "message"=>"Registration Successfully!"
            ]);
        }else{
            return Response::json([
                "error"=>true,
                "message"=>$status
            ]);
        }


     }else{
         return Response::json([
             "error"=>true,
             "message"=>$msg
         ]);
     }





 }

 function Profile(Request $request){
    $data=User::where("id",$request->user()->id)->get();
     return Response::json([
         "error"=>false,
         "data"=>$data[0]
     ]);

 }

 function  UpdateProfile(Request $request){
     $number_check=User::where("number",$request->number)->get();
    if(Count($number_check)>0){
        return Response::json([
            "error"=>true,
            "message"=>"Number Already Exists"
        ]);
    }
    else{
         $data=User::find($request->user()->id)->update([
             "name"=>$request->name,
             "number"=>$request->number ,
             "institute"=>$request->institute,
         ]);

         return Response::json([
             "error"=>false,
             "message"=>"Update Success"
         ]);

     }


 }



function Login(Request $request){

     $user=User::where("number",$request->number)->first();

     if($user!=null && Hash::check($request->password,$user->password)){

         $token=$user->createToken($user->number)->plainTextToken;
         return Response::json([
                 "error"=>true,
                 "token"=>$token,
                 "message"=>"Login Successfull",
                 "info"=>$user
             ]
         );
     }else{
         return Response::json([
             "error"=>true,
             "message"=>"No Record Found!"
             ]
         );

     }

}

function HSC_Video(){
     $data=VideoCourse::where("class","HSC")->get();
     return Response::json([
         "error"=>false,
         "data"=>$data
         ]);
}
function HSC_Video_Subject(){
        $data=DB::table('video_courses')
            ->select('id', "subject_name","thumbnail")
            ->groupBy('subject_name')
            ->where("class","HSC")->get();
        return Response::json([
            "error"=>false,
            "data"=>$data
        ]);
    }
function HSC_Video_BySubject($name){
        $data=VideoCourse::where(["class"=>"HSC","subject_name"=>$name])->get();
        return Response::json([
            "error"=>false,
            "data"=>$data
        ]);
    }
function Exam_Subjects(){
    $data=ExamSubject::all();
    return Response::json([
        "error"=>false,
        "data"=>$data
    ]);
}

function Exam_SubjectsTopics($id){
    $data=ExamSubjectTopic::where("subject_id",$id)->get();
    return Response::json([
        "error"=>false,
        "data"=>$data
    ]);
}
function Exam_Mcq($id){
    $data=ExamMcq::where("topic_id",$id)->get();
    return Response::json([
        "error"=>false,
        "data"=>$data
    ]);
}

function Take_Mcq(Request $request){

    $total_currect=0;

    foreach ($request->exam_info as $data){

        if($data["submit_ans"]==$data["right_ans"]){
            $total_currect+=1;
        }
    }

    $satatus=ExamMcqResult::insert([
        "user_id"=>$request->user()->id,
        "topic_id"=>$request->topic_id,
        "subject_id"=>$request->subject_id,
        "total_correct"=>$total_currect,
        "exam_info"=>json_encode($request->exam_info),
    ]);


    return Response::json([
        "error"=>false,
        "message"=>"Exam Saved Successfully"
    ]);


}
function My_Exam_Result(Request $request){

    $data=ExamMcqResult::where("user_id",$request->user()->id)->get();

    return Response::json($data);
}
function Admission_Video(){
    $data=VideoCourse::where("class","Admission")->get();
    return Response::json([
        "error"=>false,
        "data"=>$data
    ]);
}
function Admission_Video_Subject(){
        $data=DB::table('video_courses')
            ->select('id', "subject_name","thumbnail")
            ->groupBy('subject_name')
            ->where("class","Admission")->get();
        return Response::json([
            "error"=>false,
            "data"=>$data
        ]);
    }
function Admission_Video_BySubject($name){
        $data=VideoCourse::where(["class"=>"Admission","subject_name"=>$name])->get();
        return Response::json([
            "error"=>false,
            "data"=>$data
        ]);
    }

function Model_Test(){
    $data=ModelTestTitle::all();
    $alldata=[];

    foreach ($data as $value){
        $subject=ModelTestSubject::where("title_id",$value->id)->get();
        $obj=["title"=>$value->test_title,"subjects"=>$subject];
        array_push($alldata,$obj);
    }
    return Response::json($alldata);
}
    function Take_Model_Test(Request $request){

        $total_currect=0;

        foreach ($request->exam_info as $data){

            if($data["submit_ans"]==$data["right_ans"]){
                $total_currect+=1;
            }
        }

        ModelTestResult::insert([
            "user_id"=>$request->user()->id,
            "title_id"=>$request->title_id,
            "test_subject_id"=>$request->test_subject_id,
            "test_topic_id"=>$request->test_topic_id,
            "total_correct"=>$total_currect,
            "exam_info"=>json_encode($request->exam_info),
        ]);

        return Response::json([
            "error"=>false,
            "message"=>"Exam Saved Successfully"
        ]);

    }

    function My_Model_Test_Result(Request $request){
        $data=ModelTestResult::where("user_id",$request->user()->id)->get();

        return Response::json($data);
    }

function Model_Test_Topics($id){
    $data=ModelTestTopic::where("test_subject_id",$id)->get();
    return Response::json([
        "error"=>false,
        "data"=>$data
    ]);
}



//Quiz
function Quiz_Subjects(){
    $data=QuizSubject::all();
    $alldata=[];

    foreach ($data as $value){
        $subject=QuizTopic::where("quiz_subject_id",$value->id)->get();
        $obj=["title"=>$value->quiz_subject,"subjects"=>$subject];
        array_push($alldata,$obj);
    }
    return Response::json($alldata);
}
function Quiz_SubjectsTopic($id){
    $data=Quiz::where("quiz_subject_id",$id)->get();
    return Response::json([
        "error"=>false,
        "data"=>$data
    ]);
}
function Take_Quiz(Request $request){

    $total_currect=0;

    foreach ($request->exam_info as $data){

        if($data["submit_ans"]==$data["right_ans"]){
            $total_currect+=1;
        }
    }

    $satatus=QuizResults::insert([
        "user_id"=>$request->user()->id,
        "quiz_topics_id"=>$request->quiz_topics_id,
        "quiz_subject_id"=>$request->quiz_subject_id,
        "total_correct"=>$total_currect,
        "exam_info"=>json_encode($request->exam_info),
    ]);


    return Response::json([
        "error"=>false,
        "message"=>"Exam Saved Successfully"
    ]);

}
function My_Quiz_Results(Request $request){
    $data=QuizResults::where("user_id",$request->user()->id)->get();
    return Response::json([
        "error"=>false,
        "data"=>$data
    ]);
}
function Job_Video(){
        $data=VideoCourse::where("class","Job")->get();
        return Response::json([
            "error"=>false,
            "data"=>$data
        ]);
    }
function Job_Video_Subject(){
        $data=DB::table('video_courses')
            ->select('id', "subject_name","thumbnail")
            ->groupBy('subject_name')
            ->where("class","Job")->get();
        return Response::json([
            "error"=>false,
            "data"=>$data
        ]);
    }
function Job_Video_BySubject($name){
        $data=VideoCourse::where(["class"=>"Job","subject_name"=>$name])->get();
        return Response::json([
            "error"=>false,
            "data"=>$data
        ]);
    }



    function product(){
    $data=Product::all();
        return Response::json([
            "error"=>false,
            "data"=>$data
        ]);
    }

    function order(Request $request){

    $cart_info=[];
        $total_bill=0;
    foreach ($request->product_info as $value){


        $product_info=Product::where("id",$value["product_id"])->first();

        $obj=[
          "product_id"=>$product_info->id,
          "product_name"=>$product_info->name,
          "image"=>$product_info->photo,
          "price"=>$product_info->price,
          "qty"=>$value["quantity"],
          "total"=>intval($value["quantity"])*$product_info->price,
        ];
        $total_bill=$total_bill+intval($value["quantity"])*$product_info->price;
        array_push($cart_info,$obj);
    }





    $id=DB::table("orders")->insertGetId(
        [
            "user_id"=>$request->user()->id,
            "total_bill"=>$total_bill,
            "info"=>json_encode($cart_info)
        ]

    );


        return Response::json([
            "error"=>false,
            "order_id"=>$id,
            "message"=>"Thank You! Order Place Successfully"
        ]);


    }

    function MyOrders(Request $request){
        $data=Order::where("user_id",$request->user()->id)->get();
        return Response::json([
            "error"=>false,
            "data"=>$data
        ]);

    }
function Notifications(Request $request){


    $data=Notification::where("user_id",$request->user()->id)->orWhere("type","ALL")->get();
    return Response::json([
        "error"=>false,
        "data"=>$data
    ]);
}
function VideoSearch($name){
    $data=VideoCourse::where("subject_name","LIKE","%".$name."%")->get();
    return Response::json([
        "error"=>false,
        "data"=>$data
    ]);
}
function payment(Request $request){
    $data=Payment::insert([
        "user_id"=>$request->user_id,
        "order_id"=>$request->order_id,
        "name"=>$request->name,
        "email"=>$request->email,
        "number"=>$request->number,
        "address"=>$request->address,
        "payment_type"=>$request->payment_type,
        "trx_id"=>$request->trx_id,
        "amount"=>$request->amount,

    ]);
    return Response::json([
        "error"=>false,
        "message"=>"Payment Request Successfully"
    ]);
}
}
