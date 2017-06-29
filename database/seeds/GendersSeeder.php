<?php

use Illuminate\Database\Seeder;

class GendersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = \Carbon\Carbon::now()->toDateTimeString();
        
        $genders = include 'data/genders.php';
        foreach ($genders as &$gender) {
            $gender['created_at'] = $now;
            $gender['updated_at'] = $now;
        }
        
        DB::table('genders')->insert($genders);
    }
}
