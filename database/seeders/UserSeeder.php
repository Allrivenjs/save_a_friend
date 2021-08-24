<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Location;
use App\Models\profile;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'ADMIN',
            'lastname'=>'el admin',
            'email'=>'admin@gmail.com',
            'password' => Hash::make('admin')
        ]);
       User::factory(99)->create();

       $users = User::all();
       foreach($users as $user){
           $nameslug = "$user->lastname - $user->name";
           profile::factory(1)->create([
                'slug' => Str::of( $nameslug )->slug('-'),
                'user_id' => $user->id,
                'location_id' => Location::all()->random()->id

           ]);
       }

    }
}
