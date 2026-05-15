<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    public function view()
    {
        $companies = Company::paginate(10);
        return view('admin.company.view', compact('companies'));
    }

    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        if (!empty($request->company_id)) {

            $company = Company::find($request->company_id);

            if (!$company) {
                return response()->json([
                    'success' => false,
                    'message' => 'Company not found'
                ]);
            }

            $message = 'Company updated successfully';

        } else {

            $company = new Company();
            $message = 'Company added successfully';
        }

        $company->name = $request->name;

        if ($request->hasFile('image')) {

            // old image delete
            if ($company->image && file_exists(public_path($company->image))) {
                unlink(public_path($company->image));
            }

            $image = $request->file('image');

            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('uploads/company'), $imageName);

            $company->image = 'uploads/company/' . $imageName;
        }

        $company->save();

        return response()->json([
            'success' => true,
            'message' => $message,
            'company' => $company
        ]);
    }

    public function destroy(Request $request)
    {
        $company = Company::find($request->id);

        if (!$company) {
            return response()->json([
                'success' => false,
                'message' => 'Company not found'
            ]);
        }

        if ($company->image && file_exists(public_path($company->image))) {
            unlink(public_path($company->image));
        }

        $company->delete();

        return response()->json([
            'success' => true,
            'message' => 'Company deleted successfully'
        ]);
    }
}
