<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['name', 'lastname', 'phone_number', 'type_dni', 'dni', 'sex', 'is_active'];
}
