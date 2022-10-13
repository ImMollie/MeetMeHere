<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\addAnnouncementController;

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

Route::get('addAn', [addAnnouncementController::class,'index'])->name('index');
Route::get('/addAnnouncement-step-1', [addAnnouncementController::class, 'createStep1'])->name('announcement.get.step.1');
Route::post('/addAnnouncement-post-step-1', [addAnnouncementController::class,'PostcreateStep1'])->name('announcement.post.step.1');
Route::get('/addAnnouncement-create-step-2', [addAnnouncementController::class,'createStep2'])->name('announcement.create.step.2');
Route::post('/addAnnouncement-post-step-2', [addAnnouncementController::class,'PostcreateStep2'])->name('announcement.post.step.2');
Route::get('/addAnnouncement-create-step-3', [addAnnouncementController::class,'createStep3'])->name('announcement.create.step.3');
Route::post('/addAnnouncement-post-step-3', [addAnnouncementController::class,'PostcreateStep3'])->name('announcement.post.step.3');
Route::get('/addAnnouncement-create-step-4', [addAnnouncementController::class,'createStep4'])->name('announcement.create.step.4');
Route::post('/addAnnouncement-post-step-4', [addAnnouncementController::class,'PostcreateStep4'])->name('announcement.post.step.4');
Route::get('/addAnnouncement-create-step-5', [addAnnouncementController::class,'createStep5'])->name('announcement.create.step.5');
Route::post('/addAnnouncement-post-step-5', [addAnnouncementController::class,'PostcreateStep5'])->name('announcement.post.step.5');
Route::post('/store', [addAnnouncementController::class,'store'])->name('store');

