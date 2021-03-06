<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Location;
use App\Models\Tag;
use App\Models\Type_post;
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

        Storage::deleteDirectory('profile_cover');
        Storage::makeDirectory('profile_cover');
        Storage::deleteDirectory('ProfileImage');
        Storage::makeDirectory('ProfileImage');

        Location::factory(5)->create();

        $this->call([
            UserSeeder::class,
        ]);
    }
}
