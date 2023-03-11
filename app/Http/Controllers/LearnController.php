<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Learn;
use Illuminate\Support\Facades\Validator;
use Session;
use Illuminate\Support\Str;

class LearnController extends Controller
{
    public function learnEnglishStore(Request $request){
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
                    $file->move(public_path('file/pdf/english/'),$filename);
                    // path
                    $path="file/pdf/english/$filename";

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

    public function noun()
    {   
        $data = Learn::where('topic_name','=','Noun')->get();
        return view('Learn.EnglishGrammer.noun',compact('data'));
    }

    public function nounDelete($id)
    {
        $data = Learn::findOrFail($id);
        //dd($data);
        @unlink($data->pdf_file_path);
        $data->delete();

        return redirect()->back();
    }

    public function pronoun()
    {   
        $data = Learn::where('topic_name','=','Pronoun')->get();
        return view('Learn.EnglishGrammer.pronoun',compact('data'));
    }

    public function pronounDelete($id)
    {
        $data = Learn::findOrFail($id);
        //dd($data);
        @unlink($data->pdf_file_path);
        $data->delete();

        return redirect()->back();
    }

    public function oldPeriod()
    {   
        $data = Learn::where('subject_name','=','Old Period')->get();
        return view('Learn.EnglishLiterature.old_period',compact('data'));
    }

    public function oldPeiodDelete($id)
    {
        $data = Learn::findOrFail($id);
        //dd($data);
        @unlink($data->pdf_file_path);
        $data->delete();

        return redirect()->back();
    }

    public function middlePeriod()
    {   
        $data = Learn::where('subject_name','=','Middle Period')->get();
        return view('Learn.EnglishLiterature.middle_period',compact('data'));
    }

    public function romanticPeriod()
    {
        $data = Learn::where('subject_name','=','Romantic Period')->get();
        return view('Learn.EnglishLiterature.romantic_period',compact('data'));
    }

    ///////////////////////////////////////////////////////

    public function learnBanglaStore(Request $request){
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
                    $file->move(public_path('file/pdf/bangla/'),$filename);
                    // path
                    $path="file/pdf/bangla/$filename";

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

    public function banglalanguageGrammer()
    {
        $data = Learn::where('subject_name','=','Language Grammer')->get();
        return view('Learn.BanglaGrammer.bangla_language_grammer',compact('data'));
    }

    public function dhoniborno()
    {
        $data = Learn::where('subject_name','=','Dhoni Borno')->get();
        return view('Learn.BanglaGrammer.dhoni_borno',compact('data'));
    }

    public function prachinzug()
    {
        $data = Learn::where('subject_name','=','Prachin Zug')->get();
        return view('Learn.BanglaGrammer.prachinzug',compact('data'));
    }

    public function moddozug()
    {
        $data = Learn::where('subject_name','=','Moddo Zug')->get();
        return view('Learn.BanglaGrammer.moddozug',compact('data'));
    }

    public function adhunikzug()
    {
        $data = Learn::where('subject_name','=','Adhunik Zug')->get();
        return view('Learn.BanglaGrammer.adhunikzug',compact('data'));
    }

    ///////////////////////////////////////////////////////

    public function learnMathStore(Request $request){
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
                    $file->move(public_path('file/pdf/math/'),$filename);
                    // path
                    $path="file/pdf/math/$filename";

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

    public function realnumber()
    {
        $data = Learn::where('topic_name','=','Real Number')->get();
        return view('Learn.Math.realnumber',compact('data'));
    }

    public function squareInteger()
    {
        $data = Learn::where('topic_name','=','Square-Integer')->get();
        return view('Learn.Math.square_integer',compact('data'));
    }

    public function lcmgcm()
    {
        $data = Learn::where('topic_name','=','Lcm-Gcm')->get();
        return view('Learn.Math.lcm_gcm',compact('data'));
    }

    public function average()
    {
        $data = Learn::where('topic_name','=','Average')->get();
        return view('Learn.Math.average',compact('data'));
    }

    public function fraction()
    {
        $data = Learn::where('topic_name','=','Fraction')->get();
        return view('Learn.Math.fraction',compact('data'));
    }

    public function algebra1()
    {
        $data = Learn::where('topic_name','=','Algebraic Expressions')->get();
        return view('Learn.Math.algebra1',compact('data'));
    }

    public function algebra2()
    {
        $data = Learn::where('topic_name','=','Algebraic Formulas')->get();
        return view('Learn.Math.algebra2',compact('data'));
    }

    public function algebra3()
    {
        $data = Learn::where('topic_name','=','Analyze Product')->get();
        return view('Learn.Math.algebra3',compact('data'));
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
}
