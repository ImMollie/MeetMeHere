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
            1 => 'translation.categories.name.dog',
            2 => 'translation.categories.name.horse',
            3 => 'translation.categories.name.fish',

            4 => 'translation.categories.name.beer',
            5 => 'translation.categories.name.match',
            6 => 'translation.categories.name.dancing',
            7 => 'translation.categories.name.theater',
            8 => 'translation.categories.name.walk',
            9 => 'translation.categories.name.nightride',
            10 => 'translation.categories.name.cinema',
            11 => 'translation.categories.name.movie',
            12 => 'translation.categories.name.date',
            13 => 'translation.categories.name.cooking',

            14 => 'translation.categories.name.vacation',
            15 => 'translation.categories.name.trip',
            16 => 'translation.categories.name.mountains',

            17 => 'translation.categories.name.cycling',
            18 => 'translation.categories.name.diving',
            19 => 'translation.categories.name.climbing',
            20 => 'translation.categories.name.football',
            21 => 'translation.categories.name.basketball',
            22 => 'translation.categories.name.skate',
            23 => 'translation.categories.name.jogging',
            24 => 'translation.categories.name.sparring',
            25 => 'translation.categories.name.mma',
            26 => 'translation.categories.name.tennis',
            27 => 'translation.categories.name.pingpong',

        ];

        $types = [
            1 => 'Animals',
            2 => 'Animals',
            3 => 'Animals',
            4 => 'Social',
            5 => 'Social',
            6 => 'Social',
            7 => 'Social',
            8 => 'Social',
            9 => 'Social',
            10 => 'Social',
            11 => 'Social',
            12 => 'Social',
            13 => 'Social',
            14 => 'Travel',
            15 => 'Travel',
            16 => 'Travel',
            17 => 'Sport',
            18 => 'Sport',
            19 => 'Sport',
            20 => 'Sport',
            21 => 'Sport',
            22 => 'Sport',
            23 => 'Sport',
            24 => 'Sport',
            25 => 'Sport',
            26 => 'Sport',
            27 => 'Sport',
        ];

        $images = [
            1 => '/storage/Categories/Walking the dog/10668.jpg', 
            2 => '/storage/Categories/Horse riding/123.jpg',
            3 => '/storage/Categories/Fishing/7958650.jpg',
            4 => '/storage/Categories/Pub meeting/going-pub-isolated-cartoon-vector-illustrations_107173-22897.jpg',
            5 => '/storage/Categories/Watching a sports match/5842.jpg',
            6 => '/storage/Categories/Dancing/Sandy_Ppl-21_Single-07.jpg',
            7 => '/storage/Categories/Theater/Wavy_Edu-06_Single-10.jpg',
            8 => '/storage/Categories/Walk/4152888.jpg',
            9 => '/storage/Categories/Night ride/suv-car-concept-illustration_114360-12207.jpg',
            10 => '/storage/Categories/Cinema/cinema.jpg', 
            11 => '/storage/Categories/Movie/people-watching-movie-home_23-2148565790.jpg',
            12 => '/storage/Categories/Date/dating-couple-enjoying-romantic-dinner_74855-5233.jpg',
            13 => '/storage/Categories/Cooking/cooking.jpg',
            14 => '/storage/Categories/Vacation/family-summer-vacation-concept-parents-couple-kids-walking-beach-going-bath-sea-.jpg',
            15 => '/storage/Categories/Trip/eco-tourism-concept_23-2148647259.jpg',
            16 => '/storage/Categories/Trip to the mountains/eco-tourism-concept_23-2148632050.jpg',
            17 => '/storage/Categories/Cycling/man-riding-bicycle-exercise_24877-54701.png',
            18 => '/storage/Categories/Diving/diving-concept-illustration_114360-2004.jpg',
            19 => '/storage/Categories/Climbing/climbing-concept-illustration_114360-5447.jpg',
            20 => '/storage/Categories/Football/flat-football-players-group_23-2148995848.jpg',
            21 => '/storage/Categories/Basketball/street-basketball-illustration_1284-17800 (1).jpg',
            22 => '/storage/Categories/Skating/skate-buddies-concept-illustration_114360-8928.jpg',
            23 => '/storage/Categories/Jogging/couple-practicing-trail-run-training_74855-5474.jpg',
            24 => '/storage/Categories/Sparring partner/jiu-jitsu-athletes-fighting_23-2148697391.jpg',
            25 => '/storage/Categories/Martial arts/jiu-jitsu-athletes-fighting_23-2148684558.jpg',
            26 => '/storage/Categories/Tennis/tennis-player-sport-illustration_2175-4571.jpg',
            27 => '/storage/Categories/Ping pong/people-playing-table-tennis_23-2148655541.jpg',
        ];

        $description = [
            1 => 'translation.categories.desc.dog',
            2 => 'translation.categories.desc.horse',
            3 => 'translation.categories.desc.fish',

            4 => 'translation.categories.desc.beer',
            5 => 'translation.categories.desc.match',
            6 => 'translation.categories.desc.dancing',
            7 => 'translation.categories.desc.theater',
            8 => 'translation.categories.desc.walk',
            9 => 'translation.categories.desc.nightride',
            10 => 'translation.categories.desc.cinema',
            11 => 'translation.categories.desc.movie',
            12 => 'translation.categories.desc.date',
            13 => 'translation.categories.desc.cooking',

            14 => 'translation.categories.desc.vacation',
            15 => 'translation.categories.desc.trip',
            16 => 'translation.categories.desc.mountains',

            17 => 'translation.categories.desc.cycling',
            18 => 'translation.categories.desc.diving',
            19 => 'translation.categories.desc.climbing',
            20 => 'translation.categories.desc.football',
            21 => 'translation.categories.desc.basketball',
            22 => 'translation.categories.desc.skate',
            23 => 'translation.categories.desc.jogging',
            24 => 'translation.categories.desc.sparring',
            25 => 'translation.categories.desc.mma',
            26 => 'translation.categories.desc.tennis',
            27 => 'translation.categories.desc.pingpong',

        ];

        foreach($categories as $category => $categories) {            
            DB::table('categories')->insert([
                'categoryName' => $categories, 
                'categoryType' => $types[$category],
                'categoryIMG' => $images[$category],
                'categoryDesc' => $description[$category],              
                'created_at' => $generator->dateTime(),
                'updated_at' => $generator->dateTime(),
            ]);
        }
    }
}
