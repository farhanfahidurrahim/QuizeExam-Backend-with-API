<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Learn;

class BankController extends Controller
{
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

    public function indexEnglish()
    {
        $data = Learn::where('topic_name','=','Bangladesh')->get();
        return view('Bank.english',compact('data'));
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
