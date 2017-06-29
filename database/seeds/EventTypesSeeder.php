<?php

use Illuminate\Database\Seeder;

class EventTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = \Carbon\Carbon::now()->toDateTimeString();
        
        $event_types = include 'data/event_types.php';
        foreach ($event_types as &$event_type) {
            $event_type['created_at'] = $now;
            $event_type['updated_at'] = $now;
        }
        
        DB::table('event_types')->insert($event_types);
    }
}
