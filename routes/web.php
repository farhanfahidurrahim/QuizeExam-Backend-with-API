<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LearnController;
use App\Http\Controllers\VocabularyController;
use App\Http\Controllers\EbookController;
use App\Http\Controllers\CurrentAffairController;
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
    Route::DELETE('delete/{id}',[LearnController::class,'nounDelete'])->name('learn.noun.destroy');
    Route::get('pronoun',[LearnController::class,'pronoun'])->name('english.pronoun');
    Route::get('verb',[LearnController::class,'verb'])->name('english.verb')->middleware("auth");
    Route::get('adverb',[LearnController::class,'adverb'])->name('english.adverb')->middleware("auth");
});

Route::prefix('learn/english-literature/')->middleware('auth')->group(function(){

    Route::get('old-period',[LearnController::class,'oldPeriod'])->name('learn.english.oldperiod');
    Route::get('middle-period',[LearnController::class,'middlePeriod'])->name('learn.english.middleperiod');
    Route::get('romantic-period',[LearnController::class,'romanticPeriod'])->name('learn.english.romanticperiod');
});

Route::prefix('learn/bangla/')->middleware('auth')->group(function(){
    Route::post('store',[LearnController::class,'learnBanglaStore'])->name('learn.bangla.store');

    Route::get('language-grammer',[LearnController::class,'languageGrammer'])->name('bangla.languagegrammer');
    Route::get('dhoni-borno-juktoborno',[LearnController::class,'dhoniborno'])->name('bangla.dhoniborno');
    Route::get('prachin-zug',[LearnController::class,'prachinzug'])->name('bangla.prachinzug');
    Route::get('moddo-zug',[LearnController::class,'moddozug'])->name('bangla.moddozug');
    Route::get('modern-era',[LearnController::class,'adhunikzug'])->name('bangla.adhunikzug');
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
    Route::get('liberation-war',[LearnController::class,'liberationwar'])->name('bangladeshaff.liberationwar');
});

Route::prefix('learn/geography-environment/')->middleware('auth')->group(function(){
    Route::post('store',[LearnController::class,'geoEnvStore'])->name('learn.geographyEnv.store');

    Route::get('geography-universe',[LearnController::class,'geographyuniverse'])->name('geoenv.geouniverse');
    Route::get('map',[LearnController::class,'map'])->name('geoenv.map');
    Route::get('earth-strucutre',[LearnController::class,'earthStrucutre'])->name('geoenv.earthStrucutre');
    Route::get('bangladesh',[LearnController::class,'bangladesh'])->name('geoenv.bangladesh');
    Route::get('international-geography',[LearnController::class,'internationalGeo'])->name('geoenv.internationalGeo');
});

Route::prefix('learn/computer-ict/')->middleware('auth')->group(function(){
    Route::post('store',[LearnController::class,'computerIct'])->name('learn.computerIct.store');

    Route::get('computer-history',[LearnController::class,'computerHistory'])->name('compict.computerHistory');
    Route::get('computer-architec',[LearnController::class,'computerArchitec'])->name('compict.computerArchitecture');
    Route::get('computer-periferal',[LearnController::class,'computerPeriferal'])->name('compict.computerPeriferal');
});

Route::prefix('bank/')->middleware('auth')->group(function(){
    Route::post('store',[LearnController::class,'computerIct'])->name('bank.store');

    Route::get('english',[LearnController::class,'bankEnglish'])->name('bank.english');
    Route::get('math',[LearnController::class,'bankMath'])->name('bank.math');
    Route::get('bangla',[LearnController::class,'bankBangla'])->name('bank.bangla');
    Route::get('computer',[LearnController::class,'bankComputer'])->name('bank.computer');
});

Route::prefix('vocabulary/')->middleware('auth')->group(function(){
    Route::post('store',[VocabularyController::class,'vocabularyStore'])->name('vocabulary.store');

    Route::get('barrons-333',[VocabularyController::class,'barrons333'])->name('vocabulary.barrons333');
    Route::get('barrons-800',[VocabularyController::class,'barrons800'])->name('vocabulary.barrons800');
    Route::get('word-smart-1',[VocabularyController::class,'wordsmart1'])->name('vocabulary.wordsmart1');
    Route::get('word-smart-2',[VocabularyController::class,'wordsmart2'])->name('vocabulary.wordsmart2');
    Route::get('manhattan-1000',[VocabularyController::class,'manhattan'])->name('vocabulary.manhattan');
    Route::get('magoosh-1000',[VocabularyController::class,'magoosh'])->name('vocabulary.magoosh');
    Route::get('daily-editorial',[VocabularyController::class,'dailyedit'])->name('vocabulary.dailyeditorial');
    Route::DELETE('delete/{id}',[VocabularyController::class,'delete'])->name('vocabulary.destroy');
});

Route::prefix('current-affairs/')->middleware('auth')->group(function(){
    Route::post('store',[CurrentAffairController::class,'store'])->name('currentaffairs.store');
    Route::DELETE('delete/{id}',[CurrentAffairController::class,'delete'])->name('currentaffairs.destroy');

    Route::get('bangladesh',[CurrentAffairController::class,'bangladesh'])->name('currentaffairs.bangladesh');
    Route::get('international',[CurrentAffairController::class,'international'])->name('currentaffairs.international');
    Route::get('misc',[CurrentAffairController::class,'misc'])->name('currentaffairs.misc');
});

Route::prefix('e-book/')->middleware('auth')->group(function(){
    Route::post('store',[EbookController::class,'ebookStore'])->name('ebook.store');
    Route::DELETE('delete/{id}',[EbookController::class,'delete'])->name('ebook.destroy');

    Route::get('general-math-cls-10',[EbookController::class,'generalMath'])->name('ebook.generalMath');
    Route::get('higher-math-cls-10',[EbookController::class,'higherMath'])->name('ebook.higherMath');
    Route::get('general-science-cls-10',[EbookController::class,'generalScience'])->name('ebook.generalScience');

    Route::get('general-math-cls-8',[EbookController::class,'generalMath8'])->name('ebook.generalMath8');
    Route::get('higher-math-cls-8',[EbookController::class,'higherMath8'])->name('ebook.higherMath8');
    Route::get('general-science-cls-8',[EbookController::class,'generalScience8'])->name('ebook.generalScience8');

    Route::get('general-math-cls-7',[EbookController::class,'generalMath7'])->name('ebook.generalMath7');
    Route::get('higher-math-cls-7',[EbookController::class,'higherMath7'])->name('ebook.higherMath7');
    Route::get('general-science-cls-7',[EbookController::class,'generalScience7'])->name('ebook.generalScience7');
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



