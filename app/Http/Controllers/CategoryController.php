<?php

namespace App\Http\Controllers;

//Learn Part : Model [Category/Topic]
use Illuminate\Http\Request;
use App\Models\CategoryEnglishGrammer;
use App\Models\CategoryEnglishLiterature;
use App\Models\CategoryBanglaGrammer;
use App\Models\CategoryBanglaLiterature;
use App\Models\CategoryMath;
use App\Models\CategoryInternationalAffair;
use App\Models\CategoryBangladeshAffair;
use App\Models\CategoryGeographyEnvironment;
use App\Models\CategoryComputerIct;
use App\Models\CategoryMentalSkill;
use App\Models\CategoryEthicsValueGoverance;
//Ebook Part : Model [Category/Topic]
use App\Models\CategoryEbookNineten;
use App\Models\CategoryEbookEight;
use App\Models\CategoryEbookSeven;

class CategoryController extends Controller
{   
    ///////////////////// Learn -> English Grammer////////////////////////

    public function addCatEngGram()
    {   
        $data = CategoryEnglishGrammer::all();
        return view('Learn.EnglishGrammer.add_category',compact('data'));
    }

    public function storeCatEngGram(Request $request)
    {
        $insertData_arr = array(
            'category_name' => $request->category_name,
        );

        CategoryEnglishGrammer::create($insertData_arr);
        return redirect()->back();
    }

    public function deleteCatEngGram($id)
    {
        $data = CategoryEnglishGrammer::findOrFail($id);
        @unlink($data->pdf_file_path);
        $data->delete();

        return redirect()->back();
    }

    ///////////////////// Learn -> English Literature//////////////////////

    public function addCatEngLiter()
    {   
        $data = CategoryEnglishLiterature::all();
        return view('Learn.EnglishLiterature.add_category',compact('data'));
    }

    public function storeCatEngLiter(Request $request)
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

    public function deleteCatBnGram($id)
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

    //////////////////////// International Affairs /////////////////////////////

    public function addCatIntAff()
    {   
        $data = CategoryInternationalAffair::all();
        return view('Learn.InternationalAffairs.add_category',compact('data'));
    }

    public function storeCatIntAff(Request $request)
    {
        $insertData_arr = array(
            'category_name' => $request->category_name,
        );

        CategoryInternationalAffair::create($insertData_arr);
        return redirect()->back();
    }

    public function deleteCatIntAff($id)
    {
        $data = CategoryInternationalAffair::findOrFail($id);
        @unlink($data->pdf_file_path);
        $data->delete();

        return redirect()->back();
    }

    //////////////////////// Bangladesh Affairs /////////////////////////////

    public function addCatBdAff()
    {   
        $data = CategoryBangladeshAffair::all();
        return view('Learn.BangladeshAffairs.add_category',compact('data'));
    }

    public function storeCatBdAff(Request $request)
    {
        $insertData_arr = array(
            'category_name' => $request->category_name,
        );

        CategoryBangladeshAffair::create($insertData_arr);
        return redirect()->back();
    }

    public function deleteCatBdAff($id)
    {
        $data = CategoryBangladeshAffair::findOrFail($id);
        @unlink($data->pdf_file_path);
        $data->delete();

        return redirect()->back();
    }

    ////////////////////Geography Environment/////////////////////////

    public function addCatGeoEnv()
    {   
        $data = CategoryGeographyEnvironment::all();
        return view('Learn.GeographyEnvironment.add_category',compact('data'));
    }

    public function storeCatGeoEnv(Request $request)
    {
        $insertData_arr = array(
            'category_name' => $request->category_name,
        );

        CategoryGeographyEnvironment::create($insertData_arr);
        return redirect()->back();
    }

    public function deleteCatGeoEnv($id)
    {
        $data = CategoryGeographyEnvironment::findOrFail($id);
        @unlink($data->pdf_file_path);
        $data->delete();

        return redirect()->back();
    }

