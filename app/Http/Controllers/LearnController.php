<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryEnglish;
use App\Models\CategoryEnglishLiterature;
use App\Models\CategoryBanglaGrammer;
use App\Models\CategoryBanglaLiterature;
use App\Models\CategoryMath;
use App\Models\Learn;
use App\Models\LearnEnglishLiterature;
use App\Models\LearnBanglaGrammer;
use App\Models\LearnBanglaLiterature;
use App\Models\LearnMath;
use Illuminate\Support\Facades\Validator;
use Session;
use Illuminate\Support\Str;

class LearnController extends Controller
{   
    public function indexEnglishGrammer()
    {   
        $data=Learn::where('subject_name','=','English Grammer')->orderBy('topic_name', 'desc')->get();
        $category=CategoryEnglish::all();
        return view('Learn.EnglishGrammer.index',compact('category','data'));
    }

    public function storeIndexEnglishGrammer(Request $request){
        //dd($request->all());
        $validator = Validator::make($request->all(), [
              'title' => 'required',
              'pdf_file_path' => 'required|mimes:pdf'
        ]);

        $slug=Str::slug($request->title, '-');

        if ($validator->fails()) {
          return redirect()->Back()->withInput()->withErrors($validator);
        }else{

              if($request->file('pdf_file_path')) {

                    $file = $request->file('pdf_file_path');
                    //$filename = $file->hashName();
                    $filename = $slug.'.'.$file->getClientOriginalExtension();;
                    // Upload file
                    $file->move(public_path('file/pdf/learn/english_grammer/'),$filename);
                    // path
                    $path="file/pdf/learn/english_grammer/$filename";

                    // Insert record
                    $insertData_arr = array(
                        'subject_name' => $request->subject_name,
                        'topic_name' => $request->topic_name,
                        'title' => $request->title,
                        'pdf_file_path' => $path,
                    );
                    //dd($insertData_arr);
                    Learn::create($insertData_arr);

                    // Session
                    Session::flash('alert-class', 'alert-success');
                    Session::flash('message','Record inserted successfully.');

                }else{

                    // Session
                    Session::flash('alert-class', 'alert-danger');
                    Session::flash('message','Record not inserted');
            }

        }

        return redirect()->back();
    }

    public function delete($id)
    {
        $data = Learn::findOrFail($id);
        @unlink($data->pdf_file_path);
        $data->delete();

        return redirect()->back();
    }

    ///////////////////////////English Literature/////////////////////////////////

    public function indexEnglishLiterature()
    {   
        $data=LearnEnglishLiterature::where('subject_name','=','English Literature')->orderBy('topic_name', 'desc')->get();
        $category=CategoryEnglishLiterature::all();
        return view('Learn.EnglishLiterature.index',compact('category','data'));
    }

    public function storeIndexEnglishLiterature(Request $request){
        //dd($request->all());
        $validator = Validator::make($request->all(), [
              'title' => 'required',
              'pdf_file_path' => 'required|mimes:pdf'
        ]);

        $slug=Str::slug($request->title, '-');

        if ($validator->fails()) {
          return redirect()->Back()->withInput()->withErrors($validator);
        }else{

              if($request->file('pdf_file_path')) {

                    $file = $request->file('pdf_file_path');
                    //$filename = $file->hashName();
                    $filename = $slug.'.'.$file->getClientOriginalExtension();;
                    // Upload file
                    $file->move(public_path('file/pdf/learn/english_literature/'),$filename);
                    // path
                    $path="file/pdf/learn/english_literature/$filename";

                    // Insert record
                    $insertData_arr = array(
                        'subject_name' => $request->subject_name,
                        'topic_name' => $request->topic_name,
                        'title' => $request->title,
                        'pdf_file_path' => $path,
                    );
                    //dd($insertData_arr);
                    LearnEnglishLiterature::create($insertData_arr);

                    // Session
                    Session::flash('alert-class', 'alert-success');
                    Session::flash('message','Record inserted successfully.');

                }else{

                    // Session
                    Session::flash('alert-class', 'alert-danger');
                    Session::flash('message','Record not inserted');
            }

        }

        return redirect()->back();
    }

    ///////////////////////Bangla Grammer////////////////////////////////

