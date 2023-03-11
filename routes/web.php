<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LearnController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//auth:sanctum
Route::get("/",[\App\Http\Controllers\loginController::class,"index"])->name("login");
Route::post("/",[\App\Http\Controllers\loginController::class,"store"]);
Route::get("/dashboard",[\App\Http\Controllers\dashboardController::class,"index"])->middleware("auth")->name("dashboard");


//Users
Route::get("/users/",[\App\Http\Controllers\User::class,"index"])->name("users.index")->middleware("auth");
Route::get("/users/active/{id}",[\App\Http\Controllers\User::class,"active"])->name("users.active")->middleware("auth");
Route::get("/users/deactive/{id}",[\App\Http\Controllers\User::class,"deactive"])->name("users.deactive")->middleware("auth");
Route::get("logout",[\App\Http\Controllers\User::class,"Logout"])->name("users.logout")->middleware("auth");


//Video Course
Route::get("/courses/",[\App\Http\Controllers\CoursesController::class,"index"])->name("courses.index")->middleware("auth");
Route::get("/courses/edit/{id}",[\App\Http\Controllers\CoursesController::class,"edit"])->name("courses.edit")->middleware("auth");
//Route::post("/courses/edit/{id}",[\App\Http\Controllers\CoursesController::class,"editSave"])->name("courses.edit")->middleware("auth");
Route::get("/courses/delete/{id}",[\App\Http\Controllers\CoursesController::class,"delete"])->name("courses.delete")->middleware("auth");
Route::get("/courses/store/",function (){
    return view("VideoCourse.store");
})->name("courses.store")->middleware("auth");
//Route::post("/courses/store",[\App\Http\Controllers\CoursesController::class,"store"])->name("courses.store")->middleware("auth");

//Learn Controller

Route::prefix('learn/english-grammer/')->middleware('auth')->group(function(){
    Route::post('store',[LearnController::class,'learnEnglishStore'])->name('learn.english.store');

    Route::get('noun',[LearnController::class,'noun'])->name('english.noun')->middleware("auth");
    Route::DELETE('noun-delete/{id}',[LearnController::class,'nounDelete'])->name('learn.noun.destroy')->middleware("auth");
    Route::get('pronoun',[LearnController::class,'pronoun'])->name('english.pronoun');
    Route::get('english/verb',[LearnController::class,'noun'])->name('learn.english.verb')->middleware("auth");
    Route::get('english/adverb',[LearnController::class,'noun'])->name('learn.english.adverb')->middleware("auth");

});

Route::prefix('learn/english-literature/')->middleware('auth')->group(function(){

    Route::get('old-period',[LearnController::class,'oldPeriod'])->name('learn.english.oldperiod');
    Route::get('middle-period',[LearnController::class,'middlePeriod'])->name('learn.english.middleperiod');
    Route::get('romantic-period',[LearnController::class,'romanticPeriod'])->name('learn.english.romanticperiod');

});

Route::prefix('learn/bangla/')->middleware('auth')->group(function(){
    Route::post('store',[LearnController::class,'learnBanglaStore'])->name('learn.bangla.store');

    Route::get('language-grammer',[LearnController::class,'banglalanguageGrammer'])->name('learn.bangla.languagegrammer');
    Route::get('dhoni-borno-juktoborno',[LearnController::class,'dhoniborno'])->name('learn.bangla.dhoniborno');
    Route::get('prachin-zug',[LearnController::class,'prachinzug'])->name('bangla.prachinzug');
    Route::get('moddo-zug',[LearnController::class,'moddozug'])->name('bangla.moddozug');
    Route::get('adhunik-zug',[LearnController::class,'adhunikzug'])->name('bangla.adhunikzug');

});

Route::prefix('learn/math/')->middleware('auth')->group(function(){
    Route::post('store',[LearnController::class,'learnMathStore'])->name('learn.math.store');

    Route::get('realnumber',[LearnController::class,'realnumber'])->name('math.realnumber');
    Route::get('squareinteger',[LearnController::class,'squareInteger'])->name('math.square');
    Route::get('lcmgcm',[LearnController::class,'lcmgcm'])->name('math.lcmgcm');
    Route::get('average',[LearnController::class,'average'])->name('math.average');
    Route::get('fraction',[LearnController::class,'fraction'])->name('math.fraction');

    Route::get('algebra1',[LearnController::class,'algebra1'])->name('math.algebra1');
    Route::get('algebra2',[LearnController::class,'algebra2'])->name('math.algebra2');
    Route::get('algebra3',[LearnController::class,'algebra3'])->name('math.algebra3');
});

