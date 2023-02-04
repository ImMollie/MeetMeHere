<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Arr;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AnnouncementCategory;
use Illuminate\Support\Facades\Auth;

class AddAnnouncementController extends Controller
{
    public function indexAnnouncement(Request $request)
    {
        $elements = Announcement::all();
        $categories = Category::all();        
        return view('addAn',compact('elements','categories'));
    }


    public function store(Request $request)
    {        
        $validatedData = $request->validate([
            'categoryCheck' => ['required', 'array'],
            'amountPeople' => 'required',    
            'date' => ['required','date'],  
            'date2' => ['date','after:date']
        ]);  
        
        $categoryName="";
        $counter = 0;
        $categories = Category::findMany($request->input('categoryCheck'));
        foreach($categories as $category){
             $categoryName .= $category->categoryName;
             $counter++;
             if(count($categories)>$counter){
                $categoryName .= ",";
             }
        };        
        
        $userID = Auth::user();  
        $announcement = Announcement::create([
            'status_id' => 2,
            'category' => $categoryName,           
            'description' => $request->description,            
            'place' => $request->address,
            'amountPeople' => $request->amountPeople,
            'date' => $request->date,
            'date2' => $request->date2,
            'user_id' => $userID->id,                      
        ]);

        foreach($categories as $category){
            AnnouncementCategory::create([            
                'category_id' => $category->id,
                'announcement_id' => $announcement->id,
            ]);
            }
        return redirect('/search_announcement');
    }
}
// $table->id();
// $table->string('status');
// $table->string('category');
// $table->string('description');
// $table->integer('amountPeople');
// $table->string('place');
// $table->date('date');
// $table->date('date2');                                 
// $table->unsignedBigInteger('user_id');
// $table->foreign('user_id')
// ->references('id')
// ->on('users');            
// $table->timestamps();