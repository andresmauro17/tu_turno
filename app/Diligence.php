<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diligence extends Model
{
    public function modules()
    {
        return $this->belongsToMany(Module::class, 'diligences_modules')->withTimestamps();
    }
    
    protected $fillable = ['name'];
}