Route::prefix('learn/international-affairs/')->middleware('auth')->group(function(){
    Route::post('store',[LearnController::class,'learnIntAffStore'])->name('learn.interaff.store');

    Route::get('worldintro',[LearnController::class,'worldintro'])->name('interaff.worldintro');
    Route::get('asia',[LearnController::class,'asia'])->name('interaff.asia');
    Route::get('europe',[LearnController::class,'europe'])->name('interaff.europe');
    Route::get('africa',[LearnController::class,'africa'])->name('interaff.africa');
    Route::get('australia',[LearnController::class,'australia'])->name('interaff.australia');
});

Route::prefix('learn/bangladesh-affairs/')->middleware('auth')->group(function(){
    Route::post('store',[LearnController::class,'bangladeshAffStore'])->name('learn.bangladeshaff.store');

    Route::get('britishperiod',[LearnController::class,'britishperiod'])->name('bangladeshaff.britishperiod');
    Route::get('pakiperiod',[LearnController::class,'pakiperiod'])->name('bangladeshaff.pakiperiod');
    Route::get('liberationwar',[LearnController::class,'liberationwar'])->name('bangladeshaff.liberationwar');
});


//quiz Subject Section
Route::get("/quiz/subjects",[\App\Http\Controllers\QuizController::class,"Subjects"])->name("quiz.subjects")->middleware("auth");
Route::post("/quiz/subjects",[\App\Http\Controllers\QuizController::class,"SubjectsStore"])->name("quiz.subjects.store")->middleware("auth");
Route::post("/quiz/subjects/edit/{id}",[\App\Http\Controllers\QuizController::class,"SubjectsEdit"])->name("quiz.subjects.edit")->middleware("auth");
Route::get("/quiz/subjects/delete/{id}",[\App\Http\Controllers\QuizController::class,"SubjectsDelete"])->name("quiz.subjects.delete")->middleware("auth");

//Quiz Topic Section
Route::get("/quiz/topics",[\App\Http\Controllers\QuizController::class,"Topics"])->name("quiz.topics")->middleware("auth");
Route::post("/quiz/topics",[\App\Http\Controllers\QuizController::class,"TopicsStore"])->name("quiz.topics.store")->middleware("auth");
Route::post("/quiz/topics/edit/{id}",[\App\Http\Controllers\QuizController::class,"TopicsEdit"])->name("quiz.topics.edit")->middleware("auth");
Route::get("/quiz/topics/delete/{id}",[\App\Http\Controllers\QuizController::class,"TopicsDelete"])->name("quiz.topics.delete")->middleware("auth");

//Quiz Add
Route::match(['GET','POST'],"quiz",[\App\Http\Controllers\QuizController::class,"store"])->name("quiz.store")->middleware("auth");
Route::get("quiz/all",[\App\Http\Controllers\QuizController::class,"index"])->name("quiz.index")->middleware("auth");
Route::get("quiz/all/delete/{id}",[\App\Http\Controllers\QuizController::class,"delete"])->name("quiz.delete")->middleware("auth");



//MCQ
Route::get("/mcq/subjects",[\App\Http\Controllers\MCQController::class,"Subjects"])->name("mcq.subjects")->middleware("auth");
Route::post("/mcq/subjects",[\App\Http\Controllers\MCQController::class,"SubjectsStore"])->name("mcq.subjects.store")->middleware("auth");
Route::post("/mcq/subjects/edit/{id}",[\App\Http\Controllers\MCQController::class,"SubjectsEdit"])->name("mcq.subjects.edit")->middleware("auth");
Route::get("/mcq/subjects/delete/{id}",[\App\Http\Controllers\MCQController::class,"SubjectsDelete"])->name("mcq.subjects.delete")->middleware("auth");

//Quiz Topic Section
Route::get("/mcq/topics",[\App\Http\Controllers\MCQController::class,"Topics"])->name("mcq.topics")->middleware("auth");
Route::post("/mcq/topics",[\App\Http\Controllers\MCQController::class,"TopicsStore"])->name("mcq.topics.store")->middleware("auth");
Route::post("/mcq/topics/edit/{id}",[\App\Http\Controllers\MCQController::class,"TopicsEdit"])->name("mcq.topics.edit")->middleware("auth");
Route::get("/mcq/topics/delete/{id}",[\App\Http\Controllers\MCQController::class,"TopicsDelete"])->name("mcq.topics.delete")->middleware("auth");

