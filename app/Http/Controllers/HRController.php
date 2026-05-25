<?php

namespace App\Http\Controllers;

use App\Models\Interview;
use Illuminate\Support\Str;
use App\Models\Employee;
use App\Models\FamilyDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HRController extends Controller {

    public function showForm($token) {
        $interview = Interview::where('joining_token', $token)->first();

        if (!$interview) {

            return "Invalid link ❌";
        }

          if ($interview->form_submitted == 1) {

        return view('frontend.interview.already-submitted');
    }

        return view('frontend.newjoinee', compact('interview'));
    }


    public function finalSelect($id) {
        $interview = Interview::findOrFail($id);

        $interview->overall_status = 'selected';

        $token = Str::random(64);

        $interview->joining_token = $token;

        $interview->save();

        $candidate = $interview->candidate;

        $link = url('/new-joinee/' . $token);

        Mail::send('emails.final-selected', [
            'candidate' => $candidate,
            'link' => $link
        ], function ($message) use ($candidate) {

            $message->to($candidate->email)
                ->subject('You are Selected - Next Step');
        });

        return back()->with('success', 'Mail sent successfully');
    }

    public function employeeSave(Request $request) {

     $interview = Interview::where('joining_token', $request->token)->first();

    // INVALID TOKEN
    if (!$interview) {

        return "Invalid Token";
    }

    // ALREADY SUBMITTED
    if ($interview->form_submitted == 1) {

        return redirect()->back()->with('error', 'Form Already Submitted');
    }
        // PHOTO UPLOAD
        $photoName = null;

        if ($request->hasFile('photo')) {

            $photo = $request->file('photo');

            $photoName = time() . '.' . $photo->getClientOriginalExtension();

            $photo->move(public_path('uploads/employees'), $photoName);
        }

        // EMPLOYEE SAVE
        $employee = Employee::create([

            // STEP 1
            'name' => $request->name,
            'designation' => $request->designation,
            'doj' => $request->doj,
            'dob' => $request->dob,

            'contact' => $request->contact,
            'emergency_contact' => $request->emergency_contact,

            'father' => $request->father,
            'mother' => $request->mother,
            'spouse' => $request->spouse,

            'marital_status' => $request->marital_status,
            'gender' => $request->gender,

            'aadhaar' => $request->aadhaar,
            'pan' => $request->pan,

            'present_address' => $request->present_address,
            'permanent_address' => $request->permanent_address,

            'blood_group' => $request->blood_group,
            'nominee' => $request->nominee,

            // BANK
            'bank_account' => $request->bank_account,
            'bank_name' => $request->bank_name,
            'branch' => $request->branch,
            'ifsc' => $request->ifsc,
            'bank_address' => $request->bank_address,

            // STEP 2
            'department' => $request->department,
            'employee_code' => $request->employee_code,
            'signature' => $request->signature,

            // PHOTO
            'photo' => $photoName,
        ]);

        // FAMILY DETAILS SAVE
        if ($request->family) {

            foreach ($request->family['name'] as $key => $name) {

                FamilyDetail::create([
                    'employee_id' => $employee->id,
                    'name' => $name,
                    'dob' => $request->family['dob'][$key] ?? null,
                    'relationship' => $request->family['relationship'][$key] ?? null,
                    'residing_with' => $request->family['residing_with'][$key] ?? null,
                ]);
            }
        }
        $interview->form_submitted = 1;

        $interview->save();

        return view('frontend.interview.success');
    }


    public function index()
{
    $employees = Employee::with('familyDetails')->paginate(10);

    return view('admin.employee.index', compact('employees'));
}

 public function show($id)
    {
        $employee = Employee::with('familyDetails')->findOrFail($id);

        return view('admin.employee.show', compact('employee'));
    }

}
