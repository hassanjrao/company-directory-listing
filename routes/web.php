<?php

use App\Http\Controllers\AdminCompaniesController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AdminRatingController;
use App\Http\Controllers\AdminRecommendationController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(["register" => false, "reset" => false, "verify" => false]);

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post("companies/submit-rating", [CompanyController::class, "submitRating"])->name("companies.submit-rating");
Route::resource('companies', CompanyController::class);


Route::prefix("admin")->name("admin.")->middleware(["auth"])->group(function () {

    Route::get("/", [AdminDashboardController::class, "index"])->name("dashboard");

    Route::resource("ratings",AdminRatingController::class)->only(["index","destroy"]);

    Route::get("companies/{company}/ratings",[AdminCompaniesController::class,"ratings"])->name("companies.ratings");
    Route::resource("companies",AdminCompaniesController::class);

    Route::resource("recommendations",AdminRecommendationController::class)->only(["index"]);

    Route::resource("profile",AdminProfileController::class)->only(["index","update"]);
});
