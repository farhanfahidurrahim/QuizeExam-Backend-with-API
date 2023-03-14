<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryEbookNineten;
use App\Models\CategoryEbookEight;
use App\Models\CategoryEbookSeven;
use App\Models\EbookNineten;
use App\Models\EbookEight;
use App\Models\EbookSeven;
use Illuminate\Support\Facades\Validator;
use Session;
use Illuminate\Support\Str;

class EbookController extends Controller
{
    public function storeIndexNineTen(Request $request){
        //dd($request->all());
        $validator = Validator::make($request->all(), [
              'title' => 'required',
              'pdf_file_path' => 'required|mimes:pdf'
        ]);

        $slug=Str::slug($request->topic_name, '-');
        $clslug=Str::slug($request->class_name, '-');

        if ($validator->fails()) {
          return redirect()->Back()->withInput()->withErrors($validator);
        }else{

              if($request->file('pdf_file_path')) {

                    $file = $request->file('pdf_file_path');
                    //$filename = $file->hashName();
                    $filename = $clslug.'-'.$slug.'.'.$file->getClientOriginalExtension();;
                    // Upload file
                    $file->move(public_path('file/pdf/ebook/nine_ten'),$filename);
                    // path
                    $path="file/pdf/ebook/nine_ten/$filename";

                    // Insert record
                    $insertData_arr = array(
                        'class_name' => $request->class_name,
                        'topic_name' =>$request->topic_name,
                        'title' =>$request->title,
                        'pdf_file_path' => $path,
                    );
                    //dd($insertData_arr);
                    EbookNineten::create($insertData_arr);

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

    public function indexNineTen()
    {
        $data = EbookNineten::all();
        $category=CategoryEbookNineten::all();
        return view('Ebook.NineTen.index',compact('data','category'));
    }

    public function delete($id)
    {
        $data = EbookNineten::findOrFail($id);
        @unlink($data->pdf_file_path);
        $data->delete();

        return redirect()->back();
    }

    //////////////////////Eight////////////////////////////

    public function storeIndexEight(Request $request){
        //dd($request->all());
        $validator = Validator::make($request->all(), [
              'title' => 'required',
              'pdf_file_path' => 'required|mimes:pdf'
        ]);

        $slug=Str::slug($request->topic_name, '-');
        $clslug=Str::slug($request->class_name, '-');

        if ($validator->fails()) {
          return redirect()->Back()->withInput()->withErrors($validator);
        }else{

              if($request->file('pdf_file_path')) {

                    $file = $request->file('pdf_file_path');
                    //$filename = $file->hashName();
                    $filename = $clslug.'-'.$slug.'.'.$file->getClientOriginalExtension();;
                    // Upload file
                    $file->move(public_path('file/pdf/ebook/eight'),$filename);
                    // path
                    $path="file/pdf/ebook/eight/$filename";

                    // Insert record
                    $insertData_arr = array(
                        'class_name' => $request->class_name,
                        'topic_name' =>$request->topic_name,
                        'title' =>$request->title,
                        'pdf_file_path' => $path,
                    );
                    //dd($insertData_arr);
                    EbookEight::create($insertData_arr);

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

    public function indexEight()
    {
        $data = EbookEight::all();
        $category=CategoryEbookEight::all();
        return view('Ebook.Eight.index',compact('data','category'));
    }

    public function deleteEight($id)
    {
        $data = EbookEight::findOrFail($id);
        @unlink($data->pdf_file_path);
        $data->delete();

        return redirect()->back();
    }

    //////////////////////Eight////////////////////////////

    public function storeIndexSeven(Request $request){
        //dd($request->all());
        $validator = Validator::make($request->all(), [
              'title' => 'required',
              'pdf_file_path' => 'required|mimes:pdf'
        ]);

        $slug=Str::slug($request->topic_name, '-');
        $clslug=Str::slug($request->class_name, '-');

        if ($validator->fails()) {
          return redirect()->Back()->withInput()->withErrors($validator);
        }else{

              if($request->file('pdf_file_path')) {

                    $file = $request->file('pdf_file_path');
                    //$filename = $file->hashName();
                    $filename = $clslug.'-'.$slug.'.'.$file->getClientOriginalExtension();;
                    // Upload file
                    $file->move(public_path('file/pdf/ebook/seven'),$filename);
                    // path
                    $path="file/pdf/ebook/seven/$filename";

                    // Insert record
                    $insertData_arr = array(
                        'class_name' => $request->class_name,
                        'topic_name' =>$request->topic_name,
                        'title' =>$request->title,
                        'pdf_file_path' => $path,
                    );
                    //dd($insertData_arr);
                    EbookSeven::create($insertData_arr);

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

    public function indexSeven()
    {
        $data = EbookSeven::all();
        $category=CategoryEbookSeven::all();
        return view('Ebook.Seven.index',compact('data','category'));
    }

    public function deleteSeven($id)
    {
        $data = EbookSeven::findOrFail($id);
        @unlink($data->pdf_file_path);
        $data->delete();

        return redirect()->back();
    }
}
