<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CourseController;

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
    return view('welcome');
});

Route::get('login',[AdminController::class,'index']);
Route::post('admin',[AdminController::class,'adminLogin']);
Route::get('dashboard',[AdminController::class,'dashboard']);
Route::get('logout',[AdminController::class,'logout']);

Route::get('student',[StudentController::class,'index']);
Route::get('addStudent',[StudentController::class,'addStudent']);
Route::post('student/add',[StudentController::class,'add']);
Route::get('student/delete/{id?}',[StudentController::class,'delete']);
Route::get('student/edit/{id?}',[StudentController::class,'edit']);
Route::post('student/update',[StudentController::class,'update']);
Route::get('student/checkmail',[StudentController::class,'checkmail']);
Route::get('student/getAllStudent',[StudentController::class,'downloadPdf']);
Route::get('student/exportExcel',[StudentController::class,'exportExcel']);
Route::get('student/exportCsv',[StudentController::class,'exportCsv']);


Route::get('course',[CourseController::class,'index']);
Route::get('addCourse',[CourseController::class,'addCourse']);
Route::post('course/add',[CourseController::class,'add']);
Route::get('course/delete/{id?}',[CourseController::class,'delete']);
Route::get('course/edit/{id?}',[CourseController::class,'edit']);
Route::post('course/update',[CourseController::class,'update']);
Route::get('course/checkcourse',[CourseController::class,'checkcourse']);

Route::get('branch',[BranchController::class,'index']);
Route::get('addBranch',[BranchController::class,'addBranch']);
Route::post('branch/add',[BranchController::class,'add']);
Route::get('branch/delete/{id?}',[BranchController::class,'delete']);
Route::get('branch/edit/{id?}',[BranchController::class,'edit']);
Route::post('branch/update',[BranchController::class,'update']);
Route::get('branch/checkbranch',[BranchController::class,'checkbranch']);


