<?php

namespace App\Models;

use App\Models\Opinion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Poke extends Model
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    
    protected $fillable = [
        'content',
        'status',
        'date',        
    ];

    public function opinionPoke()
    {
        return $this->hasOne(Opinion::class,'id','idPoke');        
    }
    public function pokeUser()
    {
        return $this->hasOne(User::class,'id','userpoke_id');        
    }
    public function pokedUser()
    {
        return $this->hasOne(User::class,'id','userpoked_id');        
    }
}
