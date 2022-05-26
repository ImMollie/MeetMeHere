<?php

namespace Database\Factories;

use App\Models\Poke;
use App\Models\User;
use App\Models\Opinion;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Opinion>
 */
class OpinionFactory extends Factory
{
    protected $model = Opinion::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //'opinion_id' => Opinion::select('id')->orderByRaw("RAND()")->first()->id,  
            'user_id' => Poke::select('userpoke_id')->orderByRaw("RAND()")->first()->id,  
            'revieweduser_id' => Poke::select('userpoked_id')->orderByRaw("RAND()")->first()->id,  
            'poke_id' => Poke::select('id')->orderByRaw("RAND()")->first()->id,
            'opinionTypes' => $this->faker->text(10),
        ];
    }
}
