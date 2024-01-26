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
        $users = User::all();
        $categories = Category::all();        

        return [
            //
            'user_id' => $users->random()->id,
            'category_id' => $categories->random()->id,
            'action' => Str::random(9),
        ];
    }
}
