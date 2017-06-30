<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    
    public function data() {
        return $this->hasMany(EntityData::class);
    }
    
}
