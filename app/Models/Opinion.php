<?php

namespace App\Models;

use App\Models\Poke;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Opinion extends Model
{
    use HasFactory;

    protected $fillable = [
        'opinionTypes',           
    ];

    public function pokeOpinion()
    {
        return $this->belongsTo(Poke::class,'id','poke_id');        
    }
    public function userOpinion()
    {
        return $this->hasMany(User::class,'id','user_id');        
    }
    public function reviewedOpinion()
    {
        return $this->belongsTo(User::class,'id','revieweduser_id');        
    }
}
