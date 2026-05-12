<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InterviewEmail extends Model
{
     protected $fillable = [
        'interview_id',
        'category_id',
        'token',
        'status'
    ];

    public function interview()
{
    return $this->belongsTo(Interview::class);
}

public function category()
{
    return $this->belongsTo(Category::class);
}

public function feedback()
{
    return $this->hasOne(InterviewFeedback::class);
}

public function ratings()
{
    return $this->hasMany(InterviewRating::class);
}

public function panels()
{
    return $this->hasMany(InterviewPanel::class);
}
}
