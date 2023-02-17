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
        if ($request->data == null && $request->amount == null && $request->date1 == null && $request->date2 == null && $request->range == null) {
            return;
        }
        
        $request->date1 ??= '1970-01-01';
        $request->date2 ??= '9999-01-01';
        $request->oneDay = filter_var($request->oneDay, FILTER_VALIDATE_BOOLEAN);

        $categories = ($request->data == null)
            ? AnnouncementCategory::get()
            : AnnouncementCategory::whereIn('category_id', $request->data)->get();

        $announcements = [];
        foreach ($categories as $category) {
            $builder = $category->announcementCategory()->where('status_id', 2);
            $builder = SearchAnnouncementController::getDateFilteredBuilder($builder, $request->date1, $request->date2, $request->oneDay);
            $builder = SearchAnnouncementController::getAmountOfPeopleFilteredBuilder($builder, $request->amount);

            foreach ($builder->get() as $announcement) {
                $announcements[$announcement->id] = $announcement;
            }
        }

        return View::make("components.announcement-card")
            ->with("announcements", array_values($announcements), 1)
            ->with("creatordetails", true)
            ->with("poke", true)
            ->with("dismiss", false)
            ->with("refresh", false)
            ->with("cancel", false)
            ->render();
    }

    private static function getDateFilteredBuilder($builder, $date1, $date2, $oneDay)
    {
        return ($oneDay == true)
            ? $builder
                ->where([
                    ['date2', '=', null],
                    ['date', '=', $date1]
                ])
                ->orWhere([
                    ['date', '<=', $date1],
                    ['date2', '>=', $date1]
                ])
            : $builder->where(function ($query) use ($date1, $date2) {
                $query
                    ->where([
                        ['date2', '=', null],
                        ['date', '>=', $date1],
                        ['date', '<=', $date2]
                    ])
                    ->orWhere([
                        ['date2', '!=', null],
                        ['date', '>=', $date1],
                        ['date2', '<=', $date2]
                    ])
                    ->orWhere([
                        ['date2', '!=', null],
                        ['date', '<=', $date1],
                        ['date2', '>=', $date1]
                    ])
                    ->orWhere([
                        ['date', '<=', $date2],
                        ['date', '>=', $date1]
                    ]);
            });
    }

    private static function getAmountOfPeopleFilteredBuilder($builder, $amountPeople)
    {
        [$min, $max] = match ($amountPeople) {
            '1' => [1, 1],
            '2' => [2, 2],
            '3' => [3, INF],
            default => [0, INF]
        };

        return $builder
            ->where([
                ['amountPeople', '>=', $min],
                ['amountPeople', '<=', $max],
            ]);
    }
}
