<?php

namespace Database\Factories;

use App\Models\Type_post;
use Illuminate\Database\Eloquent\Factories\Factory;

class Type_postFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Type_post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type_post' => $this->faker->randomElement(['Animal', 'search_a_friend','Picture','Complete']),
        ];
    }
}
