<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class AnnouncementStatusSeeder extends Seeder
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
            1 => 'Arranged',
            2 => 'Active',
            3 => 'Expired',
            4 => 'Canceled',
        ];
        foreach($status as $item)
            DB::table('announcement_statuses')->insert([
                'name' => $item,
                'created_at' => $generator->dateTime(),
                'updated_at' => $generator->dateTime(),
            ]);
    }
}

