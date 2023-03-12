<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ebook;
use Illuminate\Support\Facades\Validator;
use Session;
use Illuminate\Support\Str;

class EbookController extends Controller
{
    public function ebookStore(Request $request){
        //dd($request->all());
        $validator = Validator::make($request->all(), [
              'chapter_name' => 'required',
              'pdf_file_path' => 'required|mimes:pdf'
        ]);

        $slug=Str::slug($request->chapter_name, '-');
        $clslug=Str::slug($request->class_name, '-');
        $sbslug=Str::slug($request->subject_name, '-');

        if ($validator->fails()) {
          return redirect()->Back()->withInput()->withErrors($validator);
        }else{

              if($request->file('pdf_file_path')) {

                    $file = $request->file('pdf_file_path');
                    //$filename = $file->hashName();
                    $filename = $clslug.'-'.$sbslug.'-'.$slug.'.'.$file->getClientOriginalExtension();;
                    // Upload file
                    $file->move(public_path('file/pdf/ebook/'),$filename);
                    // path
                    $path="file/pdf/ebook/$filename";

                    // Insert record
                    $insertData_arr = array(
                        'class_name' => $request->class_name,
                        'subject_name' => $request->subject_name,
                        'chapter_name' =>$request->chapter_name,
                        'pdf_file_path' => $path,
                    );
                    //dd($insertData_arr);
                    Ebook::create($insertData_arr);

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
        $data = Ebook::findOrFail($id);
        @unlink($data->pdf_file_path);
        $data->delete();

        return redirect()->back();
    }

    public function generalMath()
    {
        $data = Ebook::where('subject_name','=','General Math')->where('class_name','=','Nine-Ten')->get();
        return view('Ebook.NineTen.generalMath',compact('data'));
    }

    public function higherMath()
    {
        $data = Ebook::where('subject_name','=','Higher Math')->where('class_name','=','Nine-Ten')->get();
        return view('Ebook.NineTen.higherMath',compact('data'));
    }

    public function generalScience()
    {
        $data = Ebook::where('subject_name','=','General Science')->where('class_name','=','Nine-Ten')->get();
        return view('Ebook.NineTen.generalScience',compact('data'));
    }

    public function generalMath8()
    {
        $data = Ebook::where('subject_name','=','General Math')->where('class_name','=','Eight')->get();
        return view('Ebook.Eight.generalMath',compact('data'));
    }

    public function higherMath8()
    {
        $data = Ebook::where('subject_name','=','Higher Math')->where('class_name','=','Eight')->get();
        return view('Ebook.Eight.higherMath',compact('data'));
    }

    public function generalScience8()
    {
        $data = Ebook::where('subject_name','=','General Science')->where('class_name','=','Eight')->get();
        return view('Ebook.Eight.generalScience',compact('data'));
    }

    public function generalMath7()
    {
        $data = Ebook::where('subject_name','=','General Math')->where('class_name','=','Seven')->get();
        return view('Ebook.Seven.generalMath',compact('data'));
    }

    public function higherMath7()
    {
        $data = Ebook::where('subject_name','=','Higher Math')->where('class_name','=','Seven')->get();
        return view('Ebook.Seven.higherMath',compact('data'));
    }

    public function generalScience7()
    {
        $data = Ebook::where('subject_name','=','General Science')->where('class_name','=','Seven')->get();
        return view('Ebook.Seven.generalScience',compact('data'));
    }
}
