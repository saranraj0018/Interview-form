<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CandidateEducation extends Model
{

protected $table = 'candidate_educations';

    protected $fillable = [

    'candidate_id',
    'degree',
    'division',
    'college',
    'university',
    'marks',
    'subjects',
    'year'

];
}
