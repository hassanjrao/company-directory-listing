<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Recommendation;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $companies=Company::count();
        $recommendations=Recommendation::count();

        return view('admin.dashboard.index',compact('companies','recommendations'));
    }
}
