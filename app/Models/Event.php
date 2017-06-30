<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    
    public function eventType() {
        return $this->belongsTo(EventType::class);
    }
    
    public function similarity() {
        return $this->belongsTo(Similarity::class);
    }
    
}
