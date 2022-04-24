<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


Route::get('/login', function () {
    return view('auth\login');
})->name('login');

Route::get('/register', function () {
    return view('auth\register');
})->name('register');

Route::get('/',[HomeController::class,'index']);
Route::get('/home',[HomeController::class,'redirect'])->
middleware('auth','verified');

Route::get('/add_doctor',[AdminController::class,'add_doctor']);
Route::post('/upload_doctor',[AdminController::class,'upload_doctor']);

// appointment tbl
Route::post('/appointment',[HomeController::class,'appointment']);

Route::get('/myappointment',[HomeController::class,'myappointment']);
Route::get('/cancel_appoint/{id}',[HomeController::class,'cancel_appoint']);

Route::get('/show_appointment',[AdminController::class,'show_appointment']);
Route::get('/approved/{id}',[AdminController::class,'approved']);
Route::get('/cancelled/{id}',[AdminController::class,'cancelled']);

Route::get('/showdoctor',[AdminController::class,'showdoctor']);
Route::get('/dlt_doctor/{id}',[AdminController::class,'dlt_doctor']);
Route::get('/update_doctor/{id}',[AdminController::class,'update_doctor']);
Route::post('/updated_doctor/{id}',[AdminController::class,'updated_doctor']);

Route::get('/emailview/{id}',[AdminController::class,'emailview']);
Route::post('/sendemail/{id}',[AdminController::class,'sendemail']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
