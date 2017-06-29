<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(GendersSeeder::class);
        $this->call(CountriesSeeder::class);
        $this->call(EventTypesSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(InterestsSeeder::class);
        $this->call(EntitiesSeeder::class);
    }
}
