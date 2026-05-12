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
            'category_name' => [
                'required',
                'email',
                'max:255',
                Rule::unique('categories', 'name')->ignore($request->category_id),
            ],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        if (!empty($request['category_id'])) {
            $category = Category::find($request['category_id']);
            $message = 'Email Updated successfully';
        } else {
            $category = new Category();
            $message = 'Email saved successfully';
        }

        $category->name = $request->category_name;
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
