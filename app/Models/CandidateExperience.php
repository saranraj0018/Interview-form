<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CandidateExperience extends Model
{
protected $table = 'candidate_experiences';

      protected $fillable = [
        'candidate_id',
        'organization',
        'designation',
        'from_date',
        'to_date',
        'gross_salary',
        'annual_ctc',
        'reason_for_leaving'
    ];
}
