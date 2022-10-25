<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AnnouncementCategory;


class SearchAnnouncementController extends Controller
{
    public function indexAnnouncement(Request $request)
    {
        $announcements = Announcement::all(); 
        $ann2 = AnnouncementCategory::all();      
        return view('searchAn',compact('announcements'));
    }


}
