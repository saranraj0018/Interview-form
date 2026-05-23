<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InterviewEmail;
use App\Models\Interview;

class HRInterviewController extends Controller
{
    public function view()
    {
        $interviews = Interview::with([
            'candidate',
            'emails.category',
           'emails.feedback'
        ])->paginate(10);

        return view('admin.hr.view', compact('interviews'));
    }

    public function show($id)
{
    $pivot = InterviewEmail::with([
        'interview',
        'category',
        'feedback',
        'ratings',
        'panels'
    ])->findOrFail($id);

    return view('admin.hr.show', compact('pivot'));
}

public function ratingsView($id)
{
    $interview = Interview::with([
        'emails.ratings',
        'emails.category',
        'candidate'
    ])->findOrFail($id);

    return view('admin.hr.ratings-view', compact('interview'));
}


}
