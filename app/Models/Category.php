<?php

namespace App\Models;

use App\Models\AnnouncementCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'dog',
        'beer',
        'movie',
        'date',
        'travel',
        'smallTrip',
        'cycling',
        'diving',
        'climbing',  
    ];

    public function announcementInCategory()
    {
        return $this->hasMany(AnnouncementCategory::class,'id','category_id');        
    }
}
