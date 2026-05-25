<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FamilyDetail extends Model
{
 protected $fillable = [
        'employee_id','name','dob','residing_with','relationship'
    ];

   public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
