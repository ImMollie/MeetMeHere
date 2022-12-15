<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PokeStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $generator = Factory::create(); 
        $status = [
            1 => 'Send',            
            2 => 'Received',
            3 => 'Arranged',
            4 => 'In progress',
            5 => 'Expired',
            6 => 'Canceled',
        ];
        foreach($status as $item)
            DB::table('poke_statuses')->insert([
                'name' => $item,
                'created_at' => $generator->dateTime(),
                'updated_at' => $generator->dateTime(),
            ]);
    }
}
