<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\PokeSeeder;
use Database\Seeders\UsersSeeder;
use Database\Seeders\OpinionSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\AnnouncementSeeder;
use Database\Seeders\AnnouncementCategorySeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(RolesSeeder::class);
        //$this->call(PermissionsSeeder::class);
        $this->call(UsersSeeder::class); 
        $this->call(CategorySeeder::class);       
        $this->call(AnnouncementSeeder::class);        
        $this->call(PokeSeeder::class);
        $this->call(OpinionSeeder::class);        
        $this->call(AnnouncementCategorySeeder::class);        
    }
}
