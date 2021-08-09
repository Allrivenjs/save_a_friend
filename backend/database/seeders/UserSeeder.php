<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
    }
}
