<?php

namespace App\Models;

use App\Models\Message;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nickname',
        'firstname',
        'lastname',
        'email',
        'credibility',
        'phonenumber',
        'recommendation',
        'warning',        
        'password',
        'city',
        'street',
        'number',
        'facebook',
        'twitter',
        'instagram',
        'photo',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setNicknameAttribute($value){
        $this->attributes['nickname'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
