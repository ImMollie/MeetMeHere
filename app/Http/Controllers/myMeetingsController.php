<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class myMeetingsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::all();
        $announcements = Announcement::where([['user_id',Auth::user()->id],['status_id',1]])->get(); 
        $oldAnnouncements = Announcement::where('user_id',Auth::user()->id)->get();
        $todayDate = Carbon::now()->format('Y-m-d');
        foreach($oldAnnouncements as $oldAnn)
        if($oldAnn->date2){
         if($oldAnn->date2 < $todayDate){
            $oldAnn->status_id = 3;
            $oldAnn->saveQuietly();
        }}elseif ($oldAnn->date < $todayDate){
            $oldAnn->status_id = 3;
            $oldAnn->saveQuietly();
        }
        return view('myMeetings',compact('announcements','categories'));
    }

    public function filterMeetings(Request $request)
    {    
        if($request->data){
        $myMeetings = Announcement::where([['user_id',Auth::user()->id],['status_id',$request->data]])->get();
        if($request->data == 1)
        return View::make("components.announcement-card")->with("announcements",$myMeetings)->with("creatordetails",false)->with("poke",false)->with("dismiss",true)->with("refresh",false)->with("cancel",true)->render();
        if($request->data == 2)
        return View::make("components.announcement-card")->with("announcements",$myMeetings)->with("creatordetails",false)->with("poke",false)->with("dismiss",false)->with("refresh",false)->with("cancel",true)->render();
        if($request->data == 3)
        return View::make("components.announcement-card")->with("announcements",$myMeetings)->with("creatordetails",false)->with("poke",false)->with("dismiss",false)->with("refresh",false)->with("cancel",false)->render();
        if($request->data == 4)
        return View::make("components.announcement-card")->with("announcements",$myMeetings)->with("creatordetails",false)->with("poke",false)->with("dismiss",false)->with("refresh",true)->with("cancel",false)->render();
        }
    }
    public function dismiss($id)
    {    
        $asd = Announcement::find($id);
        $asd->status_id = 2;
        $asd->saveQuietly();
        $categories = Category::all();
        $announcements = Announcement::where([['user_id',Auth::user()->id],['status_id',1]])->get(); 
        return view('myMeetings',compact('announcements','categories'));
    }

    public function cancel($id)
    {    
        $asd = Announcement::find($id);
        $asd->status_id = 4;
        $asd->saveQuietly();        
        $categories = Category::all();
        $announcements = Announcement::where([['user_id',Auth::user()->id],['status_id',1]])->get(); 
        return view('myMeetings',compact('announcements','categories'));
    }

    public function refresh($id)
    {    
        $asd = Announcement::find($id);
        $asd->status_id = 2;
        $asd->saveQuietly();
        $categories = Category::all();
        $announcements = Announcement::where([['user_id',Auth::user()->id],['status_id',1]])->get(); 
        return view('myMeetings',compact('announcements','categories'));
    }
}
