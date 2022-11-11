<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    protected $model = Category::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'categoryName' => Category::select('categoryName')->orderByRaw("RAND()")->first()->categoryName,
            'categoryType' => Category::select('categoryType')->orderByRaw("RAND()")->first()->categoryType,
        ];
    }
}
