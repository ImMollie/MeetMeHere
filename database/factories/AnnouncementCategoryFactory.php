<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Announcement;
use App\Models\AnnouncementCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AnnouncementCategory>
 */
class AnnouncementCategoryFactory extends Factory
{
    protected $model = AnnouncementCategory::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'announcement_id' => Announcement::select('id')->orderByRaw("RAND()")->first()->id,  
            'category_id' => Category::select('id')->orderByRaw("RAND()")->first()->id,
        ];
    }
}
