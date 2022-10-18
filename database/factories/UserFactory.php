<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected $model = User::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nickname' => $this->faker->name().$this->faker->numberBetween($min = 11, $max = 20),
            'firstname' => $this->faker->firstName(),
            'lastname' => $this->faker->lastName(),
            'credibility' => $this->faker->numberBetween($min = 30, $max = 60),
            'phonenumber' => $this->faker->numerify('###-###-####'),
            'recommendation' => $this->faker->boolean,
            'warning' => $this->faker->boolean,
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'city' => Str::random(10),
            'street' => Str::random(10),
            'number' => $this->faker->numberBetween($min = 30, $max = 60),
            'facebook' => Str::random(10),
            'twitter' => Str::random(10),
            'instagram' => Str::random(10),            
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
