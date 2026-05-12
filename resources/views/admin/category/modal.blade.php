<div id="categoryModal"
     x-data="{ open:false, form: { name: '', category_id: 0 } }"
     x-show="open"
     class="fixed inset-0 flex items-center justify-center z-50"
     style="display:none">

    <!-- Backdrop -->
    <div class="absolute inset-0 bg-black/40" @click="open=false"></div>

    <!-- Modal Box -->
    <div class="bg-white p-8 rounded-2xl shadow-2xl w-[500px] max-w-[90%] relative z-10">
        <h2 class="text-2xl font-bold mb-6 text-gray-800" id="category_label">Add Email</h2>

        <form id="categoryForm" class="space-y-6">
            <input type="hidden" name="category_id" x-model="form.category_id" id="category_id" />

            <!-- Email -->
            <div>
                <label class="block text-gray-700 font-medium mb-2">Email</label>
                <input type="email" name="category_name" id="category_name"
                       x-model="form.name" required
                       placeholder="Enter email"
                       class="form-input w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#ea2498]">
            </div>

            <!-- Buttons -->
            <div class="flex justify-end gap-3 pt-4">
                <button type="button" @click="open=false"
                        class="px-5 py-2 rounded-lg border border-gray-300 hover:bg-gray-100">
                    Cancel
                </button>
                <button type="submit"
                        class="bg-[#ea2498] text-white px-5 py-2 rounded-lg hover:bg-[#2a2a3f]"
                        id="save_category">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>


<!-- Delete Modal -->
<div id="deleteCategoryModal"
     x-data="{ open: false, deleteId: null }"
     x-show="open"
     class="fixed inset-0 flex items-center justify-center z-50"
     style="display:none">

    <div class="absolute inset-0 bg-black/40" @click="open=false"></div>

    <div class="bg-white p-6 rounded-xl shadow-xl w-[400px] relative z-10">
        <h2 class="text-lg font-bold mb-4 text-gray-800">Confirm Delete</h2>
        <p class="text-gray-600 mb-6">Are you sure you want to delete this email?</p>

        <div class="flex justify-end gap-3">
            <button @click="open=false"
                class="px-4 py-1 border rounded-lg hover:bg-gray-100">Cancel</button>
            <button @click="deleteCategory(deleteId)"
                class="px-4 py-1 bg-red-600 text-white rounded-lg hover:bg-red-700">Delete</button>
        </div>
    </div>
</div>