    ////////////////////Computer Ict/////////////////////////

    public function addCatCompIct()
    {   
        $data = CategoryComputerIct::all();
        return view('Learn.ComputerIct.add_category',compact('data'));
    }

    public function storeCatCompIct(Request $request)
    {
        $insertData_arr = array(
            'category_name' => $request->category_name,
        );

        CategoryComputerIct::create($insertData_arr);
        return redirect()->back();
    }

    public function deleteCatCompIct($id)
    {
        $data = CategoryComputerIct::findOrFail($id);
        @unlink($data->pdf_file_path);
        $data->delete();

        return redirect()->back();
    }

    ////////////////////Mental Skill/////////////////////////

    public function addCatMentSkill()
    {   
        $data = CategoryMentalSkill::all();
        return view('Learn.MentalSkill.add_category',compact('data'));
    }

    public function storeCatMentSkill(Request $request)
    {
        $insertData_arr = array(
            'category_name' => $request->category_name,
        );

        CategoryMentalSkill::create($insertData_arr);
        return redirect()->back();
    }

    public function deleteCatMentSkill($id)
    {
        $data = CategoryMentalSkill::findOrFail($id);
        @unlink($data->pdf_file_path);
        $data->delete();

        return redirect()->back();
    }

    //////////////////// E V G/////////////////////////

    public function addCatEvg()
    {   
        $data = CategoryEthicsValueGoverance::all();
        return view('Learn.EthicsValueGoverance.add_category',compact('data'));
    }

    public function storeCatEvg(Request $request)
    {
        $insertData_arr = array(
            'category_name' => $request->category_name,
        );

        CategoryEthicsValueGoverance::create($insertData_arr);
        return redirect()->back();
    }

    public function deleteCatEvg($id)
    {
        $data = CategoryEthicsValueGoverance::findOrFail($id);
        @unlink($data->pdf_file_path);
        $data->delete();

        return redirect()->back();
    }

    //////////////// <------Ebook Start-----> /////////////////////
    
    ///////////////////  Ebook -> Nine Ten ///////////////////////

    public function addCatNineTen()
    {   
        $data = CategoryEbookNineten::all();
        return view('Ebook.NineTen.add_category',compact('data'));
    }

    public function storeCatNineTen(Request $request)
    {
        $insertData_arr = array(
            'category_name' => $request->category_name,
        );

        CategoryEbookNineten::create($insertData_arr);
        return redirect()->back();
    }

    public function deleteCatNineTen($id)
    {
        $data = CategoryEbookNineten::findOrFail($id);
        @unlink($data->pdf_file_path);
        $data->delete();

        return redirect()->back();
    }

    //////////////////// Ebook -> Eight ///////////////////////

    public function addCatEight()
    {   
        $data = CategoryEbookEight::all();
        return view('Ebook.Eight.add_category',compact('data'));
    }

    public function storeCatEight(Request $request)
    {
        $insertData_arr = array(
            'category_name' => $request->category_name,
        );

        CategoryEbookEight::create($insertData_arr);
        return redirect()->back();
    }

    public function deleteCatEight($id)
    {
        $data = CategoryEbookEight::findOrFail($id);
        @unlink($data->pdf_file_path);
        $data->delete();

        return redirect()->back();
    }

    //////////////////// Ebook -> Seven ///////////////////////

    public function addCatSeven()
    {   
        $data = CategoryEbookSeven::all();
        return view('Ebook.Seven.add_category',compact('data'));
    }

    public function storeCatSeven(Request $request)
    {
        $insertData_arr = array(
            'category_name' => $request->category_name,
        );

        CategoryEbookSeven::create($insertData_arr);
        return redirect()->back();
    }

    public function deleteCatSeven($id)
    {
        $data = CategoryEbookSeven::findOrFail($id);
        @unlink($data->pdf_file_path);
        $data->delete();

        return redirect()->back();
    }
}