<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\User;
use App\Models\Category;
use Faker\Factory as Faker;
use App\Models\Announcement;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->faker = Faker::create();
        $generator = Factory::create();        
        $status = [
            1 => 'Arranged',            
            2 => 'Expired',
            3 => 'Canceled',
            4 => 'Active',            
        ];
        foreach($status as $statuses) {            
            DB::table('announcements')->insert([
                'user_id' => User::select('id')->orderByRaw("RAND()")->first()->id,  
                'status' => $statuses,
                'category' => Category::all()->random()->categoryName,
                'description' => $this->faker->text(10),                
                'place' => $this->faker->text(10),
                'amountPeople' => $this->faker->numberBetween($min = 1, $max = 10),
                'date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
                'date2' => $this->faker->date($format = 'Y-m-d', $max = 'now'),                
            ]);
        
        //Announcement::factory()->count(5)->create();        
        }
    }
}
