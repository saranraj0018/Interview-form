<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CandidateFriendReference extends Model
{
protected $table = 'candidate_friend_references';

    protected $fillable = [
        'candidate_id',
        'name',
        'relationship',
        'mobile',
        'phone'
    ];
}
