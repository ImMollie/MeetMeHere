<?php

use App\Models\Message;
use App\Events\MessageSent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ChatsController;
use App\Http\Controllers\ChatRoomController;
use App\Http\Controllers\myMeetingsController;
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
    Route::get('meetings', [myMeetingsController::class,'index'])->name('myMeetings');
    Route::post('/filterMeetings', [myMeetingsController::class,'filterMeetings'])->name('filterMeetings');
    Route::get('dismiss/{id}', [myMeetingsController::class,'dismiss'])->name('dismiss');
    Route::get('cancel/{id}', [myMeetingsController::class,'cancel'])->name('cancel');
    Route::get('refresh/{id}', [myMeetingsController::class,'refresh'])->name('refresh');

    Route::get('add_announcement', [addAnnouncementController::class,'indexAnnouncement'])->name('indexAnnouncement');    
    Route::post('/store', [addAnnouncementController::class,'store'])->name('store');
    Route::get('profile', [userProfileController::class,'indexProfile'])->name('indexProfile');
    Route::post('/profileUpdate', [userProfileController::class,'profileUpdate'])->name('profileUpdate');
    Route::get('profile/{slug}', [userProfileController::class,'nicknameProfile'])->name('nicknameProfile');
    Route::get('search_announcement', [SearchAnnouncementController::class,'indexAnnouncement'])->name('searchAnnouncement');
    
    Route::get('/chat/{user}/{announcement}', [ChatsController::class,'index'])->name('indexChat');    
    Route::get('messages', [ChatsController::class,'fetchMessages'])->name('fetchMessages');
    Route::get('/currentUser', [ChatsController::class,'currentUser'])->name('currentUser');
    Route::post('messages', [ChatsController::class,'sendMessage'])->name('sendMessage');
    Route::get('/chat', [ChatRoomController::class,'index'])->name('chatRoom');

    Route::get('private-message/{user}', [ChatsController::class,'privateMessages'])->name('privateMessages');
    Route::post('private-messagepoke/{user}', [ChatsController::class,'sendPrivateMessageWithPoke'])->name('sendPrivateMessageWithPoke');
    Route::post('private-message/{user}', [ChatsController::class,'sendPrivateMessage'])->name('sendPrivateMessage');
    Route::get('/users', [ChatRoomController::class,'users'])->name('users');
    Route::get('/getpoke/{user}', [ChatsController::class,'getPoke'])->name('getPoke');
    Route::get('/announcementYes/{poke}', [ChatRoomController::class,'currentUsers'])->name('currentUsers');
    Route::get('/announcementNo/{poke}', [ChatRoomController::class,'currentUsers'])->name('currentUsers');

    Route::post('/readNotification', [HomeController::class,'readNotification'])->name('readNotification');

    Route::post('/filterCategory', [SearchAnnouncementController::class,'filterAnnouncement'])->name('filterAnnouncement');
    Route::get('/test', function(){        
        event(new MessageSent(Message::where('receiver_id',4)->first()));
        return 'asd';
    });
    
});