    public function storeIndexBnGram(Request $request){
        //dd($request->all());
        $validator = Validator::make($request->all(), [
              'title' => 'required',
              'pdf_file_path' => 'required|mimes:pdf'
        ]);

        $slug=Str::slug($request->title, '-');

        if ($validator->fails()) {
          return redirect()->Back()->withInput()->withErrors($validator);
        }else{

              if($request->file('pdf_file_path')) {

                    $file = $request->file('pdf_file_path');
                    //$filename = $file->hashName();
                    $filename = $slug.'.'.$file->getClientOriginalExtension();;
                    // Upload file
                    $file->move(public_path('file/pdf/learn/bangla_grammer/'),$filename);
                    // path
                    $path="file/pdf/learn/bangla_grammer/$filename";

                    // Insert record
                    $insertData_arr = array(
                        'subject_name' => $request->subject_name,
                        'topic_name' => $request->topic_name,
                        'title' => $request->title,
                        'pdf_file_path' => $path,
                    );
                    //dd($insertData_arr);
                    LearnBanglaGrammer::create($insertData_arr);

                    // Session
                    Session::flash('alert-class', 'alert-success');
                    Session::flash('message','Record inserted successfully.');

                }else{

                    // Session
                    Session::flash('alert-class', 'alert-danger');
                    Session::flash('message','Record not inserted');
            }

        }

        return redirect()->back();
    }

    public function indexBnGram()
    {
        $data = LearnBanglaGrammer::where('subject_name','=','Language Grammer')->get();
        $category=CategoryBanglaGrammer::all();
        return view('Learn.BanglaGrammer.index',compact('data','category'));
    }

    ///////////////////////Bangla Literature////////////////////////////////

    public function storeIndexBnLit(Request $request){
        //dd($request->all());
        $validator = Validator::make($request->all(), [
              'title' => 'required',
              'pdf_file_path' => 'required|mimes:pdf'
        ]);

        $slug=Str::slug($request->title, '-');

        if ($validator->fails()) {
          return redirect()->Back()->withInput()->withErrors($validator);
        }else{

              if($request->file('pdf_file_path')) {

                    $file = $request->file('pdf_file_path');
                    //$filename = $file->hashName();
                    $filename = $slug.'.'.$file->getClientOriginalExtension();;
                    // Upload file
                    $file->move(public_path('file/pdf/learn/bangla_literature/'),$filename);
                    // path
                    $path="file/pdf/learn/bangla_literature/$filename";

                    // Insert record
                    $insertData_arr = array(
                        'subject_name' => $request->subject_name,
                        'topic_name' => $request->topic_name,
                        'title' => $request->title,
                        'pdf_file_path' => $path,
                    );
                    //dd($insertData_arr);
                    LearnBanglaLiterature::create($insertData_arr);

                    // Session
                    Session::flash('alert-class', 'alert-success');
                    Session::flash('message','Record inserted successfully.');

                }else{

                    // Session
                    Session::flash('alert-class', 'alert-danger');
                    Session::flash('message','Record not inserted');
            }

        }

        return redirect()->back();
    }

    public function indexBnLit()
    {
        $data = LearnBanglaLiterature::where('subject_name','=','Bangla Literature')->get();
        $category=CategoryBanglaLiterature::all();
        return view('Learn.BanglaLiterature.index',compact('data','category'));
    }

    /////////////////////// Math ////////////////////////////////

    public function storeIndexMath(Request $request){
        //dd($request->all());
        $validator = Validator::make($request->all(), [
              'title' => 'required',
              'pdf_file_path' => 'required|mimes:pdf'
        ]);

        $slug=Str::slug($request->title, '-');

        if ($validator->fails()) {
          return redirect()->Back()->withInput()->withErrors($validator);
        }else{

              if($request->file('pdf_file_path')) {

                    $file = $request->file('pdf_file_path');
                    //$filename = $file->hashName();
                    $filename = $slug.'.'.$file->getClientOriginalExtension();;
                    // Upload file
                    $file->move(public_path('file/pdf/learn/math/'),$filename);
                    // path
                    $path="file/pdf/learn/math/$filename";

                    // Insert record
                    $insertData_arr = array(
                        'subject_name' => $request->subject_name,
                        'topic_name' => $request->topic_name,
                        'title' => $request->title,
                        'pdf_file_path' => $path,
                    );
                    //dd($insertData_arr);
                    LearnMath::create($insertData_arr);

                    // Session
                    Session::flash('alert-class', 'alert-success');
                    Session::flash('message','Record inserted successfully.');

                }else{

                    // Session
                    Session::flash('alert-class', 'alert-danger');
                    Session::flash('message','Record not inserted');
            }

        }

        return redirect()->back();
    }

