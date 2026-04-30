<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Son;

class SonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Son::factory(100)->create();
    }
}
