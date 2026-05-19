<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CandidateLanguage extends Model
{
    protected $table = 'candidate_languages';

    protected $fillable = [
        'candidate_id',
        'language',
        'can_read',
        'can_write',
        'can_speak',
        'can_understand'
    ];
}
