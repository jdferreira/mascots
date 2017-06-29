<?php

use Illuminate\Database\Seeder;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = \Carbon\Carbon::now()->toDateTimeString();
        
        $countries = include 'data/countries.php';
        foreach ($countries as &$country) {
            $country['created_at'] = $now;
            $country['updated_at'] = $now;
        }
        
        DB::table('countries')->insert($countries);
    }
}
