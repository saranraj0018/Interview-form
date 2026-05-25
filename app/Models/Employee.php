<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
     protected $fillable = [
        'name','designation','doj','dob','contact','emergency_contact',
        'father','mother','spouse','marital_status','gender',
        'aadhaar','pan','present_address','permanent_address',
        'blood_group','nominee',
        'bank_account','bank_name','branch','ifsc','bank_address',
        'department','employee_code','photo','signature'
    ];

    public function familyDetails()
    {
        return $this->hasMany(FamilyDetail::class, 'employee_id');
    }
}
