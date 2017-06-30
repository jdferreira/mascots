<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    
    public function addedBy() {
        return $this->belongsTo(User::class, 'added_by');
    }
    
    public function users() {
        return $this->belongsToMany(User::class, 'user_interests');
    }
    
}
