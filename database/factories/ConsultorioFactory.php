<?php

namespace Database\Factories;

use App\Models\Consultorio;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConsultorioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Consultorio::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'location' => $this->faker->locale(),
            'city' => $this->faker->city(),
            'country' => $this->faker->country(),
            'user_id' => User::all()->random()->id,
        ];
    }
}
