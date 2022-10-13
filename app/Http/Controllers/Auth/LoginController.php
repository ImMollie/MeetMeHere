<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected $nickname; 
    public function __construct()
    {        
        $this->middleware('guest')->except('logout');
        $this->nickname = $this->findUsername();  
           
    }
    
    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function findUsername()
    {
        $login = request()->input('nickname');
 
        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'nickname';
 
        request()->merge([$fieldType => $login]);        
        return $fieldType;
    }

    public function login(Request $request)
    {     
        if($this->nickname=='nickname'){   
        $request->validate([        
            'nickname' => 'required', 'string', 'max:20',  
            'password' => 'required', 'string',
         ]);
        }
         else{
         $request->validate([        
            'email' => 'required', 'string', 'email', 'max:50',  
            'password' => 'required', 'string',
         ]);
        }
         
        
        $credentials = $request->only($this->nickname, 'password');
        
        if (Auth::attempt($credentials)) {

            return redirect()->route('home');
        }
        // dd($validator->fails());
        return redirect("login")->with('message','Oppes! You have entered invalid credentials');
    }
 
    /**
     * Get username property.
     *
     * @return string
     */
    public function nickname()
    {
        return $this->nickname;
    }

}
