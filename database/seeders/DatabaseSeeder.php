<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Genre::factory(6)->create();
        \App\Models\Book::factory(25)->create();
        \App\Models\Cliente::factory(25)->create();
        \App\Models\Loan::factory(25)->create();
        \App\Models\Personal::factory(25)->create();
       
    }
}
