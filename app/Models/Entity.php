<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['data'];
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['entityData'];
    
    public function entityData() {
        return $this->hasMany(EntityData::class);
    }
    
    /**
     * Loads and processes the entity data associated with this entity
     */
    public function getDataAttribute($x) {
        if (isset($this->attributes['data'])) {
            return $this->attributes['data'];
        }
        
        $keys = [];
        $data = [];
    
        foreach ($this->entityData as $datum) {
            $key = $datum->key;
            $value = $datum->value;
            
            if (! isset($keys[$key])) {
                $keys[$key] = count($data);
                $data[] = [ 'key' => $key, 'values' => [ $value ]];
            }
            else {
                $data[$keys[$key]]['values'][] = $value;
            }
            
            // if (isset($data[$key])) {
            //     $data[$key][] = $value;
            // }
            // else {
            //     $data[$key] = [$value];
            // }
        }
        
        return $this->attributes['data'] = $data;
    }
    
}
