<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Arr;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddAnnouncementController extends Controller
{
    public function index(Request $request)
    {
        $request->session()->forget('announcement');

        $elements = Announcement::all();

        return view('addAn',compact('elements'));
    }

    public function createStep1(Request $request)
    {
        $categories = Category::all();
        $announcement = $request->session()->get('announcement');        
        return view('addAnStep1',compact('announcement','categories'));
    }

    public function PostcreateStep1(Request $request)
    {
        $validatedData = $request->validate([
            'categoryCheck' => ['required', 'array']       
        ]);
        $request->session()->put('announcement', $validatedData);        
        return redirect('/addAnnouncement-create-step-2');

    }

    public function createStep2(Request $request)
    {        
        $announcement = $request->session()->get('announcement');        
        return view('addAnStep2',compact('announcement'));
    }

    public function PostcreateStep2(Request $request)
    {        
        $validatedData = $request->validate([
            'amountPeople' => 'required',      
        ]);         
        $request->session()->push('announcement', $validatedData); 
        return redirect('/addAnnouncement-create-step-3');        
    }

    public function createStep3(Request $request)
    {        
        $announcement = $request->session()->get('announcement');        
        return view('addAnStep3',compact('announcement'));
    }

    public function PostcreateStep3(Request $request)
    {       
        
        $validatedData = $request->validate([
            'date' => ['required','date'],  
            'date2' => ['date','after:date']
        ]);         
        $request->session()->push('announcement', $validatedData); 
        return redirect('/addAnnouncement-create-step-4');        
    }

    public function createStep4(Request $request)
    {        
        $announcement = $request->session()->get('announcement');        
        return view('addAnStep4',compact('announcement'));
    }

    public function PostcreateStep4(Request $request)
    {        
        $validatedData = $request->validate([
            'description' => 'required',             
        ]);         
        $request->session()->push('announcement', $validatedData); 
        return redirect('/addAnnouncement-create-step-5');        
    }

    public function createStep5(Request $request)
    {        
        $announcement = $request->session()->get('announcement');        
        return view('addAnStep5',compact('announcement'));
    }


    public function store(Request $request)
    {
        $announcement = $request->session()->get('announcement');

        $announcement->save();

        return redirect('/data');
    }
}
        // 'status',
        // 'category',
        // 'description',
        // 'radius',
        // 'place',
        // 'amountPeople',
        // 'date',
        // 'type',      