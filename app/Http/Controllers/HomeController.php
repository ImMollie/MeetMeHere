<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Message;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
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
        return view('index',compact('categories'));
    }

    public function readNotification(Request $request)
    {
        $messages = Message::whereIn('id',array_values($request->data))->get();        
        foreach($messages as $message){
            $message->updated_at = Carbon::now();
            $message->save();
        }
        return "Done";
    }

}
