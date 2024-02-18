<?php

use App\Http\Controllers\Api\ApiAdminSearchMemberController;
use App\Http\Controllers\Api\ApiLanguageProficiencyController;
use App\Http\Controllers\Api\ApiProjectController;
use App\Http\Controllers\Api\ApiQualificationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::post('/project-list',[ApiProjectController::class,'get_project_list']);
// Route::get('/project-list',[ApiProjectController::class,'get_project_list']);
Route::post('/project-list',[ApiProjectController::class,'get_project_list']);
Route::post('/language-proficiency-list',[ApiLanguageProficiencyController::class,'get_language_proficiency_list']);
Route::post('/qualification-list',[ApiQualificationController::class,'get_qualification_list']);

Route::post('/search_member',[ApiAdminSearchMemberController::class,'search_member']);
