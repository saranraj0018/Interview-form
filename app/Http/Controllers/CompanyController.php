<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\JobPost;

class CompanyController extends Controller
{
    public function companyList()
{
    $companies = Company::withCount('jobPosts')->get();

    return view('frontend.companylist', compact('companies'));
}

public function offerList($companyId)
{
    $company = Company::findOrFail($companyId);

    $jobs = JobPost::where('company_id', $companyId)
        ->orderByRaw('status = 1 DESC')
        ->latest()
        ->get();

    return view('frontend.offerlist', compact('jobs', 'company'));
}

public function roleSummary($id)
    {
        $job = JobPost::findOrFail($id);

        $responsibilities = preg_split(
            '/\r\n|\r|\n/',
            $job->key_responsibilities
        );

        $qualifications = preg_split(
            '/\r\n|\r|\n/',
            $job->qualifications
        );

       $skills = preg_split('/\r\n|\r|\n/', $job->skills);

        return view(
            'frontend.rolesummary',
            compact(
                'job',
                'responsibilities',
                'qualifications',
                'skills'
            )
        );
    }
}
