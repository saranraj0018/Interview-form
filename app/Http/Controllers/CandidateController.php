<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Candidate;
use App\Models\CandidateEducation;
use App\Models\CandidateExperience;
use App\Models\CandidateFamily;
use App\Models\CandidateLanguage;
use App\Models\JobPost;
use App\Models\CandidateReference;
use App\Models\CandidateFriendReference;

class CandidateController extends Controller

{

 public function create($job_post_id)
    {
        $jobPost = JobPost::with('company')->findOrFail($job_post_id);

        return view('frontend.personaldata', compact('jobPost'));
    }

    public function savePersonalData(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | VALIDATION
        |--------------------------------------------------------------------------
        */

        $request->validate([

            // BASIC DETAILS
            'date'                => 'required|date',
            'time'                => 'required',
            'contact_address'     => 'required|max:255',
            'pin_code'            => 'required|max:20',
            'full_name'           => 'required|max:255',
            'email'               => 'required|email|max:255',
            'mobile'              => 'required|digits_between:10,15',
            'date_of_birth'       => 'required|date',
            'age'                 => 'required|integer',
            'gender'              => 'required',
            'marital_status'      => 'required',

            'source'              => 'required',
            'position_applied'    => 'required',

            // EDUCATION
            'degree.*'            => 'required|max:255',
            'division.*'          => 'required|max:255',
            'college.*'           => 'required|max:255',
            'university.*'        => 'required|max:255',
            'marks.*'             => 'required|max:255',
            'subjects.*'          => 'required|max:255',
            'year_of_passing.*'   => 'required|max:255',
            'expected_gross'      => 'required|max:255',
            'sunday_work'         => 'required',
            'joining_date'        => 'required|date',
            'declaration_date'    => 'required|date',
            'place'               => 'required|max:255',
            'signature'           => 'required|max:255',

            // EXPERIENCE
            'organization.*'      => 'required',
            'designation.*'       => 'required',

            //language
           'languages'   => 'nullable|array|min:1',
            'languages.*' => 'nullable',

            // FAMILY
            'family_name.*'         => 'required|max:255',
            'family_age.*'          => 'required|numeric',
            'family_relationship.*' => 'required|max:255',
            'family_occupation.*'   => 'required|max:255',
            'family_dependent.*'    => 'required',
            'family_contact.*'      => 'required|digits_between:10,15',

        ], [
            'date.required'             => 'Date is required',
            'time.required'             => 'Time is required',
            'full_name.required'        => 'Full Name is required',
            'email.required'            => 'Email Address is required',
            'email.email'               => 'Enter valid email address',
            'mobile.required'           => 'Mobile Number is required',
            'mobile.digits_between'     => 'Mobile Number should be between 10 to 15 digits',
            'contact_address.required' => 'Contact Address is required',
            'pin_code.required'        => 'Pin Code is required',
            'position_applied.required' => 'Position Applied is required',
            'source.required'           => 'Source is required',
            'degree.*.required'        => 'Degree is required',
            'division.*.required'      => 'Division is required',
            'college.*.required'       => 'College is required',
            'university.*.required'    => 'University is required',
            'marks.*.required'         => 'Marks is required',
            'subjects.*.required'      => 'Subjects is required',
            'year_of_passing.*.required' => 'Year of Passing is required',
            'organization.*.required'  => 'Organization is required',
            'designation.*.required'   => 'Designation is required',


        ]);

        $alreadyExists = Candidate::where('email', $request->email)
    ->where('mobile', $request->mobile)
    ->first();

    if ($alreadyExists) {

    return redirect()->back()->with(
        'error',
        'Candidate already submitted this form.'
    );
}

        /*
        |--------------------------------------------------------------------------
        | SAVE CANDIDATE
        |--------------------------------------------------------------------------
        */

        $candidate = Candidate::create([
            'job_post_id' => $request->job_post_id,
            'date'                => $request->date,
            'time'                => $request->time,
            'source'              => $request->source,
            'position_applied'    => $request->position_applied,

            'full_name'           => $request->full_name,
            'contact_address'     => $request->contact_address,
            'pin_code'            => $request->pin_code,
            'email'               => $request->email,
            'phone'               => $request->phone,
            'mobile'              => $request->mobile,
            'dob'                 => $request->date_of_birth,
            'age'                 => $request->age,
            'gender'              => $request->gender,
            'marital_status'      => $request->marital_status,
            'current_gross'       => $request->current_gross,
            'expected_gross'      => $request->expected_gross,
            'experience'          => $request->experience,
            'notice_period'       => $request->notice_period,
            'career_break'        => $request->career_break,
            'certifications'      => $request->certifications,
            'sunday_work'         => $request->sunday_work,
            'joining_date'        => $request->joining_date,
            'litigation'          => $request->litigation,
            'employee_reference'  => $request->employee_reference,
            'declaration_date'    => $request->declaration_date,
            'place'               => $request->place,
            'signature'           => $request->signature,

        ]);

        /*
        |--------------------------------------------------------------------------
        | EDUCATION SAVE
        |--------------------------------------------------------------------------
        */

        if ($request->degree) {

            foreach ($request->degree as $key => $degree) {

                if (
                    $degree ||
                    $request->college[$key] ||
                    $request->university[$key]
                ) {

                    CandidateEducation::create([

                        'candidate_id' => $candidate->id,

                        'degree'       => $degree,
                        'division'     => $request->division[$key] ?? null,
                        'college'      => $request->college[$key] ?? null,
                        'university'   => $request->university[$key] ?? null,
                        'marks'        => $request->marks[$key] ?? null,
                        'subjects'     => $request->subjects[$key] ?? null,
                        'year' => $request->year_of_passing[$key] ?? null,

                    ]);
                }
            }
        }

        /*
        |--------------------------------------------------------------------------
        | EXPERIENCE SAVE
        |--------------------------------------------------------------------------
        */

        if ($request->organization) {

            foreach ($request->organization as $key => $organization) {

                if (
                    $organization ||
                    $request->designation[$key]
                ) {

                   CandidateExperience::create([
    'candidate_id' => $candidate->id,
    'organization' => $request->organization[$key],
    'designation' => $request->designation[$key],
    'from_date' => $request->from_date[$key],
    'to_date' => $request->to_date[$key],
    'gross_salary' => $request->gross_salary[$key],
    'annual_ctc' => $request->annual_ctc[$key],
    'reason_for_leaving' => $request->reason_for_leaving[$key],
]);
                }
            }
        }

        /*
        |--------------------------------------------------------------------------
        | FAMILY SAVE
        |--------------------------------------------------------------------------
        */

        if ($request->family_name) {

            foreach ($request->family_name as $key => $familyName) {

                if (
                    $familyName ||
                    $request->family_relationship[$key]
                ) {

                    CandidateFamily::create([
    'candidate_id' => $candidate->id,
    'name' => $request->family_name[$key],
    'age' => $request->family_age[$key],
    'relationship' => $request->family_relationship[$key],
    'occupation' => $request->family_occupation[$key],
    'dependent' => $request->family_dependent[$key],
    'contact' => $request->family_contact[$key],
]);
                }
            }
        }

        /*
        |--------------------------------------------------------------------------
        | LANGUAGE SAVE
        |--------------------------------------------------------------------------
        */

        if ($request->languages) {

            foreach ($request->languages  as $key => $language) {

                if ($language) {

                    CandidateLanguage::create([
    'candidate_id'   => $candidate->id,
     'language'       => $language,
    'can_read'       => isset($request->language_skills[$key][1]) ? 1 : 0,
     'can_write'      => isset($request->language_skills[$key][2]) ? 1 : 0,
    'can_speak'      => isset($request->language_skills[$key][3]) ? 1 : 0,
    'can_understand' => isset($request->language_skills[$key][4]) ? 1 : 0,
]);
                }
            }
        }

        /*
        |--------------------------------------------------------------------------
        | REFERENCES SAVE
        |--------------------------------------------------------------------------
        */

        if ($request->reference_name) {

            foreach ($request->reference_name as $key => $referenceName) {

                if ($referenceName) {

                    CandidateReference::create([

                        'candidate_id' => $candidate->id,

                        'name'         => $referenceName,

                        'designation'  => $request->reference_designation[$key] ?? null,

                        'mobile'       => $request->reference_mobile[$key] ?? null,

                        'phone'        => $request->reference_phone[$key] ?? null,

                    ]);
                }
            }
        }

        /*
        |--------------------------------------------------------------------------
        | FRIEND REFERENCES SAVE
        |--------------------------------------------------------------------------
        */

        if ($request->friend_name) {

            foreach ($request->friend_name as $key => $friendName) {

                if ($friendName) {

                    CandidateFriendReference::create([

                        'candidate_id' => $candidate->id,

                        'name'         => $friendName,

                        'relationship' => $request->friend_relationship[$key] ?? null,

                        'mobile'       => $request->friend_mobile[$key] ?? null,

                        'phone'        => $request->friend_phone[$key] ?? null,

                    ]);
                }
            }
        }

        /*
        |--------------------------------------------------------------------------
        | SUCCESS
        |--------------------------------------------------------------------------
        */

       return view('frontend.interview.register.success');
    }
}

