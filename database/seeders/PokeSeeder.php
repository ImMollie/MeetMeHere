<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Poke;
use App\Models\User;
use App\Models\PokeStatus;
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
    
        DB::table('pokes')->insert([
        'content' => $this->faker->text(10),
        'pokestatus_id' => PokeStatus::all()->random()->id,
        'date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
        'userpoke_id' => User::select('id')->orderByRaw("RAND()")->first()->id,  
        'userpoked_id' => User::select('id')->orderByRaw("RAND()")->first()->id,        
        'created_at' => $generator->dateTime(),
        'updated_at' => $generator->dateTime(),
        ]);
        
        //Poke::factory()->count(5)->create();
    }
}