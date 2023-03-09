<?php

namespace App\Http\Controllers;

use App\Models\VideoCourse;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Time;

class CoursesController extends Controller
{
   function index(){
       $data=VideoCourse::all();
       return view("VideoCourse.allcourse",["courses"=>$data]);
   }
   function edit($id){
       $data=VideoCourse::where("id",$id)->get();

       if(count($data)>0){
           return view("VideoCourse.edit",["data"=>$data[0],"id"=>$id]);
       }else{
           return view("notfound");
       }

   }
   function editSave($id,Request $request){

       if($request->file('thumbnail')!=null){
           $image = $request->file('thumbnail');
           $image_name = time().rand(1000,1000000).".".$image->getClientOriginalExtension();
           $image->move(public_path('/upload/video_course_thumbnail/'),$image_name);
           $path=public_path('/upload/video_course_thumbnail/').$image_name;

           $update=VideoCourse::where("id",$id)->update([
               "title"=>$request->title,
               "class"=>$request->class,
               "subject_name"=>$request->subject_name,
               "url"=>$request->url,
               "thumbnail"=>$path,
           ]);

           return redirect()->back();

       }else{

           $update=VideoCourse::where("id",$id)->update([
               "title"=>$request->title,
               "class"=>$request->class,
               "subject_name"=>$request->subject_name,
               "url"=>$request->url
           ]);

            return redirect()->back();
       }

   }
   function delete($id){

       VideoCourse::where("id",$id)->delete();
       return redirect()->back();
   }

   function store(Request $request){
       $image = $request->file('thumbnail');
       $image_name = time().rand(1000,1000000).".".$image->getClientOriginalExtension();
       $image->move(public_path('/upload/video_course_thumbnail/'),$image_name);
       $path=public_path('/upload/video_course_thumbnail/').$image_name;


       VideoCourse::insert([
           "title"=>$request->title,
           "class"=>$request->class,
           "subject_name"=>$request->subject_name,
           "url"=>$request->url,
           "thumbnail"=>$path
       ]);


       return redirect()->back();
   }

}
