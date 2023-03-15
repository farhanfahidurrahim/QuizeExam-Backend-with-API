<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ApiControler;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("/register",[ApiControler::class,"Register"]);
Route::post("/login",[ApiControler::class,"Login"]);
Route::get("/Profile",[ApiControler::class,"Profile"])->middleware("auth:sanctum");
Route::put("/Profile",[ApiControler::class,"UpdateProfile"])->middleware("auth:sanctum");

Route::post("/learn_english_grammer",[ApiControler::class,"Learn_English_grammer"]);
//Route::post("/login",[ApiControler::class,"Login"]);

//HSC
Route::get("/HSC_Video",[ApiControler::class,"HSC_Video"]);
Route::get("/HSC_Video_Subject",[ApiControler::class,"HSC_Video_Subject"]);
Route::get("/HSC_Video/{name}",[ApiControler::class,"HSC_Video_BySubject"]);


Route::get("/Exam_subjects",[ApiControler::class,"Exam_Subjects"]);
Route::get("/Exam_subjects/{id}",[ApiControler::class,"Exam_SubjectsTopics"]);
Route::get("/Exam_Mcq/{id}",[ApiControler::class,"Exam_Mcq"]);
Route::post("/Take_Mcq",[ApiControler::class,"Take_Mcq"])->middleware("auth:sanctum");
Route::get("/My_Exam_Result",[ApiControler::class,"My_Exam_Result"])->middleware("auth:sanctum");


//Admission
Route::get("/Admission_Video",[ApiControler::class,"Admission_Video"]);
Route::get("/Admission_Video_Subject",[ApiControler::class,"Admission_Video_Subject"]);
Route::get("/Admission_Video/{name}",[ApiControler::class,"Admission_Video_BySubject"]);


Route::get("/Model_Test",[ApiControler::class,"Model_Test"]);
Route::get("/Model_Test/{id}",[ApiControler::class,"Model_Test_Topics"]);

//Route::get("/Model_Test",[ApiControler::class,"Exam_SubjectsTopics"]);
Route::get("/Exam_Mcq/{id}",[ApiControler::class,"Exam_Mcq"]);
Route::post("/Take_Model_Test",[ApiControler::class,"Take_Model_Test"])->middleware("auth:sanctum");
Route::get("/My_Model_Test_Result",[ApiControler::class,"My_Model_Test_Result"])->middleware("auth:sanctum");



//Quize
Route::get("/quiz_subjects",[ApiControler::class,"Quiz_Subjects"]);
Route::get("/quiz_subjects/{id}",[ApiControler::class,"Quiz_SubjectsTopic"]);
Route::post("/Take_Quiz",[ApiControler::class,"Take_Quiz"])->middleware("auth:sanctum");
Route::get("/My_Quiz_Results",[ApiControler::class,"My_Quiz_Results"])->middleware("auth:sanctum");


//JOB

Route::get("/Job_Video",[ApiControler::class,"Job_Video"]);
Route::get("/Job_Video_Subject",[ApiControler::class,"Job_Video_Subject"]);
Route::get("/Job_Video/{name}",[ApiControler::class,"Job_Video_BySubject"]);



//Products
Route::get("/product",[ApiControler::class,"product"]);
Route::post("/order",[ApiControler::class,"order"])->middleware("auth:sanctum");
Route::get("/order",[ApiControler::class,"MyOrders"])->middleware("auth:sanctum");



//Notification
Route::get("/notifications",[ApiControler::class,"Notifications"])->middleware("auth:sanctum");
Route::post("/order",[ApiControler::class,"order"])->middleware("auth:sanctum");


//Search
Route::get("/Search/Video/{name}",[ApiControler::class,"VideoSearch"]);
Route::post("/payment",[ApiControler::class,"payment"])->middleware("auth:sanctum");
