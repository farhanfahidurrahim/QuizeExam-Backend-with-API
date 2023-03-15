<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LearnController;
use App\Http\Controllers\VocabularyController;
use App\Http\Controllers\EbookController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\CurrentAffairController;
use App\Http\Controllers\CategoryController;
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


//Learn->English Grammer 
Route::prefix('learn/english-grammer/')->middleware('auth')->group(function(){

    Route::get('add-category',[CategoryController::class,'addCatEngGram'])->name('english.grammer.add');
    Route::post('store-category',[CategoryController::class,'storeCatEngGram'])->name('english.category.store');
    Route::DELETE('delete-category/{id}',[CategoryController::class,'deleteCatEngGram'])->name('enggram.cat.destroy');
    
    Route::get('index',[LearnController::class,'indexEnglishGrammer'])->name('english.grammer.index');
    Route::post('store',[LearnController::class,'storeIndexEnglishGrammer'])->name('english.grammer.store');
    Route::DELETE('delete/{id}',[LearnController::class,'deleteEngGram'])->name('english.grammer.destroy');
});

Route::get('index',[LearnController::class,'indexBlaa'])->name('learn.noun.destroy');

//Learn->English Literature 
Route::prefix('learn/english-literature/')->middleware('auth')->group(function(){

    Route::get('add-category',[CategoryController::class,'addCatEngLiter'])->name('english.literature.add');
    Route::post('store-category',[CategoryController::class,'storeCatEngLiter'])->name('english.lit.category.store');
    Route::DELETE('delete-category/{id}',[CategoryController::class,'deleteEngLit'])->name('englit.cat.destroy');
    
    Route::get('index',[LearnController::class,'indexEnglishLiterature'])->name('english.literature.index');
    Route::post('store',[LearnController::class,'storeIndexEnglishLiterature'])->name('english.literature.store');
    Route::DELETE('delete/{id}',[LearnController::class,'deleteEngLiter'])->name('eng.liter.destroy');
});

//Learn->Bangla Grammer
Route::prefix('learn/bangla-grammer/')->middleware('auth')->group(function(){

    Route::get('add-category',[CategoryController::class,'addCatBnGram'])->name('bangla.grammer.add');
    Route::post('store-category',[CategoryController::class,'storeCatBnGram'])->name('bangla.gram.category.store');
    Route::DELETE('delete-category/{id}',[CategoryController::class,'deleteCatBnGram'])->name('banglagram.cat.destroy');

    Route::get('index',[LearnController::class,'indexBnGram'])->name('bangla.grammer.index');
    Route::post('store',[LearnController::class,'storeIndexBnGram'])->name('bangla.grammer.store');
    Route::DELETE('delete/{id}',[LearnController::class,'deleteBnGram'])->name('bangla.grammer.destroy');
});

//Learn->Bangla Literature
Route::prefix('learn/bangla-literature/')->middleware('auth')->group(function(){

    Route::get('add-category',[CategoryController::class,'addCatBnLit'])->name('bangla.lit.cat.add');
    Route::post('store-category',[CategoryController::class,'storeCatBnLit'])->name('bangla.lit.cat.store');
    Route::DELETE('delete-category/{id}',[CategoryController::class,'deleteCatBnLit'])->name('banglalit.cat.destroy');

    Route::get('index',[LearnController::class,'indexBnLit'])->name('bangla.literature.index');
    Route::post('store',[LearnController::class,'storeIndexBnLit'])->name('bangla.literature.store');
    Route::DELETE('delete/{id}',[LearnController::class,'deleteBnLiter'])->name('bangla.literature.destroy');
});

//Learn->Math
Route::prefix('learn/math/')->middleware('auth')->group(function(){

    Route::get('add-category',[CategoryController::class,'addCatMath'])->name('math.cat.add');
    Route::post('store-category',[CategoryController::class,'storeCatMath'])->name('math.cat.store');
    Route::DELETE('delete-category/{id}',[CategoryController::class,'deleteCatMath'])->name('math.cat.destroy');

    Route::get('index',[LearnController::class,'indexMath'])->name('math.index');
    Route::post('store',[LearnController::class,'storeIndexMath'])->name('math.store');
    Route::DELETE('delete/{id}',[LearnController::class,'deleteMath'])->name('math.destroy');
});

