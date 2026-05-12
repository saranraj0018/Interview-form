<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InterviewFeedback extends Model
{
   protected $fillable = [
        'interview_email_id',
        'comments',
        'final_recommendation',
        'present_salary',
        'expected_salary',
        'proposed_gross',
        'proposed_ctc'
    ];

    public function interview()
{
    return $this->belongsTo(Interview::class, 'interview_emails_id');
}

public function interviewEmail()
{
    return $this->belongsTo(InterviewEmail::class);
}
}
