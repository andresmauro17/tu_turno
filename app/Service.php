<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function diligences()
    {
        return $this->belongsToMany(Diligence::class, 'diligences_services')->withTimestamps()->withPivot('created_at')->orderBy('diligences_services.created_at');;
    }
    
    protected $fillable = ['name', 'description', 'short_name', 'is_active'];
}
