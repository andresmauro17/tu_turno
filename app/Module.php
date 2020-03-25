<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function diligences()
    {
        return $this->belongsToMany(Diligence::class, 'diligences_modules')->withTimestamps();
    }  
    
    protected $fillable = ['name', 'description', 'is_active'];
}
