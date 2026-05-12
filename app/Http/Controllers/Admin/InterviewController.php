<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Interview;
use App\Models\InterviewEmail;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\InterviewMail;

use Illuminate\Support\Str;

class InterviewController extends Controller {

    public function view() {
        $interviews = Interview::with('categories')->paginate(10);
        $categories = Category::all();

        return view('admin.interview.view', compact('interviews', 'categories'));
    }

    public function save(Request $request) {

        $validator = Validator::make($request->all(), [
            'position' => 'required',
            'department' => 'required',
            'candidate_name' => 'required',
            'interview_date' => 'required|date',
            'institution' => 'required',
            'categories' => 'required|array'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        if (!empty($request['id'])) {
            $interview = Interview::find($request['id']);
            $message = 'Interview Updated successfully';
        } else {
            $interview = new Interview();
            $message = 'Interview saved successfully';
        }

        $interview->position = $request->position;
        $interview->department = $request->department;
        $interview->candidate_name = $request->candidate_name;
        $interview->interview_date = $request->interview_date;
        $interview->institution = $request->institution;

        $interview->save();

        $syncData = [];

        foreach ($request->categories as $categoryId) {
            $token = Str::random(40);
            $syncData[$categoryId] = [
                'token' => $token,
                'status' => 'pending'
            ];
            $email = Category::find($categoryId)->name;

            $link = url('/interview/form/' . $token);

             try {
                Mail::to($email)->send(new InterviewMail($link));
            } catch (\Exception $e) {
                dd($e->getMessage());
            }
        }

        $interview->categories()->sync($syncData);

        return response()->json([
            'success' => true,
            'message' => $message
        ]);
    }

    public function destroy(Request $request) {

        if (!$request->id) {
            return response()->json(['success' => false, 'message' => 'ID is required'], 400);
        }

        $interview = Interview::find($request->id);

        if (!$interview) {
            return response()->json(['success' => false, 'message' => 'Not found'], 404);
        }

        $interview->delete();

        return response()->json([
            'success' => true,
            'message' => 'Deleted successfully'
        ]);
    }

public function form($token)
{
    $pivot = InterviewEmail::with('interview')
        ->where('token', $token)
        ->first();

    if (!$pivot) {
        return "Invalid link ❌";
    }

    if (!$pivot->interview) {
        return "Interview not found ❌";
    }

    if ($pivot->status === 'completed') {
        return view('frontend.interview.already-submitted');
    }

    return view('frontend.home', [
        'interview' => $pivot->interview,
        'token' => $token
    ]);
}

public function submit(Request $request, $token)
{
    $pivot = InterviewEmail::with('interview')
        ->where('token', $token)
        ->first();

    if (!$pivot) {
        return "Invalid link ❌";
    }

    if ($pivot->status === 'completed') {
        return view('frontend.interview.already-submitted');
    }

    $interview = $pivot->interview;

    if (!$interview) {
        return "Interview not found ❌";
    }
  $request->validate([

    'rating' => 'required|array|size:11',
    'rating.*' => 'required|integer|min:2|max:5',

    'comments' => 'required|string',

    'final_recommendation' => 'required',

   'present_salary' => 'required|numeric',
'expected_salary' => 'required|numeric',
'proposed_gross' => 'required|numeric',
'proposed_ctc' => 'required|numeric',

    'panel' => 'required|array|size:3',

   'panel.1.name' => 'required|string',
    'panel.1.signature' => 'required|string',
    'panel.1.date' => 'required|date',
    'panel.1.comments' => 'required|string',

], [

    'rating.required' => 'Please select all ratings.',
    'rating.size' => 'Please complete all rating fields.',

    'rating.*.required' => 'All ratings are required.',

    'comments.required' => 'Comments field is required.',

    'final_recommendation.required' => 'Please choose final recommendation.',

    'present_salary.required' => 'Present salary is required.',
    'expected_salary.required' => 'Expected salary is required.',
    'proposed_gross.required' => 'Proposed gross salary is required.',
    'proposed_ctc.required' => 'Proposed CTC salary is required.',

     'panel.1.name.required' => 'Panel member name is required.',
        'panel.1.signature.required' => 'Signature is required.',
        'panel.1.date.required' => 'Date is required.',
        'panel.1.comments.required' => 'Panel comments are required.',

]);
    $attributes = [
        "Job Knowledge",
        "Experience",
        "Past Achievements",
        "Academics",
        "Clarity of Thought",
        "Communication",
        "Motivation",
        "Stability",
        "Appearance",
        "Presentation",
        "Computer Skills",
    ];

    foreach ($request->rating as $key => $value) {

       $pivot->ratings()->create([
            'question' => $attributes[$key] ?? 'Unknown',
            'rating' => $value
        ]);
    }

   $pivot->feedback()->create([
        'comments' => $request->comments,
        'final_recommendation' => $request->final_recommendation,
        'present_salary' => $request->present_salary,
        'expected_salary' => $request->expected_salary,
        'proposed_gross' => $request->proposed_gross,
        'proposed_ctc' => $request->proposed_ctc,
    ]);

  if ($request->panel) {

        foreach ($request->panel as $panel) {

            // Empty row skip
            if (
                empty($panel['name']) &&
                empty($panel['signature']) &&
                empty($panel['date']) &&
                empty($panel['comments'])
            ) {
                continue;
            }

            $pivot->panels()->create([

                'name' => $panel['name'] ?? null,
                'signature' => $panel['signature'] ?? null,
                'date' => $panel['date'] ?? null,
                'comments' => $panel['comments'] ?? null,

            ]);
        }
    }
    $pivot->update([
        'status' => 'completed'
    ]);

    return view('frontend.interview.success');
}
}
