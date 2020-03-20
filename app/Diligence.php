<?php

namespace App;

use App\Module;
use Illuminate\Database\Eloquent\Model;

class Diligence extends Model
{
    public function module()
    {
        return $this->hasMany(Module::class);
    }
    
    protected $fillable = ['name'];
}
