<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diligence extends Model
{
    public function services()
    {
        return $this->belongsToMany(Service::class, 'diligences_services')->withTimestamps();
    }
    
    public function modules()
    {
        return $this->belongsToMany(Module::class, 'diligences_modules')->withTimestamps();
    }

    public function turns()
    {
        return $this->belongsToMany(Turn::class, 'diligences_modules_turns')
        ->withTimestamps()
        ->withPivot([ 'diligence_id', 'module_id', 'time_atention', 'end_atention' ]);
    }
    
    protected $fillable = ['name'];
}
