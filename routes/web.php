<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\exerciseController;
use App\Http\Controllers\programController;
use App\Http\Controllers\authController;
use App\Models\ProgramModel;
use App\Http\Controllers\planController;

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

//exercises
Route::get('exercise/list',[exerciseController::class,'exercise'])->name('exerciseList');
Route::get('exercise/addnew',[exerciseController::class,'addNewExerciseView'])->name('addNewExerciseView');
Route::post('exercise/addnew',[exerciseController::class,'addNewExercise'])->name('addNewExercise');
Route::get('exercise/edit/{id}',[exerciseController::class,'exerciseEdit'])->name('exerciseEdit');
Route::POST('exercise/edit/{id}',[exerciseController::class,'ecerciseSave'])->name('exerciseEdit');


//program

Route::get('programs/create',[programController::class,'createProgramView'])->name('program.create');
Route::POST('programs/create',[programController::class,'createProgram'])->name('record.program');
Route::get('programs/list',[programController::class,'programsList'])->name('program.list');
Route::get('programs/program/{id}',[programController::class,'program'])->name('program');
Route::get('programs/edit/{id}',[programController::class,'programEdit'])->name('programEdit');
Route::POST('programs/edit/{id}',[programController::class,'programUpdate'])->name('programUpdate');

// //auth

// Route::get('/auth/login',[authController::class,'login'])->name('auth.login');
// Route::get('/auth/registry',[authController::class,'registry'])->name('auth.registry');
Route::post('/auth/save',[authController::class,'save'])->name('auth.save');
Route::post('/auth/check',[authController::class,'check'])->name('auth.check');

//plan
Route::post('/auth/admin/dashboard',[planController::class,'createPlan'])->name('createPlan');
Route::get('/auth/admin/userplan/{id}',[authController::class,'readUserPlan'])->name('userPlan');
Route::get('/auth/admin/userplan/{id}',[authController::class,'readUserPlan'])->name('userPlan');

// //admin
// Route::get('auth/admin/dashboard',[authController::class,'adminDashboard'])->name('adminDashboard');

// //user
// Route::get('auth/user/dashboard',[authController::class,'userDashboard'])->name('userDashboard');
// Route::get('auth/user/editProfile',[authController::class,'editProfile'])->name('editProfile');
// Route::post('user/edit',[authController::class,'updateProfile'])->name('updateProfile');

//logout
Route::get('/auth/logout',[authController::class,'logOut'])->name('logOut');


//group

Route::group(['middleware'=>['authCheck']], function()
{
    //user
Route::get('auth/user/dashboard',[authController::class,'userDashboard'])->name('userDashboard');
Route::get('auth/user/editProfile',[authController::class,'editProfile'])->name('editProfile');
Route::post('user/edit',[authController::class,'updateProfile'])->name('updateProfile');

//admin
Route::get('auth/admin/dashboard',[authController::class,'adminDashboard'])->name('adminDashboard');

//auth

Route::get('/auth/login',[authController::class,'login'])->name('auth.login');
Route::get('/auth/registry',[authController::class,'registry'])->name('auth.registry');

});

