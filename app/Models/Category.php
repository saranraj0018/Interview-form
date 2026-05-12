<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

      public function interviews()
    {
        return $this->belongsToMany(Interview::class, 'interview_email')
            ->withPivot('token', 'status')
            ->withTimestamps();
    }   
}
