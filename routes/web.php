<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\PartnerPreferenceController;

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

Route::get('/', function () {
    return redirect()->route('home');
});

Route::resource('users', UserController::class);
Route::resource('users.partner_preferences', PartnerPreferenceController::class);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

//Google Sign In
Route::get('auth/google/redirect', [SocialController::class, 'googleRedirect']);
Route::get('auth/google/callback', [SocialController::class, 'googleCallback']);


//Reports
Route::get('reports/users', [ReportController::class, 'userReport'])->name('reports.users');
