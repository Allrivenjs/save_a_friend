<?php

namespace Database\Factories;

use App\Models\category;
use App\Models\Post;
use App\Models\type_post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name= $this->faker->unique()->name();
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'text' => $this->faker->text(300),
            'type_post_id' =>type_post::all()->random()->id,
            'category_id' => Category::all()->random()->id,
            'user_id' => User::all()->random()->id
        ];
    }
}
