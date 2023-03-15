<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bank;
use Illuminate\Support\Facades\Validator;
use Session;
use Illuminate\Support\Str;

class BankController extends Controller
{
    ///////////////////////////////////////////////////////

    public function storeBank(Request $request){
        //dd($request->all());
        $validator = Validator::make($request->all(), [
              'title' => 'required',
              'pdf_file_path' => 'required|mimes:pdf'
        ]);

        $slug=Str::slug($request->title, '-');
        $snslug=Str::slug($request->subject_name, '-');

        if ($validator->fails()) {
          return redirect()->Back()->withInput()->withErrors($validator);
        }else{

              if($request->file('pdf_file_path')) {

                    $file = $request->file('pdf_file_path');
                    //$filename = $file->hashName();
                    $filename = $snslug.'-'.$slug.'.'.$file->getClientOriginalExtension();;
                    // Upload file
                    $file->move(public_path('file/pdf/bank/'),$filename);
                    // path
                    $path="file/pdf/bank/$filename";

                    // Insert record
                    $insertData_arr = array(
                        'subject_name' => $request->subject_name,
                        //'topic_name' => $request->topic_name,
                        'title' => $request->title,
                        'pdf_file_path' => $path,
                    );
                    //dd($insertData_arr);
                    Bank::create($insertData_arr);

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
        $data = Bank::where('subject_name','=','English')->get();
        return view('Bank.english',compact('data'));
    }

    public function indexBangla()
    {
        $data = Bank::where('subject_name','=','Bangla')->get();
        return view('Bank.bangla',compact('data'));
    }

    public function indexMath()
    {
        $data = Bank::where('subject_name','=','Math')->get();
        return view('Bank.math',compact('data'));
    }

    public function indexComputer()
    {
        $data = Bank::where('subject_name','=','Computer Ict')->get();
        return view('Bank.computer',compact('data'));
    }
}
