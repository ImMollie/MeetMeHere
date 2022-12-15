<?php

namespace App\Models;

use App\Models\Opinion;
use App\Models\PokeStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Poke extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    
    protected $guarded = [];

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
    public function pokeStatus()
    {
        return $this->hasOne(PokeStatus::class,'id','pokestatus_id');        
    }
}
