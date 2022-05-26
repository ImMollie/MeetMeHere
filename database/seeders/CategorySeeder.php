<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        $generator = Factory::create();
        $categories = [
            1 => 'Dog',
            2 => 'Beer',
            3 => 'movie',
            4 => 'date',
            5 => 'travel',
            6 => 'smallTrip',
            7 => 'cycling',
            8 => 'diving',
            9 => 'climbing',
        ];

        foreach($categories as $category) {            
            DB::table('categories')->insert([
                'categoryName' => $category,
                'created_at' => $generator->dateTime(),
                'updated_at' => $generator->dateTime(),
            ]);
        }
    }
}
