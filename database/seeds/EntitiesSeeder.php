<?php

use App\Helpers\Downloader;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

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
            
            // If there is a picture url, use it to fetch the picture, save it
            // in storage and change its value to the actual path in the server
            if (isset($entity['picture'])) {
                $disk = Storage::disk('public');
                $url = $entity['picture'];
                $path = Downloader::downloadFile($url, 'pictures', $disk);
                
                $entity['picture'] = $disk->url($path);
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
