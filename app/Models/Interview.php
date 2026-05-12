<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
   public function categories()
    {
        return $this->belongsToMany(Category::class, 'interview_emails')
            ->withPivot('token', 'status')
            ->withTimestamps();
    }

 public function ratings()
{
    return $this->hasMany(
        InterviewRating::class,
        'interview_email_id'
    );
}

 public function feedback()
{
    return $this->hasMany(
        InterviewFeedback::class,
        'interview_email_id'
    );
}

    public function panels()
{
    return $this->hasMany(
        InterviewPanel::class,
        'interview_email_id'
    );
    }

public function emails()
{
    return $this->hasMany(InterviewEmail::class);
}
}
