<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Poke;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PokeSeeder extends Seeder
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
            1 => 'Send',            
            2 => 'Received',
            3 => 'Arranged',
            4 => 'In progress',
            5 => 'Expired',
            6 => 'Canceled',
        ];

        foreach($status as $statuses) {            
             DB::table('pokes')->insert([
                'content' => $this->faker->text(10),
                'status' => $statuses,
                'date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
                'userpoke_id' => User::select('id')->orderByRaw("RAND()")->first()->id,  
                'userpoked_id' => User::select('id')->orderByRaw("RAND()")->first()->id,
                'created_at' => $generator->dateTime(),
                'updated_at' => $generator->dateTime(),
             ]);
        }
        //Poke::factory()->count(5)->create();
    }
}