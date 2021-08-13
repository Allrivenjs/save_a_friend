<?php

namespace Database\Seeders;

use App\Models\Consultorio;
use Illuminate\Database\Seeder;

class ConsultorioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Consultorio::factory(30);
    }
}
