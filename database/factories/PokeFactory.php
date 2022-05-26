<?php

namespace Database\Factories;

use App\Models\Poke;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Poke>
 */
class PokeFactory extends Factory
{
    protected $model = Poke::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //'poke_id' => Poke::select('id')->orderByRaw("RAND()")->first()->id,  
            'content' => $this->faker->text(10),
            'status' => $this->faker->text(10),
            'date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'userpoke_id' => User::select('id')->orderByRaw("RAND()")->first()->id,  
            'userpoked_id' => User::select('id')->orderByRaw("RAND()")->first()->id,
        ];
    }
}
