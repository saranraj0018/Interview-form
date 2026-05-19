<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CandidateFamily extends Model
{
protected $table = 'candidate_families';

     protected $fillable = [
        'candidate_id',
        'name',
        'age',
        'relationship',
        'occupation',
        'dependent',
        'contact'
    ];
}
