<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LearnController extends Controller
{
    public function noun()
    {
        return view('Learn.English.noun');
    }

    public function nounStore(Request $request){

         $validator = Validator::make($request->all(), [
              'title' => 'required',
              'pdf_file_path' => 'required|mimes:pdf'
         ]);

         if ($validator->fails()) {
              return redirect()->Back()->withInput()->withErrors($validator);
         }else{

              if($request->file('pdf_file_path')) {

                    $file = $request->file('pdf_file_path');
                    $filename = $file->hashName();

                    // File upload location
                    $location = 'uploads';

                    // Upload file
                    $file->move($location,$filename);

                    // File path
                    $filepath = url('uploads/'.$filename);

                    // Insert record
                    $insertData_arr = array(
                         'name' => $request->name,
                         'filepath' => $filepath
                    );

                    Files::create($insertData_arr);

                    // Session
                    Session::flash('alert-class', 'alert-success');
                    Session::flash('message','Record inserted successfully.');

              }else{

                    // Session
                    Session::flash('alert-class', 'alert-danger');
                    Session::flash('message','Record not inserted');
              }

         }

         return redirect('/');

     }
}
