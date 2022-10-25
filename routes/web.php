<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userProfileController;
use App\Http\Controllers\addAnnouncementController;
use App\Http\Controllers\SearchAnnouncementController;

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
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth', 'verified'])->group(function (){
    Route::get('add_announcement', [addAnnouncementController::class,'indexAnnouncement'])->name('indexAnnouncement');
    Route::post('/store', [addAnnouncementController::class,'store'])->name('store');
    Route::get('profile', [userProfileController::class,'indexProfile'])->name('indexProfile');
    Route::post('/profileUpdate', [userProfileController::class,'profileUpdate'])->name('profileUpdate');
    Route::get('profile/{slug}', [userProfileController::class,'nicknameProfile'])->name('nicknameProfile');
    Route::get('search_announcement', [SearchAnnouncementController::class,'indexAnnouncement'])->name('searchAnnouncement');
});

