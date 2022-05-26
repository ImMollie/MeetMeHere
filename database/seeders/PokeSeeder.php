<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Poke;
use Illuminate\Database\Seeder;
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
        Poke::factory()->count(5)->create();
    }
}
