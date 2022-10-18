<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(3)->create();
        $user = User::create([
            'nickname' => 'admin00',
            'firstname' => 'Bartosz',
            'lastname' => 'Danielak',
            'credibility' => '100',
            'phonenumber' => '600-500-400',
            'recommendation' => true,
            'warning' => false,
            'password' => Hash::make('12345678'),            
            'email' => 'admin.testowy@localhost',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'city' => 'Skalmierzyce',
            'street' => 'Kaliska',
            'number' => 20,
            'facebook' => 'url/asdasda',
            'twitter' => 'url/asdasda',
            'instagram' => 'url/asdasda',
        ]);        
    }
}
