<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Currentaffair;
use Illuminate\Support\Facades\Validator;
use Session;
use Illuminate\Support\Str;

class CurrentAffairController extends Controller
{
    public function store(Request $request){
        //dd($request->all());
        $validator = Validator::make($request->all(), [
              'title' => 'required',
              'pdf_file_path' => 'required|mimes:pdf'
        ]);

        $slug=Str::slug($request->title, '-');
        $snslug=Str::slug($request->subject_name, '-');
        $myslug=Str::slug($request->month_year, '-');

        if ($validator->fails()) {
          return redirect()->Back()->withInput()->withErrors($validator);
        }else{

              if($request->file('pdf_file_path')) {

                    $file = $request->file('pdf_file_path');
                    //$filename = $file->hashName();
                    $filename = $snslug.'-'.$myslug.'-'.$slug.'.'.$file->getClientOriginalExtension();;
                    // Upload file
                    $file->move(public_path('file/pdf/currentaffair/'),$filename);
                    // path
                    $path="file/pdf/Currentaffair/$filename";

                    // Insert record
                    $insertData_arr = array(
                        'subject_name' => $request->subject_name,
                        'month_year' => $request->month_year,
                        'title' => $request->title,
                        'pdf_file_path' => $path,
                    );
                    //dd($insertData_arr);
                    Currentaffair::create($insertData_arr);

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
        $data = Currentaffair::findOrFail($id);
        //dd($data);
        @unlink($data->pdf_file_path);
        $data->delete();

        return redirect()->back();
    }

    public function bangladesh()
    {   
        $data = Currentaffair::where('subject_name','=','Bangladesh')->get();
        return view('CurrentAffairs.bangladesh',compact('data'));
    }

    public function international()
    {   
        $data = Currentaffair::where('subject_name','=','International')->get();
        return view('CurrentAffairs.international',compact('data'));
    }

    public function misc()
    {   
        $data = Currentaffair::where('subject_name','=','Misc')->get();
        return view('CurrentAffairs.misc',compact('data'));
    }
}
