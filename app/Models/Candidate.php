<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = [

    'date',
    'time',
    'source',
    'position_applied',
    'full_name',
    'contact_address',
    'pin_code',
    'email',
    'phone',
    'mobile',
    'dob',
    'age',
    'gender',
    'marital_status',
    'current_gross',
    'expected_gross',
    'experience',
    'notice_period',
    'career_break',
    'certifications',
    'sunday_work',
    'joining_date',
    'litigation',
    'employee_reference',
    'declaration_date',
    'place',
    'signature'

];

public function educations()
{
    return $this->hasMany(CandidateEducation::class);
}

public function experiences()
{
    return $this->hasMany(CandidateExperience::class);
}

public function languages()
{
    return $this->hasMany(CandidateLanguage::class);
}

public function families()
{
    return $this->hasMany(CandidateFamily::class);
}

public function references()
{
    return $this->hasMany(CandidateReference::class);
}

public function friendReferences()
{
    return $this->hasMany(CandidateFriendReference::class);
}

public function company()
{
    return $this->belongsTo(Company::class);
}

public function jobPost()
{
    return $this->belongsTo(JobPost::class, 'job_post_id');
}
}
