<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryEnglish;
use App\Models\CategoryEnglishLiterature;
use App\Models\CategoryBanglaGrammer;
use App\Models\CategoryBanglaLiterature;
use App\Models\CategoryMath;

class CategoryController extends Controller
{   
    ////////////////////////English Grammer/////////////////////////////

    public function addCatEnglishGrammer()
    {   
        $data = CategoryEnglish::all();
        return view('Learn.EnglishGrammer.add_category',compact('data'));
    }

    public function storeCatEnglishGrammer(Request $request)
    {
        $insertData_arr = array(
            'english_category' => $request->english_category,
        );

        CategoryEnglish::create($insertData_arr);
        return redirect()->back();
    }

    ////////////////////////English Literature/////////////////////////////

    public function addCatEnglishLiterature()
    {   
        $data = CategoryEnglishLiterature::all();
        return view('Learn.EnglishLiterature.add_category',compact('data'));
    }

    public function storeCatEnglishLiterature(Request $request)
    {
        $insertData_arr = array(
            'category_name' => $request->category_name,
        );

        CategoryEnglishLiterature::create($insertData_arr);
        return redirect()->back();
    }

    public function deleteEngLit($id)
    {
        $data = CategoryEnglishLiterature::findOrFail($id);
        @unlink($data->pdf_file_path);
        $data->delete();

        return redirect()->back();
    }

    ////////////////////////Bangla Grammer/////////////////////////////

    public function addCatBnGram()
    {   
        $data = CategoryBanglaGrammer::all();
        return view('Learn.BanglaGrammer.add_category',compact('data'));
    }

    public function storeCatBnGram(Request $request)
    {
        $insertData_arr = array(
            'category_name' => $request->category_name,
        );

        CategoryBanglaGrammer::create($insertData_arr);
        return redirect()->back();
    }

    public function deleteBnGram($id)
    {
        $data = CategoryBanglaGrammer::findOrFail($id);
        @unlink($data->pdf_file_path);
        $data->delete();

        return redirect()->back();
    }

    ////////////////////////Bangla Literature/////////////////////////////

    public function addCatBnLit()
    {   
        $data = CategoryBanglaLiterature::all();
        return view('Learn.BanglaLiterature.add_category',compact('data'));
    }

    public function storeCatBnLit(Request $request)
    {
        $insertData_arr = array(
            'category_name' => $request->category_name,
        );

        CategoryBanglaLiterature::create($insertData_arr);
        return redirect()->back();
    }

    public function deleteCatBnLit($id)
    {
        $data = CategoryBanglaLiterature::findOrFail($id);
        @unlink($data->pdf_file_path);
        $data->delete();

        return redirect()->back();
    }

    //////////////////////// Math /////////////////////////////

    public function addCatMath()
    {   
        $data = CategoryMath::all();
        return view('Learn.Math.add_category',compact('data'));
    }

    public function storeCatMath(Request $request)
    {
        $insertData_arr = array(
            'category_name' => $request->category_name,
        );

        CategoryMath::create($insertData_arr);
        return redirect()->back();
    }

    public function deleteCatMath($id)
    {
        $data = CategoryMath::findOrFail($id);
        @unlink($data->pdf_file_path);
        $data->delete();

        return redirect()->back();
    }
}
