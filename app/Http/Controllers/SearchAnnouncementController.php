<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Support\Arr;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AnnouncementCategory;
use Illuminate\Support\Facades\View;


class SearchAnnouncementController extends Controller
{
    public function indexAnnouncement(Request $request)
    {        
        $categories = Category::all();
        $todayDate = Carbon::now()->format('Y-m-d');
        $announcements = Announcement::where('status_id',2)->get(); 
        foreach($announcements as $oldAnn)
        if($oldAnn->date2){
            if($oldAnn->date2 < $todayDate){
            $oldAnn->status_id = 3;
            $oldAnn->saveQuietly();           
        }}elseif ($oldAnn->date < $todayDate){
            $oldAnn->status_id = 3;
            $oldAnn->saveQuietly();            
        }
        return view('searchAn',compact('announcements','categories'));
    }

    public function filterAnnouncement(Request $request)
    {    
        if($request->data){
        $asd = AnnouncementCategory::whereIn('category_id',$request->data)->get();           
        $tmp = [];        
        foreach($asd as $as){
            array_push($tmp,$as->announcementCategory()->where('status_id',2)->get());
        }
        }else $tmp = Announcement::where('status_id',2)->get(); 
        return View::make("components.announcement-card")->with("announcements",Arr::flatten($tmp,1))->with("creatordetails",true)->with("poke",true)->with("dismiss",false)->with("refresh",false)->with("cancel",false)->render(); 
    
    }
}
