<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\QuizSubject;
use App\Models\QuizTopic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    function Subjects(){
        $data=QuizSubject::all();
        return view("Quiz.subject",["data"=>$data]);
    }
    function SubjectsStore(Request $request){

        QuizSubject::insert([
            "quiz_subject"=>$request->quiz_subject
        ]);
        return redirect()->back();

    }

    function SubjectsEdit($id,Request $request){

        QuizSubject::where("id",$id)->update([
            "quiz_subject"=>$request->quiz_subject
        ]);
        return redirect()->back();

    }

    function SubjectsDelete($id){
        QuizSubject::where("id",$id)->delete();
        QuizTopic::where("quiz_subject",$id)->delete();
        Quiz::where("quiz_subject_id",$id)->delete();
        return redirect()->back();
    }

    function Topics(){
        $subject_name=QuizSubject::all();
//        $data=DB::table("quiz_topics")->join("quiz_subject","quiz_topics.quiz_subject_id","=","quiz_subject.id")->get();
        $data=DB::table("quiz_subject")->join("quiz_topics","quiz_subject.id","=","quiz_topics.quiz_subject_id")->get();
        return view("Quiz.topic",["subject"=>$subject_name,"data"=>$data]);
    }
    function TopicsStore(Request $request){
        QuizTopic::insert([
            "quiz_subject_id"=>$request->quiz_subject,
            "topic_name"=>$request->topic_name,
            ]);
        return redirect()->back();
    }

    function TopicsEdit($id,Request $request){
        QuizTopic::where("id",$id)->update([
            "quiz_subject_id"=>$request->quiz_subject,
            "topic_name"=>$request->topic_name,
        ]);
        return redirect()->back();
    }

    function TopicsDelete($id){
        QuizTopic::where("id",$id)->delete();
        Quiz::where("quiz_subject_id",$id)->delete();
        return redirect()->back();
    }















    function store(Request $request){
        $subject_name=QuizSubject::all();
        $topic_name=QuizTopic::all();
        if($request->method()=="POST"){

            Quiz::insert([
                "quiz_subject_id"=>$request->quiz_subject,
                "quiz_topics_id"=>$request->quiz_topic,
                "question"=>$request->question,
                "option1"=>$request->option1,
                "option2"=>$request->option2,
                "option3"=>$request->option3,
                "option4"=>$request->option4,
                "correct_ans"=>$request->correct_ans,

            ]);
            return view("Quiz.store",["subjects"=>$subject_name,"topics"=>$topic_name]);

        }else{


            return view("Quiz.store",["subjects"=>$subject_name,"topics"=>$topic_name]);
        }




    }
function index(){

        $data=DB::table("quizs")
            ->join("quiz_subject","quizs.quiz_subject_id","=","quiz_subject.id")
            ->join("quiz_topics","quizs.quiz_topics_id","=","quiz_topics.id")
            ->select("quizs.id","quiz_topics.topic_name","quiz_subject.quiz_subject","quizs.question","quizs.option1","quizs.option2","quizs.option3","quizs.option4","quizs.correct_ans")
            ->get();


        return view("Quiz.index",["data"=>$data]);

}


function delete($id){
    Quiz::where("id",$id)->delete();
    return redirect()->back();
}

}
