<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function diligences()
    {
        return $this->belongsToMany(Diligence::class, 'diligences_services')->withTimestamps();
    }
    
    protected $fillable = ['name', 'description', 'short_name', 'is_active'];
}
