<?php

namespace App\Http\Controllers;

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
        $user = User::findorfail($user)->first();        
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

    public function privateMessages(User $user){
        $temp = Message::with('user')
        ->where(['user_id' => Auth::user()->id, 'receiver_id' => $user->id])
        ->orWhere(function($query) use ($user){
        $query->where(['user_id' => $user->id, 'receiver_id' => Auth::user()->id]);})
        ->get();
        return $temp;
    }

    
    public function sendPrivateMessage(Request $request, User $user){
        $input = $request->all();
        $input['receiver_id'] = $user->id;
        $test = User::find(Auth::user()->id);
        $message = $test->messages()->create($input);
        broadcast(new MessageSent($test, $message->load('user')))->toOthers();
        return response(['status' => 'Message Private Sent!']);
    }

}