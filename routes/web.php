<?php

use App\Http\Controllers\EngineerSkillController;
use App\Http\Controllers\LanguageProficiency;
use App\Http\Controllers\LanguageProficiencyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QualificationController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//プロフィール
Route::resource('/profile',ProfileController::class)->only([
    'index','update'
])->middleware('auth');

//技術体験
Route::resource('/skills',EngineerSkillController::class)->middleware('auth');

//外国語スキル
Route::resource('/language_proficiency',LanguageProficiencyController::class)->middleware('auth');

//資格/トレーニング
Route::resource('/qualification',QualificationController::class)->middleware('auth');
