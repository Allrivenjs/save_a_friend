<?php

namespace Database\Factories;

use App\Models\profile;
use Illuminate\Database\Eloquent\Factories\Factory;

class profileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = profile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'description'=> $this->faker->text(100),
            'profile_cover_photo_path' => './storage/profile_cover/' . $this->faker->image('public/storage/profile_cover', 640,480, null, false),
        ];
    }
}
