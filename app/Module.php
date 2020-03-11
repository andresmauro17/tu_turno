<?php

namespace App;

use App\Diligence;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    public function diligences()
    {
        return $this->hasMany(Diligence::class);
    }
    
    protected $fillable = ['name', 'is_active'];
}
