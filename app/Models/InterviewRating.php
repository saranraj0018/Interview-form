<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InterviewRating extends Model
{
    protected $fillable = [
        'interview_email_id',
        'question',
        'rating'
    ];

    public function interviewEmail()
    {
        return $this->belongsTo(InterviewEmail::class);
    }
}
