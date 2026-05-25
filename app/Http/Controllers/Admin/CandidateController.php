<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
   public function view()
    {
        $candidates = Candidate::latest()->paginate(10);

        return view('admin.candidates.view', compact('candidates'));
    }

    public function show($id)
    {
        $candidate = Candidate::with([
            'educations',
            'experiences',
            'languages',
            'families',
            'references',
            'friendReferences'
        ])->findOrFail($id);

        return view('admin.candidates.show', compact('candidate'));
    }

    public function downloadPdf($id)
{
    $candidate = Candidate::with([
        'educations',
        'experiences',
        'languages',
        'families',
        'references',
        'friendReferences',
        'jobPost.company'
    ])->findOrFail($id);

    $pdf = Pdf::loadView('admin.candidates.pdf', compact('candidate'));

    return $pdf->download($candidate->full_name . '.pdf');
}
}
