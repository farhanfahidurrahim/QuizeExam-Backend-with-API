<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vocabulary;
use Illuminate\Support\Facades\Validator;
use Session;
use Illuminate\Support\Str;

class VocabularyController extends Controller
{   
    public function vocabularyStore(Request $request){
        //dd($request->all());
        $validator = Validator::make($request->all(), [
              'title' => 'required',
              'pdf_file_path' => 'required|mimes:pdf'
        ]);

        $slug=Str::slug($request->title, '-');
        $tnslug=Str::slug($request->topic_name, '-');

        if ($validator->fails()) {
          return redirect()->Back()->withInput()->withErrors($validator);
        }else{

              if($request->file('pdf_file_path')) {

                    $file = $request->file('pdf_file_path');
                    //$filename = $file->hashName();
                    $filename = $tnslug.$slug.'-'.Str::random(3).'.'.$file->getClientOriginalExtension();;
                    // Upload file
                    $file->move(public_path('file/pdf/vocabulary/'),$filename);
                    // path
                    $path="file/pdf/vocabulary/$filename";

                    // Insert record
                    $insertData_arr = array(
                        //'subject_name' => $request->subject_name,
                        'topic_name' =>$request->topic_name,
                        'title' => $request->title,
                        'pdf_file_path' => $path,
                    );
                    //dd($insertData_arr);
                    Vocabulary::create($insertData_arr);

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
        $data = Vocabulary::findOrFail($id);
        @unlink($data->pdf_file_path);
        $data->delete();

        return redirect()->back();
    }

    public function barrons333()
    {
        $data = Vocabulary::where('topic_name','=','Barrons 333')->get();
        return view('Vocabulary.barrons333',compact('data'));
    }

    public function barrons800()
    {
        $data = Vocabulary::where('topic_name','=','Barrons 800')->get();
        return view('Vocabulary.barrons800',compact('data'));
    }

    public function wordsmart1()
    {
        $data = Vocabulary::where('topic_name','=','Word Smart 1')->get();
        return view('Vocabulary.wordsmart1',compact('data'));
    }

    public function wordsmart2()
    {
        $data = Vocabulary::where('topic_name','=','Word Smart 2')->get();
        return view('Vocabulary.wordsmart2',compact('data'));
    }

    public function manhattan()
    {
        $data = Vocabulary::where('topic_name','=','Manhattan-1000')->get();
        return view('Vocabulary.manhattan',compact('data'));
    }

    public function magoosh()
    {
        $data = Vocabulary::where('topic_name','=','Magoosh-1000')->get();
        return view('Vocabulary.magoosh',compact('data'));
    }

    public function dailyedit()
    {
        $data = Vocabulary::where('topic_name','=','Daily Editorial')->get();
        return view('Vocabulary.dailyedit',compact('data'));
    }
}
