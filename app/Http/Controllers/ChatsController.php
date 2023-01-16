<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Poke;
use App\Models\User;
use App\Models\Message;
use App\Events\MessageSent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

/**
 * Show chats
 *
 * @return \Illuminate\Http\Response
 */
    public function index($user){
        $user = User::where('id',$user)->first();              
        return view('chat', compact('user'));
    }

/**
 * Fetch all messages
 *
 * @return Message
 */
    public function fetchMessages(){
        return Message::with('user')->get();
    }
/**
 * Persist message to database
 *
 * @param  Request $request
 * @return Response
 */
    // public function sendMessage(Request $request){
    //     $user = Auth::user();
    //     $message = $user->messages()->create([
    //         'message' => $request->input('message')
    //     ]);
    //     broadcast(new MessageSent($user, $message))->toOthers();

    //     return ['status' => 'Message Sent!'];
    // }

    public function getPoke(User $user){        
        $pokes = Poke::where([['userpoke_id',$user->id],['pokestatus_id',4]])->first();        
        return $pokes;
    }


    public function privateMessages(User $user){
        $temp = Message::with('user')
        ->where(['user_id' => Auth::user()->id, 'receiver_id' => $user->id])
        ->orWhere(function($query) use ($user){
        $query->where(['user_id' => $user->id, 'receiver_id' => Auth::user()->id]);
        })->get();       
        return $temp;
    }

    public function sendPrivateMessageWithPoke(Request $request, User $user){
        $input = $request->all();
        $input['receiver_id'] = $user->id;
        $test = User::find(Auth::user()->id);
        $message = $test->messages()->create($input); 
        $poke = Poke::create([
            'content' => $request->message,
            'pokestatus_id' => 4,
            'date' => Carbon::now()->format('Y-m-d'),
            'userpoke_id' => $test->id,
            'userpoked_id' => $user->id,
        ]);
        broadcast(new MessageSent($message->load('user')))->toOthers();
        return response(['status' => 'Message Private with poke Sent!']);
    }

    public function sendPrivateMessage(Request $request, User $user){        
        $input = $request->all();
        $input['receiver_id'] = $user->id;
        $test = User::find(Auth::user()->id);
        $message = $test->messages()->create($input);        
        broadcast(new MessageSent($message->load('user')))->toOthers();
        return response(['status' => 'Message Private Sent!']);
    }

}