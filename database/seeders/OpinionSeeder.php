<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Poke;
use App\Models\Opinion;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OpinionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $generator = Factory::create();       
        $opinions = [
        1 => 'culture',
        2 => 'punctuality',
        3 => 'attractiveness',
        4 => 'truthfulness',
        5 => 'hygiene',
        6 => 'humor',
        7 => 'boldness',
        8 => 'warmth',    
        ]; 

        foreach($opinions as $opinionTypes) {
            DB::table('opinions')->insert([  
                'user_id' => Poke::select('userpoke_id')->orderByRaw("RAND()")->first()->userpoke_id,  
                'revieweduser_id' => Poke::select('userpoked_id')->orderByRaw("RAND()")->first()->userpoked_id,  
                'poke_id' => Poke::select('id')->orderByRaw("RAND()")->first()->id,              
                'opinionTypes' => $opinionTypes,
                'created_at' => $generator->dateTime(),
                'updated_at' => $generator->dateTime(),
            ]);
        }
    }
}
