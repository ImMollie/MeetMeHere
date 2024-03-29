<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AnnouncementCategory extends Model
{
    use HasFactory;
    public function announcementCategory()
    {
        return $this->hasMany(Announcement::class,'id','announcement_id');        
    }
    public function categoryAnnouncement()
    {
        return $this->hasMany(Category::class,'id','category_id');        
    }
}
