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

    public function nounDelete($id)
    {
        $data = Learn::findOrFail($id);
        //dd($data);
        @unlink($data->pdf_file_path);
        $data->delete();

        return redirect()->back();
    }

    public function noun()
    {   
        $data = Learn::where('topic_name','=','Noun')->get();
        return view('Learn.EnglishGrammer.noun',compact('data'));
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

    public function verb()
    {   
        $data = Learn::where('topic_name','=','Verb')->get();
        return view('Learn.EnglishGrammer.verb',compact('data'));
    }

    public function adverb()
    {   
        $data = Learn::where('topic_name','=','Adverb')->get();
        return view('Learn.EnglishGrammer.adverb',compact('data'));
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

    public function languageGrammer()
    {
        $data = Learn::where('topic_name','=','Language Grammer')->get();
        return view('Learn.BanglaGrammer.language_grammer',compact('data'));
    }

    public function dhoniborno()
    {
        $data = Learn::where('topic_name','=','Dhoni Borno Juktoborno')->get();
        return view('Learn.BanglaGrammer.dhoni_borno',compact('data'));
    }

    public function prachinzug()
    {
        $data = Learn::where('topic_name','=','Prachin Zug')->get();
        return view('Learn.BanglaGrammer.prachinzug',compact('data'));
    }

    public function moddozug()
    {
        $data = Learn::where('topic_name','=','Moddo Zug')->get();
        return view('Learn.BanglaGrammer.moddozug',compact('data'));
    }

    public function adhunikzug()
    {
        $data = Learn::where('topic_name','=','Modern Era')->get();
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
