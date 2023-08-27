<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminCompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies=Company::with(["ratings"])
        ->latest()->get();

        return view("admin.companies.index",compact("companies"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company=null;

        return view("admin.companies.add_edit",compact("company"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name"=>"string|required",
            "description"=>"string|required",
            "image"=>"image|required",
        ]);

        $image=$request->file("image")->store("companies");

        Company::create([
            "name"=>$request->name,
            "description"=>$request->description,
            "image"=>$image,
            "created_by"=>auth()->user()->id,
        ]);

        return redirect()->route("admin.companies.index")->with("success","Company added successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company=Company::findOrFail($id);

        return view("admin.companies.add_edit",compact("company"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $company=Company::findOrFail($id);

        $request->validate([
            "name"=>"string|required",
            "description"=>"string|required",
            "image"=>"image",
        ]);

        $dataToUpdate=[
            "name"=>$request->name,
            "description"=>$request->description,
        ];

        if($request->hasFile("image")){

            if($company->image){
                Storage::delete($company->image);
            }

            $image=$request->file("image")->store("companies");
            $dataToUpdate["image"]=$image;
        }

        $company->update($dataToUpdate);

        return redirect()->route("admin.companies.index")->with("success","Company updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company=Company::findOrFail($id);

        if($company->image){
            Storage::delete($company->image);
        }

        $company->delete();

        return redirect()->route("admin.companies.index")->with("success","Company deleted successfully");
    }

    public function ratings($company_id){

        $company=Company::findOrFail($company_id);

        $ratings=$company->ratings;

        return view("admin.companies.ratings",compact("company","ratings"));

    }
}
