<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turn extends Model
{
    protected $fillable = ['end_atention', 'is_active'];

    public function modules()
    {
        return $this->belongsToMany(Module::class, 'diligences_modules_turns')
        ->withTimestamps()
        ->withPivot([ 'diligence_id', 'module_id', 'time_atention', 'end_atention' ]);
    }
}
