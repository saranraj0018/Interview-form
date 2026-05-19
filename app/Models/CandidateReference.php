<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CandidateReference extends Model
{
protected $table = 'candidate_references';

    protected $fillable = [
        'candidate_id',
        'name',
        'designation',
        'mobile',
        'phone'
    ];
}
