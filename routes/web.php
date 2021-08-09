<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\staff;
use App\Http\Controllers\admin;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;




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

Auth::routes(['register'=> false]);

Route::group(['as'=>'admin.','prefix'=>'admin', 'namespace'=>'admin', 'middleware'=>['auth','admin']],function(){

    
    Route::get('dashboard',[App\Http\Controllers\admin\dashboardcontroller::class,'index'])->name('dashboard');
    Route::resource('company-master/store',[App\Http\Controllers\admin\companycontroller::class,'store'])->name('company.store');
       Route::resource('company-master/index',[App\Http\Controllers\admin\companycontroller::class,'index'])->name('company.index');
      
       Route::recource('company-master/update',[App\Http|Controllers\admin\companycontroller::class,'update'])->name('company.update');
});

Route::group(['as'=>'staff.','prefix'=>'staff', 'namespace'=>'staff', 'middleware'=>['auth','staff']],function(){

    Route::get('dashboard',[App\Http\Controllers\staff\dashboardcontroller::class,'index'])->name('dashboard');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