    public function indexMath()
    {
        $data = LearnMath::get();
        $category=CategoryMath::all();
        return view('Learn.Math.index',compact('data','category'));
    }

    ///////////////////////////////////////////////////////

    public function learnIntAffStore(Request $request){
        //dd($request->all());
        $validator = Validator::make($request->all(), [
              'title' => 'required',
              'pdf_file_path' => 'required|mimes:pdf'
        ]);

        $slug=Str::slug($request->title, '-');

        if ($validator->fails()) {
          return redirect()->Back()->withInput()->withErrors($validator);
        }else{

              if($request->file('pdf_file_path')) {

                    $file = $request->file('pdf_file_path');
                    //$filename = $file->hashName();
                    $filename = $slug.'.'.$file->getClientOriginalExtension();;
                    // Upload file
                    $file->move(public_path('file/pdf/internationalaffair/'),$filename);
                    // path
                    $path="file/pdf/internationalaffair/$filename";

                    // Insert record
                    $insertData_arr = array(
                        'subject_name' => $request->subject_name,
                        'topic_name' => $request->topic_name,
                        'title' => $request->title,
                        'pdf_file_path' => $path,
                    );
                    //dd($insertData_arr);
                    Learn::create($insertData_arr);

                    // Session
                    Session::flash('alert-class', 'alert-success');
                    Session::flash('message','Record inserted successfully.');

                }else{

                    // Session
                    Session::flash('alert-class', 'alert-danger');
                    Session::flash('message','Record not inserted');
            }

        }

        return redirect()->back();
    }

    public function worldintro()
    {
        $data = Learn::where('topic_name','=','World Intro')->get();
        return view('Learn.InternationalAffair.worldintro',compact('data'));
    }

    public function asia()
    {
        $data = Learn::where('topic_name','=','Asia')->get();
        return view('Learn.InternationalAffair.asia',compact('data'));
    }

    public function europe()
    {
        $data = Learn::where('topic_name','=','Europe')->get();
        return view('Learn.InternationalAffair.europe',compact('data'));
    }

    public function africa()
    {
        $data = Learn::where('topic_name','=','Africa')->get();
        return view('Learn.InternationalAffair.africa',compact('data'));
    }

    public function australia()
    {
        $data = Learn::where('topic_name','=','Australia')->get();
        return view('Learn.InternationalAffair.australia',compact('data'));
    }

    ///////////////////////////////////////////////////////

    public function bangladeshAffStore(Request $request){
        //dd($request->all());
        $validator = Validator::make($request->all(), [
              'title' => 'required',
              'pdf_file_path' => 'required|mimes:pdf'
        ]);

        $slug=Str::slug($request->title, '-');

        if ($validator->fails()) {
          return redirect()->Back()->withInput()->withErrors($validator);
        }else{

              if($request->file('pdf_file_path')) {

                    $file = $request->file('pdf_file_path');
                    //$filename = $file->hashName();
                    $filename = $slug.'.'.$file->getClientOriginalExtension();;
                    // Upload file
                    $file->move(public_path('file/pdf/bangladeshaffair/'),$filename);
                    // path
                    $path="file/pdf/bangladeshaffair/$filename";

                    // Insert record
                    $insertData_arr = array(
                        'subject_name' => $request->subject_name,
                        'topic_name' => $request->topic_name,
                        'title' => $request->title,
                        'pdf_file_path' => $path,
                    );
                    //dd($insertData_arr);
                    Learn::create($insertData_arr);

                    // Session
                    Session::flash('alert-class', 'alert-success');
                    Session::flash('message','Record inserted successfully.');

                }else{

                    // Session
                    Session::flash('alert-class', 'alert-danger');
                    Session::flash('message','Record not inserted');
            }

        }

        return redirect()->back();
    }

    public function britishperiod()
    {
        $data = Learn::where('topic_name','=','British Period')->get();
        return view('Learn.BangladeshAffair.british_period',compact('data'));
    }

