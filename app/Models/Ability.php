<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ability extends Model
{
    protected $table = 'abilities';

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_abilities', 'ability_id', 'role');
    }

}
