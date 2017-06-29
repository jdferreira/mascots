<?php

use Illuminate\Database\Seeder;

class EntitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = \Carbon\Carbon::now()->toDateTimeString();
        
        $entities = include 'data/entities.php';
        foreach ($entities as $entity) {
            // Add timestamps to this entity
            $entity['created_at'] = $now;
            $entity['updated_at'] = $now;
            
            // Extract the entity data for this entity and hold it into $data
            if (isset($entity['data'])) {
                $data = $entity['data'];
                unset($entity['data']);
            }
            else {
                $data = [];
            }
            
            // Insert this entity into the database, and keep a record of its id
            $entity_id = DB::table('entities')->insertGetId($entity);
            
            // Add the correct entity_id and timestamps to the entity data
            foreach ($data as &$item) {
                $item['entity_id']  = $entity_id;
                $item['created_at'] = $now;
                $item['updated_at'] = $now;
            }
            DB::table('entity_data')->insert($data);
        }
    }
}
