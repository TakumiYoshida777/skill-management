<?php

use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminRegisterController;
use App\Http\Controllers\EngineerSkillController;
use App\Http\Controllers\LanguageProficiency;
use App\Http\Controllers\LanguageProficiencyController;
use App\Http\Controllers\Owner\OwnerLoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
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

//職務経歴一覧
Route::resource('/project',ProjectController::class)->middleware('auth');


Route::view('/admin/login', 'admin/login');
Route::post('/admin/login', [AdminLoginController::class, 'login']);
Route::post('admin/logout', [AdminLoginController::class,'logout']);
Route::view('/admin/register', 'admin/register');
Route::post('/admin/register', [AdminRegisterController::class, 'register']);
Route::view('/admin/home', 'admin/home')->middleware('auth:admin');

Route::view('/owner/login', 'owner/login');
Route::post('/owner/login', [OwnerLoginController::class, 'login']);
Route::post('owner/logout', [OwnerLoginController::class,'logout']);
Route::view('/owner/register', 'owner/register');
// Route::post('/owner/register', [App\Http\Controllers\admin\RegisterController::class, 'register']);
Route::view('/owner/home', 'owner/home')->middleware('auth:owner');
