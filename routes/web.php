<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ChatsController;
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


Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::middleware(['auth', 'verified'])->group(function (){
    Route::get('add_announcement', [addAnnouncementController::class,'indexAnnouncement'])->name('indexAnnouncement');
    Route::post('/store', [addAnnouncementController::class,'store'])->name('store');
    Route::get('profile', [userProfileController::class,'indexProfile'])->name('indexProfile');
    Route::post('/profileUpdate', [userProfileController::class,'profileUpdate'])->name('profileUpdate');
    Route::get('profile/{slug}', [userProfileController::class,'nicknameProfile'])->name('nicknameProfile');
    Route::get('search_announcement', [SearchAnnouncementController::class,'indexAnnouncement'])->name('searchAnnouncement');
    Route::get('/chat/{user}', [ChatsController::class,'index'])->name('indexChat');

    Route::get('messages', [ChatsController::class,'fetchMessages'])->name('fetchMessages');
    Route::get('/currentUser', [ChatsController::class,'currentUser'])->name('currentUser');
    Route::post('messages', [ChatsController::class,'sendMessage'])->name('sendMessage');

    Route::get('private-message/{user}', [ChatsController::class,'privateMessages'])->name('privateMessages');
    Route::post('private-message/{user}', [ChatsController::class,'sendPrivateMessage'])->name('sendPrivateMessage');

    // Route::get('filter', [SearchAnnouncementController::class,'filterAnnouncement'])->name('filterAnnouncement');
});

