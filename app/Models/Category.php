<?php

namespace App\Models;

use App\Models\Category;
use App\Models\AnnouncementCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'categoryName',
        'categoryType',
        'categoryIMG'
    ];

    public function announcementInCategory()
    {
        return $this->hasMany(AnnouncementCategory::class,'id','category_id');        
    }
}
