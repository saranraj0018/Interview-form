<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CategoryController extends Controller {
    public function view() {
        $categories = Category::paginate(10);
        return view('admin.category.view', compact('categories'));
    }

    public function save(Request $request) {

        $validator = Validator::make($request->all(), [
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('categories', 'email')->ignore($request->category_id),
            ],
            'person_name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'level' => 'required|in:1,2,3,4',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        if (!empty($request['category_id'])) {
            $category = Category::find($request['category_id']);
            $message = 'Data  Updated successfully';
        } else {
            $category = new Category();
            $message = 'Data  saved successfully';
        }

        $category->email = $request->email;
        $category->person_name = $request->person_name;
        $category->designation = $request->designation;
        $category->level = $request->level;
        $category->save();

        return response()->json([
            'success' => true,
            'message' => $message,
            'category' => $category
        ]);
    }

    public function destroy(Request $request) {
        if (!$request->id) {
            return response()->json(['success' => false, 'message' => 'Category ID is required'], 400);
        }

        $category = Category::find($request->id);
        if (!$category) {
            return response()->json(['success' => false, 'message' => 'Category not found'], 404);
        }

        $category->delete();

        return response()->json([
            'success' => true,
            'message' => 'Email deleted successfully'
        ]);
    }
}
