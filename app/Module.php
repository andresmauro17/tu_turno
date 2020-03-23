<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function diligences()
    {
        return $this->belongsToMany(Diligence::class, 'diligences_modules')->withTimestamps();
    }  
    
    protected $fillable = ['name', 'is_active'];
}
