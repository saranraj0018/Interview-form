<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InterviewPanel extends Model
{
    protected $fillable = [
        'interview_email_id',
        'name',
        'signature',
        'date',
        'comments'
    ];

    public function interviewEmail()
    {
        return $this->belongsTo(InterviewEmail::class);
    }
}
