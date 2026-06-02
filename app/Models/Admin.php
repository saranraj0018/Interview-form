<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
  public function roleData()
{
    return $this->belongsTo(Role::class, 'role');
}
}