//Learn->International Affairs
Route::prefix('learn/international-affairs/')->middleware('auth')->group(function(){

    Route::get('add-category',[CategoryController::class,'addCatIntAff'])->name('intaff.cat.add');
    Route::post('store-category',[CategoryController::class,'storeCatIntAff'])->name('intaff.cat.store');
    Route::DELETE('delete-category/{id}',[CategoryController::class,'deleteCatIntAff'])->name('intaff.cat.destroy');

    Route::get('index',[LearnController::class,'indexIntAff'])->name('intaff.index');
    Route::post('store',[LearnController::class,'storeIndexIntAff'])->name('intaff.store');
    Route::DELETE('delete/{id}',[LearnController::class,'deleteIntAff'])->name('intaff.destroy');
});

//Learn->Bangladesh Affairs
Route::prefix('learn/bangladesh-affairs/')->middleware('auth')->group(function(){

    Route::get('add-category',[CategoryController::class,'addCatBdAff'])->name('bdaff.cat.add');
    Route::post('store-category',[CategoryController::class,'storeCatBdAff'])->name('bdaff.cat.store');
    Route::DELETE('delete-category/{id}',[CategoryController::class,'deleteCatBdAff'])->name('bdaff.cat.destroy');

    Route::get('index',[LearnController::class,'indexBdAff'])->name('bdaff.index');
    Route::post('store',[LearnController::class,'storeIndexBdAff'])->name('bdaff.store');
    Route::DELETE('delete/{id}',[LearnController::class,'deleteBdAff'])->name('bdaff.destroy');
});

//Learn->Geography Environment
Route::prefix('learn/geography-environment/')->middleware('auth')->group(function(){

    Route::get('add-category',[CategoryController::class,'addCatGeoEnv'])->name('geoenv.cat.add');
    Route::post('store-category',[CategoryController::class,'storeCatGeoEnv'])->name('geoenv.cat.store');
    Route::DELETE('delete-category/{id}',[CategoryController::class,'deleteCatGeoEnv'])->name('geoenv.cat.destroy');

    Route::get('index',[LearnController::class,'indexGeoEnv'])->name('geoenv.index');
    Route::post('store',[LearnController::class,'storeIndexGeoEnv'])->name('geoenv.store');
    Route::DELETE('delete/{id}',[LearnController::class,'deleteGeoEnv'])->name('geoenv.destroy');
});

//Learn->Computer Ict
Route::prefix('learn/computer-ict/')->middleware('auth')->group(function(){

    Route::get('add-category',[CategoryController::class,'addCatCompIct'])->name('compict.cat.add');
    Route::post('store-category',[CategoryController::class,'storeCatCompIct'])->name('compict.cat.store');
    Route::DELETE('delete-category/{id}',[CategoryController::class,'deleteCatCompIct'])->name('compict.cat.destroy');

    Route::get('index',[LearnController::class,'indexCompIct'])->name('compict.index');
    Route::post('store',[LearnController::class,'storeIndexCompIct'])->name('compict.store');
    Route::DELETE('delete/{id}',[LearnController::class,'deleteCompIct'])->name('compict.destroy');
});

//Learn->Mental Skill
Route::prefix('learn/mental-skill/')->middleware('auth')->group(function(){

    Route::get('add-category',[CategoryController::class,'addCatMentSkill'])->name('mentalskill.cat.add');
    Route::post('store-category',[CategoryController::class,'storeCatMentSkill'])->name('mentalskill.cat.store');
    Route::DELETE('delete-category/{id}',[CategoryController::class,'deleteCatMentSkill'])->name('mentalskill.cat.destroy');

    Route::get('index',[LearnController::class,'indexMentSkill'])->name('mentalskill.index');
    Route::post('store',[LearnController::class,'storeIndexMentSkill'])->name('mentalskill.store');
    Route::DELETE('delete/{id}',[LearnController::class,'deleteMentSkill'])->name('mentalskill.destroy');
});

//Learn : Ethics Value Governance | evg
Route::prefix('learn/ethics-value-goverance/')->middleware('auth')->group(function(){

    Route::get('add-category',[CategoryController::class,'addCatEvg'])->name('evg.cat.add');
    Route::post('store-category',[CategoryController::class,'storeCatEvg'])->name('evg.cat.store');
    Route::DELETE('delete-category/{id}',[CategoryController::class,'deleteCatEvg'])->name('evg.cat.destroy');

    Route::get('index',[LearnController::class,'indexEvg'])->name('evg.index');
    Route::post('store',[LearnController::class,'storeIndexEvg'])->name('evg.store');
    Route::DELETE('delete/{id}',[LearnController::class,'deleteEvg'])->name('evg.destroy');
});

