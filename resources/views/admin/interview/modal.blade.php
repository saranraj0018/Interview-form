<div id="interviewModal"
     x-data="{ open:false, form: {
        id: 0,
        position: '',
        department: '',
        candidate_name: '',
        interview_date: '',
        institution: '',
        categories: []
     }}"
     x-show="open"
     class="fixed inset-0 flex items-center justify-center z-50"
     style="display:none">

    <!-- Backdrop -->
    <div class="absolute inset-0 bg-black/40" @click="open=false"></div>

    <!-- Modal Box -->
    <div class="bg-white p-8 rounded-2xl shadow-2xl w-[600px] max-w-[95%] relative z-10 overflow-y-auto max-h-[90vh]">

        <h2 class="text-2xl font-bold mb-6 text-gray-800" id="interview_label">
            Add Interview
        </h2>

        <form id="interviewForm" class="space-y-4">

            <input type="hidden" name="id" x-model="form.id">

            <!-- Position -->
            <div>
                <label class="block mb-1">Position</label>
                <input type="text" name="position" x-model="form.position"
                       class="w-full border p-2 rounded">
            </div>

            <!-- Department -->
            <div>
                <label class="block mb-1">Department</label>
                <input type="text" name="department" x-model="form.department"
                       class="w-full border p-2 rounded">
            </div>

            <!-- Candidate -->
            <div>
                <label class="block mb-1">Candidate Name</label>
                <input type="text" name="candidate_name" x-model="form.candidate_name"
                       class="w-full border p-2 rounded">
            </div>

            <!-- Interview Date -->
            <div>
                <label class="block mb-1">Interview Date</label>
                <input type="date" name="interview_date" x-model="form.interview_date"
                       class="w-full border p-2 rounded">
            </div>

            <!-- Institution -->
            <div>
                <label class="block mb-1">Institution</label>
                <input type="text" name="institution" x-model="form.institution"
                       class="w-full border p-2 rounded">
            </div>

          <div>
    <label class="block mb-2 font-medium text-gray-700">Interview BY</label>

    <div class="border rounded-lg p-3 max-h-48 overflow-y-auto bg-white shadow-sm space-y-2">

        @foreach($categories as $cat)
            <label class="flex items-center gap-3 p-2 rounded hover:bg-gray-100 cursor-pointer">

                <input type="checkbox"
                       value="{{ $cat->id }}"
                       x-model="form.categories"
                       class="w-4 h-4 text-blue-600 border-gray-300 rounded">

                <span class="text-gray-700 text-sm">
                    {{ $cat->name }}
                </span>

            </label>
        @endforeach

    </div>
</div>

            <!-- Buttons -->
            <div class="flex justify-end gap-3 pt-4">
                <button type="button" @click="open=false"
                        class="px-4 py-2 border rounded">
                    Cancel
                </button>

                <button type="submit"
                        class="bg-[#ea2498] text-white px-4 py-2 rounded">
                    Save
                </button>
            </div>

        </form>
    </div>
</div>


<div id="deleteInterviewModal"
     x-data="{ open: false, deleteId: null }"
     x-show="open"
     class="fixed inset-0 flex items-center justify-center z-50"
     style="display:none">

    <div class="absolute inset-0 bg-black/40" @click="open=false"></div>

    <div class="bg-white p-6 rounded-xl shadow-xl w-[400px] relative z-10">
        <h2 class="text-lg font-bold mb-4">Confirm Delete</h2>

        <p class="mb-6">Are you sure you want to delete this interview?</p>

        <div class="flex justify-end gap-3">
            <button @click="open=false"
                class="px-4 py-1 border rounded">Cancel</button>

            <button @click="deleteInterview(deleteId)"
                class="px-4 py-1 bg-red-600 text-white rounded">
                Delete
            </button>
        </div>
    </div>
</div>
