<?php

namespace App\Models;

use App\Models\User;
use App\Models\AnnouncementCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Announcement extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'category',
        'description',
        'radius',
        'place',
        'amountPeople',
        'date',
        'type',          
    ];

    public function categoryOfAnnouncement()
    {
        return $this->belongsTo(AnnouncementCategory::class,'id','announcement_id');        
    }
    public function userAnnouncement()
    {
        return $this->belongsTo(User::class,'id','user_id');        
    }
}