//Bank Part : English
Route::prefix('bank/english/')->middleware('auth')->group(function(){
    Route::post('storeddd',[BankController::class,'storeBank'])->name('bank.store');

    Route::get('add-category',[CategoryController::class,'addCatBankEng'])->name('bank.english.addcat');
    Route::post('store-category',[CategoryController::class,'storeCatBankEng'])->name('bank.english.storecat');
    Route::DELETE('delete-category/{id}',[CategoryController::class,'deleteCatBankEng'])->name('bank.engcat.destroy');

    Route::get('index',[BankController::class,'indexBankEnglish'])->name('bank.english.index');
    Route::post('store',[BankController::class,'storeBankEnglish'])->name('bank.english.store');
    Route::DELETE('delete/{id}',[BankController::class,'deleteBankEnglish'])->name('bank.english.destroy');
});

//Bank Part : Bangla
Route::prefix('bank/bangla/')->middleware('auth')->group(function(){

    Route::get('add-category',[CategoryController::class,'addCatBankBn'])->name('bank.bangla.addcat');
    Route::post('store-category',[CategoryController::class,'storeCatBankBn'])->name('bank.bangla.storecat');
    Route::DELETE('delete-category/{id}',[CategoryController::class,'deleteCatBankBn'])->name('bank.bangcat.destroy');

    Route::get('index',[BankController::class,'indexBankBangla'])->name('bank.bangla.index');
    Route::post('store',[BankController::class,'storeBankBangla'])->name('bank.bangla.store');
    Route::DELETE('delete/{id}',[BankController::class,'deleteBankBangla'])->name('bank.bangla.destroy');
});

//Vocabulary Part :
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

//Current Affairs :
Route::prefix('current-affairs/')->middleware('auth')->group(function(){
    Route::post('store',[CurrentAffairController::class,'store'])->name('currentaffairs.store');
    Route::DELETE('delete/{id}',[CurrentAffairController::class,'delete'])->name('currentaffairs.destroy');

    Route::get('bangladesh',[CurrentAffairController::class,'bangladesh'])->name('currentaffairs.bangladesh');
    Route::get('international',[CurrentAffairController::class,'international'])->name('currentaffairs.international');
    Route::get('misc',[CurrentAffairController::class,'misc'])->name('currentaffairs.misc');
});

//E book | Nine Ten
Route::prefix('e-book/class-nine-ten/')->middleware('auth')->group(function(){

    Route::get('add-category',[CategoryController::class,'addCatNineTen'])->name('nineten.cat.add');
    Route::post('store-category',[CategoryController::class,'storeCatNineTen'])->name('nineten.cat.store');
    Route::DELETE('delete-category/{id}',[CategoryController::class,'deleteCatNineTen'])->name('nineten.cat.destroy');

    Route::get('index',[EbookController::class,'indexNineTen'])->name('nineten.index');
    Route::post('store',[EbookController::class,'storeIndexNineTen'])->name('nineten.store');
    Route::DELETE('delete/{id}',[EbookController::class,'deleteIndexNineTen'])->name('nineten.destroy');
});

//E book | Eight
Route::prefix('e-book/class-eight/')->middleware('auth')->group(function(){

    Route::get('add-category',[CategoryController::class,'addCatEight'])->name('eight.cat.add');
    Route::post('store-category',[CategoryController::class,'storeCatEight'])->name('eight.cat.store');
    Route::DELETE('delete-category/{id}',[CategoryController::class,'deleteCatEight'])->name('eight.cat.destroy');

    Route::get('index',[EbookController::class,'indexEight'])->name('eight.index');
    Route::post('store',[EbookController::class,'storeIndexEight'])->name('eight.store');
    Route::DELETE('delete/{id}',[EbookController::class,'deleteIndexEight'])->name('eight.destroy');
});

//E book | Seven
Route::prefix('e-book/class-seven/')->middleware('auth')->group(function(){

    Route::get('add-category',[CategoryController::class,'addCatSeven'])->name('seven.cat.add');
    Route::post('store-category',[CategoryController::class,'storeCatSeven'])->name('seven.cat.store');
    Route::DELETE('delete-category/{id}',[CategoryController::class,'deleteCatSeven'])->name('seven.cat.destroy');

    Route::get('index',[EbookController::class,'indexSeven'])->name('seven.index');
    Route::post('store',[EbookController::class,'storeIndexSeven'])->name('seven.store');
    Route::DELETE('delete/{id}',[EbookController::class,'deleteIndexSeven'])->name('seven.destroy');
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



