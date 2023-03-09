<?php

namespace App\Http\Controllers;

use App\Models\ExamMcq;
use App\Models\ExamSubject;
use App\Models\ExamSubjectTopic;
use App\Models\ModelTestMcq;
use App\Models\ModelTestSubject;
use App\Models\ModelTestTitle;
use App\Models\ModelTestTopic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModelTestController extends Controller
{
    function Title(){
        $data=ModelTestTitle::all();
        return view("ModelTest.title",["data"=>$data]);
    }
    function TitleStore(Request $request){

        ModelTestTitle::insert([
            "test_title"=>$request->test_title
        ]);
        return redirect()->back();

    }

    function TitleEdit($id,Request $request){

        ModelTestTitle::where("id",$id)->update([
            "test_title"=>$request->test_title
        ]);
        return redirect()->back();

    }

    function TitleDelete($id){
        ModelTestTitle::where("id",$id)->delete();
        ModelTestSubject::where("title_id",$id)->delete();
        ModelTestTopic::where("title_id",$id)->delete();
        ModelTestMcq::where("title_id",$id)->delete();
        return redirect()->back();
    }






    function Subjects(){
        $title=ModelTestTitle::all();
//        $data=DB::table("quiz_topics")->join("quiz_subject","quiz_topics.quiz_subject_id","=","quiz_subject.id")->get();
        $data=DB::table("model_test_titles")->join("model_test_subjects","model_test_titles.id","=","model_test_subjects.title_id")->get();
        return view("ModelTest.subject",["title"=>$title,"data"=>$data]);
    }
    function SubjectsStore(Request $request){
        ModelTestSubject::insert([
            "title_id"=>$request->title_id,
            "test_subject"=>$request->test_subject,
        ]);
        return redirect()->back();
    }

    function SubjectsEdit($id,Request $request){
        ModelTestSubject::where("id",$id)->update([
            "title_id"=>$request->title_id,
            "test_subject"=>$request->test_subject,
        ]);
        return redirect()->back();
    }

    function SubjectsDelete($id){
        ModelTestSubject::where("id",$id)->delete();
        ModelTestTopic::where("title_id",$id)->delete();
        ModelTestMcq::where("title_id",$id)->delete();
        return redirect()->back();
    }



    function Topics(){
        $subject_name=ModelTestSubject::all();
        $title=ModelTestTitle::all();
        $data=DB::table("model_test_topics")
            ->join("model_test_titles","model_test_topics.title_id","=","model_test_titles.id")
            ->join("model_test_subjects","model_test_subjects.id","=","model_test_subjects.id")
            ->select("model_test_topics.*","model_test_titles.test_title","model_test_subjects.test_subject")
            ->get();


             return view("ModelTest.topic",["subject"=>$subject_name,"title"=>$title,"data"=>$data]);
    }
    function TopicsStore(Request $request){
        ModelTestTopic::insert([
            "title_id"=>$request->title_id,
            "test_subject_id"=>$request->test_subject_id,
            "test_topic_name"=>$request->test_topic_name,
        ]);
        return redirect()->back();
    }

    function TopicsEdit($id,Request $request){
        ModelTestTopic::where("id",$id)->update([
            "title_id"=>$request->title_id,
            "test_subject_id"=>$request->test_subject_id,
            "test_topic_name"=>$request->test_topic_name,
        ]);
        return redirect()->back();
    }

    function TopicsDelete($id){
        ModelTestTopic::where("id",$id)->delete();
        ModelTestMcq::where("title_id",$id)->delete();
        return redirect()->back();
    }


    function store(Request $request){

        $title=ModelTestTitle::all();
        $subject_name=ModelTestSubject::all();
        $topic_name=ModelTestTopic::all();
        if($request->method()=="POST"){

            ModelTestMcq::insert([
                "title_id"=>$request->title_id,
                "test_subject_id"=>$request->test_subject_id,
                "test_topic_id"=>$request->test_topic_id,
                "question"=>$request->question,
                "option1"=>$request->option1,
                "option2"=>$request->option2,
                "option3"=>$request->option3,
                "option4"=>$request->option4,
                "correct_ans"=>$request->correct_ans,

            ]);
            return view("ModelTest.store",["subjects"=>$subject_name,"topics"=>$topic_name,"title"=>$title]);

        }else{


            return view("ModelTest.store",["subjects"=>$subject_name,"topics"=>$topic_name,"title"=>$title]);
        }


    }

    function index(){
        $data=DB::table("model_test_mcqs")
            ->join("model_test_titles","model_test_mcqs.title_id","=","model_test_titles.id")
            ->join("model_test_subjects","model_test_mcqs.test_subject_id","=","model_test_subjects.id")
            ->join("model_test_topics","model_test_mcqs.test_topic_id","=","model_test_topics.id")
            ->select("model_test_mcqs.id","model_test_mcqs.question","model_test_mcqs.correct_ans","model_test_mcqs.option1","model_test_mcqs.option2","model_test_mcqs.option3","model_test_mcqs.option4","model_test_titles.test_title","model_test_subjects.test_subject","model_test_topics.test_topic_name")
            ->get();

        return view("ModelTest.index",["data"=>$data]);
    }

function delete($id){
    ModelTestMcq::where("id",$id)->delete();

    return redirect()->back();
}





}
