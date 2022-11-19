<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatRoomController extends Controller
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
        return view('chatRoom');
    }

    public function users()
    {  
        $test = [];
        $messages = Message::where('receiver_id',Auth::user()->id)->select('user_id')->groupBy('user_id')->get();   
        //Przesłanianie danych, zwracanych z serwera wybieranie tylko tych potrzebnych
        foreach ($messages as $message) {
            $testee = User::select('id','firstname','lastname','slug','photo')->where('id',$message->user_id)->first();
            $testee['allmessages'] = $testee->getAllMessages()->sortBy('id')->flatten();
            //dd($testee);
            array_push($test, $testee);
        }
        
        return $test;
    }
}
