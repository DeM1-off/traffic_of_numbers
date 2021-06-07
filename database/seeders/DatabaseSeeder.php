<?php

namespace Database\Seeders;

use App\Models\Telephone;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*
         * generate 2000 user and 2000 telephone number
         */
        User::factory(2000)->create();
        Telephone::factory(2000)->create();

    }
}
