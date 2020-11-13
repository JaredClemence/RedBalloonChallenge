<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\GameSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\GameRegistrationSeeder;

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
        $this->call(GameSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(GameRegistrationSeeder::class);
    }
}
