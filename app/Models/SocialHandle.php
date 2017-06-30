<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialHandle extends Model
{
    
    public function network() {
        return $this->belongsTo(Network::class);
    }
    
    public function user() {
        return $this->belongsTo(User::class);
    }
    
}
