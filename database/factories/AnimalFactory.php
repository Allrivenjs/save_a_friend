<?php

namespace Database\Factories;

use App\Models\Animal;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnimalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Animal::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'health' =>$this->faker->randomElement(['Muy bien', 'Bien','Estable','Mal','Muy mal','Se me murio wuacho :c']),
            'age' => $this->faker->numberBetween(1,20),
            'type' => $this->faker->randomElement(['Pastor aleman', 'Bulldog','Poodle','Labrador retriever','golden retriever','chihuahua']),
            'sex'=>$this->faker->randomElement(['Hembra', 'Macho']),
            'is_adopte' => $this->faker->randomElement(['yes','not']),
            'user_id'=> User::all()->random()->id,
        ];
    }
}
