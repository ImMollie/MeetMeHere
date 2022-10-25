<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileRequest;

class userProfileController extends Controller
{
    public function indexProfile(Request $request)
    {
        $elements = Auth::user(); 
        return view('userProfile',compact('elements'));
    }

    public function profileUpdate(ProfileRequest $request)
    {
        $userID = Auth::user();
        $userID->update($request->all());        
        // User::update([
        //     'nickname' => $request->nickname,
        //     'firstname' => $request->firstname,
        //     'lastname' => $request->lastname,
        //     'email' => $request->email,
        //     'phonenumber' => $request->phonenumber,
        //     'password' => $request->password,
        //     'city' => $request->city,
        //     'street' => $request->street,
        //     'number' => $request->number,
        // ]);
        return redirect()->route('indexProfile');
    }

    public function nicknameProfile($slug)
    {
        $elements = User::where('slug',$slug)->first(); 
        return view('userProfile',compact('elements'));
    }
}
