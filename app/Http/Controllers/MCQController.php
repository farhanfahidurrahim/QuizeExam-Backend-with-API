<?php

namespace App\Http\Controllers;

use App\Models\ExamMcq;
use App\Models\ExamSubject;
use App\Models\ExamSubjectTopic;
use App\Models\Quiz;
use App\Models\QuizSubject;
use App\Models\QuizTopic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MCQController extends Controller
{
    function Subjects(){
        $data=ExamSubject::all();
        return view("Mcq.subject",["data"=>$data]);
    }
    function SubjectsStore(Request $request){

        ExamSubject::insert([
            "subject_name"=>$request->subject_name
        ]);
        return redirect()->back();

    }

    function SubjectsEdit($id,Request $request){

        ExamSubject::where("id",$id)->update([
            "subject_name"=>$request->subject_name
        ]);
        return redirect()->back();

    }

    function SubjectsDelete($id){
        ExamSubject::where("id",$id)->delete();
        ExamSubjectTopic::where("subject_id",$id)->delete();
        ExamMcq::where("subject_id",$id)->delete();
        return redirect()->back();
    }

    function Topics(){
        $subject_name=ExamSubject::all();
//        $data=DB::table("quiz_topics")->join("quiz_subject","quiz_topics.quiz_subject_id","=","quiz_subject.id")->get();
        $data=DB::table("exam_subjects")->join("exam_subject_topics","exam_subjects.id","=","exam_subject_topics.subject_id")->get();
        return view("Mcq.topic",["subject"=>$subject_name,"data"=>$data]);
    }
    function TopicsStore(Request $request){
        ExamSubjectTopic::insert([
            "subject_id"=>$request->subject_id,
            "topic_name"=>$request->topic_name,
        ]);
        return redirect()->back();
    }

    function TopicsEdit($id,Request $request){
        ExamSubjectTopic::where("id",$id)->update([
            "subject_id"=>$request->subject_id,
            "topic_name"=>$request->topic_name,
        ]);
        return redirect()->back();
    }

    function TopicsDelete($id){
        ExamSubjectTopic::where("id",$id)->delete();
        ExamMcq::where("topic_id",$id)->delete();
        return redirect()->back();
    }















    function store(Request $request){
        $subject_name=ExamSubject::all();
        $topic_name=ExamSubjectTopic::all();
        if($request->method()=="POST"){

            ExamMcq::insert([
                "subject_id"=>$request->subject_id,
                "topic_id"=>$request->topic_id,
                "question"=>$request->question,
                "option1"=>$request->option1,
                "option2"=>$request->option2,
                "option3"=>$request->option3,
                "option4"=>$request->option4,
                "correct_ans"=>$request->correct_ans,

            ]);
            return view("Mcq.store",["subjects"=>$subject_name,"topics"=>$topic_name]);

        }else{


            return view("Mcq.store",["subjects"=>$subject_name,"topics"=>$topic_name]);
        }




    }
    function index(){

        $data=DB::table("exam_mcqs")
            ->join("exam_subjects","exam_mcqs.subject_id","=","exam_subjects.id")
            ->join("exam_subject_topics","exam_mcqs.topic_id","=","exam_subject_topics.id")
            ->select("exam_mcqs.id","exam_mcqs.question","exam_mcqs.option1","exam_mcqs.option2","exam_mcqs.option3","exam_mcqs.option4","exam_mcqs.correct_ans","exam_subject_topics.topic_name","exam_subjects.subject_name")
            ->get();


        return view("mcq.index",["data"=>$data]);
    }

    function delete($id){
        ExamMcq::where("id",$id)->delete();

        return redirect()->back();

    }

}
