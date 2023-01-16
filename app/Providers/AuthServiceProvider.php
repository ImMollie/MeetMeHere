<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {  
        $this->registerPolicies();
        view()->composer('*', function($view){                                 
            if(Auth::check()){
                $message = [];
                $usersMessage = Message::where('receiver_id', Auth::user()->id)->select('user_id')->groupBy('user_id')->get();
                foreach($usersMessage as $messages){
                    $tmp = User::where('id',$messages->user_id)->first();
                    if($tmp->messages()->latest()->first()->created_at == $tmp->messages()->latest()->first()->updated_at){
                        array_push($message,$tmp->messages()->latest()->first()); 
                    }                                       
                }               
                $view->with('notification',$message);             
            }             
        });
    }
}
