<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Announcement;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Announcement>
 */
class AnnouncementFactory extends Factory
{
    protected $model = Announcement::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {     
        return [
            //'announcement_id' => Announcement::select('id')->orderByRaw("RAND()")->first()->id,  
            'user_id' => User::select('id')->orderByRaw("RAND()")->first()->id,  
            'status' => $this->faker->text(10),
            'category' => $this->faker->text(10),
            'description' => $this->faker->text(10),
            'radius' => $this->faker->numberBetween($min = 1, $max = 10),
            'place' => $this->faker->text(10),
            'amountPeople' => $this->faker->numberBetween($min = 1, $max = 10),
            'date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'type' => $this->faker->numberBetween($min = 1, $max = 2),
        ];
    }
}