    public function pakiperiod()
    {
        $data = Learn::where('topic_name','=','Pakistan Period')->get();
        return view('Learn.BangladeshAffair.paki_period',compact('data'));
    }

    public function liberationwar()
    {
        $data = Learn::where('topic_name','=','Liberation War')->get();
        return view('Learn.BangladeshAffair.liberation_war',compact('data'));
    }

    ///////////////////////////////////////////////////////

    public function geoEnvStore(Request $request){
        //dd($request->all());
        $validator = Validator::make($request->all(), [
              'title' => 'required',
              'pdf_file_path' => 'required|mimes:pdf'
        ]);

        $slug=Str::slug($request->title, '-');

        if ($validator->fails()) {
          return redirect()->Back()->withInput()->withErrors($validator);
        }else{

              if($request->file('pdf_file_path')) {

                    $file = $request->file('pdf_file_path');
                    //$filename = $file->hashName();
                    $filename = $slug.'.'.$file->getClientOriginalExtension();;
                    // Upload file
                    $file->move(public_path('file/pdf/geographyenvironment/'),$filename);
                    // path
                    $path="file/pdf/geographyenvironment/$filename";

                    // Insert record
                    $insertData_arr = array(
                        'subject_name' => $request->subject_name,
                        'topic_name' => $request->topic_name,
                        'title' => $request->title,
                        'pdf_file_path' => $path,
                    );
                    //dd($insertData_arr);
                    Learn::create($insertData_arr);

                    // Session
                    Session::flash('alert-class', 'alert-success');
                    Session::flash('message','Record inserted successfully.');

                }else{

                    // Session
                    Session::flash('alert-class', 'alert-danger');
                    Session::flash('message','Record not inserted');
            }

        }

        return redirect()->back();
    }

    public function geographyuniverse()
    {
        $data = Learn::where('topic_name','=','Geography Universe')->get();
        return view('Learn.GeographyEnvironment.geographyuniverse',compact('data'));
    }

    public function map()
    {
        $data = Learn::where('topic_name','=','Map')->get();
        return view('Learn.GeographyEnvironment.map',compact('data'));
    }

    public function earthStrucutre()
    {
        $data = Learn::where('topic_name','=','Earth Structure')->get();
        return view('Learn.GeographyEnvironment.earth_structure',compact('data'));
    }

    public function bangladesh()
    {
        $data = Learn::where('topic_name','=','Bangladesh')->get();
        return view('Learn.GeographyEnvironment.bangladesh',compact('data'));
    }

    public function internationalGeo()
    {
        $data = Learn::where('topic_name','=','International Geography')->get();
        return view('Learn.GeographyEnvironment.international_geography',compact('data'));
    }

    ///////////////////////////////////////////////////////

    public function computerIct(Request $request){
        //dd($request->all());
        $validator = Validator::make($request->all(), [
              'title' => 'required',
              'pdf_file_path' => 'required|mimes:pdf'
        ]);

        $slug=Str::slug($request->title, '-');

        if ($validator->fails()) {
          return redirect()->Back()->withInput()->withErrors($validator);
        }else{

              if($request->file('pdf_file_path')) {

                    $file = $request->file('pdf_file_path');
                    //$filename = $file->hashName();
                    $filename = $slug.'.'.$file->getClientOriginalExtension();;
                    // Upload file
                    $file->move(public_path('file/pdf/computerIct/'),$filename);
                    // path
                    $path="file/pdf/computerIct/$filename";

                    // Insert record
                    $insertData_arr = array(
                        'subject_name' => $request->subject_name,
                        'topic_name' => $request->topic_name,
                        'title' => $request->title,
                        'pdf_file_path' => $path,
                    );
                    //dd($insertData_arr);
                    Learn::create($insertData_arr);

                    // Session
                    Session::flash('alert-class', 'alert-success');
                    Session::flash('message','Record inserted successfully.');

                }else{

                    // Session
                    Session::flash('alert-class', 'alert-danger');
                    Session::flash('message','Record not inserted');
            }

        }

        return redirect()->back();
    }

    public function computerHistory()
    {
        $data = Learn::where('topic_name','=','Computer History')->get();
        return view('Learn.ComputerIct.computer_history',compact('data'));
    }

    public function computerArchitec()
    {
        $data = Learn::where('topic_name','=','Computer Architec')->get();
        return view('Learn.ComputerIct.computer_architec',compact('data'));
    }

