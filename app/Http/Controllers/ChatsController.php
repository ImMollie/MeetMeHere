<?php

namespace App\Http\Controllers;

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
    public function index($id){
        return view('chat', compact('id'));
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
    public function sendMessage(Request $request){
        $user = Auth::user();

        $message = $user->messages()->create([
            'message' => $request->input('message')
        ]);
        broadcast(new MessageSent($user, $message))->toOthers();

        return ['status' => 'Message Sent!'];
    }

    public function sendPrivateMessage(Request $request, User $user){
        $input = $request_all();
        $input['receiver_id']= $user->id;

        $message = $user->messages()->create($input);
        broadcast(new MessageSent($user, $message))->toOthers();

        return ['status' => 'Message Private Sent!'];
    }

    public function privateMessages(User $user){
        $temp = Message::with('user')
        ->where(['user_id' => Auth::user()->id, 'receiver_id' => $user->id])
        ->orWhere(function($query) use ($user){
        $query->where(['user_id' => $user->id, 'receiver_id' => Auth::user()->id]);})
        ->get();
        return $temp;
    }
}