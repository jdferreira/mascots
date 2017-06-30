<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    // Relationships
    public function country() {
        return $this->belongsTo(Country::class);
    }
    
    public function gender() {
        return $this->belongsTo(Gender::class);
    }
    
    public function interests() {
        return $this->belongsToMany(Interest::class, 'user_interests');
    }
    
    public function socialHandles() {
        return $this->hasMany(SocialHandle::class);
    }
    
    public function similarities() {
        return $this->hasMany(Similarity::class);
    }
    
    public function roles() {
        return $this->belongsToMany(Role::class);
    }
    
}
