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

    public function turns()
    {
        return $this->belongsToMany(Turn::class, 'diligences_modules_turns')
        ->withTimestamps()
        ->withPivot([ 'diligence_id', 'module_id', 'time_atention', 'end_atention' ]);
    }
    
    protected $fillable = ['name', 'description', 'is_active', 'user_id'];
}
