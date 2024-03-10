<?php

use App\Http\Controllers\Admin\AdminGrantPermissions;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminRegisterController;
use App\Http\Controllers\Admin\AdminSearchMemberController;
use App\Http\Controllers\Admin\AdminSearchResultController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CreatePdfSkillSheetController;
use App\Http\Controllers\EngineerSkillController;
use App\Http\Controllers\LanguageProficiencyController;
use App\Http\Controllers\Owner\OwnerLoginController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\QualificationController;
use App\Http\Controllers\SkillSheetController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', function () {
    return redirect('/skill_sheet');
})->name('home');

Route::get('/skill_sheet', [SkillSheetController::class, 'index'])->name('skill_sheet');
// スキルシート
Route::get('user_skill_sheet/{id}',[SkillSheetController::class,'user_skill_sheet'])->name('user_skill_sheet');
// Route::get('/pdf',[PdfController::class,'viewPdf'])->name('viewPdf');
Route::post('/pdf',[SkillSheetController::class,'viewPdf'])->name('viewPdf');
Route::get('/pdf/{id}',[SkillSheetController::class,'dlPdf'])->name('dlPdf');


// プロフィール
Route::resource('/profile',ProfileController::class)->only([
    'index','update'
])->middleware('auth');

// 技術体験
Route::resource('/skills',EngineerSkillController::class)->middleware('auth');

// 外国語スキル
Route::resource('/language_proficiency',LanguageProficiencyController::class)->middleware('auth');

// 資格/トレーニング
Route::resource('/qualification',QualificationController::class)->middleware('auth');

// 職務経歴一覧
Route::resource('/project',ProjectController::class)->middleware('auth');


//管理者
Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('register', [RegisterController::class, 'showAdminRegistrationForm'])->name('admin.register');
    Route::post('register', [RegisterController::class, 'registerAdmin']);
    Route::view('/home', 'admin/home');
    Route::get('/search_member',[AdminSearchMemberController::class,'index']);
    Route::post('/search_result',[AdminSearchMemberController::class,'result'])->name('search_result');

    //権限付与
    Route::get('/grant_permissions',[AdminGrantPermissions::class,'index']);
    Route::get('/grant_permissions/target_user',[AdminGrantPermissions::class,'get_grant_target_user'])->name('grant_target_user');
    Route::post('/grant_permissions/target_user',[AdminGrantPermissions::class,'get_grant_target_user'])->name('grant_target_user');
    Route::post('/grant_permissions/{id}',[AdminGrantPermissions::class,'update_grant'])->name('update_grant');
});


