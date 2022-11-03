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
        $categories = Category::all();
        $announcements = Announcement::paginate(2); 
        return view('searchAn',compact('announcements','categories'));
    }

    // public function filterAnnouncement(Request $request)
    // {
    //     // $announcements = Announcement::all();
    //     $asd = AnnouncementCategory::where('category_id',$request->get('category'))->get();
    //     foreach($asd as $as){
    //         dd($as->announcementCategory()->get());
    //     }        
    //     return $asd;
        
    // }


}