    public function computerPeriferal()
    {
        $data = Learn::where('topic_name','=','Computer Periferal')->get();
        return view('Learn.ComputerIct.computer_periferal',compact('data'));
    }

    ///////////////////////////////////////////////////////

    public function bankStore(Request $request){
        //dd($request->all());
        $validator = Validator::make($request->all(), [
              'title' => 'required',
              'pdf_file_path' => 'required|mimes:pdf'
        ]);

        $slug=Str::slug($request->title, '-');

        if ($validator->fails()) {
          return redirect()->Back()->withInput()->withErrors($validator);
        }else{

              if($request->file('pdf_file_path')) {

                    $file = $request->file('pdf_file_path');
                    //$filename = $file->hashName();
                    $filename = $slug.'.'.$file->getClientOriginalExtension();;
                    // Upload file
                    $file->move(public_path('file/pdf/computerIct/'),$filename);
                    // path
                    $path="file/pdf/computerIct/$filename";

                    // Insert record
                    $insertData_arr = array(
                        'subject_name' => $request->subject_name,
                        'topic_name' => $request->topic_name,
                        'title' => $request->title,
                        'pdf_file_path' => $path,
                    );
                    //dd($insertData_arr);
                    Learn::create($insertData_arr);

                    // Session
                    Session::flash('alert-class', 'alert-success');
                    Session::flash('message','Record inserted successfully.');

                }else{

                    // Session
                    Session::flash('alert-class', 'alert-danger');
                    Session::flash('message','Record not inserted');
            }

        }

        return redirect()->back();
    }

    public function bankEnglish()
    {
        $data = Learn::where('subject_name','=','English')->get();
        return view('Bank.english',compact('data'));
    }

    public function bankMath()
    {
        $data = Learn::where('subject_name','=','Math')->get();
        return view('Bank.math',compact('data'));
    }

    public function bankBangla()
    {
        $data = Learn::where('subject_name','=','Bangla')->get();
        return view('Bank.bangla',compact('data'));
    }

    public function bankComputer()
    {
        $data = Learn::where('subject_name','=','Computer Ict')->get();
        return view('Bank.computer',compact('data'));
    }

    ///////////////////////////////////////////////////////

    // public function bankStore(Request $request){
    //     //dd($request->all());
    //     $validator = Validator::make($request->all(), [
    //           'title' => 'required',
    //           'pdf_file_path' => 'required|mimes:pdf'
    //     ]);

    //     $slug=Str::slug($request->title, '-');

    //     if ($validator->fails()) {
    //       return redirect()->Back()->withInput()->withErrors($validator);
    //     }else{

    //           if($request->file('pdf_file_path')) {

    //                 $file = $request->file('pdf_file_path');
    //                 //$filename = $file->hashName();
    //                 $filename = $slug.'.'.$file->getClientOriginalExtension();;
    //                 // Upload file
    //                 $file->move(public_path('file/pdf/computerIct/'),$filename);
    //                 // path
    //                 $path="file/pdf/computerIct/$filename";

    //                 // Insert record
    //                 $insertData_arr = array(
    //                     'subject_name' => $request->subject_name,
    //                     'topic_name' => $request->topic_name,
    //                     'title' => $request->title,
    //                     'pdf_file_path' => $path,
    //                 );
    //                 //dd($insertData_arr);
    //                 Learn::create($insertData_arr);

    //                 // Session
    //                 Session::flash('alert-class', 'alert-success');
    //                 Session::flash('message','Record inserted successfully.');

    //             }else{

    //                 // Session
    //                 Session::flash('alert-class', 'alert-danger');
    //                 Session::flash('message','Record not inserted');
    //         }

    //     }

    //     return redirect()->back();
    // }

    public function caBangladesh()
    {
        $data = Learn::where('topic_name','=','Bangladesh')->get();
        return view('CurrentAffairs.bangladesh',compact('data'));
    }

    public function caInternational()
    {
        $data = Learn::where('subject_name','=','Computer Ict')->get();
        return view('CurrentAffairs.international',compact('data'));
    }

    public function caMIsc()
    {
        $data = Learn::where('subject_name','=','Computer Ict')->get();
        return view('CurrentAffairs.misc',compact('data'));
    }

}
