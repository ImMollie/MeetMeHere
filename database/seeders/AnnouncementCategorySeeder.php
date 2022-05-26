<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use App\Models\AnnouncementCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AnnouncementCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AnnouncementCategory::factory()->count(5)->create();
    }
}
