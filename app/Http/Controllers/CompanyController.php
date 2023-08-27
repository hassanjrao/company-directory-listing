<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyRating;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search= $request->search ?? null;

        $companies= Company::with(["ratings"=>function($q){
            $q->latest()->get();
        }])
        ->when($search, function($query, $search){
            return $query->where("name", "like", "%$search%");
        })
        ->paginate(10);

        return view('front.companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {

        return view('front.companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */

    public function submitRating(Request $request){


        $request->validate([
            "company_id" => "required|exists:companies,id",
            "rating" => "required|numeric|min:0|max:5",
            "message" => "nullable",
            "name" => "required",
            "email" => "required|email",
        ]);

       $rat= CompanyRating::create([
            "company_id" => $request->company_id,
            "rating" => $request->rating,
            "name" => $request->name,
            "email" => $request->email,
            "comment" => $request->message,
        ]);


        return redirect()->back()->with("success", "Thank you for your rating!");

    }

    public function destroy(Company $company)
    {
        //
    }
}
