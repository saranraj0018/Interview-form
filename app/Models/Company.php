<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function jobPosts()
{
    return $this->hasMany(JobPost::class, 'company_id');
}
}