//Quiz Add
Route::match(['GET','POST'],"mcq",[\App\Http\Controllers\MCQController::class,"store"])->name("mcq.store")->middleware("auth");
Route::get("mcq/all",[\App\Http\Controllers\MCQController::class,"index"])->name("mcq.index")->middleware("auth");
Route::get("mcq/all/delete/{id}",[\App\Http\Controllers\MCQController::class,"delete"])->name("mcq.delete")->middleware("auth");




//Model Test Title
Route::get("/model_test/title",[\App\Http\Controllers\ModelTestController::class,"Title"])->name("model_test.title")->middleware("auth");
Route::post("/model_test/title",[\App\Http\Controllers\ModelTestController::class,"TitleStore"])->name("model_test.title.store")->middleware("auth");
Route::post("/model_test/title/edit/{id}",[\App\Http\Controllers\ModelTestController::class,"TitleEdit"])->name("model_test.title.edit")->middleware("auth");
Route::get("/model_test/title/delete/{id}",[\App\Http\Controllers\ModelTestController::class,"TitleDelete"])->name("model_test.title.delete")->middleware("auth");


//Model Test Subject
Route::get("/model_test/subjects",[\App\Http\Controllers\ModelTestController::class,"Subjects"])->name("model_test.subjects")->middleware("auth");
Route::post("/model_test/subjects",[\App\Http\Controllers\ModelTestController::class,"SubjectsStore"])->name("model_test.subjects.store")->middleware("auth");
Route::post("/model_test/subjects/edit/{id}",[\App\Http\Controllers\ModelTestController::class,"SubjectsEdit"])->name("model_test.subjects.edit")->middleware("auth");
Route::get("/model_test/subjects/delete/{id}",[\App\Http\Controllers\ModelTestController::class,"SubjectsDelete"])->name("model_test.subjects.delete")->middleware("auth");


//Model Test Topic Section
Route::get("/model_test/topics",[\App\Http\Controllers\ModelTestController::class,"Topics"])->name("model_test.topics")->middleware("auth");
Route::post("/model_test/topics",[\App\Http\Controllers\ModelTestController::class,"TopicsStore"])->name("model_test.topics.store")->middleware("auth");
Route::post("/model_test/topics/edit/{id}",[\App\Http\Controllers\ModelTestController::class,"TopicsEdit"])->name("model_test.topics.edit")->middleware("auth");
Route::get("/model_test/topics/delete/{id}",[\App\Http\Controllers\ModelTestController::class,"TopicsDelete"])->name("model_test.topics.delete")->middleware("auth");

//Model Test Add
Route::match(['GET','POST'],"model_test",[\App\Http\Controllers\ModelTestController::class,"store"])->name("model_test.store")->middleware("auth");
Route::get("model_test/all",[\App\Http\Controllers\ModelTestController::class,"index"])->name("model_test.index")->middleware("auth");
Route::get("model_test/delete/{id}",[\App\Http\Controllers\ModelTestController::class,"delete"])->name("model_test.delete")->middleware("auth");


//Notifications
Route::get("/notification",[\App\Http\Controllers\NotificationController::class,"index"])->name("notification.index")->middleware("auth");
Route::post("/notification",[\App\Http\Controllers\NotificationController::class,"store"])->name("notification.store")->middleware("auth");


//Product
// Route::get("/product",[\App\Http\Controllers\ProductController::class,"index"])->name("product.index")->middleware("auth");
// Route::get("/product/store",function (){
//     return view("Product.store");
// })->name("product.store")->middleware("auth");
// Route::post("/product/store",[\App\Http\Controllers\ProductController::class,"store"])->name("product.store")->middleware("auth");
// Route::get("/product/edit/{id}",[\App\Http\Controllers\ProductController::class,"edit"])->name("product.edit")->middleware("auth");
// Route::post("/product/edit/{id}",[\App\Http\Controllers\ProductController::class,"editSave"])->name("product.edit")->middleware("auth");
// Route::get("/product/delete/{id}",[\App\Http\Controllers\ProductController::class,"delete"])->name("product.delete")->middleware("auth");
// Route::get("/product/orders",[\App\Http\Controllers\ProductController::class,"orders"])->name("product.orders")->middleware("auth");
// Route::get("/product/orders/{id}/{status}",[\App\Http\Controllers\ProductController::class,"OrderStatus"])->name("product.orders.status")->middleware("auth");



