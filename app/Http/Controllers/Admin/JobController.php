<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobPost;
use App\Models\Company;
use Illuminate\Support\Facades\Validator;

class JobController extends Controller {

    public function view() {

        $jobPosts = JobPost::with('company')->paginate(10);
        $companies = Company::get();
        return view('admin.job-post.view', compact('jobPosts', 'companies'));
    }

    public function save(Request $request) {

        $validator = Validator::make($request->all(), [
           'company_id' => 'nullable|exists:companies,id',
            'job_title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'role_summary' => 'required|string',
            'key_responsibilities' => 'required|string',
            'skills' => 'required|string',
            'qualifications' => 'required|string',
            'experience' => 'required|string|max:255',
             'status' => 'required|in:0,1',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        if (!empty($request['job_post_id'])) {
            $jobPost = JobPost::find($request['job_post_id']);
            $message = 'Job Post Updated Successfully';
        } else {
            $jobPost = new JobPost();
            $message = 'Job Post Saved Successfully';
        }
        $jobPost->company_id = $request->company_id;
        $jobPost->job_title = $request->job_title;
        $jobPost->location = $request->location;
        $jobPost->role_summary = $request->role_summary;
        $jobPost->key_responsibilities = $request->key_responsibilities;
        $jobPost->skills = $request->skills;
        $jobPost->qualifications = $request->qualifications;
        $jobPost->status = $request->status;
        $jobPost->experience = $request->experience;
        $jobPost->save();

        return response()->json([
            'success' => true,
            'message' => $message,
            'jobPost' => $jobPost
        ]);
    }

    public function destroy(Request $request) {
        if (!$request->id) {
            return response()->json([
                'success' => false,
                'message' => 'Job Post ID is required'
            ], 400);
        }

        $jobPost = JobPost::find($request->id);

        if (!$jobPost) {
            return response()->json([
                'success' => false,
                'message' => 'Job Post not found'
            ], 404);
        }

        $jobPost->delete();
        return response()->json([
            'success' => true,
            'message' => 'Job Post Deleted Successfully'
        ]);
    }
}
