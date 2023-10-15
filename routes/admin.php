<?php

use App\Http\Controllers\Admin\AddressController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CounterController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ServicePartController;
use App\Http\Controllers\Admin\ServicePriceController;
use App\Http\Controllers\Admin\UploadeController;
use App\Http\Controllers\DashBoradController;
use App\Http\Controllers\PassportInfoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::prefix('admin')->middleware(['auth'])->group(function () {


Route::get('/',[DashBoradController::class,'index'] )->middleware(['auth', 'verified'])->name('dashboard.admin');

    Route::post('/uploade',[\App\Http\Controllers\Admin\UploadeController::class,'store'])->name('uploade');

    Route::resource('/services',ServiceController::class)->name('index','services');
    Route::resource('/companies',CompanyController::class)->name('index','companies');
    Route::resource('/addresses',AddressController::class)->name('index','addresses');
    Route::resource('/passportinfos',PassportInfoController::class)->name('index','passportinfos');
    Route::post('/pass.createex',[PassportInfoController::class,'createx'])->name('pass.createex');
    Route::resource('/posts',PostController::class)->name('index','posts');
    Route::resource('/service_prices',ServicePriceController::class)->name('index','service_prices');
    Route::resource('/counters',CounterController::class)->name('index','counters');

    Route::resource('/contacts',ContactController::class)->name('index','contacts');
    Route::resource('/service-parts', ServicePartController::class)->name('index','service-parts');

    Route::post('/image-upload',[UploadeController::class,'storeImage'])->name('image.upload');
});

Route::get('/dashboard',[DashBoradController::class,'index'] )->middleware(['auth', 'verified'])->name('dashboard');

