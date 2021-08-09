<?php

namespace Database\Seeders;

use App\Models\category;
use App\Models\Tag;
use App\Models\tags;
use App\Models\type_post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Storage::deleteDirectory('public/posts');
        Storage::makeDirectory('public/posts');


        Category::factory(5)->create();
        Tag::factory(10)->create();

        type_post::factory(4)->create();

        $this->call([
            UserSeeder::class,
            AnimalSeeder::class,
            ConsultorioSeeder::class,
            PostSeeder::class

        ]);
    }
}
