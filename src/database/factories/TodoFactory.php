<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Category;

class TodoFactory extends Factory
{
    //$date = $this->faker->dataTimeBetween('1year');

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'action' => Str::random(9),
        ];
    }
}
