<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use App\Models\AnnouncementCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Announcement extends Model
{
    use HasFactory;
    protected $fillable = [
        'status_id',
        'category',
        'description',
        'radius',
        'place',
        'amountPeople',
        'currentPeople',        
        'date',
        'date2',
        'type',    
        'user_id', 
    ];
    public static function boot() {
        parent::boot();
        static::updated(function($item) {
            if($item->amountPeople - $item->currentPeople == 0){
                $item->status_id = 1;
                $item->save();
            }
        });
        }
    
    public function categoryOfAnnouncement()
    {
        return $this->belongsTo(AnnouncementCategory::class,'id','announcement_id');        
    }

    public function categoryOfAnnouncement2()
    {
        return $this->hasMany(AnnouncementCategory::class);        
    }

    public function userAnnouncement()
    {
        return $this->belongsTo(User::class,'user_id','id');        
    }
}
